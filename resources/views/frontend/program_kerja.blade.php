@extends('frontend.layouts.main') {{-- Sesuaikan dengan layout-mu --}}

@section('main')
    <section class="py-5" id="program-kerja">
        <div class="container">
            <div class="text-center mb-4">
                <img src="{{ asset('logo/logo_stimik.png') }}" height="80" class="me-2">
                <img src="{{ asset('logo/logo_bem.png') }}" height="80" class="ms-2">
                <h3 class="mt-3 mb-0">PROGRAM KERJA</h3>
                <h4 class="mb-0">BADAN EKSEKUTIF MAHASISWA (BEM)</h4>
                <h5>STMIK TIDORE MANDIRI</h5>
                <hr style="border-top: 3px solid #000; margin: 10px 0;">
                <hr style="border-top: 1px solid #000; margin: 0 0 20px 0;">
            </div>

            <div class="table-responsive">
                <div class="text-end mb-3">
                    <a href="{{ route('program.kerja.download') }}" class="btn btn-danger" target="_blank">
                        <i class="bi bi-file-earmark-pdf-fill"></i> Download PDF
                    </a>
                </div>

                <table class="table table-bordered align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th width="8%">No</th>
                            <th width="30%">Departemen</th>
                            <th width="35%">Program Kerja</th>
                            <th width="27%">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departemen as $index => $dept)
                            @php $programs = $structured[$dept]; @endphp
                            <tr>
                                <td rowspan="{{ max(1, $programs->count()) }}">{{ $loop->iteration }}</td>
                                <td rowspan="{{ max(1, $programs->count()) }}">{{ $dept }}</td>
                                @if ($programs->isNotEmpty())
                                    <td>{{ $programs[0]->program_kerja }}</td>
                                    <td>{{ $programs[0]->keterangan }}</td>
                            </tr>
                            @foreach ($programs->slice(1) as $prog)
                                <tr>
                                    <td>{{ $prog->program_kerja }}</td>
                                    <td>{{ $prog->keterangan }}</td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="2" class="text-center">-</td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
