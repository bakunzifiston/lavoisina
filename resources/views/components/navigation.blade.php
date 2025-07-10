<nav class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">La Voisina Hotel</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center border-b-2 {{ request()->routeIs('home') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pt-1 text-sm font-medium">Home</a>
                    <a href="{{ route('rooms') }}" class="inline-flex items-center border-b-2 {{ request()->routeIs('rooms') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pt-1 text-sm font-medium">Rooms</a>
                    <a href="{{ route('conference-booking') }}" class="inline-flex items-center border-b-2 {{ request()->routeIs('conference-booking') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pt-1 text-sm font-medium">Conference Hall</a>
                    <a href="{{ route('about-us') }}" class="inline-flex items-center border-b-2 {{ request()->routeIs('about-us') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pt-1 text-sm font-medium">About Us</a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center border-b-2 {{ request()->routeIs('contact') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pt-1 text-sm font-medium">Contact</a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <a href="{{ route('booking.create') }}" class="ml-8 inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">Book Now</a>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 pb-3 pt-2">
            <a href="{{ route('home') }}" class="block border-l-4 {{ request()->routeIs('home') ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : 'border-transparent text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Home</a>
            <a href="{{ route('rooms') }}" class="block border-l-4 {{ request()->routeIs('rooms') ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : 'border-transparent text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Rooms</a>
            <a href="{{ route('conference-booking') }}" class="block border-l-4 {{ request()->routeIs('conference-booking') ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : 'border-transparent text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Conference Hall</a>
            <a href="{{ route('about-us') }}" class="block border-l-4 {{ request()->routeIs('about-us') ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : 'border-transparent text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">About Us</a>
            <a href="{{ route('contact') }}" class="block border-l-4 {{ request()->routeIs('contact') ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : 'border-transparent text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800' }} py-2 pl-3 pr-4 text-base font-medium">Contact</a>
        </div>
        <div class="border-t border-gray-200 pb-3 pt-4">
            <a href="{{ route('rooms') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Book Now</a>
        </div>
    </div>
</nav> 