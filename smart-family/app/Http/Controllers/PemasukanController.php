<?php
namespace App\Http\Controllers;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukans = Pemasukan::all();
    
        return view('pemasukan.index', compact('pemasukans'));
    }

// PemasukanController.php

public function show($id)
{
    $pemasukans = Pemasukan::findOrFail($id);
    return view('pemasukan.show', compact('pemasukans'));
}



    public function create()
    {
        return view('pemasukan.pemasukan-entry');  
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|string',
            'jumlah' => 'required|numeric',
            'sumber' => 'required|string',
        ]);

        Pemasukan::create([
            'tanggal' => $validated['tanggal'], 
            'jumlah' => $validated['jumlah'],
            'asaldana' => $validated['sumber'],
        ]);

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pemasukans = Pemasukan::findOrFail($id);
        return view('pemasukan.pemasukan-edit', compact('pemasukans'));
    }
    public function update(Request $request, $id_pemasukan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'asaldana' => 'required|string',
        ]);
        $pemasukans = Pemasukan::findOrFail($id_pemasukan);
        $pemasukans->update([
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah_pemasukan,
            'asaldana' => $request->asal_dana,
        ]);
        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        Pemasukan::destroy($id);
        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil dihapus');
    }
    public function cetak()
    {
        $pemasukans = Pemasukan::all();
        $pdf = Pdf::loadview('pemasukan.pemasukan-cetak', compact('pemasukans'));
        return $pdf->download('laporan-transaksi.pdf');
    }

}
