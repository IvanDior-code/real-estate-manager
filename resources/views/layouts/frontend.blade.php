<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Manager</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <!-- Global Loader Removed upon user request -->
    <div id="global-loader" style="display: none;"></div>

    <div class="navbar-fixed">
        <nav class="white z-depth-1">
        <!-- ... navigation content continues ... -->

            <div class="nav-wrapper container">
                <a href="{{ route('home') }}" class="brand-logo black-text">Real<span class="accent-text text-darken-2">Estate</span></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
                
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{{ route('home') }}" class="black-text hover-accent">Home</a></li>
                    <!-- Categories Dropdown Trigger -->
                    <li><a class="dropdown-trigger black-text hover-accent" href="#!" data-target="category-dropdown">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="{{ route('properties.index') }}" class="black-text hover-accent">Properties</a></li>
                    <li><a href="{{ route('blog') }}" class="black-text hover-accent">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="black-text hover-accent">Contact</a></li>
                    @guest
                        <li><a href="#loginModal" class="btn btn-accent waves-effect waves-light btn-small rounded modal-trigger">Login</a></li>
                        <li><a href="#registerModal" class="btn-flat accent-text waves-effect modal-trigger">Register</a></li>
                    @else
                        @if(Auth::user()->hasRole('admin'))
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @elseif(Auth::user()->hasRole('agent'))
                            <li><a href="{{ route('agent.dashboard') }}">Dashboard</a></li>
                        @endif
                        <!-- User Image in Navbar -->
                        <li>
                            <a href="#!" class="dropdown-trigger" data-target="frontend-user-dropdown" style="display: flex; align-items: center; height: 64px;">
                                <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}" alt="User" class="circle" style="width: 35px; height: 35px; object-fit: cover; margin-right: 10px;">
                                <span class="black-text">{{ strtok(Auth::user()->name, " ") }}</span>
                                <i class="material-icons right black-text">arrow_drop_down</i>
                            </a>
                        </li>
                    @endguest
                </ul>

                <!-- Categories Dropdown Structure -->
                <ul id="category-dropdown" class="dropdown-content">
                    @if(isset($navbarCategories))
                        @foreach($navbarCategories as $category)
                            <li><a href="{{ route('properties.index', ['category' => $category->id]) }}" class="accent-text">{{ $category->name }}</a></li>
                        @endforeach
                    @endif
                    <li class="divider"></li>
                    <li><a href="{{ route('properties.index') }}" class="accent-text">View All</a></li>
                </ul>

                <!-- Frontend User Dropdown Structure (New) -->
                <ul id="frontend-user-dropdown" class="dropdown-content">
                    @if(Auth::check())
                        <li><span class="center-align grey-text text-darken-1" style="display:block; padding: 10px 16px; font-size: 0.9rem;">{{ Auth::user()->email }}</span></li>
                        <li class="divider"></li>
                        @if(Auth::user()->hasRole('agent'))
                             <li><a href="{{ route('agent.profile.edit') }}" class="accent-text"><i class="material-icons">person</i>Profile</a></li>
                        @endif
                         <li>
                            <a href="{{ route('logout') }}" onclick="confirmLogout(event)" class="red-text">
                               <i class="material-icons">exit_to_app</i>Logout
                            </a>
                        </li>
                    @endif
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
    </div>

    <!-- Mobile Navigation (Sidebar) -->
    <ul class="sidenav" id="mobile-demo">
        @auth
        <li><div class="user-view">
            <div class="background indigo darken-2"></div>
            <a href="#user">
                 <img class="circle" src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}" style="object-fit: cover;">
            </a>
            <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
            <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div></li>
        @else
        <li><div class="user-view">
            <div class="background indigo darken-2"></div>
            <a href="#user"><img class="circle" src="https://ui-avatars.com/api/?name=Guest&background=random"></a>
            <a href="#name"><span class="white-text name">Guest User</span></a>
            <a href="#email"><span class="white-text email">Welcome!</span></a>
        </div></li>
        @endauth
        @guest
            <li><div class="user-view"><div class="background indigo"></div><a href="#!"><span class="white-text name">Welcome Guest</span></a></div></li>
            <li><a href="#loginModal" class="modal-trigger"><i class="material-icons left">lock</i>Login</a></li>
            <li><a href="#registerModal" class="modal-trigger"><i class="material-icons left">person_add</i>Register</a></li>
        @else
            <li><div class="user-view"><div class="background indigo"></div>
                <a href="#!"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                <a href="#!"><span class="white-text email">{{ Auth::user()->email }}</span></a>
            </div></li>
            @if(Auth::user()->hasRole('admin'))
                <li><a href="{{ route('admin.dashboard') }}"><i class="material-icons left">dashboard</i>Dashboard</a></li>
            @elseif(Auth::user()->hasRole('agent'))
                <li><a href="{{ route('agent.dashboard') }}"><i class="material-icons left">dashboard</i>Dashboard</a></li>
            @endif
            <li>
                <a href="{{ route('logout') }}" onclick="confirmLogout(event)">
                   <i class="material-icons left">exit_to_app</i>Logout
                </a>
            </li>
        @endguest
        <li class="divider"></li>

        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('properties.index') }}">Properties</a></li>
        @if(isset($navbarCategories))
            <li class="divider"></li>
            <li class="subheader">Categories</li>
             @foreach($navbarCategories as $category)
                <li><a href="{{ route('properties.index', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
            @endforeach
            <li class="divider"></li>
        @endif
        <li><a href="{{ route('blog') }}">Blog</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>

    <div class="main-content">
        @yield('content')
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal" style="max-width: 450px; border-radius: 15px; overflow: hidden; background: #fff;">
        <div class="modal-content center-align" style="padding: 40px;">
            <div class="indigo lighten-5 circle" style="width: 80px; height: 80px; margin: 0 auto 20px; display: flex; justify-content: center; align-items: center;">
                <i class="material-icons indigo-text text-darken-2" style="font-size: 40px;">lock_open</i>
            </div>
            <h4 class="indigo-text text-darken-3" style="font-weight: 700;">Welcome Back</h4>
            <p class="grey-text">Sign in to continue to your dashboard</p>
            
            <form method="POST" action="{{ route('login') }}" style="margin-top: 30px;">
                @csrf
                <div class="input-field" style="margin-bottom: 20px;">
                    <i class="material-icons prefix grey-text">email</i>
                    <input id="login_email" type="email" name="email" value="{{ old('email') }}" required class="validate">
                    <label for="login_email">Email Address</label>
                    @error('email')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field" style="margin-bottom: 30px;">
                    <i class="material-icons prefix grey-text">vpn_key</i>
                    <input id="login_password" type="password" name="password" required class="validate">
                    <label for="login_password">Password</label>
                </div>
                
                <button type="submit" class="btn-large waves-effect waves-light btn-accent z-depth-2" style="width: 100%; border-radius: 50px; font-weight: 600; letter-spacing: 1px;">
                    LOGIN
                </button>
            </form>

            <div style="margin-top: 20px; border-top: 1px solid #f0f0f0; padding-top: 20px;">
                <a href="#registerModal" class="modal-trigger grey-text text-darken-1 modal-close">New here? <span class="indigo-text" style="font-weight: 600;">Create Account</span></a>
            </div>
            <div style="margin-top: 10px;">
                <a href="{{ route('password.request') }}" class="grey-text" style="font-size: 0.9rem;">Forgot Password?</a>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal" style="max-width: 700px; border-radius: 15px; overflow: hidden; background: #fff;">
        <div class="modal-content center-align" style="padding: 24px 30px; max-height: 90vh;">
            <div class="indigo lighten-5 circle" style="width: 60px; height: 60px; margin: 0 auto 10px; display: flex; justify-content: center; align-items: center;">
                <i class="material-icons indigo-text text-darken-2" style="font-size: 30px;">person_add</i>
            </div>
            <h5 class="indigo-text text-darken-3" style="font-weight: 700; margin: 5px 0;">Join Us</h5>
            <p class="grey-text" style="margin: 0 0 15px; font-size: 0.9rem;">Create your account to get started</p>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row" style="margin-bottom: 0;">
                    <div class="input-field col s12 m6" style="margin-bottom: 10px;">
                        <i class="material-icons prefix grey-text" style="font-size: 1.2rem; top: 12px;">person</i>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required class="validate">
                        <label for="name">Full Name</label>
                         @error('name') <span class="helper-text red-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field col s12 m6" style="margin-bottom: 10px;">
                        <i class="material-icons prefix grey-text" style="font-size: 1.2rem; top: 12px;">email</i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="validate">
                        <label for="email">Email Address</label>
                        @error('email') <span class="helper-text red-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field col s12 m6" style="margin-bottom: 10px;">
                        <i class="material-icons prefix grey-text" style="font-size: 1.2rem; top: 12px;">phone</i>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required class="validate">
                        <label for="phone">Phone Number</label>
                        @error('phone') <span class="helper-text red-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field col s12 m6" style="margin-bottom: 10px;">
                        <i class="material-icons prefix grey-text" style="font-size: 1.2rem; top: 12px;">location_on</i>
                        <input id="location" type="text" name="location" value="{{ old('location') }}" required class="validate">
                        <label for="location">Location (City)</label>
                        @error('location') <span class="helper-text red-text">{{ $message }}</span> @enderror
                    </div>

                     <div class="input-field col s12 m6" style="margin-bottom: 10px;">
                        <i class="material-icons prefix grey-text" style="font-size: 1.2rem; top: 12px;">vpn_key</i>
                        <input id="password" type="password" name="password" required class="validate">
                        <label for="password">Password</label>
                        @error('password') <span class="helper-text red-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field col s12 m6" style="margin-bottom: 10px;">
                        <i class="material-icons prefix grey-text" style="font-size: 1.2rem; top: 12px;">lock</i>
                        <input id="password-confirm" type="password" name="password_confirmation" required class="validate">
                        <label for="password-confirm">Confirm Password</label>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 0;">
                    <div class="col s12 center-align" style="margin-bottom: 15px;">
                        <label>
                            <input type="checkbox" name="agent" value="1" />
                            <span class="grey-text text-darken-2">Register as Agent</span>
                        </label>
                    </div>
                </div>
                
                 <input type="hidden" name="role" value="user">

                <button type="submit" class="btn-large waves-effect waves-light btn-accent z-depth-2" style="width: 100%; border-radius: 50px; font-weight: 600; letter-spacing: 1px;">
                    CREATE ACCOUNT
                </button>
            </form>

            <div style="margin-top: 15px; border-top: 1px solid #f0f0f0; padding-top: 10px;">
                <a href="#loginModal" class="modal-trigger grey-text text-darken-1 modal-close">Already have an account? <span class="indigo-text" style="font-weight: 600;">Sign In</span></a>
            </div>
        </div>
    </div>

    <footer class="page-footer bg-gradient-accent">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Real Estate App</h5>
                    <p class="grey-text text-lighten-4">Best properties in town.</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © 2025 Copyright Text
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'slide',
            once: true
        });

            // Typewriter Effect Variables
        const typeWriterElement = document.getElementById('typewriter-text');
        let typeIndex = 0;
        let typeTimeout;

        function typeWriter(text) {
            if (typeIndex < text.length) {
                typeWriterElement.innerHTML += text.charAt(typeIndex);
                typeIndex++;
                typeTimeout = setTimeout(function() { typeWriter(text) }, 100);
            }
        }

        function startTypewriterCycle() {
            if (!typeWriterElement) return;
            
            // Get current active slide
            // Materialize Slider adds 'active' class to listing li
            // However, we need to find which one is currently visible or about to be.
            // A simpler approach for Materialize Slider:
            // Since we can't easily hook into the 'change' event of the standard Materialize slider init without modifying source,
            // we will simulate it by cycling through our own list if needed, OR:
            // Actually, Materialize slider doesn't expose a clean callback. 
            // Better approach: Let's assume the order matches.
            
            // ALTERNATIVE: Use a simple cycling index since we set the interval to match.
        }

        // Improved Logic:
        // We will maintain a counter i matched with the slider interval.
        let sliderIndex = 0;
        const slides = document.querySelectorAll('.slider .slides li');
        
        function updateHeroText() {
            if (!typeWriterElement || slides.length === 0) return;

            // Clear existing
            clearTimeout(typeTimeout);
            typeWriterElement.innerHTML = "";
            typeIndex = 0;

            // Get text from current index
            // Note: Materialize slider starts at index 0.
            const currentSlide = slides[sliderIndex];
            const textToType = currentSlide.getAttribute('data-title') || "Find Your Dream Home";
            
            typeWriter(textToType);

            // Increment index for next cycle
            sliderIndex = (sliderIndex + 1) % slides.length;
        }

        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.modal').modal();
            $('select').formSelect();
            $('.dropdown-trigger').dropdown({ coverTrigger: false, constrainWidth: false });

            // Initialize Slider
            const sliderInstances = $('.slider').slider({
                full_width: true,
                indicators: false,
                height: 600,
                interval: 6000
            });
            
            // Initialize Typewriter
            if(typeWriterElement && slides.length > 0) {
                 // Initial run (delay to sync with first slide fade-in)
                setTimeout(updateHeroText, 300);

                // Interval to match slider
                setInterval(updateHeroText, 6000);
            }
            
            // Auto-open modal on validation error
            @if($errors->has('email') || $errors->has('password'))
                @if($errors->has('name'))
                    $('#registerModal').modal('open');
                @else
                    $('#loginModal').modal('open');
                @endif
            @endif

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
                confirmButtonColor: '#3949ab',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }
    </script>
</body>
</html>
