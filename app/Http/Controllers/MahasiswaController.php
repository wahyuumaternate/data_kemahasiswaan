<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        // dd($mahasiswa);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required|digits:4',
        ]);

        Mahasiswa::create($request->all());

        notify()->success('Data berhasil ditambahkan');
        return redirect()->route('mahasiswa.index');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required|digits:4',
        ]);

        $mahasiswa->update($request->all());

        notify()->success('Data berhasil diubah');
        return redirect()->route('mahasiswa.index');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        notify()->success('Data berhasil dihapus');
        return redirect()->route('mahasiswa.index');
    }
}
