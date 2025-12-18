@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h3>Create New Agent</h3>
        <form action="{{ route('admin.agents.store') }}" method="POST">
            @csrf
            <div class="input-field">
                <input id="name" type="text" name="name" required>
                <label for="name">Name</label>
            </div>
            <div class="input-field">
                <input id="email" type="email" name="email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <input id="password" type="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn green waves-effect waves-light">Create Agent</button>
            <a href="{{ route('admin.agents.index') }}" class="btn grey">Cancel</a>
        </form>
    </div>
</div>
@endsection
