@extends('master')
@section('title')
    Homepage
@endsection
@section('links')
    @include('partials.links')
@endsection


@section('header')
<header class="bg-plane3-bg bg-center bg-cover bg-no-repeat h-1/2 px-8 py-3 w-full">
    @include('partials.header-contact')
    {{-- navbar --}}
    @include('partials.nav')

    <div class="flex md:justify-between items-center xs:flex-col md:flex-row px-2 py-8">
        <div class="sm:w-full md:w-1/2 flex flex-col w-2/3">
            <hgroup class="font-mono font-bold leading-relaxed text-orange-500 tracking-tight mt-5">
                <h1 class="text-5xl">
                    Online Flight Tickets
                </h1>
                <h2 class="text-4xl">
                    Reservation
                </h2>
            </hgroup>
            <p class="mt-4 text-sm text-white sm:w-full font-semibold leading-8 text-justify tracking-tight">
                With Femi-airline, you can easily book any flight you need to travel safely thanks to our detailed system, services and experience.
            </p>

            <button type="button" class="bg-transparent px-2 py-4 text-white sm:w-full md:w-1/3 mt-5 rounded border-2 border-orange-500 hover:border-white hover:text-orange-500 font-semibold text-sm transition duration-300">
                Read more
            </button>  
        </div> 
        
        <div class="w-1/3">
            <div class="flex">
                <form action="ticket" method="POST" id="reservationForm" class="grid xs:grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-5 px-8 py-12  bg-transparent border-b-2 border-orange-500 shadow-2xl rounded">
                    @csrf
                    <div class="flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-100" text-orange-100 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                            </svg>
                            <label class="text-sm font-semibold italic text-orange-100">Trip type</label>
                        </div>
                        <select name="tripType" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none" id="trip-option" required >
                            <option value="0" selected>One way trip</option>
                            <option value="1">Round trip</option>
                        </select>
                    </div>
    
                    <div class="flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                            <label for="ticketType" class="text-sm text-orange-100 font-semibold">Ticket type</label>
                        </div>
                        <select name="ticketType" id="ticketType" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none" required>
                            <option value="">Type ...</option>
                            <option value="Adult">Adult</option>
                            <option value="Child">Child</option>
                            <option value="Infant">Infant</option>
                        </select>
                    </div>
    
                    <div class="flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-100" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                            </svg>
                            <label for="noOfTicket" class="text-sm text-orange-100 font-semibold">Number of ticket</label>
                        </div>
                        <input type="number" name="noOfTicket" id="noOfTicket" min="1" max="15"  class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" required/>
                    </div>
    
                    <div class="flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-100" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <label for="stateFrom" class="text-sm text-orange-100 font-semibold">Traveling from</label>
                        </div>
                        <select name="stateFrom" id="stateFrom" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none" required>
                            <option value="">From ...</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Abuja">Abuja</option>
                            <option value="Kaduna">Kaduna</option>
                        </select>
                    </div>
    
                    <div class="flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-100" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <label for="stateTo" class="text-sm text-orange-100 font-semibold">Traveling to</label>
                        </div>
                        <select name="stateTo" id="stateTo" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none" required>
                            <option value="">To ...</option>
                            @foreach ($states as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-100" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <label for="departureDate" class="text-sm text-orange-100 font-semibold">Departure date</label>
                        </div>
                        <input type="date" name="departureDate" id="departureDate" class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" required />
                    </div>
    
                    <div class="flex flex-col space-y-3" id="hide-rDate">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-100" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <label for="returningDate" class="text-sm text-orange-100 font-semibold">Returning date</label>
                        </div>
                        <input type="date" name="returningDate" id="returningDate" class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" />
                    </div>
                    <div class="flex flex-col space-y-3 justify-end">
                        <label class=""></label>
                        <button type="submit" class="bg-orange-100 px-2 py-3 text-orange-500 sm:w-full mt-5 rounded border-2 border-orange-100 hover:border-gray-300 hover:text-gray-500 font-semibold text-md flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                            </svg>
    
                            <span class="text-sm">
                                Proceed    
                            </span>
                        </button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
    </header>
@endsection

@section('main')
<main class="px-8 py-5">
    <section class="p-8">
        {{-- <div class="flex justify-center items-center text-gray-800 font-bold text-4xl font-serif">
            Our Credibility
        </div> --}}

        <div class="mt-20 p-8 grid md:grid-cols-3 gap-8 sm:grid-cols-1">
            <div class="flex flex-col bg-white rounded p-4 shadow-2xl hover:shadow-lg">
                <h1 class="flex flex-col justify-center items-center p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-2xl text-gray-900 font-semibold mt-5">Fast</span>
                </h1>
                <p class="text-gray-900 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>

            <div class="flex flex-col bg-orange-700 rounded p-4 shadow-2xl hover:shadow-lg hover:bg-orange-800 md:-mt-10 sm:mt-10">
                <h1 class="flex flex-col justify-center items-center p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 text-blue-100 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-2xl text-blue-100 font-semibold mt-5">Secure</span>
                </h1>
                <p class="text-blue-100 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>

            <div class="flex flex-col bg-white rounded p-4 shadow-2xl hover:shadow-lg">
                <h1 class="flex flex-col justify-center items-center p-5">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                      </svg>
                    <span class="text-2xl text-gray-900 font-semibold mt-5">Reliable</span>
                </h1>
                <p class="text-gray-900 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>
        </div>
    </section>

    <section class="flex justify-center flex-col p-8 space-y-12">
        <div class="text-gray-700 text-2xl flex justify-center font-semibold">
            Operational Procedure
        </div>
        <div class="flex justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-green-500 text-white flex justify-between px-12 py-8 rounded shadow-sm">
                    1
                </div>
                <span class="">
                    Flight search
                </span>
            </div>
            <div class="flex items-center space-x-3">
                <div class="bg-green-500 text-white flex justify-between px-12 py-8 rounded shadow-sm">
                    2
                </div>
                <span class="">
                    Flight selection
                </span>
            </div>
            <div class="flex items-center space-x-3">
                <div class="bg-green-500 text-white flex justify-between px-12 py-8 rounded shadow-sm">
                    3
                </div>
                <span class="">
                    Information
                </span>
            </div>
            <div class="flex items-center space-x-3">
               <div class="bg-green-500 text-white flex justify-between px-12 py-8 rounded shadow-sm">
                    4
               </div>
                <span class="">
                    Payment and checkout
                </span>
            </div>
        </div>
    </section>

    <hr>

    <div class="mt-5 mb-2 border-b text-gray-700 text-2xl font-semibold p-8 flex justify-center">
        Top destinations
    </div>
    <section class="mt-5 grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-4 space-x-3 p-8 gap-y-5">
        <div class="flex flex-col border-2 border-orange-200 rounded">
            <header class="bg-plane1-bg bg-center bg-cover bg-no-repeat h-64 py-1 px-5 flex flex-col">
                <span class="text-sm text-white font-bold flex justify-end py-2">
                    20&deg;
                </span>
            </header>
            <p class="bg-white flex justify-center p-2 font-bold text-xs uppercase">
                {{ config('app.name') }} airport
            </p>
        </div>

        <div class="flex flex-col border-2 border-orange-200 rounded">
            <header class="bg-anambra-bg bg-center bg-cover bg-no-repeat h-64 py-1 px-5 flex flex-col">
                <span class="text-sm text-white font-bold flex justify-end py-2">
                    20&deg;
                </span>
            </header>
            <p class="bg-white flex justify-center p-2 font-bold text-xs uppercase">
                anambra
            </p>
        </div>

        <div class="flex flex-col border-2 border-orange-200 rounded">
            <header class="bg-lagos-bg bg-center bg-cover bg-no-repeat h-64 py-1 px-5 flex flex-col">
                <span class="text-sm text-white font-bold flex justify-end py-2">
                    20&deg;
                </span>
            </header>
            <p class="bg-white flex justify-center p-2 font-bold text-xs uppercase">
                lagos
            </p>
        </div>

        <div class="flex flex-col border-2 border-orange-200 rounded">
            <header class="bg-kogi-bg bg-center bg-cover bg-no-repeat h-64 py-1 px-5 flex flex-col">
                <span class="text-sm text-white font-bold flex justify-end py-2">
                    20&deg;
                </span>
            </header>
            <p class="bg-white flex justify-center p-2 font-bold text-xs uppercase">
               kogi
            </p>
        </div>

        <div class="flex flex-col border-2 border-orange-200 rounded">
            <header class="bg-texas-bg bg-center bg-cover bg-no-repeat h-64 py-1 px-5 flex flex-col">
                <span class="text-sm text-white font-bold flex justify-end py-2">
                    20&deg;
                </span>
            </header>
            <p class="bg-white flex justify-center p-2 font-bold text-xs uppercase">
               texas
            </p>
        </div>

        <div class="flex flex-col border-2 border-orange-200 rounded">
            <header class="bg-dubai-bg bg-center bg-cover bg-no-repeat h-64 py-1 px-5 flex flex-col">
                <span class="text-sm text-white font-bold flex justify-end py-2">
                    20&deg;
                </span>
            </header>
            <p class="bg-white flex justify-center p-2 font-bold text-xs uppercase">
                dubai
            </p>
        </div>

        <div class="flex flex-col border-2 border-orange-200 rounded">
            <header class="bg-abuja-bg bg-center bg-cover bg-no-repeat h-64 py-1 px-5 flex flex-col">
                <span class="text-sm text-white font-bold flex justify-end py-2">
                    20&deg;
                </span>
            </header>
            <p class="bg-white flex justify-center p-2 font-bold text-xs uppercase">
               abuja
            </p>
        </div>

        <div class="flex flex-col border-2 border-orange-200 rounded">
            <header class="bg-jos-bg bg-center bg-cover bg-no-repeat h-64 py-1 px-5 flex flex-col">
                <span class="text-sm text-white font-bold flex justify-end py-2">
                    20&deg;
                </span>
            </header>
            <p class="bg-white flex justify-center p-2 font-bold text-xs uppercase">
                jos
            </p>
        </div>
    </section>

</main>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
