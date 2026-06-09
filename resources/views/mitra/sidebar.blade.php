{{-- Toggle Button (mobile) --}}
<button id="sidebarToggle" class="fixed top-4 left-4 z-50 bg-[#1a5c38] text-white p-2 rounded-lg md:hidden">
    <i class="fas fa-bars"></i>
</button>

{{-- Overlay --}}
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-20 hidden md:hidden"></div>

<aside id="sidebar" class="w-64 bg-[#1a5c38] text-white flex flex-col fixed h-full z-30 transition-transform duration-300 -translate-x-full md:translate-x-0">
    <div class="p-6 border-b border-green-700">
        <p class="text-xl font-bold tracking-tight">🌿 Greasycle</p>
    </div>

    <div class="px-6 py-4 border-b border-green-700">
        <div class="flex items-center gap-3">
            <div class="bg-white text-[#1a5c38] rounded-full w-10 h-10 flex items-center justify-center font-bold text-lg">
                {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
            </div>
            <div>
                <p class="font-bold text-sm">{{ Auth::user()->nama }}</p>
                <p class="text-green-300 text-xs">Mitra</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 p-4 space-y-1">
        <a href="{{ route('mitra.dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm transition {{ request()->routeIs('mitra.dashboard') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            <i class="fas fa-th-large w-4"></i> Dashboard
        </a>
        <a href="{{ route('mitra.tugas') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm transition {{ request()->routeIs('mitra.tugas') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            <i class="fas fa-truck w-4"></i> Tugas Penjemputan
        </a>
        <a href="{{ route('mitra.riwayat') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm transition {{ request()->routeIs('mitra.riwayat') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            <i class="fas fa-history w-4"></i> Riwayat
        </a>
    </nav>

    <div class="p-4 border-t border-green-700">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 text-sm w-full transition">
                <i class="fas fa-sign-out-alt w-4"></i> Keluar
            </button>
        </form>
    </div>
</aside>

<script>
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
</script>