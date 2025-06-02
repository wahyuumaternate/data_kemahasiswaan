@extends('frontend.layouts.main')
@section('title', 'Struktur Kepengurusan BEM')

@section('main')
    <section class="py-5 bg-white">
        <div class="container">
            <h1 class="text-center mb-5">Struktur Kepengurusan BEM</h1>

            {{-- Tombol Download PDF --}}
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('pengurus.download') }}" class="btn btn-primary">
                    Download PDF
                </a>
            </div>

            {{-- Pengurus Inti --}}
            <div class="mb-5">
                {{-- Optional section title --}}
                {{-- <h2 class="h4 mb-3 border-bottom pb-2">Pengurus Inti</h2> --}}
                <ul class="list-group">
                    @foreach ($structured['pengurus_inti'] as $pengurus)
                        <li class="list-group-item shadow-sm mb-2 rounded">
                            <div class="fw-semibold">{{ $pengurus['jabatan'] }}</div>
                            <div>{{ $pengurus['nama'] }} - {{ $pengurus['npm'] }} (Angkatan {{ $pengurus['angkatan'] }})
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Departemen --}}
            @foreach ($structured['departemen'] as $nama_departemen => $anggota)
                <div class="mb-5">
                    <h2 class="h4 mb-3 border-bottom pb-2">{{ $nama_departemen }}</h2>
                    <ul class="list-group">
                        @foreach ($anggota as $pengurus)
                            <li class="list-group-item shadow-sm mb-2 rounded">
                                <div class="fw-semibold">{{ $pengurus['jabatan'] }}</div>
                                <div>{{ $pengurus['nama'] }} - {{ $pengurus['npm'] }} (Angkatan {{ $pengurus['angkatan'] }})
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
@endsection
