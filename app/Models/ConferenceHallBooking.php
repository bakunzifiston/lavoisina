<?php

namespace App\Models;

use App\Traits\HasBookingConfirmation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConferenceHallBooking extends Model
{
    use HasFactory, HasBookingConfirmation;

    protected $fillable = [
        'customer_id',
        'date',
        'start_time',
        'end_time',
        'number_of_attendees',
        'purpose',
        'setup_requirements',
        'status',
        'payment_status',
        'total_price'
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'total_price' => 'decimal:2'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
