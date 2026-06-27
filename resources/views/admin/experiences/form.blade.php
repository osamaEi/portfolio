@extends('admin.layout')
@section('title', $experience->exists ? 'Edit experience' : 'New experience')

@section('content')
<div class="topbar">
    <div><h1>{{ $experience->exists ? 'Edit experience' : 'New experience' }}</h1></div>
    <a href="{{ route('admin.experiences.index') }}" class="btn">← Back</a>
</div>

<div class="panel">
    <form method="POST" action="{{ $experience->exists ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}" class="form-grid">
        @csrf
        @if($experience->exists) @method('PUT') @endif

        <div class="form-row">
            <div class="field">
                <label>Company</label>
                <input type="text" name="company" value="{{ old('company', $experience->company) }}" required>
                @error('company') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label>Role</label>
                <input type="text" name="role" value="{{ old('role', $experience->role) }}" required>
                @error('role') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="field">
                <label>Period</label>
                <input type="text" name="period" value="{{ old('period', $experience->period) }}" placeholder="May 2025 – Present" required>
                @error('period') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label>Sort order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $experience->sort_order ?? 0) }}" min="0">
            </div>
        </div>

        <div class="field">
            <label>Description</label>
            <input type="text" name="description" value="{{ old('description', $experience->description) }}">
        </div>

        <div class="field">
            <label>Highlights</label>
            <textarea name="highlights" placeholder="One bullet per line">{{ old('highlights', is_array($experience->highlights) ? implode("\n", $experience->highlights) : '') }}</textarea>
            <div class="hint">One highlight per line.</div>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary">{{ $experience->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('admin.experiences.index') }}" class="btn">Cancel</a>
        </div>
    </form>
</div>
@endsection
