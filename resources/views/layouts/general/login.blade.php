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
    <main class="mt-2 px-8 py-5">
        <section class="grid sm:grid-cols-1 md:grid-cols-2 justify-center items-center h-1/2">
            <div class="grid row-span-2">
                <header class="flex items-center justify-center font-mono text-5xl font-semibold text-blue-700">
                    Sign In.
                </header>
            </div>

            <div class="bg-white p-5 my-16 rounded-lg shadow-2xl">
                <form action="login" method="POST" id="loginForm">
                    @csrf
                    <div class="flex flex-col">
                        <label class="py-5 px-2 text-lg font-semibold text-gray-600" for="username">
                            E-mail
                        </label>
                        <input type="email" name="username" id="username" class="ml-2 py-2 px-3 shadow-outline-gray focus:outline-none" placeholder="eg. adamSmith101@gmail.com" />
                    </div>
                    
                    <div class="flex flex-col">
                        <label class="py-5 px-2 text-lg font-semibold text-gray-600" for="password">
                            Password
                        </label>
                        <input type="password" name="password" id="password" class="ml-2 py-2 px-3 shadow-outline-gray focus:outline-none" placeholder="************" />
                    </div>
                    
                    <div class="flex justify-between items-center mt-5 gap-x-4">
                        <a href="register" class="ml-2 text-sm text-blue-800 hover:text-blue-500">
                            Not a user? register
                        </a>
                        
                        <button type="submit" class="bg-blue-700 text-blue-200 hover:text-blue-100 hover:bg-blue-600 focus:outline-none font-semibold w-1/2 py-3 px-2 rounded">
                            Sign in .
                        </button>
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
        </section>
    </main>
    @endsection
    
    @section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection

