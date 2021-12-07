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
                <div class="xs:w-full overflow-auto">
                    <table class="min-w-full">
                        <thead class="text-blue-500">
                        <tr class="font-mono uppercase text-sm border-b">
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
                        <tbody class="">
                        @if(isset($bookings))
                            @foreach($bookings as $list)
{{--                                                    @dd($list)--}}
                                <tr class="">
                                    <td class="text-center text-xs font-bold py-5 px-3">
                                        {{$loop->iteration}}
                                    </td>
                                    <td class="text-center text-xs font-bold py-5 px-3">
                                        @if(isset($list->flight)) {{ get_country_state('NGA',$list->flight->departure)??null }}
                                        - {{ get_country_state('NGA',$list->flight->landing)??null }}@endif
                                    </td>
                                    <td class="text-center text-xs font-bold py-5 px-3">
                                        @if(isset($list->flight)) {{ $list->flight->flight_number }} @endif
                                    </td>
                                    <td class="text-center text-xs font-bold py-5 px-3">
                                        @if(isset($list->cabin)) {{$list->cabin->title}} @endif
                                    </td>
                                    <td class="text-center text-xs font-bold py-5 px-3">
                                        @if(isset($list->flight)) {{ $list->flight->departure_at->format('d M Y H:m:s a') }}@endif
                                    </td>
                                    <td class="text-center text-xs font-bold py-5 px-3">
                                        @if(isset($list->flight))  {{$list->flight->landing_at->diffInHours($list->flight->departure_at)}}
                                        hour(s) @endif
                                    </td>
                                    <td class="text-center text-xs font-bold py-5 px-3">
                                        {{number_format($list['amount'])}}{{$list['currency']}}
                                        ~ {{number_format(convert_currency($list['amount'],$list['currency'],'NGN'))}}
                                        NGN
                                    </td>

                                    <td class=" py-5 px-3">
                                        <a href="#"
                                           class="bg-red-600 text-red-100 font-semibold text-xs hover:bg-red-500 transition duration-300 px-3 py-2 rounded-md flex items-center justify-center space-x-2"
                                           onclick="if(confirm('Cancel Reservation?')===true)window.livewire.emit('deleteActive', {{$list['id']}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span class="">
                                            Cancel Reservation
                                        </span>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        @endif


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
