<nav class="bg-blue-600 shadow-2xl">
    <div class="px-4 md:px-8 mx-auto">
        <div class="flex justify-between">

            {{-- logo --}}
            <div class="">
                <a href="/" class="flex items-center py-5 px-2 space-x-2 text-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                    <span class="font-bold">{{ config("app.name") }}</span>
                </a>
            </div>

            {{-- primary nav --}}

            <div class="hidden md:flex items-center space-x-1">
                <a href="/" class="{{ request()->is('/') ? 'hover:text-gray-900 py-5 px-3 text-blue-100 border-b-4 border-yellow-300 hover:border-gray-900' : 'hover:text-gray-900 py-5 px-3 text-blue-100' }}">Home</a>

                <a href="ticket" class="{{ request()->is('ticket') ? 'hover:text-gray-900 py-5 px-3 text-blue-100 border-b-4 border-yellow-300 hover:border-gray-900' : 'hover:text-gray-900 py-5 px-3 text-blue-100' }}">Book a flight</a>

                <a href="login" class="{{ request()->is('login') ? 'hover:text-gray-900 py-5 px-3 text-blue-100 border-b-4 border-yellow-300 hover:border-gray-900' : 'hover:text-gray-900 py-5 px-3 text-blue-100' }}">Login</a>

                <a href="register" class="{{ request()->is('register') ? 'hover:text-gray-900 py-5 px-3 text-blue-100 border-b-4 border-yellow-300 hover:border-gray-900' : 'bg-blue-800 text-blue-200 rounded hover:bg-blue-700 hover:text-blue-100 py-3 font-bold px-2 transition duration-300' }} ">Sign up</a>
            </div>

        {{-- secondary nav --}}
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
    <div class="hidden mobile-menu md:hidden py-3 px-4">
        <a href="/" class="{{ request()->is('/') ? 'text-yellow-300 hover:text-blue-100 font-semibold ml-4' : '' }} block py-2 px-4 text-sm">Home</a>
        <a href="ticket" class="{{ request()->is('ticket') ? 'text-yellow-300 hover:text-blue-100 font-semibold ml-4' : '' }} block py-2 px-4 text-sm">Book a flight</a>
        <a href="login" class="{{ request()->is('login') ? 'text-yellow-300 hover:text-blue-100 font-semibold ml-4' : '' }} block py-2 px-4 text-sm">Login</a>
        <a href="register" class="{{ request()->is('register') ? 'text-yellow-300 hover:text-blue-100 font-semibold ml-4' : '' }} block py-2 px-4 text-sm">Sign up</a>
    </div>
</nav>
