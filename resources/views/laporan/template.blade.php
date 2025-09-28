<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $judul ?? 'Laporan Pengembalian Barang' }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2, h4 {
            text-align: center;
            margin: 0;
        }
        .periode {
            text-align: center;
            margin: 10px 0 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #444;
            padding: 6px;
            text-align: left;
            font-size: 11px;
        }
        th {
            background: #f2f2f2;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <h2>Inventaris Barang</h2>
    <h4>{{ $judul ?? 'Laporan Pengembalian Barang' }}</h4>

    <div class="periode">
        Periode: 
        {{ \Carbon\Carbon::parse($periode_mulai)->translatedFormat('d F Y') }} 
        s/d 
        {{ \Carbon\Carbon::parse($periode_selesai)->translatedFormat('d F Y') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Tanggal Dikembalikan</th>
                <th>Status</th>
                <th>Keperluan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $no => $item)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $item->barang->name ?? '-' }}</td>
                <td>{{ $item->nama_peminjam }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_dikembalikan)->format('d-m-Y') }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>{{ $item->keperluan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align:center;">Tidak ada data pengembalian</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}
    </div>
</body>
</html>
