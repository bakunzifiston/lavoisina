{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<div class="bg-gradient-to-br from-purple-600 via-indigo-700 to-blue-800 rounded-2xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
    <div class="relative p-8 sm:p-10">
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-blue-400 opacity-10 rounded-full blur-2xl"></div>

        <form wire:submit="subscribe" class="relative space-y-6">
            @if (session()->has('success'))
                <div class="rounded-xl bg-green-100 bg-opacity-95 p-4 mb-6 backdrop-blur-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="max-w-md mx-auto">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label for="email" class="sr-only">Email address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-white transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input type="email" 
                                wire:model="email" 
                                id="email" 
                                class="block w-full pl-10 pr-3 py-3.5 border-2 border-white/20 rounded-xl text-white placeholder-white/60 bg-white/10 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all duration-200 hover:bg-white/20" 
                                placeholder="Enter your email address">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-200 bg-red-500/20 px-3 py-1 rounded-lg inline-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-shrink-0">
                        <button type="submit" 
                            class="w-full sm:w-auto flex justify-center items-center px-6 py-3.5 border-2 border-white/20 rounded-xl text-base font-medium text-white bg-white/10 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-indigo-600 backdrop-blur-sm transition-all duration-200">
                            Subscribe
                            <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <p class="mt-4 text-sm text-white/80 text-center sm:text-left">Join our newsletter for exclusive offers and updates.</p>
            </div>
        </form>
    </div>
</div>
