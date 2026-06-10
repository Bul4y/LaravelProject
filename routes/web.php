<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Middleware;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:super_admin'])->group(function () {
  Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
});

Route::middleware(['auth', 'verified', 'role:super_admin,inventory_manager'])->group(function () {
    Route::resource('manufacturers', ManufacturerController::class)->except(['create', 'edit']);
    Route::resource('locations', LocationController::class)->except(['create', 'edit']);
});

Route::middleware(['auth', 'verified', 'role:super_admin,inventory_user'])->group(function () {
    Route::resource('assets', AssetController::class)->except(['create', 'edit']);
});

Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
Route::resource('manufacturers', ManufacturerController::class)->except(['create', 'edit']);
Route::resource('locations', LocationController::class)->except(['create', 'edit']);
Route::resource('assets', AssetController::class)->except(['create', 'edit']);


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';