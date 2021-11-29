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
            @livewire('general.general-search')
        </div>
    </header>
@endsection

@section('main')
    <main class="xs:px-1 md:px-8 py-5">
        <section class="xs:p-1 md:p-8">
            {{-- <div class="flex justify-center items-center text-gray-800 font-bold text-4xl font-serif">
                Our Credibility
            </div> --}}

            <div class="mt-20 p-8 grid md:grid-cols-3 gap-8 xs:grid-cols-1">
                <div class="flex flex-col bg-white rounded p-4 shadow-2xl hover:shadow-lg">
                    <h1 class="flex flex-col justify-center items-center p-5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-16 w-16 border-2 rounded-full p-3 border-green-400" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <span class="text-2xl text-gray-900 font-semibold mt-5">Fast</span>
                    </h1>
                    <p class="text-gray-900 text-center leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae
                        reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui
                        distinctio fugiat?
                    </p>
                </div>

                <div
                    class="flex flex-col bg-orange-700 rounded p-4 shadow-2xl hover:shadow-lg hover:bg-orange-800 md:-mt-10 sm:mt-10">
                    <h1 class="flex flex-col justify-center items-center p-5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-16 w-16 border-2 rounded-full p-3 text-blue-100 border-green-400"
                             viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <span class="text-2xl text-blue-100 font-semibold mt-5">Secure</span>
                    </h1>
                    <p class="text-blue-100 text-center leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae
                        reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui
                        distinctio fugiat?
                    </p>
                </div>

                <div class="flex flex-col bg-white rounded p-4 shadow-2xl hover:shadow-lg">
                    <h1 class="flex flex-col justify-center items-center p-5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-16 w-16 border-2 rounded-full p-3 border-green-400" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                  clip-rule="evenodd"/>
                            <path
                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                        </svg>
                        <span class="text-2xl text-gray-900 font-semibold mt-5">Reliable</span>
                    </h1>
                    <p class="text-gray-900 text-center leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae
                        reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui
                        distinctio fugiat?
                    </p>
                </div>
            </div>
        </section>

        <section class="flex justify-center flex-col xs:p-1 md:p-8 space-y-12">
            <div class="text-gray-700 text-2xl flex justify-center font-semibold">
                Operational Procedure
            </div>
            <div class="flex xs:flex-col md:flex-row md:justify-between xs:space-y-5 md:space-y-0">
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
