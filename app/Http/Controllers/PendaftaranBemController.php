<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranBem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftaranBemController extends Controller
{
    // Tampilkan semua pendaftaran
    public function index()
    {
        $bem = PendaftaranBem::latest()->paginate(10);
        return view('bem.index', compact('bem'));
    }

    // Tampilkan form pendaftaran
    public function create()
    {
        return view('pendaftaran.create');
    }

    // Simpan data pendaftaran
    public function store(Request $request)
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
            $validated['ktm'] = $request->file('ktm')->store('ktm');
        }

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto');
        }

        PendaftaranBem::create($validated);

        return redirect()->route('bem.index')->with('success', 'Pendaftaran berhasil disimpan.');
    }

    // Tampilkan detail satu pendaftar
    public function show($id)
    {
        $data = PendaftaranBem::findOrFail($id);
        return view('pendaftaran.show', compact('data'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $data = PendaftaranBem::findOrFail($id);
        return view('pendaftaran.edit', compact('data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $data = PendaftaranBem::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20|unique:pendaftaran_bem,npm,' . $data->id,
            'program_studi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|string|max:4',
            'departemen' => 'required|string|max:255',
            'alamat' => 'required|string',
            'ktm' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'alasan' => 'required|string',
        ]);

        // Upload file baru jika ada
        if ($request->hasFile('ktm')) {
            if ($data->ktm) Storage::delete($data->ktm);
            $validated['ktm'] = $request->file('ktm')->store('ktm');
        }

        if ($request->hasFile('foto')) {
            if ($data->foto) Storage::delete($data->foto);
            $validated['foto'] = $request->file('foto')->store('foto');
        }

        $data->update($validated);

        return redirect()->route('bem.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = PendaftaranBem::findOrFail($id);

        if ($data->ktm) Storage::delete($data->ktm);
        if ($data->foto) Storage::delete($data->foto);

        $data->delete();

        return redirect()->route('bem.index')->with('success', 'Data berhasil dihapus.');
    }
}
