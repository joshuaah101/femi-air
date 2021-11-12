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
                Joshua Faloye
            </span>
        </p>
    </div>

</div>
<hr class="mt-2"/>

<div class="flex xs:flex-col md:flex-row mt-5">
    <div class="md: xs:w-full">
        <div class="space-y-5 font-mono">
            <div class="font-bold bg-blue-200 text-blue-800 px-5 py-3 rounded">
                <header class="text-md">
                    Current Reservation
                </header>
            </div>

            {{-- this section will be dynamic --}}
            <div class="flex space-y-3 items-center px-2 py-2">
                <div class="xs:w-full md:w-">
                    <table class="min-w-full">
                        <thead class="bg-blue-800 text-blue-100">
                            <tr class="font-sans font-medium uppercase text-sm">
                                <th class="px-8 py-3">
                                    S/n
                                </th>
                                <th class="px-8 py-3">
                                    Outbound
                                </th>
                                <th class="px-8 py-3">
                                    Flight code
                                </th>
                                <th class="px-8 py-3">
                                    Cabin
                                </th>
                                <th class="px-8 py-3">
                                    Date
                                </th>
                                <th class="px-8 py-3">
                                    Duration
                                </th>
                                <th class="px-8 py-3">
                                    Price (NGN)
                                </th>
                                <th class="px-8 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-blue-100">
                            <tr class="border-b">
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
                                <td class=" py-5 px-3">
                                    <a href="#" class="bg-red-600 text-red-100 font-semibold text-xs hover:bg-red-500 transition duration-300 px-3 py-2 rounded-md flex items-center justify-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg>
                                        <span class="">
                                            Cancel Reservation
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="">

                        </tfoot>
                    </table>
                </div>
            </div>
            {{-- ends here --}}
        </div>
    </div>
</div>