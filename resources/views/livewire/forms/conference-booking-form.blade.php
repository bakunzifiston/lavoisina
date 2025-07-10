<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow px-6 py-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900">Conference Hall Booking</h2>
                <p class="mt-2 text-gray-500">Fill out the form below to book our conference hall for your event.</p>
            </div>

            @if (session()->has('success'))
                <div class="mt-6 rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mt-6 rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form wire:submit="submit" class="mt-8 space-y-6">
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
                        <label for="number_of_attendees" class="block text-sm font-medium text-gray-700">Number of Attendees</label>
                        <input type="number" 
                               wire:model="number_of_attendees" 
                               id="number_of_attendees" 
                               min="1" 
                               max="100" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('number_of_attendees') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Booking Details -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" 
                               wire:model="date" 
                               id="date" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                        <input type="time" 
                               wire:model="start_time" 
                               id="start_time" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('start_time') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                        <input type="time" 
                               wire:model="end_time" 
                               id="end_time" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('end_time') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Event Details -->
                <div>
                    <label for="purpose" class="block text-sm font-medium text-gray-700">Event Purpose</label>
                    <textarea wire:model="purpose" 
                              id="purpose" 
                              rows="3" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                              placeholder="Please describe the purpose of your event"></textarea>
                    @error('purpose') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="setup_requirements" class="block text-sm font-medium text-gray-700">Setup Requirements</label>
                    <textarea wire:model="setup_requirements" 
                              id="setup_requirements" 
                              rows="3" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                              placeholder="Any specific setup requirements (e.g., seating arrangement, AV equipment)"></textarea>
                    @error('setup_requirements') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Information Box -->
                <div class="rounded-md bg-blue-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Conference Hall Information</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Maximum capacity: 100 people</li>
                                    <li>Available hours: 8:00 AM - 10:00 PM</li>
                                    <li>Basic AV equipment included</li>
                                    <li>Catering services available upon request</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit Booking Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
