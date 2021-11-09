@extends('master')
@section('title')
    Payment
@endsection
@section('links')
    @include('partials.links')
@endsection

@section('main')
    <main class="my-4 px-32">
        <div class="bg-white px-5 py-4 shadow-lg rounded">
            <section class="flex justify-between items-center py-3">
                <div class="flex justify-center items-center">
                    <img src="{{ asset(config("app.app_logo")) }}" alt="logo" class="w-16 h-8">
                    <span class="">
                        
                    </span>
                </div>

                <div class="flex justify-between items-center space-x-8 font-medium font-mono text-lg">
                    <span class="{{ request()->is('flight') ? 'border-b-2 border-red-500' : '' }} py-2">Flight selection</span>
                    <span class="{{ request()->is('ticket') ? 'border-b-2 border-red-500' : '' }} py-2">Passenger information</span>
                    <span class="{{ request()->is('summary') ? 'border-b-2 border-red-500' : '' }} py-2">Preview and confirmation</span>
                    <span class="{{ request()->is('payment') ? 'border-b-2 border-red-500' : '' }} py-2">Payment</span>
                </div>
            </section>
        </div>            

        <section class="mt-8 px-32">
            <div class="p-5 rounded shadow-inner flex items-center space-x-5">
                <div class="p-5 w-1/2">
                    <img src="{{ asset('storage/img/visa-card.png') }}" alt="visa card" class="">
                </div>
                <div class="p-5 flex flex-col w-1/2">
                    <header class="text-blue-700 font-sans font-medium text-3xl">
                        Payment Details
                    </header>
                    <div class="mt-3">
                        <form action="" method="POST" class="space-y-5" id="payemnt-form">
                            @csrf
                            <div class="flex flex-col">
                                <label for="name-on-card" class="text-xs font-medium text-gray-400">
                                    Name on Card
                                </label>
                                <input type="text" name="name_on_card" id="name-on-card" placeholder="John smith" class="border-b px-3 py-2 focus:outline-none" required>
                            </div>

                            <div class="flex flex-col">
                                <label for="card-number" class="text-xs font-medium text-gray-400">
                                    Card Number
                                </label>
                                <input type="text" name="card_number" id="card-number" placeholder="2233 8854 7787 8965" class="border-b px-3 py-2 focus:outline-none" required>
                            </div>

                            <div class="flex space-x-5">
                                <div class="flex flex-col">
                                    <label for="card-number" class="text-xs font-medium text-gray-400">
                                        Valid Through
                                    </label>
                                    <div class="flex flex-wrap">
                                        <input type="number" name="card_number" id="card-number" placeholder="month" class="border-b py-2 w-16 focus:outline-none appearance-none text" required>
                                        
                                        <input type="number" name="card_number" id="card-number" placeholder="date" class="border-b py-2 w-16 focus:outline-none textfield" required>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="cvv" class="text-xs font-medium text-gray-400">
                                        CVV
                                    </label>
                                    <input type="number" name="cvv" id="cvv" placeholder="885" class="border-b px-3 py-2 w-16 focus:outline-none" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <section class="flex justify-between mt-5">
                <button type="button" class="px-8 py-4 text-xs font-semibold text-white bg-red-500 hover:bg-red-600 rounded">
                    &lt; Back
                </button>
                
                <button type="button" onclick="document.getElementsById('payemnt-form').submit()" class="px-8 py-4 text-xs font-semibold text-white bg-blue-500 hover:bg-blue-600 rounded">
                    Pay 55,000 NGN &gt;
                </button>
            </section>
        </section>

    </main>
@endsection

@section('scripts')
    @include('partials.scripts')
@endsection
