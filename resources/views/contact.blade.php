@extends('layouts.app')
@section('title', 'Hubungi Kami - Greasycle')

@section('content')
<main>
    <section class="relative bg-cover bg-center text-white text-center py-16 md:py-20 px-5" 
             style="background-image: linear-gradient(rgba(0,64,48,0.85), rgba(0,64,48,0.85)), url('{{ asset('assets/foto-2.jpeg') }}'); background-size: cover;">
        <h1 class="text-3xl md:text-4xl font-bold mb-3 text-white tracking-tight">Hubungi Kami</h1>
        <p class="text-base md:text-lg opacity-90 text-white max-w-2xl mx-auto font-light">
            Pendapatmu sangat berarti untuk membuat Greasycle lebih baik.
        </p>
    </section>

    <section class="py-12 md:py-20 px-[8%] bg-white">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-primary mb-3">Suaramu, Perubahan Nyata</h2>
                    <p class="text-gray-500 text-sm leading-relaxed text-justify">Kami percaya bahwa platform yang baik lahir dari masukan yang jujur. Bagikan pengalamanmu baik pujian, kritik, maupun ide segar.</p>
                </div>
                <img src="{{ asset('assets/foto-2.jpeg') }}" class="w-full h-48 md:h-auto object-cover rounded-[20px] shadow-[8px_8px_0px_0px_#d1e7e0]" alt="Feedback">
                
                <div class="space-y-4 pt-2">
                    <div class="flex items-center gap-3 text-sm text-gray-500 italic"><i class="fas fa-envelope text-primary"></i> info@greasycle.id</div>
                    <div class="flex items-center gap-3 text-sm text-gray-500 italic"><i class="fas fa-phone-alt text-primary"></i> +62 812-3456-7890</div>
                    <div class="flex items-center gap-3 text-sm text-gray-500 italic"><i class="fas fa-clock text-primary"></i> Senin-Jumat: 08.00 - 16.00 WIB</div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[25px] shadow-md border border-gray-100">
                @if(session('sukses'))
                    <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6 text-sm font-bold border border-green-200 text-center">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('sukses') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-5">
                    @csrf
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary text-[10px] md:text-xs uppercase tracking-widest ml-1">Nama Lengkap</label>
                        <input type="text" name="nama" required value="@auth {{ Auth::user()->nama }} @endauth" placeholder="Nama Anda"
                            class="p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:outline-none focus:border-secondary transition text-sm">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary text-[10px] md:text-xs uppercase tracking-widest ml-1">Email</label>
                        <input type="email" name="email" required value="@auth {{ Auth::user()->email }} @endauth" placeholder="email@contoh.com"
                            class="p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:outline-none focus:border-secondary transition text-sm">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary text-[10px] md:text-xs uppercase tracking-widest ml-1">Kategori</label>
                        <select name="kategori" required class="p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:outline-none focus:border-secondary transition text-sm text-gray-500">
                            <option value="" disabled selected>Pilih kategori</option>
                            <option value="Layanan">Layanan Penjemputan</option>
                            <option value="Aplikasi">Tampilan Website</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary text-[10px] md:text-xs uppercase tracking-widest ml-1">Pesan</label>
                        <textarea name="pesan" rows="4" required placeholder="Tuliskan masukan kamu..."
                            class="p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:outline-none focus:border-secondary transition text-sm resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-bold hover:bg-secondary transition duration-300 shadow-md text-sm">
                        Kirim Masukan
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection