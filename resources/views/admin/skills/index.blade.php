@extends('admin.layout')
@section('title', 'Skills')

@section('content')
<div class="topbar">
    <div><h1>Skills</h1></div>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">+ New skill</a>
</div>

@forelse($skills as $category => $items)
    <div class="panel">
        <h3>{{ $category }}</h3>
        <table>
            <thead><tr><th>Name</th><th>Level</th><th>Order</th><th></th></tr></thead>
            <tbody>
            @foreach($items as $s)
                <tr>
                    <td><strong>{{ $s->name }}</strong></td>
                    <td style="width:200px;">
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="flex:1;height:6px;background:var(--panel-2);border-radius:99px;overflow:hidden;">
                                <div style="height:100%;width:{{ $s->level }}%;background:var(--grad);"></div>
                            </div>
                            <span class="muted" style="font-size:.8rem;">{{ $s->level }}%</span>
                        </div>
                    </td>
                    <td class="muted">{{ $s->sort_order }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.skills.edit', $s) }}" class="btn btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.skills.destroy', $s) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@empty
    <div class="panel"><div class="empty">No skills yet.</div></div>
@endforelse
@endsection
