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
        $customers = User::where('role', 'pelanggan')->get();
        // $customers = User::all();
        return view('dashboard.customer.index', compact('customers'));
    }
}
