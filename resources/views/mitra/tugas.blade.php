<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Penjemputan - Greasycle</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
<div class="flex min-h-screen">
    @include('mitra.sidebar')
    <main class="md:ml-64 flex-1 p-8 pt-16 md:pt-8">

        @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Tugas Aktif</h1>
                <p class="text-gray-500 text-sm">Kelola tugas yang sedang berjalan</p>
            </div>
            <p class="text-gray-400 text-sm">{{ now()->locale('id')->translatedFormat('d M Y') }}</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase border-b border-gray-100">
                            <th class="px-6 py-4 font-medium">Aksi</th>
                            <th class="px-6 py-4 font-medium">Pelanggan</th>
                            <th class="px-6 py-4 font-medium">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @forelse($tugas as $item)
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-2 w-36">
                                    <button onclick="openModal({{ $item->id }}, {{ $item->volume }})"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg text-xs font-bold transition flex items-center justify-center gap-2">
                                        <i class="fas fa-check-circle"></i> Validasi
                                    </button>
                                    <form action="{{ route('mitra.selesai', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full bg-[#1a5c38] hover:bg-green-900 text-white px-4 py-2 rounded-lg text-xs font-bold transition flex items-center justify-center gap-2">
                                            <i class="fas fa-check"></i> Selesai
                                        </button>
                                    </form>
                                    <form action="{{ route('mitra.batalkan', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-red-500 hover:text-red-700 text-xs font-semibold transition text-center">
                                            Batalkan
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-800">{{ $item->pelanggan->nama }}</td>
                            <td class="px-6 py-4">
                                <p class="text-gray-500 text-xs">{{ $item->alamat_jemput }}</p>
                                <p class="font-bold text-[#1a5c38] mt-1">{{ number_format($item->volume, 2) }} L</p>
                                @if($item->catatan)
                                <p class="text-xs text-gray-400 mt-1">{{ $item->catatan }}</p>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-gray-400">Tidak ada tugas aktif saat ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

{{-- Modal Validasi --}}
<div id="modalValidasi" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center flex">
    <div class="bg-white rounded-2xl p-8 w-full max-w-md mx-4 shadow-xl">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Validasi Volume</h2>
        <form id="formValidasi" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Volume Aktual (Liter)</label>
                <input type="number" name="volume_aktual" id="inputVolume" step="0.01" min="0"
                    class="w-full border border-gray-200 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#1a5c38]">
            </div>
            <div class="flex gap-3 justify-end">
                <button type="button" onclick="closeModal()"
                    class="px-5 py-2 text-gray-500 hover:text-gray-700 text-sm font-semibold transition">
                    Batal
                </button>
                <button type="submit"
                    class="bg-[#1a5c38] hover:bg-green-900 text-white px-6 py-2 rounded-lg text-sm font-bold transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.openModal = function(id, volume) {
            // URL sudah diperbaiki ke /mitra/validasi/
            document.getElementById('formValidasi').action = '/mitra/validasi/' + id;
            document.getElementById('inputVolume').value = volume;
            document.getElementById('modalValidasi').classList.remove('hidden');
        }
        window.closeModal = function() {
            document.getElementById('modalValidasi').classList.add('hidden');
        }
    });
</script>
</body>
</html>