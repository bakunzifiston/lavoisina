<?php

namespace App\Filament\Resources\ConferenceHallBookingResource\Pages;

use App\Filament\Resources\ConferenceHallBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConferenceHallBooking extends EditRecord
{
    protected static string $resource = ConferenceHallBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
