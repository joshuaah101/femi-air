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
    <div class="flex flex-col justify-center items-center md:p-3 xs:p-7">
        <div class="flex flex-col justify-center items-center space-y-4">
            <a href="/" class="">
                <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-56 h-24">
            </a>
            <header class="font-bold font-sans text-xl">
                Sign up
            </header>
        </div>
        <div class="flex flex-col xs:w-full md:w-1/4 mt-2">
            <form action="" method="POST">
                @csrf
                <div class="flex flex-col py-1">
                    <label for="username" class="py-1 font-medium">
                        {{ __('User name') }}:
                    </label>
                    <input type="text" id="username" name="username"  placeholder="User name" class="border border-gray-400 placeholder-gray-800 rounded-lg w-full p-2
                    @error('username')  border-red-500 @enderror">

                    @error('username')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col py-1">
                    <label for="lastname" class="py-1 font-medium">
                        {{ __('Last name') }}:
                    </label>
                    <input type="text" id="lastname" name="lastname"  placeholder="Last name" class="border border-gray-400 placeholder-gray-800 rounded-lg w-full p-2
                    @error('lastname')  border-red-500 @enderror">

                    @error('lastname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col py-1">
                    <label for="firstname" class="py-1 font-medium">
                        {{ __('First name') }}:
                    </label>
                    <input type="text" id="firstname" name="firstname"  placeholder="First name" class="border border-gray-400 placeholder-gray-800 rounded-lg w-full p-2
                    @error('firstname')  border-red-500 @enderror">

                    @error('firstname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col py-1">
                    <label for="email" class="py-1 font-medium">
                        {{ __('E-mail address') }}:
                    </label>
                    <input type="text" id="email" name="email"  placeholder="eg. johndoe34@example.com" class="border border-gray-400 placeholder-gray-800 rounded-lg w-full p-2
                    @error('email')  border-red-500 @enderror">

                    @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col py-1">
                    <label for="password" class="py-1 font-medium">
                        {{ __('Password') }}:
                    </label>
                    <input type="password" id="password" name="password"  placeholder="Password" class="border border-gray-400 placeholder-gray-800 rounded-lg w-full p-2
                    @error('password')  border-red-500 @enderror">

                    @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col py-1">
                    <label for="password_confirmation" class="py-1 font-medium">
                        {{ __('Confirm password') }}:
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"  placeholder="Password again" class="border border-gray-400 placeholder-gray-800 rounded-lg w-full p-2
                    @error('password_confirmation')  border-red-500 @enderror">

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col py-1">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-5 py-3 w-full text-white font-semibold rounded-full">
                        {{ __('Register') }}
                    </button>

                    <p class="w-full text-xs text-center text-gray-700 my-2 sm:text-sm sm:my-8">
                        {{ __('Already have an account?') }}
                        <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="login">
                            {{ __('Login') }}
                        </a>
                    </p>
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
