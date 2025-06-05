@extends('frontend.layouts.main')
@section('main')
    <main class="main">

        <!-- Mahasiswa Data Section -->
        <section id="mahasiswa" class="section">
            <div class="container" data-aos="fade-up">
                <div class="text-center mb-4">
                    <img src="{{ asset('logo/logo_stimik.png') }}" height="80" class="me-2">
                    <img src="{{ asset('logo/logo_bem.png') }}" height="80" class="ms-2">
                    <h3 class="mt-3 mb-0">DATA MAHASISWA</h3>
                    <h4 class="mb-0">STMIK TIDORE MANDIRI</h4>
                    {{-- <h5></h5> --}}
                    <hr style="border-top: 3px solid #000; margin: 10px 0;">
                    <hr style="border-top: 1px solid #000; margin: 0 0 20px 0;">
                </div>
                <br>

                <!-- Search form -->
                <form method="GET" action="{{ route('mahasiswa.index') }}" class="mb-4">
                    <div class="input-group" style="max-width: 400px;">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari berdasarkan nama, nim, jurusan...">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Angkatan</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->nama }}</td>
                                    <td>{{ $mhs->jurusan }}</td>
                                    <td>{{ $mhs->angkatan }}</td>
                                    <td>{{ substr($mhs->email, 0, 1) . '****@****' }}</td>
                                    <td>{{ substr($mhs->no_hp, 0, 4) . '*****' }}</td>
                                    <td>{{ substr($mhs->alamat, 0, 5) . '...' }}</td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data mahasiswa tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Jika pakai pagination, tampilkan link halaman di sini --}}
                {{-- {{ $mahasiswa->links() }} --}}
            </div>
        </section>

    </main>
@endsection
