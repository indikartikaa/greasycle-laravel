<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $role = trim(strtolower(Auth::user()->role));

        if ($role === 'pelanggan') return redirect()->route('pelanggan.dashboard');
        if ($role === 'mitra') return redirect()->route('mitra.dashboard');

        return redirect('/');
    }

    return back()->withErrors(['login_error' => 'Email atau password salah!'])->onlyInput('email');
}

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:pelanggan,usaha,mitra'
        ]);

        User::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => $request->role,
        ]);

        return redirect('/')->with('sukses', 'Pendaftaran berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function showLogin()
{
    if (Auth::check()) {
        $role = trim(strtolower(Auth::user()->role));
        if ($role === 'mitra') return redirect()->route('mitra.dashboard');
        if ($role === 'pelanggan') return redirect()->route('pelanggan.dashboard');
    }
    return redirect('/');
}
}