<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
{{-- <div class="flex flex-col">
    @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif
        
    <header class="flex">
        
    </header>
</div> --}}
<nav class="flex justify-between py-4 px-8 bg-gradient-to-r from-blue-700 via-blue-300 to-green-600 font-mono shadow-2xl">
    <a href="/" class="text-blue-100 hover:text-blue-200 font-bold">{{ config("app.name") }}</a>
    <div class="hidden md:block text-blue-100 font-semibold space-x-3">
        <a href="" class="hover:text-yellow-200">Home</a>
        <a href="" class="hover:text-yellow-200 tracking-tighter">Book a flight</a>
        <a href="" class="hover:text-yellow-200">Login</a>
    </div>

    {{-- mobile menu button --}}
    <button class="focus:outline-none md:hidden sm:block" type="button" id="toggle-mobile-menu">
        mobile menu
    </button>
</nav>
<div class="flex flex-col md:hidden space-y-3 p-4 bg-yellow-300">
    <a href="#" class="text-sm font-semibold">Home</a>
    <a href="#" class="text-sm font-semibold">Book a flight</a>
    <a href="#" class="text-sm font-semibold">Login</a>
</div>
<header class="bg-landing-1 bg-center bg-no-repeat h-auto px-8 py-16 w-auto border-b-8 border-green-400">
    <div class="w-1/2 flex flex-col">
        <hgroup class="font-mono leading-relaxed text-green-100 tracking-wider mt-5">
            <h1 class="text-5xl">
                Flight Tickets
            </h1>
            <h2 class="text-4xl">
                Reservation online
            </h2>
        </hgroup>
        <p class="mt-4 text-blue-800 font-semibold text-xl leading-8 text-justify tracking-tight">
            We offer state of the art airline services and experience, click the button below to get started with us!
        </p>
        
    <button type="button" class="bg-green-800 px-5 py-4 text-green-100 w-1/2 mt-5 rounded hover:bg-green-700 focus:outline-none font-semibold text-lg">
        Get started!
    </button>
    </div>
    
</header>

<main class="mt-16 px-8 py-5">
    <div class="grid grid-cols-3 gap-8">
        <div class="flex flex-col ">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
        </div>
        <div class="">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere at cum maiores blanditiis alias ipsa, dolorum repudiandae accusamus incidunt harum perspiciatis explicabo assumenda, sed quisquam doloremque, vero op
        </div>
        <div class="">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui id inventore sed commodi esse obcaecati, suscipit voluptates ex illo porro neque eligendi nemo quo architecto natus reiciendis nesciunt nulla iure!
        </div>
    </div>
</main>

</body>
</html>
