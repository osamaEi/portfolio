@extends('layouts.app')

@section('content')
{{-- ===================== HERO ===================== --}}
<header class="relative min-h-screen flex items-center overflow-hidden bg-slate-900 text-slate-900 dark:text-white">

    {{-- Background Image with Overlay --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/osama--bg.png') }}" 
             alt="{{ config('portfolio.name') }}"
             class="w-50 h-full object-cover object-[center-15%] mx-auto">
        
        {{-- Dark overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-white/85 via-white/75 to-white/65 dark:from-[#0a0a1f]/95 dark:via-[#0a0a1f]/75 dark:to-[#0a0a1f]/85"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-white/85 via-transparent to-white/60 dark:from-[#0a0a1f]/95 dark:via-transparent dark:to-[#0a0a1f]/30"></div>
    </div>

    {{-- Nebula glow effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(at_center,#93c5fd_0%,transparent_20%)] dark:bg-[radial-gradient(at_center,#1e3a8a_0%,transparent_70%)] opacity-20 dark:opacity-40"></div>
    <div class="absolute top-[-100px] right-[-80px] w-[600px] h-[600px] bg-cyan-300 dark:bg-cyan-400 rounded-full blur-[140px] opacity-10 dark:opacity-20"></div>
    <div class="absolute bottom-[-150px] left-[-100px] w-[500px] h-[500px] bg-indigo-300 dark:bg-indigo-500 rounded-full blur-[130px] opacity-5 dark:opacity-15"></div>

    <div class="container mx-auto px-6 lg:px-8 relative z-10 pt-24 pb-16">
        <div class="grid lg:grid-cols-12 gap-[110px] items-center">

            {{-- Left Side: Main Text --}}
            <div class="lg:col-span-6 space-y-8">
                <div class="inline-flex items-center gap-2.5 px-5 py-2.5 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-200 dark:border-emerald-900/50 rounded-full">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 dark:bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-600 dark:bg-emerald-500"></span>
                    </span>
                    Available for work
                </div>

                <h1 class="text-5xl lg:text-5xl font-semibold leading-[1.05] tracking-tighter">
                    I'm <span class="text-slate-900 dark:text-white">{{ config('portfolio.name') ?? 'John' }}</span>,<br>
                    a <span class="bg-gradient-to-r from-cyan-600 via-blue-600 to-indigo-600 dark:from-cyan-400 dark:via-blue-400 dark:to-indigo-400 bg-clip-text text-transparent">Web Developer</span>
                </h1>

                <p class="max-w-lg text-lg leading-relaxed text-slate-600 dark:text-gray-200">
                    I build modern, responsive, and user-focused web experiences with clean code and attention to detail, helping businesses bring their ideas to life online.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#projects"
                       class="inline-flex items-center gap-2 px-8 py-4 text-sm font-semibold text-white bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 rounded-full shadow-lg shadow-cyan-500/40 transition-all">
                        View my work →
                    </a>
                    <a href="#contact"
                       class="inline-flex items-center gap-2 px-8 py-4 text-sm font-semibold text-slate-700 dark:text-gray-200 border border-slate-300 dark:border-white/30 hover:border-cyan-500 dark:hover:border-cyan-400 rounded-full transition-all">
                        Contact Me
                    </a>
                </div>
            </div>

            {{-- Right Side: About Me & My Work --}}
            <div class="lg:col-span-6 space-y-10 lg:pl-12">

                <div>
                    <h3 class="uppercase text-sm tracking-[2px] text-slate-500 dark:text-gray-400 mb-3">ABOUT ME</h3>
                    <p class="text-slate-600 dark:text-gray-300 leading-relaxed text-[17px]">
                        Passionate about creating fast, accessible, and visually engaging websites. I enjoy turning complex problems into simple, elegant digital solutions.
                    </p>
                    <a href="#about" class="inline-block mt-4 text-cyan-600 dark:text-cyan-400 hover:text-cyan-500 dark:hover:text-cyan-300 text-sm font-medium">
                        LEARN MORE →
                    </a>
                </div>

                <div>
                    <h3 class="uppercase text-sm tracking-[2px] text-slate-500 dark:text-gray-400 mb-3">MY WORK</h3>
                    <p class="text-slate-600 dark:text-gray-300 leading-relaxed text-[17px]">
                        From landing pages to full web applications, my projects focus on performance, usability, and delivering meaningful experiences for users.
                    </p>
                    <a href="#projects" class="inline-block mt-4 text-cyan-600 dark:text-cyan-400 hover:text-cyan-500 dark:hover:text-cyan-300 text-sm font-medium">
                        BROWSE PORTFOLIO →
                    </a>
                </div>

                {{-- Social Icons --}}
                <div class="pt-8 flex items-center gap-6">
                    <span class="text-sm uppercase tracking-widest text-slate-500 dark:text-gray-400">Follow Me</span>
                    <div class="flex gap-5 text-2xl text-slate-400 dark:text-gray-400">
                        <a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">𝕏</a>
                        <a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">f</a>
                        <a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">in</a>
                        <a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">▶︎</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</header>
{{-- ===================== ABOUT ===================== --}}
<section id="about" class="section py-12 bg-white dark:bg-[#0a0a1f] text-slate-900 dark:text-white relative overflow-hidden">

    {{-- نفس جو الـ Hero: dot-grid خفيف + توهجات --}}
    <div class="absolute inset-0 opacity-[0.08] dark:opacity-[0.15] [background-image:radial-gradient(circle,#94a3b8_1px,transparent_1px)] dark:[background-image:radial-gradient(circle,#334155_1px,transparent_1px)] [background-size:28px_28px] pointer-events-none"></div>
    <div class="absolute top-[-120px] left-[-100px] w-[420px] h-[420px] bg-indigo-300 dark:bg-indigo-600 rounded-full blur-[130px] opacity-10 dark:opacity-15 pointer-events-none"></div>
    <div class="absolute bottom-[-140px] right-[-100px] w-[420px] h-[420px] bg-cyan-300 dark:bg-cyan-500 rounded-full blur-[120px] opacity-10 pointer-events-none"></div>

    <div class="container mx-auto px-6 lg:px-8 relative">
        <div class="about-grid grid lg:grid-cols-12 gap-16 lg:gap-20 items-center">

            <!-- Photo Side -->
            <div class="about-photo reveal lg:col-span-5 flex justify-center lg:justify-end">
                <div class="relative max-w-xs lg:max-w-md w-full">

                    {{-- هالة متوهجة وراء الصورة المفرغة، بنفس ألوان الهيرو --}}
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-gradient-to-br from-cyan-400 to-indigo-600 rounded-full blur-[90px] opacity-15 dark:opacity-25 pointer-events-none"></div>

                    <div class="relative">
                        <img
                            src="{{ asset('images/osama.jpg') }}"
                            alt="{{ config('portfolio.name') }}"
                            class="relative z-10 w-full aspect-square object-contain drop-shadow-[0_25px_35px_rgba(0,0,0,0.15)] dark:drop-shadow-[0_25px_35px_rgba(0,0,0,0.5)] transition-transform duration-1000 hover:scale-[1.03]"
                            onerror="this.style.display='none'">

                        {{-- Trial-balance styled stat card, floating off the photo --}}
                        <div class="absolute -bottom-8 -right-6 lg:-right-10 z-20 w-52 bg-white/90 dark:bg-gray-900/90 backdrop-blur-md rounded-2xl shadow-xl border border-slate-200 dark:border-white/10 p-5">
                            <div class="flex items-center justify-between pb-3 mb-3 border-b border-dashed border-slate-200 dark:border-white/15">
                                <span class="font-mono text-[10px] tracking-[2px] text-slate-500 dark:text-gray-400">TRIAL BALANCE</span>
                                <span class="font-mono text-[10px] text-emerald-600 dark:text-emerald-400">✓ OK</span>
                            </div>
                            <div class="space-y-2.5">
                                <div class="flex items-baseline justify-between">
                                    <span class="text-xs text-slate-500 dark:text-gray-400">Query time</span>
                                    <span class="font-mono text-sm font-semibold text-slate-900 dark:text-white">-75%</span>
                                </div>
                                <div class="flex items-baseline justify-between">
                                    <span class="text-xs text-slate-500 dark:text-gray-400">Users served</span>
                                    <span class="font-mono text-sm font-semibold text-slate-900 dark:text-white">25K+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Side -->
            <div class="about-text reveal lg:col-span-7 space-y-10 lg:pb-8">

                <div class="flex items-center gap-4">
                    <span class="eyebrow px-7 py-3 text-sm font-mono tracking-[3px] text-cyan-600 dark:text-cyan-400 bg-cyan-50 dark:bg-white/5 backdrop-blur shadow border border-cyan-200 dark:border-cyan-900/50 rounded-3xl">
                        ABOUT ME
                    </span>
                    <div class="h-px flex-1 bg-gradient-to-r from-cyan-300 dark:from-cyan-800 to-transparent"></div>
                </div>

                <h3 class="text-5xl lg:text-6xl font-semibold leading-[1.1] tracking-tighter text-slate-900 dark:text-white">
                    Hi, I'm
                    <span class="bg-gradient-to-r from-cyan-600 to-indigo-600 dark:from-cyan-400 dark:to-indigo-400 bg-clip-text text-transparent">{{ config('portfolio.name') }}</span>
                    👋
                </h3>

                <div class="max-w-2xl space-y-7 text-[17.5px] leading-relaxed text-slate-600 dark:text-gray-300">
                    <p class="font-light">
                        Backend-focused full-stack engineer with deep expertise in <strong class="font-semibold text-slate-900 dark:text-white">Laravel</strong> and modern PHP ecosystem.
                        Currently architecting a high-scale multi-tenant fintech wallet platform built on double-entry ledger at Squadio (Loop Payment).
                    </p>
                    <p class="font-light">
                        Obsessed with clean architecture, extreme performance, and building systems that scale gracefully under heavy load.
                        Proven track record in cutting query times by 75%, scaling to 25K+ users, and delivering complex fintech and real-time solutions.
                    </p>
                </div>

                <!-- Expertise grid -->
                <div class="pills grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4">
                    <div class="flex items-center gap-3 px-5 py-4 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl backdrop-blur transition-all duration-300 hover:border-cyan-400 dark:hover:border-cyan-500/40 hover:bg-cyan-50 dark:hover:bg-white/[0.07]">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-indigo-100 dark:bg-indigo-950/60 text-lg">🏦</span>
                        <span class="text-sm font-medium text-slate-700 dark:text-gray-200">Fintech &amp; Ledgers</span>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-4 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl backdrop-blur transition-all duration-300 hover:border-cyan-400 dark:hover:border-cyan-500/40 hover:bg-cyan-50 dark:hover:bg-white/[0.07]">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-amber-100 dark:bg-amber-950/60 text-lg">⚡</span>
                        <span class="text-sm font-medium text-slate-700 dark:text-gray-200">Performance Tuning</span>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-4 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl backdrop-blur transition-all duration-300 hover:border-cyan-400 dark:hover:border-cyan-500/40 hover:bg-cyan-50 dark:hover:bg-white/[0.07]">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-rose-100 dark:bg-rose-950/60 text-lg">🔐</span>
                        <span class="text-sm font-medium text-slate-700 dark:text-gray-200">Secure Systems</span>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-4 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl backdrop-blur transition-all duration-300 hover:border-cyan-400 dark:hover:border-cyan-500/40 hover:bg-cyan-50 dark:hover:bg-white/[0.07]">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 dark:bg-emerald-950/60 text-lg">🏗️</span>
                        <span class="text-sm font-medium text-slate-700 dark:text-gray-200">Clean Architecture</span>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-4 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl backdrop-blur transition-all duration-300 hover:border-cyan-400 dark:hover:border-cyan-500/40 hover:bg-cyan-50 dark:hover:bg-white/[0.07] sm:col-span-2">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-sky-100 dark:bg-sky-950/60 text-lg">📡</span>
                        <span class="text-sm font-medium text-slate-700 dark:text-gray-200">Real-time &amp; WebSocket</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ===================== PROJECTS ===================== --}}
<section id="projects" class="py-24 relative overflow-hidden px-auto bg-slate-50 dark:bg-[#0a0a1f]">
    
    {{-- Background glow effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(at_center,#bfdbfe_0%,transparent_60%)] dark:bg-[radial-gradient(at_center,#1e3a8a_0%,transparent_60%)] opacity-30"></div>
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-cyan-500/10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[110px]"></div>

    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        
        <div class="sec-head text-center max-w-2xl mx-auto mb-16 reveal">
            <span class="inline-block px-5 py-2 text-sm font-medium tracking-widest text-cyan-600 dark:text-cyan-400 bg-cyan-50 dark:bg-cyan-950/50 border border-cyan-200 dark:border-cyan-900/50 rounded-full mb-4">
                // SELECTED WORK
            </span>
            <h2 class="text-5xl lg:text-6xl font-semibold tracking-tighter text-slate-900 dark:text-white mb-4">
                Projects &amp; Platforms
            </h2>
            <p class="text-lg text-slate-500 dark:text-gray-400 leading-relaxed">
                From fintech ledgers to large-scale LMS platforms — production systems serving thousands of users.
            </p>
        </div>

        <div class="carousel reveal relative" data-carousel>
    
    <!-- Previous Button -->
    <button class="carousel-btn prev absolute -left-4 lg:-left-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 flex items-center justify-center 
                   bg-white/90 dark:bg-[#0f172a]/90 hover:bg-cyan-50 dark:hover:bg-cyan-950 border border-cyan-300/50 dark:border-cyan-400/30 hover:border-cyan-500 dark:hover:border-cyan-400 
                   text-cyan-600 dark:text-cyan-400 hover:text-slate-900 dark:hover:text-white rounded-full text-4xl transition-all duration-300 shadow-xl"
            data-prev aria-label="Previous project">
        ‹
    </button>

    <div class="carousel-viewport overflow-hidden rounded-3xl border border-slate-200 dark:border-white/5 bg-white/70 dark:bg-[#0f172a]/70 backdrop-blur-md">
        <div class="carousel-track flex transition-transform duration-700" data-track>
            @foreach($projects as $project)
                <article class="slide min-w-full px-8 py-10 lg:p-12 flex flex-col lg:flex-row gap-10 lg:gap-16 items-center">
                    
                    <!-- Media -->
                    <div class="slide-media w-full lg:w-5/12 relative group">
                        @if($project->image_url)
                            <div class="aspect-video overflow-hidden rounded-2xl border border-cyan-200 dark:border-cyan-900/30 shadow-2xl shadow-cyan-100 dark:shadow-cyan-950/50">
                                <img src="{{ $project->image_url }}" 
                                     alt="{{ $project->title }}" 
                                     loading="lazy"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                        @else
                            <div class="aspect-video bg-gradient-to-br from-cyan-100 to-indigo-100 dark:from-cyan-900/30 dark:to-indigo-900/30 rounded-2xl flex items-center justify-center border border-cyan-200 dark:border-cyan-900/30">
                                <span class="text-6xl text-cyan-400/40 dark:text-cyan-400/30">{{ $project->category }}</span>
                            </div>
                        @endif
                        
                        @if($project->featured)
                            <span class="badge-featured absolute top-4 right-4 px-4 py-1.5 text-xs font-semibold bg-gradient-to-r from-amber-400 to-yellow-500 text-black rounded-full shadow-lg">
                                ★ Featured
                            </span>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="slide-info w-full lg:w-7/12 space-y-6">
                        <span class="cat inline-block px-4 py-1 text-xs font-semibold tracking-widest uppercase bg-cyan-50 dark:bg-cyan-950 text-cyan-600 dark:text-cyan-400 border border-cyan-200 dark:border-cyan-800 rounded-lg">
                            {{ $project->category }}
                        </span>
                        
                        <h3 class="text-3xl font-semibold text-slate-900 dark:text-white tracking-tight leading-tight">
                            {{ $project->title }}
                        </h3>
                        
                        <p class="desc text-slate-600 dark:text-gray-300 text-[17px] leading-relaxed">
                            {{ $project->summary }}
                        </p>

                        @if($project->tech_stack)
                            <div class="tags flex flex-wrap gap-2 pt-2">
                                @foreach(array_slice($project->tech_stack, 0, 6) as $tech)
                                    <span class="tag px-4 py-1.5 text-xs bg-slate-50 dark:bg-white/5 hover:bg-cyan-50 dark:hover:bg-cyan-950 border border-slate-200 dark:border-white/10 hover:border-cyan-400 dark:hover:border-cyan-700 rounded-xl text-slate-600 dark:text-gray-300 transition-colors">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <div class="slide-cta flex flex-wrap gap-4 pt-6">
                            <a href="{{ route('projects.show', $project) }}" 
                               class="btn btn-primary inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-white font-semibold rounded-2xl transition-all duration-300">
                                View case study →
                            </a>
                            @if($project->url)
                                <a href="{{ $project->url }}" target="_blank" rel="noopener"
                                   class="btn btn-ghost inline-flex items-center gap-2 px-8 py-4 border border-slate-300 dark:border-white/20 hover:border-cyan-500 dark:hover:border-cyan-400 text-slate-700 dark:text-gray-200 hover:text-slate-900 dark:hover:text-white rounded-2xl transition-all duration-300">
                                    Live site ↗
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>

    <!-- Next Button -->
    <button class="carousel-btn next absolute -right-4 lg:-right-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 flex items-center justify-center 
                   bg-white/90 dark:bg-[#0f172a]/90 hover:bg-cyan-50 dark:hover:bg-cyan-950 border border-cyan-300/50 dark:border-cyan-400/30 hover:border-cyan-500 dark:hover:border-cyan-400 
                   text-cyan-600 dark:text-cyan-400 hover:text-slate-900 dark:hover:text-white rounded-full text-4xl transition-all duration-300 shadow-xl"
            data-next aria-label="Next project">
        ›
    </button>

    <!-- Dots -->
    <div class="carousel-dots flex justify-center gap-3 mt-10" data-dots>
        @foreach($projects as $i => $project)
            <button class="dot w-3 h-3 rounded-full bg-slate-300 dark:bg-white/20 hover:bg-cyan-500 dark:hover:bg-cyan-400 transition-all {{ $i === 0 ? 'active !bg-cyan-500 dark:!bg-cyan-400 scale-125' : '' }}" 
                    data-dot="{{ $i }}"></button>
        @endforeach
    </div>
</div>
    </div>
</section>

{{-- ===================== SKILLS ===================== --}}
<section id="skills" class="py-24 relative overflow-hidden bg-white dark:bg-[#0a0a1f]">
    
    {{-- Background glow effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(at_center,#bfdbfe_0%,transparent_70%)] dark:bg-[radial-gradient(at_center,#1e3a8a_0%,transparent_70%)] opacity-20 dark:opacity-30"></div>
    <div class="absolute top-10 left-10 w-[500px] h-[500px] bg-cyan-500/10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-10 right-10 w-[600px] h-[600px] bg-indigo-500/10 rounded-full blur-[130px]"></div>

    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        
        <div class="sec-head text-center max-w-2xl mx-auto mb-16 reveal">
            <span class="inline-block px-5 py-2 text-sm font-medium tracking-widest text-cyan-600 dark:text-cyan-400 bg-cyan-50 dark:bg-cyan-950/50 border border-cyan-200 dark:border-cyan-900/50 rounded-full mb-4">
                // THE TOOLBOX
            </span>
            <h2 class="text-5xl lg:text-6xl font-semibold tracking-tighter text-slate-900 dark:text-white mb-4">
                Technical Skills
            </h2>
            <p class="text-lg text-slate-500 dark:text-gray-400 leading-relaxed">
                A backend-first stack built around Laravel, performance tuning, and clean architecture.
            </p>
        </div>

        <div class="skills-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($skills as $category => $items)
                <div class="skill-group bg-white dark:bg-[#0f172a]/70 backdrop-blur-md border border-slate-200 dark:border-white/5 shadow-sm dark:shadow-none rounded-3xl p-8 hover:border-cyan-300 dark:hover:border-cyan-900/50 transition-all duration-500 group">
                    
                    <!-- Category Header -->
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-2xl shadow-lg shadow-cyan-500/30">
                            <!-- يمكنك استبدالها بأيقونة حقيقية -->
                            <span class="text-white">{{ substr($category, 0, 1) }}</span>
                        </div>
                        <h4 class="text-2xl font-semibold text-slate-900 dark:text-white tracking-tight">
                            {{ $category }}
                        </h4>
                    </div>

                    <div class="space-y-7">
                        @foreach($items as $skill)
                            <div class="skill-row group/skill">
                                <div class="top flex justify-between items-baseline mb-2.5">
                                    <span class="text-slate-700 dark:text-gray-200 font-medium">{{ $skill->name }}</span>
                                    <span class="pct text-cyan-600 dark:text-cyan-400 font-mono text-sm font-semibold">
                                        {{ $skill->level }}%
                                    </span>
                                </div>
                                
                                <!-- Progress Bar -->
                                <div class="bar h-2.5 bg-slate-100 dark:bg-white/5 rounded-2xl overflow-hidden border border-slate-200 dark:border-white/5">
                                    <div class="h-full bg-gradient-to-r from-cyan-400 to-blue-500 rounded-2xl transition-all duration-700 ease-out"
                                         style="width: {{ $skill->level }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== EXPERIENCE ===================== --}}
<section id="experience" class="py-24 relative overflow-hidden bg-slate-50 dark:bg-[#0a0a1f]">
    
    {{-- Background glow effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(at_center,#bfdbfe_0%,transparent_70%)] dark:bg-[radial-gradient(at_center,#1e3a8a_0%,transparent_70%)] opacity-20 dark:opacity-30"></div>
    <div class="absolute top-20 left-1/3 w-[500px] h-[500px] bg-cyan-500/10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-20 right-1/4 w-[600px] h-[600px] bg-indigo-500/10 rounded-full blur-[140px]"></div>

    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        
        <div class="sec-head text-center max-w-2xl mx-auto mb-16 reveal">
            <span class="inline-block px-5 py-2 text-sm font-medium tracking-widest text-cyan-600 dark:text-cyan-400 bg-cyan-50 dark:bg-cyan-950/50 border border-cyan-200 dark:border-cyan-900/50 rounded-full mb-4">
                // THE JOURNEY
            </span>
            <h2 class="text-5xl lg:text-6xl font-semibold tracking-tighter text-slate-900 dark:text-white mb-4">
                Professional Experience
            </h2>
            <p class="text-lg text-slate-500 dark:text-gray-400 leading-relaxed">
                Three+ years shipping backend systems across fintech, EdTech, and SaaS.
            </p>
        </div>

        <!-- Timeline -->
        <div class="timeline max-w-3xl mx-auto relative">
            
            <!-- Vertical Line -->
            <div id="timeline-line" 
                 class="absolute left-8 top-6 bottom-6 w-[3px] bg-gradient-to-b from-cyan-500/40 dark:from-cyan-400/30 via-cyan-500/25 dark:via-cyan-500/20 to-transparent origin-top scale-y-0 transition-transform duration-1000"></div>

            @foreach($experiences as $index => $exp)
                <div class="tl-item relative pl-20 pb-16 last:pb-0 group reveal"
                     data-index="{{ $index }}">
                    
                    <!-- Node -->
                    <span class="node absolute left-6 top-2 w-5 h-5 rounded-full border-4 border-cyan-500 dark:border-cyan-400 bg-white dark:bg-[#0a0a1f] z-10 
                                 scale-0 transition-all duration-500 group-hover:scale-110"></span>
                    
                    <!-- Content Card -->
                    <div class="card bg-white dark:bg-[#0f172a]/70 backdrop-blur-md border border-slate-200 dark:border-white/5 hover:border-cyan-300 dark:hover:border-cyan-900 rounded-3xl p-8 transition-all duration-700 shadow-sm dark:shadow-none hover:shadow-2xl hover:shadow-cyan-100 dark:hover:shadow-cyan-950/50 translate-x-8 opacity-0">
                        
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-5">
                            <span class="period inline-block px-4 py-1.5 text-sm font-mono tracking-widest text-cyan-600 dark:text-cyan-400 bg-cyan-50 dark:bg-cyan-950/50 border border-cyan-200 dark:border-cyan-900/50 rounded-2xl">
                                {{ $exp->period }}
                            </span>
                            <span class="company text-slate-500 dark:text-gray-400 font-medium">{{ $exp->company }}</span>
                        </div>

                        <h4 class="text-2xl font-semibold text-slate-900 dark:text-white tracking-tight mb-4">
                            {{ $exp->role }}
                        </h4>

                        @if($exp->highlights)
                            <ul class="space-y-3 text-slate-600 dark:text-gray-300">
                                @foreach($exp->highlights as $h)
                                    <li class="flex gap-3">
                                        <span class="text-cyan-600 dark:text-cyan-400 mt-1.5 text-xl leading-none">›</span>
                                        <span>{{ $h }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.tl-item');
    const line = document.getElementById('timeline-line');
    let animated = false;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, idx) => {
            if (entry.isIntersecting) {
                const item = entry.target;
                const card = item.querySelector('.card');
                const node = item.querySelector('.node');

                // Staggered animation
                setTimeout(() => {
                    card.classList.remove('translate-x-8', 'opacity-0');
                    card.classList.add('translate-x-0', 'opacity-100');

                    node.classList.remove('scale-0');
                    node.classList.add('scale-100');
                }, idx * 150);

                // Animate the vertical line once
                if (!animated) {
                    animated = true;
                    line.style.transform = 'scaleY(1)';
                }
            }
        });
    }, {
        threshold: 0.2,
        rootMargin: "-80px 0px -50px 0px"
    });

    items.forEach(item => observer.observe(item));
});
</script>

{{-- ===================== TESTIMONIALS ===================== --}}
@if($testimonials->count())
<section id="testimonials" class="py-20 relative overflow-hidden bg-white dark:bg-[#0a0a1f]">
    
    {{-- Background glow effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(at_center,#bfdbfe_0%,transparent_70%)] dark:bg-[radial-gradient(at_center,#1e3a8a_0%,transparent_70%)] opacity-20 dark:opacity-30"></div>
    <div class="absolute top-32 left-1/4 w-[600px] h-[600px] bg-cyan-500/10 rounded-full blur-[130px]"></div>
    <div class="absolute bottom-20 right-1/3 w-[500px] h-[500px] bg-violet-500/10 rounded-full blur-[120px]"></div>

    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        
        {{-- Section Header --}}
        <div class="max-w-2xl reveal mb-16 lg:mb-20">
            <span class="inline-block px-6 py-2.5 text-sm font-medium tracking-widest text-cyan-600 dark:text-cyan-400 bg-cyan-50 dark:bg-cyan-950/50 border border-cyan-200 dark:border-cyan-900/50 rounded-full mb-6">
                // CLIENT REVIEWS
            </span>
            <h2 class="text-4xl lg:text-5xl font-semibold tracking-tighter text-slate-900 dark:text-white leading-tight">
                Read reviews,<br>
                <span class="text-cyan-600 dark:text-cyan-400">hire with confidence.</span>
            </h2>

            <div class="flex items-center gap-3 mt-8">
                <span class="text-2xl font-semibold text-slate-900 dark:text-white">
                    {{ number_format($testimonials->avg('rating'), 1) }}/5
                </span>
                <span class="text-emerald-500 dark:text-emerald-400 text-2xl">★</span>
                <span class="text-slate-400 dark:text-gray-400">·</span>
                <span class="text-slate-500 dark:text-gray-400">Based on {{ $testimonials->count() }} reviews</span>
            </div>
        </div>

        <div class="grid lg:grid-cols-[280px_1fr] gap-10 lg:gap-16 items-start">

            {{-- Fixed Left Panel --}}
            <div class="reveal lg:sticky lg:top-32">
                <span class="block text-8xl leading-none text-cyan-500/20 dark:text-cyan-400/20 font-serif mb-6">"</span>
                
                <h3 class="text-3xl font-semibold text-slate-900 dark:text-white mb-8 leading-tight">
                    What our customers are saying
                </h3>

                <div class="flex items-center gap-4" id="testimonial-controls">
                    <button onclick="prevTestimonial()" 
                            class="w-11 h-11 flex items-center justify-center rounded-2xl border border-cyan-300 dark:border-cyan-900 hover:border-cyan-500 dark:hover:border-cyan-400 text-cyan-600 dark:text-cyan-400 hover:text-slate-900 dark:hover:text-white transition-all text-2xl">
                        ←
                    </button>

                    <div class="flex-1 h-px bg-slate-200 dark:bg-white/10 relative overflow-hidden rounded-full">
                        <div id="testimonial-progress" 
                             class="absolute inset-y-0 left-0 bg-gradient-to-r from-cyan-400 to-violet-400 transition-all duration-700 ease-out"
                             style="width:0%"></div>
                    </div>

                    <button onclick="nextTestimonial()" 
                            class="w-11 h-11 flex items-center justify-center rounded-2xl border border-cyan-300 dark:border-cyan-900 hover:border-cyan-500 dark:hover:border-cyan-400 text-cyan-600 dark:text-cyan-400 hover:text-slate-900 dark:hover:text-white transition-all text-2xl">
                        →
                    </button>
                </div>
            </div>

            {{-- Carousel --}}
            <div class="overflow-hidden" id="testimonial-carousel">
                <div class="flex gap-6 transition-transform duration-700 ease-out" id="testimonial-track" style="will-change: transform;">
                    @foreach($testimonials as $t)
                        <figure class="testimonial-card min-w-[300px] sm:min-w-[340px] bg-white dark:bg-[#0f172a]/80 backdrop-blur-xl border border-slate-200 dark:border-white/5 hover:border-cyan-400/60 dark:hover:border-cyan-400/50 rounded-3xl p-8 flex flex-col shadow-sm dark:shadow-none transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-100 dark:hover:shadow-cyan-500/10">
                            
                            <blockquote class="text-[15.5px] leading-relaxed text-slate-600 dark:text-gray-300 mb-10">
                                "{{ $t->body }}"
                            </blockquote>

                            <div class="stars flex text-lg text-emerald-500 dark:text-emerald-400 mb-8 mt-auto">
                                @for($i = 0; $i < $t->rating; $i++) ★ @endfor
                            </div>

                            <figcaption class="flex items-center gap-4">
                                <div class="avatar w-11 h-11 flex items-center justify-center bg-gradient-to-br from-cyan-500 to-violet-600 text-white font-semibold rounded-2xl flex-shrink-0">
                                    {{ strtoupper(substr($t->name, 0, 1)) }}
                                </div>
                                <div>
                                    <strong class="block text-slate-900 dark:text-white">{{ $t->name }}</strong>
                                    <span class="text-xs text-slate-500 dark:text-gray-400">
                                        {{ $t->project }} · {{ $t->source }}
                                    </span>
                                </div>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    (function() {
        const track     = document.getElementById('testimonial-track');
        const viewport  = document.getElementById('testimonial-carousel');
        const slides    = document.querySelectorAll('.testimonial-card');
        const progress  = document.getElementById('testimonial-progress');
        const total     = slides.length;

        let currentIndex = 0;
        let autoSlide;

        function visibleCount() {
            if (window.innerWidth >= 1024) return 2.8;
            if (window.innerWidth >= 768)  return 2;
            return 1.1;
        }

        function maxIndex() {
            return Math.max(0, total - visibleCount());
        }

        function step() {
            const card = slides[0];
            const gap = 24; // gap-6 = 1.5rem = 24px
            return card.getBoundingClientRect().width + gap;
        }

        function update() {
            const translateX = -currentIndex * step();
            track.style.transform = `translateX(${translateX}px)`;
            
            const max = maxIndex();
            progress.style.width = max === 0 ? '100%' : `${(currentIndex / max) * 100}%`;
        }

        window.nextTestimonial = function() {
            currentIndex = currentIndex >= maxIndex() ? 0 : currentIndex + 1;
            update();
        };

        window.prevTestimonial = function() {
            currentIndex = currentIndex <= 0 ? maxIndex() : currentIndex - 1;
            update();
        };

        function startAuto() {
            autoSlide = setInterval(window.nextTestimonial, 2800);
        }

        // Event Listeners
        viewport.addEventListener('mouseenter', () => clearInterval(autoSlide));
        viewport.addEventListener('mouseleave', startAuto);
        window.addEventListener('resize', update);

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            update();
            startAuto();
        });
    })();
</script>
@endif

{{-- ===================== CONTACT ===================== --}}
<section id="contact" class="relative overflow-hidden bg-[#f0f4fb] dark:bg-[#132148]">

    {{-- Top dark hero with diagonal cut --}}
    <div class="relative pt-12 pb-[150px]">
        <div class="max-w-3xl mx-auto text-center px-6">
            <h2 class="text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-slate-900 to-slate-500 dark:from-white dark:to-slate-400 bg-clip-text text-transparent">
                Feel free to get in touch
            </h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400">
                With over 20 years of experience, we can deliver great results for your online business without additional costs or commitments.
            </p>
        </div>

        {{-- diagonal divider into light section --}}
        <div class="absolute bottom-0 left-0 w-full h-12 bg-white [clip-path:polygon(0_100%,100%_0,100%_100%)]"></div>
    </div>

    {{-- Light section holding the two cards --}}
    <div class="relative bg-white py-20">
        <div class="max-w-6xl mx-auto px-6 -mt-40 md:-mt-48 grid md:grid-cols-2 gap-10 items-start">

            {{-- Leave your message --}}
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Leave your message</h3>

                @if(session('contact_success'))
                    <div class="mb-4 rounded-lg bg-green-50 text-green-700 text-sm px-4 py-3">
                        {{ session('contact_success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-900 mb-2">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Your Name" required
                                class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                            @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-900 mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required
                                class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                            @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-semibold text-slate-900 mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Subject"
                            class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                        @error('subject') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-slate-900 mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Message" required
                            class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 placeholder-slate-400 resize-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">{{ old('message') }}</textarea>
                        @error('message') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <label class="flex items-center gap-2 text-sm text-slate-500">
                            <input type="checkbox" name="agree" required
                                class="h-4 w-4 rounded-full border-slate-300 text-indigo-600 focus:ring-indigo-500">
                            I agree to the privacy policy
                        </label>

                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-full bg-indigo-600 hover:bg-indigo-700 transition px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-200">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            {{-- Contact info --}}
            <div class="pt-2 md:pt-24">
                <h3 class="text-3xl font-extrabold text-slate-900">Don't hesitate to <span class="text-slate-500">contact us</span></h3>
                <p class="mt-4 text-slate-500 leading-relaxed">
                    I usually reply within a day. Whether it's a fintech ledger, a real-time app, or scaling an existing Laravel codebase — let's talk.
                </p>

                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-start gap-4 rounded-xl border border-slate-100 shadow-sm p-5 bg-white">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 text-lg">📍</span>
                        <div>
                            <p class="font-semibold text-slate-900">Office</p>
                            <p class="text-sm text-slate-500">{{ config('portfolio.location') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 rounded-xl border border-slate-100 shadow-sm p-5 bg-white">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-orange-100 text-orange-500 text-lg">📱</span>
                        <div>
                            <p class="font-semibold text-slate-900">Phone</p>
                            <p class="text-sm text-slate-500">{{ config('portfolio.phone') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 rounded-xl border border-slate-100 shadow-sm p-5 bg-white">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-purple-100 text-purple-600 text-lg">🕐</span>
                        <div>
                            <p class="font-semibold text-slate-900">Work Hours</p>
                            <p class="text-sm text-slate-500">Everyday 09 am - 07 pm</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 rounded-xl border border-slate-100 shadow-sm p-5 bg-white">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-green-100 text-green-600 text-lg">✉️</span>
                        <div>
                            <p class="font-semibold text-slate-900">Email</p>
                            <p class="text-sm text-slate-500">{{ config('portfolio.email') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 border-t border-slate-100 pt-6 flex items-center justify-between">
                    <span class="font-semibold text-slate-900">Social Media :</span>
                    <div class="flex items-center gap-3">
                        <a href="{{ config('portfolio.socials.github') }}" target="_blank" rel="noopener"
                           class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-600 text-white text-xs font-semibold hover:opacity-90">GH</a>
                        <a href="{{ config('portfolio.socials.linkedin') }}" target="_blank" rel="noopener"
                           class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-200 text-slate-500 text-xs font-semibold hover:bg-slate-50">in</a>
                        <a href="{{ config('portfolio.socials.mostaql') }}" target="_blank" rel="noopener"
                           class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-200 text-slate-500 text-xs font-semibold hover:bg-slate-50">Mo</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- diagonal divider into bottom dark banner --}}
        <div class="absolute bottom-0 left-0 w-full h-24 dark:bg-[#0a0e2e] bg-slate-100 [clip-path:polygon(0_0,100%_100%,0_100%)]"></div>
    </div>

    {{-- Bottom CTA banner --}}
    <div class="relative  bg-gradient-to-r from-slate-900 to-slate-500 dark:from-white dark:to-slate-400 bg-clip-text pt-12 pb-12 text-center px-6">
        <span class="inline-flex items-center gap-2 rounded-full bg-white/10 dark:text-slate-300 text-slate-900 text-xs font-medium px-4 py-1.5">
            📣 We Ready 24 Hours
        </span>

        <h3 class="mt-6 text-3xl md:text-4xl font-extrabold">
            <span class="dark:text-white text-gray-800">Have a project in mind?</span>
            <span class="text-slate-500">Let's Talk</span>
        </h3>

        

        <a href="tel:{{ config('portfolio.phone') }}"
           class="mt-8 inline-flex items-center gap-3 rounded-full bg-indigo-600 hover:bg-indigo-700 transition px-7 py-3.5 text-sm font-semibold text-white">
            {{ config('portfolio.phone') }}
            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-white/20">📞</span>
        </a>
    </div>
</section>
@endsection