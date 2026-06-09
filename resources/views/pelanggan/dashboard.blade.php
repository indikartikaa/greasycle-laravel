<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700&display=swap" rel="stylesheet">
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
                    }
                }
            }
        }
    </script>
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200/60 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 h-16 flex items-center justify-between">
            
            {{-- Logo --}}
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-recycle text-base"></i>
                </div>
                <div class="leading-tight">
                    <h1 class="text-xl font-extrabold tracking-tight text-slate-900">
                        Greasy<span class="text-emerald-500">cle</span>
                    </h1>
                    <p class="text-[10px] text-slate-400 font-medium uppercase tracking-[0.15em]">
                        Pelanggan Portal
                    </p>
                </div>
            </div>

            {{-- Menu Navigasi Samping Atas --}}
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('pelanggan.dashboard') }}"
                   class="px-4 py-2.5 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-100 font-semibold flex items-center gap-2 text-xs md:text-sm">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                <a href="/"
                   class="px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-semibold transition-all duration-300 flex items-center gap-2 text-xs md:text-sm">
                    <i class="fas fa-globe"></i> Halaman Publik
                </a>
            </div>
        </div>
    </nav>

    {{-- KONTEN DASHBOARD --}}
    <div class="max-w-6xl mx-auto px-6 py-10 grow w-full">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            
           <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 bg-white border border-slate-200 p-5 rounded-2xl gap-4 shadow-2xs">
    <div class="leading-tight">
        {{-- Baris ATAS: Selamat datang kembali + Nama User --}}
        <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">
            Selamat datang kembali, {{ Auth::user()->nama }} ✨
        </h2>
        {{-- Baris BAWAH: Kalimat ringkasan dengan huruf kecil rapi --}}
        <span class="text-slate-500 text-xs font-semibold tracking-wide block mt-1.5">
            Berikut adalah ringkasan data setoran Anda.
        </span>
    </div>
                <a href="{{ route('pelanggan.setor') }}"
                   class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2 text-xs md:text-sm">
                    <i class="fas fa-plus-circle"></i> Setor Minyak
                </a>
            </div>

            @if(session('sukses'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-2xl font-medium text-sm flex items-center gap-3">
                    <i class="fas fa-check-circle text-emerald-500 text-lg"></i>
                    <span>{{ session('sukses') }}</span>
                </div>
            @endif

            {{-- KARTU STATISTIK RAMPING PROPORSIONAL --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 mb-8">
                <div class="lg:col-span-4 bg-gradient-to-br from-[#002e21] to-[#014030] rounded-2xl p-5 text-white shadow-sm relative overflow-hidden">
                    <div class="absolute right-0 bottom-0 text-white/[0.03] text-[80px] translate-x-2 translate-y-2 pointer-events-none">
                        <i class="fas fa-oil-can"></i>
                    </div>
                    <div class="relative z-10">
                        <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center mb-4 border border-white/10">
                            <i class="fas fa-droplet text-emerald-300 text-sm"></i>
                        </div>
                        <p class="text-emerald-200/60 text-[10px] uppercase tracking-[0.15em] font-bold">Total Volume</p>
                        <h3 class="text-2xl font-bold mt-1.5 leading-none">{{ $total_volume }} <span class="text-xs font-normal opacity-60">L</span></h3>
                        <p class="text-emerald-200/50 text-[11px] mt-2 font-medium">Liter minyak terkumpul</p>
                    </div>
                </div>

                <div class="lg:col-span-5 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl p-5 text-white shadow-sm relative overflow-hidden">
                    <div class="absolute right-0 bottom-0 text-white/[0.06] text-[90px] translate-x-2 translate-y-2 pointer-events-none">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="relative z-10">
                        <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center mb-4 border border-white/25">
                            <i class="fas fa-money-bill-wave text-sm text-emerald-100"></i>
                        </div>
                        <p class="text-white/70 text-[10px] uppercase tracking-[0.15em] font-bold">Total Saldo</p>
                        <h3 class="text-2xl font-bold mt-1.5 leading-none">Rp {{ number_format($saldo, 0, ',', '.') }}</h3>
                        <p class="text-white/80 text-[11px] mt-2 font-medium">Hasil penukaran minyak jelantah</p>
                    </div>
                </div>

              <div class="lg:col-span-3 bg-white rounded-2xl border border-slate-200 p-5 shadow-xs flex flex-col justify-between">
    <div>
        <div class="flex justify-between items-center mb-4">
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.15em]">Status Terkini</p>
            {{-- Warna ikon pelengkap disesuaikan menjadi abu-abu netral --}}
            <i class="fas fa-truck text-slate-400 text-sm"></i>
        </div>
        <div class="flex items-center gap-2 mt-2">
            {{-- Dot Indikator Dinamis: Hijau menyala jika ada penjemputan, abu-abu jika kosong --}}
            <span class="w-2.5 h-2.5 rounded-full {{ $status_aktif == 'Ada Penjemputan' ? 'bg-emerald-500 animate-pulse' : 'bg-slate-300' }}"></span>
            <h3 class="font-bold text-slate-800 text-base tracking-tight">{{ $status_aktif }}</h3>
        </div>
    </div>
    {{-- Keterangan tambahan di bagian bawah kartu agar sejajar rapi dengan card lainnya --}}
    <p class="text-slate-400 text-[11px] mt-4 font-medium">Pantau armada penjemputan Anda.</p>
</div>
            </div>

            {{-- PROGRESS BAR TARGET --}}
            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 mb-8">
                <div class="flex justify-between items-center mb-2 text-xs">
                    <div>
                        <h4 class="font-bold text-gray-800 text-xs">Target Kontribusi Bulanan</h4>
                        <p class="text-slate-400 text-[11px] mt-0.5">Target minimal partisipasi hijau 20 liter per bulan.</p>
                    </div>
                    <span class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-0.5 rounded-lg border border-emerald-100">
                        {{ $total_volume }}/20 Liter
                    </span>
                </div>
                <div class="w-full bg-slate-200 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-500 to-green-600 h-3 rounded-full transition-all duration-500"
                         style="width: {{ min(($total_volume / 20) * 100, 100) }}%">
                    </div>
                </div>
            </div>

            {{-- SEARCH ENGINE BAR --}}
            <div class="mb-6 flex flex-col md:flex-row gap-4 items-center bg-slate-50 p-4 rounded-2xl border border-slate-100">
                <div class="flex-1 w-full relative">
                    <i class="fas fa-search absolute left-4 top-3.5 text-slate-400 text-sm"></i>
                    <input type="text" id="pencarian" placeholder="Cari data berdasarkan ID transaksi atau nama wilayah kelurahan..." class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/10">
                </div>
                <div class="w-full md:w-auto overflow-x-auto">
                    <div class="flex gap-2">
                        <button onclick="filterTabel('semua', this)" class="btn-filter px-4 py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-bold shadow-sm transition">Semua</button>
                        <button onclick="filterTabel('menunggu', this)" class="btn-filter px-4 py-2.5 bg-white text-slate-500 border border-slate-200 rounded-xl text-xs font-bold transition">Menunggu</button>
                        <button onclick="filterTabel('dijemput', this)" class="btn-filter px-4 py-2.5 bg-white text-slate-500 border border-slate-200 rounded-xl text-xs font-bold transition">Dijemput</button>
                        <button onclick="filterTabel('selesai', this)" class="btn-filter px-4 py-2.5 bg-white text-slate-500 border border-slate-200 rounded-xl text-xs font-bold transition">Selesai</button>
                    </div>
                </div>
            </div>

            {{-- TABEL DATA RIWAYAT ASLI --}}
            <div class="overflow-x-auto border border-slate-100 rounded-2xl shadow-xs bg-white">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100/80 text-slate-700 text-xs uppercase font-bold tracking-wider border-b-2 border-emerald-500/20">
                            <th class="p-4 text-center w-12">No</th>
                            <th class="p-4">ID Transaksi</th>
                            <th class="p-4">Tanggal Pengajuan</th>
                            <th class="p-4">Volume</th>
                            <th class="p-4">Status Transaksi</th>
                            <th class="p-4 text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
                        @forelse($transaksi as $index => $row)
                            @php
                                $status_db = strtolower($row->status);
                                if ($status_db == 'selesai') {
                                    $badge = 'bg-emerald-50 text-emerald-700 border-emerald-100';
                                } elseif ($status_db == 'dijemput') {
                                    $badge = 'bg-blue-50 text-blue-700 border-blue-100';
                                } else {
                                    $badge = 'bg-amber-50 text-amber-700 border-amber-100';
                                }
                            @endphp
                            <tr class="hover:bg-slate-50/50 transition duration-150 row-transaksi" data-status="{{ $status_db }}" data-alamat="{{ strtolower($row->alamat_jemput ?? '') }}" data-id="#trx-{{ $row->id }}">
                                <td class="p-4 text-center font-medium text-slate-400">{{ $index + 1 }}</td>
                                <td class="p-4 font-mono font-bold text-slate-900">#TRX-{{ $row->id }}</td>
                                <td class="p-4 text-slate-500">{{ date('d M Y', strtotime($row->tgl_request)) }}</td>
                                <td class="p-4 font-bold text-slate-900">{{ $row->volume }} L</td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold border {{ $badge }} uppercase tracking-wide">
                                        {{ $row->status == 'menunggu' ? 'Aktif / Menunggu' : $row->status }}
                                    </span>
                                </td>
                                <td class="p-4 text-center font-semibold">
                                    {{-- REVISI ROUTE: Menyesuaikan nama alias route lengkap sesuai file web.php kamu --}}
                                    <div class="flex justify-center gap-4">
                                        <a href="{{ route('pelanggan.transaksi.show', $row->id) }}" class="text-emerald-600 hover:text-emerald-700 flex items-center gap-1 transition"><i class="fas fa-eye text-xs"></i> Detail</a>
                                        @if($status_db == 'menunggu')
                                            <a href="{{ route('pelanggan.transaksi.edit', $row->id) }}" class="text-amber-600 hover:text-amber-700 flex items-center gap-1 transition"><i class="fas fa-edit text-xs"></i> Edit</a>
                                            <form action="{{ route('pelanggan.transaksi.destroy', $row->id) }}" method="POST" class="inline m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data setoran ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600 font-semibold flex items-center gap-1 transition cursor-pointer bg-transparent border-none p-0"><i class="fas fa-trash-alt text-xs"></i> Hapus</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-16 text-center text-slate-400 font-medium">
                                    <div class="text-5xl mb-3">♻️</div>
                                    <h4 class="text-lg font-bold text-slate-700">Belum Ada Setoran</h4>
                                    <p class="text-xs text-slate-400 mt-1">Mulai setor minyak jelantah pertama Anda dan kumpulkan saldo digital.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <footer class="text-center py-8 text-gray-400 text-xs border-t border-gray-100 bg-white tracking-wide mt-auto font-medium">
        &copy; 2026 Greasycle — Pemrograman Website {{ Auth::user()->nama }} | Built with Laravel & Tailwind CSS
    </footer>

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

            const allButtons = document.querySelectorAll('.btn-filter');
            allButtons.forEach(b => {
                b.classList.remove('bg-emerald-600', 'text-white', 'shadow-sm');
                b.classList.add('bg-white', 'text-slate-500', 'border-slate-200');
            });

            btn.classList.remove('bg-white', 'text-slate-500', 'border-slate-200');
            btn.classList.add('bg-emerald-600', 'text-white', 'shadow-sm');
        }

        document.getElementById('pencarian').addEventListener('input', function() {
            const input = this.value.toLowerCase();
            const rows = document.querySelectorAll('.row-transaksi');

            rows.forEach(row => {
                const alamat = row.getAttribute('data-alamat') || '';
                const id = row.getAttribute('data-id') || '';
                if (alamat.includes(input) || id.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>