@extends('admin.layout')
@section('title', 'Testimonials')

@section('content')
<div class="topbar">
    <div><h1>Testimonials</h1><div class="sub">{{ $testimonials->count() }} client reviews</div></div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">+ New testimonial</a>
</div>

<div class="panel">
    @if($testimonials->isEmpty())
        <div class="empty">No testimonials yet.</div>
    @else
        <table>
            <thead><tr><th>Name</th><th>Project</th><th>Rating</th><th>Source</th><th>Link</th><th></th></tr></thead>
            <tbody>
            @foreach($testimonials as $t)
                <tr>
                    <td><strong>{{ $t->name }}</strong></td>
                    <td class="muted">{{ $t->project }}</td>
                    <td><span class="stars-y">{{ str_repeat('★', $t->rating) }}</span></td>
                    <td><span class="pill">{{ $t->source }}</span></td>
                    <td>
                        @if($t->url)
                            <a href="{{ $t->url }}" target="_blank" rel="noopener" style="color:var(--brand);">View ↗</a>
                        @else
                            <span class="muted">—</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete?')">
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
