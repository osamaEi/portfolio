@extends('layouts.app')

@section('title', $project->title . ' — ' . config('portfolio.name'))

@section('content')
<header class="hero" style="padding-bottom:40px;">
    <div class="container">
        <a href="{{ route('home') }}#projects" class="project-link reveal" style="display:inline-block;margin-bottom:24px;">← Back to projects</a>
        <div class="hero-badge reveal"><span class="cat" style="margin:0;color:var(--accent);">{{ $project->category }}</span></div>
        <h1 class="reveal" style="font-size:clamp(2.2rem,5vw,3.6rem);">{{ $project->title }}</h1>
        <p class="lead reveal">{{ $project->summary }}</p>
        @if($project->url)
            <div class="hero-cta reveal">
                <a href="{{ $project->url }}" target="_blank" rel="noopener" class="btn btn-primary">Visit live site ↗</a>
            </div>
        @endif
    </div>
</header>

<section class="section" style="padding-top:20px;">
    <div class="container" style="max-width:860px;">
        @php($gallery = $project->gallery)

        @if($gallery)
            <img src="{{ $gallery[0] }}" alt="{{ $project->title }}" class="reveal gallery-item" data-index="0"
                 style="width:100%;border-radius:20px;border:1px solid var(--border);box-shadow:var(--shadow);margin-bottom:16px;cursor:zoom-in;">

            @if(count($gallery) > 1)
                <div class="reveal" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:14px;margin-bottom:40px;">
                    @foreach(array_slice($gallery, 1) as $i => $src)
                        <img src="{{ $src }}" alt="{{ $project->title }} screenshot" class="gallery-item" data-index="{{ $i + 1 }}"
                             style="width:100%;height:100px;object-fit:cover;border-radius:12px;border:1px solid var(--border);cursor:zoom-in;">
                    @endforeach
                </div>
            @else
                <div style="margin-bottom:40px;"></div>
            @endif
        @endif

        @if($project->tech_stack)
            <div class="tags reveal" style="margin-bottom:34px;">
                @foreach($project->tech_stack as $tech)
                    <span class="tag">{{ $tech }}</span>
                @endforeach
            </div>
        @endif

        <div class="reveal" style="font-size:1.08rem;color:var(--text);line-height:1.8;">
            {!! nl2br(e($project->description ?: $project->summary)) !!}
        </div>

        <div class="reveal" style="margin-top:50px;">
            <a href="{{ route('home') }}#contact" class="btn btn-primary">Discuss a similar project →</a>
        </div>
    </div>
</section>

@if($gallery ?? false)
<div id="lightbox" role="dialog" aria-modal="true" aria-label="Project image viewer"
     style="display:none;position:fixed;inset:0;z-index:999;background:rgba(0,0,0,.92);align-items:center;justify-content:center;">
    <img id="lightboxImg" alt="" style="max-width:92vw;max-height:86vh;border-radius:12px;">
    <button id="lightboxClose" aria-label="Close" style="position:absolute;top:20px;right:26px;font-size:2rem;background:none;border:0;color:#fff;cursor:pointer;">×</button>
    @if(count($gallery) > 1)
        <button id="lightboxPrev" aria-label="Previous image" style="position:absolute;left:20px;font-size:2.4rem;background:none;border:0;color:#fff;cursor:pointer;">‹</button>
        <button id="lightboxNext" aria-label="Next image" style="position:absolute;right:20px;font-size:2.4rem;background:none;border:0;color:#fff;cursor:pointer;">›</button>
    @endif
</div>

<script>
(function () {
    const sources = @json($gallery);
    const box = document.getElementById('lightbox');
    const img = document.getElementById('lightboxImg');
    let current = 0;

    const show = i => {
        current = (i + sources.length) % sources.length;
        img.src = sources[current];
    };
    const open = i => { show(i); box.style.display = 'flex'; document.body.style.overflow = 'hidden'; };
    const close = () => { box.style.display = 'none'; document.body.style.overflow = ''; };

    document.querySelectorAll('.gallery-item').forEach(el => {
        el.addEventListener('click', () => open(Number(el.dataset.index)));
    });

    document.getElementById('lightboxClose').addEventListener('click', close);
    document.getElementById('lightboxPrev')?.addEventListener('click', () => show(current - 1));
    document.getElementById('lightboxNext')?.addEventListener('click', () => show(current + 1));

    // Clicking the backdrop (but not the image itself) closes the viewer.
    box.addEventListener('click', e => { if (e.target === box) close(); });

    document.addEventListener('keydown', e => {
        if (box.style.display !== 'flex') return;
        if (e.key === 'Escape') close();
        if (e.key === 'ArrowLeft') show(current - 1);
        if (e.key === 'ArrowRight') show(current + 1);
    });
})();
</script>
@endif
@endsection
