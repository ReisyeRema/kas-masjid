<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\PemasukanMasjid;

class PemasukanMasjidController extends Controller
{
    public function index()
    {
        $pemasukanMasjids = PemasukanMasjid::all();
        $rekenings = Rekening::all();
        $totalPemasukan = $pemasukanMasjids->sum('jumlah');
        return view('pages.pemasukanKasMasjid.index', compact('pemasukanMasjids','rekenings','totalPemasukan'));
    }

    public function create()
    {
        return view('pages.pemasukanKasMasjid.create');
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

        $pemasukanMasjid = new PemasukanMasjid();
        $pemasukanMasjid->uraian = $request->uraian;
        $pemasukanMasjid->jumlah = $jumlah;
        $pemasukanMasjid->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pemasukanMasjid->rekening_id = $request->rekening_id;
        $pemasukanMasjid->save();

        return redirect()->route('pemasukanmasjid.index')
                        ->with('success', 'Pemasukan masjid berhasil ditambahkan.');
    }

    public function edit(PemasukanMasjid $pemasukanmasjid)
    {
        return view('pages.pemasukanKasMasjid.edit', compact('pemasukanmasjid'));
    }

    public function update(Request $request, PemasukanMasjid $pemasukanmasjid)
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

        $pemasukanmasjid->uraian = $request->uraian;
        $pemasukanmasjid->jumlah = $jumlah;
        $pemasukanmasjid->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pemasukanmasjid->rekening_id = $request->rekening_id;
        $pemasukanmasjid->save();

        return redirect()->route('pemasukanmasjid.index')
                        ->with('success', 'Pemasukan masjid berhasil diperbarui.');
    }

    public function destroy(PemasukanMasjid $pemasukanmasjid)
    {
        $pemasukanmasjid->delete();

        return redirect()->route('pemasukanmasjid.index')
                         ->with('success', 'Pemasukan masjid berhasil dihapus.');
    }
}
