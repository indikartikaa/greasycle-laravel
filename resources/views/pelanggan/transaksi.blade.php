<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setor Minyak - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#004030',
                        secondary: '#2d6a4f',
                        accent: '#d1e7e0',
                        lightGreen: '#f0f7f4',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col font-sans selection:bg-emerald-200">

    {{-- NAVBAR ELEGANT (Sama dengan Dashboard) --}}
    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200/50 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 h-20 flex items-center justify-between">
            
            {{-- Logo --}}
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-lg shadow-emerald-200/50">
                    <i class="fas fa-recycle text-xl"></i>
                </div>
                <div class="leading-tight">
                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">
                        Greasy<span class="text-emerald-500">cle</span>
                    </h1>
                    <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-[0.2em] mt-0.5">
                        Portal Pelanggan
                    </p>
                </div>
            </div>

            {{-- Menu Navigasi --}}
            <div class="flex items-center gap-4">
                <div class="hidden md:flex flex-col items-end mr-2">
                    <span class="text-sm font-bold text-slate-800">{{ Auth::user()->nama }}</span>
                    <span class="text-[10px] text-slate-400 font-medium bg-slate-100 px-2 py-0.5 rounded-full mt-1 uppercase">{{ Auth::user()->role }}</span>
                </div>
                <a href="{{ route('pelanggan.dashboard') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 hover:bg-emerald-500 hover:text-white hover:shadow-md transition-all font-bold text-sm flex items-center gap-2">
                    <i class="fas fa-chart-line"></i> <span class="hidden sm:inline">Dashboard</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-red-50 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm" title="Keluar (Logout)">
                        <i class="fas fa-power-off"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    {{-- KONTEN FORM SETOR --}}
    <main class="max-w-4xl mx-auto px-6 py-12 grow w-full">
        
        <div class="bg-white p-8 md:p-10 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden">
            
            {{-- Aksen Dekorasi Kanan Atas --}}
            <div class="absolute -right-10 -top-10 opacity-5 pointer-events-none">
                <i class="fas fa-truck-loading text-[200px] text-emerald-800"></i>
            </div>

            {{-- HEADER TITLE --}}
            <div class="mb-10 relative z-10">
                <a href="{{ route('pelanggan.dashboard') }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 text-sm font-bold transition-all mb-4 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-lg w-fit">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Formulir <span class="text-emerald-600">Penjemputan</span></h2>
                <p class="text-slate-500 text-sm font-medium mt-2 max-w-xl leading-relaxed">
                    Pastikan takaran volume yang Anda masukkan sesuai. Tim kurir kami akan memvalidasi ulang volume tersebut di lokasi Anda.
                </p>
            </div>

            {{-- FORMULIR AJUAN --}}
            <form action="{{ route('pelanggan.setor.store') }}" method="POST" onsubmit="gabungkanAlamat()" class="relative z-10 space-y-8">
                @csrf
                <input type="hidden" name="alamat_jemput" id="alamat_jemput_asli">

                {{-- KOTAK INPUT: DATA LIMBAH --}}
                <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 md:p-8">
                    <h3 class="text-sm font-bold text-slate-800 flex items-center gap-2 mb-6 uppercase tracking-widest border-b border-slate-200 pb-3">
                        <i class="fas fa-flask text-emerald-500 text-lg"></i> Detail Limbah
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2">Estimasi Volume <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="number" name="volume" step="0.1" min="0.1" placeholder="Cth: 3.5" class="w-full pl-4 pr-12 py-3 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-800 focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all shadow-sm" required>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">Liter</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2">Catatan Kurir (Opsional)</label>
                            <input type="text" name="catatan" placeholder="Cth: Titip satpam depan / Pagar hitam" class="w-full p-3 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-800 focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all shadow-sm">
                        </div>
                    </div>
                </div>

                {{-- KOTAK INPUT: LOKASI PENJEMPUTAN --}}
                <div class="bg-emerald-50/50 border border-emerald-100 rounded-2xl p-6 md:p-8">
                    <h3 class="text-sm font-bold text-emerald-800 flex items-center gap-2 mb-6 uppercase tracking-widest border-b border-emerald-200 pb-3">
                        <i class="fas fa-map-location-dot text-emerald-600 text-lg"></i> Pemetaan Lokasi Surabaya
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2">Wilayah / Regional <span class="text-red-500">*</span></label>
                            <select id="region" class="w-full p-3 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all shadow-sm" required onchange="filterKecamatan()">
                                <option value="">-- Pilih Wilayah --</option>
                                <option value="Surabaya Pusat">Surabaya Pusat</option>
                                <option value="Surabaya Barat">Surabaya Barat</option>
                                <option value="Surabaya Timur">Surabaya Timur</option>
                                <option value="Surabaya Utara">Surabaya Utara</option>
                                <option value="Surabaya Selatan">Surabaya Selatan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2">Kecamatan <span class="text-red-500">*</span></label>
                            <select id="kecamatan" class="w-full p-3 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all shadow-sm disabled:bg-slate-100 disabled:text-slate-400" required disabled onchange="filterKelurahan()">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2">Kelurahan <span class="text-red-500">*</span></label>
                            <select id="kelurahan" class="w-full p-3 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all shadow-sm disabled:bg-slate-100 disabled:text-slate-400" required disabled>
                                <option value="">-- Pilih Kelurahan --</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2">Detail Alamat Lengkap (Jalan, RT/RW, No. Rumah) <span class="text-red-500">*</span></label>
                        <textarea id="jalan" rows="3" placeholder="Tuliskan nama jalan, nomor rumah, dan rincian posisi spesifik agar mudah ditemukan kurir..." class="w-full p-4 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-800 focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all shadow-sm" required></textarea>
                    </div>
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-8 py-4 rounded-xl text-sm font-extrabold hover:shadow-lg hover:shadow-emerald-500/30 transform hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i> Ajukan Penjemputan Sekarang
                    </button>
                    <button type="reset" class="sm:w-32 bg-slate-100 text-slate-500 px-6 py-4 rounded-xl text-sm font-bold hover:bg-slate-200 transition-all text-center">
                        Reset Form
                    </button>
                </div>

            </form>
        </div>
    </main>

    {{-- FOOTER SIMPLE --}}
    <footer class="mt-auto py-8 text-center border-t border-slate-200/60 bg-white/50 backdrop-blur-sm">
        <p class="text-slate-400 text-xs font-medium tracking-wide">
            &copy; 2026 <span class="font-bold text-slate-500">Greasycle Indonesia</span>. System by Masyito Indi Kartika.
        </p>
    </footer>

    {{-- SCRIPTS KOTA SURABAYA --}}
    <script>
        const wilayahSurabaya = {
            "Surabaya Selatan": {
                "Dukuh Pakis": ["Dukuh Kupang", "Dukuh Pakis", "Gunung Sari", "Pradah Kalikendal"],
                "Gayungan": ["Dukuh Menanggal", "Gayungan", "Ketintang", "Menanggal"],
                "Jambangan": ["Jambangan", "Karah", "Kebonsari", "Pagesangan"],
                "Karang Pilang": ["Karang Pilang", "Kebraon", "Kedurus", "Waru Gunung"],
                "Sawahan": ["Banyu Urip", "Kupang Krajan", "Pakis", "Petemon", "Putat Jaya", "Sawahan"],
                "Wiyung": ["Babatan", "Balas Klumprik", "Jajar Tunggal", "Wiyung"],
                "Wonocolo": ["Bendul Merisi", "Jemur Wonosari", "Margorejo", "Sidosermo", "Siwalankerto"],
                "Wonokromo": ["Darmo", "Jagir", "Ngagel", "Ngagel Rejo", "Sawunggaling", "Wonokromo"]
            },
            "Surabaya Timur": {
                "Gubeng": ["Airlangga", "Baratajaya", "Gubeng", "Kertajaya", "Mojo", "Pucang Sewu"],
                "Gunung Anyar": ["Gunung Anyar", "Gunung Anyar Tambak", "Rungkut Menanggal", "Rungkut Tengah"],
                "Mulyorejo": ["Dukuh Sutorejo", "Kalijudan", "Kalisari", "Kejawan Putih Tambak", "Manyar Sabrangan", "Mulyorejo"],
                "Rungkut": ["Kalirungkut", "Kedung Baruk", "Medokan Ayu", "Penjaringansari", "Rungkut Kidul", "Wonorejo"],
                "Sukolilo": ["Gebang Putih", "Keputih", "Klampis Ngasem", "Medokan Semampir", "Menur Pumpungan", "Nginden Jangkungan", "Semolowaru"],
                "Tambaksari": ["Dukuh Setro", "Gading", "Kapasmadya Baru", "Pacarkeling", "Pacarkembang", "Ploso", "Rangkah", "Tambaksari"],
                "Tenggilis Mejoyo": ["Kendangsari", "Kutisari", "Panjang Jiwo", "Tenggilis Mejoyo"]
            },
            "Surabaya Barat": {
                "Asemrowo": ["Asemrowo", "Genting Kalianak", "Tambak Sarioso"],
                "Benowo": ["Kandangan", "Romokalisari", "Sememi", "Tambak Oso Wilangun"],
                "Lakarsantri": ["Bangkingan", "Jeruk", "Lakarsantri", "Lidah Kulon", "Lidah Wetan", "Sumurwelut"],
                "Pakal": ["Babat Jerawat", "Benowo", "Pakal", "Sumber Rejo"],
                "Sambikerep": ["Beringin", "Lontar", "Made", "Sambikerep"],
                "Sukomanunggal": ["Putat Gede", "Simomulyo", "Simomulyo Baru", "Sonokwijenan", "Sukomanunggal", "Tanjungsari"],
                "Tendes": ["Balongsari", "Banjar Sugihan", "Karang Poh", "Manukan Kulon", "Manukan Wetan", "Tendes"]
            },
            "Surabaya Pusat": {
                "Bubutan": ["Alun-Alun Contong", "Bubutan", "Gundih", "Jepara", "Tembok Dukuh"],
                "Genteng": ["Embong Kaliasin", "Genteng", "Kapasari", "Ketabang", "Peneleh"],
                "Simokerto": ["Kapasan", "Sidodadi", "Simokerto", "Simolawang", "Tambakrejo"],
                "Tegalsari": ["Dr. Soetomo", "Kedungdoro", "Keputran", "Tegalsari", "Wonorejo"]
            },
            "Surabaya Utara": {
                "Bulak": ["Bulak", "Kedung Cowek", "Kenjeran", "Sukolilo Baru"],
                "Kenjeran": ["Bulak Banteng", "Sidotopo Wetan", "Tambak Wedi", "Tanah Kali Kedinding"],
                "Krembangan": ["Dupak", "Kemayoran", "Krembangan Selatan", "Morokrembangan", "Perak Barat"],
                "Pabean Cantian": ["Bongkaran", "Krembangan Utara", "Nyamplungan", "Tanjung Perak"],
                "Semampir": ["Ampel", "Pegirian", "Sidotopo", "Ujung", "Wonokusumo"]
            }
        };

        function filterKecamatan() {
            const regSelect = document.getElementById('region');
            const kecSelect = document.getElementById('kecamatan');
            const kelSelect = document.getElementById('kelurahan');
            const selectedReg = regSelect.value;

            kecSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
            kelSelect.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
            kelSelect.disabled = true;

            if (selectedReg && wilayahSurabaya[selectedReg]) {
                Object.keys(wilayahSurabaya[selectedReg]).forEach(kec => {
                    const op = document.createElement('option');
                    op.value = kec;
                    op.textContent = kec;
                    kecSelect.appendChild(op);
                });
                kecSelect.disabled = false;
            }
        }

        function filterKelurahan() {
            const regSelect = document.getElementById('region').value;
            const kecSelect = document.getElementById('kecamatan').value;
            const kelSelect = document.getElementById('kelurahan');

            kelSelect.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';

            if (regSelect && kecSelect && wilayahSurabaya[regSelect][kecSelect]) {
                wilayahSurabaya[regSelect][kecSelect].forEach(kel => {
                    const op = document.createElement('option');
                    op.value = kel;
                    op.textContent = kel;
                    kelSelect.appendChild(op);
                });
                kelSelect.disabled = false;
            }
        }

        function gabungkanAlamat() {
            const reg = document.getElementById('region').value;
            const kec = document.getElementById('kecamatan').value;
            const kel = document.getElementById('kelurahan').value;
            const jalan = document.getElementById('jalan').value;
            
            document.getElementById('alamat_jemput_asli').value = `${jalan}, Kel. ${kel}, Kec. ${kec}, ${reg}, Kota Surabaya`;
        }
    </script>
</body>
</html>