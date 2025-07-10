<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Facility;

class Home extends Component
{
    public function render()
    {
        $featuredCategories = RoomCategory::withCount('rooms')
            ->take(3)
            ->get();

        $facilities = Facility::all();

        return view('livewire.pages.home', [
            'featuredCategories' => $featuredCategories,
            'facilities' => $facilities,
        ])->layout('layouts.guest');
    }
}
