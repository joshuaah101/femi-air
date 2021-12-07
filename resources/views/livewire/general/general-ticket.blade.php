<div class="bg-white px-5 py-4 shadow-lg rounded">

    <script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.sandbox.client_id')}}"
            data-sdk-integration-source="button-factory"></script>
    <section class="flex justify-between items-center border-b-2 py-3">
        <div class="flex justify-center items-center">
            <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-16 h-8">
            <span class="">
                    </span>
            <input hidden wire:model="hidden_step"/>
        </div>

        <div class="flex justify-between items-center space-x-8 font-medium font-mono text-lg">
                    <span
                        class="{{ $current_step===1  ? 'border-b-2 border-red-500' : '' }} cursor-pointer py-2"
                        wire:click="moveTo(1)">Flight selection</span>
            <span
                class="{{  $current_step===2 ? 'border-b-2 border-red-500' : '' }} cursor-pointer py-2"
                wire:click="moveTo(2)">Passenger information</span>
            <span class="{{  $current_step===3 ? 'border-b-2 border-red-500' : '' }} cursor-pointer py-2"
                  wire:click="moveTo(3)">Preview and confirmation</span>
            <span class="{{  $current_step===4 ? 'border-b-2 border-red-500' : '' }} cursor-pointer py-2"
                  wire:click="moveTo(4)">Payment</span>
        </div>
    </section>
    <div class="container-fluid">
        @if($current_step===1)
            <section class="mt-5  justify-between font-medium font-mono">
                <table class="min-w-full">
                    @if($flights && count($flights)>0)
                        <thead>
                        @foreach($flights as $item)
                            <tr class="bg-blue-800">
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-100 uppercase border-b border-blue-200">
                                    {{  $item->outbound_terminal->title }}
                                </th>
                                @if($item->cabin)
                                    @foreach($item->cabin as $cabin)
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-100 uppercase border-b border-blue-200">
                                            {{$cabin['title']}}
                                        </th>
                                    @endforeach
                                @endif
                            </tr>
                        </thead>

                        <tbody class="">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200 flex justify-center flex-col items-center">
                                <div class="flex items-center space-x-5">
                                    <div class="flex flex-col">
                                        {{$item->departure_at->format('d M H:M')}}
                                        <span class="">
                                            {{ get_state('NGA',$item['departure'])['name'] }}
                                        </span>
                                    </div>

                                    <span class="text-lg">
                                        &dash;
                                    </span>

                                    <div class="flex flex-col">
                                        {{$item->landing_at->format('d M H:M')}}
                                        <span class="">
                                            {{ get_state('NGA',$item['landing'])['name']}}
                                        </span>
                                    </div>
                                </div>
                                <p class="mt-5 text-red-500 text-xs font-medium">
                                    * Duration : {{$item->landing_at->diffInHours($item->departure_at)}} hour(s)
                                </p>
                            </td>
                            @if($item->cabin)
                                @foreach($item->cabin as $cabin)
                                    {{--  //check number of seats empty --}}
                                    @if(isset($cabin->seats) && (($cabin->seats()->whereDoesntHave('passenger')->count()+$noOfTicket)!== $cabin->seats()->count()))
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200 text-center">
                                            <div class="flex flex-col space-y-4">
                                                <div class="flex flex-col">
                                                    {{number_format((float)$cabin->pivot->amount)}}
                                                    <span class="">
                                           {{$cabin->pivot->currency}}
                                        </span>
                                                </div>

                                                <button type="button"
                                                        class="px-3 py-2 border-2 rounded border-blue-800 hover:bg-blue-800 hover:text-blue-100 transition duration-300"
                                                        wire:click="purchaseCabinSeat({{$item['id']}},{{$cabin['id']}})">
                                                    Select
                                                </button>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-blue-200 text-center">
                                            <div class="p-5 border-2">
                                                Sold out
                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                            @endif

                        </tr>
                        </tbody>
                        @endforeach
                    @else
                        <tbody>

                        <tr>
                            <td>
                                <div class="container text-center h-screen">
                                    <h1 class="font-extrabold text-xl my-5">No Flight In Location</h1>
                                    <button class="bg-blue-700 text-white hover:bg-blue-900 px-2 py-3 my-3 rounded-lg"
                                            wire:click="$set('current_step',0)">< back
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    @endif
                </table>
            </section>
        @elseif($current_step === 2)
            <div class="flex">
                <div class="mt-5 px-1 w-3/4" id="informationField">
                    <form wire:submit.prevent="submitProfile" id="ticketForm">
                        <div class="">
                            <section class="bg-white py-8 px-4 rounded shadow-2xl">
                                <h1 class="text-2xl text-green-700 font-semibold py-2 flex flex-col justify-center items-center border-b w-full">
                                    Passenger Information
                                </h1>
                                @if($noOfTicket
)
                                    @for($i=0; $i<$noOfTicket ;$i++)
                                        <h2 class="py-5 text-lg font-bold text-gray-500">
                                            Passenger {{$i+1}}
                                            :</h2> {{-- this represents the number of tickets selected, i.e the number of entity traveling with the user and the user himself--}}

                                        <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-3">
                                            <div class="mt-6 flex flex-col space-y-2">
                                                <div class="flex space-x-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                         viewBox="0 0 20 20"
                                                         fill="currentColor">
                                                        <path
                                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                                                    </svg>
                                                    <label for="gender" class="text-sm text-gray-800 font-semibold">Gender
                                                        <span
                                                            class="text-red-600 text-lg">*</span></label>
                                                </div>
                                                <select wire:model.lazy="passengers.{{$i}}.gender" id="gender"
                                                        class="shadow border border-gray-400 py-3 text-sm px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 appearance-none"
                                                        required>
                                                    <option value="">Gender ...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                @error('passengers.{{$i}}.gender')<p
                                                    class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="mt-6 flex flex-col space-y-2">
                                                <div class="flex space-x-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <label for="firstName" class="text-sm text-gray-800 font-semibold">First
                                                        name <span class="text-red-600 text-lg">*</span></label>
                                                </div>
                                                <input type="text" wire:model.lazy="passengers.{{$i}}.first_name"
                                                       id="firstName"
                                                       class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                                       placeholder="Enter your first name" required/>
                                                @error('passengers.{{$i}}.first_name')<p
                                                    class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="mt-6 flex flex-col space-y-2">
                                                <div class="flex space-x-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                         viewBox="0 0 20 20"
                                                         fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                    <label for="lastName" class="text-sm text-gray-800 font-semibold">Last
                                                        name
                                                        <span class="text-red-600 text-lg">*</span></label>
                                                </div>
                                                <input type="text" wire:model.lazy="passengers.{{$i}}.last_name"
                                                       id="lastName"
                                                       class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                                       placeholder="Enter your last name" required/>
                                                @error('passengers.{{$i}}.last_name')<p
                                                    class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="mt-6 flex flex-col space-y-2">
                                                <div class="flex space-x-1 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                         viewBox="0 0 20 20"
                                                         fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                    <label for="dateOfBirth"
                                                           class="text-sm text-gray-800 font-semibold">Date of
                                                        birth <span class="text-red-600 text-lg">*</span></label>
                                                </div>
                                                <input type="date" wire:model.lazy="passengers.{{$i}}.date_of_birth"
                                                       id="dateOfBirth"
                                                       class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                                       required/>
                                                @error('passengers.{{$i}}.date_of_birth')<p
                                                    class="text-danger">{{ $message }}</p> @enderror
                                            </div>


                                        </div>
                                    @endfor
                                @endif
                            </section>
                            <section class="bg-white py-8 px-4 rounded shadow-2xl mt-5">
                                <h1 class="text-2xl text-green-700 font-semibold py-2 flex flex-col justify-center items-center border-b w-full mb-5">
                                    Contact Information
                                </h1>

                                <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-3">
                                    <div class="mt-6 flex flex-col space-y-2">
                                        <div class="flex space-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <label for="email" class="text-sm text-gray-800 font-semibold">E-mail <span
                                                    class="text-red-600 text-lg">*</span></label>
                                        </div>
                                        <input type="email" wire:model="email" id="email"
                                               class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                               placeholder="eg. adamSmith98@gmail.com" required/>
                                        @error('email')<p class="text-danger">{{$message}}</p> @enderror
                                    </div>

                                    <div class="mt-6 flex flex-col space-y-2">
                                        <div class="flex space-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path
                                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                            </svg>
                                            <label for="phone" class="text-sm text-gray-800 font-semibold">Phone number
                                                <span class="text-red-600 text-lg">*</span></label>
                                        </div>
                                        <input type="tel" wire:model="phone" id="phone"
                                               class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                               placeholder="0803 995 3012" required/> @error('phone')<p
                                            class="text-danger">{{$message}}</p> @enderror
                                    </div>

                                    <div class="mt-6 flex flex-col space-y-2">
                                        <div class="flex space-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <label for="state_of_origin" class="text-sm text-gray-800 font-semibold">State
                                                <span
                                                    class="text-red-600 text-lg">*</span></label>
                                        </div>
                                        <select wire:model="state_of_origin" id="state_of_origin"
                                                class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none"
                                                required>
                                            <option value="">State</option>
                                            @if(isset($states))
                                                @foreach ($states as $key=>$state)
                                                    <option value="{{ $key }}">{{ $state['name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('state_of_origin')<p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                            </section>
                            <section class="flex justify-between mt-5">
                                <button type="button" wire:click="moveTo(1)"
                                        class="px-8 py-4 text-xs font-semibold text-white bg-red-600 hover:bg-red-500 rounded">
                                    &lt; Back
                                </button>

                                <button type="submit"
                                        class="px-8 py-4 text-xs font-semibold text-white bg-blue-800 hover:bg-blue-700 rounded">
                                    Preview &gt;
                                </button>
                            </section>
                        </div>
                    </form>
                </div>
                <div class="w-1/4">
                    <div class="mt-5 rounded shadow-md">
                        <header class="bg-blue-800 px-2 py-5 text-blue-100 flex justify-center font-semibold uppercase">
                            trip summary
                            for @if(isset($new_booking->flight->terminal)){{$new_booking->flight->terminal->title}} @endif
                        </header>

                        <div
                            class="list-style-none space-y-4 font-medium text-sm text-gray-500 p-3 divide-y-2 divide-gray-400">
                            <section class="flex flex-col space-y-4 p-1">
                                <header class="font-semibold text-md text-gray-700 font-sans">
                                    Departing
                                </header>
                                <div class="flex flex-col space-y-2 font-mono">
                                    <header class="text-sm">
                                        {{-- state departing eg. -> --}} @if(isset($new_booking->flight))   {{ get_state('NGA',$new_booking->flight->departure)['name']??'' }} @endif
                                    </header>
                                    <p class="text-xs">
                                        {{-- date of departure e.g -> --}}
                                        @if(isset($new_booking->flight))   {{ $new_booking->flight->departure_at->format('d/m/y | h-m') }} @endif
                                    </p>
                                </div>
                            </section>

                            <section class="flex flex-col space-y-4 p-1">
                                <header class="font-semibold text-md text-gray-700 font-sans">
                                    Arrival
                                </header>
                                <div class="flex flex-col space-y-2 font-mono">
                                    <header class="text-sm">
                                        {{-- state arrival eg. -> --}}  @if(isset($new_booking->flight)) {{ get_state('NGA',$new_booking->flight->landing)['name']??'' }} @endif
                                    </header>
                                    <p class="text-xs">
                                        {{-- date of departure e.g -> --}}   @if(isset($new_booking->flight))  {{ $new_booking->flight->landing_at->format('d/m/y | h-m') }} @endif
                                    </p>
                                </div>
                            </section>

                            <section class="flex flex-col space-y-4 p-1">
                                <header class="text-md text-gray-700 font-semibold font-sans">
                                    Flight details
                                </header>
                                <div class="flex flex-col space-y-2 font-mono">
                                    <header class="flex justify-between text-sm">
                                        <span class="">Flight code </span> @if($new_booking->flight) <span
                                            class="">{{$new_booking->flight->flight_number}}</span> @endif
                                    </header>
                                    <p class="flex justify-between text-sm">
                                        <span class="">Cabin </span> <span class="">
                                            @if(isset($new_booking->cabin)){{ $new_booking->cabin->title }} @endif </span>
                                    </p>
                                </div>
                            </section>

                            <section class="flex flex-col space-y-4 p-1">
                                <header class="text-md text-gray-700 font-semibold font-sans">
                                    Cost details
                                </header>
                                <div class="flex flex-col space-y-2 font-mono">

                                    <p class="flex justify-between text-sm">
                                        <span class="">Ticket cost </span> @if(isset($ticket_fee) && $ticket_fee)
                                            <span
                                                class="">{{ number_format($ticket_fee) }} {{ $ticket_fee_currency }}</span>
                                        @endif
                                    </p>
                                    @if(isset($taxes)&& count($taxes)>0)
                                        @foreach($taxes as $tax)

                                            {{--                                            use percentage of the ticket amount for this tax else use a flat rate--}}
                                            @if((int)$tax['use_percentage']===1)
                                                @php $vat = $ticket_fee * ((float)$tax['percentage_amount']/100); @endphp
                                                <p class="flex justify-between text-sm">
                                                  @isset($tax['title'])  <span class="">{{$tax['title']}} </span>@endisset <span
                                                        class="">{{$vat}} {{$ticket_fee_currency}}</span>
                                                </p>
                                            @else
                                                <p class="flex justify-between text-sm">
                                                    <span class="">{{$tax['title']}} </span> <span
                                                        class="">{{number_format($tax['flat_amount'])}} {{$ticket_fee_currency}}</span>
                                                </p>
                                            @endif

                                        @endforeach
                                    @endif
                                    <p class="font-bold text-md font-sans flex justify-between">
                                        <span class="">Sub Total </span> <span
                                            class="">{{number_format($sub_total)}} {{$ticket_fee_currency}}</span>
                                    </p>
                                    <p class="font-bold text-md font-sans flex justify-between">
                                        <span class="">Total @if($noOfTicket>1) (for all passengers) @endif </span>
                                        <span
                                            class="">{{number_format($total)}} {{$ticket_fee_currency}}</span>
                                    </p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($current_step ===3)
            <section
                class="mt-5 px-5 py-4 flex xs:flex-col md:flex-row md:justify-between font-medium font-mono space-x-32">
                <div class="w-full">
                    <header class="text-lg uppercase font-semibold">
                        Flight summary
                    </header>
                    <div class="flex flex-col mt-5 space-y-3">
                        @if($noOfTicket>1)
                            @foreach($passengers as $user)
                                <h3 class="font-extrabold text-lg">Passenger {{$loop->iteration}}:</h3>
                                <div class="flex justify-between">
                                    <span class="">
                                        Full name:
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
                            @endforeach

                        @else
                            <div class="flex justify-between">
                            <span class="">
                                Full name:
                            </span>
                                <span class="">
                                {{ $passengers[0]['first_name'] }} {{ $passengers[0]['last_name'] }}
                            </span>
                            </div>
                        @endif
                        <hr class="text-gray-600"/>
                        <div class="flex justify-between">
                            <span class="">
                                E-mail:
                            </span>
                            <span class="">
                              {{$email}}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="">
                                Phone:
                            </span>
                            <span class="">
                              {{$phone}}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="">
                                Outbound:
                            </span>
                            <span class="">
{{--                                Lagos - Abuja--}}
                                @if(isset($new_booking->flight)) {{ get_state('NGA',$new_booking->flight->landing)['name']??'' }} @endif - @if(isset($new_booking->flight)){{ $new_booking->flight->landing_at->format('d/m/y | h-m') }} @endif

                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="">
                                Flight Code:
                            </span>
                            <span class="">
                            @if($new_booking->flight)  {{$new_booking->flight->flight_number}} @endif
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="">
                                Cabin:
                            </span>
                            <span class="">
                              @if(isset($new_booking->cabin)){{ $new_booking->cabin->title }} @endif
                            </span>
                        </div>

                    </div>
                </div>
                <div class="w-full">
                    <header class="text-lg uppercase font-semibold">
                        Price details
                    </header>
                    <div class="flex flex-col mt-5 space-y-5">
                        {{--                        <p class="flex justify-between text-sm">--}}
                        {{--                            <span class="">Ticket cost </span> <span class="">19,000 NGN</span>--}}
                        {{--                        </p>--}}
                        {{--                        <p class="flex justify-between text-sm">--}}
                        {{--                            <span class="">Tax </span> <span class="">3,000 NGN</span>--}}
                        {{--                        </p>--}}
                        {{--                        <p class="flex justify-between text-sm">--}}
                        {{--                            <span class="">Service charge </span> <span class="">4,000 NGN</span>--}}
                        {{--                        </p>--}}
                        {{--                        <p class="font-bold text-md font-sans flex justify-between">--}}
                        {{--                            <span class="">Total </span> <span class="">50,000 NGN</span>--}}
                        {{--                        </p>--}}
                        <p class="flex justify-between text-sm">
                            <span class="">Ticket cost </span> @if(isset($ticket_fee) && $ticket_fee)
                                <span
                                    class="">{{ number_format($ticket_fee) }} {{ $ticket_fee_currency }}</span>
                            @endif
                        </p>
                        @if(isset($taxes)&& count($taxes)>0)
                            @foreach($taxes as $tax)
                                {{--                                            use percentage of the ticket amount for this tax else use a flat rate--}}
                                @if((int)$tax['use_percentage']===1)
                                    @php $vat = $ticket_fee* ((float)$tax['percentage_amount']/100); @endphp
                                    <p class="flex justify-between text-sm">
                                        <span class="">{{$tax['title']}} </span> <span
                                            class="">{{$vat}} {{$ticket_fee_currency}}</span>
                                    </p>
                                @else
                                    <p class="flex justify-between text-sm">
                                        <span class="">{{$tax['title']}} </span> <span
                                            class="">{{number_format($tax['flat_amount'])}} {{$ticket_fee_currency}}</span>
                                    </p>
                                @endif

                            @endforeach
                        @endif
                        <p class="font-bold text-md font-sans flex justify-between">
                            <span class="">Sub Total </span> <span
                                class="">{{number_format($sub_total)}} {{$ticket_fee_currency}}</span>
                        </p>
                        <p class="font-bold text-md font-sans flex justify-between">
                            <span class="">Total @if($noOfTicket>1) (for all passengers) @endif </span>
                            <span
                                class="">{{number_format($total)}} {{$ticket_fee_currency}}</span>
                        </p>
                    </div>
                </div>
            </section>
            <section class="flex justify-between mt-5">
                <button type="button" wire:click="moveTo(2)"
                        class="px-8 py-4 text-xs font-semibold text-white bg-red-600 hover:bg-red-500 rounded">
                    &lt; Back
                </button>

                <button wire:click="payForBooking"
                        class="px-8 py-4 text-xs font-semibold text-white bg-blue-800 hover:bg-blue-700 rounded">
                    Proceed to Payment &gt;
                </button>
            </section>
        @elseif($current_step ===4)
            <section class="mt-8 px-32">
                <div class="p-5 rounded shadow-inner flex items-center space-x-5">
                    <div class="p-5 w-1/2">
                        <img src="{{ asset('storage/img/visa-card.png') }}" alt="visa card" class="">
                    </div>
                    <div class="p-5 flex flex-col w-1/2">
                        <header class="text-blue-700 font-sans font-medium text-3xl mb-5">
                            Payment Details
                        </header>
                        <div class="mt-3">
                            <div class="flex flex-col">
                                <label for="name-on-card" class="text-xl font-medium mb-5">
                                    Total Sum of {{$ticket_fee_currency}}{{number_format($total)}} ~
                                    USD{{number_format(convert_currency($total,$ticket_fee_currency,'USD'))}}
                                </label>
                            </div>

                            {{--                            <div class="flex flex-col">--}}
                            {{--                                --}}{{--                                    <label for="card-number" class="text-xs font-medium text-gray-400">--}}
                            {{--                                --}}{{--                                        Card Number--}}
                            {{--                                --}}{{--                                    </label>--}}
                            {{--                                --}}{{--                                    <input type="text" name="card_number" id="card-number"--}}
                            {{--                                --}}{{--                                           placeholder="2233 8854 7787 8965"--}}
                            {{--                                --}}{{--                                           class="border-b px-3 py-2 focus:outline-none" required>--}}
                            {{--                                --}}{{--                                </div>--}}

                            {{--                                --}}{{--                                <div class="flex space-x-5">--}}
                            {{--                                --}}{{--                                    <div class="flex flex-col">--}}
                            {{--                                --}}{{--                                        <label for="card-number" class="text-xs font-medium text-gray-400">--}}
                            {{--                                --}}{{--                                            Valid Through--}}
                            {{--                                --}}{{--                                        </label>--}}
                            {{--                                --}}{{--                                        <div class="flex flex-wrap">--}}
                            {{--                                --}}{{--                                            <input type="number" name="card_number" id="card-number" placeholder="month"--}}
                            {{--                                --}}{{--                                                   class="border-b py-2 w-16 focus:outline-none appearance-none text"--}}
                            {{--                                --}}{{--                                                   required>--}}

                            {{--                                --}}{{--                                            <input type="number" name="card_number" id="card-number" placeholder="date"--}}
                            {{--                                --}}{{--                                                   class="border-b py-2 w-16 focus:outline-none textfield" required>--}}
                            {{--                                --}}{{--                                        </div>--}}
                            {{--                                --}}{{--                                    </div>--}}

                            {{--                                --}}{{--                                    <div class="flex flex-col">--}}
                            {{--                                --}}{{--                                        <label for="cvv" class="text-xs font-medium text-gray-400">--}}
                            {{--                                --}}{{--                                            CVV--}}
                            {{--                                --}}{{--                                        </label>--}}
                            {{--                                --}}{{--                                        <input type="number" name="cvv" id="cvv" placeholder="885"--}}
                            {{--                                --}}{{--                                               class="border-b px-3 py-2 w-16 focus:outline-none" required>--}}
                            {{--                                --}}{{--                                    </div>--}}
                            {{--                            </div>--}}

                            <div id="smart-button-container">
                                <div style="text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                            <script>
                                function initPayPalButton() {
                                    $(document).ready(function () {
                                        paypal.Buttons({
                                            style: {
                                                shape: 'rect',
                                                color: 'gold',
                                                layout: 'vertical',
                                                label: 'paypal',

                                            },

                                            createOrder: function (data, actions) {
                                                return actions.order.create({
                                                    payer: {
                                                        name: {
                                                            given_name: "{{auth()->user()->first_name}}",
                                                            surname: "{{auth()->user()->last_name}}"
                                                        },
                                                        email_address: "{{auth()->user()->email}}",
                                                        phone: {
                                                            phone_type: "MOBILE",
                                                            phone_number: {
                                                                national_number: "{{auth()->user()->phone}}"
                                                            }
                                                        }
                                                    },
                                                    purchase_units: [{
                                                        "amount": {
                                                            "currency_code": "USD",
                                                            "value": {{number_format(convert_currency($total,$ticket_fee_currency,'USD'),2,".","")}}
                                                        }
                                                    }]
                                                });
                                            },

                                            onApprove: function (data, actions) {
                                                return actions.order.capture().then(function (orderData) {
                                                    // Full available details
                                                    // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                                    window.livewire.emit('paymentConfirmed', orderData);
                                                    // Show a success message within this page, e.g.
                                                    const element = document.getElementById('paypal-button-container');
                                                    element.innerHTML = '';
                                                    element.innerHTML = '<h3>Ticket Payment Successful!</h3>';

                                                    // Or go to another URL:  actions.redirect('thank_you.html');

                                                });
                                            },

                                            onError: function (err) {
                                                console.log(err);
                                            }
                                        }).render('#paypal-button-container');
                                    })
                                }

                                initPayPalButton();
                            </script>
                        </div>

                    </div>
                </div>
                <section class="flex justify-between mt-5">
                    <button type="button" wire:click="moveTo(3)"
                            class="px-8 py-4 text-xs font-semibold text-white bg-red-500 hover:bg-red-600 rounded">
                        &lt; Back
                    </button>

                    {{--                    <button type="button" onclick="document.getElementsById('payemnt-form').submit()"--}}
                    {{--                            class="px-8 py-4 text-xs font-semibold text-white bg-blue-500 hover:bg-blue-600 rounded">--}}
                    {{--                        Pay 55,000 NGN &gt;--}}
                    {{--                    </button>--}}
                </section>
            </section>
        @else
            <form wire:submit.prevent="bookTicket" method="POST" id="reservationForm"
                  class="grid xs:grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-5 px-8 py-12  bg-transparent border-b-2 border-orange-500 shadow-2xl rounded">
                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <label class="text-sm font-semibold italic text-white">Trip type</label>
                    </div>
                    <select name="tripType"
                            class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm appearance-none"
                            wire:model="trip_type"
                            id="trip-option" required>
                        <option value="0" selected>One way trip</option>
                        <option value="1">Round trip</option>
                    </select>
                    @error('trip_type') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                        <label for="ticketType" class="text-sm text-white font-semibold">Ticket type</label>
                    </div>
                    <select wire:model="ticketType" id="ticketType"
                            class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm appearance-none"
                            required>
                        <option value="">Type ...</option>
                        <option value="Adult">Adult</option>
                        <option value="Child">Child</option>
                        <option value="Infant">Infant</option>
                    </select>
                    @error('ticketType') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <label for="noOfTicket" class="text-sm text-white font-semibold">Number of ticket</label>
                    </div>
                    <input type="number" wire:model="noOfTicket" id="noOfTicket" min="1" max="15"
                           class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm"
                           required/>
                    @error('noOfTicket') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <label for="stateFrom" class="text-sm text-white font-semibold">Traveling from</label>
                    </div>
                    <select wire:model="stateFrom" id="stateFrom"
                            class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm appearance-none"
                            required>
                        <option value="">From ...</option>
                        @if(isset($states) && $states)
                            @foreach ($states as $state)
                                <option value="{{ $state['postal'] }}">{{ $state['name'] }}</option>
                            @endforeach
                        @endif
                    </select>

                    @error('stateFrom') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <label for="stateTo" class="text-sm text-white font-semibold">Traveling to</label>
                    </div>
                    <select wire:model="stateTo" id="stateTo"
                            class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm appearance-none"
                            required>
                        <option value="">To ...</option>
                        @if(isset($states) && $states)
                            @foreach ($states as $state)
                                <option value="{{ $state['postal'] }}">{{ $state['name'] }}</option>
                            @endforeach
                        @endif
                    </select>

                    @error('stateTo') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <label for="departureDate" class="text-sm text-white font-semibold">Departure date</label>
                    </div>
                    <input type="datetime-local" wire:model="departureDate" id="departureDate"
                           class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm"
                           required/>
                    @error('departureDate') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col space-y-3 hidden" id="hide-rDate">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <label for="returningDate" class="text-sm text-white font-semibold">Returning date</label>

                        @error('returningDate') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <input type="date" wire:model="returningDate" id="returningDate"
                           class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm"/>
                </div>
                <div class="flex flex-col space-y-3 justify-end">
                    <label class=""></label>
                    <button type="submit" id="reservationBtn"
                            class="bg-orange-500 px-2 py-3 text-orange-100 sm:w-full mt-5 rounded hover:text-orange-500 hover:bg-white font-semibold text-md flex justify-center transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd"
                                  d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                  clip-rule="evenodd"/>
                        </svg>

                        <span class="text-sm">
                            Proceed
                        </span>
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>
