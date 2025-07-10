<?php

namespace App\Filament\Widgets;

use App\Models\Room;
use App\Models\RoomReview;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RoomRatingsChart extends ChartWidget
{
    protected static ?string $heading = 'Room Ratings Distribution';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $ratings = RoomReview::query()
            ->where('is_published', true)
            ->select('rating', DB::raw('count(*) as count'))
            ->groupBy('rating')
            ->orderBy('rating')
            ->pluck('count', 'rating')
            ->toArray();

        $data = array_replace([1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0], $ratings);

        return [
            'datasets' => [
                [
                    'label' => 'Number of Reviews',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        'rgb(239, 68, 68)', // 1 star - red
                        'rgb(249, 115, 22)', // 2 stars - orange
                        'rgb(234, 179, 8)', // 3 stars - yellow
                        'rgb(34, 197, 94)', // 4 stars - green
                        'rgb(21, 128, 61)', // 5 stars - dark green
                    ],
                ],
            ],
            'labels' => ['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
} 