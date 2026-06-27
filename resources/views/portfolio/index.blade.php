@extends('layouts.app')

@section('content')
{{-- ===================== HERO ===================== --}}
<header class="hero">
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="container">
        <div class="hero-grid">
            {{-- Left: copy --}}
            <div class="hero-copy">
                <div class="hero-badge reveal">
                    <span class="pulse"></span> Available for backend &amp; full-stack work
                </div>
                <h1 class="reveal">
                    Backend engineering that
                    <span class="gradient-text">scales,&nbsp;secures<br>&amp; performs.</span>
                </h1>
                <p class="lead reveal">{{ config('portfolio.tagline') }}</p>
                <div class="hero-cta reveal">
                    <a href="#projects" class="btn btn-primary">View my work →</a>
                    <a href="#contact" class="btn btn-ghost">Get in touch</a>
                </div>
                <div class="hero-meta reveal">
                    <span>📍 {{ config('portfolio.location') }}</span>
                    <span>💼 {{ config('portfolio.role') }}</span>
                </div>
            </div>

            {{-- Right: portrait + code accent --}}
            <div class="hero-visual reveal">
                <div class="hero-portrait">
                    <span class="hero-portrait-ring"></span>
                    <img src="{{ asset('images/osama.jpg') }}" alt="{{ config('portfolio.name') }}"
                         onerror="this.closest('.hero-portrait').classList.add('no-img')">
                    <div class="hero-portrait-fallback">{{ \Illuminate\Support\Str::of(config('portfolio.name'))->explode(' ')->map(fn($w)=>mb_substr($w,0,1))->take(2)->implode('') }}</div>

                    <div class="float-badge float-badge-1">⚡ Laravel</div>
                    <div class="float-badge float-badge-2">🐘 PHP 8</div>
                    <div class="float-badge float-badge-3">🏦 Fintech</div>
                </div>

                <div class="hero-code">
                    <span class="hero-code-dots"><i></i><i></i><i></i></span>
                    <pre><code><span class="c-kw">class</span> <span class="c-cls">Osama</span> <span class="c-kw">extends</span> <span class="c-cls">Engineer</span> {
  <span class="c-fn">public function</span> <span class="c-fn">build</span>() {
    <span class="c-kw">return</span> <span class="c-str">'clean, fast, secure'</span>;
  }
}</code></pre>
                </div>
            </div>
        </div>

        <div class="stats reveal">
            @foreach(config('portfolio.stats') as $stat)
                <div class="stat">
                    <div class="num gradient-text">{{ $stat['value'] }}</div>
                    <div class="lbl">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</header>

{{-- ===================== ABOUT ===================== --}}
<section id="about" class="section">
    <div class="container">
        <div class="about-grid">
            <div class="about-photo reveal">
                <span class="ring"></span>
                <img src="{{ asset('images/osama.jpg') }}" alt="{{ config('portfolio.name') }}"
                     onerror="this.style.display='none'">
            </div>
            <div class="about-text reveal">
                <span class="eyebrow" style="font-family:var(--mono);color:var(--brand);font-size:.8rem;letter-spacing:.2em;text-transform:uppercase;">// about me</span>
                <h3 style="margin-top:12px;">Hi, I'm {{ config('portfolio.name') }} 👋</h3>
                <p>I'm a backend-focused engineer specializing in <strong>Laravel</strong> and modern PHP. Currently building a multi-tenant fintech wallet platform on a double-entry ledger at Squadio (Loop Payment) — card top-ups, idempotent payouts, recurring billing, and POS settlement.</p>
                <p>I care about clean architecture, query performance, and systems that hold up under real traffic. I've cut query times by 75%, scaled APIs to 25K+ users, and shipped LMS, fintech, and real-time products end to end.</p>
                <div class="pills">
                    <span>🏦 Fintech &amp; Ledgers</span>
                    <span>⚡ Performance Tuning</span>
                    <span>🔐 Secure APIs</span>
                    <span>🏗️ Clean Architecture</span>
                    <span>📡 Real-time / WebSocket</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== PROJECTS ===================== --}}
<section id="projects" class="section" style="background:var(--bg-2);">
    <div class="container">
        <div class="sec-head reveal">
            <span class="eyebrow">// selected work</span>
            <h2>Projects &amp; Platforms</h2>
            <p>From fintech ledgers to large-scale LMS platforms — production systems serving thousands of users.</p>
        </div>

        <div class="carousel reveal" data-carousel>
            <button class="carousel-btn prev" data-prev aria-label="Previous project">‹</button>

            <div class="carousel-viewport">
                <div class="carousel-track" data-track>
                    @foreach($projects as $project)
                        <article class="slide">
                            <div class="slide-media">
                                @if($project->image_url)
                                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" loading="lazy">
                                @else
                                    <div class="slide-noimg">{{ $project->category }}</div>
                                @endif
                                @if($project->featured)
                                    <span class="badge-featured">★ Featured</span>
                                @endif
                            </div>

                            <div class="slide-info">
                                <span class="cat">{{ $project->category }}</span>
                                <h3>{{ $project->title }}</h3>
                                <p class="desc">{{ $project->summary }}</p>

                                @if($project->tech_stack)
                                    <div class="tags">
                                        @foreach(array_slice($project->tech_stack, 0, 6) as $tech)
                                            <span class="tag">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="slide-cta">
                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View case study →</a>
                                    @if($project->url)
                                        <a href="{{ $project->url }}" target="_blank" rel="noopener" class="btn btn-ghost">Live site ↗</a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <button class="carousel-btn next" data-next aria-label="Next project">›</button>

            <div class="carousel-dots" data-dots>
                @foreach($projects as $i => $project)
                    <button class="dot {{ $i === 0 ? 'active' : '' }}" data-dot="{{ $i }}" aria-label="Go to project {{ $i + 1 }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ===================== SKILLS ===================== --}}
<section id="skills" class="section">
    <div class="container">
        <div class="sec-head reveal">
            <span class="eyebrow">// the toolbox</span>
            <h2>Technical Skills</h2>
            <p>A backend-first stack built around Laravel, performance tuning, and clean architecture.</p>
        </div>

        <div class="skills-grid">
            @foreach($skills as $category => $items)
                <div class="skill-group reveal">
                    <h4><span class="ico"></span> {{ $category }}</h4>
                    @foreach($items as $skill)
                        <div class="skill-row">
                            <div class="top">
                                <span>{{ $skill->name }}</span>
                                <span class="pct">{{ $skill->level }}%</span>
                            </div>
                            <div class="bar"><i data-level="{{ $skill->level }}"></i></div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== EXPERIENCE ===================== --}}
<section id="experience" class="section">
    <div class="container">
        <div class="sec-head reveal">
            <span class="eyebrow">// the journey</span>
            <h2>Professional Experience</h2>
            <p>Three+ years shipping backend systems across fintech, EdTech, and SaaS.</p>
        </div>

        <div class="timeline">
            @foreach($experiences as $exp)
                <div class="tl-item reveal">
                    <span class="node"></span>
                    <span class="period">{{ $exp->period }}</span>
                    <h4>{{ $exp->role }}</h4>
                    <span class="company">{{ $exp->company }}</span>
                    @if($exp->highlights)
                        <ul>
                            @foreach($exp->highlights as $h)
                                <li>{{ $h }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== TESTIMONIALS ===================== --}}
@if($testimonials->count())
<section id="testimonials" class="section" style="background:var(--bg-2);">
    <div class="container">
        <div class="sec-head reveal">
            <span class="eyebrow">// client reviews</span>
            <h2>What clients say</h2>
            <p>{{ $testimonials->count() }} five-star reviews from verified Mostaql clients — averaging a perfect 5.0 / 5.0.</p>
        </div>

        <div class="testimonials-grid">
            @foreach($testimonials as $t)
                <figure class="testimonial-card reveal">
                    <div class="stars">
                        @for($i = 0; $i < $t->rating; $i++)★@endfor
                    </div>
                    <blockquote>“{{ $t->body }}”</blockquote>
                    <figcaption>
                        <div class="avatar">{{ strtoupper(substr($t->name, 0, 1)) }}</div>
                        <div>
                            <strong>{{ $t->name }}</strong>
                            <span class="t-meta">{{ $t->project }} · {{ $t->source }}</span>
                        </div>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================== CONTACT ===================== --}}
<section id="contact" class="section">
    <div class="container">
        <div class="sec-head reveal">
            <span class="eyebrow">// say hello</span>
            <h2>Let's build something</h2>
            <p>Have a backend, API, or full-stack project in mind? Drop me a message.</p>
        </div>

        <div class="contact-wrap reveal">
            <div class="contact-info">
                <h3>Get in touch</h3>
                <p class="muted">I usually reply within a day. Whether it's a fintech ledger, a real-time app, or scaling an existing Laravel codebase — let's talk.</p>

                <div class="row"><span class="ic">✉️</span> {{ config('portfolio.email') }}</div>
                <div class="row"><span class="ic">📱</span> {{ config('portfolio.phone') }}</div>
                <div class="row"><span class="ic">📍</span> {{ config('portfolio.location') }}</div>

                <div class="socials">
                    <a href="{{ config('portfolio.socials.github') }}" target="_blank" rel="noopener" title="GitHub">GH</a>
                    <a href="{{ config('portfolio.socials.linkedin') }}" target="_blank" rel="noopener" title="LinkedIn">in</a>
                    <a href="{{ config('portfolio.socials.mostaql') }}" target="_blank" rel="noopener" title="Mostaql">Mo</a>
                </div>
            </div>

            <div class="form-card">
                @if(session('contact_success'))
                    <div class="alert alert-success">{{ session('contact_success') }}</div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}">
                        @error('subject') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                        @error('message') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">Send message →</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
