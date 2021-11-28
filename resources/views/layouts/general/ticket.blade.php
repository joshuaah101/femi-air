@extends('master')
@section('title')
    Book a ticket
@endsection

@section('links')
    @include('partials.links')
@endsection

@section('header')
    <header class="h-1/2 px-8 py-3 w-full flex flex-col bg-blue-800">
        @include('partials.header-contact')
        @include('partials.nav')
        <div class="flex justify-center items-center flex-col">
            <h1 class="text-5xl text-white font-bold mt-5">
                Make a reservation ...
            </h1>
            <p class="text-md text-gray-100 mt-5 font-bold px-8 py-5">
                Please fill in all appropriate fields correctly and input all details according to the instructions
                given as the fields are all required.
            </p>
        </div>

    </header>
@endsection

@section('main')
    <main class="my-8 px-8">
        <div class="bg-white px-5 py-4 shadow-lg rounded">
            <section class="flex justify-between items-center border-b-2 py-3">
                <div class="flex justify-center items-center">
                    <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-16 h-8">
                    <span class="">

                    </span>
                </div>

                <div class="flex justify-between items-center space-x-8 font-medium font-mono text-lg">
                    <span
                        class="{{ request()->is('flight') ? 'border-b-2 border-red-500' : '' }} py-2">Flight selection</span>
                    <span class="{{ request()->is('ticket') ? 'border-b-2 border-red-500' : '' }} py-2">Passenger information</span>
                    <span class="{{ request()->is('summary') ? 'border-b-2 border-red-500' : '' }} py-2">Preview and confirmation</span>
                    <span class="{{ request()->is('payment') ? 'border-b-2 border-red-500' : '' }} py-2">Payment</span>
                </div>
            </section>
            <div class="flex space-x-12">
                <div class="mt-5 px-1 w-3/4" id="informationField">
                    <form action="" method="POST" id="ticketForm">
                        @csrf
                        <div class="">
                            <section class="bg-white py-8 px-4 rounded shadow-2xl">
                                <h1 class="text-2xl text-green-700 font-semibold py-2 flex flex-col justify-center items-center border-b w-full">
                                    Passenger Information
                                </h1>

                                <h2 class="py-5 text-lg font-bold text-gray-500">
                                    Passenger {{-- the number will be dynamic  --}}
                                    1:</h2> {{-- this represents the number of tickets selected, i.e the number of entity traveling with the user and the user himself--}}

                                <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-3">
                                    <div class="mt-6 flex flex-col space-y-2">
                                        <div class="flex space-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path
                                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                                            </svg>
                                            <label for="gender" class="text-sm text-gray-800 font-semibold">Gender <span
                                                    class="text-red-600 text-lg">*</span></label>
                                        </div>
                                        <select name="gender" id="gender"
                                                class="shadow border border-gray-400 py-3 text-sm px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 appearance-none"
                                                required>
                                            <option value="">Gender ...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="mt-6 flex flex-col space-y-2">
                                        <div class="flex space-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <label for="firstName" class="text-sm text-gray-800 font-semibold">First
                                                name <span class="text-red-600 text-lg">*</span></label>
                                        </div>
                                        <input type="text" name="firstName" id="firstName"
                                               class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                               placeholder="Enter your first name" required/>
                                    </div>

                                    <div class="mt-6 flex flex-col space-y-2">
                                        <div class="flex space-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <label for="lastName" class="text-sm text-gray-800 font-semibold">Last name
                                                <span class="text-red-600 text-lg">*</span></label>
                                        </div>
                                        <input type="text" name="lastName" id="lastName"
                                               class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                               placeholder="Enter your last name" required/>
                                    </div>

                                    <div class="mt-6 flex flex-col space-y-2">
                                        <div class="flex space-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <label for="dateOfBirth" class="text-sm text-gray-800 font-semibold">Date of
                                                birth <span class="text-red-600 text-lg">*</span></label>
                                        </div>
                                        <input type="date" name="dateOfBirth" id="dateOfBirth"
                                               class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                               required/>
                                    </div>


                                </div>
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
                                        <input type="email" name="email" id="email"
                                               class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                               placeholder="eg. adamSmith98@gmail.com" required/>
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
                                        <input type="tel" name="phone" id="phone"
                                               class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm"
                                               placeholder="0803 995 3012" required/>
                                    </div>

                                    <div class="mt-6 flex flex-col space-y-2">
                                        <div class="flex space-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <label for="state" class="text-sm text-gray-800 font-semibold">State <span
                                                    class="text-red-600 text-lg">*</span></label>
                                        </div>
                                        <select name="state" id="state"
                                                class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none"
                                                required>
                                            <option value="">State ...</option>
                                            @if(isset($states))
                                                @foreach ($states as $state)
                                                    <option value="{{ $state }}">{{ $state }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </section>

                            <section class="flex justify-between mt-5">
                                <button type="button" onclick="window.history.back()"
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
                        </header>

                        <div
                            class="list-style-none space-y-4 font-medium text-sm text-gray-500 p-3 divide-y-2 divide-gray-400">
                            <section class="flex flex-col space-y-4 p-1">
                                <header class="font-semibold text-md text-gray-700 font-sans">
                                    Departing
                                </header>
                                <div class="flex flex-col space-y-2 font-mono">
                                    <header class="text-sm">
                                        {{-- state departing eg. -> --}} Abuja
                                    </header>
                                    <p class="text-xs">
                                        {{-- date of departure e.g -> --}} {{ date('d/m/y | h-m') }}
                                    </p>
                                </div>
                            </section>

                            <section class="flex flex-col space-y-4 p-1">
                                <header class="font-semibold text-md text-gray-700 font-sans">
                                    Arrival
                                </header>
                                <div class="flex flex-col space-y-2 font-mono">
                                    <header class="text-sm">
                                        {{-- state arrival eg. -> --}} Lagos
                                    </header>
                                    <p class="text-xs">
                                        {{-- date of departure e.g -> --}} {{ date('d/m/y | h-m') }}
                                    </p>
                                </div>
                            </section>

                            <section class="flex flex-col space-y-4 p-1">
                                <header class="text-md text-gray-700 font-semibold font-sans">
                                    Flight details
                                </header>
                                <div class="flex flex-col space-y-2 font-mono">
                                    <header class="flex justify-between text-sm">
                                        <span class="">Flight code </span> <span class="">WX-90</span>
                                    </header>
                                    <p class="flex justify-between text-sm">
                                        <span class="">Cabin </span> <span class="">Economy</span>
                                    </p>
                                </div>
                            </section>

                            <section class="flex flex-col space-y-4 p-1">
                                <header class="text-md text-gray-700 font-semibold font-sans">
                                    Cost details
                                </header>
                                <div class="flex flex-col space-y-2 font-mono">
                                    <p class="flex justify-between text-sm">
                                        <span class="">Ticket cost </span> <span class="">19,000 NGN</span>
                                    </p>
                                    <p class="flex justify-between text-sm">
                                        <span class="">Tax </span> <span class="">3,000 NGN</span>
                                    </p>
                                    <p class="flex justify-between text-sm">
                                        <span class="">Service charge </span> <span class="">4,000 NGN</span>
                                    </p>
                                    <p class="font-bold text-md font-sans flex justify-between">
                                        <span class="">Total </span> <span class="">50,000 NGN</span>
                                    </p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
