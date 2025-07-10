<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-gray-900">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Hotel">
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Welcome to La Voisina Hotel</h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl"> Your serene gateway to comfort and elegance in Rwanda. Whether you're here for business or leisure, La Voisina Hotel offers a welcoming atmosphere, modern amenities, and exceptional service that make your stay unforgettable.</p>
            <div class="mt-10">
                <a href="{{ route('rooms') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    View Our Rooms
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Rooms Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Featured Rooms</h2>
                <p class="mt-4 text-lg text-gray-500">Choose from our selection of comfortable and luxurious rooms.</p>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($featuredRooms as $room)
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="relative pb-48">
                        <img class="absolute h-full w-full object-cover" src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="{{ $room->category->name }}">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $room->category->name }}</h3>
                        <p class="mt-2 text-gray-500">{{ Str::limit($room->description, 100) }}</p>
                        <div class="mt-4">
                            <span class="text-2xl font-bold text-gray-900">${{ number_format($room->current_price, 2) }}</span>
                            <span class="text-gray-500">/night</span>
                        </div>
                        <div class="mt-4 flex items-center space-x-2">
                            @foreach($room->facilities as $facility)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                {{ $facility->name }}
                            </span>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('booking.create', ['room' => $room->id]) }}" class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Why Choose Us</h2>
                <p class="mt-4 text-lg text-gray-500">Experience the best hospitality with our premium services.</p>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white mx-auto">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Premium Location</h3>
                    <p class="mt-2 text-base text-gray-500">Located in the heart of the city with easy access to major attractions.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white mx-auto">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Luxury Amenities</h3>
                    <p class="mt-2 text-base text-gray-500">Enjoy our world-class facilities and premium amenities.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white mx-auto">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">24/7 Service</h3>
                    <p class="mt-2 text-base text-gray-500">Our dedicated staff is available round the clock to assist you.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 