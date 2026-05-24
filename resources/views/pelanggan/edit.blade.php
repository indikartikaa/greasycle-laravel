<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Setoran - Greasycle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-[#fcfdfd] text-[#333] p-6">

    <div class="max-w-md mx-auto bg-white p-8 rounded-[30px] shadow-xl border border-gray-100 mt-10">
        <div class="flex items-center gap-3 mb-8">
            <a href="{{ route('pelanggan.dashboard') }}" class="text-gray-400 hover:text-primary transition"><i class="fas fa-arrow-left text-xl"></i></a>
            <h2 class="text-2xl font-bold text-[#004030] ">Edit Setoran</h2>
        </div>

        <form action="{{ route('pelanggan.transaksi.update', $data->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            
            <div>
                <label class="text-xs font-bold text-gray-400 uppercase">Volume (Liter)</label>
                <input type="number" name="volume" step="0.1" value="{{ $data->volume }}" required 
                       class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-primary outline-none">
            </div>

            <div>
                <label class="text-xs font-bold text-gray-400 uppercase">Alamat Penjemputan</label>
                <textarea name="alamat_jemput" rows="3" required 
                          class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-primary outline-none">{{ $data->alamat_jemput }}</textarea>
            </div>

            <button type="submit" class="w-full bg-[#004030] hover:bg-[#2d6a4f] text-white py-4 rounded-2xl font-bold shadow-lg transition-all duration-300">
                Simpan Perubahan
            </button>
        </form>
    </div>

</body>
</html>