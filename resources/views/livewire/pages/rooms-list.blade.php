<div class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Our Rooms</h1>
            <p class="mt-4 text-lg text-gray-500">Find the perfect room for your stay.</p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-8 lg:grid-cols-4">
            <!-- Filters Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white shadow rounded-lg p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Filters</h3>
                        <button wire:click="resetFilters" class="mt-2 text-sm text-indigo-600 hover:text-indigo-500">
                            Reset all filters
                        </button>
                    </div>

                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <div class="mt-1">
                            <input type="text" 
                                   wire:model.live="search" 
                                   id="search" 
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                   placeholder="Search rooms...">
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Room Category</label>
                        <select wire:model.live="selectedCategory" 
                                id="category" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <h4 class="text-sm font-medium text-gray-700">Price Range</h4>
                        <div class="mt-2 grid grid-cols-2 gap-4">
                            <div>
                                <label for="min-price" class="sr-only">Minimum Price</label>
                                <input type="number" 
                                       wire:model.live="minPrice" 
                                       id="min-price" 
                                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                       placeholder="Min">
                            </div>
                            <div>
                                <label for="max-price" class="sr-only">Maximum Price</label>
                                <input type="number" 
                                       wire:model.live="maxPrice" 
                                       id="max-price" 
                                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                       placeholder="Max">
                            </div>
                        </div>
                    </div>

                    <!-- Facilities -->
                    <div>
                        <h4 class="text-sm font-medium text-gray-700">Facilities</h4>
                        <div class="mt-2 space-y-2">
                            @foreach($facilities as $facility)
                                <div class="flex items-center">
                                    <input type="checkbox" 
                                           wire:model.live="selectedFacilities" 
                                           value="{{ $facility->id }}" 
                                           id="facility-{{ $facility->id }}" 
                                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="facility-{{ $facility->id }}" class="ml-2 text-sm text-gray-700">
                                        {{ $facility->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rooms Grid -->
            <div class="lg:col-span-3">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($rooms as $room)
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="relative pb-48">
                                <img class="absolute h-full w-full object-cover" 
                                src="{{ asset('images/room.jpg') }}" 
     alt="{{ $room->category->name }}">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $room->category->name }}</h3>
                                <p class="mt-2 text-sm text-gray-500">Room {{ $room->room_number }}</p>
                                <div class="mt-4">
                                    <span class="text-2xl font-bold text-gray-900">Rwf{{ number_format($room->current_price, 2) }}</span>
                                    <span class="text-gray-500">/night</span>
                                </div>
                                
                                <!-- Facilities -->
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach($room->facilities as $facility)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $facility->name }}
                                        </span>
                                    @endforeach
                                </div>

                                <!-- Rating -->
                                <div class="mt-4">
                                    <div class="flex items-center">
                                        <span class="text-yellow-400">★</span>
                                        <span class="ml-1 text-sm text-gray-600">{{ number_format($room->average_rating, 1) }}</span>
                                        <span class="mx-2 text-gray-400">•</span>
                                        <span class="text-sm text-gray-600">{{ $room->total_reviews }} reviews</span>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <a href="{{ route('rooms.show', $room) }}" class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="text-center py-12">
                                <h3 class="text-lg font-medium text-gray-900">No rooms found</h3>
                                <p class="mt-2 text-sm text-gray-500">Try adjusting your filters or check back later.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
