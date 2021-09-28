@extends('master')
@section('title')
    Login page
@endsection

@section('links')
    @include('partials.links')
@endsection

@section('nav')
    @include('partials.nav')
@endsection

@section('main')
    <main class="xs:px-10 md:px-20 py-10">
        
        <div class="
            xs:block md:flex justify-center items-center 
            md:space-x-5
            rounded-tr-md rounded-br-md">
            <div class="
                md:bg-landing-2 md:bg-cover md:bg-no-repeat md:bg-center
                hidden md:flex md:w-1/2 md:h-screen md:rounded-tl-md md:rounded-bl-md">
                {{-- bg picture --}}
            </div>

            <div class="
                md:w-1/2 md:p-20">
                <header class="flex xs:justify-center md:justify-start font-mono text-5xl font-semibold text-blue-700">
                    Sign In.
                </header>
                <form action="login" method="POST" id="loginForm">
                    @csrf
                    <div class="flex flex-col">
                        <label class="py-5 px-2 text-lg font-semibold text-gray-600" for="username">
                            E-mail
                        </label>
                        <input type="email" name="username" id="username" class="ml-2 py-2 px-3 shadow-outline-gray rounded focus:outline-none" placeholder="eg. adamSmith101@gmail.com" />
                    </div>
                    
                    <div class="flex flex-col">
                        <label class="py-5 px-2 text-lg font-semibold text-gray-600" for="password">
                            Password
                        </label>
                        <input type="password" name="password" id="password" class="ml-2 py-2 px-3 shadow-outline-gray rounded focus:outline-none" placeholder="************" />
                    </div>
                    
                    <div class="flex xs:flex-col md:flex-row justify-between items-center mt-5 md:gap-x-4 xs:gap-y-5">
                        <button type="submit" class="bg-blue-700 text-blue-200 hover:text-blue-100 hover:bg-blue-600 focus:outline-none font-semibold w-1/2 py-3 px-2 rounded">
                            Sign in .
                        </button>

                        <a href="register" class="ml-2 text-sm text-blue-800 hover:text-blue-500 w-1/2">
                            Not a user? register
                        </a>
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

            {{-- <div class="bg-white p-5 my-16 rounded-lg shadow-2xl">
                
            </div> 
        </section>--}}
    </main>
    @endsection
    
@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection

