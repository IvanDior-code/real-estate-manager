@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>Agent Management</h3>
        <a href="{{ route('admin.agents.create') }}" class="btn blue waves-effect waves-light">Add Agent</a>
    </div>
    <div class="col s12">
        <table class="striped highlight">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agents as $agent)
                <tr>
                    <td>{{ $agent->id }}</td>
                    <td>{{ $agent->name }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>
                        <a href="{{ route('admin.agents.edit', $agent->id) }}" class="btn-small orange"><i class="material-icons">edit</i></a>
                        <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small red"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
