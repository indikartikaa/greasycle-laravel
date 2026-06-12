@extends('layouts.app')

@section('title', 'Hubungi Kami - Greasycle')

@push('styles')
<style>
    .fade-in { animation: fadeIn 0.8s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>
@endpush

@section('content')
<main class="fade-in grow">
   {{-- HERO SECTION --}}
    <section class="relative bg-primary text-white text-center py-20 md:py-32 px-6">        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Hubungi <span class="text-emerald-400">Kami</span></h1>
        <p class="text-base md:text-lg opacity-90 max-w-2xl mx-auto font-light leading-relaxed">
            Punya pertanyaan atau masukan? Suaramu sangat berarti untuk membuat Greasycle menjadi platform yang lebih baik.
        </p>
    </section>

    {{-- CONTACT SECTION --}}
    <section class="py-24 px-6 md:px-[8%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
            
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-800 mb-3 tracking-tight">Suaramu, <span class="text-emerald-600">Perubahan Nyata</span></h2>
                    <p class="text-slate-500 text-sm font-medium leading-relaxed">Kami percaya bahwa platform yang hebat lahir dari masukan pengguna yang jujur.</p>
                </div>
                
                <div class="w-full relative group">
                    <div class="absolute inset-0 bg-emerald-500 rounded-[30px] transform -translate-x-3 translate-y-3 -z-10 transition duration-300 group-hover:-translate-x-4 group-hover:translate-y-4 opacity-50"></div>
                    <img src="{{ asset('assets/images/foto-2.jpeg') }}" class="w-full h-48 md:h-64 object-cover rounded-[30px] shadow-sm border border-slate-100 relative z-10" alt="Feedback">
                </div>
                
                <div class="space-y-4 pt-4 bg-slate-50 p-6 rounded-3xl border border-slate-100">
                    <div class="flex items-center gap-4 text-sm font-medium text-slate-700">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center"><i class="fas fa-envelope"></i></div>
                        info@greasycle.id
                    </div>
                    <div class="flex items-center gap-4 text-sm font-medium text-slate-700">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center"><i class="fas fa-phone-alt"></i></div>
                        +62 812-3456-7890
                    </div>
                    <div class="flex items-center gap-4 text-sm font-medium text-slate-700">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center"><i class="fas fa-clock"></i></div>
                        Senin - Jumat: 08.00 - 16.00 WIB
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 md:p-10 rounded-[30px] shadow-lg border border-slate-100 shadow-emerald-100/50">
                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Form <span class="text-emerald-600">Masukan</span></h3>
                
                @if(session('sukses'))
                    <div class="bg-emerald-50 text-emerald-700 p-4 rounded-xl mb-6 text-sm font-bold border border-emerald-200 flex items-center gap-3">
                        <i class="fas fa-check-circle text-lg"></i> {{ session('sukses') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-5">
                    @csrf
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-slate-600 text-[10px] md:text-xs uppercase tracking-widest ml-1">Nama Lengkap</label>
                        <input type="text" name="nama" required value="@auth {{ Auth::user()->nama }} @endauth" placeholder="Contoh: Masyito Indi"
                            class="p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition text-sm">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-slate-600 text-[10px] md:text-xs uppercase tracking-widest ml-1">Email Aktif</label>
                        <input type="email" name="email" required value="@auth {{ Auth::user()->email }} @endauth" placeholder="email@contoh.com"
                            class="p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition text-sm">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-slate-600 text-[10px] md:text-xs uppercase tracking-widest ml-1">Kategori Laporan</label>
                        <select name="kategori" required class="p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition text-sm text-slate-600 appearance-none cursor-pointer">
                            <option value="" disabled selected>-- Pilih Topik Bahasan --</option>
                            <option value="Layanan">Layanan Penjemputan / Mitra</option>
                            <option value="Aplikasi">Tampilan & Fitur Website</option>
                            <option value="Lainnya">Kritik, Saran, atau Lainnya</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-slate-600 text-[10px] md:text-xs uppercase tracking-widest ml-1">Pesan / Masukan</label>
                        <textarea name="pesan" rows="4" required placeholder="Tuliskan masukan kamu di sini..."
                            class="p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition text-sm resize-none"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 text-white py-4 mt-2 rounded-2xl font-bold hover:-translate-y-0.5 transition duration-300 shadow-md shadow-emerald-500/30 text-sm flex justify-center items-center gap-2">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection