<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sitakro - Aplikasi Pertanian">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <title>Sitakro Pelayanan Surat Kterangan</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets4/img/core-img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets4/img/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets4/img/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets4/img/icons/icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets4/img/icons/icon-180x180.png') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets4/dist/style.css') }}">

    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('assets4/dist/manifest.json') }}">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Internet Connection Status -->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Header Content -->
            <div
                class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                <!-- Back Button -->
                <div class="back-button">
                    <a href={{ route('surat.pengajuan_surat') }}>
                        <i class="bi bi-arrow-left-short"></i>
                    </a>
                </div>

                <!-- Page Title -->
                <div class="page-heading">
                    <h6 class="mb-0">Surat Keterangan</h6>
                </div>

                <!-- Navbar Toggler -->
                <!-- Settings -->
                <div class="setting-wrapper">

                </div>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper py-3">
        <div class="container">
            <!-- Service Card -->
            <div class="card service-card bg-danger bg-gradient mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="service-text">
                            <h5>Surat Keterangan</h5>
                            <p class="mb-0">Kehilangan</p>
                        </div>
                        <div class="service-img">
                            <a class="btn m-1 btn-creative btn-light" href="ket1.html">Buat Surat</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Card -->
            <div class="card service-card bg-info bg-gradient mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="service-text">
                            <h5>Surat Keterangan</h5>
                            <p class="mb-0">Desa Pernah Menikah</p>
                        </div>
                        <div class="service-img">
                            <a class="btn m-1 btn-creative btn-light" href="#">Buat Surat</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Card -->
            <div class="card service-card bg-success bg-gradient mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="service-text">
                            <h5 class="text-dark">Surat Keterangan</h5>
                            <p class="mb-0 text-dark">Tidak Mampu</p>
                        </div>
                        <div class="service-img">
                            <a class="btn m-1 btn-creative btn-light" href="#">Buat Surat</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Card -->
            <div class="card service-card bg-warning bg-gradient mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="service-text">
                            <h5 class="text-dark">Surat Keterangan</h5>
                            <p class="mb-0 text-dark">Kematian Desa</p>
                        </div>
                        <div class="service-img">
                            <a class="btn m-1 btn-creative btn-light" href="#">Buat Surat</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Card -->
            <div class="card service-card bg-primary bg-gradient mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="service-text">
                            <h5>Surat Keterangan</h5>
                            <p class="mb-0">Waris</p>
                        </div>
                        <div class="service-img">
                            <a class="btn m-1 btn-creative btn-light" href="#">Buat Surat</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Card -->
            <div class="card service-card bg-warning bg-gradient">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="service-text">
                            <h5 class="text-dark">Surat Keterangan</h5>
                            <p class="mb-0 text-dark">Domisili Lembaga</p>
                        </div>
                        <div class="service-img">
                            <a class="btn m-1 btn-creative btn-light" href="#">Buat Surat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Nav -->
    <div class="footer-nav-area" id="footerNav">
        <div class="container px-0">
            <!-- Footer Content -->
            <div class="footer-nav position-relative">
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li class="active">
                        <a href="home.html">
                            <i class="bi bi-house"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="settings.html">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- All JavaScript Files -->
    <script src="{{ asset('assets4/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/slideToggle.min.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/internet-status.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/venobox.min.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/countdown.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/rangeslider.min.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/vanilla-dataTables.min.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/index.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/dark-rtl.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/active.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/pwa.js') }}"></script>
</body>

</html>
