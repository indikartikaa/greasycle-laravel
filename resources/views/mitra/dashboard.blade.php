<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mitra - Greasycle</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">

<div class="flex min-h-screen">

    @include('mitra.sidebar')

    <main class="md:ml-64 flex-1 p-8 pt-16 md:pt-8">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-gray-500 text-sm">Selamat datang, {{ Auth::user()->nama }} 👋</p>
            </div>
            <p class="text-gray-400 text-sm">{{ now()->locale('id')->translatedFormat('d M Y') }}</p>
        </div>

        {{-- 1. KOTAK STATISTIK DINAMIS --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">Tugas Aktif</p>
                <h3 class="text-3xl font-bold text-orange-500">{{ $tugasAktif }}</h3>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">Selesai</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $selesai }}</h3>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">Total Liter</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($totalLiter, 2, ',', '.') }}</h3>
            </div>
            <div class="bg-[#1a5c38] rounded-xl p-6 shadow-sm">
                <p class="text-xs text-green-200 font-medium uppercase tracking-wide mb-1">Status</p>
                <h3 class="text-2xl font-bold text-white">AKTIF</h3>
            </div>
        </div>

        {{-- 2. DAFTAR PERMINTAAN DINAMIS --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="font-bold text-gray-800">Permintaan Penjemputan Baru</h2>
            </div>
            <div class="p-6 space-y-4">
                @forelse ($permintaan as $item)
                    <div class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $item->pelanggan->nama ?? 'Tanpa Nama' }}</p>
                            <p class="text-sm text-gray-500 flex items-center gap-1 mt-1">
                                <i class="fas fa-map-marker-alt text-[#1a5c38] text-xs"></i> 
                                {{ $item->pelanggan->alamat ?? 'Alamat tidak tersedia' }}
                            </p>
                            <p class="text-sm font-bold text-[#1a5c38] mt-1">{{ $item->volume }} L</p>
                        </div>
                        
                        {{-- Tombol Ambil Tugas dengan Form --}}
                        <form action="{{ url('mitra/ambil-tugas/' . $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-[#1a5c38] hover:bg-green-900 text-white px-5 py-2 rounded-lg text-sm font-bold transition">
                                Ambil Tugas
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="text-center py-6 text-gray-400">
                        <i class="fas fa-inbox text-3xl mb-2 opacity-50"></i>
                        <p>Belum ada permintaan penjemputan baru saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- 3. TABEL RIWAYAT DINAMIS --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="font-bold text-gray-800">Riwayat Terakhir</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase border-b border-gray-100">
                            <th class="px-6 py-3 font-medium">Pelanggan</th>
                            <th class="px-6 py-3 font-medium">Vol</th>
                            <th class="px-6 py-3 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @forelse ($riwayat as $item)
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $item->transaksi->pelanggan->nama ?? 'Tanpa Nama' }}</td>
                                <td class="px-6 py-4">{{ $item->volume_aktual }} L</td>
                                <td class="px-6 py-4"><span class="text-green-500 font-semibold">{{ strtoupper($item->status) }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-gray-400">
                                    Belum ada riwayat penjemputan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

</body>
</html>