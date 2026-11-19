<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('index', compact('services'));
    }

    public function aboutUs()
    {
        return view('about-us');
    }
}
