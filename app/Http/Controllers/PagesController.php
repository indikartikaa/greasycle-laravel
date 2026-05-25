<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Tampilan Beranda Utama (index.blade.php)
    public function index() 
    { 
        return view('index'); 
    }

    // Tampilan Halaman Tentang Kami (about.blade.php)
    public function about() 
    { 
        return view('about'); 
    }

    // Tampilan Halaman Kontak (contact.blade.php)
    public function contact() 
    { 
        return view('contact'); 
    }

    // Tampilan Halaman Portofolio Proyek (portofolio.blade.php)
    public function portofolio() 
    { 
        return view('portofolio'); 
    }
    
    // Proses Kirim Form Kontak & Saran
    public function sendContact(Request $request) 
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // Sementara di-return back dengan flash message sukses
        return back()->with('sukses', 'Terima kasih, masukan Anda berhasil terkirim!');
    }

    // =========================================================================
    // REVISI: TAMBAHAN FUNGSI PROFILE TIM FOUNDERS GREASYCLE
    // =========================================================================

    // Tampilan Halaman Profil Elvina 
    public function profileElvina()
    {
        return view('profile_elvina');
    }

    // Tampilan Halaman Profil Zahlul
    public function profileZahlul()
    {
        return view('profile_zahlul');
    }

    // Tampilan Halaman Profil Indi 
    public function profileIndi()
    {
        return view('profile_indi');
    }
}