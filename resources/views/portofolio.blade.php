@extends('layouts.app')

@section('title', 'Portofolio Proyek - Greasycle')

@push('styles')
<style>
    .fade-in { animation: fadeIn 0.8s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>
@endpush

@section('content')
<main class="fade-in grow pb-24 relative z-10">
    
    {{-- ════════ HERO SECTION (Tanpa Gambar Latar Belakang) ════════ --}}
    <section class="relative bg-primary text-white text-center py-24 md:py-32 px-6">
        <div class="max-w-4xl mx-auto relative z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Portofolio <span class="text-emerald-400">Proyek</span></h1>
            <p class="text-base md:text-lg opacity-90 font-light max-w-2xl mx-auto">Platform Pengelolaan Kembali Minyak Jelantah Berbasis Website — Greasycle Indonesia</p>
        </div>
    </section>

    {{-- ════════ KONTEN KARTU ════════ --}}
    <section class="max-w-6xl mx-auto px-6 md:px-[8%] -mt-10 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            {{-- Card Deskripsi --}}
            <div class="bg-white p-10 shadow-lg shadow-slate-200/50 rounded-[30px] border border-slate-100 hover:-translate-y-2 transition duration-300 group">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                    <i class="fas fa-project-diagram text-2xl"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 mb-4 tracking-tight">Deskripsi Proyek</h2>
                <p class="text-slate-500 text-sm leading-relaxed font-medium">
                    Greasycle adalah platform berbasis web mutakhir yang dirancang khusus untuk memfasilitasi masyarakat dalam menyalurkan limbah secara aman dan menguntungkan. Sistem ini mengotomatisasi proses penjadwalan penjemputan limbah, konversi poin insentif, sekaligus menyajikan portal edukasi interaktif seputar ekonomi sirkular.
                </p>
            </div>

            {{-- Card Fitur --}}
            <div class="bg-white p-10 shadow-lg shadow-slate-200/50 rounded-[30px] border border-slate-100 hover:-translate-y-2 transition duration-300 group">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                    <i class="fas fa-star text-2xl"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 mb-4 tracking-tight">Sorotan Fitur Utama</h2>
                <ul class="space-y-4 text-sm text-slate-500 font-medium list-none p-0 m-0">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-emerald-500 text-lg"></i> Autentikasi & Otorisasi Multilevel (Role-based)</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-emerald-500 text-lg"></i> Sistem Transaksi Validasi Real-time</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-emerald-500 text-lg"></i> Dashboard Analitik Pelanggan & Mitra</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-emerald-500 text-lg"></i> Rekapitulasi Riwayat Transaksi Tersistem</li>
                </ul>
            </div>
            
            {{-- Card Tech Stack --}}
            <div class="bg-white p-10 shadow-lg shadow-slate-200/50 rounded-[30px] border border-slate-100 hover:-translate-y-2 transition duration-300 group">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                    <i class="fas fa-laptop-code text-2xl"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 mb-4 tracking-tight">Teknologi & Tools</h2>
                <div class="flex flex-wrap gap-3">
                    <span class="bg-slate-50 px-4 py-2.5 rounded-xl text-xs font-bold text-slate-700 border border-slate-200 flex items-center gap-2"><i class="fab fa-laravel text-red-500 text-base"></i> Laravel 11</span>
                    <span class="bg-slate-50 px-4 py-2.5 rounded-xl text-xs font-bold text-slate-700 border border-slate-200 flex items-center gap-2"><i class="fab fa-css3-alt text-sky-500 text-base"></i> Tailwind CSS</span>
                    <span class="bg-slate-50 px-4 py-2.5 rounded-xl text-xs font-bold text-slate-700 border border-slate-200 flex items-center gap-2"><i class="fas fa-database text-orange-400 text-base"></i> MySQL DB</span>
                    <span class="bg-slate-50 px-4 py-2.5 rounded-xl text-xs font-bold text-slate-700 border border-slate-200 flex items-center gap-2"><i class="fab fa-git-alt text-orange-600 text-base"></i> Git & GitHub</span>
                </div>
            </div>

            {{-- Card Tujuan --}}
            <div class="bg-white p-10 shadow-lg shadow-slate-200/50 rounded-[30px] border border-slate-100 hover:-translate-y-2 transition duration-300 group">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                    <i class="fas fa-bullseye text-2xl"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 mb-4 tracking-tight">Objektif Implementasi</h2>
                <p class="text-slate-500 text-sm leading-relaxed font-medium">
                    Secara esensial, arsitektur sistem ini dibangun untuk memutus mata rantai pencemaran air dan tanah akibat pembuangan limbah domestik yang tidak terstandarisasi. Lebih dari itu, Greasycle diharapkan mampu menstimulasi kesadaran publik tentang potensi ekonomi tersembunyi di balik limbah.
                </p>
            </div>
            
        </div>
    </section>
</main>
@endsection