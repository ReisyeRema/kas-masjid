@extends('layout.master')

@section('title', 'Dashboard')

@section('content')

    <h2>DASHBOARD</h2>
    <!-- Kas Masjid -->
    <h3 class="fw-bold mb-3 mt-5">Kas Masjid</h3>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-arrow-alt-circle-up"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Pemasukan Kas Masjid</p>
                                <h4 class="card-title">Rp {{ number_format($totalPemasukanMasjid, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Pengeluaran Kas Masjid</p>
                                <h4 class="card-title">Rp {{ number_format($totalPengeluaranMasjid, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-success card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Saldo Kas Masjid</p>
                                <h4 class="card-title">Rp {{ number_format($saldoKasMasjid, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kas Sosial -->
    <h3 class="fw-bold mb-3 mt-2">Kas Sosial</h3>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-arrow-alt-circle-up"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Pemasukan Kas Sosial</p>
                                <h4 class="card-title">Rp {{ number_format($totalPemasukanSosial, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Pengeluaran Kas Sosial</p>
                                <h4 class="card-title">Rp {{ number_format($totalPengeluaranSosial, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-success card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Saldo Kas Sosial</p>
                                <h4 class="card-title">Rp {{ number_format($saldoKasSosial, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
