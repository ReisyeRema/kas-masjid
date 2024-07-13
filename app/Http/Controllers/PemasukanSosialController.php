<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\PemasukanSosial;

class PemasukanSosialController extends Controller
{
    public function index()
    {
        $pemasukanSosials = PemasukanSosial::all();
        $rekenings = Rekening::all();
        $totalPemasukan = $pemasukanSosials->sum('jumlah');
        return view('pages.pemasukanKasSosial.index', compact('pemasukanSosials','rekenings','totalPemasukan'));
    }

    public function create()
    {
        return view('pages.pemasukanKasSosial.create');
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

        $pemasukanSosial = new PemasukanSosial();
        $pemasukanSosial->uraian = $request->uraian;
        $pemasukanSosial->jumlah = $jumlah;
        $pemasukanSosial->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pemasukanSosial->rekening_id = $request->rekening_id;
        $pemasukanSosial->save();

        return redirect()->route('pemasukansosial.index')
                        ->with('success', 'Pemasukan Sosial berhasil ditambahkan.');
    }

    public function edit(PemasukanSosial $pemasukansosial)
    {
        return view('pages.pemasukanKasSosial.edit', compact('pemasukansosial'));
    }

    public function update(Request $request, PemasukanSosial $pemasukansosial)
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

        $pemasukansosial->uraian = $request->uraian;
        $pemasukansosial->jumlah = $jumlah;
        $pemasukansosial->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pemasukansosial->rekening_id = $request->rekening_id;
        $pemasukansosial->save();

        return redirect()->route('pemasukansosial.index')
                        ->with('success', 'Pemasukan Sosial berhasil diperbarui.');
    }

    public function destroy(PemasukanSosial $pemasukansosial)
    {
        $pemasukansosial->delete();

        return redirect()->route('pemasukansosial.index')
                         ->with('success', 'Pemasukan Sosial berhasil dihapus.');
    }
}
