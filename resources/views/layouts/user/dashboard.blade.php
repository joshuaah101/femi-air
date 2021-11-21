{{-- dashboard include --}}
<div class="mb-5 w-full">
    <header class="font-bold text-2xl font-sans text-gray-700">
        Welcome Back!
    </header>
    <p class="mt-2 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
          </svg>
        <span class="font-semibold text-xs">
            Femi Awe
        </span>
    </p>
    <hr class="mt-2"/>
</div>

<div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 w-full">
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


<div class="mt-8 flex w-full xs:space-x-0 md:space-x-5 xs:space-y-5 md:space-y-0 xs:flex-col md:flex-row">
    <div class="flex bg-white xs:px-5 md:px-24 xs:py-2 md:py-8 shadow-2xl rounded flex-col xs:w-full md:w-1/2">
        <header class="text-md font-medium text-blue-800">
            Most visited places
        </header>
        <canvas id="mostVisitedChart" class="h-auto w-auto mt-12"></canvas>
    </div>
    
    <div class="flex flex-col px-5 py-8 shadow-2xl rounded xs:w-full md:w-1/2">
        <header class="">
            
        </header>
        <p class="">

        </p>
    </div>
</div>

<div class="bg-white  px-5 py-8 shadow-2xl rounded">
    <header class="text-md font-medium text-blue-800">
        Flight history overview
    </header>
    <section class="py-5 px-3 overflow-auto">
        <table class="min-w-full">
            <thead class="text-blue-500">
                <tr class="font-mono uppercase text-sm border-b">
                    <th class="px-2 py-3">
                        S/n
                    </th>
                    <th class="px-2 py-3">
                        Outbound
                    </th>
                    <th class="px-2 py-3">
                        Flight code
                    </th>
                    <th class="px-2 py-3">
                        Cabin
                    </th>
                    <th class="px-2 py-3">
                        Date
                    </th>
                    <th class="px-2 py-3">
                        Duration
                    </th>
                    <th class="px-2 py-3">
                        Price (NGN)
                    </th>
                    <th class="px-2 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-xs">
                    <td class="text-center text-xs font-bold py-5 px-3">
                        1
                    </td>
                    <td class="text-center text-xs font-bold py-5 px-3">
                        Abuja - Lagos
                    </td>
                    <td class="text-center text-xs font-bold py-5 px-3">
                        WX-23ff
                    </td>
                    <td class="text-center text-xs font-bold py-5 px-3">
                        Economy
                    </td>
                    <td class="text-center text-xs font-bold py-5 px-3">
                        2021-11-25
                    </td>
                    <td class="text-center text-xs font-bold py-5 px-3">
                        3 hrs
                    </td>
                    <td class="text-center text-xs font-bold py-5 px-3">
                        55,000
                    </td>
                    <td class="py-5 px-3">
                        <a href="#" class="bg-red-600 text-red-100 font-semibold text-xs hover:bg-red-500 transition duration-300 px-3 py-2 rounded-md flex justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
            <tfoot class="">
                
            </tfoot>
        </table>
    </section>
</div>

