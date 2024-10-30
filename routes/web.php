<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController; // Import AdminController

// Redirect root URL to the login page if not authenticated
Route::get('/', function () {
    return Auth::check() ? redirect()->route('admin.dashboard') : view('welcome'); // Redirect to dashboard if authenticated
});

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit'); // Edit user profile
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update'); // Update user profile

    // Admin routes
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); // Admin dashboard
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit'); // Edit user details by admin
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update'); // Update user details by admin
});
