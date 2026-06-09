<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Setoran - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700&display=swap" rel="stylesheet">
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
                    }
                }
            }
        }
    </script>
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    {{-- NAVBAR BLUR GLASS --}}
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200/60 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 h-16 flex items-center justify-between">
            
            {{-- Logo --}}
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-recycle text-base"></i>
                </div>
                <div class="leading-tight">
                    <h1 class="text-xl font-extrabold tracking-tight text-slate-900">
                        Greasy<span class="text-emerald-500">cle</span>
                    </h1>
                    <p class="text-[10px] text-slate-400 font-medium uppercase tracking-[0.15em]">
                        Pelanggan Portal
                    </p>
                </div>
            </div>

            {{-- Menu Navigasi --}}
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('pelanggan.dashboard') }}"
                   class="px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-600 font-semibold transition flex items-center gap-2 text-xs md:text-sm">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                <a href="{{ route('pelanggan.setor') }}"
                   class="px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-600 font-semibold transition flex items-center gap-2 text-xs md:text-sm">
                    <i class="fas fa-plus-circle"></i> Setor Minyak
                </a>
                <a href="/"
                   class="px-4 py-2.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-semibold transition-all duration-300 flex items-center gap-2 text-xs md:text-sm">
                    <i class="fas fa-globe"></i> Halaman Publik
                </a>
            </div>
        </div>
    </nav>

    {{-- KONTEN EDIT FORM --}}
    <div class="max-w-4xl mx-auto px-6 py-10 grow w-full">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            
            {{-- HEADER BANNER WHITE MINIMALIST BOX --}}
            <div class="mb-8 bg-white border border-slate-200 p-5 rounded-2xl shadow-2xs">
                <a href="{{ route('pelanggan.dashboard') }}" class="text-emerald-600 hover:text-emerald-700 text-xs font-bold flex items-center gap-1.5 transition">
                    <i class="fas fa-chevron-left text-[10px]"></i> Kembali ke Dashboard
                </a>
                <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight mt-2">Ubah Data Setoran #TRX-{{ $data->id }}</h2>
                <p class="text-slate-400 text-xs font-medium mt-1">Perbarui informasi estimasi volume atau lokasi penjemputan wilayah regional Kota Surabaya.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-2xl font-medium text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORMULIR EDIT --}}
            <form action="{{ route('pelanggan.transaksi.update', $data->id) }}" method="POST" onsubmit="gabungkanAlamat()" class="space-y-6">
                @csrf
                @method('PUT') 
                
                {{-- Hidden input untuk menampung string gabungan akhir alamat --}}
                <input type="hidden" name="alamat_jemput" id="alamat_jemput_asli" value="{{ old('alamat_jemput', $data->alamat_jemput) }}">

                {{-- VOLUME & STATUS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Estimasi Volume (Liter) <span class="text-red-500">*</span></label>
                        <input type="number" name="volume" step="0.1" min="0.1" value="{{ old('volume', $data->volume) }}" placeholder="0.00" class="w-full p-3 bg-white border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 transition-all text-slate-800 font-medium placeholder-slate-400" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Status Transaksi Saat Ini</label>
                        <input type="text" value="{{ $data->status }}" class="w-full p-3 bg-slate-100 border border-slate-200 rounded-xl text-sm text-slate-400 uppercase font-bold outline-none cursor-not-allowed tracking-wide" readonly>
                    </div>
                </div>

                {{-- REVISI: DROPDOWN REGION BERTIAGKAT AKTIF KEMBALI DENGAN KONTRAS TINGGI --}}
                <div class="border-t border-slate-100 pt-6 space-y-4">
                    <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2 mb-3">
                        <i class="fas fa-map-marked-alt text-emerald-600"></i> Detail Struktur Wilayah Penjemputan
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Wilayah Region <span class="text-red-500">*</span></label>
                            <select id="region" class="w-full p-3 bg-white border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 transition-all text-slate-800 font-medium" required onchange="filterKecamatan()">
                                <option value="">-- Pilih Wilayah --</option>
                                <option value="Surabaya Pusat">Surabaya Pusat</option>
                                <option value="Surabaya Barat">Surabaya Barat</option>
                                <option value="Surabaya Timur">Surabaya Timur</option>
                                <option value="Surabaya Utara">Surabaya Utara</option>
                                <option value="Surabaya Selatan">Surabaya Selatan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Kecamatan <span class="text-red-500">*</span></label>
                            <select id="kecamatan" class="w-full p-3 bg-white border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 transition-all text-slate-800 font-medium disabled:bg-slate-100 disabled:text-slate-400" required disabled onchange="filterKelurahan()">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Kelurahan / Desa <span class="text-red-500">*</span></label>
                            <select id="kelurahan" class="w-full p-3 bg-white border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 transition-all text-slate-800 font-medium disabled:bg-slate-100 disabled:text-slate-400" required disabled>
                                <option value="">-- Pilih Kelurahan --</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Nama Jalan, Blok, & Nomor Rumah <span class="text-red-500">*</span></label>
                        <textarea id="jalan" rows="3" placeholder="Tuliskan detail nama jalan, RT/RW, nomor rumah, atau penunjuk lokasi spesifik..." class="w-full p-3 bg-white border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 transition-all text-slate-800 placeholder-slate-400 font-medium" required></textarea>
                    </div>
                </div>

                <div class="flex gap-3 border-t border-slate-100 pt-6">
                    <button type="submit" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:opacity-95 transition shadow-md shadow-emerald-100/50 transform hover:scale-[1.01] active:scale-95">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('pelanggan.dashboard') }}" class="bg-slate-100 text-slate-600 px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-200 transition text-center flex items-center justify-center">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

    {{-- FOOTER --}}
    <footer class="text-center py-8 text-gray-400 text-xs border-t border-gray-100 bg-white tracking-wide mt-auto font-medium">
        &copy; 2026 Greasycle — Pemrograman Website {{ Auth::user()->nama }} | Built with Laravel & Tailwind CSS
    </footer>

    {{-- SCRIPTS ENGINE AREA --}}
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
                "Tandes": ["Balongsari", "Banjar Sugihan", "Karang Poh", "Manukan Kulon", "Manukan Wetan", "Tandes"]
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

        // AMANKAN: Logika auto-parsing string alamat lama biar dropdown langsung kepilih otomatis saat halaman dibuka
        window.addEventListener('DOMContentLoaded', () => {
            const alamatLama = document.getElementById('alamat_jemput_asli').value;
            if (alamatLama) {
                try {
                    // Contoh string: "Jl. Rungkut No. 5, Kel. Kalirungkut, Kec. Rungkut, Surabaya Timur, Kota Surabaya"
                    const parts = alamatLama.split(', ');
                    
                    // Deteksi region dari string alamat
                    let regionFound = "";
                    const regions = ["Surabaya Pusat", "Surabaya Barat", "Surabaya Timur", "Surabaya Utara", "Surabaya Selatan"];
                    regions.forEach(r => {
                        if(alamatLama.includes(r)) regionFound = r;
                    });

                    // Ambil nama Jalan di part awal
                    let jalanFound = parts[0] || "";
                    
                    // Ambil kelurahan dan kecamatan dengan membuang embel-embel "Kel. " & "Kec. "
                    let kelFound = parts.find(p => p.startsWith("Kel. ")) ? parts.find(p => p.startsWith("Kel. ")).replace("Kel. ", "") : "";
                    let kecFound = parts.find(p => p.startsWith("Kec. ")) ? parts.find(p => p.startsWith("Kec. ")).replace("Kec. ", "") : "";

                    if (regionFound) {
                        document.getElementById('region').value = regionFound;
                        filterKecamatan();
                        
                        if (kecFound) {
                            document.getElementById('kecamatan').value = kecFound;
                            filterKelurahan();
                            
                            if (kelFound) {
                                document.getElementById('kelurahan').value = kelFound;
                            }
                        }
                    }
                    
                    // Masukkan kembali teks sisa nama jalan ke kolom textarea
                    document.getElementById('jalan').value = jalanFound;
                } catch(e) {
                    // Fallback kalau parsing string gagal, taruh mentah-mentah ke textarea jalan
                    document.getElementById('jalan').value = alamatLama;
                }
            }
        });
    </script>
</body>
</html>