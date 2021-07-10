@section('footer')
    <footer class="mt-5 bg-blue-500">
        <section class="px-5 py-4 grid sm:grid-cols-1 md:grid-cols-3">
            <div class="p-3 ">
                <h1 class="text-2xl text-blue-200 font-mono">
                    Contact
                </h1>
                <div class="mt-5 text-sm">
                    <a href="tel:08023235658" class="text-gray-900 hover:text-blue-100">
                        Phone number
                    </a>
                    <p class="mt-2 text-gray-900">
                        Address: Garki street, ahmadu bello way, kaduna, lagosa
                    </p>
                </div>
            </div>
            <div class="p-3">
                <h1 class="text-2xl text-blue-200 font-mono">
                    Quick links
                </h1>
                <div class="mt-2 flex flex-col space-y-1 text-sm ">
                    <a href="/" class="text-gray-900 hover:text-blue-100">
                        Home
                    </a>
                    <a href="" class="text-gray-900 hover:text-blue-100">
                        Book a flight
                    </a>
                    <a href="" class="text-gray-900 hover:text-blue-100">
                        login
                    </a>
                    <a href="" class="text-gray-900 hover:text-blue-100">
                        Sign up
                    </a>
                </div>
            </div>
            <div class="p-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui repudiandae voluptate officiis ducimus rem quam voluptatem id, molestiae magni placeat, ullam consequatur voluptatum. Voluptatum aperiam ad accusamus odit ipsum minima.
            </div>
        </section>
        <div class="bg-blue-600 p-2 flex justify-center font-semibold text-sm text-gray-200">
            &copy; {{ date('Y') }}
        </div>
    </footer>
@endsection
