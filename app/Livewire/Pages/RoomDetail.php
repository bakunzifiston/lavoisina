<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Room;

class RoomDetail extends Component
{
    public Room $room;

    public function mount(Room $room)
    {
        $this->room = $room->load(['category', 'facilities', 'reviews' => function ($query) {
            $query->where('is_published', true)
                  ->with('customer')
                  ->latest();
        }]);
    }

    public function render()
    {
        return view('livewire.pages.room-detail', [
            'reviews' => $this->room->reviews()->paginate(5),
        ])->layout('layouts.guest');
    }
}
