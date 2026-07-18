<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin — @yield('title', 'Dashboard')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">Osama<span>.</span>Admin</div>
        @php $r = request()->route()->getName(); @endphp
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ $r === 'admin.dashboard' ? 'active' : '' }}"><span class="ic">▦</span> Dashboard</a>
        <a href="{{ route('admin.projects.index') }}" class="nav-item {{ str_starts_with($r, 'admin.projects') ? 'active' : '' }}"><span class="ic">◧</span> Projects</a>
        <a href="{{ route('admin.skills.index') }}" class="nav-item {{ str_starts_with($r, 'admin.skills') ? 'active' : '' }}"><span class="ic">◈</span> Skills</a>
        <a href="{{ route('admin.experiences.index') }}" class="nav-item {{ str_starts_with($r, 'admin.experiences') ? 'active' : '' }}"><span class="ic">◷</span> Experience</a>
        <a href="{{ route('admin.testimonials.index') }}" class="nav-item {{ str_starts_with($r, 'admin.testimonials') ? 'active' : '' }}"><span class="ic">★</span> Testimonials</a>
        <a href="{{ route('admin.messages.index') }}" class="nav-item {{ str_starts_with($r, 'admin.messages') ? 'active' : '' }}"><span class="ic">✉</span> Messages</a>
        <a href="{{ route('admin.settings.edit') }}" class="nav-item {{ str_starts_with($r, 'admin.settings') ? 'active' : '' }}"><span class="ic">⚙</span> Contact details</a>
        <a href="{{ route('home') }}" target="_blank" class="nav-item"><span class="ic">↗</span> View site</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="logout-btn"><span class="ic">⎋</span> Logout</button>
        </form>
    </aside>

    <main class="main">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
