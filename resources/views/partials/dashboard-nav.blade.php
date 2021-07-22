<nav class="shadow-xl font-semibold xs:left-0 md:left-1/6 xs:top-0 fixed w-full xs:bg-white md:bg-none">
    <div class="flex justify-between items-center py-3 px-5 md:mr-1/6">
        <a href="#" class="flex items-baseline -space-x-3">
            <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-16 h-8">
        </a>

        <div class="flex justify-between items-center space-x-5">
            <div class="text-blue-700 text-sm xs:hidden md:block">
                Faloye Joshua
            </div>
            <div class="text-blue-700 text-sm xs:hidden md:block">
                {{ date("d : m : Y") }}
            </div>
            <div class="md:hidden xs:flex">
                <button class="mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-10 text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
