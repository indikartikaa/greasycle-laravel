<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Setoran - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-white text-slate-800 py-4 px-[8%] flex flex-col md:flex-row justify-between items-center shadow-sm border-b border-slate-100 sticky top-0 z-50">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-linear-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-md shadow-emerald-100">
                <i class="fas fa-tint text-xl"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-slate-900">Greasycle<span class="text-emerald-500">.</span></h1>
                <p class="text-[10px] text-slate-400 font-medium tracking-wider uppercase -mt-1">Pelanggan Portal</p>
            </div>
        </div>
        
        <div class="flex flex-wrap items-center justify-center gap-6 text-sm font-semibold text-slate-600 mt-4 md:mt-0">
            <a href="{{ route('pelanggan.dashboard') }}" class="hover:text-emerald-600 transition flex items-center gap-2">
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

    <div class="max-w-3xl mx-auto px-6 py-10 w-full">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            
            <div class="mb-5">
                <a href="{{ route('pelanggan.dashboard') }}" class="text-emerald-600 hover:underline text-sm font-semibold flex items-center gap-1.5">
                    <i class="fas fa-chevron-left text-xs"></i> Kembali ke Dashboard
                </a>
            </div>

            <div class="flex items-center gap-5 border-b border-slate-100 pb-6 mb-6">
                <div class="w-20 h-20 bg-linear-to-br from-emerald-50 to-teal-50 rounded-2xl border border-emerald-100 flex items-center justify-center text-emerald-600 shadow-sm">
                    <i class="fas fa-tint text-3xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">ID Transaksi #TRX-{{ $data->id }}</h2>
                    <p class="text-slate-400 text-sm font-medium">Pemilik Akun: {{ Auth::user()->nama }}</p>
                    <span class="mt-2 inline-block px-2.5 py-0.5 bg-slate-100 text-slate-700 text-xs font-bold uppercase rounded-md border border-slate-200">
                        {{ $data->status }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5 gap-x-8 text-sm">
                <div>
                    <p class="text-slate-400 font-bold uppercase text-xs tracking-wider">Volume Masuk</p>
                    <p class="font-extrabold text-xl text-emerald-600 mt-0.5">{{ $data->volume }} Liter</p>
                </div>
                <div>
                    <p class="text-slate-400 font-bold uppercase text-xs tracking-wider">Tanggal Pengajuan</p>
                    <p class="font-semibold text-slate-800 text-base mt-0.5">{{ date('d F Y', strtotime($data->tgl_request)) }}</p>
                </div>
                <div class="md:col-span-2 border-t border-slate-100 pt-4">
                    <p class="text-slate-400 font-bold uppercase text-xs tracking-wider">Alamat Tujuan Penjemputan</p>
                    <p class="font-medium mt-1 text-slate-800 leading-relaxed">
                        <i class="fas fa-map-marker-alt text-emerald-500 mr-1.5"></i> {{ $data->alamat_jemput }}
                    </p>
                </div>
                <div class="md:col-span-2 border-t border-slate-100 pt-4">
                    <p class="text-slate-400 font-bold uppercase text-xs tracking-wider">Catatan Lapangan</p>
                    <p class="font-medium mt-1 text-slate-600 italic">{{ $data->catatan ?: '-' }}</p>
                </div>
            </div>

            <div class="flex gap-3 border-t border-slate-100 pt-6 mt-8">
                @if(strtolower($data->status) == 'menunggu')
                    <a href="{{ route('pelanggan.transaksi.edit', $data->id) }}" class="bg-amber-500 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-amber-600 transition shadow-sm">
                        Ubah Data
                    </a>
                    <form action="{{ route('pelanggan.transaksi.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data transaksi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-red-600 transition shadow-sm">
                            Hapus Request
                        </button>
                    </form>
                @endif
                <a href="{{ route('pelanggan.dashboard') }}" class="bg-slate-100 text-slate-600 px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-200 transition ml-auto">
                    Kembali
                </a>
            </div>

        </div>
    </div>

    <footer class="text-center py-8 text-gray-400 text-xs border-t border-gray-100 bg-white tracking-wide mt-auto">
        &copy; 2026 Greasycle — Pemrograman Website {{ Auth::user()->nama }} | Built with Laravel & Tailwind CSS
    </footer>

</body>
</html>