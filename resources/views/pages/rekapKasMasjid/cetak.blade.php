<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 1600px;
            margin: 25px auto;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table.static {
            width: 90%;
            margin-top: 20px;
            margin-bottom: 20px;
            border-collapse: collapse;
            font-size: 11px;
        }

        table.static th,
        table.static td {
            border: 1px solid #543535;
            padding: 3px;
            text-align: center;
        }

        table.static th {
            background-color: #7adbdb;
        }

        table.static tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table.static tr:hover {
            background-color: #f1f1f1;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
    <title>Cetak Laporan Kas Masjid</title>
</head>

<body>
    <div class="container">
        <h2>LAPORAN KAS MASJID AL-JIHAD PANGKALAN KERINCI</h2>
        <h4>PERIODE : {{ \Carbon\Carbon::parse($tanggalMulai)->format('d M Y') }} HINGGA {{ \Carbon\Carbon::parse($tanggalSelesai)->format('d M Y') }}</h4>
        <table class="static">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Pemasukkan</th>
                    <th>Pengeluaran</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($pemasukanMasjid as $pemasukan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ \Carbon\Carbon::parse($pemasukan->tanggal)->format('d M Y') }}</td>
                        <td>{{ $pemasukan->uraian }}</td>
                        <td>Rp {{ number_format($pemasukan->jumlah, 2, ',', '.') }}</td>
                        <td></td>
                    </tr>
                @endforeach
                @foreach ($pengeluaranMasjid as $pengeluaran)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d M Y') }}</td>
                        <td>{{ $pengeluaran->uraian }}</td>
                        <td></td>
                        <td>Rp {{ number_format($pengeluaran->jumlah, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong>Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</strong></td>
                    <td><strong>Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</strong></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Saldo Akhir</strong></td>
                    <td colspan="2"><strong>Rp {{ number_format($saldoAkhir, 2, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
