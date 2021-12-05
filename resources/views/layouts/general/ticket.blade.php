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
        @livewire('general.general-ticket')
    </main>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
