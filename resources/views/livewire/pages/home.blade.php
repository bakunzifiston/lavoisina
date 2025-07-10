<div>
    <!-- Hero Section -->
    <div class="relative bg-gray-900">
        <div class="absolute inset-0">
        <img class="w-full h-full object-cover" src="{{ asset('images/banner.jpg') }}" alt="Hotel">
<div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Welcome to La Voisina Hotel</h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl">Your serene gateway to comfort and elegance in Rwanda. Whether you're here for business or leisure, La Voisina Hotel offers a welcoming atmosphere, modern amenities, and exceptional service that make your stay unforgettable.</p>
            <div class="mt-10">
                <a href="{{ route('rooms') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    View Our Rooms
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Room Categories -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Featured Rooms</h2>
                <p class="mt-4 text-lg text-gray-500">La Voisina Hotel</p>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($featuredCategories as $category)
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="relative pb-48">
    <img class="absolute h-full w-full object-cover" src="{{ asset('images/room.jpg') }}" alt="{{ $category->name }}">
</div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $category->name }}</h3>
                        <p class="mt-2 text-gray-500">{{ $category->description }}</p>
                        <div class="mt-4">
                            <span class="text-2xl font-bold text-gray-900">Rwf{{ number_format($category->base_price, 2) }}</span>
                            <span class="text-gray-500">/night</span>
                        </div>
                        <div class="mt-4 text-sm text-gray-500">
                            {{ $category->rooms_count }} rooms available
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('rooms') }}?category={{ $category->id }}" class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                View Rooms
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Facilities Section -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Our Facilities</h2>
                <p class="mt-4 text-lg text-gray-500">Everything you need for a comfortable stay.</p>
            </div>

            <div class="mt-12 grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-4">
                @foreach($facilities as $facility)
                <div class="text-center">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white mx-auto">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">{{ $facility->name }}</h3>
                    <p class="mt-2 text-base text-gray-500">{{ $facility->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Stay Updated</h2>
                <p class="mt-4 text-lg text-gray-500">Subscribe to our newsletter for exclusive offers and updates.</p>
            </div>
            <div class="mt-8 max-w-md mx-auto">
                <livewire:components.newsletter-signup />
            </div>
        </div>
    </div>
</div>
