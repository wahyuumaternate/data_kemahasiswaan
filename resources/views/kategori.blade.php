@extends('layouts.main', ['title' => 'Kategori'])
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Kategori</h5>

                    <!-- Tombol Tambah -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        + Tambah Kategori
                    </button>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('kategoris.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahModalLabel">Tambah Kategori</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                            <input type="text" class="form-control" name="nama_kategori" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="persyaratan" class="form-label">Persyaratan</label>
                                            <textarea name="persyaratan" class="form-control" rows="5" required></textarea>
                                        </div>
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

                    <!-- Tabel -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Persyaratan</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $kategori->nama_kategori }}</td>
                                    <td>{!! nl2br(e(Str::limit($kategori->persyaratan, 100))) !!}</td>
                                    <td>{{ $kategori->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $kategori->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <button onclick="confirmDelete({{ $kategori->id }})"
                                            class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Form Delete -->
                                        <form id="delete-form-{{ $kategori->id }}"
                                            action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal-{{ $kategori->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel-{{ $kategori->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel-{{ $kategori->id }}">Edit
                                                        Kategori</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nama_kategori_{{ $kategori->id }}"
                                                            class="form-label">Nama Kategori</label>
                                                        <input type="text" class="form-control" name="nama_kategori"
                                                            value="{{ $kategori->nama_kategori }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="persyaratan_{{ $kategori->id }}"
                                                            class="form-label">Persyaratan</label>
                                                        <textarea name="persyaratan" class="form-control" rows="5" required>{{ $kategori->persyaratan }}</textarea>
                                                    </div>
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
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
