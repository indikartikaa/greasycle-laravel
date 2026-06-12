@extends('layouts.app')

@section('title', 'Tentang Kami - Greasycle')

@push('styles')
<style>
    /* Animasi masuk halaman */
    .fade-in { animation: fadeIn 0.8s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    
    /* Modifikasi FAQ Animation */
    .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.4s ease-in-out; }
    .faq-item.active .faq-answer { max-height: 500px; } /* Diperbesar agar teks panjang tidak terpotong */
    .faq-chevron { transition: transform 0.4s ease-in-out; }
    .faq-item.active .faq-chevron { transform: rotate(180deg); }
    .faq-item.active { 
        border-color: #34d399; 
        background-color: #fff; 
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.1); 
    }
</style>
@endpush

@section('content')
<main class="fade-in grow">
    {{-- HERO SECTION --}}
    <section class="relative bg-primary text-white text-center py-24 md:py-36 px-6">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Tentang <span class="text-emerald-400">Kami</span></h1>
        <p class="text-base md:text-lg opacity-90 max-w-2xl mx-auto font-light leading-relaxed">Mengenal lebih jauh visi kami untuk menciptakan lingkungan yang lebih bersih melalui pengelolaan limbah minyak jelantah.</p>
    </section>

    {{-- VISION SECTION --}}
    <section class="py-24 px-6 md:px-[8%] bg-white">
        <div class="grid md:grid-cols-2 gap-16 items-center max-w-6xl mx-auto">
            <div class="w-full relative group">
                <div class="absolute inset-0 bg-emerald-500 rounded-[30px] transform translate-x-4 translate-y-4 -z-10 transition duration-300 group-hover:translate-x-6 group-hover:translate-y-6"></div>
                <img src="{{ asset('assets/images/foto-2.jpeg') }}" alt="Greasycle Vision"
                     class="w-full rounded-[30px] shadow-sm object-cover h-[350px] md:h-[450px] border border-slate-100 z-10 relative">
            </div>
            <div class="space-y-6">
                <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Apa itu <span class="text-emerald-600">Greasycle?</span></h2>
                <div class="space-y-5 text-slate-500 leading-relaxed text-sm font-medium">
                    <p>Greasycle adalah platform digital inovatif yang berdedikasi untuk mentransformasi limbah rumah tangga, khususnya minyak jelantah, menjadi sumber daya yang bernilai ekonomi dan ramah lingkungan.</p>
                    <p>Minyak jelantah seringkali dibuang sembarangan ke wastafel atau selokan, yang pada akhirnya akan menyumbat pipa, mencemari tanah, dan merusak ekosistem perairan. Kami hadir untuk memutus rantai pencemaran tersebut dengan menyediakan layanan penjemputan limbah yang mudah, terstruktur, dan aman.</p>
                    <p>Melalui Greasycle, setiap tetes minyak jelantah yang Anda setorkan tidak akan terbuang sia-sia. Limbah tersebut akan dikelola dan disalurkan ke pabrik pengolahan untuk diubah menjadi energi terbarukan berupa Biodiesel. Sebagai bentuk apresiasi atas kontribusi Anda menjaga bumi, kami memberikan insentif berupa saldo digital yang dapat dicairkan.</p>
                    <p class="font-bold text-emerald-700">Mari bergabung dalam gerakan sirkular ekonomi ini. Bersama Greasycle, kita ciptakan bumi yang lebih hijau dan masa depan yang lebih berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ SECTION --}}
    <section class="py-24 px-6 md:px-[8%] bg-white border-t border-slate-100">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-start">
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-800 mb-3 tracking-tight">FAQ <span class="text-emerald-600">Edukasi</span></h2>
                    <p class="text-sm text-slate-500">Pertanyaan yang paling sering diajukan seputar pengelolaan minyak jelantah dan layanan kami.</p>
                </div>
                <div class="space-y-4">
                    @php 
                    $faqs = [
                        ["Apa itu minyak jelantah?", "Minyak jelantah adalah minyak goreng bekas pemakaian rumah tangga atau restoran yang sudah digunakan berulang kali dan tidak layak lagi untuk dikonsumsi."],
                        ["Mengapa minyak jelantah tidak boleh dibuang sembarangan?", "Membuang jelantah ke wastafel atau tanah dapat menyumbat saluran air, merusak kualitas air tanah, dan jika berakhir di laut, akan menutupi permukaan air sehingga membunuh biota laut."],
                        ["Apakah layanan penjemputan ini gratis?", "Ya, layanan penjemputan Greasycle sepenuhnya gratis tanpa ada biaya tersembunyi apa pun."],
                        ["Berapa minimal liter untuk penjemputan?", "Kami melayani penjemputan dengan minimal volume 5 liter. Untuk di bawah itu, kami sarankan Anda untuk mengumpulkannya terlebih dahulu di wadah tertutup."],
                        ["Bagaimana cara menyimpan minyak jelantah yang benar?", "Saring sisa makanan dari minyak, tunggu hingga suhu minyak benar-benar dingin, lalu masukkan ke dalam jerigen atau botol plastik yang tertutup rapat agar tidak tumpah."],
                        ["Apa yang terjadi pada minyak jelantah yang saya setorkan?", "Minyak yang terkumpul akan kami salurkan ke pabrik pengolahan mitra yang bersertifikat untuk didaur ulang menjadi energi terbarukan, yaitu Biodiesel."],
                        ["Kapan saldo digital saya akan cair?", "Saldo akan otomatis dikonversi dan masuk ke dompet akun Greasycle Anda maksimal 1x24 jam setelah kurir kami memvalidasi takaran volume di lokasi penjemputan."],
                        ["Apakah Greasycle menerima minyak selain sawit?", "Ya, kami menerima berbagai jenis minyak nabati bekas pakai, termasuk minyak canola, minyak samin, dan minyak zaitun."],
                        ["Saya pemilik restoran, apakah bisa bekerja sama rutin?", "Tentu saja! Kami memiliki program khusus B2B untuk pelaku usaha (restoran/cafe/hotel) dengan jadwal penjemputan rutin dan insentif yang lebih menarik."],
                        ["Bagaimana jika kurir belum datang pada hari H?", "Anda dapat melacak status penjemputan secara real-time di dashboard Anda, atau menghubungi layanan pelanggan kami melalui halaman Kontak."]
                    ];
                    @endphp
                    
                    @foreach($faqs as $i => $faq)
                    <div class="faq-item border border-gray-200 rounded-2xl bg-[#fcfdfd] transition duration-300">
                        <button class="w-full p-5 flex justify-between items-center text-left focus:outline-none" onclick="toggleFaq({{ $i }})">
                            <span class="font-bold text-primary text-sm pr-4">{{ $faq[0] }}</span>
                            <i class="faq-chevron fas fa-chevron-down text-emerald-600 text-xs shrink-0"></i>
                        </button>
                        <div class="faq-answer px-5">
                            <p class="pb-5 text-gray-500 text-sm italic leading-relaxed">{{ $faq[1] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="sticky top-32 hidden md:block">
                <div class="relative rounded-3xl p-2 bg-gradient-to-br from-emerald-100 to-teal-50 shadow-lg border border-white">
                     <img src="{{ asset('assets/images/foto-1.jpeg') }}" class="w-full h-[550px] object-cover rounded-2xl shadow-sm">
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    function toggleFaq(index) {
        const items = document.querySelectorAll('.faq-item');
        items.forEach((item, i) => { 
            // Jika FAQ yang diklik sama dengan item saat ini, toggle (buka/tutup)
            if (i === index) {
                item.classList.toggle('active');
            } else {
                // Tutup FAQ yang lain agar terlihat rapi (mode accordion)
                item.classList.remove('active');
            }
        });
    }
</script>
@endpush