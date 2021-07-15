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
    <header class="flex flex-col justify-center items-center space-y-5 p-8 h-1/2 bg-landing-2 bg-fixed bg-center">
        <h1 class="text-6xl text-blue-800 font-bold">
            Book a ticket
        </h1>
    </header>
@endsection

@section('main')
    <p class="text-md text-blue-800 mt-5 font-semibold text-center p-5 text-center">
        Please fill in all appropriate fields correctly and input all details according to the instructions given as the fields are all required.
    </p>
    <main class="my-8 px-8">
        <form action="" method="POST" id="ticketForm">
            <section class="bg-white p-4 rounded shadow-2xl">
                <h1 class="text-xl text-gray-700 font-semibold py-4">
                    Personal Information
                </h1>
                <hr class="border-2 border-blue-700 sm:w-2/5 md:w-1/4">

                <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="firstName" class="text-gray-800 font-semibold">First name</label>
                        <input type="text" name="firstName" id="firstName" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" placeholder="Enter your first name" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="lastName" class="text-gray-800 font-semibold">Last name</label>
                        <input type="text" name="lastName" id="lastName" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" placeholder="Enter your last name" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="gender" class="text-gray-800 font-semibold">Gender</label>
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
                        <label for="email" class="text-gray-800 font-semibold">E-mail</label>
                        <input type="email" name="email" id="email" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" placeholder="eg. adamSmith98@gmail.com" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="phone" class="text-gray-800 font-semibold">Phone number</label>
                        <input type="tel" name="phone" id="phone" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" placeholder="0803 995 3012" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="state" class="text-gray-800 font-semibold">State</label>
                        <select name="state" id="state" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-lg appearance-none" required>
                            <option value="">State ...</option>
                                 @foreach ($states as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>

            <section class="mt-5 bg-white p-4 rounded shadow-2xl">
                <h1 class="text-xl text-gray-700 font-semibold py-4">
                    Reservation
                </h1>
                <hr class="border-2 border-blue-700 sm:w-2/5 md:w-1/4">

                <div class="flex justify-center space-x-5 my-6 px-5">
                    <div class="flex justify-center item-center space-x-3">
                        <input type="radio" name="tripType" value="0" class="radio-one" required />
                        <label class="text-lg font-semibold italic text-gray-700">One way trip</label>
                    </div>
                    <div class="flex justify-center item-center space-x-3">
                        <input type="radio" name="tripType" value="1" class="radio-return" required />
                        <label class="text-lg font-semibold italic text-gray-700">Return trip</label>
                    </div>
                </div>

                <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="ticketType" class="text-gray-800 font-semibold">Ticket type</label>
                        <select name="ticketType" id="ticketType" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-lg appearance-none" required>
                            <option value="">Type ...</option>
                            <option value="Adult">Adult</option>
                            <option value="Child">Child</option>
                            <option value="Infant">Infant</option>
                        </select>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="noOfTicket" class="text-gray-800 font-semibold">Number of ticket</label>
                        <input type="number" name="noOfTicket" id="noOfTicket" min="1" max="15" placeholder="1" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="stateFrom" class="text-gray-800 font-semibold">Traveling from</label>
                        <select name="stateFrom" id="stateFrom" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-lg appearance-none" required>
                            <option value="">From ...</option>
                            @foreach ($states as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="stateTo" class="text-gray-800 font-semibold">Traveling to</label>
                        <select name="stateTo" id="stateTo" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-lg appearance-none" required>
                            <option value="">To ...</option>
                            @foreach ($states as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <label for="departureDate" class="text-gray-800 font-semibold">Departure date</label>
                        <input type="date" name="departureDate" id="departureDate" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" required />
                    </div>

                    <div class="mt-6 flex flex-col space-y-3" id="hide-rDate">
                        <label for="returningDate" class="text-gray-800 font-semibold">Returning date</label>
                        <input type="date" name="returningDate" id="returningDate" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900" required />
                    </div>
                </div>

                <div class="my-6">
                    <button type="submit" class="bg-blue-700 text-blue-100 px-2 py-3 rounded xs:w-full sm:w-1/2 md:w-1/3 hover:bg-blue-600 font-semibold font-mono focus:outline-none">
                        Submit
                    </button>
                </div>
            </section>


        </form>

    </main>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
