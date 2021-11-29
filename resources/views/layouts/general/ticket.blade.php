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
            @livewire('general.general-ticket')

        </div>
    </main>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
