<nav class="shadow-xl font-semibold xs:left-0 md:left-1/6 xs:top-0 fixed w-full xs:bg-white md:bg-none border-b-2 border-blue-100">
    <div class="flex justify-between items-center py-3 px-5 md:mr-1/6">
        <a href="#" class="flex items-baseline -space-x-3">
            <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-16 h-8">
        </a>

        <div class="flex justify-between items-center space-x-5">
            <div class="text-blue-700 text-md xs:hidden md:flex md:items-center md:space-x-1">
                <span class="p-2 bg-green-400 rounded-full animate-pulse"></span>
                <img src="https://scontent.flos1-1.fna.fbcdn.net/v/t1.6435-9/215984527_5867855996618138_7220758743570142723_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeGuYzyZyq2px_ltcyy2TWETEaHkOZ3wzYYRoeQ5nfDNhu8yqw75gRxSwIZEp26mDfgritJ-Cfm93Hl53KeUbePO&_nc_ohc=NYHSaiZGV8EAX-kZJJ8&_nc_ht=scontent.flos1-1.fna&oh=58c53d9d427da5accede6af70b56f176&oe=60FDEB02" alt="" class="border-2 border-blue-200 rounded-full h-8 w-8" />
                <span class="">
                    Joshua Faloye
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
                <img src="https://scontent.flos1-1.fna.fbcdn.net/v/t1.6435-9/215984527_5867855996618138_7220758743570142723_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeGuYzyZyq2px_ltcyy2TWETEaHkOZ3wzYYRoeQ5nfDNhu8yqw75gRxSwIZEp26mDfgritJ-Cfm93Hl53KeUbePO&_nc_ohc=NYHSaiZGV8EAX-kZJJ8&_nc_ht=scontent.flos1-1.fna&oh=58c53d9d427da5accede6af70b56f176&oe=60FDEB02" alt="" class="border-2 border-blue-200 rounded-full h-10 w-12" />
                <div class="flex flex-col space-y-1">
                    <span class="text-blue-700 font-semibold">
                        Joshua Faloye
                    </span>
                    <div class="flex items-end space-x-2">
                        <span class="text-xs text-gray-500 font-bold">#Username</span>
                        <span class="h-2 w-2 bg-green-400 rounded-full animate-pulse"></span>
                    </div>
                </div>
            </div>

        </div>


        <a href="?menu=dash" class="{{ $menuUrl == 'dash' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold mt-3">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                </svg>
            </span>
            Dashboard
        </a>
        <a href="?menu=active" class="{{ $menuUrl == 'active' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.933 12.8a1 1 0 000-1.6L6.6 7.2A1 1 0 005 8v8a1 1 0 001.6.8l5.333-4zM19.933 12.8a1 1 0 000-1.6l-5.333-4A1 1 0 0013 8v8a1 1 0 001.6.8l5.333-4z" />
                </svg>
            </span>
            View active
        </a>
        <a href="?menu=history" class="{{ $menuUrl == 'history' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                </svg>
            </span>
            Ticket history
        </a>
        <a href="?menu=profile" class="{{ $menuUrl == 'profile' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            Profile
        </a>
        <a href="?menu=settings" class="{{ $menuUrl == 'settings' ? 'hover:bg-blue-100 hover:text-blue-900 rounded rounded-r-full shadow-outline-blue' : '' }} flex items-center text-md px-5 py-3 text-blue-700 hover:text-blue-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </span>
            Settings
        </a>
        <a href="logout" class="flex items-center text-md px-5 py-3 text-red-700 hover:text-red-600 font-semibold">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </span>
            Logout
        </a>
    </div>
</nav>
