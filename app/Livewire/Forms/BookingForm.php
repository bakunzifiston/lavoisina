<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingForm extends Component
{
    public ?Room $room = null;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $check_in_date = '';
    public $check_out_date = '';
    public $guests = 1;
    public $special_requests = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required',
        'check_in_date' => 'required|date|after:today',
        'check_out_date' => 'required|date|after:check_in_date',
        'guests' => 'required|integer|min:1|max:4',
        'special_requests' => 'nullable|string|max:500',
    ];

    public function mount(?Room $room = null)
    {
        $this->room = $room;
        if ($room && $room->status !== 'available') {
            session()->flash('error', 'This room is not available for booking.');
            return redirect()->route('rooms');
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            // Check room availability again
            if (!$this->room || $this->room->status !== 'available') {
                throw new \Exception('Room is no longer available.');
            }

            // Check for overlapping bookings
            $overlappingBookings = Booking::where('room_id', $this->room->id)
                ->where(function($query) {
                    $query->whereBetween('check_in', [$this->check_in_date, $this->check_out_date])
                        ->orWhereBetween('check_out', [$this->check_in_date, $this->check_out_date]);
                })->exists();

            if ($overlappingBookings) {
                throw new \Exception('Room is already booked for these dates.');
            }

            // Create or update customer
            $customer = Customer::firstOrCreate(
                ['email' => $this->email],
                [
                    'name' => $this->name,
                    'phone' => $this->phone,
                ]
            );

            // Create booking
            $booking = Booking::create([
                'room_id' => $this->room->id,
                'customer_id' => $customer->id,
                'check_in' => $this->check_in_date,
                'check_out' => $this->check_out_date,
                'number_of_guests' => $this->guests,
                'special_requests' => $this->special_requests,
                'total_price' => $this->calculateTotalPrice(),
                'status' => 'pending',
                'payment_status' => 'pending'
            ]);

            // Update room status
            $this->room->update(['status' => 'booked']);

            DB::commit();

            return redirect()->route('booking.confirmation', $booking)
                ->with('success', 'Your booking has been confirmed!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Booking error: ' . $e->getMessage(), [
                'room_id' => $this->room?->id,
                'email' => $this->email,
                'check_in' => $this->check_in_date,
                'check_out' => $this->check_out_date
            ]);
            session()->flash('error', 'There was an error processing your booking: ' . $e->getMessage());
        }
    }

    protected function calculateTotalPrice(): float
    {
        $checkIn = \Carbon\Carbon::parse($this->check_in_date);
        $checkOut = \Carbon\Carbon::parse($this->check_out_date);
        $nights = $checkIn->diffInDays($checkOut);
        return $this->room->current_price * $nights;
    }

    public function render()
    {
        return view('livewire.forms.booking-form', [
            'rooms' => $this->room ? null : Room::where('status', 'available')->with('category')->get(),
        ])->layout('layouts.guest');
    }
}
