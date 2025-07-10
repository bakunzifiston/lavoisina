<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\ConferenceHallBooking;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class ConferenceBookingForm extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $date = '';
    public $start_time = '';
    public $end_time = '';
    public $number_of_attendees = 1;
    public $purpose = '';
    public $setup_requirements = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required',
        'date' => 'required|date|after:today',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
        'number_of_attendees' => 'required|integer|min:1|max:100',
        'purpose' => 'required|string|max:500',
        'setup_requirements' => 'nullable|string|max:500',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            // Create or update customer
            $customer = Customer::firstOrCreate(
                ['email' => $this->email],
                [
                    'name' => $this->name,
                    'phone' => $this->phone,
                ]
            );

            // Check for conflicting bookings
            $conflictingBooking = ConferenceHallBooking::where('date', $this->date)
                ->where(function ($query) {
                    $query->whereBetween('start_time', [$this->start_time, $this->end_time])
                        ->orWhereBetween('end_time', [$this->start_time, $this->end_time]);
                })
                ->first();

            if ($conflictingBooking) {
                throw new \Exception('The conference hall is already booked for this time slot.');
            }

            // Create booking
            $booking = ConferenceHallBooking::create([
                'customer_id' => $customer->id,
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'number_of_attendees' => $this->number_of_attendees,
                'purpose' => $this->purpose,
                'setup_requirements' => $this->setup_requirements,
                'status' => 'pending',
                'total_price' => $this->calculatePrice()
            ]);

            DB::commit();

            session()->flash('success', 'Your conference hall booking request has been submitted successfully!');
            $this->reset();

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage());
        }
    }

    protected function calculatePrice(): float
    {
        // Base price per hour
        $basePrice = 50.00;
        
        // Calculate duration in hours
        $start = \Carbon\Carbon::parse($this->start_time);
        $end = \Carbon\Carbon::parse($this->end_time);
        $hours = $end->diffInHours($start);

        // Calculate total price
        return $basePrice * $hours;
    }

    public function render()
    {
        return view('livewire.forms.conference-booking-form')->layout('layouts.guest');
    }
}
