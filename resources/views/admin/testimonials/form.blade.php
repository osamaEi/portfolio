@extends('admin.layout')
@section('title', $testimonial->exists ? 'Edit testimonial' : 'New testimonial')

@section('content')
<div class="topbar">
    <div><h1>{{ $testimonial->exists ? 'Edit testimonial' : 'New testimonial' }}</h1></div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn">← Back</a>
</div>

<div class="panel">
    <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" class="form-grid">
        @csrf
        @if($testimonial->exists) @method('PUT') @endif

        <div class="form-row">
            <div class="field">
                <label>Client name</label>
                <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label>Project</label>
                <input type="text" name="project" value="{{ old('project', $testimonial->project) }}">
            </div>
        </div>

        <div class="form-row">
            <div class="field">
                <label>Rating (1–5)</label>
                <input type="number" name="rating" value="{{ old('rating', $testimonial->rating ?? 5) }}" min="1" max="5" required>
                @error('rating') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label>Source</label>
                <input type="text" name="source" value="{{ old('source', $testimonial->source ?? 'Mostaql') }}">
            </div>
        </div>

        <div class="field">
            <label>Review text</label>
            <textarea name="body" required>{{ old('body', $testimonial->body) }}</textarea>
            @error('body') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label>Sort order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" min="0">
        </div>

        <div class="form-actions">
            <button class="btn btn-primary">{{ $testimonial->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn">Cancel</a>
        </div>
    </form>
</div>
@endsection
