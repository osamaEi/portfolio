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
            <label>Gallery images</label>

            @if($project->exists && $project->images->isNotEmpty())
                <div style="display:flex;flex-wrap:wrap;gap:12px;margin-bottom:12px;">
                    @foreach($project->images as $image)
                        <div style="position:relative;width:150px;">
                            <img src="{{ $image->image_url }}" alt=""
                                 style="width:150px;height:100px;object-fit:cover;border-radius:10px;border:1px solid var(--border);display:block;">
                            <button type="button" class="btn remove-media"
                                    data-action="{{ route('admin.projects.images.destroy', [$project, $image]) }}"
                                    style="position:absolute;top:6px;right:6px;padding:2px 8px;line-height:1.4;">✕</button>
                        </div>
                    @endforeach
                </div>
            @endif

            <input type="file" name="gallery[]" accept="image/*" multiple id="galleryInput">
            <div id="galleryPreview" style="display:flex;flex-wrap:wrap;gap:12px;margin-top:10px;"></div>
            <div class="hint">Select multiple files to add more screenshots. Up to 12 at a time, 4 MB each.</div>
            @error('gallery') <div class="error">{{ $message }}</div> @enderror
            @error('gallery.*') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label>Videos</label>

            @if($project->exists && $project->videos->isNotEmpty())
                <div style="display:flex;flex-wrap:wrap;gap:12px;margin-bottom:12px;">
                    @foreach($project->videos as $video)
                        <div style="position:relative;width:230px;">
                            @if($video->is_embed)
                                <div style="height:130px;border-radius:10px;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;text-align:center;padding:10px;font-size:.8rem;word-break:break-all;">
                                    {{ $video->embed_url ? '▶ Embedded video' : '⚠ Unrecognised link' }}<br>
                                    <span style="opacity:.6;">{{ Str::limit($video->video, 40) }}</span>
                                </div>
                            @else
                                <video src="{{ $video->video_url }}" controls preload="metadata"
                                       style="width:230px;height:130px;object-fit:cover;border-radius:10px;border:1px solid var(--border);display:block;background:#000;"></video>
                            @endif
                            <button type="button" class="btn remove-media"
                                    data-action="{{ route('admin.projects.videos.destroy', [$project, $video]) }}"
                                    style="position:absolute;top:6px;right:6px;padding:2px 8px;line-height:1.4;">✕</button>
                        </div>
                    @endforeach
                </div>
            @endif

            <input type="file" name="videos[]" accept="video/mp4,video/webm,video/quicktime" multiple>
            <div class="hint">MP4/WebM/MOV, up to 32 MB each (server limit is 40 MB per request).</div>
            @error('videos') <div class="error">{{ $message }}</div> @enderror
            @error('videos.*') <div class="error">{{ $message }}</div> @enderror

            <textarea name="video_urls" rows="2" placeholder="https://youtu.be/... (one per line)" style="margin-top:10px;">{{ old('video_urls') }}</textarea>
            <div class="hint">Or paste YouTube/Vimeo links, one per line — no upload size limit.</div>
            @error('video_urls') <div class="error">{{ $message }}</div> @enderror
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
    const gallery = document.getElementById('galleryInput');
    const galleryPreview = document.getElementById('galleryPreview');
    if (gallery) {
        gallery.addEventListener('change', () => {
            galleryPreview.innerHTML = '';
            Array.from(gallery.files).forEach(file => {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.cssText = 'width:150px;height:100px;object-fit:cover;border-radius:10px;border:1px solid var(--border);';
                galleryPreview.appendChild(img);
            });
        });
    }

    // Submitted from outside the main form: nested <form> elements are invalid HTML.
    document.querySelectorAll('.remove-media').forEach(btn => {
        btn.addEventListener('click', () => {
            if (!confirm('Remove this item?')) return;
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = btn.dataset.action;
            form.innerHTML = '@csrf' + '<input type="hidden" name="_method" value="DELETE">';
            document.body.appendChild(form);
            form.submit();
        });
    });

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
