<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Setoran - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-[#005a36] text-white py-4 px-[8%] flex justify-between items-center shadow-md">
        <div class="flex items-center gap-3">
            <i class="fas fa-graduation-cap text-2xl"></i>
            <h1 class="text-xl font-bold tracking-wide">Sistem Informasi Pelanggan (Greasycle)</h1>
        </div>
        <div class="flex items-center gap-6 text-sm font-semibold">
            <a href="{{ route('pelanggan.dashboard') }}" class="hover:text-gray-200 transition">Dashboard</a>
            <a href="{{ route('pelanggan.setor') }}" class="hover:text-gray-200 transition">Setor Minyak</a>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-6 py-10">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
            
            <div class="mb-6">
                <a href="{{ route('pelanggan.dashboard') }}" class="text-[#008f5d] hover:underline text-sm font-semibold"><-- Kembali ke daftar</a>
                <h2 class="text-2xl font-bold text-gray-900 mt-2">Ubah Data Setoran #TRX-{{ $data->id }}</h2>
                <p class="text-gray-500 text-sm">Perbarui informasi estimasi volume atau lokasi penjemputan minyak jelantah Anda.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl font-medium text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pelanggan.transaksi.update', $data->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Estimasi Volume (Liter) <span class="text-red-500">*</span></label>
                        <input type="number" name="volume" step="0.1" min="0.1" value="{{ old('volume', $data->volume) }}" placeholder="0.00" class="w-full p-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#005a36]" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Status Transaksi Saat Ini</label>
                        <input type="text" value="{{ $data->status }}" class="w-full p-2.5 bg-gray-100 border border-gray-200 rounded-lg text-sm text-gray-500 uppercase font-semibold outline-none cursor-not-allowed" readonly>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Alamat Lengkap Penjemputan <span class="text-red-500">*</span></label>
                    <textarea name="alamat_jemput" rows="4" placeholder="Tuliskan jalan, nomor rumah, RT/RW, dan kelurahan..." class="w-full p-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#005a36]" required>{{ old('alamat_jemput', $data->alamat_jemput) }}</textarea>
                </div>

                <div class="flex gap-3 border-t pt-5">
                    <button type="submit" class="bg-[#008f5d] text-white px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-[#005a36] transition shadow-sm">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('pelanggan.dashboard') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-300 transition text-center">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

   <footer class="text-center py-8 text-gray-400 text-xs border-t border-gray-100 mt-12 bg-white tracking-wide">
        &copy; 2026 Greasycle — Pemrograman Website {{ Auth::user()->nama }} | Built with Laravel & Tailwind CSS
    </footer>

</body>
</html>