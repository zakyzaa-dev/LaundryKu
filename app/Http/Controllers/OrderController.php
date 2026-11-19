<?php

namespace App\Http\Controllers;

use App\Enum\OrderStatus;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function hitungHarga(int $service_id, float $weight)
    {
        $service = Service::findOrFail($service_id);
        return $service->price_per_kg * $weight;
    }

    // Ubah parameter pertama dari Request menjadi array $validated
    public function order(array $validated, string $token)
    {
        $price = $this->hitungHarga($validated['service'], $validated['weight']);

        return Order::create([
            'customer_id' => Auth::id(),
            'service_id' => $validated['service'],
            'token' => $token,
            'weight' => $validated['weight'],
            'total_price' => $price,
            'status' => OrderStatus::Menunggu,
            'note' => $validated['note']
        ]);
    }

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
            'weight' => ['required', 'numeric', 'min:0', 'max:99'],
            'service' => ['required', 'numeric'],
            'note' => ['string', 'nullable']
        ]);

        // Simpan ke session agar bisa dipakai saat konfirmasi
        session([
            'weight' => $validated['weight'],
            'service' => $validated['service'],
            'note' => $validated['note']
        ]);

        $service = Service::find($validated['service']);
        $user = Auth::user();

        if (!$service){
            return back()->withErrors([
                'service' => 'Service tidak ditemukan!'
            ])->withInput();
        }

        $harga_total = $service->price_per_kg * $validated['weight'];
        $receiptDetail = [
            'nama' => $user->full_name,
            'alamat' => $user->address,
            'jenis_layanan' => $service->service_name,
            'harga' => $harga_total,
            'berat' => $validated['weight'],
        ];

        return back()->with('receiptDetail', $receiptDetail);
    }

    public function showToken(Request $req)
    {
        // Ambil data weight & service yang tersimpan di session
        $data = [
            'weight' => session('weight'),
            'service' => session('service'),
            'note' => session('note')
        ];

        if($req->session()->has('receiptDetail')){
            Session::reflash();
        }

        $token = $this->generateToken();

        // Kirim data session ke fungsi order
        $this->order($data, $token);

        return back()->with('token', $token);
    }

    public function lacak(Request $request)
    {
        $order = null;

        if ($request->filled('token')) {
            $order = Order::with(['customer', 'service'])
                ->where('token', trim($request->token))
                ->first();
        }

        return view('orders.lacak', compact('order'));
    }
}
