@extends('admin.layout')
@section('title', 'Experience')

@section('content')
<div class="topbar">
    <div><h1>Experience</h1></div>
    <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary">+ New entry</a>
</div>

<div class="panel">
    @if($experiences->isEmpty())
        <div class="empty">No experience entries yet.</div>
    @else
        <table>
            <thead><tr><th>Role</th><th>Company</th><th>Period</th><th>Order</th><th></th></tr></thead>
            <tbody>
            @foreach($experiences as $e)
                <tr>
                    <td><strong>{{ $e->role }}</strong></td>
                    <td>{{ $e->company }}</td>
                    <td class="muted">{{ $e->period }}</td>
                    <td class="muted">{{ $e->sort_order }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.experiences.edit', $e) }}" class="btn btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.experiences.destroy', $e) }}" onsubmit="return confirm('Delete?')">
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
