<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>BEM STIMIK</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('logo/logo_stimik.png') }}" alt="">
                <img src="{{ asset('logo/logo_bem.png') }}" alt="">
                <h1 class="sitename">BEM STIMIK</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li>
                        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa') }}"
                            class="{{ request()->routeIs('mahasiswa') ? 'active' : '' }}">Data Mahasiswa</a>
                    </li>
                    <li>
                        <a href="{{ route('pengurus') }}"
                            class="{{ request()->routeIs('pengurus') ? 'active' : '' }}">Pengurus BEM</a>
                    </li>
                    <li>
                        <a href="{{ route('program.kerja') }}"
                            class="{{ request()->routeIs('program.kerja') ? 'active' : '' }}">Program Kerja</a>
                    </li>
                    <li>
                        <a href="{{ route('dokumentasi') }}"
                            class="{{ request()->routeIs('dokumentasi') ? 'active' : '' }}">Dokumentasi</a>
                    </li>
                    <li>
                        <a href="{{ route('bem.form') }}"
                            class="{{ request()->routeIs('bem.form') ? 'active' : '' }}">Pendaftaran</a>
                    </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">
                @auth
                    Dashboard
                @else
                    Login Admin
                @endauth
            </a>

        </div>
    </header>

    @yield('main')

    <footer id="footer" class="footer">

        {{-- <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                    value="Subscribe"></div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="container footer-top">
            <div class="row gy-4">

                <!-- Tentang BEM -->
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ url('/') }}" class="d-flex align-items-center">
                        <span class="sitename">BEM STIMIK Tidore</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jl. Sultan Mansyur No.88</p>
                        <p>Tidore Kepulauan, Maluku Utara</p>
                        <p class="mt-3"><strong>Telepon:</strong> <span>+62 812 3456 7890</span></p>
                        <p><strong>Email:</strong> <span>bem@stimiktidore.ac.id</span></p>
                    </div>
                </div>

                <!-- Navigasi Footer -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Menu Navigasi</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Beranda</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('mahasiswa') }}">Data
                                Mahasiswa</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#features">Pengurus BEM</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#gallery">Program Kerja</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#pricing">Dokumentasi</a></li>
                    </ul>
                </div>

                <!-- Layanan Organisasi (Opsional) -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Kegiatan</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#gallery">Pelatihan Mahasiswa</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#gallery">Aksi Sosial</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#gallery">Forum Aspirasi</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#gallery">Festival Kampus</a></li>
                    </ul>
                </div>

                <!-- Sosial Media -->
                <div class="col-lg-4 col-md-12">
                    <h4>Ikuti Kami</h4>
                    <p>Dapatkan informasi terbaru dari kegiatan dan program BEM STIMIK Tidore Mandiri melalui media
                        sosial kami.</p>
                    <div class="social-links d-flex">
                        <a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://linkedin.com/" target="_blank"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Copyright -->
        <div class="container copyright text-center mt-4">
            <p>© <span>{{ now()->year }}</span> <strong class="px-1 sitename">BEM STIMIK Tidore</strong>
                <span>Seluruh Hak Cipta Dilindungi</span>
            </p>
        </div>


    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
