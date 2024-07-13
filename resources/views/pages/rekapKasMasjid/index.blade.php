@extends('layout.master')

@section('title', 'Rekap Kas Masjid')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Rekap Kas Masjid</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
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
                            @php
                                $no = 1;
                                $totalPemasukan = 0;
                                $totalPengeluaran = 0;
                            @endphp
                            @foreach ($pemasukanMasjid as $pemasukan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pemasukan->tanggal)->format('d M Y') }}</td>
                                    <td>{{ $pemasukan->uraian }}</td>
                                    <td>Rp {{ number_format($pemasukan->jumlah, 2, ',', '.') }}</td>
                                    <td></td>
                                </tr>
                                @php
                                    $totalPemasukan += $pemasukan->jumlah;
                                @endphp
                            @endforeach
                            @foreach ($pengeluaranMasjid as $pengeluaran)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d M Y') }}</td>
                                    <td>{{ $pengeluaran->uraian }}</td>
                                    <td></td>
                                    <td>Rp {{ number_format($pengeluaran->jumlah, 2, ',', '.') }}</td>
                                </tr>
                                @php
                                    $totalPengeluaran += $pengeluaran->jumlah;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" style="text-align:right">Total:</th>
                                <th>Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</th>
                                <th>Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <h4 class="text-end fw-bold" style="color: blue;">Saldo Akhir: Rp {{ number_format($saldoAkhir, 2, ',', '.') }}</h4>
                @if (!empty($keterangan))
                    <p class="text-end fw-bold" style="color: red;">{{ $keterangan }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
