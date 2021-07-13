@section('footer')
    <footer class="mt-5 bg-blue-700">
        <section class="md:px-32 py-8 grid sm:grid-cols-1 md:grid-cols-3">
            <div class="p-3">
                <h1 class="text-2xl text-blue-300 font-mono">
                    Contact
                </h1>
                <div class="mt-5 text-sm">
                    <p class="mt-2 text-blue-100 leading-4">
                        Address: Garki street, ahmadu bello way, kaduna, lagosa
                    </p>
                    <p class="mt-3">
                        <a href="tel:08023235658" class="text-blue-100 hover:text-gray-400">
                            Phone number : 08023235658
                        </a>
                    </p>
                </div>
            </div>
            <div class="p-3">
                <h1 class="text-2xl text-blue-300 font-mono">
                    Quick links
                </h1>
                <div class="mt-5 flex flex-col space-y-2 text-sm ">
                    <a href="/" class="{{ request()->is('/') ? 'hover:text-gray-400 text-yellow-400 font-semibold hover:border-gray-900' : 'text-blue-100 hover:text-gray-400' }}">
                        Home
                    </a>
                    <a href="" class="{{ request()->is('ticket') ? 'hover:text-gray-400 text-yellow-400 font-semibold hover:border-gray-900' : 'text-blue-100 hover:text-gray-400' }}">
                        Book a flight
                    </a>
                    <a href="" class="{{ request()->is('login') ? 'hover:text-gray-400 text-yellow-400 font-semibold hover:border-gray-900' : 'text-blue-100 hover:text-gray-400' }}">
                        login
                    </a>
                    <a href="" class="{{ request()->is('register') ? 'hover:text-gray-400 text-yellow-400 font-semibold hover:border-gray-900' : 'text-blue-100 hover:text-gray-400' }}">
                        Sign up
                    </a>
                </div>
            </div>
            <div class="p-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui repudiandae voluptate officiis ducimus rem quam voluptatem id, molestiae magni placeat, ullam consequatur voluptatum. Voluptatum aperiam ad accusamus odit ipsum minima.
            </div>
        </section>
        <hr class="border-blue-400">
        <div class="py-4 flex justify-center italic text-sm text-gray-200">
            &copy; {{ date('Y') }}
        </div>
    </footer>
@endsection
