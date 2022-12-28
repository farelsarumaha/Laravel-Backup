<nav class="navbar navbar-expand-lg shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img height="50px" width="50px" src="{{ asset('images/icon.png') }}" alt="{{ __('Galaxy Network') }}">
        </a>
        <a class="navbar-toggler border-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar">
            <i class="fa-solid fa-bars"></i>
        </a>
        <div class="offcanvas offcanvas-end bg-light" id="navbar" tabindex="-1" aria-labelledby="nabar-n">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="nabar-n">{{ __('Galaxy Network') }}</h5>
                <a class="text-dark btn border" type="button" data-bs-dismiss="offcanvas">
                    <i class="fa-sharp fa-solid fa-xmark"></i>
                </a>
            </div>
            <div class="offcanvas-body">
                {{-- Nav Menu Left --}}
                <ul class="navbar-nav me-auto">
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" aria-current="page">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('forum') }}" aria-current="page">{{ __('Forums') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}" aria-current="page">{{ __('Contacts') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}" aria-current="page">{{ __('Abouts') }}</a>
                    </li>
                    @auth
                        @if (Auth::user()->title == 'Owner' || Auth::user()->title == 'Admin')
                            <div class="dropdown-center">
                                <a class="nav-link" type="button"
                                    href="{{ route('admin.home') }}">{{ __('Galaxy Panels') }}
                                </a>
                            </div>
                        @endif
                    @endauth
                </ul>
                {{-- Nav Menu Center --}}
                {{-- <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                </ul> --}}
                {{-- Nav Menu Right --}}

                <ul class="navbar-nav me-100">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('donate') }}">{{ __('Donate') }}</a>
                    </li>
                    <hr>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="dropdown-center">
                            <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->fullName() }}
                            </a>
                            <ul class="dropdown-menu text-left border-0">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-item" type="button" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf</form>
                                    <a class="nav-link dropdown-item" type="button"
                                        href="{{ route('profile.show', Auth::user()->user_url) }}">Profile</a>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

@include('add.js')
