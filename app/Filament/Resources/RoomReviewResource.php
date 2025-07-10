<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomReviewResource\Pages;
use App\Models\RoomReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RoomReviewResource extends Resource
{
    protected static ?string $model = RoomReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Room Management';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('room_id')
                    ->relationship('room', 'room_number')
                    ->required(),
                Forms\Components\Select::make('booking_id')
                    ->relationship('booking', 'id')
                    ->required(),
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required(),
                Forms\Components\Select::make('rating')
                    ->options([
                        1 => '1 Star',
                        2 => '2 Stars',
                        3 => '3 Stars',
                        4 => '4 Stars',
                        5 => '5 Stars',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('comment')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_published')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room.room_number')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state): string => match ($state) {
                        5 => 'success',
                        4 => 'success',
                        3 => 'warning',
                        default => 'danger',
                    }),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->options([
                        1 => '1 Star',
                        2 => '2 Stars',
                        3 => '3 Stars',
                        4 => '4 Stars',
                        5 => '5 Stars',
                    ]),
                Tables\Filters\TernaryFilter::make('is_published'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoomReviews::route('/'),
            'create' => Pages\CreateRoomReview::route('/create'),
            'edit' => Pages\EditRoomReview::route('/{record}/edit'),
        ];
    }
} 