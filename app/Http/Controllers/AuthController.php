<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            'username' => ['required', 'unique:users,username', 'alpha_dash'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
            'role_id' => ['required', 'numeric']
        ]);

        $user = User::create([
            'full_name' => $validated['full_name'],
            'role_id' => $validated['role_id'],
            'username' => $validated['username'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        // return redirect()->route('auth.login')->with('success_register', 'Berhasil membuat akun! silahkan login');
        return redirect()->route('pages.home');
    }

    public function show_login()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $credential = $req->only('username', 'password');

        if (Auth::attempt([$credential])){
            $req->session()->regenerate();

            return redirect(route('pages.home'));
        }

    }

}
