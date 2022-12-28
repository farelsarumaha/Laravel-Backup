<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', 'Home') {{ __('|') }} {{ __('Admin') }} {{ config('app.name') }}</title>
    @include('add.link')
</head>

<body>
    <header>
        @include('pages.admin.components.navbar')
    </header>
    <main class="m-5">
        @yield('content')
    </main>
    <footer>
        {{--  --}}
    </footer>
    @include('add.js')
</body>

</html>
