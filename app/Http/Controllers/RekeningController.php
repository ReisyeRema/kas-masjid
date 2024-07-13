<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function index()
    {
        $rekening = Rekening::all();
        return view('pages.rekening.index', compact('rekening'));
    }

    public function create()
    {
        return view('pages.rekening.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
            'no_rek' => 'required',
        ]);

        $rekening = new Rekening();
        $rekening->nama_bank = $request->nama_bank;
        $rekening->no_rek = $request->no_rek;
        $rekening->save();

        return redirect()->route('rekening.index')
                        ->with('success', 'Rekening berhasil ditambahkan.');
    }

    public function edit(Rekening $rekening)
    {
        return view('pages.rekening.edit', compact('rekening'));
    }

    public function update(Request $request, Rekening $rekening)
    {
        $request->validate([
            'nama_bank' => 'required',
            'no_rek' => 'required',
        ]);

        $rekening->nama_bank = $request->nama_bank;
        $rekening->no_rek = $request->no_rek;
        $rekening->save();

        return redirect()->route('rekening.index')
                        ->with('success', 'Rekening berhasil diperbarui.');
    }

    public function destroy(Rekening $rekening)
    {
        $rekening->delete();

        return redirect()->route('rekening.index')
                         ->with('success', 'Rekening berhasil dihapus.');
    }
}
