@extends('master')
@section('title')
    Login
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
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Login') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required>

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2">{{ __('Remember Me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __("Don't have an account?") }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </p>
                        @endif
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
