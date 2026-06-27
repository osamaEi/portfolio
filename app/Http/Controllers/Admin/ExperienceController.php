<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::ordered()->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.form', ['experience' => new Experience()]);
    }

    public function store(Request $request)
    {
        Experience::create($this->validated($request));
        return redirect()->route('admin.experiences.index')->with('success', 'Experience created.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.form', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update($this->validated($request));
        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Experience deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'company' => ['required', 'string', 'max:160'],
            'role' => ['required', 'string', 'max:160'],
            'period' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'highlights' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['highlights'] = collect(preg_split('/\r\n|\r|\n/', (string) $request->input('highlights')))
            ->map(fn ($l) => trim($l))
            ->filter()
            ->values()
            ->all();

        return $data;
    }
}
