@extends('layouts.main', ['title' => 'Pendaftar'])
@section('main')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Pendaftar</h5>
                    <!-- Tombol Tambah -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        + Tambah Pendaftar
                    </button>
                    <!-- Form Export berdasarkan Kategori -->
                    <form action="{{ route('pendaftars.export') }}" method="GET" class="d-inline-block ms-3 mb-3">
                        <div class="input-group">
                            <select name="id_kategori" class="form-select" aria-label="Pilih Kategori">
                                <option value="">-- Semua Kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-outline-success">
                                <i class="bi bi-file-earmark-excel"></i> Export Excel
                            </button>
                        </div>
                    </form>
                    <!-- Modal Tambah -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('pendaftars.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahModalLabel">Tambah Pendaftar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_tim_orang" class="form-label">Nama Tim/Pendaftar</label>
                                            <input type="text" class="form-control" id="nama_tim_orang"
                                                name="nama_tim_orang" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="instansi_utusan" class="form-label">Instansi Utusan</label>
                                            <input type="text" class="form-control" id="instansi_utusan"
                                                name="instansi_utusan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_kategori" class="form-label">Kategori</label>
                                            <select name="id_kategori" id="id_kategori" class="form-select" required>
                                                @foreach ($kategoris as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
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

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Nama Tim/Pendaftar</th>
                                <th>Email</th>
                                <th>Instansi Utusan</th>
                                <th>Ketgori</th>
                                <th data-type="date">Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pendaftars as $item)
                                <tr>
                                    <td>{{ $item->nama_tim_orang }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->instansi_utusan }}</td>
                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Makassar')->format('d/m/Y H:i') }}
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $item->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <button onclick="confirmDelete({{ $item->id }})"
                                            class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Form Delete tersembunyi -->
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('pendaftars.destroy', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('pendaftars.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel-{{ $item->id }}">Edit
                                                        Pendaftar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nama_tim_orang_{{ $item->id }}"
                                                            class="form-label">Nama Tim/Pendaftar</label>
                                                        <input type="text" class="form-control"
                                                            id="nama_tim_orang_{{ $item->id }}" name="nama_tim_orang"
                                                            value="{{ $item->nama_tim_orang }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email_{{ $item->id }}"
                                                            class="form-label">Email</label>
                                                        <input type="email" class="form-control"
                                                            id="email_{{ $item->id }}" name="email"
                                                            value="{{ $item->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="instansi_utusan_{{ $item->id }}"
                                                            class="form-label">Instansi Utusan</label>
                                                        <input type="text" class="form-control"
                                                            id="instansi_utusan_{{ $item->id }}"
                                                            name="instansi_utusan" value="{{ $item->instansi_utusan }}"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="id_kategori_{{ $item->id }}"
                                                            class="form-label">Kategori</label>
                                                        <select name="id_kategori" id="id_kategori_{{ $item->id }}"
                                                            class="form-select" required>
                                                            @foreach ($kategoris as $kategori)
                                                                <option value="{{ $kategori->id }}"
                                                                    @if ($kategori->id == $item->id_kategori) selected @endif>
                                                                    {{ $kategori->nama_kategori }}</option>
                                                            @endforeach
                                                        </select>
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
