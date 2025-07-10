<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RoomCategory;
use App\Models\Room;
use App\Models\Facility;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\RoomReview;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create room categories
        $categories = [
            ['name' => 'Standard Room', 'description' => 'Comfortable standard room', 'base_price' => 100],
            ['name' => 'Deluxe Room', 'description' => 'Spacious deluxe room with city view', 'base_price' => 200],
            ['name' => 'Suite', 'description' => 'Luxury suite with separate living area', 'base_price' => 300],
        ];

        foreach ($categories as $category) {
            RoomCategory::create($category);
        }

        // Create facilities
        $facilities = [
            ['name' => 'Wi-Fi', 'description' => 'High-speed internet', 'icon' => 'wifi'],
            ['name' => 'TV', 'description' => '4K Smart TV', 'icon' => 'tv'],
            ['name' => 'Mini Bar', 'description' => 'Stocked mini bar', 'icon' => 'glass'],
            ['name' => 'Room Service', 'description' => '24/7 room service', 'icon' => 'service'],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }

        // Create rooms
        $rooms = [
            ['room_number' => '101', 'room_category_id' => 1, 'status' => 'available'],
            ['room_number' => '102', 'room_category_id' => 1, 'status' => 'available'],
            ['room_number' => '201', 'room_category_id' => 2, 'status' => 'available'],
            ['room_number' => '202', 'room_category_id' => 2, 'status' => 'available'],
            ['room_number' => '301', 'room_category_id' => 3, 'status' => 'available'],
        ];

        foreach ($rooms as $room) {
            $roomModel = Room::create($room);
            // Attach random facilities to each room
            $roomModel->facilities()->attach(Facility::inRandomOrder()->limit(rand(2, 4))->pluck('id'));
        }

        // Create customers
        $customers = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '1234567890'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '0987654321'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }

        // Create bookings
        $bookings = [
            [
                'room_id' => 1,
                'customer_id' => 1,
                'check_in' => now(),
                'check_out' => now()->addDays(3),
                'number_of_guests' => 2,
                'total_price' => 300,
                'status' => 'pending',
                'payment_status' => 'pending',
            ],
            [
                'room_id' => 2,
                'customer_id' => 2,
                'check_in' => now()->subDays(5),
                'check_out' => now()->subDays(2),
                'number_of_guests' => 1,
                'total_price' => 300,
                'status' => 'confirmed',
                'payment_status' => 'paid',
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }

        // Create reviews
        $reviews = [
            [
                'room_id' => 1,
                'booking_id' => 1,
                'customer_id' => 1,
                'rating' => 5,
                'comment' => 'Excellent stay! The room was clean and comfortable.',
                'is_published' => true,
            ],
            [
                'room_id' => 2,
                'booking_id' => 2,
                'customer_id' => 2,
                'rating' => 4,
                'comment' => 'Great room, friendly staff. Would stay again.',
                'is_published' => true,
            ],
        ];

        foreach ($reviews as $review) {
            RoomReview::create($review);
        }

        // Call ConferenceHallBookingSeeder
        $this->call(ConferenceHallBookingSeeder::class);
    }
}
