@extends('layouts.app')
@section('title', 'Profil Zahlul Noer Laily - Greasycle')

@section('content')
<main class="max-w-6xl mx-auto px-6 py-12">
    <section class="mb-20">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="relative group">
                <div class="w-64 h-64 rounded-4xl overflow-hidden shadow-[15px_15px_0px_0px_#d1e7e0] border border-gray-200">
                    <img src="{{ asset('assets/images/foto-zahlul.jpeg') }}" alt="Zahlul Noer Laily" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex-1 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4 leading-tight">
                    Hi, Saya <br><span class="text-secondary">Zahlul Noer Laily</span>
                </h1>
                <span class="inline-block bg-accent text-primary px-4 py-1.5 rounded-full text-sm font-bold mb-6">
                    Sistem Informasi | Lead Developer
                </span>
                <p class="text-lg text-gray-600 leading-relaxed max-w-2xl italic">
                    Saya merupakan Lead Developer pada proyek Greasycle yang bertanggung jawab dalam pengembangan sistem, pengelolaan struktur kode, serta implementasi teknologi website. Saya memastikan setiap fitur berjalan dengan optimal, aman, and memiliki performa yang baik.
                </p>
            </div>
        </div>
    </section>

    <section class="grid lg:grid-cols-3 gap-8 mb-12">
        <div class="lg:col-span-2 bg-white p-10 rounded-[2.5rem] shadow-xs border border-gray-200">
            <h2 class="text-2xl font-bold text-primary mb-6 flex items-center gap-3">
                <i class="fas fa-code-branch text-secondary"></i> About My Role
            </h2>
            <div class="space-y-4 text-gray-600 text-justify font-medium text-sm">
                <p>Sebagai <strong class="text-primary">Lead Developer</strong> di Greasycle, saya bertanggung jawab dalam mengembangkan sistem website, merancang struktur aplikasi, serta mengkoordinasikan proses pengembangan dengan anggota tim lainnya.</p>
                <p>Saya memastikan setiap fitur yang dikembangkan memiliki kualitas kode yang baik, struktur yang rapi, serta mudah dikembangkan di masa depan. Dengan pendekatan teknologi yang tepat, saya berusaha menghadirkan sistem yang stabil, efisien, dan scalable.</p>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-3xl shadow-xs border border-gray-200 flex items-start gap-4">
                <div class="p-3 bg-[#f0f7f4] rounded-2xl text-secondary"><i class="fas fa-code text-xl"></i></div>
                <div>
                    <h3 class="font-bold text-primary text-sm">Web Development</h3>
                    <p class="text-[11px] text-gray-500 leading-tight">Mengembangkan sistem website Greasycle menggunakan teknologi modern.</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-xs border border-gray-200 flex items-start gap-4">
                <div class="p-3 bg-[#f0f7f4] rounded-2xl text-secondary"><i class="fas fa-layer-group text-xl"></i></div>
                <div>
                    <h3 class="font-bold text-primary text-sm">System Architecture</h3>
                    <p class="text-[11px] text-gray-500 leading-tight">Merancang struktur aplikasi yang efisien dan mudah dikembangkan.</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-xs border border-gray-200 flex items-start gap-4">
                <div class="p-3 bg-[#f0f7f4] rounded-2xl text-secondary"><i class="fas fa-users-cog text-xl"></i></div>
                <div>
                    <h3 class="font-bold text-primary text-sm">Team Collaboration</h3>
                    <p class="text-[11px] text-gray-500 leading-tight">Bekerja sama dengan tim untuk memastikan proyek berjalan baik.</p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection