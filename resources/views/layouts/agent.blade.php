<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Dashboard - Real Estate</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        header, main, footer { padding-left: 300px; }
        @media only screen and (max-width : 992px) {
            header, main, footer { padding-left: 0; }
        }
    </style>
</head>
<body>
    <div id="global-loader" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.95); z-index: 9999; display: {{ Request::routeIs('agent.dashboard') ? 'flex' : 'none' }}; justify-content: center; align-items: center; transition: opacity 0.5s ease;">
        <div class="loader-content card-panel z-depth-3 center-align" style="border-radius: 15px; padding: 40px; min-width: 300px;">
            <i class="material-icons large accent-text text-darken-2" style="font-size: 6rem;">business_center</i>
            <h4 class="accent-text text-darken-2" style="margin: 15px 0; font-weight: bold;">Agent Portal</h4>
            <p class="grey-text" style="margin-bottom: 20px;">Preparing your workspace...</p>
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-yellow-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>

...

            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#ff6f00' 
                });
            @endif
    </div>
    <script>
        @if(Request::routeIs('agent.dashboard'))
        window.addEventListener('load', function() {
            var loader = document.getElementById('global-loader');
            loader.style.opacity = '0';
            setTimeout(function() { loader.style.display = 'none'; }, 500);
        });
        @else
        document.getElementById('global-loader').style.display = 'none';
        @endif
    </script>

    <ul id="slide-out" class="sidenav sidenav-fixed">
        <li><div class="user-view">
            <div class="background bg-gradient-indigo">
                <!-- <img src="https://via.placeholder.com/300x150"> -->
            </div>
            <a href="#user">
                <img class="circle" src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}" alt="{{ Auth::user()->name }}">
            </a>
            <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
            <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div></li>
        <li><a href="{{ route('agent.dashboard') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>
        
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="active">
                    <a class="collapsible-header waves-effect waves-indigo"><i class="material-icons">home</i>Properties<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('agent.properties.index') }}" class="waves-effect">My Properties</a></li>
                            <li><a href="{{ route('agent.properties.create') }}" class="waves-effect">Add New Property</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="collapsible-header waves-effect waves-indigo"><i class="material-icons">account_circle</i>Account<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('agent.profile.edit') }}" class="waves-effect">Profile</a></li>
                             <li><a href="{{ route('agent.messages.index') }}" class="waves-effect">Messages</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li><div class="divider"></div></li>
        <li>
            <a class="waves-effect" href="{{ route('logout') }}" onclick="confirmLogout(event)">
               <i class="material-icons">exit_to_app</i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

    <header>
        <nav class="bg-gradient-indigo">
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="#" class="brand-logo center">Agent Panel</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.collapsible').collapsible();

            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#3949ab'
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#d33'
                });
            @endif

            @if($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                    confirmButtonColor: '#d33'
                });
            @endif
        });

        function confirmLogout(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Ready to Leave?',
                text: "Are you sure you want to logout?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#304ffe',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }

        function confirmDelete(formId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            })
        }
    </script>
</body>
</html>
