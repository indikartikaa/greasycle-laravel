<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Laravel 12 - Greasycle CRUD Non-DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #0d6efd !important; }
        .table th { vertical-align: middle; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Belajar Laravel 12</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50" href="#">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link active text-white" href="#">Produk Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4 fw-bold">Daftar Produk Kami</h1>

        <button class="btn btn-primary mb-3 shadow-sm px-4" onclick="bukaModalTambah()">
            Tambah Data
        </button>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 fw-bold">
                Daftar Produk
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0 align-middle" id="tabelProduk">
                        <thead class="table-light text-center">
                            <tr>
                                <th width="60">No</th>
                                <th>Nama Produk</th>
                                <th width="100">Stok</th>
                                <th width="150">Harga</th>
                                <th width="200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $index => $p)
                            <tr>
                                <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                <td class="nama-produk ps-3">{{ $p['nama'] }}</td>
                                <td class="stok-produk text-center">{{ $p['stok'] }}</td>
                                <td class="harga-produk text-end pe-4">{{ number_format($p['harga'], 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-danger btn-sm px-3" onclick="if(confirm('Yakin ingin menghapus data ini?')) this.closest('tr').remove()">Hapus</button>
                                        <button class="btn btn-warning btn-sm px-3 text-white" onclick="bukaModalEdit(this)">Edit</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalProduk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formProduk">
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">NAMA PRODUK</label>
                            <input type="text" id="inputNama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">STOK</label>
                            <input type="number" id="inputStok" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">HARGA</label>
                            <input type="number" id="inputHarga" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btnSimpan" onclick="simpanData()">Simpan Data</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let editElement = null;
        const modalProduk = new bootstrap.Modal(document.getElementById('modalProduk'));

        function bukaModalTambah() {
            editElement = null;
            document.getElementById('modalTitle').innerText = "Tambah Produk";
            document.getElementById('formProduk').reset();
            modalProduk.show();
        }

        function bukaModalEdit(btn) {
            editElement = btn.closest('tr');
            document.getElementById('modalTitle').innerText = "Edit Produk";
            
            const nama = editElement.querySelector('.nama-produk').innerText;
            const stok = editElement.querySelector('.stok-produk').innerText;
            const harga = editElement.querySelector('.harga-produk').innerText.replace(/\./g, '');

            document.getElementById('inputNama').value = nama;
            document.getElementById('inputStok').value = stok;
            document.getElementById('inputHarga').value = harga;
            
            modalProduk.show();
        }

        function simpanData() {
            const nama = document.getElementById('inputNama').value;
            const stok = document.getElementById('inputStok').value;
            const harga = document.getElementById('inputHarga').value;

            if(!nama || !stok || !harga) return alert("Mohon isi semua data!");

            if (editElement) {
                editElement.querySelector('.nama-produk').innerText = nama;
                editElement.querySelector('.stok-produk').innerText = stok;
                editElement.querySelector('.harga-produk').innerText = Number(harga).toLocaleString('id-ID');
            } else {
                const tabel = document.getElementById('tabelProduk').getElementsByTagName('tbody')[0];
                const barisBaru = tabel.insertRow();
                const no = tabel.rows.length;

                barisBaru.innerHTML = `
                    <td class="text-center fw-bold">${no}</td>
                    <td class="nama-produk ps-3">${nama}</td>
                    <td class="text-center stok-produk">${stok}</td>
                    <td class="harga-produk text-end pe-4">${Number(harga).toLocaleString('id-ID')}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-danger btn-sm px-3" onclick="if(confirm('Yakin ingin menghapus data ini?')) this.closest('tr').remove()">Hapus</button>
                            <button class="btn btn-warning btn-sm px-3 text-white" onclick="bukaModalEdit(this)">Edit</button>
                        </div>
                    </td>
                `;
            }
            modalProduk.hide();
        }
    </script>
</body>
</html>