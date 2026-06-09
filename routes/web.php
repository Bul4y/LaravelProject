<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\manufacturerController;
use App\Http\Controllers\assetController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('categories', [categoryController::class, 'index'])->name('categories');
Route::get('location', [locationController::class, 'index'])->name('location');
Route::get('manufacturer', [manufacturerController::class, 'index'])->name('manufacturer');
Route::get('asset', [assetController::class, 'index'])->name('asset');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
