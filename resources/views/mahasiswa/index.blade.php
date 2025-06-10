@extends('layouts.main', ['title' => 'Data Mahasiswa'])

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Mahasiswa</h5>

                    <!-- Tombol Tambah -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Tambah Mahasiswa
                    </button>

                    <!-- Modal Tambah Mahasiswa -->
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('mahasiswa.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Mahasiswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('mahasiswa._form', ['mahasiswa' => null])
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            <i class="bi bi-x-circle"></i> Batal
                                        </button>
                                        <button type="submit" class="btn btn-outline-success">
                                            <i class="bi bi-save"></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tabel Mahasiswa -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Angkatan</th>
                                {{-- <th>Email</th>
                                <th>No HP</th> --}}
                                <th>Kegiatan Diikuti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $mhs->npm }}</td>
                                    <td>{{ $mhs->nama }}</td>
                                    <td>{{ $mhs->jurusan }}</td>
                                    <td>{{ $mhs->angkatan }}</td>
                                    {{-- <td>{{ $mhs->email }}</td>
                                    <td>{{ $mhs->no_hp }}</td> --}}
                                    <td>{{ $mhs->kegiatan_diikuti }}</td>
                                    <td>
                                        <!-- Tombol Ubah -->
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit-{{ $mhs->id }}">
                                            <i class="bi bi-pencil"></i> Ubah
                                        </button>

                                        <!-- Modal Edit Mahasiswa -->
                                        <div class="modal fade" id="modalEdit-{{ $mhs->id }}" tabindex="-1"
                                            aria-labelledby="modalEditLabel-{{ $mhs->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="modalEditLabel-{{ $mhs->id }}">Edit Mahasiswa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Tutup"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('mahasiswa._form', [
                                                                'mahasiswa' => $mhs,
                                                            ])
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bi bi-x-circle"></i> Batal
                                                            </button>
                                                            <button type="submit" class="btn btn-outline-primary">
                                                                <i class="bi bi-save"></i> Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST"
                                            style="display: inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
