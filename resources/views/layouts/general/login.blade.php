@extends('master')
@section('title')
    User Login
@endsection
@section('links')
    @include('partials.links')
@endsection


@section('header')
    <header class="bg-plane3-bg bg-center bg-cover bg-no-repeat h-1/2 xs:px-4 md:px-8 py-3 xs:w-full">
{{--        @include('partials.header-contact')--}}
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
    <div class="flex flex-col justify-center items-center md:p-6 xs:p-7">
        <div class="flex flex-col justify-center items-center space-y-12">
            <a href="/" class="">
                <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-56 h-24">
            </a>
            <header class="font-bold font-sans text-xl">
                Account login
            </header>
        </div>
        <div class="flex flex-col xs:w-full md:w-1/4 mt-2">
            <form action="" method="POST">
                @csrf
                <div class="flex flex-col py-1">
                    <label for="email" class="py-1 font-medium">
                        Email
                    </label>
                    <input type="text" id="email" name="email" placeholder="adamsmith123" value="{{old('email')}}"
                           class="border border-gray-400 placeholder-gray-800 rounded-lg w-full p-2">
                    @error('email')<p class="text-red-800">{{ $message }}</p> @enderror
                </div>

                <div class="flex flex-col py-1">
                    <label for="password" class="py-1 font-medium">
                        Password
                    </label>
                    <div class="">
                        <input type="password" id="password" name="password" placeholder="Password"
                               class="border border-gray-400 placeholder-gray-800 rounded-lg w-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 cursor-pointer float-right relative right-3"
                             style="margin-left: -25px; margin-top: 13px;" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd"
                                  d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                  clip-rule="evenodd"/>
                        </svg>
                        @error('password')<p class="text-red-800">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex flex-col py-1">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 px-5 py-4 w-full text-white font-semibold rounded-full">
                        Log in
                    </button>
                </div>

                <div class="flex justify-center space-x-3 py-2 items-center">
                    <input type="checkbox" class="">
                    <span class="">
                        Keep me logged in
                    </span>
                </div>

                <div class="flex flex-col justify-center items-center text-sm font-sans mt-5 space-y-3">
                    <a href="#" class="underline hover:no-underline text-red-600">Forgot password / email?</a>


                    <span class="">
                        Don't have an account?
                        <a href="{{ url('register') }}" class="underline hover:no-underline text-blue-600">
                            Sign up
                        </a>
                    </span>
                </div>

                <div class="mt-5">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <li class="list-none leading-6">{{ $error }}</li>
                        @endforeach
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
