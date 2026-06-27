<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Project()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->handleImage($request) ?? null;

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validated($request);

        if ($newImage = $this->handleImage($request)) {
            $this->deleteImage($project->image);
            $data['image'] = $newImage;
        }

        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $this->deleteImage($project->image);
        $project->delete();
        return back()->with('success', 'Project deleted.');
    }

    /**
     * Store an uploaded cover image in public/projects and return its filename.
     */
    private function handleImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $file = $request->file('image');
        $name = \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '-' . \Illuminate\Support\Str::random(6) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('projects'), $name);

        return $name;
    }

    /**
     * Remove a previously uploaded image file (skips external URLs).
     */
    private function deleteImage(?string $image): void
    {
        if ($image && ! str_starts_with($image, 'http')) {
            $path = public_path('projects/' . $image);
            if (is_file($path)) {
                @unlink($path);
            }
        }
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'category' => ['nullable', 'string', 'max:120'],
            'summary' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'tech_stack' => ['nullable', 'string'],
            'url' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:4096'],
            'featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        // The uploaded file is handled separately; don't persist it as a string.
        unset($data['image']);

        $data['featured'] = $request->boolean('featured');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['tech_stack'] = collect(explode(',', (string) $request->input('tech_stack')))
            ->map(fn ($t) => trim($t))
            ->filter()
            ->values()
            ->all();

        return $data;
    }
}
