<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\PengeluaranMasjid;

class PengeluaranMasjidController extends Controller
{
    public function index()
    {
        $pengeluaranMasjids = PengeluaranMasjid::all();
        $rekenings = Rekening::all();
        $totalPengeluaran = $pengeluaranMasjids->sum('jumlah');
        return view('pages.pengeluaranKasMasjid.index', compact('pengeluaranMasjids','rekenings','totalPengeluaran'));
    }

    public function create()
    {
        return view('pages.pengeluaranKasMasjid.create');
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

        $pengeluaranMasjid = new PengeluaranMasjid();
        $pengeluaranMasjid->uraian = $request->uraian;
        $pengeluaranMasjid->jumlah = $jumlah;
        $pengeluaranMasjid->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pengeluaranMasjid->rekening_id = $request->rekening_id;
        $pengeluaranMasjid->save();

        return redirect()->route('pengeluaranmasjid.index')
                        ->with('success', 'Pengeluaran masjid berhasil ditambahkan.');
    }

    public function edit(PengeluaranMasjid $pengeluaranmasjid)
    {
        return view('pages.pengeluaranKasMasjid.edit', compact('pengeluaranmasjid'));
    }

    public function update(Request $request, PengeluaranMasjid $pengeluaranmasjid)
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

        $pengeluaranmasjid->uraian = $request->uraian;
        $pengeluaranmasjid->jumlah = $jumlah;
        $pengeluaranmasjid->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pengeluaranmasjid->rekening_id = $request->rekening_id;
        $pengeluaranmasjid->save();

        return redirect()->route('pengeluaranmasjid.index')
                        ->with('success', 'Pengeluaran masjid berhasil diperbarui.');
    }

    public function destroy(PengeluaranMasjid $pengeluaranmasjid)
    {
        $pengeluaranmasjid->delete();

        return redirect()->route('pengeluaranmasjid.index')
                         ->with('success', 'Pengeluaran masjid berhasil dihapus.');
    }
}
