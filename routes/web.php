<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Clients
|--------------------------------------------------------------------------
*/

Route::resource('clients', ClientController::class);


/*
|--------------------------------------------------------------------------
| Appointments
|--------------------------------------------------------------------------
*/

Route::resource('appointments', AppointmentController::class);