<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemasukanSosial;
use App\Models\PengeluaranSosial;

class RekapSosialController extends Controller
{
    public function index()
    {
        $pemasukanSosial = PemasukanSosial::all();
        $pengeluaranSosial = PengeluaranSosial::all();

        $totalPemasukan = $pemasukanSosial->sum('jumlah');
        $totalPengeluaran = $pengeluaranSosial->sum('jumlah');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        // Jika saldo akhir negatif, set ke 0 dan tambahkan pesan keterangan
        $keterangan = '';
        if ($saldoAkhir < 0) {
            $saldoAkhir = 0;
            $keterangan = 'Saldo akhir tidak mencukupi';
        }

        return view('pages.rekapKasSosial.index', compact('pemasukanSosial', 'pengeluaranSosial', 'totalPemasukan', 'totalPengeluaran', 'saldoAkhir', 'keterangan'));
    }

    public function showLaporanForm()
    {
        return view('pages.rekapKasSosial.cetakLaporan');
    }

    public function cetakLaporan(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $pemasukanSosial = PemasukanSosial::whereBetween('tanggal', [$tanggalMulai, $tanggalSelesai])->get();
        $pengeluaranSosial = PengeluaranSosial::whereBetween('tanggal', [$tanggalMulai, $tanggalSelesai])->get();

        $totalPemasukan = $pemasukanSosial->sum('jumlah');
        $totalPengeluaran = $pengeluaranSosial->sum('jumlah');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        return view('pages.rekapKasSosial.cetak', compact('pemasukanSosial', 'pengeluaranSosial', 'totalPemasukan', 'totalPengeluaran', 'saldoAkhir', 'tanggalMulai', 'tanggalSelesai'));
    }
}
