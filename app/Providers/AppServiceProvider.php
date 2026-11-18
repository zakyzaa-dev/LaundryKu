<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        View::share([
            'cucianTunggu' => Order::where('status', 'Menunggu')->count(),
            'cucianMasuk' => Order::where('status', 'Diterima')->orWhere('status', 'Diproses')->count(),
            'cucianSelesai' => Order::where('status', 'Selesai')->count(),
        ]);
    }
}
