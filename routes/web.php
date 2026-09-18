<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ROUTE VIEW
Route::view('/', 'index');

Route::controller(PageController::class)->name('pages.')->group(function () {
    route::get('/', 'index')->name('home');

});

// ROUTE FOR Order
Route::prefix('/orders')->controller(OrderController::class)->name('orders.')->group(function () {
        Route::view('/', 'orders.pesan')->name('create');
});

// ROUTE FOR AUTH
Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('/register', 'show_register')->name('register');
    Route::post('/register', 'register');

    Route::get('/login', 'show_login')->name('login');
    Route::post('/login', 'login');
});
