<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'booking_id',
        'customer_id',
        'rating',
        'comment',
        'is_published',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_published' => 'boolean',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
} 