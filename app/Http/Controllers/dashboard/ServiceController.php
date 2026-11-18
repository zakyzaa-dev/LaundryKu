<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('dashboard.layanan.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.layanan.create');
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'service_name' => ['required', 'string', 'max:30'],
            'slug'         => ['required', 'string', 'max:40', 'unique:services,slug'],
            'description'  => ['required', 'string'],
            'price_per_kg' => ['required', 'decimal:0,2', 'min:0', 'max:99999999.99'],
            'duration'     => ['required', 'string', 'max:50'],
        ]);


        $newService = Service::create($validated);

        return redirect()->route('layanan.index')->with('success', 'Berhasil menambahkan layanan baru: ' . $newService->service_name);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Berhasil menghapus layanan: ' . $service->service_name);
    }
}
