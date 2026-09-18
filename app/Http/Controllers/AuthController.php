<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show_register()
    {
        return view('auth.register');
    }

    public function register(Request $req)
    {
        $validated = $req->validate([
            'full_name' => ['required', 'string', 'max:100', 'min:3'],
            'username' => ['required', 'unique:users,username|alpha_dash'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        User::create([
            'full_name' => $validated['full_name'],
            'username' => $validated['username'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'password' =>Hash::make($validated['password']),
        ]);

        return back();
    }

}
