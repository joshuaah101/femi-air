<section class="flex justify-center flex-col xs:p-1 md:p-8 space-y-12 my-40">
    <div class="text-gray-700 text-2xl flex justify-center font-semibold">
        <h2 class="h-2 px-4">Search Booking</h2>
        <form action="{{ url('booking/search') }}">
            @csrf
            <input type="text" class="w-2/3 border border-gray-900 rounded " name="search" placeholder="Enter Booking Id" required/>
            <button type="submit"
                    class="mx-3 px-4 py-2 bg-orange-700 text-cool-gray-100 shadow-2xl hover:shadow-lg hover:bg-orange-800  rounded-lg">
                Find
            </button>
        </form>
    </div>
</section>
