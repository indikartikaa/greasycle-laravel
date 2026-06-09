<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use App\Models\Penjemputan;

class MitraController extends Controller
{
    public function dashboard()
    {
        $mitraId = Auth::id();

        $tugasAktif = Transaksi::where('mitra_id', $mitraId)
            ->where('status', 'diambil')->count();

        $selesai = Penjemputan::where('mitra_id', $mitraId)
            ->where('status', 'selesai')->count();

        $totalLiter = Penjemputan::where('mitra_id', $mitraId)
            ->where('status', 'selesai')->sum('volume_aktual');

        $permintaan = Transaksi::with('pelanggan')
            ->whereNull('mitra_id')
            ->where('status', 'pending')
            ->latest()->get();

        $riwayat = Penjemputan::with('transaksi.pelanggan')
            ->where('mitra_id', $mitraId)
            ->where('status', 'selesai')
            ->latest()->take(5)->get();

        return view('mitra.dashboard', compact(
            'tugasAktif', 'selesai', 'totalLiter', 'permintaan', 'riwayat'
        ));
    }

    public function tugas()
    {
        $tugas = Transaksi::with('pelanggan')
            ->where('mitra_id', Auth::id())
            ->where('status', 'diambil')
            ->latest()->get();

        return view('mitra.tugas', compact('tugas'));
    }

    public function ambilTugas($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'mitra_id' => Auth::id(),
            'status' => 'diambil'
        ]);

        return redirect()->route('mitra.tugas')->with('success', 'Tugas berhasil diambil!');
    }

    public function validasi(Request $request, $id)
    {
        $request->validate(['volume_aktual' => 'required|numeric|min:0']);

        Penjemputan::updateOrCreate(
            ['transaksi_id' => $id],
            [
                'mitra_id' => Auth::id(),
                'volume_aktual' => $request->volume_aktual,
                'tanggal_jemput' => now(),
                'status' => 'validasi',
                'catatan_mitra' => $request->catatan_mitra ?? null,
            ]
        );

        return redirect()->route('mitra.tugas')->with('success', 'Volume berhasil divalidasi!');
    }

    public function selesai($id)
    {
        Transaksi::findOrFail($id)->update(['status' => 'selesai']);
        Penjemputan::where('transaksi_id', $id)->update(['status' => 'selesai']);

        return redirect()->route('mitra.riwayat')->with('success', 'Tugas selesai!');
    }

    public function batalkan($id)
    {
        Transaksi::findOrFail($id)->update(['mitra_id' => null, 'status' => 'pending']);
        Penjemputan::where('transaksi_id', $id)->delete();

        return redirect()->route('mitra.tugas')->with('success', 'Tugas dibatalkan.');
    }

    public function riwayat()
    {
        $riwayat = Penjemputan::with('transaksi.pelanggan')
            ->where('mitra_id', Auth::id())
            ->where('status', 'selesai')
            ->latest()->get();

        return view('mitra.riwayat', compact('riwayat'));
    }
}