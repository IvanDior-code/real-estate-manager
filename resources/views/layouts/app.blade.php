<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="app">
        <nav class="white z-depth-0">
            <div class="nav-wrapper container">
                <a href="{{ url('/') }}" class="brand-logo black-text">Real<span class="indigo-text">Estate</span></a>
                <ul class="right hide-on-med-and-down">
                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}" class="black-text">Login</a></li>
                        @endif
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="black-text">Register</a></li>
                        @endif
                    @else
                        <li><a class="black-text dropdown-trigger" href="#" data-target="dropdown1">{{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a></li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".dropdown-trigger").dropdown();
        });
    </script>
</body>
</html>
