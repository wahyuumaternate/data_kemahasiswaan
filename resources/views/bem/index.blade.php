@extends('layouts.main', ['title' => 'Pendaftaran Anggota BEM'])

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pendaftaran Anggota BEM</h5>

                    <!-- Tombol Tambah -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Tambah Pendaftaran
                    </button>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('bem.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Pendaftaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('bem._form', ['bem' => null])
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-outline-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tabel -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Program Studi</th>
                                <th>Jurusan</th>
                                <th>Angkatan</th>
                                <th>Departemen</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bem as $data)
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->npm }}</td>
                                    <td>{{ $data->program_studi }}</td>
                                    <td>{{ $data->jurusan }}</td>
                                    <td>{{ $data->angkatan }}</td>
                                    <td>{{ $data->departemen }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>
                                        <!-- Ubah -->
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit-{{ $data->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modalEdit-{{ $data->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form action="{{ route('bem.update', $data->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Pendaftaran</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('bem._form', ['bem' => $data])
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-outline-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Hapus -->
                                        <form action="{{ route('bem.destroy', $data->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
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
