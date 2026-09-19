<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ROUTE VIEW
Route::view('/order', 'orders.pesan')->name('orders.create');

Route::controller(PageController::class)->name('pages.')->group(function () {
    route::get('/', 'index')->name('home');
});


// ROUTE FOR GUEST
Route::middleware('guest')->group(function (){
    Route::controller(LoginController::class)->group(function (){
        Route::get('/login', 'create')->name('auth.login');
        Route::post('/login', 'login');
    });

    Route::controller(RegisterController::class)->group(function (){
        Route::get('/register', 'create')->name('auth.register');
        Route::post('/register', 'register');
    });
});

Route::middleware('auth')->group(function (){

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    // ROUTE FOR ORDER
    Route::controller(OrderController::class)->name('orders.')->group(function (){
        Route::post('/order', 'create_order')->name('store');
    });

});
