<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setor Minyak - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-white text-slate-800 py-4 px-[8%] flex flex-col md:flex-row justify-between items-center shadow-sm border-b border-slate-100 sticky top-0 z-50">
        <div class="flex items-center gap-3 mb-4 md:mb-0">
            <div class="w-10 h-10 bg-linear-to-br from-emerald-400 to-blue-500 rounded-xl flex items-center justify-center text-white shadow-md shadow-emerald-100">
                <i class="fas fa-tint text-xl"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-slate-900">Greasycle<span class="text-emerald-500">.</span></h1>
                <p class="text-[10px] text-slate-400 font-medium tracking-wider uppercase -mt-1">Pelanggan Portal</p>
            </div>
        </div>
        
        <div class="flex flex-wrap items-center justify-center gap-6 text-sm font-semibold text-slate-600">
            <a href="{{ route('pelanggan.dashboard') }}" class="hover:text-emerald-600 transition flex items-center gap-2">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
            <a href="{{ route('pelanggan.setor') }}" class="text-emerald-600 border-b-2 border-emerald-500 pb-1 flex items-center gap-2">
                <i class="fas fa-shuttle-van"></i> Setor Minyak
            </a>
            <a href="/" class="text-blue-600 hover:text-blue-700 transition flex items-center gap-2 bg-blue-50 hover:bg-blue-100/70 px-3 py-1.5 rounded-lg border border-blue-100">
                <i class="fas fa-external-link-alt text-xs"></i> Halaman Publik
            </a>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-6 py-10 grow w-full">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            
            <div class="mb-6">
                <a href="{{ route('pelanggan.dashboard') }}" class="text-blue-600 hover:underline text-sm font-semibold flex items-center gap-1.5">
                    <i class="fas fa-chevron-left text-xs"></i> Kembali ke Dashboard
                </a>
                <h2 class="text-2xl font-bold text-slate-900 mt-3">Form Pengajuan Setor Minyak</h2>
                <p class="text-slate-400 text-sm mt-0.5">Pilih wilayah regional Kota Surabaya untuk pemetaan tim penjemputan lapangan.</p>
            </div>

            <form action="{{ route('pelanggan.setor.store') }}" method="POST" onsubmit="gabungkanAlamat()" class="space-y-6">
                @csrf
                
                <input type="hidden" name="alamat_jemput" id="alamat_jemput_asli">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Estimasi Volume (Liter) <span class="text-red-500">*</span></label>
                        <input type="number" name="volume" step="0.1" min="0.1" placeholder="Masukkan angka (contoh: 3.5)" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-emerald-500 focus:bg-white transition-all" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Catatan Tambahan (Opsional)</label>
                        <input type="text" name="catatan" placeholder="Contoh: Pagar warna putih / titip satpam" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-emerald-500 focus:bg-white transition-all">
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-6 space-y-4">
                    <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2 mb-3">
                        <i class="fas fa-map-marked-alt text-blue-500"></i> Detail Struktur Wilayah Penjemputan
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Wilayah Region <span class="text-red-500">*</span></label>
                            <select id="region" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 focus:bg-white transition-all" required onchange="filterKecamatan()">
                                <option value="">-- Pilih Wilayah --</option>
                                <option value="Surabaya Pusat">Surabaya Pusat</option>
                                <option value="Surabaya Barat">Surabaya Barat</option>
                                <option value="Surabaya Timur">Surabaya Timur</option>
                                <option value="Surabaya Utara">Surabaya Utara</option>
                                <option value="Surabaya Selatan">Surabaya Selatan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Kecamatan <span class="text-red-500">*</span></label>
                            <select id="kecamatan" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 focus:bg-white transition-all" required disabled onchange="filterKelurahan()">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Kelurahan / Desa <span class="text-red-500">*</span></label>
                            <select id="kelurahan" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 focus:bg-white transition-all" required disabled>
                                <option value="">-- Pilih Kelurahan --</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Nama Jalan, Blok, & Nomor Rumah <span class="text-red-500">*</span></label>
                        <textarea id="jalan" rows="3" placeholder="Tuliskan detail nama jalan, RT/RW, nomor rumah, atau penunjuk lokasi spesifik..." class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 focus:bg-white transition-all" required></textarea>
                    </div>
                </div>

                <div class="flex gap-3 border-t border-slate-100 pt-6">
                    <button type="submit" class="bg-linear-to-r from-emerald-500 to-teal-600 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:from-emerald-600 hover:to-teal-700 transition shadow-md shadow-emerald-100">
                        Ajukan Jadwal Penjemputan
                    </button>
                    <a href="{{ route('pelanggan.dashboard') }}" class="bg-slate-100 text-slate-600 px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-200 transition text-center">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

    <footer class="text-center py-8 text-gray-400 text-xs border-t border-gray-100 bg-white tracking-wide mt-auto">
        &copy; 2026 Greasycle — Pemrograman Website {{ Auth::user()->nama }} | Built with Laravel & Tailwind CSS
    </footer>

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
    </script>
</body>
</html>