<?php

namespace App\Http\Controllers;

use App\Models\PemasukanMasjid;
use App\Models\PengeluaranMasjid;
use Illuminate\Http\Request;

class RekapMasjidController extends Controller
{
    public function index()
    {
        $pemasukanMasjid = PemasukanMasjid::all();
        $pengeluaranMasjid = PengeluaranMasjid::all();

        $totalPemasukan = $pemasukanMasjid->sum('jumlah');
        $totalPengeluaran = $pengeluaranMasjid->sum('jumlah');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        // Jika saldo akhir negatif, set ke 0 dan tambahkan pesan keterangan
        $keterangan = '';
        if ($saldoAkhir < 0) {
            $saldoAkhir = 0;
            $keterangan = 'Saldo akhir tidak mencukupi';
        }

        return view('pages.rekapKasMasjid.index', compact('pemasukanMasjid', 'pengeluaranMasjid', 'totalPemasukan', 'totalPengeluaran', 'saldoAkhir', 'keterangan'));
    }

    public function showLaporanForm()
    {
        return view('pages.rekapKasMasjid.cetakLaporan');
    }

    public function cetakLaporan(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $pemasukanMasjid = PemasukanMasjid::whereBetween('tanggal', [$tanggalMulai, $tanggalSelesai])->get();
        $pengeluaranMasjid = PengeluaranMasjid::whereBetween('tanggal', [$tanggalMulai, $tanggalSelesai])->get();

        $totalPemasukan = $pemasukanMasjid->sum('jumlah');
        $totalPengeluaran = $pengeluaranMasjid->sum('jumlah');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        return view('pages.rekapKasMasjid.cetak', compact('pemasukanMasjid', 'pengeluaranMasjid', 'totalPemasukan', 'totalPengeluaran', 'saldoAkhir', 'tanggalMulai', 'tanggalSelesai'));
    }
}
