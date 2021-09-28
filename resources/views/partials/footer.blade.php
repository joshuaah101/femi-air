@section('footer')
    <footer class="mt-5 bg-blue-700">
        <section class="md:px-32 py-6 grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            <div class="p-3">
                <h1 class="text-2xl text-blue-300 font-mono">
                    Contact
                </h1>
                <div class="mt-5 text-sm">
                    <p class="mt-2 text-blue-100 leading-4">
                        E-mail : femi-air@gmail.com
                    </p>
                    <p class="mt-3">
                        <a href="tel:08023235658" class="text-blue-100 hover:text-gray-400">
                            Phone number : 08023235658
                        </a>
                    </p>
                </div>
            </div>
            <div class="p-3">
                <h1 class="text-2xl text-blue-300 font-mono">
                    Quick links
                </h1>
                <div class="mt-5 flex flex-col space-y-2 text-sm ">
                    <a href="/" class="{{ request()->is('/') ? 'text-yellow-400 font-semibold' : '' }}
                        text-blue-100 hover:text-gray-400 flex items-center">
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>
                        </span>
                        Home
                    </a>
                    <a href="ticket" class="{{ request()->is('ticket') ? 'text-yellow-400 font-semibold' : '' }}
                        text-blue-100 hover:text-gray-400 flex items-center">
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </span>
                        Book a flight
                    </a>
                    <a href="login" class="{{ request()->is('login') ? 'text-yellow-400 font-semibold0' : '' }}
                        text-blue-100 hover:text-gray-400 flex items-center">
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                        </span>
                        login
                    </a>
                    <a href="register" class="{{ request()->is('register') ? 'text-yellow-400 font-semibold' : '' }}
                        text-blue-100 hover:text-gray-400 flex items-center">
                        <span class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </span>
                        Sign up
                    </a>
                </div>
            </div>
            <div class="p-3">
                <h1 class="text-2xl text-blue-300 font-mono">
                    Address
                </h1>
                <div class="mt-5 text-sm">
                    <p class="mt-2 text-blue-100 leading-4">
                        Address: Garki street, ahmadu bello way, kaduna, lagos
                    </p>
                    {{-- <p class="mt-3">
                        <a href="tel:08023235658" class="text-blue-100 hover:text-gray-400">
                            Phone number : 08023235658
                        </a>
                    </p> --}}
                </div>
            </div>
        </section>
        
        <div class="
            py-2 px-8
            flex justify-end space-x-2
            ">
            <div class="
                font-bold text-sm text-blue-200">
                {{ config('app.name') }} &copy; {{ date('Y') }}
            </div>

            <div class="
                flex text-end
                font-bold text-xs text-blue-200">
                &middot; All rights reserved
            </div>
        </div>
    </footer>
@endsection
