<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/plants', 'App\Http\Controllers\PlantController@index')->name('plant.index');
Route::get('/plants/create', 'App\Http\Controllers\PlantController@create')->name('plant.create');
Route::post('/plants', 'App\Http\Controllers\PlantController@store')->name('plant.store');
Route::get('/plants/{id}', 'App\Http\Controllers\PlantController@show')->name('plant.show');
Route::delete('/plants/{id}', 'App\Http\Controllers\PlantController@destroy')->name('plant.destroy');
  
   
    Route::middleware(['auth'])->group(function () {
    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
    Route::post('/cart/add/{plantId}', 'App\Http\Controllers\CartController@add')->name('cart.add');
    Route::delete('/cart/remove/{itemId}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
    Route::post('/cart/checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout');
});

    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index');

    Route::get('/plants', 'App\Http\Controllers\Admin\AdminPlantController@index')->name('admin.plant.index');
    Route::get('/plants/create', 'App\Http\Controllers\Admin\AdminPlantController@create')->name('admin.plant.create');
    Route::post('/plants', 'App\Http\Controllers\Admin\AdminPlantController@store')->name('admin.plant.store');
    Route::get('/plants/{id}/edit', 'App\Http\Controllers\Admin\AdminPlantController@edit')->name('admin.plant.edit');
    Route::put('/plants/{id}', 'App\Http\Controllers\Admin\AdminPlantController@update')->name('admin.plant.update');
    Route::delete('/plants/{id}', 'App\Http\Controllers\Admin\AdminPlantController@destroy')->name('admin.plant.destroy');

    Route::get('/orders', 'App\Http\Controllers\Admin\AdminOrderController@index')->name('admin.order.index');
    Route::get('/orders/{id}', 'App\Http\Controllers\Admin\AdminOrderController@show')->name('admin.order.show');
    Route::delete('/orders/{id}', 'App\Http\Controllers\Admin\AdminOrderController@destroy')->name('admin.order.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
