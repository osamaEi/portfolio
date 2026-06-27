@extends('admin.layout')
@section('title', $skill->exists ? 'Edit skill' : 'New skill')

@section('content')
<div class="topbar">
    <div><h1>{{ $skill->exists ? 'Edit skill' : 'New skill' }}</h1></div>
    <a href="{{ route('admin.skills.index') }}" class="btn">← Back</a>
</div>

<div class="panel">
    <form method="POST" action="{{ $skill->exists ? route('admin.skills.update', $skill) : route('admin.skills.store') }}" class="form-grid">
        @csrf
        @if($skill->exists) @method('PUT') @endif

        <div class="form-row">
            <div class="field">
                <label>Category</label>
                <input type="text" name="category" value="{{ old('category', $skill->category) }}" placeholder="e.g. Languages" required>
                @error('category') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $skill->name) }}" placeholder="e.g. Laravel" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="field">
                <label>Level (0–100)</label>
                <input type="number" name="level" value="{{ old('level', $skill->level ?? 80) }}" min="0" max="100" required>
                @error('level') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label>Sort order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order ?? 0) }}" min="0">
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary">{{ $skill->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('admin.skills.index') }}" class="btn">Cancel</a>
        </div>
    </form>
</div>
@endsection
