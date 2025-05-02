<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JourneyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('journeys', [JourneyController::class, 'index'])->name('journeys.index');
Route::post('journeys', [JourneyController::class, 'store']);
Route::delete('journeys/{id}', [JourneyController::class, 'destroy'])->name('journeys.destroy');
Route::get('journeys/create', [JourneyController::class, 'create'])->name('journeys.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
