<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

// Users
Route::get('/register', [UserController::class, 'register'])->name('users.register');
Route::post('/register', [UserController::class, 'store'])->name('users.store');
Route::get('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/login', [UserController::class, 'authenticate'])->name('users.authenticate');
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');