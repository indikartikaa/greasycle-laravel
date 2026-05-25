@extends('layouts.app')
@section('title', 'Profil Masyito Indi Kartika - Greasycle')

@section('content')
<main class="max-w-6xl mx-auto px-6 py-12">
    <section class="mb-20">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="relative group">
                <div class="w-64 h-64 rounded-4xl overflow-hidden shadow-[15px_15px_0px_0px_#d1e7e0] border border-gray-200">
                    <img src="{{ asset('assets/images/foto-indi.jpeg') }}" alt="Masyito Indi Kartika" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex-1 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4 leading-tight">
                    Hi, Saya <br><span class="text-secondary">Masyito Indi Kartika</span>
                </h1>
                <span class="inline-block bg-accent text-primary px-4 py-1.5 rounded-full text-sm font-bold mb-6">
                    Sistem Informasi | System Analyst Enthusiast
                </span>
                <p class="text-lg text-gray-600 leading-relaxed max-w-2xl">
                    Saya memiliki ketertarikan dalam menganalisis sistem, memahami kebutuhan bisnis, serta merancang solusi teknologi yang efektif. Dengan mempelajari proses bisnis, saya berusaha mengubah permasalahan kompleks menjadi solusi yang terstruktur.
                </p>
            </div>
        </div>
    </section>

    <section class="grid lg:grid-cols-3 gap-8 mb-20">
        <div class="lg:col-span-2 bg-white p-10 rounded-[2.5rem] shadow-xs border border-gray-200">
            <h2 class="text-2xl font-bold text-primary mb-6 flex items-center gap-3">
                <i class="fas fa-user-tag text-secondary"></i> About My Role
            </h2>
            <div class="space-y-4 text-gray-600 text-justify text-sm font-medium">
                <p>Sebagai <strong class="text-primary">System Analyst</strong> di Greasycle, saya berperan menjembatani kebutuhan bisnis dengan solusi teknologi yang tepat. Saya melakukan analisis alur kerja sistem, mengidentifikasi kebutuhan pengguna, serta membantu merancang proses yang lebih efektif.</p>
                <p>Melalui analisis mendalam dan kolaborasi tim, saya memastikan solusi yang dikembangkan memberikan nilai nyata bagi pengembangan bisnis.</p>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-3xl shadow-xs border border-gray-200 flex items-start gap-4">
                <div class="p-3 bg-[#f0f7f4] rounded-2xl text-secondary"><i class="fas fa-network-wired text-xl"></i></div>
                <div>
                    <h3 class="font-bold text-primary text-sm">System Architecture</h3>
                    <p class="text-[11px] text-gray-500 leading-tight">Merancang struktur sistem yang kokoh dan skalabel.</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-xs border border-gray-200 flex items-start gap-4">
                <div class="p-3 bg-[#f0f7f4] rounded-2xl text-secondary"><i class="fas fa-list-check text-xl"></i></div>
                <div>
                    <h3 class="font-bold text-primary text-sm">Project Management</h3>
                    <p class="text-[11px] text-gray-500 leading-tight">Memastikan pengembangan sistem sesuai timeline.</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-xs border border-gray-200 flex items-start gap-4">
                <div class="p-3 bg-[#f0f7f4] rounded-2xl text-secondary"><i class="fas fa-file-contract text-xl"></i></div>
                <div>
                    <h3 class="font-bold text-primary text-sm">Requirements Analysis</h3>
                    <p class="text-[11px] text-gray-500 leading-tight">Analisis kebutuhan pengguna secara mendalam.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="grid md:grid-cols-2 gap-8 items-stretch mb-6">
        <div class="bg-primary text-white p-8 rounded-[2.5rem] shadow-xl">
            <h3 class="text-xl font-bold mb-6 flex items-center gap-2"><i class="fas fa-code text-accent"></i> Core Skills</h3>
            <div class="flex flex-wrap gap-3">
                <span class="bg-white/10 px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold">SQL</span>
                <span class="bg-white/10 px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold">System Design</span>
                <span class="bg-white/10 px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold">VB.NET</span>
                <span class="bg-white/10 px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold">Git</span>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] shadow-xs border border-gray-200 flex flex-col justify-center items-center text-center">
            <h3 class="text-xl font-bold text-primary mb-6">Connect with Me</h3>
            <div class="flex gap-6">
                <a href="https://linkedin.com/in/masyito-indi-kartika-721418336" target="_blank" class="w-14 h-14 bg-[#f0f7f4] rounded-2xl flex items-center justify-center text-[#0077b5] text-2xl hover:bg-primary hover:text-white transition-all"><i class="fab fa-linkedin"></i></a>
                <a href="https://github.com/indikartikaa" target="_blank" class="w-14 h-14 bg-[#f0f7f4] rounded-2xl flex items-center justify-center text-gray-900 text-2xl hover:bg-primary hover:text-white transition-all"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
</main>
@endsection