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

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full p-4 bg-gray-50 border rounded-2xl focus:outline-secondary text-sm" required>
                <input type="password" name="password" placeholder="Password" class="w-full p-4 bg-gray-50 border rounded-2xl focus:outline-secondary text-sm" required>
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
            <form action="{{ route('register') }}" method="POST" onsubmit="return validateReg(event)" class="space-y-4">
                @csrf
                <input type="text" id="regNama" name="nama" placeholder="Nama Lengkap" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm" required>
                <input type="text" id="regTelp" name="no_telp" placeholder="No. Telepon" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm" required>
                <input type="email" name="email" placeholder="Email" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm" required>
                <input type="password" id="regPass" name="password" placeholder="Password" class="w-full p-3 bg-gray-50 border rounded-2xl text-sm" required>
                
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