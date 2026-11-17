<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function selesai()
    {
        $pesanans = Order::with('service', 'customer')->where('status', OrderStatus::Selesai)->latest()->get();

        return view('dashboard.pesanan.pesanan-selesai', compact('pesanans'));
    }

    public function baru()
    {
        $pesanans = Order::with('service', 'customer')
            ->where('status', OrderStatus::Diterima)
            ->orWhere('status', OrderStatus::Diproses)
            ->latest()
            ->get();

        return view('dashboard.pesanan.pesanan-baru', compact('pesanans'));
    }
}
