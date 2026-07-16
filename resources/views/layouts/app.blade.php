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

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>

<nav class="nav px-4" id="mainNav ">
            <div class="container nav-inner">
                <a href="{{ route('home') }}" class="brand">
                    <span class="brand-mark">OE</span>
                    <span class="brand-text">Osama<span class="dot">.</span>Eid</span>
                </a>

                <div class="nav-links" id="navLinks">
                    <a href="#projects" class="nav-link">Projects</a>
                    <a href="#skills" class="nav-link">Skills</a>
                    <a href="#experience" class="nav-link">Experience</a>
                    <a href="#testimonials" class="nav-link">Reviews</a>
                    <a href="#contact" class="nav-link">Contact</a>
                </div>
                
                <div class="nav-actions">
                    <a href="#contact" class="btn btn-primary nav-cta">Let's talk</a>
                    
                    <button class="nav-toggle" id="navToggle" aria-label="Menu">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
</nav>
    @yield('content')


    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
