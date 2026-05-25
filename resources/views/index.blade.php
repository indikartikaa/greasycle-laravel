@extends('layouts.app')

@section('content')
<header class="relative text-white py-20 px-[8%] text-center overflow-hidden"
        style="background-image: linear-gradient(rgba(0,64,48,0.85), rgba(0,64,48,0.85)), url('{{ asset('assets/foto-2.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="max-w-4xl mx-auto relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 tracking-tight leading-tight text-white">
            Ubah Limbah Jadi <span class="text-accent italic">Energi Hijau</span>
        </h1>
        <p class="text-base md:text-lg opacity-90 mb-10 font-light max-w-2xl mx-auto leading-relaxed text-gray-100">
            Kelola limbah Anda secara cerdas bersama Greasycle. Ciptakan lingkungan bersih dan dapatkan manfaat ekonominya.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="openAuth()" class="bg-white text-primary px-8 py-3 rounded-full font-bold hover:bg-accent transition shadow-xl text-sm">Mulai Sekarang</button>
            <a href="{{ route('about') }}" class="border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white/10 transition text-sm">Pelajari Lebih Lanjut</a>
        </div>
    </div>
</header>

<section class="py-24 px-[8%] bg-white text-center">
    <div class="max-w-6xl mx-auto">
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Layanan Kami</h2>
            <p class="text-gray-500 max-w-2xl mx-auto font-medium">Memberikan solusi pengelolaan limbah yang mudah dan terintegrasi untuk masyarakat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="p-10 bg-[#fcfdfd] border border-gray-100 rounded-[30px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 group text-center">
                <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary transition duration-300">
                    <svg class="w-8 h-8 text-primary group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-primary mb-4">Penjemputan Rutin</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Kami menjemput minyak jelantah langsung dari dapur Anda secara terjadwal.</p>
            </div>

            <div class="p-10 bg-[#fcfdfd] border border-gray-100 rounded-[30px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 group text-center">
                <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary transition duration-300">
                    <svg class="w-8 h-8 text-primary group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-primary mb-4">Ramah Lingkungan</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Limbah yang dikumpulkan diolah menjadi biofuel untuk masa depan yang lebih hijau.</p>
            </div>

            <div class="p-10 bg-[#fcfdfd] border border-gray-100 rounded-[30px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 group text-center">
                <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary transition duration-300">
                    <svg class="w-8 h-8 text-primary group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-primary mb-4">Insentif Ekonomi</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Dapatkan nilai ekonomi tambahan atau saldo digital untuk setiap liter jelantah.</p>
            </div>

        </div>
    </div>
</section>

<section class="py-24 px-[8%] bg-accent/20 text-center">
    <div class="max-w-6xl mx-auto">
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Our Founders</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Kenali tim mahasiswa Sistem Informasi di balik layar Greasycle.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-[40px] shadow-sm hover:shadow-2xl transition duration-500 group block">
                <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 text-primary group-hover:scale-110 transition duration-500">
                    <i class="fas fa-user-circle text-5xl"></i> 
                </div>
                <h3 class="text-lg font-bold text-primary">Elvina Meisya Azzahra</h3>
                <span class="text-xs text-secondary font-semibold tracking-widest uppercase">UI/UX Designer</span>
            </div>
            <div class="bg-white p-8 rounded-[40px] shadow-sm hover:shadow-2xl transition duration-500 group block">
                <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 text-primary group-hover:scale-110 transition duration-500">
                    <i class="fas fa-user-circle text-5xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary">Zahlul Noer Laily</h3>
                <span class="text-xs text-secondary font-semibold tracking-widest uppercase">Lead Developer</span>
            </div>
            <div class="bg-white p-8 rounded-[40px] shadow-sm hover:shadow-2xl transition duration-500 group block">
                <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 text-primary group-hover:scale-110 transition duration-500">
                    <i class="fas fa-user-circle text-5xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary">Masyito Indi Kartika</h3>
                <span class="text-xs text-secondary font-semibold tracking-widest uppercase">System Analyst</span>
            </div>
        </div>
    </div>
</section>
@endsection