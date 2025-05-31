@extends('layouts.main', ['title' => 'DASHBOARD'])
@section('main')
    <div class="row">
        <!-- Card: Jumlah Pengurus -->
        <div class="col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengurus</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPengurus }}</div>
                    </div>
                    <i class="bi bi-people-fill text-primary" style="font-size: 2rem;"></i>
                </div>
            </div>
        </div>

        <!-- Card: Jumlah Program Kerja -->
        <div class="col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Program Kerja</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProgramKerja }}</div>
                    </div>
                    <i class="bi bi-journal-check text-success" style="font-size: 2rem;"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
