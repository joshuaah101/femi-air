@extends('master')
@section('title')
    Flight selection
@endsection
@section('links')
    @include('partials.links')
@endsection

@section('header')
    <header class="px-8 py-3 w-full flex flex-col bg-blue-800">
        @include('partials.header-contact')
        @include('partials.nav')
    </header>
@endsection

@section('main')
    <main class="my-4 px-8">
        <div class="bg-white px-5 py-4 shadow-lg rounded">
            <section class="flex justify-between items-center border-b-2 py-3">
                <div class="flex justify-center items-center">
                    <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-16 h-8">
                    <span class="">
                        
                    </span>
                </div>

                <div class="flex justify-between items-center space-x-8 font-medium font-mono text-lg">
                    <span class="{{ request()->is('flight') ? 'border-b-2 border-red-500' : '' }} py-2">Flight selection</span>
                    <span class="{{ request()->is('ticket') ? 'border-b-2 border-red-500' : '' }} py-2">Passenger information</span>
                    <span class="{{ request()->is('summary') ? 'border-b-2 border-red-500' : '' }} py-2">Preview and confirmation</span>
                    <span class="{{ request()->is('payment') ? 'border-b-2 border-red-500' : '' }} py-2">Payment</span>
                </div>
            </section>

            <section class="mt-5 flex justify-between font-medium font-mono">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-blue-800">
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-100 uppercase border-b border-blue-200">
                                Flight information
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-100 uppercase border-b border-blue-200">
                                Economy
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-100 uppercase border-b border-blue-200">
                                Business
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-blue-100 uppercase border-b border-blue-200">
                                Premium
                            </th>
                        </tr>
                    </thead>
    
                    <tbody class="">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200 flex justify-center flex-col items-center">
                                <div class="flex items-center space-x-5">
                                    <div class="flex flex-col">
                                        10:40
                                        <span class="">
                                            Abuja
                                        </span>
                                    </div>

                                    <span class="text-lg">
                                        &dash;
                                    </span>

                                    <div class="flex flex-col">
                                        12:40
                                        <span class="">
                                            Lagos
                                        </span>
                                    </div>
                                </div>
                                <p class="mt-5 text-red-500 text-xs font-medium">
                                    * Duration : 1hour non-stop
                                </p>
                            </td>
    
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200 text-center">
                                <div class="flex flex-col space-y-4">
                                    <div class="flex flex-col">
                                        15,000
                                        <span class="">
                                            NGN
                                        </span>
                                    </div>

                                    <button type="button" class="px-3 py-2 border-2 rounded border-blue-800 hover:bg-blue-800 hover:text-blue-100 transition duration-300">
                                        Select
                                    </button>
                                </div>
                            </td>
    
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200 text-center">
                                <div class="flex flex-col space-y-4">
                                    <div class="flex flex-col">
                                        25,000
                                        <span class="">
                                            NGN
                                        </span>
                                    </div>

                                    <button type="button" class="px-3 py-2 border-2 border-blue-800 rounded hover:bg-blue-800 hover:text-blue-100 transition duration-300">
                                        Select
                                    </button>
                                </div>
                            </td>
    
                            <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-blue-200 text-center">
                                <div class="p-5 border-2">
                                    Sold out
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <p class="flex justify-center mt-5">
                Martins this table is dynamic, having all flight details in it as per their availability, using the above as example
            </p>
        </div>
    </main>
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
