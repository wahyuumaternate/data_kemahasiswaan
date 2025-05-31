@extends('layouts.main', ['title' => 'Program Kerja'])
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Program Kerja</h5>

                    <!-- Tombol Tambah -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Tambah Program Kerja
                    </button>
                    <!-- Tombol Lihat PDF -->
                    <a href="{{ route('program-kerja.download.pdf') }}" target="_blank"
                        class="btn btn-outline-secondary mb-3 ms-2">
                        <i class="bi bi-file-earmark-pdf"></i> Lihat PDF
                    </a>
                    <!-- Tabel -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Departemen</th>
                                <th>Program Kerja</th>
                                <th>Keterangan</th>
                                {{-- <th>Urutan</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($structured as $item)
                                <tr>
                                    <td>{{ $item->departemen }}</td>
                                    <td>{{ $item->program_kerja }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    {{-- <td>{{ $item->urutan }}</td> --}}
                                    <td>
                                        <!-- Tombol Ubah -->
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit-{{ $item->id }}">
                                            <i class="bi bi-pencil"></i> Ubah
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modalEdit-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="modalEditLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('program-kerja.update', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEditLabel-{{ $item->id }}">
                                                                Edit Program Kerja
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Tutup"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('program-kerja._form', [
                                                                'programKerja' => $item,
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
                                        <form action="{{ route('program-kerja.destroy', $item->id) }}" method="POST"
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

                    <!-- Modal Tambah Program Kerja -->
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('program-kerja.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Program Kerja</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('program-kerja._form')
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

                </div>
            </div>
        </div>
    </div>
@endsection
