<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'pelanggan')->latest()->get();
        // $customers = User::all();
        return view('dashboard.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('dashboard.customer.create');
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'full_name' => ['string', 'required'],
            'address' => ['string', 'required'],
            'username' => ['string', 'required'],
            'phone' => ['numeric', 'required'],
            'password' => ['string', 'required']
        ]);

        $newUser = User::create($validated);

        return redirect()->route('customer.index')->with('success', 'Berhasil menambahkan customer baru: ' . $newUser->full_name);
    }
}
