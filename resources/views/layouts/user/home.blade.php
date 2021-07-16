@extends('master')

@section('title')
    Dashboard
@endsection

@section('links')
    @include('partials.links')
@endsection

@section('main')
    <main class="flex justify-between">
        {{-- sidebar --}}
        <div class="xs:hidden md:block w-1/6 bg-white h-screen shadow-lg top-0 left-0 fixed">
            {{-- sidebar user info display --}}
            <div class="mt-16 px-5">
                <section class="font-mono ">
                    <header class="tracking-tight font-bold text-lg text-gray-500">
                        Welcome Back!
                    </header>
                    <p class="font-semibold text-gray-400 text-center">
                        User name
                    </p>
                </section>
            </div>
            {{-- sidebar items --}}
            <div class="py-5 px-2 text-blue-800 space-y-2 mt-5">
                <a href="#" class="{{ request()->is('user') ? 'shadow-xl rounded bg-gray-100 hover:bg-white  hover:shadow-md' : ''}}text-sm block px-5 py-3 font-semibold  hover:text-blue-900 hover:font-bold">
                    Dashboard
                </a>
                <a href="#" class="{{ request()->is('history') ? 'shadow-xl rounded bg-gray-100 hover:bg-white  hover:shadow-md' : ''}}text-sm block px-5 py-3 font-semibold hover:bg-gray-100 hover:text-blue-900 hover:font-bold">
                    Ticket history
                </a>
                <a href="#" class="{{ request()->is('profile') ? 'shadow-xl rounded bg-gray-100 hover:bg-white  hover:shadow-md' : ''}}text-sm block px-5 py-3 font-semibold hover:bg-gray-100 hover:text-blue-900 hover:font-bold">
                    Profile
                </a>
                <a href="#" class="{{ request()->is('active') ? 'shadow-xl rounded bg-gray-100 hover:bg-white  hover:shadow-md' : ''}}text-sm block px-5 py-3 font-semibold hover:bg-gray-100 hover:text-blue-900 hover:font-bold">
                    View active
                </a>
                <a href="#" class="{{ request()->is('menu') ? 'shadow-xl rounded bg-gray-100 hover:bg-white  hover:shadow-md' : ''}}text-sm block px-5 py-3 font-semibold hover:bg-gray-100 hover:text-blue-900 hover:font-bold">
                    menu 5
                </a>
                <a href="#" class="text-sm block px-5 py-3 font-semibold text-red-500 hover:font-bold">
                    Logout
                </a>
            </div>
        </div>



        <div class="xs:ml-0 flex md:ml-1/6 py-8 px-5">
            {{-- header navigation --}}
            @section('header')
            <header class="bg-white top-0 fixed md:ml-3 right-0 xs:left-0 md:left-40 p-4 shadow-lg text-sm text-blue-800 border-b-2 border-l-2 font-semibold z-10">
                <div class="flex justify-between items-center">
                    <div class="font-bold">
                        {{ config('app.name') }} - logo
                    </div>
                    
                    <div class="md:hidden xs:flex">
                        <button class="mobile-menu-button focus:outline-none border-2 rounded shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </header>
            @endsection
                
                {{-- main dashboard content --}}
            <div class="flex md:mt-8 xs:mt-16 py-3">
                {{-- dashboard cards --}}
                <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                    <div class="bg-white rounded-md text-gray-500 shadow-2xl text-md p-6">
                        <div class="flex flex-col space-y-5">
                            <header class="text-blue-700 font-semibold text-xl">
                                Active tickets
                            </header>
                            <p class="text-right font-bold text-md">2</p>
                        </div>
                    </div>
                    <div class="bg-blue-700 text-blue-100 rounded-md shadow-2xl text-md p-6">
                        Lorem ipsum dolor sit amet conse
                    </div>
                    <div class="bg-white rounded-md text-gray-500 shadow-2xl text-md p-6">
                        Lorem ipsum dolor sit amet, consectet
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
