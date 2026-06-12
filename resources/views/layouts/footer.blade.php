<footer class="bg-[#002b20] pt-20 pb-10">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-extrabold text-white no-underline tracking-tight mb-6">
                    <i class="fas fa-recycle text-emerald-400"></i> Greasycle
                </a>
                <p class="text-emerald-100/60 font-semibold text-sm">PT Greasycle Indonesia</p>
                <p class="text-emerald-100/50 leading-relaxed text-xs">
                    JL. Semampir Tengah VIII Blok B No 18 RT. 10 RW. 01,<br>
                    Kec. Sukolilo, Kota Surabaya,<br>Prov. Jawa Timur 60119
                </p>
                <div class="pt-2 space-y-1">
                    <p class="text-emerald-100/60 text-xs font-medium"><i class="fas fa-envelope w-5"></i> info@greasycle.id</p>
                    <p class="text-emerald-100/60 text-xs font-medium"><i class="fas fa-phone-alt w-5"></i> +62 812-3456-7890</p>
                </div>
            </div>

            <div>
                <h3 class="font-bold text-sm text-white mb-6 uppercase tracking-widest border-b border-white/10 pb-3 inline-block">Layanan Kami</h3>
                <ul class="text-emerald-100/60 space-y-3 text-sm font-medium">
                    <li><a href="{{ route('register') }}" class="hover:text-emerald-400 hover:pl-1 transition-all">Setor Minyak Jelantah</a></li>
                    <li><a href="#" class="hover:text-emerald-400 hover:pl-1 transition-all">Penjemputan Rutin</a></li>
                    <li><a href="#" class="hover:text-emerald-400 hover:pl-1 transition-all">Edukasi Lingkungan</a></li>
                    <li><a href="#" class="hover:text-emerald-400 hover:pl-1 transition-all">Pencairan Saldo Digital</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-sm text-white mb-6 uppercase tracking-widest border-b border-white/10 pb-3 inline-block">Tautan</h3>
                <ul class="text-emerald-100/60 space-y-3 text-sm font-medium">
                    <li><a href="{{ route('home') }}"      class="hover:text-emerald-400 hover:pl-1 transition-all text-emerald-400">Beranda Pusat</a></li>
                    <li><a href="{{ route('about') }}"     class="hover:text-emerald-400 hover:pl-1 transition-all">Tentang Perusahaan</a></li>
                    <li><a href="{{ route('contact') }}"   class="hover:text-emerald-400 hover:pl-1 transition-all">Pusat Bantuan (Kontak)</a></li>
                    <li><a href="{{ route('portofolio') }}"class="hover:text-emerald-400 hover:pl-1 transition-all">Portofolio Capaian</a></li>
                </ul>
            </div>

        </div>

        <div class="w-full pt-8 border-t border-white/10 text-center flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="font-bold text-[10px] sm:text-xs text-white/50 uppercase tracking-[0.2em]">
                Masa Depan Bumi yang Lebih Hijau Kini dalam Genggamanmu.
            </p>
            <p class="font-medium text-[10px] text-emerald-500 uppercase tracking-widest">
                Pemrograman Website © 2026 Greasycle
            </p>
        </div>
    </div>
</footer>