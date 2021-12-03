@extends('master')
@section('title')
    Flight summary
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
        <div class="bg-white px-5 py-4 shadow-2xl rounded">
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

        </div>

        <section class="flex justify-between mt-5">
            <button type="button" onclick="window.history.back()"
                    class="px-8 py-4 text-xs font-semibold text-white bg-red-500 hover:bg-red-600 rounded">
                &lt; Back
            </button>

            <button type="button"
                    class="px-8 py-4 text-xs font-semibold text-white bg-blue-500 hover:bg-blue-600 rounded">
                Proceed to payment &gt;
            </button>
        </section>
    </main>
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
