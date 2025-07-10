<?php

namespace App\Traits;

trait HasBookingConfirmation
{
    public function confirmBooking(): void
    {
        $this->update([
            'status' => 'confirmed',
            'payment_status' => 'paid'
        ]);
    }

    public function isPending(): bool
    {
        return $this->status === 'pending' && $this->payment_status === 'pending';
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed' && $this->payment_status === 'paid';
    }
} 