<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-white text-slate-800 py-4 px-[8%] flex flex-col md:flex-row justify-between items-center shadow-sm border-b border-slate-100 sticky top-0 z-50">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-md shadow-emerald-100">
                <i class="fas fa-tint text-xl"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-slate-900">Greasycle<span class="text-emerald-500">.</span></h1>
                <p class="text-[10px] text-slate-400 font-medium tracking-wider uppercase -mt-1">Pelanggan Portal</p>
            </div>
        </div>
        
        <div class="flex flex-wrap items-center justify-center gap-6 text-sm font-semibold text-slate-600 mt-4 md:mt-0">
            <a href="{{ route('pelanggan.dashboard') }}" class="text-emerald-600 border-b-2 border-emerald-500 pb-1 flex items-center gap-2">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
            <a href="{{ route('pelanggan.setor') }}" class="hover:text-emerald-600 transition flex items-center gap-2">
                <i class="fas fa-shuttle-van"></i> Setor Minyak
            </a>
            <a href="/" class="text-blue-600 hover:text-blue-700 transition flex items-center gap-2 bg-blue-50 hover:bg-blue-100/70 px-3 py-1.5 rounded-lg border border-blue-100">
                <i class="fas fa-external-link-alt text-xs"></i> Halaman Publik
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6 py-10 grow w-full">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 border-b border-slate-100 pb-5 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">
                        Selamat Datang Kembali, <span class="text-emerald-600">{{ Auth::user()->nama }}</span>!
                    </h2>
                    <p class="text-slate-400 text-sm mt-0.5">Berikut adalah ringkasan aktivitas setoran minyak jelantah Anda.</p>
                </div>
                <a href="{{ route('pelanggan.setor') }}" class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-emerald-700 transition shadow-md shadow-emerald-100 flex items-center gap-2">
                    <i class="fas fa-plus text-xs"></i> Tambah Setoran Baru
                </a>
            </div>

            @if(session('sukses'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-2xl font-medium text-sm flex items-center gap-3">
                    <i class="fas fa-check-circle text-emerald-500 text-lg"></i>
                    <span>{{ session('sukses') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-gradient-to-br from-slate-700 to-slate-800 p-6 rounded-2xl text-white shadow-md shadow-slate-200 relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 text-white/10 text-7xl transform -rotate-12"><i class="fas fa-balance-scale"></i></div>
                    <p class="text-slate-200/70 text-xs font-bold uppercase tracking-wider mb-1">Total Volume Setor</p>
                    <h3 class="text-3xl font-extrabold">{{ $total_volume }} <span class="text-base font-normal text-slate-300">Liter</span></h3>
                </div>
                
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 p-6 rounded-2xl text-white shadow-md shadow-emerald-100 relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 text-white/10 text-7xl transform -rotate-12"><i class="fas fa-wallet"></i></div>
                    <p class="text-emerald-100/70 text-xs font-bold uppercase tracking-wider mb-1">Total Saldo Terkumpul</p>
                    <h3 class="text-3xl font-extrabold">Rp {{ number_format($saldo, 0, ',', '.') }}</h3>
                </div>
                
                <div class="bg-gradient-to-br from-slate-50 to-slate-100/70 p-6 rounded-2xl border border-slate-200/60 shadow-sm flex flex-col justify-center">
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Status Penjemputan</p>
                    <h3 class="text-lg font-bold mt-1 flex items-center gap-2.5 text-slate-800">
                        <span class="w-3 h-3 rounded-full {{ $status_aktif == 'Ada Penjemputan' ? 'bg-amber-500 animate-pulse' : 'bg-slate-300' }}"></span>
                        {{ $status_aktif }}
                    </h3>
                </div>
            </div>

            <div class="mb-6 flex flex-col md:flex-row gap-4 items-center bg-slate-50 p-4 rounded-2xl border border-slate-100">
                <div class="flex-1 w-full relative">
                    <i class="fas fa-search absolute left-4 top-3.5 text-slate-400 text-sm"></i>
                    <input type="text" id="pencarian" placeholder="Cari data berdasarkan ID transaksi atau nama wilayah kelurahan..." class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/10">
                </div>
                <div class="w-full md:w-auto">
                    <div class="flex gap-2">
                        <button onclick="filterTabel('semua', this)" class="btn-filter px-4 py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-bold shadow-sm transition">Semua</button>
                        <button onclick="filterTabel('menunggu', this)" class="btn-filter px-4 py-2.5 bg-white text-slate-500 border border-slate-200 rounded-xl text-xs font-bold transition">Menunggu</button>
                        <button onclick="filterTabel('dijemput', this)" class="btn-filter px-4 py-2.5 bg-white text-slate-500 border border-slate-200 rounded-xl text-xs font-bold transition">Dijemput</button>
                        <button onclick="filterTabel('selesai', this)" class="btn-filter px-4 py-2.5 bg-white text-slate-500 border border-slate-200 rounded-xl text-xs font-bold transition">Selesai</button>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto border border-slate-100 rounded-2xl">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/70 text-slate-400 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
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
                            <tr class="hover:bg-slate-50/50 transition row-transaksi" data-status="{{ $status_db }}" data-alamat="{{ strtolower($row->alamat_jemput ?? '') }}" data-id="#trx-{{ $row->id }}">
                                <td class="p-4 text-center font-medium text-slate-400">{{ $index + 1 }}</td>
                                <td class="p-4 font-mono font-bold text-slate-900">#TRX-{{ $row->id }}</td>
                                <td class="p-4 text-slate-500">{{ date('d M Y', strtotime($row->tgl_request)) }}</td>
                                <td class="p-4 font-bold text-slate-900">{{ $row->volume }} L</td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold border {{ $badge }} uppercase">
                                        {{ $row->status == 'menunggu' ? 'Aktif / Menunggu' : $row->status }}
                                    </span>
                                </td>
                                <td class="p-4 text-center font-semibold">
                                    <div class="flex justify-center gap-4">
                                        <a href="{{ route('pelanggan.show', $row->id) }}" class="text-emerald-600 hover:text-emerald-700 flex items-center gap-1"><i class="fas fa-eye text-xs"></i> Detail</a>
                                        @if($status_db == 'menunggu')
                                            <a href="{{ route('pelanggan.edit', $row->id) }}" class="text-amber-600 hover:text-amber-700 flex items-center gap-1"><i class="fas fa-edit text-xs"></i> Edit</a>
                                            <form action="{{ route('pelanggan.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan transaksi ini?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600 font-semibold flex items-center gap-1"><i class="fas fa-trash-alt text-xs"></i> Hapus</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="p-12 text-center text-slate-400 italic">Belum ada catatan riwayat penjemputan minyak jelantah.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <footer class="text-center py-8 text-gray-400 text-xs border-t border-gray-100 bg-white tracking-wide mt-auto">
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