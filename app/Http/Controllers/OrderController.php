<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('orders.pesan', compact('services'));
    }
}
