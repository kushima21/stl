<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('layout.default');
});

Route::get('/registrations', function () {
    return view('super.registration');
});

Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/registrations', [RegistrationController::class, 'index']);