@extends('layouts.app')
@section('title', 'Tentang Kami - Greasycle')

@section('content')
<main class="fade-in">
    <section class="relative bg-cover bg-center text-white text-center py-20 md:py-32 px-5" 
             style="background-image: linear-gradient(rgba(0,64,48,0.8), rgba(0,64,48,0.8)), url('{{ asset('assets/foto-2.jpeg') }}'); background-size: cover;">
        <h1 class="text-3xl md:text-5xl font-bold mb-3 tracking-tight">Tentang Kami</h1>
        <p class="text-base md:text-lg opacity-90 max-w-2xl mx-auto font-light">Mengenal lebih jauh visi kami untuk lingkungan yang lebih bersih melalui pengelolaan limbah minyak.</p>
    </section>

    <section class="py-20 px-[8%] bg-white">
        <div class="grid md:grid-cols-2 gap-12 items-center max-w-6xl mx-auto">
            <div class="w-full">
                <img src="{{ asset('assets/foto-2.jpeg') }}" alt="Greasycle Vision"
                     class="w-full rounded-[30px] shadow-[15px_15px_0px_0px_#d1e7e0] object-cover h-[300px] md:h-[400px]">
            </div>
            <div class="space-y-6">
                <h2 class="text-3xl font-bold text-primary">Apa itu Greasycle?</h2>
                <div class="space-y-4 text-justify text-gray-700 leading-relaxed text-base">
                    <p>Greasycle adalah platform digital yang membantu masyarakat mengelola limbah rumah tangga dengan cara yang lebih mudah, aman, dan bermanfaat. Kami menghubungkan ibu rumah tangga dengan mitra pengumpul untuk mengubah limbah menjadi energi terbarukan.</p>
                    <p>Kami percaya bahwa perubahan besar bisa dimulai dari langkah kecil di rumah. Dengan menyalurkan limba rumah tangga melalui Greasycle, Anda ikut menjaga lingkungan, mengurangi pencemaran, serta mendukung sistem ekonomi sirkular yang berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 px-[8%] bg-[#fcfdfd] border-t border-gray-50">
        <h2 class="text-center text-3xl font-bold text-primary mb-12 relative after:content-[''] after:block after:w-16 after:h-1 after:bg-secondary after:mx-auto after:mt-2">Kenapa Greasycle?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="bg-white p-8 rounded-[30px] shadow-sm border border-gray-100 hover:-translate-y-2 transition duration-300 text-center">
                <img src="https://cdn-icons-png.flaticon.com/128/2913/2913454.png" class="w-16 mx-auto mb-6" alt="Eco">
                <h3 class="text-xl font-bold text-primary mb-3">Eco-Friendly</h3>
                <p class="text-gray-500 text-sm">Membantu mengurangi pencemaran dengan mengelola limbah secara bertanggung jawab.</p>
            </div>
            <div class="bg-white p-8 rounded-[30px] shadow-sm border border-gray-100 hover:-translate-y-2 transition duration-300 text-center">
                <img src="https://cdn-icons-png.flaticon.com/128/2966/2966327.png" class="w-16 mx-auto mb-6" alt="Health">
                <h3 class="text-xl font-bold text-primary mb-3">Sehat & Aman</h3>
                <p class="text-gray-500 text-sm">Mencegah penyalahgunaan limbah ilegal yang membahayakan kesehatan.</p>
            </div>
            <div class="bg-white p-8 rounded-[30px] shadow-sm border border-gray-100 hover:-translate-y-2 transition duration-300 text-center">
                <img src="https://cdn-icons-png.flaticon.com/128/2454/2454282.png" class="w-16 mx-auto mb-6" alt="Economy">
                <h3 class="text-xl font-bold text-primary mb-3">Manfaat Ekonomi</h3>
                <p class="text-gray-500 text-sm">Mengubah limbah dapur menjadi nilai ekonomi tambahan melalui sistem insentif digital.</p>
            </div>
        </div>
    </section>

    <section class="py-24 px-[8%] bg-white border-t border-gray-50">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-start">
            <div class="space-y-6">
                <div>
                    <h2 class="text-3xl font-bold text-primary mb-4">FAQ Edukasi</h2>
                    <p class="text-gray-500 text-sm italic mb-8">Pelajari mengapa pengelolaan jelantah sangat penting bagi bumi kita.</p>
                </div>
                
                <div class="space-y-3">
                    @php 
                    $faqs = [
                        ["Apa itu minyak jelantah?", "Minyak goreng yang sudah digunakan berulang kali. Biasanya warna menjadi lebih gelap, berbau, dan kualitasnya sudah menurun."],
                        ["Mengapa tidak boleh dibuang sembarangan?", "Dapat menyebabkan penyumbatan saluran air (clogging), pencemaran tanah, dan merusak ekosistem air bersih."],
                        ["Bolehkah digunakan kembali untuk memasak?", "Sangat tidak disarankan. Penggunaan berulang memicu zat karsinogenik yang berbahaya bagi kesehatan jantung dan pembuluh darah."],
                        ["Bagaimana cara menyimpan sebelum disetor?", "Tunggu minyak hingga dingin, saring dari sisa kotoran, lalu simpan dalam wadah plastik atau jerigen yang tertutup rapat."],
                        ["Apakah layanan penjemputan ini dipungut biaya?", "Tidak, layanan penjemputan Greasycle sepenuhnya gratis. Anda justru mendapatkan insentif dari limbah yang Anda salurkan."]
                    ];
                    @endphp

                    @foreach($faqs as $i => $faq)
                    <div class="faq-item border border-gray-200 rounded-2xl bg-[#fcfdfd] transition duration-300">
                        <button class="w-full p-5 flex justify-between items-center text-left focus:outline-none" onclick="toggleFaq({{ $i }})">
                            <span class="font-bold text-primary text-sm">{{ ($i+1) . ". " . $faq[0] }}</span>
                            <i class="faq-chevron fas fa-chevron-down text-secondary text-xs transition-transform duration-300"></i>
                        </button>
                        <div class="faq-answer px-5">
                            <p class="pb-5 text-gray-500 text-sm italic text-left leading-relaxed">{{ $faq[1] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="sticky top-32 hidden md:block">
                <img src="{{ asset('assets/foto-1.jpeg') }}" class="w-full h-[550px] object-cover rounded-[40px] shadow-2xl transition hover:scale-[1.02] duration-500">
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
            if (i === index) {
                item.classList.toggle('active');
            } else {
                item.classList.remove('active');
            }
        });
    }
</script>
@endpush