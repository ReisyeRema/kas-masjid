<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\PengeluaranSosial;

class PengeluaranSosialController extends Controller
{
    public function index()
    {
        $pengeluaranSosials = PengeluaranSosial::all();
        $rekenings = Rekening::all();
        $totalPengeluaran = $pengeluaranSosials->sum('jumlah');
        return view('pages.pengeluaranKasSosial.index', compact('pengeluaranSosials','rekenings','totalPengeluaran'));
    }

    public function create()
    {
        return view('pages.pengeluaranKasSosial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'uraian' => 'required',
            'jumlah' => 'required|string', // Awalnya diterima sebagai string
            'tanggal' => 'required|date',
            'rekening_id' => 'required|integer',
        ]);

        // Konversi jumlah ke bentuk angka
        $jumlah = str_replace(['Rp ', '.', ','], ['', '', '.'], $request->jumlah);
        $jumlah = str_replace('.', '', substr($jumlah, 0, -3)) . substr($jumlah, -3);
        $jumlah = floatval($jumlah);

        $pengeluaranSosial = new PengeluaranSosial();
        $pengeluaranSosial->uraian = $request->uraian;
        $pengeluaranSosial->jumlah = $jumlah;
        $pengeluaranSosial->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pengeluaranSosial->rekening_id = $request->rekening_id;
        $pengeluaranSosial->save();

        return redirect()->route('pengeluaransosial.index')
                        ->with('success', 'Pengeluaran Sosial berhasil ditambahkan.');
    }

    public function edit(PengeluaranSosial $pemasukansosial)
    {
        return view('pages.pengeluaranKasSosial.edit', compact('pengeluaransosial'));
    }

    public function update(Request $request, PengeluaranSosial $pengeluaransosial)
    {
        $request->validate([
            'uraian' => 'required',
            'jumlah' => 'required|string', // Awalnya diterima sebagai string
            'tanggal' => 'required|date',
            'rekening_id' => 'required|integer',
        ]);

        // Konversi jumlah ke bentuk angka
        $jumlah = str_replace(['Rp ', '.', ','], ['', '', '.'], $request->jumlah);
        $jumlah = str_replace('.', '', substr($jumlah, 0, -3)) . substr($jumlah, -3);
        $jumlah = floatval($jumlah);

        $pengeluaransosial->uraian = $request->uraian;
        $pengeluaransosial->jumlah = $jumlah;
        $pengeluaransosial->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pengeluaransosial->rekening_id = $request->rekening_id;
        $pengeluaransosial->save();

        return redirect()->route('pengeluaransosial.index')
                        ->with('success', 'Pengeluaran Sosial berhasil diperbarui.');
    }

    public function destroy(PengeluaranSosial $pengeluaransosial)
    {
        $pengeluaransosial->delete();

        return redirect()->route('pengeluaransosial.index')
                         ->with('success', 'Pengeluaran Sosial berhasil dihapus.');
    }
}
