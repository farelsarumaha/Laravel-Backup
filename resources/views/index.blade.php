<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title') {{ __('|') }} {{ config('app.name') }}</title>
    @include('add.link')
</head>

<body>
    <header>
        @include('components.navbar')
    </header>
    <main class="m-5">
        @yield('content')
    </main>
    <footer>
        {{--  --}}
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    @include('add.js')
</body>

</html>
