@extends('layout.master')

@section('title', 'Cetak Kas Sosial Masjid')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Cetak Laporan Kas Sosial Masjid</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('laporan.kas.sosial.cetak') }}" target="_blank">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Cetak Laporan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
