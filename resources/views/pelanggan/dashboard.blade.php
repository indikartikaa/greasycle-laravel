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
            
            {{-- Logo --}}
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-lg shadow-emerald-200/50">
                    <i class="fas fa-recycle text-xl"></i>
                </div>
                <div class="leading-tight">
                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">
                        Greasy<span class="text-emerald-500">cle</span>
                    </h1>
                    <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-[0.2em] mt-0.5">
                        Portal Pelanggan
                    </p>
                </div>
            </div>

            {{-- Menu Navigasi --}}
            <div class="flex items-center gap-4">
                <div class="hidden md:flex flex-col items-end mr-2">
                    <span class="text-sm font-bold text-slate-800">{{ Auth::user()->nama }}</span>
                    <span class="text-[10px] text-slate-400 font-medium bg-slate-100 px-2 py-0.5 rounded-full mt-1 uppercase">{{ Auth::user()->role }}</span>
                </div>
                <a href="/" class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-slate-100 bg-white text-slate-500 hover:text-emerald-600 hover:border-emerald-100 hover:bg-emerald-50 transition-all" title="Halaman Publik">
                    <i class="fas fa-home"></i>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-red-50 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm" title="Keluar (Logout)">
                        <i class="fas fa-power-off"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    {{-- KONTEN DASHBOARD --}}
    <main class="max-w-7xl mx-auto px-6 lg:px-8 py-12 grow w-full">
        
        {{-- HEADER WELCOME CARD --}}
        <div class="relative bg-gradient-to-r from-emerald-800 via-[#004030] to-emerald-900 rounded-[2rem] p-8 md:p-12 mb-10 overflow-hidden shadow-xl shadow-emerald-900/20 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            {{-- Background Pattern --}}
            <div class="absolute -right-20 -top-20 opacity-10">
                <i class="fas fa-leaf text-[250px] text-white"></i>
            </div>
            <div class="relative z-10 text-white">
                <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-2">
                    Halo, <span class="text-emerald-300">{{ Auth::user()->nama }}</span> 👋
                </h2>
                <p class="text-emerald-100/80 text-sm md:text-base font-medium max-w-lg leading-relaxed">
                    Setiap tetes limbah yang Anda kelola sangat berarti. Mari terus kumpulkan minyak jelantah Anda dan tukarkan menjadi saldo digital!
                </p>
            </div>
            <div class="relative z-10 w-full md:w-auto">
                <a href="{{ route('pelanggan.setor') }}" class="group w-full md:w-auto px-8 py-4 rounded-2xl bg-white text-emerald-800 font-extrabold shadow-[0_8px_30px_rgb(0,0,0,0.12)] hover:shadow-[0_8px_30px_rgba(16,185,129,0.3)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3 text-sm md:text-base">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-plus"></i>
                    </div>
                    Setor Minyak Sekarang
                </a>
            </div>
        </div>

        @if(session('sukses'))
            <div class="mb-10 p-5 bg-emerald-50/80 backdrop-blur-sm border border-emerald-200/60 text-emerald-800 rounded-2xl font-bold text-sm flex items-center gap-4 shadow-sm animate-pulse">
                <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white shrink-0">
                    <i class="fas fa-check"></i>
                </div>
                <span>{{ session('sukses') }}</span>
            </div>
        @endif

        {{-- GRID STATISTIK MODERN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            
            {{-- Card Volume --}}
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-flask"></i>
                    </div>
                    <span class="bg-slate-100 text-slate-500 text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">Total Volume</span>
                </div>
                <div>
                    <h3 class="text-4xl font-extrabold text-slate-800 tracking-tight">{{ $total_volume }}<span class="text-xl text-slate-400 font-medium ml-1">L</span></h3>
                    <p class="text-slate-500 text-sm mt-2 font-medium">Limbah disalurkan</p>
                </div>
            </div>

            {{-- Card Saldo --}}
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-50 flex items-center justify-center text-2xl group-hover:bg-amber-400 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <span class="bg-slate-100 text-slate-500 text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">Total Saldo</span>
                </div>
                <div>
                    <h3 class="text-4xl font-extrabold text-slate-800 tracking-tight"><span class="text-2xl text-slate-400 mr-1 font-medium">Rp</span>{{ number_format($saldo, 0, ',', '.') }}</h3>
                    <p class="text-slate-500 text-sm mt-2 font-medium">Pendapatan terkumpul</p>
                </div>
            </div>

            {{-- Card Status --}}
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-14 h-14 rounded-2xl {{ $status_aktif == 'Ada Penjemputan' ? 'bg-blue-50 text-blue-500 animate-bounce' : 'bg-slate-50 text-slate-400' }} flex items-center justify-center text-2xl transition-colors duration-300">
                            <i class="fas fa-truck-fast"></i>
                        </div>
                        <span class="bg-slate-100 text-slate-500 text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">Status Kurir</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">{{ $status_aktif }}</h3>
                </div>
                
                {{-- Progress Bar Mini --}}
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <div class="flex justify-between text-[11px] font-bold text-slate-500 mb-2">
                        <span>Target Kontribusi (Bulan ini)</span>
                        <span class="text-emerald-600">{{ $total_volume }}/20 L</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-emerald-400 to-emerald-600 h-2 rounded-full" style="width: {{ min(($total_volume / 20) * 100, 100) }}%"></div>
                    </div>
                </div>
            </div>

        </div>

        {{-- BAGIAN FILTER & TABEL RIWAYAT --}}
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            
            {{-- Toolbar Pencarian & Filter --}}
            <div class="p-6 md:p-8 border-b border-slate-100 flex flex-col md:flex-row gap-6 items-center justify-between bg-slate-50/50">
                <div class="w-full md:w-96 relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" id="pencarian" placeholder="Cari ID transaksi..." class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-medium focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all shadow-sm">
                </div>
                
                <div class="flex gap-2 w-full md:w-auto overflow-x-auto pb-2 md:pb-0 hide-scrollbar">
                    <button onclick="filterTabel('semua', this)" class="btn-filter shrink-0 px-5 py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-bold shadow-md shadow-emerald-600/20 transition-all">Semua</button>
                    <button onclick="filterTabel('menunggu', this)" class="btn-filter shrink-0 px-5 py-2.5 bg-white text-slate-500 hover:bg-slate-100 border border-slate-200 rounded-xl text-xs font-bold transition-all">Menunggu</button>
                    <button onclick="filterTabel('dijemput', this)" class="btn-filter shrink-0 px-5 py-2.5 bg-white text-slate-500 hover:bg-slate-100 border border-slate-200 rounded-xl text-xs font-bold transition-all">Dijemput</button>
                    <button onclick="filterTabel('selesai', this)" class="btn-filter shrink-0 px-5 py-2.5 bg-white text-slate-500 hover:bg-slate-100 border border-slate-200 rounded-xl text-xs font-bold transition-all">Selesai</button>
                </div>
            </div>

            {{-- Tabel Data --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white text-slate-400 text-[11px] uppercase font-bold tracking-widest border-b border-slate-100">
                            <th class="p-5 text-center w-16">No</th>
                            <th class="p-5">ID Setoran</th>
                            <th class="p-5">Tanggal</th>
                            <th class="p-5">Volume</th>
                            <th class="p-5">Status</th>
                            <th class="p-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-slate-700 divide-y divide-slate-50">
                        @forelse($transaksi as $index => $row)
                            @php
                                $status_db = strtolower($row->status);
                                
                                // Penyesuaian Logika Status & Warna
                                if ($status_db == 'selesai') {
                                    $badge = 'bg-emerald-50 text-emerald-600 border-emerald-100';
                                    $icon = 'fa-check-circle';
                                    $text_status = 'Selesai';
                                    $filter_status = 'selesai';
                                } elseif ($status_db == 'diambil' || $status_db == 'dijemput') {
                                    // Berubah menjadi warna Kuning saat diambil mitra
                                    $badge = 'bg-yellow-100 text-yellow-600 border-yellow-200 shadow-sm';
                                    $icon = 'fa-truck-fast';
                                    $text_status = 'Dijemput';
                                    $filter_status = 'dijemput'; // Menyesuaikan dengan tombol filter JS
                                } else {
                                    $badge = 'bg-orange-50 text-orange-600 border-orange-100';
                                    $icon = 'fa-clock';
                                    $text_status = 'Menunggu';
                                    $filter_status = 'menunggu';
                                }
                            @endphp
                            
                            {{-- Perhatikan data-status menggunakan $filter_status agar filter JS berfungsi --}}
                            <tr class="hover:bg-slate-50/80 transition duration-200 row-transaksi group" data-status="{{ $filter_status }}" data-alamat="{{ strtolower($row->alamat_jemput ?? '') }}" data-id="#trx-{{ $row->id }}">
                                <td class="p-5 text-center font-medium text-slate-400 group-hover:text-emerald-500 transition-colors">{{ $index + 1 }}</td>
                                <td class="p-5 font-bold text-slate-800">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500 text-xs">
                                            <i class="fas fa-hashtag"></i>
                                        </div>
                                        TRX-{{ $row->id }}
                                    </div>
                                </td>
                                <td class="p-5 text-slate-500 font-medium">{{ date('d M Y', strtotime($row->tgl_request)) }}</td>
                                <td class="p-5 font-extrabold text-slate-800">{{ $row->volume }} <span class="text-slate-400 font-medium text-xs">Liter</span></td>
                                <td class="p-5">
                                    {{-- Menampilkan badge dinamis --}}
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold border {{ $badge }} uppercase tracking-wide">
                                        <i class="fas {{ $icon }}"></i> {{ $text_status }}
                                    </span>
                                </td>
                                <td class="p-5 text-center">
                                    <div class="flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <a href="{{ route('pelanggan.detail', $row->id) }}" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 hover:bg-emerald-500 hover:text-white flex items-center justify-center transition-colors shadow-sm" title="Lihat Detail">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        @if($status_db == 'menunggu')
                                            <a href="{{ route('pelanggan.edit', $row->id) }}" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 hover:bg-amber-500 hover:text-white flex items-center justify-center transition-colors shadow-sm" title="Edit Data">
                                                <i class="fas fa-pen text-sm"></i>
                                            </a>
                                            <form action="{{ route('pelanggan.hapus', $row->id) }}" method="POST" class="m-0" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan setoran ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 hover:bg-red-500 hover:text-white flex items-center justify-center transition-colors shadow-sm cursor-pointer" title="Batalkan/Hapus">
                                                    <i class="fas fa-trash-alt text-sm"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-20 text-center">
                                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-sm">
                                        <i class="fas fa-box-open text-4xl text-slate-300"></i>
                                    </div>
                                    <h4 class="text-lg font-bold text-slate-700">Belum Ada Riwayat Setoran</h4>
                                    <p class="text-sm text-slate-500 mt-2 max-w-sm mx-auto leading-relaxed">Anda belum pernah mengajukan penjemputan limbah. Mulai setor sekarang dan selamatkan lingkungan!</p>
                                    <a href="{{ route('pelanggan.setor') }}" class="inline-block mt-6 px-6 py-3 bg-emerald-100 text-emerald-700 font-bold rounded-xl hover:bg-emerald-200 transition-colors">
                                        Ajukan Penjemputan
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    {{-- FOOTER SIMPLE --}}
    <footer class="mt-auto py-8 text-center border-t border-slate-200/60 bg-white/50 backdrop-blur-sm">
        <p class="text-slate-400 text-xs font-medium tracking-wide">
            &copy; 2026 <span class="font-bold text-slate-500">Greasycle Indonesia</span>. System by Masyito Indi Kartika.
        </p>
    </footer>

    {{-- STYLE TAMBAHAN UNTUK SCROLLBAR --}}
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <script>
        function filterTabel(kategori, btn) {
            const rows = document.querySelectorAll('.row-transaksi');
            rows.forEach(row => {
                const statusRow = row.getAttribute('data-status');
                if (kategori === 'semua' || statusRow === kategori) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            });

            // Update styling button filter
            const allButtons = document.querySelectorAll('.btn-filter');
            allButtons.forEach(b => {
                b.className = 'btn-filter shrink-0 px-5 py-2.5 bg-white text-slate-500 hover:bg-slate-100 border border-slate-200 rounded-xl text-xs font-bold transition-all';
            });
            btn.className = 'btn-filter shrink-0 px-5 py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-bold shadow-md shadow-emerald-600/20 transition-all';
        }

        document.getElementById('pencarian').addEventListener('input', function() {
            const input = this.value.toLowerCase();
            const rows = document.querySelectorAll('.row-transaksi');

            rows.forEach(row => {
                const id = row.getAttribute('data-id') || '';
                if (id.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>