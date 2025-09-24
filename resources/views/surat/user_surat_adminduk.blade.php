<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sitakro - Aplikasi Pertanian">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>Sitakro Pengajuan Surat Adminduk</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets4/img/core-img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets4/img/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets4/img/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets4/img/icons/icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets4/img/icons/icon-180x180.png') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets4/dist/style.css') }}">

    <!-- Manifest -->
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
            <div
                class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                <!-- Back Button -->
                <div class="back-button">
                    <a href="{{ route('surat.pengajuan_surat') }}">
                        <i class="bi bi-arrow-left-short"></i>
                    </a>
                </div>
                <!-- Page Title -->
                <div class="page-heading">
                    <h6 class="mb-0">Form Pengajuan Adminduk</h6>
                </div>
                <div class="setting-wrapper"></div>
            </div>
        </div>
    </div>

    {{-- ======= PAGE CONTENT ======= --}}
    <div class="page-content-wrapper py-3">
        <div class="container">

            @php
                // Daftar judul dari kamu
                $titles = [
                    'SURAT PERNYATAAN TIDAK BISA MELAMPIRKAN KTP KEMATIAN',
                    'SURAT PERNYATAAN NUMPANG KK',
                    'SURAT PERNYATAAN MEMILIH NAMA ALIAS',
                    'SURAT PERNYATAAN MEMILIH NAMA ALIAS SATU ORANG TUA',
                    'SURAT PERNYATAAN DAN JAMINAN',
                    'SURAT PERNYATAAN BELUM PERNAH MENGURUS AKTA KELAHIRAN',
                    'SURAT PERNYATAAN BEDA NAMA BUKU NIKAH',
                    'SURAT PERNYATAAN ANAK SEORANG NAMA IBU (BARU)',
                    'SURAT PERNYATAAN AKTA BARCODE NOMOR SAMA-BARU ISI SENDIRI',
                    'SPTJM KEMATIAN',
                    'PERNYATAAN PERUBAHAN DATA PENDIDIKAN',
                    'PERNYATAAN PEMBETULAN DATA TIDAK MERUBAH LAGI',
                    'PERNYATAAN MENGIZINKAN IKUT KK SUAMI-ISTRI-KELUARGA',
                    'PERMOHONAN PENGANTAR KEABSAHAN UNTUK DIRI SENDIRI',
                    'PERMOHONAN PENGANTAR KEABSAHAN UNTUK ANAK',
                    'FORM PERNYATAAN BATAL PINDAH',
                    'F-3.01 Formulir Pengajuan User ID',
                    'F-2.04 SPTJM SUAMI ISTRI',
                    'F-2.03 SPTJM KELAHIRAN',
                    'F-2.01 Form PELAPORAN CAPIL WILAYAH NKRI 1',
                    'F-1.09 Kartu Keluarga',
                    'F-1.08 Biodata Penduduk di wilayah NKRI dan WNI di luar wilayah NKRI',
                    'F-1.07 Surat Kuasa Dalam Pelayanan Administrasi Kependudukan',
                    'F-1.06 PERNYATAAN PERUBAHAN ELEMEN DATA Kependudukan',
                    'F-1.05 Surat Pernyataan Tanggung Jawab Mutlak Perkawinan Perceraian Belum Tercatat',
                    'F-1.04 Surat Pernyataan Tidak Memiliki Dokumen Kependudukan',
                    'F-1.03 PENDAFTARAN PERPINDAHAN PENDUDUK',
                    'F-1.02 PENDAFTARAN PERISTIWA KEPENDUDUKAN',
                    'F-1.01 FORM  BIODATA KELUARGA',
                ];

                // Peta judul -> route yang sudah tersedia di app kamu
                $routeMap = [
                    'SURAT PERNYATAAN TIDAK BISA MELAMPIRKAN KTP KEMATIAN' => 'surat.userkematianktp',
                    'SURAT PERNYATAAN NUMPANG KK' => 'surat.usernumpangkk',
                    'SURAT PERNYATAAN MEMILIH NAMA ALIAS' => 'surat.usernamaalias',
                    'SURAT PERNYATAAN MEMILIH NAMA ALIAS SATU ORANG TUA' => 'surat.usernamaaliasortu',
                    'SURAT PERNYATAAN DAN JAMINAN' => 'surat.userpernyataanjaminan',
                    'SURAT PERNYATAAN BELUM PERNAH MENGURUS AKTA KELAHIRAN' => 'surat.userpernyataanbelumakta',
                    'SURAT PERNYATAAN BEDA NAMA BUKU NIKAH' => 'surat.userbedanama',
                    'SURAT PERNYATAAN ANAK SEORANG NAMA IBU (BARU)' => 'surat.useranakseorangibu',
                    'SURAT PERNYATAAN AKTA BARCODE NOMOR SAMA-BARU ISI SENDIRI' => 'surat.useraktabarcode',
                    'SPTJM KEMATIAN' => 'surat.usersptjm',
                    // tambahkan mapping lain jika route-nya sudah ada...
                ];

                // Warna kartu akan dirotasi
                $colors = ['danger', 'info', 'success', 'warning', 'primary'];
            @endphp

            @foreach ($titles as $i => $title)
                @php
                    $color = $colors[$i % count($colors)];
                    $subtitle = str_starts_with($title, 'F-')
                        ? 'Formulir'
                        : (str_contains(strtolower($title), 'sptjm')
                            ? 'SPTJM'
                            : 'Surat Pernyataan');
                    $routeName = $routeMap[$title] ?? null;
                    $href = $routeName && Route::has($routeName) ? route($routeName) : null;
                @endphp

                <div class="card service-card bg-{{ $color }} bg-gradient mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="service-text">
                                <h5 class="{{ in_array($color, ['success', 'warning', 'primary']) ? 'text-dark' : '' }}">
                                    {{ ucwords(strtolower($title)) }}
                                </h5>
                                <p
                                    class="mb-0 {{ in_array($color, ['success', 'warning', 'primary']) ? 'text-dark' : '' }}">
                                    {{ $subtitle }}
                                </p>
                            </div>
                            <div class="service-img">
                                @if ($href)
                                    <a class="btn m-1 btn-creative btn-light" href="{{ $href }}">Buat Surat</a>
                                @else
                                    <button class="btn m-1 btn-creative btn-light" type="button" disabled>
                                        Maintance
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Footer Nav -->
    <div class="footer-nav-area" id="footerNav">
        <div class="container px-0">
            <div class="footer-nav position-relative">
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li class="active">
                        <a href="{{ route('surat.pengajuan_surat') }}">
                            <i class="bi bi-house"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- JS -->
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
