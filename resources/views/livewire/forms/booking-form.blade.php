<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow px-6 py-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Book Your Stay</h2>

            @if (session()->has('error'))
                <div class="rounded-md bg-red-50 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <form wire:submit="submit" class="space-y-6">
                @if(!$room)
                    <!-- Room Selection -->
                    <div>
                        <label for="room" class="block text-sm font-medium text-gray-700">Select Room</label>
                        <select wire:model="room" id="room" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Select a room</option>
                            @foreach($rooms as $availableRoom)
                                <option value="{{ $availableRoom->id }}">
                                    {{ $availableRoom->category->name }} - Room {{ $availableRoom->room_number }} (${{ number_format($availableRoom->current_price, 2) }}/night)
                                </option>
                            @endforeach
                        </select>
                        @error('room') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                @else
                    <!-- Selected Room Info -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $room->category->name }}</h3>
                        <p class="mt-1 text-sm text-gray-500">Room {{ $room->room_number }}</p>
                        <p class="mt-2 text-lg font-bold text-gray-900">Rwf{{ number_format($room->current_price, 2) }}/night</p>
                    </div>
                @endif

                <!-- Personal Information -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" 
                               wire:model="name" 
                               id="name" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" 
                               wire:model="email" 
                               id="email" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="tel" 
                               wire:model="phone" 
                               id="phone" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('phone') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="guests" class="block text-sm font-medium text-gray-700">Number of Guests</label>
                        <select wire:model="guests" 
                                id="guests" 
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @for($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                            @endfor
                        </select>
                        @error('guests') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="check_in_date" class="block text-sm font-medium text-gray-700">Check-in Date</label>
                        <input type="date" 
                               wire:model="check_in_date" 
                               id="check_in_date" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('check_in_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="check_out_date" class="block text-sm font-medium text-gray-700">Check-out Date</label>
                        <input type="date" 
                               wire:model="check_out_date" 
                               id="check_out_date" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('check_out_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Special Requests -->
                <div>
                    <label for="special_requests" class="block text-sm font-medium text-gray-700">Special Requests</label>
                    <textarea wire:model="special_requests" 
                              id="special_requests" 
                              rows="4" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    @error('special_requests') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
