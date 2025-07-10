<?php

namespace App\Filament\Resources\ConferenceHallBookingResource\Pages;

use App\Filament\Resources\ConferenceHallBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConferenceHallBookings extends ListRecords
{
    protected static string $resource = ConferenceHallBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
