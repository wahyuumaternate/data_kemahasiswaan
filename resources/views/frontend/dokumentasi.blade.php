@extends('frontend.layouts.main')
@section('title', 'Dokumentasi')

@section('main')
    <div class="container py-5">
        <h1 class="mb-4 text-center">Dokumentasi</h1>
        <div class="row">
            @foreach ($dokumentasi as $doc)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ asset('storage/' . $doc->file_path) }}" data-fancybox="gallery"
                            data-caption="{{ $doc->judul }}">
                            <img src="{{ asset('storage/' . $doc->file_path) }}" class="card-img-top"
                                alt="{{ $doc->judul }}" style="object-fit: cover; height: 400px;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $doc->judul }}</h5>
                            <p class="card-text">{{ $doc->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endpush

@push('scripts')
    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: true,
            buttons: ["zoom", "slideShow", "close"],
        });
    </script>
@endpush
