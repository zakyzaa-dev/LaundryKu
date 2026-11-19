<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'username' => ['string', 'required', 'unique:users,username'],
            'phone' => ['numeric', 'required'],
            'password' => ['string', 'required']
        ]);

        $newUser = User::create($validated);

        return redirect()->route('customer.index')->with('success', 'Berhasil menambahkan customer baru: ' . $newUser->full_name);
    }

    public function destroy(User $customer)
    {
        $customer->delete();

        return back()->with('success', 'Berhasil menghapus customer: ' . $customer->full_name);
    }

    public function edit(User $customer)
    {
        return view('dashboard.customer.edit', compact('customer'));
    }

    public function update(User $customer, Request $req)
    {
        $validated = $req->validate([
            'full_name' => ['string', 'required'],
            'address' => ['string', 'required'],
            'username' => ['string', 'required', 'unique:users,username,' . $customer->id],
            'phone' => ['numeric', 'required'],
            'password' => ['string', 'nullable', 'min:8']
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $customer->update($validated);

        return redirect()->route('customer.index')->with('success', 'Berhasil mengupdate customer: ' . $customer->full_name);
    }
}
