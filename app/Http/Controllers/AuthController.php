<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Sesuaikan dengan model pengguna

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard-admin');
        }

        return back()->withErrors(['username' => 'The provided credentials do not match our records.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
