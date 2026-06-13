<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#004030',
                        secondary: '#2d6a4f',
                        accent: '#d1e7e0',
                        lightGreen: '#f0f7f4',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col font-sans selection:bg-emerald-200">

    {{-- NAVBAR ELEGANT --}}
    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200/50 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-lg shadow-emerald-200/50">
                    <i class="fas fa-recycle text-xl"></i>
                </div>
                <div class="leading-tight">
                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">
                        Greasy<span class="text-emerald-500">cle</span>
                    </h1>
                    <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-[0.2em] mt-0.5">Portal Pelanggan</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden md:flex flex-col items-end mr-2">
                    <span class="text-sm font-bold text-slate-800">{{ Auth::user()->nama }}</span>
                    <span class="text-[10px] text-slate-400 font-medium bg-slate-100 px-2 py-0.5 rounded-full mt-1 uppercase">{{ Auth::user()->role }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-red-50 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm">
                        <i class="fas fa-power-off"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    {{-- KONTEN DASHBOARD --}}
    <main class="max-w-7xl mx-auto px-6 lg:px-8 py-12 grow w-full">
        
        {{-- HEADER WELCOME CARD --}}
        <div class="relative bg-gradient-to-r from-emerald-800 via-[#004030] to-emerald-900 rounded-[2rem] p-8 md:p-12 mb-10 overflow-hidden shadow-xl shadow-emerald-900/20">
            <div class="absolute -right-20 -top-20 opacity-10">
                <i class="fas fa-leaf text-[250px] text-white"></i>
            </div>
            
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="text-white">
                    <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-2">Halo, {{ Auth::user()->nama }} 👋</h2>
                    <p class="text-emerald-100/80 text-sm md:text-base font-medium max-w-lg">
                        Setiap tetes limbah yang Anda kelola sangat berarti. Mari terus kumpulkan minyak jelantah Anda!
                    </p>
                </div>
                
                {{-- TOMBOL AKSI --}}
                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    {{-- Tombol Setor --}}
                    <a href="{{ route('pelanggan.setor') }}" class="px-6 py-4 rounded-2xl bg-white text-emerald-800 font-extrabold shadow-lg hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-plus"></i> Setor Minyak
                    </a>
                    {{-- Tombol Cetak PDF --}}
                    <a href="{{ route('pelanggan.cetak_pdf') }}" target="_blank" class="px-6 py-4 rounded-2xl bg-white/10 text-white font-bold border border-white/20 hover:bg-white/20 transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-file-pdf"></i> Cetak Rekap PDF
                    </a>
                </div>
            </div>
        </div>

        {{-- GRID STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
                <h3 class="text-slate-400 text-xs font-bold uppercase mb-2">Total Volume</h3>
                <h3 class="text-4xl font-extrabold text-slate-800">{{ $total_volume }} L</h3>
            </div>
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
                <h3 class="text-slate-400 text-xs font-bold uppercase mb-2">Total Saldo</h3>
                <h3 class="text-4xl font-extrabold text-slate-800">Rp {{ number_format($saldo, 0, ',', '.') }}</h3>
            </div>
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
                <h3 class="text-slate-400 text-xs font-bold uppercase mb-2">Status Kurir</h3>
                <h3 class="text-xl font-bold text-slate-800">{{ $status_aktif }}</h3>
            </div>
        </div>

        {{-- TABEL RIWAYAT --}}
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-100">
                <h2 class="font-bold text-lg text-slate-800">Riwayat Setoran</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase tracking-widest">
                        <tr>
                            <th class="p-5">ID</th>
                            <th class="p-5">Tanggal</th>
                            <th class="p-5">Volume</th>
                            <th class="p-5">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($transaksi as $row)
                        <tr>
                            <td class="p-5 font-bold">TRX-{{ $row->id }}</td>
                            <td class="p-5">{{ date('d M Y', strtotime($row->tgl_request)) }}</td>
                            <td class="p-5 font-bold">{{ $row->volume }} L</td>
                            <td class="p-5">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700">
                                    {{ ucfirst($row->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-10 text-center text-slate-400">Belum ada riwayat setoran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="mt-auto py-8 text-center text-slate-400 text-xs">
        &copy; 2026 Greasycle Indonesia.
    </footer>
</body>
</html>