<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat - Greasycle</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
<div class="flex min-h-screen">

    @include('mitra.sidebar')

    <main class="md:ml-64 flex-1 p-8 pt-16 md:pt-8">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Riwayat</h1>
                <p class="text-gray-500 text-sm">Daftar tugas yang telah diselesaikan</p>
            </div>
            <p class="text-gray-400 text-sm">{{ now()->locale('id')->translatedFormat('l, d M Y') }}</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold text-gray-800">Data Selesai</h2>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs px-4 py-2 rounded-lg font-semibold transition">
                    <i class="fas fa-archive mr-1"></i> Arsip Digital
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase border-b border-gray-100">
                            <th class="px-6 py-4 font-medium">Pelanggan & Alamat</th>
                            <th class="px-6 py-4 font-medium">Volume</th>
                            <th class="px-6 py-4 font-medium">Tanggal</th>
                            <th class="px-6 py-4 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">Budi Santoso</p>
                                <p class="text-xs text-gray-400">Jl. Rungkut Madya No. 45</p>
                            </td>
                            <td class="px-6 py-4 font-bold">1.50 L</td>
                            <td class="px-6 py-4 text-gray-500">14 Apr 2026</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-600 text-xs font-bold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                    <i class="fas fa-check text-xs"></i> BERHASIL
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">Siti Aminah</p>
                                <p class="text-xs text-gray-400">Jl. Semampir No. 12</p>
                            </td>
                            <td class="px-6 py-4 font-bold">3.00 L</td>
                            <td class="px-6 py-4 text-gray-500">13 Apr 2026</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-600 text-xs font-bold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                    <i class="fas fa-check text-xs"></i> BERHASIL
                                </span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">Ahmad Fauzi</p>
                                <p class="text-xs text-gray-400">Jl. Kepampang No. 7</p>
                            </td>
                            <td class="px-6 py-4 font-bold">4.50 L</td>
                            <td class="px-6 py-4 text-gray-500">13 Apr 2026</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-600 text-xs font-bold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                    <i class="fas fa-check text-xs"></i> BERHASIL
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>
</body>
</html>