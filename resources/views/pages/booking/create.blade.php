<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Room Details -->
                        <div>
                            <div class="relative pb-48">
                                <img class="absolute h-full w-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="{{ $room->category->name }}">
                            </div>
                            <div class="mt-6">
                                <h2 class="text-2xl font-bold text-gray-900">{{ $room->category->name }}</h2>
                                <p class="mt-2 text-gray-500">{{ $room->description }}</p>
                                <div class="mt-4">
                                    <span class="text-2xl font-bold text-gray-900">${{ number_format($room->getCurrentPrice(), 2) }}</span>
                                    <span class="text-gray-500">/night</span>
                                </div>
                                <div class="mt-4">
                                    <h3 class="text-lg font-medium text-gray-900">Facilities</h3>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        @foreach($room->facilities as $facility)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $facility->name }}
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Form -->
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Make a Reservation</h2>
                            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">

                                <div class="grid grid-cols-1 gap-6">
                                    <!-- Personal Information -->
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Personal Information</h3>
                                        <div class="mt-4 grid grid-cols-1 gap-4">
                                            <div>
                                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @error('name')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @error('email')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @error('phone')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Booking Details -->
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Booking Details</h3>
                                        <div class="mt-4 grid grid-cols-1 gap-4">
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label for="check_in" class="block text-sm font-medium text-gray-700">Check-in Date</label>
                                                    <input type="date" name="check_in" id="check_in" value="{{ old('check_in') }}" required min="{{ date('Y-m-d') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @error('check_in')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div>
                                                    <label for="check_out" class="block text-sm font-medium text-gray-700">Check-out Date</label>
                                                    <input type="date" name="check_out" id="check_out" value="{{ old('check_out') }}" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @error('check_out')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div>
                                                <label for="number_of_guests" class="block text-sm font-medium text-gray-700">Number of Guests</label>
                                                <input type="number" name="number_of_guests" id="number_of_guests" value="{{ old('number_of_guests', 1) }}" required min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @error('number_of_guests')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="special_requests" class="block text-sm font-medium text-gray-700">Special Requests</label>
                                                <textarea name="special_requests" id="special_requests" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('special_requests') }}</textarea>
                                                @error('special_requests')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Book Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 