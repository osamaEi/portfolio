@extends('admin.layout')
@section('title', 'Message')

@section('content')
<div class="topbar">
    <div><h1>Message</h1></div>
    <a href="{{ route('admin.messages.index') }}" class="btn">← Back</a>
</div>

<div class="panel">
    <table style="margin-bottom:20px;">
        <tr><th style="width:120px;">From</th><td>{{ $message->name }}</td></tr>
        <tr><th>Email</th><td><a href="mailto:{{ $message->email }}" style="color:var(--brand);">{{ $message->email }}</a></td></tr>
        <tr><th>Subject</th><td>{{ $message->subject ?: '—' }}</td></tr>
        <tr><th>Received</th><td class="muted">{{ $message->created_at->format('M j, Y · g:i A') }}</td></tr>
    </table>

    <div style="background:var(--bg);border:1px solid var(--border);border-radius:10px;padding:20px;white-space:pre-wrap;line-height:1.7;">{{ $message->message }}</div>

    <div class="form-actions" style="margin-top:22px;">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}" class="btn btn-primary">Reply by email</a>
        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
            @csrf @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
