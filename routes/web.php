<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

// ROUTE FOR GUEST
Route::middleware('guest')->group(function (){
    Route::controller(LoginController::class)->group(function (){
        Route::get('/login', 'create')->name('auth.login');
        Route::post('/login', 'login');
    });

    Route::controller(RegisterController::class)->group(function (){
        Route::get('/register', 'show_register')->name('auth.register');
        Route::post('/register', 'register');
    });
});
