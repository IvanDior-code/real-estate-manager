@extends('layouts.agent')

@section('content')
<div class="row">
    <div class="col s12 m6">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Update Profile</span>
                <form action="{{ route('agent.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="input-field">
                        <input id="name" type="text" name="name" value="{{ $user->name }}" required>
                        <label for="name">Name</label>
                    </div>

                    <div class="input-field">
                        <input id="username" type="text" name="username" value="{{ $user->username }}" required>
                        <label for="username">Username</label>
                    </div>

                    <div class="input-field">
                        <input id="email" type="email" name="email" value="{{ $user->email }}" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Image</span>
                            <input type="file" name="image">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <div class="input-field">
                        <textarea id="about" name="about" class="materialize-textarea">{{ $user->about }}</textarea>
                        <label for="about">About</label>
                    </div>

                    <button class="btn indigo waves-effect waves-light">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col s12 m6">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Change Password</span>
                <form action="{{ route('agent.profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="input-field">
                        <input id="current_password" type="password" name="current_password" required>
                        <label for="current_password">Current Password</label>
                    </div>

                    <div class="input-field">
                        <input id="password" type="password" name="password" required>
                        <label for="password">New Password</label>
                    </div>

                    <div class="input-field">
                        <input id="password_confirmation" type="password" name="password_confirmation" required>
                        <label for="password_confirmation">Confirm Password</label>
                    </div>

                    <button class="btn red waves-effect waves-light">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
