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

<div class="flex xs:flex-col md:flex-row md:space-x-8 xs:space-x-0 xs:space-y-8 md:space-y-0 items-start">
    <div class="xs:w-full md:w-2/4 bg-white px-5 py-3 shadow-lg rounded">
        <header class="text-lg font-bold text-blue-600 font-mono">
            Passenger Information
        </header>
        <section class="py-5 px-3">
            <canvas id="myChart" vlass="w-auto h-auto"></canvas>
        </section>
    </div>
    <div class="flex flex-col xs:w-full md:w-2/4 space-y-8">
        <div class="px-5 py-3 bg-white shadow-lg rounded">
            <header class="text-lg font-bold text-blue-600 font-mono">
                Active Flights
            </header>
            <section class="py-5 px-3 space-y-4 text-xs">
                <div class="flex justify-between items-center font-medium">
                    Lagos to Delta | 2021-11-16 <span class="rounded-full bg-blue-800 text-blue-100 p-2">Duration: 10:20 - 12:20</span>
                </div>
                <div class="flex justify-between items-center font-medium">
                    Abuja to Benin | 2021-11-16 <span class="rounded-full bg-blue-800 text-blue-100 p-2">Duration: 10:20 - 12:20</span>
                </div>
                <div class="flex justify-between items-center font-medium">
                    Kaduna to Lagos | 2021-11-16 <span class="rounded-full bg-blue-800 text-blue-100 p-2">Duration: 10:20 - 12:20</span>
                </div>
                <div class="flex justify-between items-center font-medium">
                    Lagos to Kogi | 2021-11-16 <span class="rounded-full bg-blue-800 text-blue-100 p-2">Duration: 10:20 - 12:20</span>
                </div>
            </section>
        </div>
    </div>
</div>


<div class="mt-8 px-2 py-3 bg-white shadow-lg rounded">
    <header class="text-lg font-bold text-blue-600 font-mono">
        User table
    </header>
    <section class="py-5 px-3 overflow-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b-2 border-blue-100">
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-800 uppercase">
                        S/n
                    </th>

                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-800 uppercase">
                        Full name
                    </th>

                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-800 uppercase">
                        Gender
                    </th>

                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-800 uppercase">
                        E-mail
                    </th>

                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-800 uppercase">
                        Phone
                    </th>
                </tr>
            </thead>

            <tbody class="">
                <tr class="text-xs font-medium text-gray-500">
                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        1
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        Femi Awe
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        Male
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        femiawe@gmail.com
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        09012876656
                    </td>
                </tr>

                <tr class="text-xs font-medium text-gray-500">
                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        2
                    </td>
                    
                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        Tola Awe
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        Female
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        tolaawe@gmail.com
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        09012778854
                    </td>
                </tr>

                <tr class="text-xs font-medium text-gray-500">
                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        3
                    </td>
                    
                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        lolu Awe
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        Male
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        loluawe@gmail.com
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        09012899556
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>
