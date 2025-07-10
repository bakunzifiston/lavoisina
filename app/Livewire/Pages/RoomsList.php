<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Facility;

class RoomsList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $selectedFacilities = [];
    public $categories;
    public $facilities;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
        'minPrice' => ['except' => ''],
        'maxPrice' => ['except' => ''],
        'selectedFacilities' => ['except' => []],
    ];

    public function mount()
    {
        $this->categories = RoomCategory::all();
        $this->facilities = Facility::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'selectedCategory', 'minPrice', 'maxPrice', 'selectedFacilities']);
    }

    public function render()
    {
        $rooms = Room::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('room_number', 'like', '%' . $this->search . '%')
                      ->orWhereHas('category', function ($q) {
                          $q->where('name', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->selectedCategory, function ($query) {
                $query->where('room_category_id', $this->selectedCategory);
            })
            ->when($this->minPrice, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('base_price', '>=', $this->minPrice);
                });
            })
            ->when($this->maxPrice, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('base_price', '<=', $this->maxPrice);
                });
            })
            ->when($this->selectedFacilities, function ($query) {
                foreach ($this->selectedFacilities as $facilityId) {
                    $query->whereHas('facilities', function ($q) use ($facilityId) {
                        $q->where('facilities.id', $facilityId);
                    });
                }
            })
            ->where('status', 'available')
            ->with(['category', 'facilities'])
            ->paginate(9);

        return view('livewire.pages.rooms-list', [
            'rooms' => $rooms,
        ])->layout('layouts.guest');
    }
}
