<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Str;

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

    public function generateToken() : string
    {
        $prefix = 'LNY';
        $year = date('Y');
        $randomString = strtoupper(Str::random(11));
        return "{$prefix}-{$year}-{$randomString}";
    }

    public function create()
    {
        $customers = User::where('role', 'pelanggan')->latest()->get();
        $services = Service::all();
        $token = $this->generateToken();
        return view('dashboard.pesanan.create', compact('customers', 'services', 'token'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => ['required', 'exists:users,id'],
            'service_id'  => ['required', 'exists:services,id'],
            'token'       => ['required', 'string', 'max:20'],
            'weight'      => ['required', 'decimal:0,2', 'min:0', 'max:99.99'],
            'total_price' => ['required', 'decimal:0,2', 'min:0', 'max:99999999.99'],
            'note'        => ['nullable', 'string'],
        ]);


        $newOrder = Order::create($validated);

        return redirect()->route('pesanan.baru')->with('success', 'Berhasil menambahkan orderan baru: ' . $newOrder->token);
    }
}
