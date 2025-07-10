<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\RoomsList;
use App\Livewire\Pages\RoomDetail;
use App\Livewire\Pages\Contact;
use App\Livewire\Forms\BookingForm;
use App\Livewire\Forms\ConferenceBookingForm;
use App\Models\Booking;
use App\Http\Controllers\AboutUsController;

Route::get('/', Home::class)->name('home');
Route::get('/rooms', RoomsList::class)->name('rooms');
Route::get('/rooms/{room}', RoomDetail::class)->name('rooms.show');
Route::get('/book/{room?}', BookingForm::class)->name('booking.create');
Route::get('/conference-booking', ConferenceBookingForm::class)->name('conference-booking');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/booking-confirmation/{booking}', function (Booking $booking) {
    return view('pages.booking-confirmation', ['booking' => $booking]);
})->name('booking.confirmation');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
