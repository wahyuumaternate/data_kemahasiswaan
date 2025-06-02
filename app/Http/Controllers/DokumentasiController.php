<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    // Tampilkan daftar dokumentasi dengan pagination
    public function index()
    {
        $data = Dokumentasi::orderBy('created_at', 'desc')->paginate(10);
        return view('dokumentasi.index', compact('data'));
    }

    // Tampilkan form tambah dokumentasi
    public function create()
    {
        return view('dokumentasi.create');
    }

    // Simpan dokumentasi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('dokumentasi_files');
        }

        Dokumentasi::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'file_path' => $filePath,
        ]);

        notify()->success('Dokumentasi berhasil ditambahkan.');
        return redirect()->route('dokumentasi.index');
    }

    // Tampilkan form edit dokumentasi
    public function edit(Dokumentasi $dokumentasi)
    {
        return view('dokumentasi.edit', compact('dokumentasi'));
    }

    // Update data dokumentasi
    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if ($dokumentasi->file_path) {
                Storage::delete($dokumentasi->file_path);
            }
            $filePath = $request->file('file')->store('dokumentasi_files');
        } else {
            $filePath = $dokumentasi->file_path;
        }

        $dokumentasi->update([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'file_path' => $filePath,
        ]);

        notify()->success('Dokumentasi berhasil diperbarui.');
        return redirect()->route('dokumentasi.index');
    }

    // Hapus dokumentasi
    public function destroy(Dokumentasi $dokumentasi)
    {
        if ($dokumentasi->file_path) {
            Storage::delete($dokumentasi->file_path);
        }
        $dokumentasi->delete();

        notify()->success('Dokumentasi berhasil dihapus.');
        return redirect()->route('dokumentasi.index');
    }
}
