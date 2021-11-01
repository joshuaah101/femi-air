@extends('master')
@section('title')
    Checkout
@endsection
@section('links')
    @include('partials.links')
@endsection

@section('nav')
    @include('partials.nav')
@endsection

@section('main')
    <main class="p-10 flex w-full space-x-3">
        <div class="xs:w-full md:w-3/4">
            <p class="bg-green-500 text-green-100 p-3 text-lg">
                Choose your choice vehicle and see our schedules
            </p>

            <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Vehicle</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Departure date</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Departure time</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Price</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Action</th>
                                </tr>
                            </thead>
            
                            <tbody class="bg-white">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-28 h-28">
                                                <img class="w-28 h-28 rounded-full" src="{{ asset('storage/img/buses/bus1.jpg') }}" alt="bus image">
                                            </div>
            
                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900">
                                                    Gate crasher
                                                </div>
                                            </div>
                                        </div>
                                    </td>
            
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="text-sm leading-5 text-gray-500">
                                            2021-10-30
                                        </span>
                                    </td>
            
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            12:00pm
                                        </span>
                                    </td>
            
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        #25,000
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <input type="checkbox" name="select_bus" class="h-5 w-5" id="selectBusBox">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col xs:w-full md:w-1/4 shadow-xl rounded-md" id="checkoutPane">
                <header class="flex justify-center p-2 text-gray-700 text-md font-medium leading-4 tracking-wider uppercase">
                    Checkout
                </header>
                <hr>
            <div class="mt-5 px-8 py-4 space-y-4">
                <ul class="list-style-none space-y-4 font-medium text-sm text-gray-500">
                    <li>Full name: <span></span></li>
                    <li>Gender: <span></span></li>
                    <li>E-mail: <span></span></li>
                    <li>Phone number: <span></span></li>
                    <li>State: <span></span></li>
                    <li>Ticket type: <span></span></li>
                    <li>Number of ticket: <span></span></li>
                    <li>Traveling from: <span></span></li>
                    <li>Traveling to: <span></span></li>
                    <li>Departure date: <span></span></li>
                    <li>Return date: <span></span></li>
                    <li>Price: <span></span></li>
                </ul>

                <button class="bg-blue-600 text-blue-100 font-medium text-sm px-5 py-2 rounded hover:bg-blue-500 
                hover:text-white flex justify-center items-center" type="button"
                onclick="document.getElementById('selectBusForm').submit()">
                    Proceed to payment
                </button>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
