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

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <x-navigation />

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-white text-lg font-semibold mb-4">Contact Us</h3>
                        <div class="text-gray-300 space-y-2">
                            <p>Musanze</p>
                            <p>North province</p>
                            <p>Phone: +250788358010</p>
                            <p>Email: lavoisinahotel2@gmail.com</p>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-white text-lg font-semibold mb-4">Quick Links</h3>
                        <ul class="text-gray-300 space-y-2">
                            <li><a href="{{ route('rooms') }}" class="hover:text-white">Our Rooms</a></li>
                            <li><a href="{{ route('conference-booking') }}" class="hover:text-white">Conference Hall</a></li>
                            <li><a href="{{ route('about-us') }}" class="hover:text-white">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div>
                        <h3 class="text-white text-lg font-semibold mb-4">Newsletter</h3>
                        @livewire('newsletter-signup')
                    </div>
                </div>

                <!-- Copyright -->
                <div class="mt-8 border-t border-gray-700 pt-8">
                    <p class="text-gray-400 text-center">&copy; {{ date('Y') }} La Voisina Hotel. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
    @livewireScripts
</body>
</html> 