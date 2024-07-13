<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemasukanMasjid;
use App\Models\PemasukanSosial;
use App\Models\PengeluaranMasjid;
use App\Models\PengeluaranSosial;
use App\Http\Controllers\DashboardController;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data pemasukan dan pengeluaran kas masjid
        $totalPemasukanMasjid = PemasukanMasjid::sum('jumlah');
        $totalPengeluaranMasjid = PengeluaranMasjid::sum('jumlah');
        $saldoKasMasjid = $totalPemasukanMasjid - $totalPengeluaranMasjid;

        // Mengambil data pemasukan dan pengeluaran kas sosial
        $totalPemasukanSosial = PemasukanSosial::sum('jumlah');
        $totalPengeluaranSosial = PengeluaranSosial::sum('jumlah');
        $saldoKasSosial = $totalPemasukanSosial - $totalPengeluaranSosial;

        return view('pages.dashboard.index', compact('saldoKasMasjid', 'saldoKasSosial','totalPemasukanMasjid','totalPengeluaranMasjid','totalPemasukanSosial','totalPengeluaranSosial'));
    }
}
