<!DOCTYPE html>
<html>
<head>
    <title>Rekap Transaksi Bulanan</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #004030; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { color: #004030; margin: 0; }
        .info { margin-bottom: 20px; }
        .info p { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #f0f7f4; color: #004030; font-weight: bold; }
        .summary { float: right; width: 300px; border: 1px solid #ddd; padding: 15px; background-color: #fafafa; }
        .summary p { margin: 5px 0; font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <h1>GREASYCLE INDONESIA</h1>
        <p>Rekapitulasi Penyetoran Minyak Jelantah Bulanan</p>
    </div>

    <div class="info">
        <p><strong>Nama Pelanggan:</strong> {{ $user->nama }}</p>
        <p><strong>Periode:</strong> {{ $bulan }}</p>
        <p><strong>Dicetak pada:</strong> {{ now()->locale('id')->translatedFormat('d F Y, H:i') }} WIB</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Volume (Liter)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>TRX-{{ $row->id }}</td>
                <td>{{ \Carbon\Carbon::parse($row->tgl_request)->format('d/m/Y') }}</td>
                <td>{{ number_format($row->volume, 2) }}</td>
                <td style="text-transform: uppercase;">{{ $row->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Belum ada transaksi di bulan ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <p>Total Volume Disetor : {{ number_format($total_volume, 2) }} L</p>
        <p>Estimasi Pendapatan : Rp {{ number_format($total_saldo, 0, ',', '.') }}</p>
    </div>

</body>
</html>