@extends('admin.layout')
@section('title', 'Projects')

@section('content')
<div class="topbar">
    <div><h1>Projects</h1><div class="sub">{{ $projects->count() }} total</div></div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ New project</a>
</div>

<div class="panel">
    @if($projects->isEmpty())
        <div class="empty">No projects yet. Create your first one.</div>
    @else
        <table>
            <thead><tr><th>#</th><th>Cover</th><th>Title</th><th>Category</th><th>Featured</th><th>Order</th><th></th></tr></thead>
            <tbody>
            @foreach($projects as $p)
                <tr>
                    <td class="muted">{{ $p->id }}</td>
                    <td>
                        @if($p->image_url)
                            <img src="{{ $p->image_url }}" alt="" style="width:64px;height:42px;object-fit:cover;border-radius:6px;border:1px solid var(--border);">
                        @else
                            <span class="muted" style="font-size:.75rem;">—</span>
                        @endif
                    </td>
                    <td><strong>{{ $p->title }}</strong>
                        @if($p->url)<br><a href="{{ $p->url }}" target="_blank" class="muted" style="font-size:.78rem;">{{ $p->url }}</a>@endif
                    </td>
                    <td><span class="pill brand">{{ $p->category }}</span></td>
                    <td>@if($p->featured)<span class="pill green">Featured</span>@else<span class="muted">—</span>@endif</td>
                    <td class="muted">{{ $p->sort_order }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.projects.edit', $p) }}" class="btn btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $p) }}" onsubmit="return confirm('Delete this project?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
