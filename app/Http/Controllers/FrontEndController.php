<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Mahasiswa;
use App\Models\PendaftaranBem;
use App\Models\PengurusBem;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Database\Seeders\PengurusBemSeeder;

class FrontEndController extends Controller
{
    public function programKerja()
{
    $programs = ProgramKerja::all()->groupBy('departemen');
    $departemen = $programs->keys();

    return view('frontend.program_kerja', [
        'departemen' => $departemen,
        'structured' => $programs
    ]);
}



public function downloadProgramKerja()
{
    $programs = ProgramKerja::all()->groupBy('departemen');
    $departemen = $programs->keys();

    $pdf = Pdf::loadView('program-kerja.pdf', [
        'departemen' => $departemen,
        'structured' => $programs
    ]);

    return $pdf->download('program-kerja-bem.pdf');
}

public function pengurus()
{
    $pengurus = PengurusBem::orderBy('urutan')->get();

    $structured = [
        'pengurus_inti' => [],
        'departemen' => [],
    ];

    foreach ($pengurus as $item) {
        $data = [
            'jabatan' => $item->jabatan,
            'nama' => $item->nama,
            'npm' => $item->npm,
            'angkatan' => $item->angkatan,
        ];

        if (is_null($item->departemen)) {
            $structured['pengurus_inti'][] = $data;
        } else {
            $structured['departemen'][$item->departemen][] = $data;
        }
    }

    return view('frontend.pengurus', compact('structured'));
}

public function downloadPengurus()
{
    
     $pengurus = PengurusBem::orderBy('urutan')->get();

    $structured = [
        'pengurus_inti' => [],
        'departemen' => [],
    ];

    foreach ($pengurus as $item) {
        $data = [
            'jabatan' => $item->jabatan,
            'nama' => $item->nama,
            'npm' => $item->npm,
            'angkatan' => $item->angkatan,
        ];

        if (is_null($item->departemen)) {
            $structured['pengurus_inti'][] = $data;
        } else {
            $structured['departemen'][$item->departemen][] = $data;
        }
    }

    $pdf = PDF::loadView('pengurus.pdf', compact('structured'));
    return $pdf->download('pengurus-bem.pdf');
    
}

 public function mahasiswa(Request $request)
{
    $query = Mahasiswa::query();

    if ($search = $request->input('search')) {
        $query->where(function($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%")
              ->orWhere('npm', 'like', "%{$search}%")
              ->orWhere('jurusan', 'like', "%{$search}%")
              ->orWhere('angkatan', 'like', "%{$search}%");
        });
    }

    $mahasiswa = $query->orderBy('nama')->get();

    return view('frontend.mahasiswa', compact('mahasiswa'));
}


    public function dokumentasi()
        {
            // Ambil semua data dokumentasi, urut terbaru dulu
            $dokumentasi = Dokumentasi::orderBy('created_at', 'desc')->get();

            // Kirim ke view
            return view('frontend.dokumentasi', compact('dokumentasi'));
    }


     public function createBem()
    {
        return view('frontend.pendaftaran');
    }

    public function storeBem(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:20|unique:pendaftaran_bem,npm',
        'program_studi' => 'required|string|max:255',
        'jurusan' => 'required|string|max:255',
        'angkatan' => 'required|string|max:4',
        'departemen' => 'required|string|max:255',
        'alamat' => 'required|string',
        'ktm' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'alasan' => 'required|string',
    ]);

    // Upload file jika ada
    if ($request->hasFile('ktm')) {
        $validated['ktm'] = $request->file('ktm')->store('uploads/ktm');
    }

    if ($request->hasFile('foto')) {
        $validated['foto'] = $request->file('foto')->store('uploads/foto');
    }

    PendaftaranBem::create($validated);

    return redirect()->route('bem.form')->with('success', 'Pendaftaran BEM berhasil dikirim.');
}

}