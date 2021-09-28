{{-- dashboard include --}}
<div class="mb-5">
    <header class="font-bold text-2xl font-sans text-gray-700">
        Welcome Back!
    </header>
    <p class="mt-2 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
          </svg>
        <span class="font-semibold text-xs">
            Joshua Faloye
        </span>
    </p>
    <hr class="mt-2"/>
</div>

<div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
    <div class="bg-white rounded-md text-gray-500 shadow-xl text-md px-5 py-3">
        <div class="flex flex-col space-y-5 p-2">
            <header class="text-blue-700 font-semibold">
                Active tickets
            </header>
            <p class="text-right font-bold text-sm">2</p>
        </div>
    </div>
    <div class="bg-blue-700 hover:bg-blue-600 rounded-md shadow-2xl text-md px-5 py-3">
        <div class="flex flex-col space-y-5 p-2">
            <header class="text-blue-100 font-semibold">
                No. of logins today
            </header>
            <p class="text-right font-bold text-sm text-blue-100">2</p>
        </div>
    </div>
    <div class="bg-white rounded-md text-gray-500 shadow-xl text-md  px-5 py-3">
        <div class="flex flex-col space-y-5 p-2">
            <header class="text-blue-700 font-semibold">
                Next flight date
            </header>
            <p class="text-right font-bold text-sm">{{ date('d - m - Y') }}</p>
        </div>
    </div>
</div>

<div class="mt-5 hidden">
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, dolorem? Maiores cumque voluptatem veniam nemo unde, minima magnam, omnis ut nobis placeat modi, ea vitae autem quas architecto voluptate voluptatum!
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, dolorem? Maiores cumque voluptatem veniam nemo unde, minima magnam, omnis ut nobis placeat modi, ea vitae autem quas architecto voluptate voluptatum!
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, dolorem? Maiores cumque voluptatem veniam nemo unde, minima magnam, omnis ut nobis placeat modi, ea vitae autem quas architecto voluptate voluptatum!
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, dolorem? Maiores cumque voluptatem veniam nemo unde, minima magnam, omnis ut nobis placeat modi, ea
</div>
