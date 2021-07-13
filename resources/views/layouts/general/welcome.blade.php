@extends('master')
@section('title')
    Homepage
@endsection
@section('links')
    @include('partials.links')
@endsection

{{-- navbar --}}
@section('nav')
    @include('partials.nav')
@endsection

@section('header')
    <header class="bg-landing-1 bg-center bg-no-repeat h-auto px-8 py-16 w-auto border-b-4 bg-opacity-50 border-blue-400">
        <div class="sm:w-full md:w-1/2 flex flex-col">
            <hgroup class="font-mono leading-relaxed text-green-100 tracking-wider mt-5">
                <h1 class="text-4xl">
                    Online Flight Tickets
                </h1>
                <h2 class="text-3xl">
                    Reservation
                </h2>
            </hgroup>
            <p class="mt-4 text-md text-blue-800 sm:w-full font-semibold leading-8 text-justify tracking-tight">
                We offer state of the art airline services and experience, click the button below to get started with us!
            </p>

        <button type="button" class="bg-blue-800 px-2 py-3 text-blue-100 sm:w-full md:w-1/2  mt-5 rounded hover:bg-blue-700 focus:outline-none font-semibold text-sm">
            Get started!
        </button>
        </div>

    </header>
@endsection

@section('main')
<main class="mt-2 px-8 py-5">
    <section class="p-16">
        <div class="flex justify-center items-center text-blue-800 font-bold text-4xl font-serif">
            Our Credibility
        </div>

        <div class="mt-32 grid md:grid-cols-3 gap-8 sm:grid-cols-1">
            <div class="flex flex-col bg-white rounded p-4 shadow-2xl hover:shadow-lg">
                <h1 class="flex flex-col justify-center items-center p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-2xl text-gray-900 font-semibold mt-5">Fast</span>
                </h1>
                <p class="text-gray-900 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>

            <div class="flex flex-col bg-blue-700 rounded p-4 shadow-2xl hover:shadow-lg hover:bg-blue-800 md:-mt-10 sm:mt-10">
                <h1 class="flex flex-col justify-center items-center p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 text-blue-100 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-2xl text-blue-100 font-semibold mt-5">Secure</span>
                </h1>
                <p class="text-blue-100 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>

            <div class="flex flex-col bg-white rounded p-4 shadow-2xl hover:shadow-lg">
                <h1 class="flex flex-col justify-center items-center p-5">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 border-2 rounded-full p-3 border-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                      </svg>
                    <span class="text-2xl text-gray-900 font-semibold mt-5">Reliable</span>
                </h1>
                <p class="text-gray-900 text-center leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit cum ut animi molestiae reiciendis recusandae maxime itaque ab minima dolorem, officia at laborum dolorum sed atque qui distinctio fugiat?
                </p>
            </div>
        </div>
    </section>

    <section class="mt-5">

    </section>

</main>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
