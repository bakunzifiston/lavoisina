<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'La Voisina Hotel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                                {{ config('app.name', 'La Voisina Hotel') }}
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Home
                            </a>
                            <a href="{{ route('rooms') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Rooms
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Contact
                            </a>
                        </div>
                    </div>

                    <!-- Book Now Button -->
                    <div class="flex items-center">
                        <a href="{{ route('rooms') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Contact</h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <p class="text-base text-gray-500">Musanze</p>
                                <p class="text-base text-gray-500">North province</p>
                            </li>
                            <li>
                                <p class="text-base text-gray-500">Phone: +250788358010</p>
                                <p class="text-base text-gray-500">Email: lavoisinahotel2@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Quick Links</h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a href="{{ route('home') }}" class="text-base text-gray-500 hover:text-gray-900">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('rooms') }}" class="text-base text-gray-500 hover:text-gray-900">
                                    Rooms
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" class="text-base text-gray-500 hover:text-gray-900">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Follow Us</h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a href="" class="text-base text-gray-500 hover:text-gray-900">
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                    Instagram
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-200 pt-8">
                    <p class="text-base text-gray-400 text-center">
                        &copy; {{ date('Y') }} La voisina Hotel. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html> 