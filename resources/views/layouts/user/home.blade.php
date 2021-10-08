{{-- {{ dd($menuUrl) }} --}}
@extends('master')

@section('title')
    Dashboard
@endsection

@section('links')
    @include('partials.links')
@endsection

@section('main')
    <main class="flex">
        {{-- sidebar --}}
        <div class="xs:hidden md:block w-1/6 bg-white h-screen shadow-lg top-0 left-0 fixed border-r-2 border-blue-100">
            {{-- sidebar user info display --}}
            <div class="mt-4 px-5">
                <section class="flex flex-col justify-center items-center space-y-2 font-mono mb-2">
                    <header class="">
                        <img src="{{ asset('storage/img/profile-pics/josh.jpg') }}" alt="" class="border-4 border-blue-200 rounded-full p-1 h-32 w-32" />
                    </header>
                    <p class="font-semibold text-gray-400 text-center">
                        Joshua Faloye
                    </p>
                </section>
                <hr>
            </div>
            {{-- sidebar items --}}
            <div class="py-2 px-2 text-blue-800 space-y-1 mt-5">
                <a href="?menu=dash&id=90" class="{{ $menuUrl == 'dash' ? 'shadow-xl bg-blue-700 text-blue-100 hover:bg-white hover:shadow-md' : ''}}
                    text-sm px-5 py-2 font-semibold hover:bg-blue-100 hover:text-blue-900 flex items-center rounded rounded-r-full">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                        </svg>
                    </span>
                    Dashboard
                </a>
                <a href="?menu=active" class="{{ $menuUrl == 'active' ? 'shadow-xl bg-blue-700 text-blue-100 hover:bg-white  hover:shadow-md' : ''}}
                    text-sm px-5 py-2 font-semibold hover:bg-blue-100 hover:text-blue-900 flex items-center rounded rounded-r-full">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.933 12.8a1 1 0 000-1.6L6.6 7.2A1 1 0 005 8v8a1 1 0 001.6.8l5.333-4zM19.933 12.8a1 1 0 000-1.6l-5.333-4A1 1 0 0013 8v8a1 1 0 001.6.8l5.333-4z" />
                        </svg>
                    </span>
                    View active
                </a>
                <a href="?menu=history" class="{{ $menuUrl == 'history' ? 'shadow-xl bg-blue-700 text-blue-100 hover:bg-white  hover:shadow-md' : ''}}
                    text-sm px-5 py-2 font-semibold hover:bg-blue-100 hover:text-blue-900 flex items-center rounded rounded-r-full">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </span>
                    Ticket history
                </a>
                <a href="?menu=profile" class="{{ $menuUrl == 'profile' ? 'shadow-xl bg-blue-700 text-blue-100 hover:bg-white  hover:shadow-md' : ''}}
                    text-sm px-5 py-2 font-semibold hover:bg-blue-100 hover:text-blue-900 flex items-center rounded rounded-r-full">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    Profile
                </a>
                <a href="?menu=settings" class="{{ $menuUrl == 'settings' ? 'shadow-xl bg-blue-700 text-blue-100 hover:bg-white  hover:shadow-md' : ''}}
                    text-sm px-5 py-2 font-semibold hover:bg-blue-100 hover:text-blue-900 flex items-center rounded rounded-r-full">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </span>
                    Settings
                </a>
                <a href="logout" class="text-sm px-5 py-2 font-semibold text-red-700 hover:text-red-600 hover:bg-red-100 rounded rounded-r-full flex items-center">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </span>
                    Logout
                </a>
            </div>
        </div>


        <div class="xs:ml-0 md:ml-1/6 px-5 w-full">
            <div class="">
                {{-- fixed header navigation --}}
                @include('partials.dashboard-nav')

               {{-- main content attachment --}}
               <div class="md:mt-20 xs:mt-20">
                    @if ($menuUrl == 'dash')
                        @include('layouts.user.dashboard')
                        @elseif ($menuUrl == 'history')
                            @include('layouts.user.history')
                        @elseif ($menuUrl == 'profile')
                            @include('layouts.user.profile')
                    @endif
               </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
