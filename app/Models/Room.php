<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_category_id',
        'status',
        'price_adjustment',
        'description',
    ];

    protected $casts = [
        'price_adjustment' => 'decimal:2',
    ];

    protected $appends = [
        'current_price',
        'average_rating',
        'total_reviews',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'room_facilities')
            ->withTimestamps();
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(RoomReview::class);
    }

    public function getCurrentPriceAttribute(): float
    {
        return $this->category->base_price + $this->price_adjustment;
    }

    public function getAverageRatingAttribute(): float
    {
        return $this->reviews()
            ->where('is_published', true)
            ->avg('rating') ?? 0;
    }

    public function getTotalReviewsAttribute(): int
    {
        return $this->reviews()
            ->where('is_published', true)
            ->count();
    }
}
