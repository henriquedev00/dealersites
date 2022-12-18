<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <title>@yield('title') | DealerSites</title>
</head>
<body>
    @auth
        @include('layouts.header')
        @include('auth.partials._confirmation-logout')
    @endauth

    @yield('content')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    @include('sweetalert::alert')

    @hasSection('js')
        @yield('js')
    @endif
</body>
</html>