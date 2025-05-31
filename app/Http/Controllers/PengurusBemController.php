<?php

namespace App\Http\Controllers;

use App\Models\PengurusBem;
use Illuminate\Http\Request;
 use Barryvdh\DomPDF\Facade\Pdf;

class PengurusBemController extends Controller
{
      public function index()
    {
        $structured = PengurusBem::all();
        return view('pengurus.index', compact('structured'));
    }

    public function create()
    {
        $departemen = PengurusBem::getDepartemenList();
        return view('pengurus.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'nullable|string|max:255',
            'npm' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:255',
            'departemen' => 'nullable|string|max:255',
            'urutan' => 'integer|min:0'
        ]);

        PengurusBem::create($request->all());

        return redirect()->route('pengurus.index')
                        ->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    public function edit(PengurusBem $penguru)
    {
        $departemen = PengurusBem::getDepartemenList();
        return view('pengurus.edit', compact('penguru', 'departemen'));
    }

    public function update(Request $request, PengurusBem $penguru)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'nullable|string|max:255',
            'npm' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:255',
            'departemen' => 'nullable|string|max:255',
            'urutan' => 'integer|min:0'
        ]);

        $penguru->update($request->all());

        return redirect()->route('pengurus.index')
                        ->with('success', 'Data pengurus berhasil diperbarui.');
    }

    public function destroy(PengurusBem $penguru)
    {
        $penguru->delete();
        return redirect()->route('pengurus.index')
                        ->with('success', 'Data pengurus berhasil dihapus.');
    }

    public function downloadPdf()
    {
        $structured = PengurusBem::getStructuredData();
        
        $pdf = PDF::loadView('pengurus.pdf', compact('structured'));
        $pdf->setPaper('A4', 'portrait');
        
       return $pdf->stream('Pengurus_BEM_' . date('Y-m-d') . '.pdf');
    }
}
