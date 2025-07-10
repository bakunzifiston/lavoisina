<div class="bg-white">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Room Images -->
        <div class="relative pb-48 rounded-lg overflow-hidden">

        <img class="absolute h-full w-full object-cover" 
     src="{{ asset('images/room.jpg') }}" 
     alt="{{ $room->category->name }}">
</div>

        <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Room Details -->
            <div class="lg:col-span-2">
                <h1 class="text-3xl font-extrabold text-gray-900">{{ $room->category->name }}</h1>
                <p class="mt-2 text-sm text-gray-500">Room {{ $room->room_number }}</p>

                <!-- Rating -->
                <div class="mt-4">
                    <div class="flex items-center">
                        <span class="text-yellow-400">★</span>
                        <span class="ml-1 text-sm text-gray-600">{{ number_format($room->average_rating, 1) }}</span>
                        <span class="mx-2 text-gray-400">•</span>
                        <span class="text-sm text-gray-600">{{ $room->total_reviews }} reviews</span>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <h2 class="text-lg font-medium text-gray-900">Description</h2>
                    <p class="mt-4 text-gray-500">{{ $room->description }}</p>
                </div>

                <!-- Facilities -->
                <div class="mt-8">
                    <h2 class="text-lg font-medium text-gray-900">Facilities</h2>
                    <div class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-3">
                        @foreach($room->facilities as $facility)
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-2 text-gray-700">{{ $facility->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Reviews -->
                <div class="mt-8">
                    <h2 class="text-lg font-medium text-gray-900">Reviews</h2>
                    <div class="mt-4 space-y-6">
                        @forelse($reviews as $review)
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex items-center">
                                    <div class="flex-1">
                                        <h4 class="text-sm font-medium text-gray-900">{{ $review->customer->name }}</h4>
                                        <div class="mt-1 flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <span class="text-yellow-400">{{ $i <= $review->rating ? '★' : '☆' }}</span>
                                            @endfor
                                        </div>
                                    </div>
                                    <time class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</time>
                                </div>
                                <p class="mt-4 text-sm text-gray-500">{{ $review->comment }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500">No reviews yet.</p>
                        @endforelse

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $reviews->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Card -->
            <div class="lg:col-span-1">
                <div class="bg-white border rounded-lg shadow-sm p-6 sticky top-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-2xl font-bold text-gray-900">Rwf{{ number_format($room->current_price, 2) }}</span>
                            <span class="text-gray-500">/night</span>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $room->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($room->status) }}
                        </span>
                    </div>

                    @if($room->status === 'available')
                        <div class="mt-6">
                            <a href="{{ route('booking.create', ['room' => $room->id]) }}" 
                               class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Book Now
                            </a>
                        </div>
                    @else
                        <div class="mt-6">
                            <button disabled class="block w-full text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-400 cursor-not-allowed">
                                Not Available
                            </button>
                        </div>
                    @endif

                    <div class="mt-6 text-center text-sm text-gray-500">
                        <p>Free cancellation up to 24 hours before check-in</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
