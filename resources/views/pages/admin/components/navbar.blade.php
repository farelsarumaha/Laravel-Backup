<nav class="navbar navbar-expand-lg shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.home') }}">
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
                {{--  --}}
                <ul class="navbar-nav me-auto">
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}"
                            aria-current="page">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.posts') }}"
                            aria-current="page">{{ __('Galaxy Posts') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.profile') }}"
                            aria-current="page">{{ __('Galaxy Users') }}</a>
                    </li>
                </ul>

                <ul class="navbar-nav me-100">
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"
                            aria-current="page">{{ __('Back to website') }}</a>
                    </li>
                    @auth
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->fullName() }}
                            </a>
                            <ul class="dropdown-menu text-left border-0">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-item" type="button" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf</form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
@include('add.js')
