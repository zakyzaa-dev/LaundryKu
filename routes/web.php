<?php

use App\Http\Controllers\dashboard\CustomerController;
use App\Http\Controllers\dashboard\PesananController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ROUTE FOR PAGES
Route::controller(PageController::class)->name('pages.')->group(function () {
    route::get('/', 'index')->name('home');
});


// ROUTE FOR GUEST
Route::middleware('guest')->group(function (){
    Route::controller(LoginController::class)->group(function (){
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'login');
    });

    Route::controller(RegisterController::class)->group(function (){
        Route::get('/register', 'create')->name('auth.register');
        Route::post('/register', 'register');
    });
});

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout')->middleware('auth');

// ROUTE FOR Order
Route::controller(OrderController::class)->name('orders.')->group(function (){
    Route::get('/order', 'create')->name('create');
    Route::post('/order/receipt-generate', 'showReceipt')->name('receipt');
    Route::post('/order/token-generate', 'showToken')->name('token');
});


Route::controller(DashboardController::class)->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/admin/dashboard', 'index')->name('dashboard');
});

// ROUTE CUCIAN DASHBOARD
Route::controller(PesananController::class)->middleware(['auth', 'admin'])->name('pesanan.')->group(function () {
    Route::get('/admin/pesanan/masuk', 'baru')->name('baru');
    Route::get('/admin/pesanan/selesai', 'selesai')->name('selesai');
    Route::get('/admin/pesanan/menunggu', 'menunggu')->name('menunggu');

    // update status
    Route::patch('admin/pesanan/{pesanan:id}/status', 'updateStatus')->name('updateStatus');
});

Route::controller(ServiceController::class)->middleware(['auth', 'admin'])->name('layanan.')->group(function () {
    Route::get('/admin/layanan', 'index')->name('index');
});

Route::controller(CustomerController::class)->middleware(['auth', 'admin'])->name('customer.')->group(function () {
    Route::get('/admin/customer', 'index')->name('index');
    Route::get('/admin/customer/create', 'create')->name('create');
});
