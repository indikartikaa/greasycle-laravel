<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Greasycle - Ubah Limbah Jadi Energi Hijau')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#004030',
                        secondary: '#2d6a4f',
                        accent: '#d1e7e0',
                    }
                }
            }
        }
    </script>

    <style>
        /* Global Styles Kloning Sempurna Sesuai Kode Native */
        * { 
            font-family: 'Poppins', sans-serif !important; 
        }
        
        body { 
            background-color: #f7faf9;
            color: #333;
            line-height: 1.625;
            font-size: 16px;
            scroll-behavior: smooth; 
        }

        a { text-decoration: none !important; }

        /* Modal Styles */
        .modal-auth { 
            display: none; 
            position: fixed; 
            z-index: 3000; 
            left: 0; top: 0; 
            width: 100%; height: 100%; 
            background: rgba(0,0,0,0.6); 
            backdrop-filter: blur(5px); 
        }
        .modal-content { 
            background: white; 
            padding: 40px; 
            width: 90%; 
            max-width: 450px; 
            border-radius: 30px; 
            position: absolute; 
            top: 50%; left: 50%; 
            transform: translate(-50%, -50%); 
        }
        .hidden-form { display: none; }

        /* FAQ Animation Styles */
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; }
        .faq-item.active .faq-answer { max-height: 500px; transition: max-height 0.5s ease-in; }
        .faq-item.active .faq-chevron { transform: rotate(180deg); }

        /* Footer Link Geser Custom Style */
        .footer-link {
            color: #d1e7e0 !important;
            text-decoration: none !important;
            border-bottom: none !important;
            transition: all 0.3s ease;
            display: inline-block;
        }
        .footer-link:hover {
            color: white !important;
            transform: translateX(5px);
            text-decoration: none !important;
        }
        .footer-link:visited, .footer-link:active {
            text-decoration: none !important;
            border-bottom: none !important;
        }
    </style>
</head>
<body class="overflow-x-hidden min-h-screen flex flex-col">

<nav class="bg-white py-4 px-[8%] sticky top-0 z-1000 shadow-md">
    <div class="flex justify-between items-center">
        <div class="text-2xl font-bold text-primary tracking-tight">Greasycle</div>
        
        <ul class="hidden md:flex list-none gap-8 items-center m-0 p-0">
            <li>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-[#666] font-medium hover:text-primary' }} transition duration-300">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-[#666] font-medium hover:text-primary' }} transition duration-300">
                    Tentang
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-[#666] font-medium hover:text-primary' }} transition duration-300">
                    Kontak
                </a>
            </li>
            <li>
                <a href="{{ route('portofolio') }}" class="{{ request()->routeIs('portofolio') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-[#666] font-medium hover:text-primary' }} transition duration-300">
                    Portofolio
                </a>
            </li>
            
            <li class="ml-4">
                @auth
                    <div class="flex items-center gap-4 bg-accent/30 px-4 py-2 rounded-full border border-accent">
                        <span class="text-primary font-bold text-sm italic">Halo, {{ Auth::user()->nama }}</span>
                        <div class="w-px h-4 bg-primary/20"></div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-500 text-[10px] font-extrabold uppercase tracking-widest hover:text-red-700 transition bg-transparent border-none p-0 cursor-pointer">Keluar</button>
                        </form>
                    </div>
                @else
                    <button onclick="openAuth()" class="bg-primary text-white px-8 py-2.5 rounded-full font-bold hover:bg-secondary transition shadow-lg shadow-primary/20 transform hover:scale-105 active:scale-95">
                        Login
                    </button>
                @endauth
            </li>
        </ul>

        <div id="menu-btn" class="md:hidden text-primary text-2xl cursor-pointer p-2">
            <i class="fas fa-bars"></i>
        </div>
    </div>

    <ul id="mobile-menu" class="hidden flex-col absolute top-full left-0 w-full bg-white shadow-lg p-6 space-y-4 md:hidden border-t border-gray-100 list-none m-0">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary font-bold' : 'text-[#666]' }}">Beranda</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-primary font-bold' : 'text-[#666]' }}">Tentang</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-primary font-bold' : 'text-[#666]' }}">Kontak</a></li>
        <li><a href="{{ route('portofolio') }}" class="{{ request()->routeIs('portofolio') ? 'text-primary font-bold' : 'text-[#666]' }}">Portofolio</a></li>
        @unless(Auth::check())
            <li><button onclick="openAuth()" class="w-full bg-primary text-white py-3 rounded-xl font-bold">Login</button></li>
        @endunless
    </ul>
</nav>

<div class="grow w-full">
    @yield('content')
</div>

<footer class="bg-primary pt-24 pb-12 mt-20 w-full">
    <div class="container mx-auto px-[8%]">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 mb-12 md:w-1/3">
                <h3 class="font-bold text-xl text-white mb-6 uppercase tracking-wider">Hubungi Kami</h3>
                <div class="space-y-3">
                    <p class="text-white font-semibold text-lg">PT Greasycle Indonesia</p>
                    <p class="text-accent opacity-80 leading-relaxed text-sm">
                        JL. Semampir Tengah VIII Blok B No 18 RT. 10 RW. 01,<br>
                        Kec. Sukolilo, Kota Surabaya, Prov. Jawa Timur 60119
                    </p>
                    <p class="text-accent opacity-80 text-sm">info@greasycle.id</p>
                    <p class="text-accent opacity-80 text-sm">+62 812-3456-7890</p>
                    <p class="text-accent opacity-80 text-sm">Senin-Jumat: 08.00 - 16.00 WIB</p>
                </div>
            </div>
            
            <div class="w-full px-4 mb-12 md:w-1/3">
                <h3 class="font-semibold text-xl text-white mb-8 uppercase tracking-wider">Layanan Kami</h3>
                <ul class="text-accent opacity-80 space-y-4 text-sm list-none p-0 m-0">
                    <li>Setor Jelantah</li>
                    <li>Penjemputan Rutin</li>
                    <li>Edukasi Ramah Lingkungan</li>
                    <li>Insentif Ekonomi</li>
                </ul>
            </div>

            <div class="w-full px-4 mb-12 md:w-1/3">
                <h3 class="font-semibold text-xl text-white mb-8 uppercase tracking-wider">Tautan</h3>
                <ul class="text-accent opacity-80 space-y-4 text-sm list-none p-0 m-0">
                    <li><a href="{{ route('home') }}" class="footer-link">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="footer-link">Tentang Kami</a></li>
                    <li><a href="{{ route('contact') }}" class="footer-link">Kontak</a></li>
                    <li><a href="{{ route('portofolio') }}" class="footer-link">Portofolio</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center mt-20 border-t border-white/10 pt-10 px-4 text-white">
        <p class="text-[10px] uppercase tracking-[0.2em] opacity-40">Pemrograman Website © 2026 Greasycle</p>
    </div>
</footer>

@unless(Auth::check())
<div id="authModal" class="modal-auth">
    <div class="modal-content shadow-2xl border border-gray-100 text-left">
        
        <div id="loginArea">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-primary">Masuk Akun</h2>
                <button onclick="closeAuth()" class="text-gray-400 hover:text-red-500 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            @if ($errors->has('email'))
                <div class="bg-red-50 text-red-600 p-3 rounded-xl text-xs mb-4 font-medium">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5" autocomplete="off">
                @csrf
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full p-4 bg-gray-50 border rounded-2xl focus:outline-secondary text-sm" autocomplete="off" required>
                <input type="password" name="password" placeholder="Password" class="w-full p-4 bg-gray-50 border rounded-2xl focus:outline-secondary text-sm" autocomplete="new-password" required>
                <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-bold hover:bg-secondary transition shadow-lg">Masuk Sekarang</button>
            </form>
            <p class="text-center text-sm mt-8 text-gray-500">Belum punya akun? <a href="javascript:void(0)" onclick="switchForm('register')" class="text-secondary font-bold hover:underline">Daftar</a></p>
        </div>

        <div id="registerArea" class="hidden-form">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-primary">Daftar Akun</h2>
                <button onclick="closeAuth()" class="text-gray-400 hover:text-red-500 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <form action="{{ route('register') }}" method="POST" onsubmit="return validateReg(event)" class="space-y-4" autocomplete="off">
                @csrf
                <input type="text" id="regNama" name="nama" placeholder="Nama Lengkap" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm" autocomplete="off" required>
                <input type="text" id="regTelp" name="no_telp" placeholder="No. Telepon" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm" autocomplete="off" required>
                <input type="email" name="email" placeholder="Email" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm" autocomplete="off" required>
                <input type="password" id="regPass" name="password" placeholder="Password" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm" autocomplete="new-password" required>
                
                <select name="role" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm focus:outline-secondary" required>
                    <option value="pelanggan">Ibu Rumah Tangga</option>
                    <option value="usaha">Pelaku Usaha (Resto/Cafe)</option>
                    <option value="mitra">Mitra (Pengepul Minyak)</option>
                </select>
                <button type="submit" class="w-full bg-secondary text-white py-4 rounded-2xl font-bold shadow-lg mt-2">Daftar Sekarang</button>
            </form>
            <p class="text-center text-sm mt-6 text-gray-500">Sudah punya akun? <a href="javascript:void(0)" onclick="switchForm('login')" class="text-primary font-bold hover:underline">Masuk</a></p>
        </div>

    </div>
</div>
@endunless

<script>
    // Mobile Menu Toggle
    const btnMenu = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (btnMenu && mobileMenu) {
        btnMenu.onclick = () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
        };
    }

    // Modal Operations (Dijalankan secara global lewat pemicu tombol nav)
    const modalAuth = document.getElementById('authModal');
    
    function openAuth() { 
        if(modalAuth) modalAuth.style.display = 'block'; 
        switchForm('login'); 
    }
    function closeAuth() { if(modalAuth) modalAuth.style.display = 'none'; }
    
    function switchForm(type) {
        const loginArea = document.getElementById('loginArea');
        const registerArea = document.getElementById('registerArea');
        if(loginArea && registerArea) {
            loginArea.style.display = (type === 'login') ? 'block' : 'none';
            registerArea.style.display = (type === 'register') ? 'block' : 'none';
        }
    }
    
    function validateReg(e) {
        const nama = document.getElementById('regNama').value;
        const telp = document.getElementById('regTelp').value;
        const pass = document.getElementById('regPass').value;
        if (nama.length < 3 || isNaN(telp) || telp.length < 10 || pass.length < 6) { 
            alert("Data tidak valid!"); return false; 
        }
        return true;
    }
    
    window.onclick = (e) => { if (e.target == modalAuth) closeAuth(); };
</script>
@stack('scripts')
</body>
</html>