<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PelangganController extends Controller
{
    // 1. TAMPILAN DASHBOARD PELANGGAN
    public function dashboard()
    {
        $user = Auth::user(); 

        // Hitung total volume dari transaksi yang selesai
        $total_volume = Transaksi::where('user_id', $user->id)
            ->where('status', 'selesai')
            ->sum('volume') ?? 0;

        // Hitung saldo digital (Volume x 5000)
        $saldo = $total_volume * 5000;

        // Cek apakah ada penjemputan yang sedang aktif (belum selesai)
        $has_aktif = Transaksi::where('user_id', $user->id)
            ->where('status', '!=', 'selesai')
            ->exists();
            
        $status_aktif = $has_aktif ? "Ada Penjemputan" : "Tidak Ada Penjemputan";

        // Ambil semua riwayat transaksi milik user ini
        $transaksi = Transaksi::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();

        // ==========================================
        // TAMBAHAN PERBAIKAN UNTUK VARIABEL UI BARU
        // ==========================================
        
        // 1. Hitung total seluruh transaksi (menunggu + dijemput + selesai)
        $total_transaksi = $transaksi->count();

        // 2. Hitung dampak lingkungan (Misal: 1 Liter jelantah menghemat ~2.5 Kg CO2)
        $co2 = $total_volume * 2.5;

        // 3. Hitung persentase target bulanan (Batas max 100% dari target 20 Liter)
        $target_bulanan = 20;
        $persentase_target = $target_bulanan > 0 ? min(($total_volume / $target_bulanan) * 100, 100) : 0;

        // Kirimkan semua variabel lama dan baru ke view Blade
        return view('pelanggan.dashboard', compact(
            'user', 
            'total_volume', 
            'saldo', 
            'status_aktif', 
            'transaksi',
            'total_transaksi',
            'co2',
            'persentase_target'
        ));
    }

    // 2. TAMPILAN FORM SETOR MINYAK
    public function create()
    {
        return view('pelanggan.transaksi');
    }

    // 3. PROSES SIMPAN SETORAN BARU
    public function store(Request $request)
    {
        $request->validate([
            'volume' => 'required|numeric|min:0.1',
            'alamat_jemput' => 'required|string',
            'catatan' => 'nullable|string|max:255',
        ]);

        Transaksi::create([
            'user_id' => Auth::id(),
            'volume' => $request->volume,
            'alamat_jemput' => $request->alamat_jemput,
            'catatan' => $request->catatan,
            'tgl_request' => now()->toDateString(),
            'status' => 'menunggu' // Status awal saat mendaftar
        ]);

        return redirect()->route('pelanggan.dashboard')->with('sukses', 'Berhasil! Setoran minyak telah dicatat. Tim Greasycle akan segera menuju lokasi.');
    }

    // 4. TAMPILAN DETAIL SETORAN
    public function show($id)
    {
        $data = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('pelanggan.detail', compact('data'));
    }

    // 5. TAMPILAN EDIT FORM SETORAN
    public function edit($id)
    {
        $data = Transaksi::where('id', $id)->where('user_id', Auth::id())->where('status', 'menunggu')->firstOrFail();
        return view('pelanggan.edit', compact('data'));
    }

    // 6. PROSES UPDATE PERUBAHAN DATA SETORAN
    public function update(Request $request, $id)
    {
        $request->validate([
            'volume' => 'required|numeric|min:0.1',
            'alamat_jemput' => 'required|string',
            'catatan' => 'nullable|string|max:255',
        ]);

        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->where('status', 'menunggu')->firstOrFail();
        
        $transaksi->update([
            'volume' => $request->volume,
            'alamat_jemput' => $request->alamat_jemput,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('pelanggan.dashboard')->with('sukses', 'Perubahan data setoran berhasil disimpan.');
    }

    // 7. PROSES HAPUS / BATALKAN SETORAN
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->where('status', 'menunggu')->firstOrFail();
        $transaksi->delete();

        return redirect()->route('pelanggan.dashboard')->with('sukses', 'Setoran berhasil dihapus.');
    }

    public function cetakPdf()
    {
        $userId = Auth::id();
        
        // Ambil bulan dan tahun saat ini
        $bulanSekarang = Carbon::now()->month;
        $tahunSekarang = Carbon::now()->year;

        // Ambil data transaksi khusus bulan ini
        $transaksi = Transaksi::where('user_id', $userId)
            ->whereMonth('tgl_request', $bulanSekarang)
            ->whereYear('tgl_request', $tahunSekarang)
            ->orderBy('tgl_request', 'asc')
            ->get();

        // Hitung total volume dan saldo bulan ini
        $totalVolume = $transaksi->where('status', 'selesai')->sum('volume');
        $totalSaldo = $totalVolume * 5000; // Asumsi harga per liter Rp 5.000

        $data = [
            'transaksi' => $transaksi,
            'total_volume' => $totalVolume,
            'total_saldo' => $totalSaldo,
            'bulan' => Carbon::now()->locale('id')->translatedFormat('F Y'),
            'user' => Auth::user()
        ];

        // Buat file PDF dari view 'pelanggan.pdf' (akan kita buat selanjutnya)
        $pdf = Pdf::loadView('pelanggan.pdf', $data);

        // Langsung download file PDF-nya
        return $pdf->download('Rekap_Greasycle_' . Auth::user()->nama . '_' . date('M_Y') . '.pdf');
    }
}