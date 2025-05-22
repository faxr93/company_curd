<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

// Public route (optional redirect to dashboard or login)
Route::get('/', function () {
    return view('welcome');
});

// Authenticated & verified users only
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Company resource CRUD
    Route::resource('companies', CompanyController::class);
});
