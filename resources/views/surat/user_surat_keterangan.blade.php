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
    <title>Sitakro Pelayanan Surat Keterangan</title>

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
            <div
                class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                <div class="back-button">
                    <a href="{{ route('surat.pengajuan_surat') }}"><i class="bi bi-arrow-left-short"></i></a>
                </div>
                <div class="page-heading">
                    <h6 class="mb-0">Surat Keterangan</h6>
                </div>
                <div class="setting-wrapper"></div>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper py-3">
        <div class="container">

            @php
                // Data mentah (pakai persis yang kamu kirim)
                $rawTitles = [
                    'SURAT   KETERANGAN KEHILANGAN',
                    'SURAT   KETERANGAN   DESA  PERNAH MENIKAH',
                    'SURAT KETERANGAN TIDAK MAMPU',
                    'SURAT KETERANGAN KEMATIAN DESA',
                    'SURAT KETERANGAN WARIS',
                    'SURAT KETERANGAN HARGA KEPEMILIKAN TANAH',
                    'SURAT KETERANGAN NUMPANG NIKAH',
                    'KETERANGAN   PENGANTAR   SKCK',
                    'Surat Keterangan Kepemilikan  Aset',
                    'SURAT  KETERANGAN  USAHA',
                    'Surat Keterangan Desa Warga Miskin',
                    'SURAT KETERANGAN MISKIN ( SKM )',
                    'SURAT  KETERANGAN  AHLI WARIS',
                    'SURAT KETERANGAN GHOIB',
                    'SURAT KETERANGAN PENGHASILAN',
                    'SURAT KETERANGAN DOMISILI LEMBAGA',
                    'SURAT KETERANGAN DOMISILI WARGA',
                    'Surat Keterangan Desa Sebagai Penduduk Desa',
                ];

                // Normalisasi judul: buang spasi berlebih, kapitalisasi wajar
                $titles = collect($rawTitles)
                    ->map(function ($t) {
                        $t = preg_replace('/\s+/', ' ', trim($t)); // compress spasi
                        // biarkan beberapa huruf kapital sesuai gaya, tapi kita tampilkan dengan ucwords
                        return $t;
                    })
                    ->values();

                // Mapping judul -> nama route (yang tersedia sekarang)
                $routeMap = [
                    'SURAT KETERANGAN KEHILANGAN' => 'surat.userkehilangan',
                    'SURAT KETERANGAN TIDAK MAMPU' => 'surat.usertidakmampu',
                    'SURAT KETERANGAN DESA PERNAH MENIKAH' => 'surat.userpernahmenikah',
                    'SURAT KETERANGAN KEMATIAN DESA' => 'surat.userkematian',
                    'SURAT KETERANGAN WARIS' => 'surat.userahliwaris',
                    'SURAT KETERANGAN HARGA KEPEMILIKAN TANAH' => 'surat.userkepemilikantanah',
                    'KETERANGAN PENGANTAR SKCK' => 'surat.userskck',
                    // Tambahkan mapping lain bila route sudah dibuat
                ];

                // Warna kartu berputar
                $colors = ['danger', 'info', 'success', 'warning', 'primary'];
            @endphp

            @foreach ($titles as $i => $titleRaw)
                @php
                    // Versi kunci UPPERCASE untuk pencocokan peta route
                    $key = mb_strtoupper($titleRaw, 'UTF-8');
                    $routeName = $routeMap[$key] ?? null;
                    $href = $routeName && Route::has($routeName) ? route($routeName) : null;

                    // Tampilan judul yang rapi
                    $titlePretty = ucwords(strtolower($titleRaw));

                    // Subtitle default
                    $subtitle = 'Surat Keterangan';

                    // Warna kartu
                    $color = $colors[$i % count($colors)];

                    // Pilih warna teks gelap untuk kartu terang
                    $textDark = in_array($color, ['success', 'warning', 'primary']) ? 'text-dark' : '';
                @endphp

                <div class="card service-card bg-{{ $color }} bg-gradient mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="service-text">
                                <h5 class="{{ $textDark }}">{{ $titlePretty }}</h5>
                                <p class="mb-0 {{ $textDark }}">{{ $subtitle }}</p>
                            </div>
                            <div class="service-img">
                                @if ($href)
                                    <a class="btn m-1 btn-creative btn-light" href="{{ $href }}">Buat Surat</a>
                                @else
                                    <button class="btn m-1 btn-creative btn-light" type="button" disabled>Maintance</button>
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
