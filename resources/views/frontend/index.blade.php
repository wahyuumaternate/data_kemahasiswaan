@extends('frontend.layouts.main')
@section('main')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('logo/logo_bem.png') }}" class="img-fluid animated" alt="BEM STIMIK Tidore">
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center text-center text-md-start"
                        data-aos="fade-in">
                        <h2>Selamat Datang di Website Resmi</h2>
                        <p>Badan Eksekutif Mahasiswa STIMIK Tidore Mandiri</p>
                        <div class="d-flex mt-4 justify-content-center justify-content-md-start">
                            <a href="#about" class="download-btn"><i class="bi bi-info-circle"></i> <span>Tentang
                                    Kami</span></a>
                            <a href="#gallery" class="download-btn"><i class="bi bi-images"></i> <span>Galeri</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about section light-background">
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang BEM STIMIK Tidore</h2>
                <p>Organisasi eksekutif mahasiswa yang menjadi wadah aspirasi dan penggerak kegiatan kemahasiswaan di STIMIK
                    Tidore Mandiri.</p>
            </div>
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p>BEM STIMIK Tidore merupakan organisasi intra kampus yang memiliki tanggung jawab dalam
                            menjalankan fungsi koordinasi, advokasi, dan pengembangan potensi mahasiswa di STIMIK Tidore.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> <span>Menjadi penghubung antara mahasiswa dan pimpinan
                                    kampus.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Mendorong kegiatan positif dan kreatif bagi
                                    mahasiswa.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Memfasilitasi pengembangan minat dan bakat.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <p>Kami berkomitmen untuk menciptakan lingkungan kampus yang aktif, aspiratif, dan inklusif. Mari
                            bersama membangun STIMIK Tidore yang lebih baik.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 30
                },
                "1200": {
                  "slidesPerView": 7,
                  "spaceBetween": 30
                }
              }
            }
            </script>

                    <div class="swiper-wrapper align-items-center">
                        @foreach ($dokumentasi as $doc)
                            <div class="swiper-slide">
                                <a href="{{ asset('storage/' . $doc->file_path) }}" data-fancybox="gallery"
                                    data-caption="{{ $doc->judul }}">
                                    <img src="{{ asset('storage/' . $doc->file_path) }}" class="img-fluid"
                                        alt="{{ $doc->judul }}">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Gallery Section -->

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


    </main>
@endsection
