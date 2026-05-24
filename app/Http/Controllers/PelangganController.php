<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    // 1. TAMPILAN DASHBOARD (Fungsi ini yang tadi dilaporkan hilang/undefined)
    public function dashboard()
    {
        $user = Auth::user(); 

        // Hitung total volume dari transaksi yang selesai
        $total_volume = Transaksi::where('user_id', $user->id)
            ->where('status', 'selesai')
            ->sum('volume') ?? 0;

        // Hitung saldo digital (Volume x 5000)
        $saldo = $total_volume * 5000;

        // Cek apakah ada penjemputan yang sedang aktif
        $has_aktif = Transaksi::where('user_id', $user->id)
            ->where('status', '!=', 'selesai')
            ->exists();
            
        $status_aktif = $has_aktif ? "Ada Penjemputan" : "Tidak Ada Penjemputan";

        // Ambil semua riwayat transaksi milik user ini
        $transaksi = Transaksi::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('pelanggan.dashboard', compact('user', 'total_volume', 'saldo', 'status_aktif', 'transaksi'));
    }

    // 2. TAMPILAN FORM SETOR MINYAK
    public function create()
    {
        return view('pelanggan.transaksi');
    }

    // 3. PROSES SIMPAN SETORAN
    public function store(Request $request)
    {
        $request->validate([
            'volume' => 'required|numeric|min:0.1',
            'alamat_jemput' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        Transaksi::create([
            'user_id' => Auth::id(),
            'volume' => $request->volume,
            'alamat_jemput' => $request->alamat_jemput,
            'catatan' => $request->catatan,
            'tgl_request' => now()->toDateString(),
            'status' => 'menunggu'
        ]);

        return redirect()->route('pelanggan.dashboard')->with('sukses', 'Berhasil! Setoran minyak telah dicatat. Tim Greasycle akan segera menuju lokasi.');
    }

    // 4. TAMPILAN DETAIL SETORAN
    public function show($id)
    {
        $data = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('pelanggan.detail', compact('data'));
    }

    // 5. TAMPILAN EDIT SETORAN
    public function edit($id)
    {
        $data = Transaksi::where('id', $id)->where('user_id', Auth::id())->where('status', 'menunggu')->firstOrFail();
        return view('pelanggan.edit', compact('data'));
    }

    // 6. PROSES UPDATE SETORAN
    public function update(Request $request, $id)
    {
        $request->validate([
            'volume' => 'required|numeric|min:0.1',
            'alamat_jemput' => 'required|string',
        ]);

        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->where('status', 'menunggu')->firstOrFail();
        
        $transaksi->update([
            'volume' => $request->volume,
            'alamat_jemput' => $request->alamat_jemput,
        ]);

        return redirect()->route('pelanggan.dashboard')->with('sukses', 'Perubahan setoran berhasil disimpan.');
    }

    // 7. PROSES HAPUS SETORAN
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->where('status', 'menunggu')->firstOrFail();
        $transaksi->delete();

        return redirect()->route('pelanggan.dashboard')->with('sukses', 'Setoran berhasil dihapus.');
    }
}