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
{{-- <nav class="bg-gradient-to-r from-blue-700 via-blue-300 to-green-600 shadow-2xl">
    <div class="flex justify-between py-4 px-3">
      
        <div class="">
            <a href="/" class="text-blue-100 hover:text-blue-200 font-bold">
                {{ config("app.name") }}
            </a>
        </div>
        
      
        <div class="hidden md:block text-blue-100 font-semibold space-x-3">
            <a href="" class="hover:text-yellow-200">Home</a>
            <a href="" class="hover:text-yellow-200 tracking-tighter">Book a flight</a>
            <a href="" class="hover:text-yellow-200">Login</a>
        </div>

      
        <button class="focus:outline-none md:hidden sm:block" type="button" id="toggle-mobile-menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div class="md:hidden bg-yellow-300">
        <a href="#" class="text-sm font-semibold">Home</a>
        <a href="#" class="text-sm font-semibold">Book a flight</a>
        <a href="#" class="text-sm font-semibold">Login</a>
    </div>
</nav> --}}


{{-- navbar --}}
<nav class="bg-gradient-to-r from-blue-700 via-blue-300 to-green-600 shadow-2xl">
    <div class="max-w-6xl px-8 mx-auto">    
        <div class="flex justify-between">
            <div class="flex space-x-4">
                {{-- logo --}}
                <div class="">
                    <a href="/" class="flex items-center py-5 px-2 text-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr- text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                          </svg>
                        <span class="font-bold">{{ config("app.name") }}</span>
                    </a>
                </div>
                {{-- primary nav --}}
                <div class="hidden md:flex items-center space-x-1">
                    <a href="" class="hover:text-gray-900 py-5 px-3 text-blue-100">Home</a>
                    <a href="" class="hover:text-gray-900 py-5 px-3 text-blue-100">Book a flight</a>
                </div>
            </div>
            {{-- secondary nav --}}
            <div class="hidden md:flex items-center space-x-1">
                <a href="" class="hover:text-gray-900 py-5 px-3 text-blue-100">Login</a>
                <a href="" class="bg-yellow-400 text-yellow-900 rounded hover:bg-yellow-300 hover:text-yellow-800 py-2 font-bold px-3 transition duration-300">Sign up</a>
            </div>

            {{-- mobile button goes here --}}
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    {{-- mobile menu --}}
    <div class="hidden mobile-menu md:hidden">
        <a href="" class="block py-2 px-4 text-sm hover:bg-blue-200">Home</a>
        <a href="" class="block py-2 px-4 text-sm hover:bg-blue-200">Book a flight</a>
        <a href="" class="block py-2 px-4 text-sm hover:bg-blue-200">Login</a>
        <a href="" class="block py-2 px-4 text-sm text-yellow-200 font-semibold hover:bg-blue-200 transition duration-300">Sign up</a>
    </div>
</nav>

<header class="bg-landing-1 bg-center bg-no-repeat h-auto px-8 py-16 w-auto border-b-4 bg-opacity-50 border-blue-400">
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
        
    <button type="button" class="bg-blue-800 px-5 py-4 text-blue-100 sm:w-full md:w-1/2  mt-5 rounded hover:bg-blue-700 focus:outline-none font-semibold text-lg">
        Get started!
    </button>
    </div>
    
</header>

<main class="mt-4 px-8 py-5">
    <section class="p-4">
        <div class="flex justify-center items-center text-blue-400 font-bold p-4 text-4xl font-serif">
            Our Credibility
        </div>

        <div class="mt-16 grid md:grid-cols-3 gap-8 sm:grid-cols-1">
            <div class="flex flex-col bg-white rounded p-4 shadow-2xl hover:shadow-lg">
                <h1 class="flex flex-col justify-center items-center p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-2xl text-gray-900 font-semibold mt-5">Fast</span>
                </h1>
                <p class="text-gray-900 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>

            <div class="flex flex-col bg-blue-500 rounded p-4 shadow-2xl hover:shadow-lg hover:bg-yellow-500 md:-mt-10 sm:mt-10">
                <h1 class="flex flex-col justify-center items-center p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 text-blue-100 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-2xl text-blue-100 font-semibold mt-5">Secure</span>
                </h1>
                <p class="text-blue-100 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>

            <div class="flex flex-col bg-white rounded p-4 shadow-2xl hover:shadow-lg">
                <h1 class="flex flex-col justify-center items-center p-5">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                      </svg>
                    <span class="text-2xl text-gray-900 font-semibold mt-5">Reliable</span>
                </h1>
                <p class="text-gray-900 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript" src="{{ mix('js/custom.js') }}"></script>
</body>
</html>
