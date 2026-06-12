<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Setoran - Greasycle</title>
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

    {{-- NAVBAR ELEGANT (Konsisten dengan halaman lain) --}}
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
                <a href="{{ route('pelanggan.dashboard') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 hover:bg-emerald-500 hover:text-white hover:shadow-md transition-all font-bold text-sm flex items-center gap-2">
                    <i class="fas fa-chart-line"></i> <span class="hidden sm:inline">Dashboard</span>
                </a>
            </div>
        </div>
    </nav>

    {{-- KONTEN DETAIL --}}
    <main class="max-w-3xl mx-auto px-6 py-12 grow w-full">
        
        <div class="bg-white p-8 md:p-10 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden">
            
            {{-- Aksen Dekorasi --}}
            <div class="absolute -right-10 -top-10 opacity-5 pointer-events-none">
                <i class="fas fa-file-invoice text-[200px] text-emerald-800"></i>
            </div>

            {{-- HEADER TITLE --}}
            <div class="mb-8 relative z-10">
                <a href="{{ route('pelanggan.dashboard') }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 text-sm font-bold transition-all mb-4 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg w-fit">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mt-2 gap-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight flex items-center gap-3">
                            Detail Setoran
                        </h2>
                        <p class="text-slate-400 font-medium text-sm mt-1">Informasi lengkap mengenai permintaan penjemputan limbah Anda.</p>
                    </div>
                    
                    {{-- Badge Status Dinamis --}}
                    @php
                        $status_db = strtolower($data->status);
                        if ($status_db == 'selesai') {
                            $badge = 'bg-emerald-100 text-emerald-700 border-emerald-200';
                            $icon = 'fa-check-circle';
                        } elseif ($status_db == 'dijemput') {
                            $badge = 'bg-blue-100 text-blue-700 border-blue-200';
                            $icon = 'fa-truck-fast';
                        } else {
                            $badge = 'bg-amber-100 text-amber-700 border-amber-200';
                            $icon = 'fa-clock';
                        }
                    @endphp
                    <div class="px-4 py-2 rounded-xl border {{ $badge }} font-bold text-sm shadow-sm flex items-center gap-2 uppercase tracking-wide">
                        <i class="fas {{ $icon }}"></i> {{ $data->status == 'menunggu' ? 'Menunggu' : $data->status }}
                    </div>
                </div>
            </div>

            {{-- KARTU INFORMASI UTAMA --}}
            <div class="bg-gradient-to-br from-slate-50 to-white border border-slate-200 rounded-2xl p-6 md:p-8 relative z-10 mb-8 shadow-sm">
                
                <div class="flex items-center gap-5 border-b border-slate-200/60 pb-6 mb-6">
                    <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-400 shadow-inner">
                        <i class="fas fa-hashtag text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.2em] mb-1">ID Transaksi</p>
                        <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">TRX-{{ $data->id }}</h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-6">
                    <div>
                        <p class="text-slate-400 font-bold uppercase text-[11px] tracking-wider flex items-center gap-1.5 mb-1.5"><i class="fas fa-flask text-emerald-500"></i> Estimasi Volume</p>
                        <p class="font-extrabold text-2xl text-slate-800">{{ $data->volume }} <span class="text-sm text-slate-400 font-medium">Liter</span></p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-bold uppercase text-[11px] tracking-wider flex items-center gap-1.5 mb-1.5"><i class="fas fa-calendar-alt text-emerald-500"></i> Tanggal Pengajuan</p>
                        <p class="font-bold text-lg text-slate-800">{{ date('d F Y', strtotime($data->tgl_request)) }}</p>
                    </div>
                    
                    <div class="md:col-span-2 p-4 bg-white rounded-xl border border-slate-100">
                        <p class="text-slate-400 font-bold uppercase text-[11px] tracking-wider flex items-center gap-1.5 mb-2"><i class="fas fa-map-location-dot text-emerald-500"></i> Alamat Penjemputan</p>
                        <p class="font-semibold text-slate-700 leading-relaxed text-sm">{{ $data->alamat_jemput }}</p>
                    </div>

                    <div class="md:col-span-2 p-4 bg-amber-50/50 rounded-xl border border-amber-100/50">
                        <p class="text-amber-600/70 font-bold uppercase text-[11px] tracking-wider flex items-center gap-1.5 mb-2"><i class="fas fa-sticky-note"></i> Catatan Khusus</p>
                        <p class="font-medium text-amber-900 text-sm italic">{{ $data->catatan ?: 'Tidak ada catatan tambahan untuk kurir.' }}</p>
                    </div>
                </div>
            </div>

            {{-- ACTION BUTTONS (Dengan route yang sudah diperbaiki) --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-slate-100">
                @if($status_db == 'menunggu')
                    <a href="{{ route('pelanggan.edit', $data->id) }}" class="flex-1 bg-amber-500 text-white px-6 py-3.5 rounded-xl text-sm font-bold hover:bg-amber-600 hover:shadow-lg hover:shadow-amber-500/20 transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-pen"></i> Ubah Detail
                    </a>
                    <form action="{{ route('pelanggan.hapus', $data->id) }}" method="POST" class="flex-1 m-0" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan dan menghapus data penjemputan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-50 text-red-600 px-6 py-3.5 rounded-xl text-sm font-bold hover:bg-red-500 hover:text-white transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-trash-alt"></i> Batalkan Penjemputan
                        </button>
                    </form>
                @endif
                <a href="{{ route('pelanggan.dashboard') }}" class="sm:w-1/4 bg-slate-100 text-slate-600 px-6 py-3.5 rounded-xl text-sm font-bold hover:bg-slate-200 transition-all flex items-center justify-center gap-2 ml-auto">
                    Kembali
                </a>
            </div>

        </div>
    </main>

    {{-- FOOTER SIMPLE --}}
    <footer class="mt-auto py-8 text-center border-t border-slate-200/60 bg-white/50 backdrop-blur-sm">
        <p class="text-slate-400 text-xs font-medium tracking-wide">
            &copy; 2026 <span class="font-bold text-slate-500">Greasycle Indonesia</span>. System by Masyito Indi Kartika.
        </p>
    </footer>

</body>
</html>