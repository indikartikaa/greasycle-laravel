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

            // Role pelanggan dan usaha diarahkan ke dashboard pelanggan
            if ($role === 'pelanggan' || $role === 'usaha') {
                return redirect()->route('pelanggan.dashboard');
            }
            if ($role === 'mitra') {
                return redirect()->route('mitra.dashboard');
            }

            return redirect('/');
        }

        return back()->withErrors(['login_error' => 'Email atau password salah!'])->onlyInput('email');
    }

    public function register(Request $request)
    {
        // Validasi data input, termasuk field baru
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string', // Alamat sekarang wajib
            'role' => 'required|in:pelanggan,usaha,mitra',
            'nama_usaha' => 'nullable|string|max:150|required_if:role,usaha', // Wajib jika role usaha
            'dokumen_mitra' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048|required_if:role,mitra' // Wajib jika role mitra
        ]);

        // Siapkan array data dasar
        $userData = [
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'password' => $request->password, 
            'alamat' => $request->alamat,
            'role' => $request->role,
        ];

        // Tambahkan nama usaha jika role adalah usaha
        if ($request->role === 'usaha') {
            $userData['nama_usaha'] = $request->nama_usaha;
        }

        // Tangani upload dokumen jika role adalah mitra
        if ($request->role === 'mitra' && $request->hasFile('dokumen_mitra')) {
            // Menyimpan file ke folder storage/app/public/dokumen_mitra
            $path = $request->file('dokumen_mitra')->store('dokumen_mitra', 'public');
            $userData['dokumen_mitra'] = $path;
        }

        // Simpan ke database
        User::create($userData);

        return redirect('/')->with('sukses', 'Pendaftaran berhasil! Silakan masuk.');
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
            if ($role === 'pelanggan' || $role === 'usaha') return redirect()->route('pelanggan.dashboard');
        }
        return redirect('/');
    }
}