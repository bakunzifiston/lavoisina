<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomReview;
use App\Models\ConferenceHallBooking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalRooms = Room::count();
        $availableRooms = Room::where('status', 'available')->count();
        $bookedRooms = Room::where('status', 'booked')->count();
        
        $upcomingCheckIns = Booking::where('status', 'confirmed')
            ->where('check_in', '>=', now())
            ->where('check_in', '<=', now()->addDays(7))
            ->count();
            
        $upcomingCheckOuts = Booking::where('status', 'checked_in')
            ->where('check_out', '>=', now())
            ->where('check_out', '<=', now()->addDays(7))
            ->count();
            
        $upcomingConferenceBookings = ConferenceHallBooking::where('status', 'confirmed')
            ->where('date', '>=', now())
            ->where('date', '<=', now()->addDays(7))
            ->count();

        $averageRating = RoomReview::where('is_published', true)->avg('rating') ?? 0;
        $totalReviews = RoomReview::where('is_published', true)->count();

        return [
            Stat::make('Total Rooms', $totalRooms)
                ->description('Total number of rooms')
                ->descriptionIcon('heroicon-m-home')
                ->color('gray'),
            Stat::make('Available Rooms', $availableRooms)
                ->description('Ready for booking')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Booked Rooms', $bookedRooms)
                ->description('Currently occupied')
                ->descriptionIcon('heroicon-m-no-symbol')
                ->color('warning'),
            Stat::make('Upcoming Check-ins', $upcomingCheckIns)
                ->description('Next 7 days')
                ->descriptionIcon('heroicon-m-arrow-right-circle')
                ->color('info'),
            Stat::make('Upcoming Check-outs', $upcomingCheckOuts)
                ->description('Next 7 days')
                ->descriptionIcon('heroicon-m-arrow-left-circle')
                ->color('info'),
            Stat::make('Conference Bookings', $upcomingConferenceBookings)
                ->description('Next 7 days')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('success'),
            Stat::make('Average Rating', number_format($averageRating, 1) . ' ★')
                ->description($totalReviews . ' total reviews')
                ->descriptionIcon('heroicon-m-star')
                ->color($averageRating >= 4 ? 'success' : ($averageRating >= 3 ? 'warning' : 'danger')),
        ];
    }
}
