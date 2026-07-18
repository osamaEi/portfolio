@extends('admin.layout')
@section('title', 'Contact details')

@section('content')
<div class="topbar">
    <div><h1>Contact details</h1></div>
</div>

<div class="panel">
    <form method="POST" action="{{ route('admin.settings.update') }}" class="form-grid">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="field">
                <label>Office</label>
                <input type="text" name="contact_office" value="{{ old('contact_office', $settings['contact_office']) }}" placeholder="Alexandria, Egypt">
                @error('contact_office') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label>Phone</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" placeholder="+20 111 607 3816">
                @error('contact_phone') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="field">
                <label>Work hours</label>
                <input type="text" name="contact_hours" value="{{ old('contact_hours', $settings['contact_hours']) }}" placeholder="Everyday 09 am - 07 pm">
                @error('contact_hours') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" placeholder="you@example.com">
                @error('contact_email') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="hint">These appear in the contact section of your public site. Leave a field empty to fall back to the value in config/portfolio.php.</div>

        <div class="form-actions">
            <button class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>
@endsection
