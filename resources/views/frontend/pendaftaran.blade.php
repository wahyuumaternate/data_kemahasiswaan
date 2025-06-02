@extends('frontend.layouts.main')

@section('main')
    <main class="main">
        <section id="daftar-bem" class="section">
            <div class="container" data-aos="fade-up">
                <h2 class="section-title">Formulir Pendaftaran BEM</h2>

                {{-- Pesan Sukses --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Pesan Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bem.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>NPM</label>
                            <input type="number" name="npm" class="form-control" value="{{ old('npm') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Program Studi</label>
                            <input type="text" name="program_studi" class="form-control"
                                value="{{ old('program_studi') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Angkatan</label>
                            <input type="number" name="angkatan" class="form-control" value="{{ old('angkatan') }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="departemen" class="form-label">Departemen</label>
                            <select name="departemen" id="departemen" class="form-select" required>
                                <option value="">-- Pilih Departemen Yang Dituju--</option>
                                @php
                                    $departemenList = [
                                        'Sumberdaya manusia',
                                        'Sosial dan hubungan masyarakat',
                                        'Minat dan bakat',
                                        'Keagamaan',
                                    ];
                                @endphp
                                @foreach ($departemenList as $item)
                                    <option value="{{ $item }}"
                                        {{ old('departemen', $data->departemen ?? '') === $item ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Upload KTM</label>
                            <input type="file" name="ktm" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Upload Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Alasan Bergabung dengan BEM</label>
                            <textarea name="alasan" class="form-control" rows="3" required>{{ old('alasan') }}</textarea>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            Kirim Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
