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
        @if($project->image_url)
            <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="reveal"
                 style="width:100%;border-radius:20px;border:1px solid var(--border);box-shadow:var(--shadow);margin-bottom:40px;">
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
@endsection
