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

    <title>Sitakro Pelayanan Surat</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets4/img/core-img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets4/img/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets4/img/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets4/img/icons/icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets4/img/icons/icon-180x180.png') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets4/dist/style.css') }}">

    <!-- Web App Manifest -->
    <link rel="manifest" href="/assets4/dist/manifest.json">

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
                <!-- Logo Wrapper -->
                <div class="logo-wrapper">
                    <a href="awal.html">
                        <img ssrc="{{ asset('assets4/img/Kemirigede.png') }}" alt="">
                    </a>
                </div>

                <!-- Navbar Toggler -->

            </div>
        </div>
    </div>


    <div class="page-content-wrapper">



        <!-- Tiny Slider One Wrapper -->
        <div class="tiny-slider-one-wrapper">
            <div class="tiny-slider-one">
                <!-- Single Hero Slide -->
                <div>
                    <div>
                        <div class="single-hero-slide bg-overlay" style="background-image: url('{{ asset('assets4/dist/img/Desa-Kemirigede-banner.png') }}')">
                            <div class="h-100 d-flex align-items-center text-center">
                                <div class="container">
                                    <h3 class="text-white mb-1">Kemirigede Berkelas</h3>
                                    <p class="text-white mb-4">Siap Sambut Digitalisasi Desa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Hero Slide -->
                <div>
                    <div class="single-hero-slide bg-overlay"
                        style="background-image: url('{{ asset('assets4/dist/img/bg.jpg') }}')">
                        <div class="h-100 d-flex align-items-center text-center">
                            <div class="container">
                                <h3 class="text-white mb-1">Kemirigede Berkelas</h3>
                                <p class="text-white mb-4">Siap Sambut Digitalisasi Desa</p>

                            </div>
                        </div>
                    </div>
                </div>



                <!-- Single Hero Slide -->

            </div>
        </div>

        <div class="pt-3"></div>

        <div class="container direction-rtl">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="{{ route('surat.adminduk') }}">
                                        <img src="{{ asset('assets4/dist/img/adminduk.png') }}" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">FORM PENGAJUAN ADMINDUK</p>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                       <a href="{{ route('surat.keterangan') }}">
                                        <img src="{{ asset('assets4/dist/img/keterangan.png') }}" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">SURAT KETERANGAN</p>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="{{ route('surat.pernyataan') }}">
                                        <img src="{{ asset('assets4/dist/img/pernyataan.png') }}" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">SURAT PERNYATAAN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card card-bg-img bg-img bg-overlay mb-3"
                style="background-image: url('{{ asset('assets4/dist/img/Desa-Kemirigede-banner.png') }}')">
                <div class="card-body direction-rtl p-4">
                    <h2 class="text-white">24 Jam dapat mengajukan surat</h2>
                </div>
            </div>
        </div>





        <div class="container">
            <div class="card bg-primary mb-3 bg-img"
                style="background-image: url('{{ asset('assets4/dist/img/core-img/1.png') }}')">
                <div class="card-body direction-rtl p-4">
                    <h2 class="text-white">40+ Jenis Pelayanan Surat</h2>
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
                            <a href={{ route('surat.pengajuan_surat') }}>
                                <i class="bi bi-house"></i>
                                <span>Beranda</span>
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
