@extends('layouts.main', ['title' => 'Data Dokumentasi'])

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Dokumentasi</h5>

                    <!-- Tombol Tambah -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Tambah Dokumentasi
                    </button>

                    <!-- Modal Tambah Dokumentasi -->
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Dokumentasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('dokumentasi._form', ['dokumentasi' => null])
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

                    <!-- Tabel Dokumentasi -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>File</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dokumentasi)
                                <tr>
                                    <td>{{ $dokumentasi->judul }}</td>
                                    <td>{{ Str::limit($dokumentasi->deskripsi, 50) }}</td>
                                    <td>
                                        @if ($dokumentasi->file_path)
                                            <a href="{{ asset('storage/' . $dokumentasi->file_path) }}" target="_blank">Lihat
                                                File</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $dokumentasi->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <!-- Tombol Ubah -->
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit-{{ $dokumentasi->id }}">
                                            <i class="bi bi-pencil"></i> Ubah
                                        </button>

                                        <!-- Modal Edit Dokumentasi -->
                                        <div class="modal fade" id="modalEdit-{{ $dokumentasi->id }}" tabindex="-1"
                                            aria-labelledby="modalEditLabel-{{ $dokumentasi->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('dokumentasi.update', $dokumentasi->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="modalEditLabel-{{ $dokumentasi->id }}">Edit Dokumentasi
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Tutup"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('dokumentasi._form', [
                                                                'dokumentasi' => $dokumentasi,
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
                                        <form action="{{ route('dokumentasi.destroy', $dokumentasi->id) }}" method="POST"
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

                    <!-- Pagination -->
                    {{ $data->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
