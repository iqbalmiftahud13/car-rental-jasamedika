<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ReturnedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['admin', 'auth'])->group(function () {
    Route::resource('car', CarController::class);
    Route::resource('rentals', RentalController::class);
    Route::get('/rentals/{id}/return', [RentalController::class, 'returnForm'])->name('rentals.returnForm');
    Route::post('/rentals/{id}/return', [RentalController::class, 'returnCar'])->name('rentals.returnCar');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('booking', BookingController::class);
    Route::resource('returned', ReturnedController::class);
});

require __DIR__.'/auth.php';
