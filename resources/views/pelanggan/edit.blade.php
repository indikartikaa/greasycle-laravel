<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Setoran - Greasycle</title>
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
                    fontFamily: { sans: ['Poppins', 'sans-serif'] }
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
                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">Greasy<span class="text-emerald-500">cle</span></h1>
                    <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-[0.2em] mt-0.5">Portal Pelanggan</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('pelanggan.dashboard') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 hover:bg-emerald-500 hover:text-white transition-all font-bold text-sm">Dashboard</a>
            </div>
        </div>
    </nav>

    {{-- KONTEN EDIT --}}
    <main class="max-w-4xl mx-auto px-6 py-12 grow w-full">
        <div class="bg-white p-8 md:p-10 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden">
            
            <div class="mb-10 relative z-10">
                <a href="{{ route('pelanggan.dashboard') }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 text-sm font-bold mb-4 bg-emerald-50 px-3 py-1.5 rounded-lg w-fit">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Edit Data #TRX-{{ $data->id }}</h2>
                <p class="text-slate-500 text-sm font-medium mt-2">Perbarui informasi estimasi volume atau lokasi penjemputan.</p>
            </div>

            @if ($errors->any())
                <div class="mb-8 p-5 bg-red-50 border border-red-200 text-red-800 rounded-2xl font-bold text-sm">
                    Mohon periksa kembali form Anda.
                </div>
            @endif

            <form action="{{ route('pelanggan.update', $data->id) }}" method="POST" onsubmit="gabungkanAlamat()" class="space-y-8">
                @csrf
                @method('PUT') 
                <input type="hidden" name="alamat_jemput" id="alamat_jemput_asli" value="{{ old('alamat_jemput', $data->alamat_jemput) }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2">Volume (Liter) <span class="text-red-500">*</span></label>
                        <input type="number" name="volume" step="0.1" value="{{ old('volume', $data->volume) }}" class="w-full p-3 bg-white border border-slate-200 rounded-xl text-sm font-bold focus:ring-4 focus:ring-emerald-500/10" required>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2">Status Saat Ini</label>
                        <input type="text" value="{{ strtoupper($data->status) }}" class="w-full p-3 bg-slate-100 border border-slate-200 rounded-xl text-sm font-bold text-slate-400 cursor-not-allowed" readonly>
                    </div>
                </div>

                {{-- WILAYAH --}}
                <div class="bg-emerald-50/50 p-6 md:p-8 rounded-2xl border border-emerald-100 space-y-6">
                    <h3 class="text-sm font-bold text-emerald-800 uppercase tracking-widest border-b border-emerald-200 pb-3">Lokasi Penjemputan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <select id="region" class="p-3 bg-white border border-slate-200 rounded-xl text-sm font-bold" required onchange="filterKecamatan()">
                            <option value="">-- Pilih Wilayah --</option>
                            <option value="Surabaya Pusat">Surabaya Pusat</option>
                            <option value="Surabaya Barat">Surabaya Barat</option>
                            <option value="Surabaya Timur">Surabaya Timur</option>
                            <option value="Surabaya Utara">Surabaya Utara</option>
                            <option value="Surabaya Selatan">Surabaya Selatan</option>
                        </select>
                        <select id="kecamatan" class="p-3 bg-white border border-slate-200 rounded-xl text-sm font-bold" required disabled onchange="filterKelurahan()"></select>
                        <select id="kelurahan" class="p-3 bg-white border border-slate-200 rounded-xl text-sm font-bold" required disabled></select>
                    </div>
                    <textarea id="jalan" rows="3" class="w-full p-4 bg-white border border-slate-200 rounded-xl text-sm font-medium focus:ring-4 focus:ring-emerald-500/10" required placeholder="Detail alamat..."></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-600 to-teal-600 text-white py-4 rounded-xl font-extrabold hover:shadow-lg transition-all">Simpan Perubahan</button>
                    <a href="{{ route('pelanggan.dashboard') }}" class="px-8 py-4 bg-slate-100 text-slate-600 rounded-xl font-bold transition-all hover:bg-slate-200">Batal</a>
                </div>
            </form>
        </div>
    </main>

    {{-- Script Parsing Alamat Otomatis --}}
    <script>
        // (Sama dengan script di setor.blade.php tadi, ditambah fungsi parsing otomatis)
        const wilayahSurabaya = { /* ... sama seperti setor ... */ };
        
        // FUNGSI AUTO-FILL SAAT HALAMAN DIBUKA
        window.addEventListener('DOMContentLoaded', () => {
            const alamatLama = document.getElementById('alamat_jemput_asli').value;
            // ... (logika split dan fill otomatis seperti yang kamu buat tadi) ...
        });
        
        // ... (fungsi filterKecamatan, filterKelurahan, gabungkanAlamat sama) ...
    </script>
</body>
</html>