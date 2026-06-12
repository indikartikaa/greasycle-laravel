@unless(Auth::check())

@push('styles')
<style>
    /* Transisi panel kiri-kanan */
    @keyframes slideIn {
        from { opacity: 0; transform: translateX(20px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    .panel-slide { animation: slideIn 0.35s ease forwards; }

    /* Input focus ring custom */
    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #2d6a4f;
        box-shadow: 0 0 0 3px rgba(45,106,79,0.12);
    }
    .animate-fade-in { animation: fadeIn 0.3s ease-in-out; }
</style>
@endpush

<div id="authModal" class="fixed inset-0 z-[3000] hidden bg-black/60 backdrop-blur-sm overflow-y-auto px-4 py-6 flex items-center justify-center">
    
    <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl flex min-h-[550px] overflow-hidden my-auto">
        
        <button onclick="closeAuth()" class="absolute top-5 right-6 z-[60] text-gray-400 hover:text-red-500 transition text-2xl">
            <i class="fas fa-times"></i>
        </button>

        {{-- ════════ PANEL KIRI (Branding) ════════ --}}
        <div class="hidden md:flex w-5/12 bg-primary flex-col justify-between p-10 relative overflow-hidden">
            <div class="absolute -top-16 -left-16 w-64 h-64 bg-white/5 rounded-full"></div>
            <div class="absolute -bottom-20 -right-10 w-80 h-80 bg-white/5 rounded-full"></div>

            <div class="flex items-center gap-3 z-10">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-recycle text-white"></i>
                </div>
                <span class="text-white font-bold text-xl">Greasycle</span>
            </div>

            <div class="z-10 space-y-6">
                <div class="w-20 h-20 bg-white/15 rounded-3xl flex items-center justify-center">
                    <i class="fas fa-leaf text-accent text-4xl"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white leading-tight">
                        Bersama kita jaga<br>bumi lebih hijau.
                    </h2>
                    <p class="text-white/60 text-sm mt-3 leading-relaxed">
                        Setor minyak jelantahmu, dapatkan saldo digital, dan bantu lingkungan tetap bersih.
                    </p>
                </div>

                <div class="space-y-3 pt-2">
                    <div class="flex items-center gap-3 text-sm text-white/80">
                        <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-accent text-xs"></i>
                        </div>
                        Penjemputan hingga 3 hari setelah request
                    </div>
                    <div class="flex items-center gap-3 text-sm text-white/80">
                        <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-accent text-xs"></i>
                        </div>
                        Saldo digital dari setiap liter jelantah
                    </div>
                    <div class="flex items-center gap-3 text-sm text-white/80">
                        <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-accent text-xs"></i>
                        </div>
                        Pantau status penjemputan real-time
                    </div>
                </div>
            </div>

            <p class="text-white/30 text-[10px] uppercase tracking-widest z-10">
                © 2026 Greasycle · Surabaya
            </p>
        </div>

        {{-- ════════ PANEL KANAN (Form) ════════ --}}
        {{-- class justify-start dan max-h-[85vh] memastikan bisa discroll full --}}
        <div class="flex-1 flex flex-col justify-start px-8 md:px-10 py-8 bg-white relative z-50 overflow-y-auto max-h-[85vh]">

            {{-- TABS --}}
            <div class="flex bg-gray-100 rounded-2xl p-1 mb-6 w-full max-w-sm mx-auto shrink-0 mt-2">
                <button id="tabLogin" onclick="showTab('login')"
                    class="flex-1 py-2 rounded-xl text-sm font-semibold transition duration-200 bg-primary text-white shadow">
                    Masuk
                </button>
                <button id="tabRegister" onclick="showTab('register')"
                    class="flex-1 py-2 rounded-xl text-sm font-semibold transition duration-200 text-gray-400 hover:text-gray-600">
                    Daftar
                </button>
            </div>

            {{-- ── FORM LOGIN ── --}}
            <div id="formLogin" class="panel-slide w-full max-w-sm mx-auto space-y-4 pb-8">
                <div>
                    <h3 class="text-2xl font-bold text-primary">Selamat Datang 👋</h3>
                    <p class="text-gray-400 text-sm mt-1">Masuk ke akun Greasycle-mu</p>
                </div>

                @if ($errors->has('login_error'))
                <div class="bg-red-50 text-red-600 p-3 rounded-xl text-xs mb-4 font-medium border border-red-200">
                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $errors->first('login_error') }}
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold text-primary">Email</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 text-sm"></i>
                            <input type="email" id="loginEmail" name="email" value="{{ old('email') }}" placeholder="email@contoh.com"
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-2xl text-sm bg-gray-50 transition" required>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold text-primary">Password</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 text-sm"></i>
                            <input type="password" id="loginPassword" name="password" placeholder="••••••••"
                                class="w-full pl-10 pr-12 py-3 border border-gray-200 rounded-2xl text-sm bg-gray-50 transition" required>
                            <button type="button" onclick="togglePass('loginPassword', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 hover:text-gray-500 transition">
                                <i class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-3.5 rounded-2xl font-bold hover:bg-secondary transition duration-300 text-sm shadow-md mt-2">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </button>
                </form>

                <p class="text-center text-xs text-gray-400">
                    Belum punya akun?
                    <button onclick="showTab('register')" class="text-primary font-semibold hover:underline">Daftar sekarang</button>
                </p>
            </div>

            {{-- ── FORM REGISTER ── --}}
            <div id="formRegister" class="hidden panel-slide w-full max-w-sm mx-auto space-y-3 pb-8">
                <div class="mb-2">
                    <h3 class="text-2xl font-bold text-primary">Buat Akun Baru 🌱</h3>
                    <p class="text-gray-400 text-sm mt-1">Bergabung dan mulai berkontribusi</p>
                </div>

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateReg(event)" class="space-y-3">
                    @csrf
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-semibold text-primary">Nama Lengkap <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-300 text-xs"></i>
                                <input type="text" id="regNama" name="nama" placeholder="Nama Anda"
                                    class="w-full pl-8 pr-3 py-2 border border-gray-200 rounded-xl text-sm bg-gray-50 transition" required>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-semibold text-primary">No. Telepon <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-300 text-xs"></i>
                                <input type="text" id="regTelp" name="no_telp" placeholder="08xxx"
                                    class="w-full pl-8 pr-3 py-2 border border-gray-200 rounded-xl text-sm bg-gray-50 transition" required>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold text-primary">Email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 text-sm"></i>
                            <input type="email" id="regEmail" name="email" placeholder="email@contoh.com"
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-xl text-sm bg-gray-50 transition" required>
                        </div>
                    </div>

                    {{-- Alamat Penjemputan WAJIB --}}
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold text-primary">Alamat Penjemputan Lengkap <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-4 top-3 text-gray-300 text-sm"></i>
                            <textarea id="regAlamat" name="alamat" rows="2" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-xl text-sm bg-gray-50 transition resize-none" required></textarea>
                        </div>
                    </div>

                    {{-- Pilihan Role --}}
                    <div class="flex flex-col gap-1">
                        <label class="text-xs font-semibold text-primary">Daftar Sebagai <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="cursor-pointer">
                                <input type="radio" name="role" value="pelanggan" class="sr-only peer role-selector" checked>
                                <div class="peer-checked:border-primary peer-checked:bg-accent border-2 border-gray-200 rounded-xl p-2 text-center transition hover:border-gray-300 h-full flex flex-col justify-center">
                                    <i class="fas fa-home text-primary text-base mb-1 block"></i>
                                    <p class="text-[10px] font-bold text-primary leading-tight">Rumah Tangga</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="role" value="usaha" class="sr-only peer role-selector">
                                <div class="peer-checked:border-primary peer-checked:bg-accent border-2 border-gray-200 rounded-xl p-2 text-center transition hover:border-gray-300 h-full flex flex-col justify-center">
                                    <i class="fas fa-store text-primary text-base mb-1 block"></i>
                                    <p class="text-[10px] font-bold text-primary leading-tight">Usaha (UMKM)</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="role" value="mitra" class="sr-only peer role-selector">
                                <div class="peer-checked:border-primary peer-checked:bg-emerald-100 border-2 border-gray-200 rounded-xl p-2 text-center transition hover:border-gray-300 h-full flex flex-col justify-center">
                                    <i class="fas fa-truck text-emerald-600 text-base mb-1 block"></i>
                                    <p class="text-[10px] font-bold text-emerald-700 leading-tight">Mitra Pengepul</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Form Dinamis Usaha --}}
                    <div id="usahaArea" class="hidden flex-col gap-1 animate-fade-in">
                        <label class="text-xs font-semibold text-primary">Nama Usaha / Resto <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-utensils absolute left-3 top-1/2 -translate-y-1/2 text-gray-300 text-xs"></i>
                            <input type="text" id="namaUsaha" name="nama_usaha" placeholder="Contoh: Ayam Geprek Bu Siti"
                                class="w-full pl-8 pr-3 py-2 border border-gray-200 rounded-xl text-sm bg-gray-50 transition">
                        </div>
                    </div>

                    {{-- Form Dinamis Mitra --}}
                    <div id="mitraDokumenArea" class="hidden flex-col gap-1 bg-emerald-50 p-3 rounded-xl border border-emerald-200 animate-fade-in">
                        <label class="text-[10px] font-bold text-emerald-700 uppercase tracking-widest"><i class="fas fa-file-upload mr-1"></i> Upload Izin Usaha / NIB <span class="text-red-500">*</span></label>
                        <input type="file" id="dokumenMitra" name="dokumen_mitra" accept=".pdf,.jpg,.jpeg,.png"
                            class="text-xs w-full mt-1 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 cursor-pointer text-slate-500">
                    </div>

                    <div class="flex flex-col gap-1 mt-2">
                        <label class="text-xs font-semibold text-primary">Password </label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 text-sm"></i>
                            <input type="password" id="regPassword" name="password" placeholder="Min. 6 karakter"
                                class="w-full pl-10 pr-12 py-2 border border-gray-200 rounded-xl text-sm bg-gray-50 transition" required>
                            <button type="button" onclick="togglePass('regPassword', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 hover:text-gray-500 transition">
                                <i class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-3 mt-3 rounded-xl font-bold hover:bg-secondary transition duration-300 text-sm shadow-md">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </button>
                </form>

                <p class="text-center text-xs text-gray-400 mt-2">
                    Sudah punya akun?
                    <button onclick="showTab('login')" class="text-primary font-semibold hover:underline">Masuk di sini</button>
                </p>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
    const modalAuth = document.getElementById('authModal');
    
    function openAuth() { 
        if(modalAuth) {
            modalAuth.classList.remove('hidden');
            modalAuth.classList.add('flex');
        }
        showTab('login'); 
    }
    
    function closeAuth() { 
        if(modalAuth) {
            modalAuth.classList.add('hidden');
            modalAuth.classList.remove('flex');
        }
    }
    
    window.onclick = (e) => { 
        if (e.target == modalAuth) closeAuth(); 
    };

    function showTab(tab) {
        const isLogin = tab === 'login';

        document.getElementById('formLogin').classList.toggle('hidden', !isLogin);
        document.getElementById('formRegister').classList.toggle('hidden', isLogin);

        const activeForm = document.getElementById(isLogin ? 'formLogin' : 'formRegister');
        activeForm.classList.remove('panel-slide');
        void activeForm.offsetWidth;
        activeForm.classList.add('panel-slide');

        document.getElementById('tabLogin').className    = `flex-1 py-2 rounded-xl text-sm font-semibold transition duration-200 ${isLogin  ? 'bg-primary text-white shadow' : 'text-gray-400 hover:text-gray-600'}`;
        document.getElementById('tabRegister').className = `flex-1 py-2 rounded-xl text-sm font-semibold transition duration-200 ${!isLogin ? 'bg-primary text-white shadow' : 'text-gray-400 hover:text-gray-600'}`;
    }

    // ── Logic Tampilkan Form Dinamis Berdasarkan Role ──
    const roleSelectors = document.querySelectorAll('.role-selector');
    const usahaArea = document.getElementById('usahaArea');
    const namaUsahaInput = document.getElementById('namaUsaha');
    const mitraDokumenArea = document.getElementById('mitraDokumenArea');
    const dokumenMitraInput = document.getElementById('dokumenMitra');

    roleSelectors.forEach(radio => {
        radio.addEventListener('change', function() {
            // Sembunyikan semua field tambahan
            usahaArea.classList.add('hidden');
            usahaArea.classList.remove('flex');
            namaUsahaInput.required = false;

            mitraDokumenArea.classList.add('hidden');
            mitraDokumenArea.classList.remove('flex');
            dokumenMitraInput.required = false;

            // Tampilkan field berdasarkan pilihan role
            if(this.value === 'usaha') {
                usahaArea.classList.remove('hidden');
                usahaArea.classList.add('flex');
                namaUsahaInput.required = true;
            } 
            else if(this.value === 'mitra') {
                mitraDokumenArea.classList.remove('hidden');
                mitraDokumenArea.classList.add('flex');
                dokumenMitraInput.required = true;
            }
        });
    });

    function fillDemo(email, pass) {
        document.getElementById('loginEmail').value    = email;
        document.getElementById('loginPassword').value = pass;
    }

    function togglePass(inputId, btn) {
        const input = document.getElementById(inputId);
        const isPass = input.type === 'password';
        input.type = isPass ? 'text' : 'password';
        btn.querySelector('i').className = `fas fa-eye${isPass ? '-slash' : ''} text-sm`;
    }

    function validateReg(e) {
        const telp = document.getElementById('regTelp').value;
        const pass = document.getElementById('regPassword').value;
        const alamat = document.getElementById('regAlamat').value;
        
        if (alamat.trim() === "") {
            alert("Alamat penjemputan wajib diisi!");
            return false;
        }
        if (isNaN(telp) || telp.length < 10) { 
            alert("Nomor telepon tidak valid!"); 
            return false; 
        }
        if (pass.length < 6) {
            alert("Password minimal 6 karakter!");
            return false;
        }
        return true;
    }

    @if ($errors->has('login_error'))
        document.addEventListener("DOMContentLoaded", function() {
            openAuth();
        });
    @endif
</script>
@endpush

@endunless