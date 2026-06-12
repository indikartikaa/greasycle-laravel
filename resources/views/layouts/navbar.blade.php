<nav class="bg-white/95 backdrop-blur-sm py-4 px-[8%] sticky top-0 z-50 shadow-sm border-b border-gray-100">
    <div class="flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-extrabold text-primary no-underline tracking-tight">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-md">
                <i class="fas fa-recycle text-xs"></i>
            </div>
            Greasy<span class="text-emerald-500">cle</span>
        </a>
        
        <ul class="hidden md:flex list-none gap-8 items-center m-0 p-0">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-[#666] font-medium hover:text-primary' }} transition duration-300">Beranda</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-[#666] font-medium hover:text-primary' }} transition duration-300">Tentang</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-[#666] font-medium hover:text-primary' }} transition duration-300">Kontak</a></li>
            <li><a href="{{ route('portofolio') }}" class="{{ request()->routeIs('portofolio') ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-[#666] font-medium hover:text-primary' }} transition duration-300">Portofolio</a></li>
            
            <li class="ml-4">
                @auth
                    <div class="flex items-center gap-3 bg-accent/30 px-3.5 py-1.5 rounded-xl border border-accent/60 text-xs font-semibold">
                        <a href="{{ route('pelanggan.dashboard') }}" class="text-primary hover:text-secondary flex items-center gap-1.5 transition">
                            <div class="w-5 h-5 bg-primary text-white rounded-full flex items-center justify-center text-[10px] font-bold uppercase">
                                {{ substr(Auth::user()->nama, 0, 1) }}
                            </div>
                            <span class="hidden lg:inline">Dashboard</span>
                        </a>
                        <div class="w-px h-3 bg-primary/20"></div>
                        <form action="{{ route('logout') }}" method="POST" class="inline m-0 p-0">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700 transition bg-transparent border-none p-0 cursor-pointer font-bold text-[11px] uppercase tracking-wide">Keluar</button>
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

    {{-- MOBILE MENU RESPONSIVE --}}
    <ul id="mobile-menu" class="hidden flex-col absolute top-full left-0 w-full bg-white shadow-lg p-6 space-y-4 md:hidden border-t border-gray-100 list-none m-0">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary font-bold' : 'text-[#666]' }}">Beranda</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-primary font-bold' : 'text-[#666]' }}">Tentang</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-primary font-bold' : 'text-[#666]' }}">Kontak</a></li>
        <li><a href="{{ route('portofolio') }}" class="{{ request()->routeIs('portofolio') ? 'text-primary font-bold' : 'text-[#666]' }}">Portofolio</a></li>
        @auth
            <li><a href="{{ route('pelanggan.dashboard') }}" class="block w-full text-center bg-emerald-50 text-emerald-700 py-3 rounded-xl font-bold text-sm">Portal Dashboard</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="w-full m-0 p-0">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-xl font-bold text-sm">Keluar</button>
                </form>
            </li>
        @else
            <li><button onclick="openAuth()" class="w-full bg-primary text-white py-3 rounded-xl font-bold text-sm">Login</button></li>
        @endauth
    </ul>
</nav>

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
</script>