<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user]);
            return redirect('/home');
        } else {
            return back()->with('error', 'Username atau password salah!');
        }
    }

    public function dashboard()
    {
        if (!session('user')) {
            return redirect('/login');
        }
        return "Selamat datang, " . session('user')->name;
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}
