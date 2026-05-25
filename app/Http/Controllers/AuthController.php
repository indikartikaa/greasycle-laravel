<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // PROSES MASUK AKUN (LOGIN)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Cek role user yang login
            if (Auth::user()->role === 'pelanggan') {
                return redirect()->route('pelanggan.dashboard');
            }
            
            // Tambahkan redirect role lain jika ada (misal admin/mitra)
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Kombinasi email atau password salah!',
        ])->withInput($request->only('email'));
    }

    // PROSES DAFTAR AKUN BARU (REGISTER)
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
            'password' => Hash::make($request->password), // Password aman terenkripsi Bcrypt
            'role' => $request->role,
        ]);

        return redirect('/')->with('sukses', 'Pendaftaran berhasil! Silakan masuk ke akun Anda.');
    }

    // PROSES KELUAR AKUN (LOGOUT)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}