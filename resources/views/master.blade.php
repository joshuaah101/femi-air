<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link href="{{ asset('css/toastr.css')  }}" rel="stylesheet"/>
    @yield('links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}" data-sdk-integration-source="button-factory"></script>
    {{-- <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

   <!--Datatables -->
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> --}}
    @livewireStyles
</head>
<body class="bg-white antialiased leading-none">
@yield('header')
@yield('main')
@yield('footer')
@yield('scripts')
@include('partials.alert')
@livewireScripts
</body>
</html>
