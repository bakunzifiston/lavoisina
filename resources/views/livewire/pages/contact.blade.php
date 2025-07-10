<div class="bg-gray-100 min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-indigo-800">
        <div class="absolute inset-0">
        <img class="w-full h-full object-cover" src="{{ asset('images/banner.jpg') }}" alt="Hotel">
<div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Contact Us</h1>
            <p class="mt-6 text-xl text-indigo-100 max-w-3xl">We're here to help and answer any question you might have.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Information -->
            <div>
                <div class="max-w-lg">
                    <h2 class="text-2xl font-extrabold text-gray-900 sm:text-3xl">Get in touch</h2>
                    <p class="mt-3 text-lg text-gray-500">Have questions about our hotel or need assistance with your booking? Our team is ready to help.</p>

                    <dl class="mt-8 text-base text-gray-500">
                        <div class="mt-6">
                            <dt class="sr-only">Postal address</dt>
                            <dd class="flex">
                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="ml-3">
                                Musanze<br>
                                North province
                                </span>
                            </dd>
                        </div>

                        <div class="mt-3">
                            <dt class="sr-only">Phone number</dt>
                            <dd class="flex">
                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="ml-3">+250788358010 </span>
                            </dd>
                        </div>

                        <div class="mt-3">
                            <dt class="sr-only">Email</dt>
                            <dd class="flex">
                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-3">lavoisinahotel2@gmail.com</span>
                            </dd>
                        </div>
                    </dl>

                    <!-- Map -->
                    <div class="mt-8">
                        <iframe class="w-full h-64 rounded-lg" 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835253576414!2d144.95373631531732!3d-37.817327679751735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDQ5JzAyLjQiUyAxNDTCsDU3JzE2LjEiRQ!5e0!3m2!1sen!2sus!4v1623825887167!5m2!1sen!2sus" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-sm p-6 sm:p-8">
                @if (session()->has('success'))
                    <div class="rounded-md bg-green-50 p-4 mb-6">
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

                <form wire:submit="submit" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
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
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" 
                               wire:model="subject" 
                               id="subject" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('subject') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea wire:model="message" 
                                  id="message" 
                                  rows="4" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        @error('message') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
