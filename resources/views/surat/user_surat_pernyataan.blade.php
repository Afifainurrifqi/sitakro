{{-- resources/views/surat/user_pernyataan.blade.php --}}
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
  <title>Sitakro Pelayanan Surat Pernyataan</title>

  <link rel="icon" href="{{ asset('assets4/img/core-img/favicon.ico') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets4/img/icons/icon-96x96.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets4/img/icons/icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets4/img/icons/icon-167x167.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets4/img/icons/icon-180x180.png') }}">
  <link rel="stylesheet" href="{{ asset('assets4/dist/style.css') }}">
  <link rel="manifest" href="/assets4/dist/manifest.json">
</head>
<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
  </div>

  <!-- Internet Connection Status -->
  <div class="internet-connection-status" id="internetStatus"></div>

  <!-- Header Area -->
  <div class="header-area" id="headerArea">
    <div class="container">
      <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
        <div class="back-button">
          <a href="{{ route('surat.pengajuan_surat') }}"><i class="bi bi-arrow-left-short"></i></a>
        </div>
        <div class="page-heading"><h6 class="mb-0">Surat Pernyataan</h6></div>
        <div class="setting-wrapper"></div>
      </div>
    </div>
  </div>

  <div class="page-content-wrapper py-3">
    <div class="container">

      @php
        // === Data mentah: persis seperti yang diminta (biarkan spasi gandanya) ===
        $rawTitles = [
          'SURAT PERNYATAAN Kepemilikan Dokumen  Asli',
          'SURAT PERNYATAAN KESANGGUPAN',
          'Surat Pernyataan Tidak memiliki kartu JAMKESMAS,ASKES atau JKN',
          'Surat Pernyataan Miskin',
          'SURAT  IJIN KELUARGA',
          'SURAT  KUASA ',
          'Permohonan Pembukaan Rekening Tabungan ',
          'SURAT PERINTAH TUGAS   ',
          'SURAT PERINTAH PERJALANAN DINAS',
          'Undangan',
          'Rekomendasi',
          'FORMAT BLANGKO NOTA ANGKUTAN',
          'SURAT REKOMENDASI PEMBELIAN BBM JENIS TERTENTU',
          'SURAT PENYELENGGARAAN KERAMAIAN',
          'Permohonan surat  Pernyataan miskin',
          'Surat Permohonan Tebang pohon',
        ];

        // Normalisasi tampilan: kompres spasi berlebih untuk ditampilkan,
        // tetapi pencocokan route pakai versi UPPER yg sudah di-trim+compress.
        $titles = collect($rawTitles)->map(function ($t) {
          return preg_replace('/\s+/', ' ', trim($t));
        })->values();

        // === Mapping Judul -> Nama Route (USER) ===
        // Pastikan nama route berikut sesuai definisi rute user-mu.
        $routeMap = [
          'SURAT PERNYATAAN KEPEMILIKAN DOKUMEN ASLI' => 'surat.userkepemilikandokumen.index', // ganti sesuai route sebenarnya
          'SURAT PERNYATAAN KESANGGUPAN'              => 'surat.userkesanggupan',        // contoh user route
          'SURAT PERNYATAAN TIDAK MEMILIKI KARTU JAMKESMAS,ASKES ATAU JKN' => 'surat.usertidakpunyakartu.index', // sesuaikan
          'SURAT PERNYATAAN MISKIN'                   => 'surat.userpernyataanmiskin.index',   // sesuaikan
          'SURAT IJIN KELUARGA'                       => 'surat.userijinkeluarga.index',       // sesuaikan
          'SURAT KUASA'                                => 'surat.userkuasa',             // ← Surat Kuasa (user)
          'PERMOHONAN PEMBUKAAN REKENING TABUNGAN'    => 'surat.userrekening',     // sesuaikan
          'SURAT PERINTAH TUGAS'                      => 'surat.userspt.index',                // sesuaikan
          'SURAT PERINTAH PERJALANAN DINAS'           => 'surat.usersppd.index',               // sesuaikan
          'UNDANGAN'                                  => 'surat.userundangan.index',           // sesuaikan
          'REKOMENDASI'                               => 'surat.userrekomendasi.index',        // sesuaikan
          'FORMAT BLANGKO NOTA ANGKUTAN'              => 'surat.usernotaangkutan.index',       // sesuaikan
          'SURAT REKOMENDASI PEMBELIAN BBM JENIS TERTENTU' => 'surat.userrekombbm.index',     // sesuaikan
          'SURAT PENYELENGGARAAN KERAMAIAN'           => 'surat.userkeramaian.index',          // sesuaikan
          'PERMOHONAN SURAT PERNYATAAN MISKIN'        => 'surat.userpermohonanmiskin.index',   // sesuaikan
          'SURAT PERMOHONAN TEBANG POHON'             => 'surat.usertembangpohon.index',       // sesuaikan
        ];

        // Warna kartu (rotasi)
        $colors = ['danger', 'info', 'success', 'warning', 'primary'];
      @endphp

      @foreach ($titles as $i => $titleDisplay)
        @php
          // Kunci untuk route-map: uppercase versi normalized
          $key = mb_strtoupper($titleDisplay, 'UTF-8');

          // Khusus dua item yang berbeda kapital/spasi di sumber:
          // - "SURAT  KUASA " -> normalized ke "SURAT KUASA"
          // - trailing spaces sudah di-trim di atas
          $key = preg_replace('/\s+/', ' ', trim($key));

          $routeName = $routeMap[$key] ?? null;
          $href = $routeName && Route::has($routeName) ? route($routeName) : null;

          // Judul cantik
          $titlePretty = ucwords(strtolower($titleDisplay));

          // Subjudul
          $subtitle = 'Surat Pernyataan';

          // Warna & teks
          $color = $colors[$i % count($colors)];
          $textDark = in_array($color, ['success','warning','primary']) ? 'text-dark' : '';
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
