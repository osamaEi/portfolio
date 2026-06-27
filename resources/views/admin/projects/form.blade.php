@extends('admin.layout')
@section('title', $project->exists ? 'Edit project' : 'New project')

@section('content')
<div class="topbar">
    <div><h1>{{ $project->exists ? 'Edit project' : 'New project' }}</h1></div>
    <a href="{{ route('admin.projects.index') }}" class="btn">← Back</a>
</div>

<div class="panel">
    <form method="POST" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" class="form-grid" enctype="multipart/form-data">
        @csrf
        @if($project->exists) @method('PUT') @endif

        <div class="field">
            <label>Cover image</label>
            @if($project->image_url)
                <img src="{{ $project->image_url }}" alt="" style="width:220px;border-radius:10px;border:1px solid var(--border);margin-bottom:10px;display:block;">
            @endif
            <input type="file" name="image" accept="image/*" id="imageInput">
            <img id="imagePreview" style="width:220px;border-radius:10px;border:1px solid var(--border);margin-top:10px;display:none;">
            <div class="hint">JPG/PNG/WebP, up to 4 MB. Leave empty to keep the current image.</div>
            @error('image') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required>
            @error('title') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-row">
            <div class="field">
                <label>Category</label>
                <input type="text" name="category" value="{{ old('category', $project->category) }}" placeholder="e.g. LMS / EdTech">
            </div>
            <div class="field">
                <label>Live URL</label>
                <input type="url" name="url" value="{{ old('url', $project->url) }}" placeholder="https://...">
                @error('url') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="field">
            <label>Summary (short)</label>
            <input type="text" name="summary" value="{{ old('summary', $project->summary) }}">
        </div>

        <div class="field">
            <label>Description (full case study)</label>
            <textarea name="description">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="field">
            <label>Tech stack</label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack', is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : '') }}" placeholder="Laravel, Vue.js, MySQL">
            <div class="hint">Comma-separated.</div>
        </div>

        <div class="form-row">
            <div class="field">
                <label>Sort order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}" min="0">
            </div>
            <div class="field" style="display:flex;align-items:flex-end;">
                <div class="field-check">
                    <input type="checkbox" id="featured" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>
                    <label for="featured" style="margin:0;">Featured project</label>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary">{{ $project->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('admin.projects.index') }}" class="btn">Cancel</a>
        </div>
    </form>
</div>

<script>
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('imagePreview');
    if (input) {
        input.addEventListener('change', () => {
            const file = input.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    }
</script>
@endsection
