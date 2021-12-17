@extends('master')
@section('title')
    Homepage
@endsection
@section('links')
    @include('partials.links')
@endsection


@section('header')
    <header class="bg-plane3-bg bg-center bg-cover bg-no-repeat h-1/2 xs:px-4 md:px-8 py-3 xs:w-full">
        @include('partials.header-contact')
        {{-- navbar --}}
        @include('partials.nav')

        <div class="flex md:justify-between items-center xs:flex-col md:flex-row px-2 py-8 xs:space-y-8 md:space-y-0">
            <div class="xs:w-full md:w-2/3 flex flex-col">
                <hgroup class="font-mono font-bold leading-relaxed text-orange-500 tracking-tight mt-5">
                    <h1 class="text-5xl">
                        Online Flight Tickets
                    </h1>
                    <h2 class="text-4xl">
                        Reservation
                    </h2>
                </hgroup>
                <p class="mt-4 text-sm text-white sm:w-full font-semibold leading-8 text-justify tracking-tight">
                    With Femi-airline, you can easily book any flight you need to travel safely thanks to our detailed
                    system, services and experience.
                </p>

                <button type="button" onclick="document.getElementById('trip-option').focus()"
                        class="bg-transparent px-2 py-4 text-white sm:w-full md:w-1/3 mt-5 rounded border-2 border-orange-500 hover:border-white hover:text-orange-500 font-semibold text-sm transition duration-300 focus:outline-none">
                    Book now
                </button>
            </div>
        </div>
    </header>
@endsection

@section('main')
    <main class="xs:px-1 md:px-8 py-5">
        @livewire('search.search-booking')
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
