@extends('admin.layout')
@section('title', 'Messages')

@section('content')
<div class="topbar">
    <div><h1>Messages</h1><div class="sub">{{ $messages->total() }} total</div></div>
</div>

<div class="panel">
    @if($messages->isEmpty())
        <div class="empty">No messages yet.</div>
    @else
        <table>
            <thead><tr><th></th><th>From</th><th>Subject</th><th>Received</th><th></th></tr></thead>
            <tbody>
            @foreach($messages as $m)
                <tr>
                    <td>@unless($m->read)<span class="dot-unread"></span>@endunless</td>
                    <td><strong>{{ $m->name }}</strong><br><span class="muted" style="font-size:.8rem;">{{ $m->email }}</span></td>
                    <td>{{ $m->subject ?: '—' }}</td>
                    <td class="muted">{{ $m->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.messages.show', $m) }}" class="btn btn-sm">View</a>
                            <form method="POST" action="{{ route('admin.messages.destroy', $m) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="margin-top:18px;">{{ $messages->links() }}</div>
    @endif
</div>
@endsection
