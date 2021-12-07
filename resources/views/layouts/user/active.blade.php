<div class="mb-5 flex justify-between">
    <div class="flex flex-col w-full ">
        <header class="font-bold text-2xl font-sans text-gray-700">
            Active reservation
        </header>
        <p class="mt-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
              </svg>
            <span class="font-semibold text-xs">

           @auth() {{ auth()->user()->first_name.' '.auth()->user()->last_name }}@endauth
            </span>
        </p>
    </div>

</div>
<hr class="mt-2"/>
@livewire('user.active')
