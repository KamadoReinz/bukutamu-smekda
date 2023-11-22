<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - SMKN 2 Purwakarta</title>
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

    <main class="animated">
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3" style="border-radius: 15px;">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        {{-- <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5> --}}
                                        <div class="d-flex justify-content-center py-4">
                                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                                <img src="{{ url('assets/img/logo.png') }}" alt="">
                                                <span class="d-none d-lg-block">SMKN 2 Purwakarta</span>
                                            </a>
                                        </div><!-- End Logo -->
                                        <h1 class="fw-bold fs-3 text-center">Masuk Akun</h1>
                                    </div>
                                    <form action="{{ route('AuthLogin') }}" method="POST" class="row g-3 needs-validation">
                                        {{ csrf_field() }}
                                        <div class="col-12">
                                            <label for="name" class="form-label fw-bold">Nama Pengguna</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="name" class="form-control rounded-pill"
                                                    id="name" placeholder="Masukkan Nama Pengguna"
                                                    autocomplete="name" required>
                                                <div class="invalid-feedback">Silakan Masukkan Nama Anda.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label fw-bold">Kata Sandi</label>
                                            <input type="password" name="password" class="form-control rounded-pill"
                                                id="password" placeholder="Masukkan Kata Sandi" required>
                                            <div class="invalid-feedback">Silakan Masukkan Password Anda!</div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 rounded-pill"
                                                type="submit">Masuk</button>
                                        </div>
                                        <div class="col-12">
                                            <a href="{{ route('forgot.password') }}">Lupa Kata Sandi?</a>
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
