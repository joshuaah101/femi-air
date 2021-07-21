<nav class="border-l border-r shadow-2xl text-sm text-blue-800 font-semibold xs:left-0 md:left-1/6 xs:top-0 fixed w-full xs:bg-white md:bg-none">
    <div class="flex xs:justify-between md:justify-end items-center py-5 px-5 md:mr-1/6">
        <div class="font-bold">
            {{ config('app.name') }} - logo
        </div>

        <div class="md:hidden xs:flex">
            <button class="mobile-menu-button shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-10" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
</nav>
