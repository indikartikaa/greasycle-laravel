@extends('layouts.app')
@section('title', 'Portofolio Proyek - Greasycle')

@section('content')
<main>
    <header class="relative bg-cover bg-center text-white py-16 md:py-20 px-[8%] text-center overflow-hidden"
            style="background-image: linear-gradient(rgba(0,64,48,0.85), rgba(0,64,48,0.85)), url('{{ asset('assets/foto-2.jpeg') }}'); background-size: cover;">
        <div class="max-w-4xl mx-auto relative z-10">
            <h1 class="text-3xl md:text-4xl font-bold mb-3 tracking-tight">Portofolio Proyek</h1>
            <p class="text-base md:text-lg opacity-90 font-light">Website Pengelolaan Kembali Minyak Jelantah — Greasycle</p>
        </div>
    </header>

    <section class="container mx-auto px-4 mt-12 max-w-5xl mb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 shadow-sm rounded-[30px] border border-gray-100 hover:-translate-y-2 transition duration-300">
                <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center mb-6 text-primary">
                    <i class="fas fa-project-diagram text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-primary mb-4">Deskripsi Proyek</h2>
                <p class="text-gray-600 text-sm leading-relaxed text-justify">
                    Greasycle adalah platform berbasis web yang dirancang untuk membantu masyarakat dalam mengelola minyak jelantah secara ramah lingkungan. Sistem ini menyediakan fitur penjadwalan penjemputan minyak bekas serta edukasi mengenai proses daur ulang.
                </p>
            </div>

            <div class="bg-white p-8 shadow-sm rounded-[30px] border border-gray-100 hover:-translate-y-2 transition duration-300">
                <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center mb-6 text-primary">
                    <i class="fas fa-star text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-primary mb-4">Fitur Utama</h2>
                <ul class="space-y-3 text-sm text-gray-600 list-none p-0 m-0">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-secondary"></i> Registrasi & Login Multilevel</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-secondary"></i> Sistem Transaksi & Riwayat</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-secondary"></i> Dashboard Pelanggan & Mitra</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-secondary"></i> Filter Data Real-time</li>
                </ul>
            </div>
            
            <div class="bg-white p-8 shadow-sm rounded-[30px] border border-gray-100 hover:-translate-y-2 transition duration-300">
                <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center mb-6 text-primary">
                    <i class="fas fa-laptop-code text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-primary mb-4">Teknologi & Tools</h2>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-gray-100 px-4 py-2 rounded-xl text-xs font-bold text-primary border border-gray-200">Laravel 11</span>
                    <span class="bg-gray-100 px-4 py-2 rounded-xl text-xs font-bold text-primary border border-gray-200">Tailwind CSS</span>
                    <span class="bg-gray-100 px-4 py-2 rounded-xl text-xs font-bold text-primary border border-gray-200">MySQL</span>
                </div>
            </div>

            <div class="bg-white p-8 shadow-sm rounded-[30px] border border-gray-100 hover:-translate-y-2 transition duration-300">
                <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center mb-6 text-primary">
                    <i class="fas fa-bullseye text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-primary mb-4">Tujuan Proyek</h2>
                <p class="text-gray-600 text-sm leading-relaxed text-justify">
                    Proyek ini bertujuan untuk mengurangi pencemaran lingkungan akibat pembuangan minyak jelantah sembarangan serta mendukung konsep ekonomi sirkular.
                </p>
            </div>
        </div>
    </section>
</main>
@endsection