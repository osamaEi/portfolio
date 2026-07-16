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
<script>
    tailwind.config = {
        darkMode: 'class',
    }
</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>

<nav class="fixed  top-0 inset-x-0 z-50 bg-white/60 dark:bg-[#0a0a1f]/60 backdrop-blur- border-b border-slate-200 dark:border-white/10 transition-colors duration-300" id="mainNav">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="nav-inner flex items-center justify-between h-16 lg:h-20">

            {{-- Brand --}}
            <a href="{{ route('home') }}" class="brand flex items-center gap-2.5 shrink-0">
                <span class="brand-mark flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 text-white text-sm font-bold shadow-lg shadow-cyan-500/30">
                    OE
                </span>
                <span class="brand-text text-lg font-semibold tracking-tight text-slate-900 dark:text-white">
                    Osama<span class="dot text-cyan-500 dark:text-cyan-400">.</span>Eid
                </span>
            </a>

            {{-- Desktop Links --}}
            <div class="nav-links hidden lg:flex items-center gap-8" id="navLinks">
                <a href="#projects" class="nav-link text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Projects</a>
                <a href="#skills" class="nav-link text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Skills</a>
                <a href="#experience" class="nav-link text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Experience</a>
                <a href="#testimonials" class="nav-link text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Reviews</a>
                <a href="#contact" class="nav-link text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Contact</a>
            </div>

            {{-- Right side actions --}}
            <div class="nav-actions flex items-center gap-3">

                {{-- Dark/Light Toggle --}}
                <button id="themeToggle" aria-label="Toggle dark mode"
                        class="theme-toggle relative flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-slate-600 dark:text-gray-300 hover:border-cyan-400 dark:hover:border-cyan-500/40 hover:text-cyan-600 dark:hover:text-cyan-400 transition-all">
                    {{-- Sun icon (visible in dark mode) --}}
                    <svg id="iconSun" class="hidden dark:block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="4" />
                        <path stroke-linecap="round" d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
                    </svg>
                    {{-- Moon icon (visible in light mode) --}}
                    <svg id="iconMoon" class="block dark:hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                    </svg>
                </button>

                {{-- CTA (hidden on small mobile to save space) --}}
                <a href="#contact"
                   class="nav-cta hidden sm:inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 rounded-full shadow-lg shadow-cyan-500/30 transition-all">
                    Let's talk
                </a>

                {{-- Mobile Hamburger --}}
                <button class="nav-toggle relative flex lg:hidden h-10 w-10 items-center justify-center rounded-full border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5" id="navToggle" aria-label="Menu" aria-expanded="false">
                    <span class="hamburger-line absolute h-[2px] w-5 bg-slate-700 dark:bg-gray-200 rounded-full transition-all duration-300" style="transform: translateY(-6px);"></span>
                    <span class="hamburger-line absolute h-[2px] w-5 bg-slate-700 dark:bg-gray-200 rounded-full transition-all duration-300"></span>
                    <span class="hamburger-line absolute h-[2px] w-5 bg-slate-700 dark:bg-gray-200 rounded-full transition-all duration-300" style="transform: translateY(6px);"></span>
                </button>
            </div>
        </div>

        {{-- Mobile Menu Panel --}}
        <div id="mobileMenu"
             class="mobile-menu lg:hidden overflow-hidden max-h-0 opacity-0 transition-all duration-300 ease-in-out">
            <div class="flex flex-col gap-1 pb-6 pt-2 border-t border-slate-200 dark:border-white/10 mt-2">
                <a href="#projects" class="mobile-link px-3 py-3 text-sm font-medium text-slate-700 dark:text-gray-200 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-50 dark:hover:bg-white/5 rounded-xl transition-colors">Projects</a>
                <a href="#skills" class="mobile-link px-3 py-3 text-sm font-medium text-slate-700 dark:text-gray-200 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-50 dark:hover:bg-white/5 rounded-xl transition-colors">Skills</a>
                <a href="#experience" class="mobile-link px-3 py-3 text-sm font-medium text-slate-700 dark:text-gray-200 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-50 dark:hover:bg-white/5 rounded-xl transition-colors">Experience</a>
                <a href="#testimonials" class="mobile-link px-3 py-3 text-sm font-medium text-slate-700 dark:text-gray-200 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-50 dark:hover:bg-white/5 rounded-xl transition-colors">Reviews</a>
                <a href="#contact" class="mobile-link px-3 py-3 text-sm font-medium text-slate-700 dark:text-gray-200 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-50 dark:hover:bg-white/5 rounded-xl transition-colors">Contact</a>
                <a href="#contact"
                   class="mt-2 inline-flex items-center justify-center gap-2 px-5 py-3 text-sm font-semibold text-white bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full shadow-lg shadow-cyan-500/30">
                    Let's talk
                </a>
            </div>
        </div>
    </div>
</nav>

{{-- Spacer so page content isn't hidden behind the fixed nav --}}
<div class="h-16 lg:h-20"></div>

<script>
(function () {
    // ---------- Dark / Light mode ----------
    const root = document.documentElement;
    const themeToggle = document.getElementById('themeToggle');

    function applyTheme(theme) {
        if (theme === 'dark') {
            root.classList.add('dark');
        } else {
            root.classList.remove('dark');
        }
        localStorage.setItem('theme', theme);
    }

    // Initial theme: saved preference > OS preference > light
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    applyTheme(savedTheme || (prefersDark ? 'dark' : 'light'));

    themeToggle.addEventListener('click', () => {
        const isDark = root.classList.contains('dark');
        applyTheme(isDark ? 'light' : 'dark');
    });

    // ---------- Mobile menu ----------
    const navToggle = document.getElementById('navToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const hamburgerLines = navToggle.querySelectorAll('.hamburger-line');

    let menuOpen = false;

    function setMenu(open) {
        menuOpen = open;
        navToggle.setAttribute('aria-expanded', open);

        if (open) {
            mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
            mobileMenu.classList.remove('opacity-0');
            mobileMenu.classList.add('opacity-100');
            hamburgerLines[0].style.transform = 'translateY(0) rotate(45deg)';
            hamburgerLines[1].style.opacity = '0';
            hamburgerLines[2].style.transform = 'translateY(0) rotate(-45deg)';
        } else {
            mobileMenu.style.maxHeight = '0px';
            mobileMenu.classList.remove('opacity-100');
            mobileMenu.classList.add('opacity-0');
            hamburgerLines[0].style.transform = 'translateY(-6px) rotate(0)';
            hamburgerLines[1].style.opacity = '1';
            hamburgerLines[2].style.transform = 'translateY(6px) rotate(0)';
        }
    }

    navToggle.addEventListener('click', () => setMenu(!menuOpen));

    // Close mobile menu when a link is clicked
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => setMenu(false));
    });

    // Close mobile menu on resize to desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024 && menuOpen) setMenu(false);
    });

    // Shrink nav slightly on scroll (optional visual polish)
    const nav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            nav.classList.add('shadow-md', 'shadow-slate-200/50', 'dark:shadow-black/20');
        } else {
            nav.classList.remove('shadow-md', 'shadow-slate-200/50', 'dark:shadow-black/20');
        }
    });
})();
</script>
    @yield('content')


    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
