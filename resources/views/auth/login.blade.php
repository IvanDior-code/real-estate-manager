@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card z-depth-2" style="margin-top: 50px; border-radius: 12px;">
                <div class="card-content">
                    <span class="card-title center-align indigo-text"><b>{{ __('Login') }}</b></span>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" class="@error('email') invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">{{ __('Email Address') }}</label>
                                @error('email')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" class="@error('password') invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <span>{{ __('Remember Me') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 center-align">
                                <button type="submit" class="btn waves-effect waves-light indigo w-100" style="width: 100%; border-radius: 25px;">
                                    {{ __('Login') }}
                                </button>
                                
                                @if (Route::has('password.request'))
                                    <div style="margin-top: 15px;">
                                        <a href="{{ route('password.request') }}" class="indigo-text text-lighten-2">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
