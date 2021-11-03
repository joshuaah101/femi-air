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
            
        </section>

        <section class="mt-5 px-8 bg-white p-8 rounded shadow-2xl w-1/2" id="informationField">
            <p class="text-sm text-red-500 mt-5 font-semibold px-8 py-5">
                * Please fill in all appropriate fields correctly and input all details according to the instructions given as the fields are all required.
            </p>
            <form action="" method="POST" id="ticketForm" class="flex flex-col justify-center items-center w-full">
                @csrf
                <h1 class="text-lg text-green-700 font-semibold py-4 flex flex-col justify-center items-center">
                    Personal Information
                </h1>

                <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-3 mt-5">
                    <div class="mt-6 flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            <label for="firstName" class="text-sm text-gray-800 font-semibold">First name</label>
                        </div>
                        <input type="text" name="firstName" id="firstName" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" placeholder="Enter your first name" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                </svg>
                            <label for="lastName" class="text-sm text-gray-800 font-semibold">Last name</label>
                        </div>
                        <input type="text" name="lastName" id="lastName" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" placeholder="Enter your last name" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                            <label for="gender" class="text-sm text-gray-800 font-semibold">Gender</label>
                        </div>
                        <select name="gender" id="gender" class="shadow border border-gray-400 py-3 text-sm px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 appearance-none" required>
                            <option value="">Gender ...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                
                <h1 class="text-lg mt-5 text-green-700 font-semibold py-8 flex justify-center items-center">
                    Contact Information
                </h1>

                <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-3">
                    <div class="mt-6 flex flex-col space-y-3">
                        <div class="flex space-x-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                                </svg>
                            <label for="email" class="text-sm text-gray-800 font-semibold">E-mail</label>
                        </div>
                        <input type="email" name="email" id="email" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" placeholder="eg. adamSmith98@gmail.com" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <div class="flex space-x-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            <label for="phone" class="text-sm text-gray-800 font-semibold">Phone number</label>
                        </div>
                        <input type="tel" name="phone" id="phone" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm" placeholder="0803 995 3012" required/>
                    </div>

                    <div class="mt-6 flex flex-col space-y-3">
                        <div class="flex space-x-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                            <label for="state" class="text-sm text-gray-800 font-semibold">State</label>
                        </div>
                        <select name="state" id="state" class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-blue-100 focus:text-gray-900 text-sm appearance-none" required>
                        <option value="">State ...</option>
                                @foreach ($states as $state)
                            <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
