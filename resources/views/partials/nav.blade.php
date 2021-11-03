<nav class="bg-orange-100 shadow-2xl">
    <div class="px-4 md:px-8 mx-auto">
        <div class="flex justify-between items-center">
            {{-- logo --}}
            <div class="">
                <a href="/" class="flex items-center space-x-2">
                    <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-16 h-8">
                </a>
            </div>

            {{-- primary nav --}}

            <div class="hidden md:flex items-center">
                <a href="/" class="{{ request()->is('/') ? 'bg-orange-500 hover:bg-white border-t-2 border-gray-500' : '' }}
                hover:text-orange-500 font-semibold px-2 py-4 text-xs transition duration-300">
                    Home
                </a>

                <a href="ticket" class="{{ request()->is('ticket') ? 'bg-orange-500 hover:bg-white border-t-2 border-gray-500' : '' }}
                hover:text-orange-500 text-xs font-semibold px-2 py-4 text-gray-900 transition duration-300">
                    Book a flight
                </a>

                <a href="login" class="{{ request()->is('login') ? 'bg-orange-500 hover:bg-white border-t-2 border-gray-500' : '' }}
                hover:text-orange-500 text-xs font-semibold px-2 py-4 text-gray-900 transition duration-300">
                    Login
                </a>

                <a href="register" class="{{ request()->is('register') ? 'bg-orange-500 hover:bg-white border-t-2 border-gray-500' : '' }}
                hover:text-orange-500 text-xs font-semibold px-2 py-4 text-gray-900 transition duration-300 flex items-center">
                    Sign up
                </a>
            </div>

            {{-- secondary nav --}}
            {{-- mobile button goes here --}}
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- mobile menu --}}
    <div class="hidden mobile-menu md:hidden py-3 px-4">
        <a href="/" class="{{ request()->is('/') ? 'text-purple-700 hover:text-blue-100 font-bold' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-bold">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
             </span>
            Home
        </a>
        <a href="ticket" class="{{ request()->is('ticket') ? 'text-purple-700 hover:text-blue-100 font-bold' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-bold">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                </svg>
             </span>
            Book a flight
        </a>
        <a href="login" class="{{ request()->is('login') ? 'text-purple-700 hover:text-blue-100 font-bold' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-bold">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
             </span>
            Login
        </a>
        <a href="register" class="{{ request()->is('register') ? 'text-purple-700 hover:text-blue-100 font-bold' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-bold">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
             </span>
            Sign up
        </a>
    </div>
</nav>
