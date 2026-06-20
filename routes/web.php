<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (All logged-in users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard (role-based handled inside controller)
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Tickets (IMPORTANT: allow all authenticated users)
    Route::resource('tickets', TicketController::class);

});

/*
|--------------------------------------------------------------------------
| Admin / Super Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Super Admin'])->group(function () {

    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);

    Route::get('/super-admin', [DashboardController::class, 'index'])
        ->name('super-admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';