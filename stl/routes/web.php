<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

// ✅ Show login page
Route::get('/', [RegistrationController::class, 'showLoginForm'])->name('login');

// ✅ Handle login form
Route::post('/login', [RegistrationController::class, 'login'])->name('login.process');

// ✅ Redirect after login using layout
Route::get('/dashboard', [RegistrationController::class, 'dashboard'])->name('dashboard');

// ✅ Handle logout
Route::post('/logout', [RegistrationController::class, 'logout'])->name('logout');

// ✅ Register new user
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

// ✅ Admin only - view all registrations
Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');

