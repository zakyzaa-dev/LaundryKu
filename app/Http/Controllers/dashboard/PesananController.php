<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class PesananController extends Controller
{
    public function selesai()
    {
        $pesanans = Order::with('service', 'customer')->where('status', OrderStatus::Selesai->value)->latest()->get();

        return view('dashboard.pesanan.pesanan-selesai', compact('pesanans'));
    }

    public function menunggu()
    {
        $pesanans = Order::with('service', 'customer')->where('status', OrderStatus::Menunggu->value)->latest()->get();
        return view('dashboard.pesanan.pesanan-menunggu', compact('pesanans'));
    }

    public function baru()
    {
        $pesanans = Order::with('service', 'customer')
            ->where('status', OrderStatus::Diterima->value)
            ->orWhere('status', OrderStatus::Diproses->value)
            ->latest()
            ->get();

        return view('dashboard.pesanan.pesanan-baru', compact('pesanans'));
    }

    public function updateStatus(Order $pesanan, Request $req)
    {
        $validated = $req->validate([
            'status' => ['required', new Enum(OrderStatus::class)]
        ]);

        $pesanan->update([
            'status' => $validated['status']
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui menjadi: ' . OrderStatus::from($validated['status'])->label());
    }
}
