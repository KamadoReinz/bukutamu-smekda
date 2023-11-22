<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Buku Tamu - SMKN 2 Purwakarta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    @yield('style')
    @notifyCss

    <style>
        .notify {
            z-index: 99999;
        }

        .login-content {
            background-image: url('assets/img/bg_form.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main class="login-content">
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3" style="border-radius: 15px;">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <div class="d-flex justify-content-center py-4">
                                            <a href="javascript:;" class="logo d-flex align-items-center w-auto">
                                                <img src="{{ url('assets/img/logo.png') }}" alt="">
                                                <span class="d-none d-lg-block">SMKN 2 Purwakarta</span>
                                            </a>
                                        </div><!-- End Logo -->
                                        <p class="text-center fw-bold">Buku Tamu SMKN 2 Purwakarta</p>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('simpan-tamu') }}" method="POST"
                                        class="row g-3 needs-validation">
                                        @csrf
                                        <div class="col-12">
                                            <label for="nama" class="form-label fw-bold">Nama</label>
                                            <input type="text" name="nama" class="form-control rounded-pill"
                                                id="nama" placeholder="Masukkan Nama" required>
                                            <div class="invalid-feedback">Silahkan Masukan Nama Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="alamat" class="form-label fw-bold">Alamat</label>
                                            <input type="text" name="alamat" class="form-control rounded-pill"
                                                id="alamat" placeholder="Masukkan Alamat" required>
                                            <div class="invalid-feedback">Silakan Masukkan Alamat Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="tujuan" class="form-label fw-bold">Tujuan</label>
                                            <input type="text" name="tujuan" class="form-control rounded-pill"
                                                id="tujuan" placeholder="Masukkan Tujuan" required>
                                            <div class="invalid-feedback">Silakan Masukkan Tujuan Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 rounded-pill"
                                                type="submit">Simpan</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>

    @yield('script')
    @notifyJs
    @include('notify::components.notify')

</body>

</html>
