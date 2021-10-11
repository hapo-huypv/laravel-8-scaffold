<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/hapo_logo.png') }}" type="image/png" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Header -->
        @include('partials.header')
        <!-- Content -->
        @yield('content')
        <!-- Footer -->
        @include('partials.footer')
        <!-- Login-Register -->
        @include('components.authentication')
        <!-- messenger -->
        @include('partials.messenger')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
