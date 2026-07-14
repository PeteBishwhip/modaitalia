<?php

use App\Http\Controllers\MarketingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MarketingController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
