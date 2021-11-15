<nav class="shadow-xl font-semibold xs:left-0 md:left-1/6 xs:top-0 fixed w-full xs:bg-white md:bg-none border-b-2 border-blue-100">
    <div class="flex justify-between items-center py-3 px-5 md:mr-1/6">
        <a href="#" class="flex items-baseline -space-x-3">
            <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-16 h-8">
        </a>

        <div class="flex justify-between items-center space-x-5">
            <div class="text-blue-700 text-md xs:hidden md:flex md:items-center md:space-x-1">
                <span class="p-2 bg-green-400 rounded-full animate-pulse"></span>
                <img src="{{ asset('storage/img/profile-pics/user.jpg') }}" alt="" class="border-2 border-blue-200 rounded-full h-8 w-8" />
                <span class="">
                    Femi Awe
                </span>
            </div>
            <div class="text-blue-700 text-sm xs:hidden md:block">
                {{-- {{ date("d : m : Y") }} --}}
            </div>

            {{-- mobile dashboard menu button --}}
            <div class="hidden md:hidden xs:flex">
                <button class="mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-10 text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- mobile dashboard menu --}}
    <div class="p-4 hidden md:hidden mobile-menu transition duration-1000 ease-in-out">
        <div class="flex items-center justify-between px-5 py-3">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('storage/img/profile-pics/josh.jpg') }}" alt="" class="border-2 border-blue-200 rounded-full h-10 w-12" />
                <div class="flex flex-col space-y-1">
                    <span class="text-blue-700 font-semibold">
                        Femi Awe
                    </span>
                    <div class="flex items-end space-x-2">
                        <span class="text-xs text-gray-500 font-bold">#Username</span>
                        <span class="h-2 w-2 bg-green-400 rounded-full animate-pulse"></span>
                    </div>
                </div>
            </div>

        </div>


        <a href="?menu=dashboard" class="{{ $menuUrl == 'dashboard' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold mt-3">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                </svg>
            </span>
            Overview
        </a>
        <a href="?menu=fleets" class="{{ $menuUrl == 'fleets' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                </svg>
            </span>
            Fleets
        </a>
        <a href="?menu=reports" class="{{ $menuUrl == 'reports' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            </span>
            Reports
        </a>
        <a href="?menu=staff" class="{{ $menuUrl == 'staff' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            Staff
        </a>
        <a href="?menu=settings" class="{{ $menuUrl == 'settings' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </span>
            Settings
        </a>
        <a href="logout" class="flex items-center text-md px-5 py-3 text-red-700 hover:text-red-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </span>
            Logout
        </a>
    </div>
</nav>
