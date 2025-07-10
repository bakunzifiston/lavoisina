<?php

namespace App\Models;

use App\Traits\HasBookingConfirmation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory, HasBookingConfirmation;

    protected $fillable = [
        'room_id',
        'customer_id',
        'check_in',
        'check_out',
        'number_of_guests',
        'total_price',
        'status',
        'payment_status',
        'special_requests',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
