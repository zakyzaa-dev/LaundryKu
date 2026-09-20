<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('orders.pesan', compact('services'));
    }

    public function generateToken() : string
    {
        $prefix = 'LNY';
        $year = date('Y');
        $randomString = strtoupper(Str::random(11));
        return "{$prefix}-{$year}-{$randomString}";
    }

    public function showReceipt(Request $req)
    {
        $validated = $req->validate([
            'weight' => ['required','numeric', 'min:0', 'max:99'],
            'service' => ['required', 'numeric']
        ]);

        $service = Service::find($validated['service']);
        $user = Auth::user();
        $token = $this->generateToken();

        if (!$service){
            return back()->withErrors([
                'service' => 'Service tidak ditemukan!'
            ])->withInput();
        }

        $harga_total = $service->price_per_kg * $validated['weight'];
        $receiptDetail = [
            'nama' => $user->full_name,
            'alamat' => $user->address,
            'token' => $token,
            'jenis_layanan' => $service->service_name,
            'harga' => $harga_total,
            'berat' => $validated['weight'],
        ];

        return back()->with('receiptDetail', $receiptDetail);
    }
}
