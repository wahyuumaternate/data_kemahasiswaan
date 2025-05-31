@extends('layouts.main', ['title' => 'Pengurus BEM'])
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pengurus BEM</h5>

                    <!-- Tombol Tambah -->
                    <!-- Tombol Tambah -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Tambah Pengurus
                    </button>
                    <!-- Tombol Lihat PDF -->
                    <a href="{{ route('pengurus.download.pdf') }}" target="_blank"
                        class="btn btn-outline-secondary mb-3 ms-2">
                        <i class="bi bi-file-earmark-pdf"></i> Lihat PDF
                    </a>
                    <!-- Modal Tambah Pengurus -->
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('pengurus.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Pengurus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('pengurus._form')
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
                                <th>Jabatan</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Angkatan</th>
                                <th>Departemen</th>
                                <th>Urutan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($structured as $pengurus)
                                <tr>
                                    <td>{{ $pengurus->jabatan }}</td>
                                    <td>{{ $pengurus->nama }}</td>
                                    <td>{{ $pengurus->npm }}</td>
                                    <td>{{ $pengurus->angkatan }}</td>
                                    <td>{{ $pengurus->departemen ?? '-' }}</td>
                                    <td>{{ $pengurus->urutan }}</td>
                                    <td>
                                        <!-- Tombol Ubah -->
                                        <!-- Tombol Ubah -->
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit-{{ $pengurus->id }}">
                                            <i class="bi bi-pencil"></i> Ubah
                                        </button>

                                        @foreach ($structured as $pengurus)
                                            <!-- Modal Edit Pengurus -->
                                            <div class="modal fade" id="modalEdit-{{ $pengurus->id }}" tabindex="-1"
                                                aria-labelledby="modalEditLabel-{{ $pengurus->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('pengurus.update', $pengurus->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="modalEditLabel-{{ $pengurus->id }}">Edit Pengurus
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('pengurus._form', [
                                                                    'pengurus' => $pengurus,
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
                                        @endforeach


                                        <!-- Tombol Salin -->
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            onclick="salinData('{{ $pengurus->jabatan }}', '{{ $pengurus->nama }}', '{{ $pengurus->npm }}', '{{ $pengurus->angkatan }}', '{{ $pengurus->departemen }}', '{{ $pengurus->urutan }}')">
                                            <i class="bi bi-clipboard"></i> Salin
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('pengurus.destroy', $pengurus->id) }}" method="POST"
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

                    <script>
                        function salinData(jabatan, nama, npm, angkatan, departemen, urutan) {
                            const text =
                                `Jabatan: ${jabatan}\nNama: ${nama}\nNPM: ${npm}\nAngkatan: ${angkatan}\nDepartemen: ${departemen}\nUrutan: ${urutan}`;
                            navigator.clipboard.writeText(text).then(() => {
                                alert("Data berhasil disalin!");
                            });
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
