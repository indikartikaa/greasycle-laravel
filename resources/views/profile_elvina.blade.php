@extends('layouts.app')
@section('title', 'Profil Elvina Meisya Azzahra - Greasycle')

@section('content')
<main class="fade-in bg-[#f7faf9]">
    <section class="min-h-[80vh] flex items-center px-6 lg:px-24 py-16">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
            
            <div class="order-2 lg:order-1">
                <h2 class="text-xl text-slate-700 font-medium mb-2">Halo, Saya</h2>
                <h1 class="text-5xl lg:text-6xl font-bold text-primary mb-4 leading-tight">
                    Elvina Meisya Azzahra
                </h1>
                <p class="text-xl font-semibold mb-6 text-secondary">
                    Aspiring <span class="text-secondary">UI/UX Designer & Business Analyst</span>
                </p>
                <p class="text-gray-600 italic leading-relaxed mb-10 border-l-4 border-secondary pl-4 bg-white p-4 rounded-r-2xl border border-gray-100">
                    "Saya adalah mahasiswa Sistem Informasi yang berdedikasi dengan antusiasme tinggi dalam menjembatani kebutuhan pengguna dan solusi teknologi. Melalui peran saya sebagai Lead Developer di Greasycle, saya mengasah kemampuan UI/UX Design untuk menciptakan antarmuka yang intuitif."
                </p>
            </div>

            <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
                <div class="relative group">
                    <div class="absolute inset-0 translate-x-6 translate-y-6 bg-primary rounded-3xl transition-transform group-hover:translate-x-4 group-hover:translate-y-4"></div>
                    <img src="{{ asset('assets/images/foto-elvina.jpg') }}" alt="Elvina Meisya Azzahra" 
                         class="relative z-10 w-72 h-96 lg:w-80 lg:h-[450px] object-cover rounded-3xl shadow-xl border-4 border-white">
                </div>
            </div>

        </div>
    </section>

    <section class="py-20 bg-white px-6 lg:px-24 border-t border-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-primary mb-4">Keahlian Saya</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Spesialisasi dalam pengembangan web yang responsif, desain user-centric, dan analisis sistem informasi.</p>
            </div>

            <div class="flex flex-wrap justify-center gap-10 lg:gap-16 mb-20">
                <div class="group flex flex-col items-center"><i class="fab fa-html5 text-5xl text-[#e34f26] mb-2"></i><span class="text-sm font-bold text-gray-600">HTML5</span></div>
                <div class="group flex flex-col items-center"><i class="fab fa-css3-alt text-5xl text-[#1572b6] mb-2"></i><span class="text-sm font-bold text-gray-600">CSS3</span></div>
                <div class="group flex flex-col items-center"><i class="fab fa-js text-5xl text-[#f7df1e] mb-2"></i><span class="text-sm font-bold text-gray-600">JS</span></div>
                <div class="group flex flex-col items-center"><i class="fab fa-figma text-5xl text-[#F24E1E] mb-2"></i><span class="text-sm font-bold text-gray-600">Figma</span></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 bg-slate-50 rounded-3xl border border-gray-200 text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xs"><i class="fas fa-pencil-ruler text-2xl text-secondary"></i></div>
                    <h3 class="text-xl font-bold text-primary mb-3">UI/UX Design</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Merancang antarmuka yang estetis dan intuitif untuk meningkatkan pengalaman pengguna.</p>
                </div>
                <div class="p-8 bg-slate-50 rounded-3xl border border-gray-200 text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xs"><i class="fas fa-chart-line text-2xl text-secondary"></i></div>
                    <h3 class="text-xl font-bold text-primary mb-3">Business Analysis</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Menganalisis kebutuhan bisnis dan menerjemahkannya ke dalam solusi sistem strategis.</p>
                </div>
                <div class="p-8 bg-slate-50 rounded-3xl border border-gray-200 text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xs"><i class="fas fa-mobile-alt text-2xl text-secondary"></i></div>
                    <h3 class="text-xl font-bold text-primary mb-3">Responsive Web</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Memastikan performa optimal di berbagai perangkat dengan teknik coding yang bersih.</p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection