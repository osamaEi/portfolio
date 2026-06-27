@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
<div class="topbar">
    <div>
        <h1>Dashboard</h1>
        <div class="sub">Welcome back, {{ auth()->user()->name }}.</div>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ New project</a>
</div>

<div class="stat-grid">
    <div class="stat-card"><div class="n">{{ $stats['projects'] }}</div><div class="l">Projects</div></div>
    <div class="stat-card"><div class="n">{{ $stats['skills'] }}</div><div class="l">Skills</div></div>
    <div class="stat-card"><div class="n">{{ $stats['experiences'] }}</div><div class="l">Experiences</div></div>
    <div class="stat-card accent"><div class="n">{{ $stats['unread'] }}</div><div class="l">Unread messages</div></div>
</div>

<div class="panel">
    <h3>Recent messages</h3>
    @if($recentMessages->isEmpty())
        <div class="empty">No messages yet.</div>
    @else
        <table>
            <thead><tr><th></th><th>From</th><th>Subject</th><th>Received</th><th></th></tr></thead>
            <tbody>
            @foreach($recentMessages as $m)
                <tr>
                    <td>@unless($m->read)<span class="dot-unread"></span>@endunless</td>
                    <td><strong>{{ $m->name }}</strong><br><span class="muted" style="font-size:.8rem;">{{ $m->email }}</span></td>
                    <td>{{ $m->subject ?: '—' }}</td>
                    <td class="muted">{{ $m->created_at->diffForHumans() }}</td>
                    <td><a href="{{ route('admin.messages.show', $m) }}" class="btn btn-sm">View</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
