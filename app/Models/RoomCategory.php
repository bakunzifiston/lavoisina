<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'base_price',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
