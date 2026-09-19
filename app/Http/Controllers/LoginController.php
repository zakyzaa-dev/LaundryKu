<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $credentials = $req->only('username', 'password');
        if (Auth::attempt($credentials)){
            $req->session()->regenerate();

            $user = Auth::user();

            /** @var User $user */
            if($user->is_admin()){
                return redirect()->intended(route('admin.dashboa'));
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah!',
        ])->onlyInput('username');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('pages.home');
    }
}
