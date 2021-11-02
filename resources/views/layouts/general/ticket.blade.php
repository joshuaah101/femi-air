@extends('master')
@section('title')
    Book a ticket
@endsection

@section('links')
    @include('partials.links')
@endsection

@section('nav')
    @include('partials.nav')
@endsection

@section('header')
    <header class="flex flex-col justify-center items-center shadow-lg space-y-5 py-8">
        <h1 class="text-4xl text-blue-800 font-bold">
            Book a ticket
        </h1>
        <h4 class="text-xl text-blue-700 font-semibold">
            Make a reservation ...
        </h4>
    </header>
    @endsection
    
@section('main')    
    <main class="my-8 px-8">
        <section class="px-8 py-4 mt-3">
            @csrf
            <form action="ticket" method="POST" id="reservationForm" class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-x-4 gap-y-5 px-12 py-8 shadow-lg bg-blue-500 rounded">
                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                        </svg>
                        <label class="text-sm font-semibold italic text-gray-800">Trip type</label>
                    </div>
                    <select name="tripType" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none" id="trip-option" required >
                        <option value="0" selected>One way trip</option>
                        <option value="1">Round trip</option>
                    </select>
                </div>

                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                        <label for="ticketType" class="text-sm text-gray-800 font-semibold">Ticket type</label>
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                        </svg>
                        <label for="noOfTicket" class="text-sm text-gray-800 font-semibold">Number of ticket</label>
                    </div>
                    <input type="number" name="noOfTicket" id="noOfTicket" min="1" max="15" placeholder="1" class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" required/>
                </div>

                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <label for="stateFrom" class="text-sm text-gray-800 font-semibold">Traveling from</label>
                    </div>
                    <select name="stateFrom" id="stateFrom" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none" required>
                        <option value="">From ...</option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}">{{ $state }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col space-y-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <label for="stateTo" class="text-sm text-gray-800 font-semibold">Traveling to</label>
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <label for="departureDate" class="text-sm text-gray-800 font-semibold">Departure date</label>
                    </div>
                    <input type="date" name="departureDate" id="departureDate" class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" required />
                </div>

                <div class="flex flex-col space-y-3" id="hide-rDate">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <label for="returningDate" class="text-sm text-gray-800 font-semibold">Returning date</label>
                    </div>
                    <input type="date" name="returningDate" id="returningDate" class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" />
                </div>
                <div class="flex flex-col space-y-3 justify-end">
                    <label class=""></label>
                    <button type="submit" class="bg-green-500 text-blue-100 px-2 py-3 rounded w-full hover:bg-green-700 font-semibold font-mono focus:outline-none flex items-center justify-center border border-gray-100">
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
        </section>

        <section class="" id="informationField">
            <p class="text-md text-blue-800 mt-5 font-semibold p-5 text-center">
                Please fill in all appropriate fields correctly and input all details according to the instructions given as the fields are all required.
            </p>
            @csrf
            <form action="" method="POST" id="ticketForm">
                <section class="bg-white p-4 rounded shadow-2xl">
                    <h1 class="text-xl text-gray-700 font-semibold py-4">
                        Personal Information
                    </h1>
                    <hr class="border-2 border-blue-700 sm:w-2/5 md:w-1/4">
    
                    <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                        <div class="mt-6 flex flex-col space-y-3">
                            <div class="flex space-x-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                <label for="firstName" class="text-gray-800 font-semibold">First name</label>
                            </div>
                            <input type="text" name="firstName" id="firstName" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" placeholder="Enter your first name" required/>
                        </div>
    
                        <div class="mt-6 flex flex-col space-y-3">
                            <div class="flex space-x-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                  </svg>
                                <label for="lastName" class="text-gray-800 font-semibold">Last name</label>
                            </div>
                            <input type="text" name="lastName" id="lastName" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" placeholder="Enter your last name" required/>
                        </div>
    
                        <div class="mt-6 flex flex-col space-y-3">
                            <div class="flex space-x-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                  </svg>
                                <label for="gender" class="text-gray-800 font-semibold">Gender</label>
                            </div>
                            <select name="gender" id="gender" class="shadow border border-gray-400 py-3 text-lg px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 appearance-none" required>
                                <option value="">Gender ...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </section>
    
                <section class="mt-5 bg-white p-4 rounded shadow-2xl">
                    <h1 class="text-xl text-gray-700 font-semibold py-4">
                        Contact Information
                    </h1>
                    <hr class="border-2 border-blue-700 sm:w-2/5 md:w-1/4">
    
                    <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                        <div class="mt-6 flex flex-col space-y-3">
                            <div class="flex space-x-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                                    </svg>
                                <label for="email" class="text-gray-800 font-semibold">E-mail</label>
                            </div>
                            <input type="email" name="email" id="email" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" placeholder="eg. adamSmith98@gmail.com" required/>
                        </div>
    
                        <div class="mt-6 flex flex-col space-y-3">
                            <div class="flex space-x-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                  </svg>
                                <label for="phone" class="text-gray-800 font-semibold">Phone number</label>
                            </div>
                            <input type="tel" name="phone" id="phone" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" placeholder="0803 995 3012" required/>
                        </div>
    
                        <div class="mt-6 flex flex-col space-y-3">
                            <div class="flex space-x-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                  </svg>
                                <label for="state" class="text-gray-800 font-semibold">State</label>
                            </div>
                            <select name="state" id="state" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-lg appearance-none" required>
                            <option value="">State ...</option>
                                 @foreach ($states as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </section>
            </form>
        </section>
    </main>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
