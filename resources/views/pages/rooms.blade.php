<x-app-layout>
    <!-- Header -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">Our Rooms</h1>
                <p class="mt-4 max-w-3xl mx-auto text-xl text-gray-500">Choose from our selection of comfortable and luxurious rooms.</p>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <form action="{{ route('rooms') }}" method="GET" class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price</label>
                    <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="0">
                </div>

                <div>
                    <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price</label>
                    <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="1000">
                </div>

                <div class="flex items-end">
                    <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Room List -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($rooms as $room)
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="relative pb-48">
                        <img class="absolute h-full w-full object-cover" src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="{{ $room->category->name }}">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $room->category->name }}</h3>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $room->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($room->status) }}
                            </span>
                        </div>
                        <p class="mt-2 text-gray-500">{{ Str::limit($room->description, 100) }}</p>
                        <div class="mt-4">
                            <span class="text-2xl font-bold text-gray-900">${{ number_format($room->current_price, 2) }}</span>
                            <span class="text-gray-500">/night</span>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($room->facilities as $facility)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                {{ $facility->name }}
                            </span>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <span class="text-yellow-400">★</span>
                                <span class="ml-1 text-sm text-gray-600">{{ number_format($room->average_rating, 1) }}</span>
                                <span class="mx-2 text-gray-400">•</span>
                                <span class="text-sm text-gray-600">{{ $room->total_reviews }} reviews</span>
                            </div>
                        </div>
                        <div class="mt-6">
                            @if($room->status === 'available')
                            <a href="{{ route('booking.create', ['room' => $room->id]) }}" class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Book Now
                            </a>
                            @else
                            <button disabled class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-400 cursor-not-allowed">
                                Not Available
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <h3 class="text-lg font-medium text-gray-900">No rooms found</h3>
                    <p class="mt-2 text-gray-500">Try adjusting your filters or check back later.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
</x-app-layout> 