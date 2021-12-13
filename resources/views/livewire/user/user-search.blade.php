<form wire:submit.prevent="bookTicket" id="reservationForm"
      class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-4 gap-y-5 py-6 bg-white">
    @csrf
    <div class="flex flex-col space-y-3">
        <div class="flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                      clip-rule="evenodd"/>
            </svg>
            <label class="text-sm font-semibold italic text-blue-800">Trip type</label>
        </div>
        <select name="tripType" wire:model="trip_type"
                class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:text-blue-800 text-sm appearance-none"
                id="trip-option" required>
            <option value="0" selected>One way trip</option>
            <option value="1">Round trip</option>
        </select>
        @error('trip_type') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="flex flex-col space-y-3">
        <div class="flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
            </svg>
            <label for="ticketType" class="text-sm text-blue-800 font-semibold">Ticket type</label>
        </div>
        <select wire:model="ticketType" name="ticketType" id="ticketType"
                class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:text-blue-800 text-sm appearance-none"
                required>
            <option value="">Type ...</option>
            <option value="Adult">Adult</option>
            <option value="Child">Child</option>
            <option value="Infant">Infant</option>
        </select>
        @error('ticketType') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="flex flex-col space-y-3">
        <div class="flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                      clip-rule="evenodd"/>
            </svg>
            <label for="noOfTicket" class="text-sm text-blue-800 font-semibold">Number of ticket</label>
        </div>
        <input type="number" wire:model="noOfTicket" name="noOfTicket" id="noOfTicket" min="1" max="15"
               class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:text-blue-800 text-sm"
               required/> @error('noOfTicket') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="flex flex-col space-y-3">
        <div class="flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"/>
            </svg>
            <label for="stateFrom" class="text-sm text-blue-800 font-semibold">Traveling from</label>
        </div>
        <select wire:model="stateFrom" id="stateFrom"
                class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm appearance-none"
                required>
            <option value="">From ...</option>
            @if(isset($states) && $states)
                @foreach ($states as $state)
                    <option value="{{ $state['postal'] }}">{{ $state['name'] }}</option>
                @endforeach
            @endif
        </select>

        @error('stateFrom') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="flex flex-col space-y-3">
        <div class="flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"/>
            </svg>
            <label for="stateTo" class="text-sm text-blue-800 font-semibold">Traveling to</label>
        </div>
        <select wire:model="stateTo" id="stateTo"
                class="shadow border border-gray-400 py-3 px-2 rounded focus:outline-none placeholder-gray-700 focus:bg-orange-200 focus:text-gray-900 text-sm appearance-none"
                required>
            <option value="">To ...</option>
            @if(isset($states) && $states)
                @foreach ($states as $state)
                    <option value="{{ $state['postal'] }}">{{ $state['name'] }}</option>
                @endforeach
            @endif
        </select>

        @error('stateTo') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="flex flex-col space-y-3">
        <div class="flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                      clip-rule="evenodd"/>
            </svg>
            <label for="departureDate" class="text-sm text-blue-800 font-semibold">Departure date</label>
        </div>
        <input type="date" wire:model="departureDate" name="departureDate" id="departureDate"
               class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:text-blue-800 text-sm"
               required/>
        @error('departureDate') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="flex flex-col space-y-3  @if($trip_type!=="1"&&$trip_type!==1) hidden @endif" id="hide-rDate">
        <div class="flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-800" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                      clip-rule="evenodd"/>
            </svg>
            <label for="returningDate" class="text-sm text-blue-800 font-semibold">Returning date</label>
            @error('returningDate') <span class="error">{{ $message }}</span> @enderror
        </div>
        <input type="date" wire:model="returningDate" name="returningDate" id="returningDate"
               class="shadow border border-gray-400 py-2 px-2 rounded focus:outline-none placeholder-gray-700 focus:text-blue-800 text-sm"/>
    </div>
    <div class="flex flex-col space-y-3 justify-end">
        <label class=""></label>
        <button type="submit" id="reservationBtn"  @if($stateFrom ===$stateTo) disabled @endif
                class="bg-blue-800 px-2 py-3 text-blue-100 sm:w-full mt-5 rounded hover:bg-blue-600 font-semibold text-md flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                <path fill-rule="evenodd"
                      d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                      clip-rule="evenodd"/>
            </svg>

            <span class="text-sm">
                        Proceed
                    </span>
        </button>
    </div>
</form>
