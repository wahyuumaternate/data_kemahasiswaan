<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProgramKerjaController extends Controller
{
    public function index()
    {
        $structured = ProgramKerja::all();
        return view('program-kerja.index', compact('structured'));
    }

    public function create()
    {
        $departemen = [
            'Sumberdaya manusia',
            'Sosial dan hubungan masyarakat',
            'Minat dan bakat',
            'Keagamaan'
        ];
        return view('program-kerja.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departemen' => 'required|string|max:255',
            'program_kerja' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'urutan' => 'integer|min:0'
        ]);

        ProgramKerja::create($request->all());

        return redirect()->route('program-kerja.index')
                        ->with('success', 'Program kerja berhasil ditambahkan.');
    }

    public function edit(ProgramKerja $programKerja)
    {
        $departemen = [
            'Sumberdaya manusia',
            'Sosial dan hubungan masyarakat',
            'Minat dan bakat',
            'Keagamaan'
        ];
        return view('program-kerja.edit', compact('programKerja', 'departemen'));
    }

    public function update(Request $request, ProgramKerja $programKerja)
    {
        $request->validate([
            'departemen' => 'required|string|max:255',
            'program_kerja' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'urutan' => 'integer|min:0'
        ]);

        $programKerja->update($request->all());

        return redirect()->route('program-kerja.index')
                        ->with('success', 'Program kerja berhasil diperbarui.');
    }

    public function destroy(ProgramKerja $programKerja)
    {
        $programKerja->delete();
        return redirect()->route('program-kerja.index')
                        ->with('success', 'Program kerja berhasil dihapus.');
    }

   public function downloadPdf()
{
    // Ambil semua data program kerja, lalu groupBy departemen
    $structured = ProgramKerja::all()->groupBy('departemen');

    // Ambil daftar departemen unik dari program kerja (opsional, jika dibutuhkan di view)
    $departemen = ProgramKerja::select('departemen')->distinct()->pluck('departemen');

    // Kirim data ke view PDF
    $pdf = PDF::loadView('program-kerja.pdf', compact('structured', 'departemen'));
    $pdf->setPaper('A4', 'portrait');

    return $pdf->stream('Program_Kerja_BEM_' . date('Y-m-d') . '.pdf');
}

}
