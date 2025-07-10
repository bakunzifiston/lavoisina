<?php

namespace Database\Seeders;

use App\Models\ConferenceHallBooking;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class ConferenceHallBookingSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();
        
        $bookings = [
            [
                'customer_id' => $customers->first()->id,
                'date' => now()->addDays(5),
                'start_time' => now()->addDays(5)->setHour(9)->setMinute(0),
                'end_time' => now()->addDays(5)->setHour(17)->setMinute(0),
                'number_of_attendees' => 50,
                'purpose' => 'Annual Company Meeting',
                'setup_requirements' => 'Theater style seating with projector',
                'status' => 'pending',
                'payment_status' => 'pending',
                'total_price' => 1000
            ],
            [
                'customer_id' => $customers->last()->id,
                'date' => now()->addDays(10),
                'start_time' => now()->addDays(10)->setHour(13)->setMinute(0),
                'end_time' => now()->addDays(10)->setHour(18)->setMinute(0),
                'number_of_attendees' => 30,
                'purpose' => 'Product Launch Event',
                'setup_requirements' => 'Round tables with AV equipment',
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'total_price' => 750
            ]
        ];

        foreach ($bookings as $booking) {
            ConferenceHallBooking::create($booking);
        }
    }
} 