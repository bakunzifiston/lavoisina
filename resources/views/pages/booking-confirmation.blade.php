<x-guest-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow px-6 py-8">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="mt-4 text-2xl font-bold text-gray-900">Booking Confirmed!</h2>
                    <p class="mt-2 text-sm text-gray-500">Thank you for choosing our hotel. Your booking details are below.</p>
                </div>

                <div class="mt-8">
                    <div class="border-t border-gray-200 py-6">
                        <dl class="divide-y divide-gray-200">
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Booking Reference</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">#{{ $booking->id }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Room</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $booking->room->category->name }} - Room {{ $booking->room->room_number }}
                                </dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Guest Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $booking->customer->name }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Check-in Date</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $booking->check_in->format('F j, Y') }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Check-out Date</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $booking->check_out->format('F j, Y') }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Number of Guests</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $booking->number_of_guests }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Total Price</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">${{ number_format($booking->total_price, 2) }}</dd>
                            </div>
                            @if($booking->special_requests)
                                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Special Requests</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $booking->special_requests }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="rounded-md bg-blue-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">Important Information</h3>
                                <div class="mt-2 text-sm text-blue-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        <li>Check-in time is from 2:00 PM</li>
                                        <li>Check-out time is until 11:00 AM</li>
                                        <li>Please present your ID and credit card at check-in</li>
                                        <li>Free cancellation up to 24 hours before check-in</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                        Return to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> 