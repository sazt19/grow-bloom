<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;

Route::get('/', [PlantController::class, 'home'])->name('home');

Route::get('/plants/create', [PlantController::class, 'create'])->name('plants.create');
Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
Route::get('/plants', [PlantController::class, 'index'])->name('plants.index');
Route::get('/plants/{id}', [PlantController::class, 'show'])->name('plants.show');
Route::delete('/plants/{id}', [PlantController::class, 'destroy'])->name('plants.destroy');
