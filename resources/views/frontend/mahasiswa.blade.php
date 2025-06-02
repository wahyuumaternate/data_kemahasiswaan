@extends('frontend.layouts.main')
@section('main')
    <main class="main">

        <!-- Mahasiswa Data Section -->
        <section id="mahasiswa" class="section">
            <div class="container" data-aos="fade-up">
                <h2 class="section-title">Data Mahasiswa</h2>

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
                                    <td>{{ $mhs->email }}</td>
                                    <td>{{ $mhs->no_hp }}</td>
                                    <td>{{ $mhs->alamat }}</td>
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
