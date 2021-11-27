@extends('master')
@section('title')
    Sign up
@endsection
@section('links')
    @include('partials.links')
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

@section('scripts')
    @include('partials.scripts')
@endsection
