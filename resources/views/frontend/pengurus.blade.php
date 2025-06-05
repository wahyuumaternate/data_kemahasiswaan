@extends('frontend.layouts.main')
@section('title', 'Struktur Kepengurusan BEM')

@section('main')
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-4">
                <img src="{{ asset('logo/logo_stimik.png') }}" height="80" class="me-2">
                <img src="{{ asset('logo/logo_bem.png') }}" height="80" class="ms-2">
                <h3 class="mt-3 mb-0">STRUKTUR PENGURUS</h3>
                <h4 class="mb-0">BADAN EKSEKUTIF MAHASISWA (BEM)</h4>
                <h5>STMIK TIDORE MANDIRI</h5>
                <hr style="border-top: 3px solid #000; margin: 10px 0;">
                <hr style="border-top: 1px solid #000; margin: 0 0 20px 0;">
            </div>
            <br>

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
                                <div>{{ $pengurus['nama'] }} - {{ $pengurus['npm'] }} (Angkatan
                                    {{ $pengurus['angkatan'] }})
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
@endsection
