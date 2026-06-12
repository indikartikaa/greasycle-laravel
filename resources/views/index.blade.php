@extends('layouts.app')

@section('title', 'Beranda - Greasycle')

@push('styles')
<style>
    /* Animasi khusus halaman beranda */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.7s ease forwards; }
    .fade-up-2 { animation: fadeUp 0.7s 0.15s ease forwards; opacity: 0; }
    .fade-up-3 { animation: fadeUp 0.7s 0.3s ease forwards; opacity: 0; }
</style>
@endpush

@section('content')
<main class="grow">
    {{-- HERO SECTION --}}
    <section class="relative min-h-[88vh] flex items-center justify-center text-center text-white px-6"
             style="background: linear-gradient(rgba(0,64,48,0.85), rgba(0,64,48,0.85)),
                    url('{{ asset('assets/images/hero-bg.jpeg') }}') center/cover no-repeat fixed;">
                    <div class="max-w-3xl">
            <h1 class="fade-up-2 text-4xl md:text-6xl font-extrabold leading-tight mb-6 text-white tracking-tight">
                Ubah Limbah Jadi<br><span class="text-emerald-400">Energi Hijau</span>
            </h1>
            <p class="fade-up-3 text-base md:text-lg text-white/80 max-w-xl mx-auto mb-10 leading-relaxed font-light">
                Kelola limbah rumah tangga dan minyak jelantah Anda secara cerdas bersama Greasycle. Ciptakan lingkungan yang lebih bersih dan nikmati manfaat insentif ekonominya.
            </p>
            <div class="fade-up-3 flex flex-wrap justify-center gap-4">
                @auth
                    <a href="{{ route('pelanggan.dashboard') }}" class="bg-white text-primary font-bold px-8 py-3.5 rounded-xl hover:bg-emerald-50 transition shadow-lg text-sm flex items-center">
                        <i class="fas fa-columns mr-2 text-emerald-500"></i> Buka Portal
                    </a>
                @else
                    <button onclick="openAuth(); switchForm('register');" class="bg-white text-primary font-bold px-8 py-3.5 rounded-xl hover:bg-emerald-50 transition shadow-lg text-sm flex items-center">
                        <i class="fas fa-play-circle mr-2 text-emerald-500"></i> Mulai Sekarang
                    </button>
                @endauth
                
                <a href="{{ route('about') }}"
                   class="border border-white/40 text-white font-semibold px-8 py-3.5 rounded-xl hover:bg-white/10 transition text-sm flex items-center backdrop-blur-sm">
                    <i class="fas fa-info-circle mr-2"></i> Pelajari Sistem Kami
                </a>
            </div>
        </div>

        {{-- Tombol Segitiga / Chevron - Sekarang Aktif & Bisa Diklik --}}
        <div onclick="document.getElementById('stats-section').scrollIntoView({ behavior: 'smooth' });" 
             class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/40 hover:text-white transition animate-bounce cursor-pointer z-20">
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </section>

    {{-- STATS SECTION --}}
    <section id="stats-section" class="py-12 px-[8%] bg-primary border-t-4 border-emerald-500">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center max-w-5xl mx-auto">
            <div>
                <h4 class="text-3xl font-bold text-white">1.250+</h4>
                <p class="text-emerald-200/70 text-[10px] uppercase font-bold tracking-[0.15em] mt-1.5">Liter Terkumpul</p>
            </div>
            <div>
                <h4 class="text-3xl font-bold text-white">248+</h4>
                <p class="text-emerald-200/70 text-[10px] uppercase font-bold tracking-[0.15em] mt-1.5">Pelanggan Aktif</p>
            </div>
            <div>
                <h4 class="text-3xl font-bold text-white">14</h4>
                <p class="text-emerald-200/70 text-[10px] uppercase font-bold tracking-[0.15em] mt-1.5">Mitra Pengelola</p>
            </div>
            <div>
                <h4 class="text-3xl font-bold text-white">1.2 Jt</h4>
                <p class="text-emerald-200/70 text-[10px] uppercase font-bold tracking-[0.15em] mt-1.5">Liter Air Terjaga</p>
            </div>
        </div>
    </section>

    {{-- SERVICES SECTION --}}
    <section class="py-24 px-[8%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-800 mb-3 tracking-tight">Layanan Utama <span class="text-emerald-600">Kami</span></h2>
                <p class="text-slate-500 text-sm font-medium">Memberikan solusi pengelolaan limbah yang mudah, cepat, dan terintegrasi.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-slate-50 p-10 rounded-3xl text-center hover:-translate-y-2 transition duration-300 border border-slate-100 shadow-sm">
                    <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-6 text-emerald-600">
                        <i class="fas fa-truck-loading text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Penjemputan Rutin</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Kami menjemput minyak jelantah langsung dari dapur Anda secara terjadwal tanpa perlu repot keluar rumah.</p>
                </div>
                <div class="bg-slate-50 p-10 rounded-3xl text-center hover:-translate-y-2 transition duration-300 border border-slate-100 shadow-sm">
                    <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-6 text-emerald-600">
                        <i class="fas fa-seedling text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Ramah Lingkungan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Limbah yang dikumpulkan diolah menjadi energi biodiesel baru untuk menciptakan masa depan yang lebih hijau.</p>
                </div>
                <div class="bg-slate-50 p-10 rounded-3xl text-center hover:-translate-y-2 transition duration-300 border border-slate-100 shadow-sm">
                    <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-6 text-emerald-600">
                        <i class="fas fa-wallet text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Insentif Ekonomi</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Dapatkan saldo digital untuk setiap liter minyak jelantah yang Anda kumpulkan dan salurkan melalui platform kami.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- HOW IT WORKS SECTION --}}
    <section class="py-24 px-[8%] bg-emerald-50/50 border-t border-b border-emerald-100/50">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-800 mb-3 tracking-tight">Cara Kerja Greasycle</h2>
                <p class="text-slate-500 text-sm font-medium">Hanya butuh 4 langkah mudah untuk mulai berkontribusi pada lingkungan.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center group relative">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center mx-auto mb-5 border-b-4 border-b-emerald-500 group-hover:bg-emerald-600 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/128/3081/3081840.png" class="w-10 opacity-70 group-hover:invert group-hover:opacity-100 transition" alt="">
                    </div>
                    <div class="w-7 h-7 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center mx-auto mb-3 text-xs font-bold border border-emerald-200">1</div>
                    <h4 class="font-bold text-slate-800 text-sm mb-1">Kumpulkan</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Saring & simpan limbah jelantah di wadah tertutup</p>
                    <div class="hidden md:block absolute top-10 -right-4 text-slate-300 text-xl font-bold">→</div>
                </div>
                <div class="text-center group relative">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center mx-auto mb-5 border-b-4 border-b-emerald-500 group-hover:bg-emerald-600 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/128/3652/3652191.png" class="w-10 opacity-70 group-hover:invert group-hover:opacity-100 transition" alt="">
                    </div>
                    <div class="w-7 h-7 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center mx-auto mb-3 text-xs font-bold border border-emerald-200">2</div>
                    <h4 class="font-bold text-slate-800 text-sm mb-1">Ajukan Jadwal</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Isi form volume limbah di dashboard portal pelanggan</p>
                    <div class="hidden md:block absolute top-10 -right-4 text-slate-300 text-xl font-bold">→</div>
                </div>
                <div class="text-center group relative">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center mx-auto mb-5 border-b-4 border-b-emerald-500 group-hover:bg-emerald-600 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/128/709/709790.png" class="w-10 opacity-70 group-hover:invert group-hover:opacity-100 transition" alt="">
                    </div>
                    <div class="w-7 h-7 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center mx-auto mb-3 text-xs font-bold border border-emerald-200">3</div>
                    <h4 class="font-bold text-slate-800 text-sm mb-1">Kurir Datang</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Mitra tiba di lokasi & memvalidasi takaran volume</p>
                    <div class="hidden md:block absolute top-10 -right-4 text-slate-300 text-xl font-bold">→</div>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center mx-auto mb-5 border-b-4 border-b-emerald-500 group-hover:bg-emerald-600 transition duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/128/2454/2454282.png" class="w-10 opacity-70 group-hover:invert group-hover:opacity-100 transition" alt="">
                    </div>
                    <div class="w-7 h-7 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center mx-auto mb-3 text-xs font-bold border border-emerald-200">4</div>
                    <h4 class="font-bold text-slate-800 text-sm mb-1">Cair Saldo</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Volume dikonversi jadi saldo digital di akunmu</p>
                </div>
            </div>
        </div>
    </section>

    {{-- TEAM SECTION --}}
    <section class="py-24 px-[8%] bg-white">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-800 mb-3 tracking-tight">Tim <span class="text-emerald-600">Pengembang</span></h2>
                <p class="text-slate-500 text-sm font-medium">Kenali orang-orang hebat di balik berdirinya Greasycle.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 justify-items-center">
                <a href="{{ route('profile.elvina') }}" class="group bg-slate-50 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-300 border border-slate-100 shadow-sm w-full block">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-5 text-white text-3xl font-extrabold group-hover:scale-105 transition shadow-md shadow-emerald-200">E</div>
                    <h3 class="font-bold text-slate-800 text-base mb-1">Elvina Meisya Azzahra</h3>
                    <span class="inline-block mt-1 text-[10px] text-emerald-700 font-bold bg-emerald-100 border border-emerald-200 px-3 py-1 rounded-lg tracking-wider uppercase">UI/UX Designer</span>
                </a>

                <a href="{{ route('profile.zahlul') }}" class="group bg-slate-50 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-300 border border-slate-100 shadow-sm w-full block">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-5 text-white text-3xl font-extrabold group-hover:scale-105 transition shadow-md shadow-emerald-200">Z</div>
                    <h3 class="font-bold text-slate-800 text-base mb-1">Zahlul Noer Laily</h3>
                    <span class="inline-block mt-1 text-[10px] text-emerald-700 font-bold bg-emerald-100 border border-emerald-200 px-3 py-1 rounded-lg tracking-wider uppercase">Lead Developer</span>
                </a>

                <a href="{{ route('profile.indi') }}" class="group bg-slate-50 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-300 border border-slate-100 shadow-sm w-full block">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-5 text-white text-3xl font-extrabold group-hover:scale-105 transition shadow-md shadow-emerald-200">M</div>
                    <h3 class="font-bold text-slate-800 text-base mb-1">Masyito Indi Kartika</h3>
                    <span class="inline-block mt-1 text-[10px] text-emerald-700 font-bold bg-emerald-100 border border-emerald-200 px-3 py-1 rounded-lg tracking-wider uppercase">System Analyst</span>
                </a>
            </div>
        </div>
    </section>
</main>
@endsection