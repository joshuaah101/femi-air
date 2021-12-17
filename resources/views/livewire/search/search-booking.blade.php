<div class="">
    <section
        class="mt-5 px-5 py-4 flex xs:flex-col md:flex-row md:justify-between font-medium font-mono space-x-4">
        <div class="w-full" id="printBooking" media="print">
            <header class="text-lg uppercase font-semibold">
                Full Flight Details
            </header>
            <div class="flex flex-col mt-5 space-y-3">
                @if(isset($credentials->passengers))
                    @foreach($credentials->passengers as $user)
                        <h3 class="font-extrabold text-lg">Passenger {{$loop->iteration}}:</h3>
                        <div class="flex justify-between">
                                    <span class="">
                                        Full Name:
                                    </span>
                            <span class="">
                                        {{ $user['first_name'] }} {{ $user['last_name'] }}
                                    </span>
                        </div>
                        <div class="flex justify-between">
                                    <span class="">
                                        Gender:
                                    </span>
                            <span class="">
                                        {{$user['gender']}}
                                    </span>
                        </div>
                        <div class="flex justify-between">
                                    <span class="">
                                        Seat:
                                    </span>
                            <span class="">
                                     @if($user->seat)   {{$user->seat->code }} @endif
                                    </span>
                        </div>
                        <hr class="bg-gray-700"/>
                    @endforeach
                @endif
                <hr class="text-gray-600"/>
                @if(isset($credentials->email)&&$credentials->email)
                    <div class="flex justify-between">
                            <span class="">
                                E-mail:
                            </span>
                        <span class="">
                              {{$credentials->email}}
                            </span>
                    </div>
                @endif
                @if(isset($credentials->phone)&&$credentials->phone)
                    <div class="flex justify-between">
                            <span class="">
                                Phone:
                            </span>
                        <span class="">
                              {{$credentials->phone}}
                            </span>
                    </div>
                @endif
                <div class="flex justify-between">
                            <span class="">
                                Outbound:
                            </span>
                    <span class="">

                                @if(isset($credentials->flight)) {{ get_state('NGA',$credentials->flight->landing)['name']??'' }} @endif - @if(isset($credentials->flight)){{ $credentials->flight->landing_at->format('D d M y | h:m') }} @endif

                            </span>
                </div>
                <div class="flex justify-between">
                            <span class="">
                                Flight Code:
                            </span>
                    <span class="">
                            @if(isset($credentials->flight)&&$credentials->flight)  {{$credentials->flight->flight_number}} @endif
                            </span>
                </div>
                <div class="flex justify-between">
                            <span class="">
                                Cabin:
                            </span>
                    <span class="">
                              @if(isset($credentials->cabin)){{ $credentials->cabin->title }} @endif
                            </span>
                </div>
                <header class="text-lg uppercase font-semibold">
                    Booking Details:
                </header>
                <div class="flex justify-between">
                            <span class="">
                                Booking ID:
                            </span>
                    <span class="">
                              @if(isset($credentials)){{ $credentials['id'] }} @endif
                            </span>
                </div>
                <div class="flex justify-between">
                            <span class="">
                               Payment Reference ID:
                            </span>
                    <span class="">
                              @if(isset($credentials['payment'])){{ $credentials['payment']['reference'] }} @endif
                            </span>
                </div>
                <div class="flex justify-between">
                            <span class="">
                               Payment Status:
                            </span>
                    <span class="">
                              @if(isset($credentials['payment'])){{ $credentials['payment']['payment_successful']==1?"Confirmed":"No" }} @endif
                            </span>
                </div>
            </div>
        </div>
        <div class="w-full">
            <header class="text-lg uppercase font-semibold">
                Price details
            </header>
            <div class="flex flex-col mt-5 space-y-5">

                @if(isset($credentials->payment->breakdown))
                    @foreach($credentials->payment->breakdown as $list)
                        <p class="flex justify-between text-sm">
                            <span class="">Ticket cost </span> {{$list['title']}}
                            <span
                                class="">{{ number_format($list['amount'],2) }} {{ $list['currency'] }}</span>
                        </p>
                    @endforeach
                @endif
                @if(isset($credentials))
                    <p class="font-bold text-md font-sans flex justify-between">
                    <span class="">Total @if(isset($credentials->booking)&&(int)$credentials->booking->number_of_passengers>1)
                            (for all passengers) @endif </span>
                        <span
                            class="">{{number_format($credentials->amount,2)}} {{$credentials->currency}}</span>
                    </p>
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="flex-row flex-row container">
            <button
                class="bg-orange-500 px-2 py-3 text-orange-100 sm:w-full mt-5 rounded hover:text-orange-500 hover:bg-white font-semibold text-md flex justify-center transition duration-300"
                onclick="printJS('printBooking', 'html')">Print
            </button>
        </div>
    </section>

    <script type="text/javascript">

        $(window).bind({
            beforeunload: function (ev) {
                ev.preventDefault();
            },
            unload: function (ev) {
                ev.preventDefault();
            }
        });
    </script>
</div>
