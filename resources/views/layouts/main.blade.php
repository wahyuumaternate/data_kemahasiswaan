<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ @$title != '' ? "$title - " : '' }} Sistem Informasi Pengajuan Judul</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('front/img/logo-unkhair.png') }}" rel="icon">
    <link href="{{ asset('front/img/logo-unkhair.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    @notifyCss
    <style>
        .notify {
            position: fixed;
            /* Ensure it is fixed */
            top: 20px;
            /* Adjust as needed */
            right: 20px;
            /* Adjust as needed */
            z-index: 9999;
            /* Make sure this is a high value */
        }

        .btn-custom {

            /* Default transparent background */
            color: #000;
            /* Default text color */
            border: 1px solid #000;
            /* Border color */
            transition: background-color 0.3s, color 0.3s;
            /* Smooth transition */
        }

        .btn-custom:hover {
            background-color: #28a745;
            /* Green for success */
            color: white;
            /* Change text color on hover */
        }

        .btn-info {

            /* Default transparent background */
            color: #007bff;
            /* Default text color */
            border: 1px solid #007bff;
            /* Border color */
        }

        .btn-success {

            /* Default transparent background */
            color: #09b900;
            /* Default text color */
            border: 1px solid #09b900;
            /* Border color */
        }

        .btn-info:hover {
            background-color: #17a2b8;
            /* Light blue for info */
            color: white;
            /* Change text color on hover */
        }

        .btn-danger {

            /* Default transparent background */
            color: #dc3545;
            /* Default text color */
            border: 1px solid #dc3545;
            /* Border color */
        }

        .btn-danger:hover {
            background-color: #dc3545;
            /* Red for danger */
            color: white;
            /* Change text color on hover */
        }

        .swal2-confirm {
            color: #ffff !important;
            /* warna teks tombol confirm */
            background-color: #2563eb;
        }

        .swal2-cancel {
            color: #ffff !important;
            /* warna teks tombol cancel */
            background-color: #ef4444;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    @include('layouts.header')

    <!-- ======= Sidebar ======= -->
    @include('layouts.sidebar')


    <main id="main" class="main">
        @yield('main')

        {{-- <div class="pagetitle">
            <h1>Blank Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
        </section> --}}

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <x-notify::notify />
    @notifyJs

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Judul ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2563eb', // biru cerah
                cancelButtonColor: '#ef4444', // merah cerah
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi, submit form delete
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

    @yield('js')
</body>

</html>
