<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    @yield('links')
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    @yield('nav')
    @yield('header')
    @yield('main')
    @yield('footer')
    @yield('scripts')
</body>
</html>
