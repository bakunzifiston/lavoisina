<div>
    <form wire:submit.prevent="subscribe" class="mt-4">
        <div class="flex flex-col space-y-3">
            @if ($successMessage)
                <div class="text-green-400 text-sm">
                    {{ $successMessage }}
                </div>
            @endif

            <div>
                <label for="email" class="sr-only">Email address</label>
                <input wire:model="email" 
                       type="email" 
                       name="email" 
                       id="email" 
                       class="block w-full rounded-md border-gray-700 bg-gray-700 text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                       placeholder="Enter your email">
                @error('email')
                    <span class="text-red-400 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" 
                    class="w-full rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Subscribe
            </button>
        </div>
    </form>
</div> 