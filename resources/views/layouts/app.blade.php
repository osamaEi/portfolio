<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    {{-- No-flash theme: apply saved theme before paint --}}
    <script>
        (function () {
            try {
                var t = localStorage.getItem('theme') || 'dark';
                document.documentElement.setAttribute('data-theme', t);
            } catch (e) {}
        })();
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('portfolio.name') . ' — ' . config('portfolio.role'))</title>
    <meta name="description" content="{{ config('portfolio.tagline') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>
    <nav class="nav">
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="brand">Osama<span class="dot">.</span>Eid</a>
            <div class="nav-links">
                <a href="#projects">Projects</a>
                <a href="#skills">Skills</a>
                <a href="#experience">Experience</a>
                <a href="#testimonials">Reviews</a>
                <a href="#contact">Contact</a>
                <a href="#contact" class="btn btn-primary" style="padding:9px 20px;">Let's talk</a>
            </div>
            <div style="display:flex;align-items:center;gap:12px;">
                <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme" title="Toggle theme">
                    <span class="moon">🌙</span><span class="sun">☀️</span>
                </button>
                <button class="nav-toggle" aria-label="Menu">☰</button>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <p>© {{ date('Y') }} {{ config('portfolio.name') }} · Built with Laravel & ❤️</p>
            <p style="margin-top:6px;">
                <a href="{{ config('portfolio.socials.github') }}" target="_blank" rel="noopener">GitHub</a> ·
                <a href="{{ config('portfolio.socials.linkedin') }}" target="_blank" rel="noopener">LinkedIn</a> ·
                <a href="{{ config('portfolio.socials.mostaql') }}" target="_blank" rel="noopener">Mostaql</a>
            </p>
        </div>
    </footer>

    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
