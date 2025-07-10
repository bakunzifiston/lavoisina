<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Bookings Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('room_id')
                    ->relationship('room', 'room_number')
                    ->required(),
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                    ]),
                Forms\Components\DatePicker::make('check_in')
                    ->required(),
                Forms\Components\DatePicker::make('check_out')
                    ->required(),
                Forms\Components\TextInput::make('number_of_guests')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('total_price')
                    ->required()
                    ->numeric()
                    ->prefix('Rwf'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'checked_in' => 'Checked In',
                        'checked_out' => 'Checked Out',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
                Forms\Components\Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'refunded' => 'Refunded',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('special_requests')
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('check_in')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_out')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_of_guests')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->money('Rwf')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        'checked_in' => 'info',
                        'checked_out' => 'gray',
                    }),
                Tables\Columns\TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'refunded' => 'danger',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                        'checked_in' => 'Checked In',
                        'checked_out' => 'Checked Out',
                    ]),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'refunded' => 'Refunded',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('confirm_payment')
                    ->action(fn (Booking $record) => $record->confirmBooking())
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->label('Confirm Payment')
                    ->visible(fn (Booking $record) => $record->isPending()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
