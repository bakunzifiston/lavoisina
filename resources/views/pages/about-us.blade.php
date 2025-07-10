<x-guest-layout>
    <div class="bg-white">
        <!-- Hero section -->
        <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
            <img src="{{ asset('images/hotel-facade.jpg') }}" alt="Hotel facade" class="absolute inset-0 -z-10 h-full w-full object-cover object-center opacity-30">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">About Us</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-300">Established in the heart of Rwanda, La Voisina Hotel is dedicated to providing top-tier hospitality services with a local touch. Our team is committed to making every guest feel at home, combining comfort with cultural warmth and sustainability.</p>
                </div>
            </div>
        </div>

        <!-- Mission section -->
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Our Vision</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Delivering Exceptional Experiences</p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">To become Rwanda’s most preferred hotel known for exceptional service and digital innovation in hospitality.</p>
                </div>
            </div>
        </div>

        <!-- Values section -->
        <div class="bg-gray-50 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Mission</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">To provide outstanding hospitality services that exceed guest expectations, through innovation, personalized care, and sustainable practices.</p>
                </div>
                <dl class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 text-base leading-7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <div class="relative pl-9">
                        <dt class="font-semibold text-gray-900">
                            <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            Excellence
                        </dt>
                        <dd class="mt-2">We strive for excellence in everything we do, from service to amenities.</dd>
                    </div>
                    <div class="relative pl-9">
                        <dt class="font-semibold text-gray-900">
                            <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z" clip-rule="evenodd" />
                            </svg>
                            Innovation
                        </dt>
                        <dd class="mt-2">We continuously innovate to enhance our guests' experience.</dd>
                    </div>
                    <div class="relative pl-9">
                        <dt class="font-semibold text-gray-900">
                            <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                            Hospitality
                        </dt>
                        <dd class="mt-2">We treat every guest like family, ensuring they feel at home.</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Team section -->
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Team</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Meet the dedicated professionals who make your stay exceptional.</p>
                </div>
                <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-14 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 xl:grid-cols-4">
                    <li>
                        <img class="aspect-[14/13] w-full rounded-2xl object-cover" src="{{ asset('images/team/manager.jpg') }}" alt="Hotel Manager">
                        <h3 class="mt-6 text-lg font-semibold leading-8 text-gray-900">John Smith</h3>
                        <p class="text-base leading-7 text-gray-600">Hotel Manager</p>
                    </li>
                    <li>
                        <img class="aspect-[14/13] w-full rounded-2xl object-cover" src="{{ asset('images/team/chef.jpg') }}" alt="Executive Chef">
                        <h3 class="mt-6 text-lg font-semibold leading-8 text-gray-900">Maria Rodriguez</h3>
                        <p class="text-base leading-7 text-gray-600">Executive Chef</p>
                    </li>
                    <li>
                        <img class="aspect-[14/13] w-full rounded-2xl object-cover" src="{{ asset('images/team/concierge.jpg') }}" alt="Head Concierge">
                        <h3 class="mt-6 text-lg font-semibold leading-8 text-gray-900">David Chen</h3>
                        <p class="text-base leading-7 text-gray-600">Head Concierge</p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Contact section -->
      
        </div>
    </div>
</x-guest-layout> 