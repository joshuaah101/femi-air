<div class="">
    <div class="mb-5 flex justify-between">
        <div class="flex flex-col w-full ">
            <header class="font-bold text-2xl font-sans text-gray-700">
                Profile
            </header>
            <p class="mt-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                </svg>
                <span class="font-semibold text-xs">
           @auth() {{ auth()->user()->first_name.' '.auth()->user()->last_name }}@endauth
            </span>
            </p>
        </div>

        <div class="flex items-center justify-end w-full">
            @if($edit)
                <a wire:click="$set('edit',false)" class="bg-red-400 text-white
                            py-3 px-5 rounded-lg cursor-pointer
                            text-sm font-bold
                            hover:bg-red-500 hover:text-red-100
                            flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                        <path fill-rule="evenodd"
                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="">
                Cancel Edit
            </span>
                </a>
            @else
                <a wire:click="$set('edit',true)" class="bg-yellow-400 text-white
                            py-3 px-5 rounded-lg cursor-pointer
                            text-sm font-bold
                            hover:bg-yellow-500 hover:text-yellow-100
                            flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                        <path fill-rule="evenodd"
                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="">
                Edit Profile
            </span>
                </a>
            @endif
        </div>
    </div>
    <hr class="mt-2"/>
    <div class="flex xs:flex-col md:flex-row mt-5">
        @if($edit===false)
            <div class="md:w xs:w-full">
                <div class="space-y-5 font-mono">
                    <div class="font-bold bg-blue-200 text-blue-800 px-5 py-3 rounded">
                        <header class="text-md">
                            Personal Information
                        </header>
                    </div>
                    <div class="pl-5 space-y-2">
                        <p class="flex items-center font-bold space-x-5 border-b p-2">
                    <span class="text-sm">
                        Full name:
                            </span>
                            <span class="text-xs">
                                {{auth()->user()->first_name}} {{auth()->user()->last_name}}
                            </span>
                        </p>
                        <p class="flex items-center font-bold space-x-5  p-2">
                            <span class="text-sm">
                                Gender:
                            </span>
                            <span class="text-xs">
                              {{auth()->user()->gender}}
                            </span>
                        </p>
                        <p class="flex items-center font-bold space-x-5  p-2">
                            <span class="text-sm">
                                Country:
                            </span>
                            <span class="text-xs">
                              {{get_country_name(auth()->user()->country)}}
                            </span>
                        </p>
                        <p class="flex items-center font-bold space-x-5  p-2">
                            <span class="text-sm">
                                State:
                            </span>
                            <span class="text-xs">
                              {{get_country_state(auth()->user()->country,auth()->user()->state)??null}}
                            </span>
                        </p>
                        <p class="flex items-center font-bold space-x-5  p-2">
                            <span class="text-sm">
                                Date of Birth:
                            </span>
                            <span class="text-xs">
                              {{auth()->user()->dob?auth()->user()->dob->format('d M Y'):null}}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="space-y-5 font-mono mt-5">
                    <div class="font-bold bg-blue-200 text-blue-800 px-5 py-3 rounded">
                        <header class="text-md">
                            Contact Information
                        </header>
                    </div>
                    <div class="pl-5 space-y-2">
                        <p class="flex items-center font-bold space-x-5 border-b p-2">
                    <span class="text-sm">
                        E-mail:
                    </span>
                            <span class="text-xs">
                      {{auth()->user()->email}}
                    </span>
                        </p>

                        <p class="flex items-center font-bold space-x-5 p-2">
                    <span class="text-sm">
                        Phone number:
                    </span>
                            <span class="text-xs">
                       {{auth()->user()->phone}}
                    </span>
                        </p>
                    </div>
                </div>

                <div class="space-y-5 font-mono mt-5">
                    <div class="font-bold bg-blue-200 text-blue-800 px-5 py-3 rounded">
                        <header class="text-md">
                            Login Credentials
                        </header>
                    </div>
                    <div class="pl-5 space-y-2">
                        <p class="flex items-center font-bold space-x-5 border-b p-2">
                    <span class="text-sm">
                        Username:
                    </span>
                            <span class="text-xs">
                        {{auth()->user()->username}}
                    </span>
                        </p>
                        {{-- <p class="flex items-center font-bold space-x-5 p-2">
                            <span class="text-sm">
                                Password:
                            </span>
                            <span class="text-xs">
                                Value
                            </span>
                        </p> --}}
                    </div>
                </div>

            </div>
        @else
            <div class="md:w xs:w-full">
                <div class="space-y-5 font-mono">
                    <div class="font-bold bg-blue-200 text-blue-800 px-5 py-3 rounded">
                        <header class="text-md">
                            Personal Information
                        </header>
                    </div>
                    <div class="pl-5 space-y-2">
                        <p class="flex items-center font-bold space-x-5 border-b p-2">
                    <span class="text-sm">
                        Full name:
                    </span>

                            <input class="form-input w-1/2"
                                   wire:model.lazy="first_name"
                                   placeholder="First Name">
                            <input class="form-input w-1/2"
                                   wire:model.lazy="last_name"
                                   placeholder="Last Name">
                            @error('first_name')<span
                                class="text-red-800">{{$message}}</span> @enderror @error('last_name')<span
                                class="text-red-800">{{$message}}</span> @enderror
                        </p>

                        <p class="flex items-center font-bold space-x-5  p-2">
                            <span class="text-sm">
                                Gender:
                            </span>
                            <span class="text-xs">
                                        <input type="radio" class="form-radio" name="gender" value="male"
                                               wire:model="gender"> Male
                                        <input type="radio" class="form-radio" name="gender" value="female"
                                               wire:model="gender"> Female
                            </span>
                            @error('gender')<span class="text-red-800">{{$message}}</span> @enderror
                        </p>

                        <p class="flex items-center font-bold space-x-5  p-2">
                            <span class="text-sm">
                                Country:
                            </span>
                            <select class="form-select" wire:model="country">
                                <option value="">Select</option>
                                @if($countries)
                                    @foreach($countries as $key=>$item)
                                        <option value="{{$key}}">{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('country')<span class="text-red-800">{{$message}}</span> @enderror
                        </p>
                        <p class="flex items-center font-bold space-x-5  p-2">
                            <span class="text-sm">
                                State:
                            </span>
                            <select class="form-select" wire:model="state">
                                <option value="">Select</option>
                                @if($states)
                                    @foreach($states as $key=>$item)
                                        <option value="{{$key}}">{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('states')<span class="text-red-800">{{$message}}</span> @enderror
                        </p>
                        <p class="flex items-center font-bold space-x-5  p-2">
                            <span class="text-sm">
                                Date of Birth:
                            </span>
                            <input type="date" wire:model.lazy="dob" class="form-input w-1/2"/>
                            @error('dob')<span class="text-red-800">{{$message}}</span> @enderror
                        </p>
                    </div>
                </div>

                <div class="space-y-5 font-mono mt-5">
                    <div class="font-bold bg-blue-200 text-blue-800 px-5 py-3 rounded">
                        <header class="text-md">
                            Contact Information
                        </header>
                    </div>
                    <div class="pl-5 space-y-2">
                        <p class="flex items-center font-bold space-x-5 border-b p-2">
                            <span class="text-sm">
                                E-mail:
                            </span>
                            <span class="text-xs">  {{auth()->user()->email}} </span>
                        </p>

                        <p class="flex items-center font-bold space-x-5 p-2">
                    <span class="text-sm">
                        Phone number:
                    </span>

                            <input type="tel" class="form-input w-1/2"
                                   wire:model.lazy="phone"/>
                            @error('phone')<span class="text-red-800">{{$message}}</span> @enderror
                        </p>
                    </div>
                </div>

                <div class="space-y-5 font-mono mt-5">
                    <div class="font-bold bg-blue-200 text-blue-800 px-5 py-3 rounded">
                        <header class="text-md">
                            Login Credentials
                        </header>
                    </div>
                    <div class="pl-5 space-y-2">
                        <p class="flex items-center font-bold space-x-5 border-b p-2">
                    <span class="text-sm">
                        Username:
                    </span>
                            <input type="text" class="form-input w-1/2"
                                   wire:model.lazy="username"/>
                            @error('username')<span class="text-red-800">{{$message}}</span> @enderror
                        </p>
                        {{-- <p class="flex items-center font-bold space-x-5 p-2">
                            <span class="text-sm">
                                Password:
                            </span>
                            <span class="text-xs">
                                Value
                            </span>
                        </p> --}}
                        <button class="p-2 bg-blue-400 rounded-xl text-white border border-gray-900"
                                wire:click="profileUpdate">Update
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
