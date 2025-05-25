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
    <link rel="manifest" href="{{ asset('assets4/dist/manifest.json') }}">
</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="spinner-grow text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>



  <!-- Header Area -->
  <div class="header-area" id="headerArea">
    <div class="container">
      <!-- Header Content -->
      <div class="header-content position-relative d-flex align-items-center justify-content-between">
        <!-- Back Button -->
        <div class="back-button">
          <a href="adm.html">
            <i class="bi bi-arrow-left-short"></i>
          </a>
        </div>

        <!-- Page Title -->
        <div class="page-heading">
          <h6 class="mb-0">Form Pengajuan Adminduk</h6>
        </div>

        <!-- Settings -->
        <div class="setting-wrapper">
          <div class="setting-trigger-btn" id="settingTriggerBtn">
            <i class="bi bi-gear"></i>
            <span></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-content-wrapper py-3">
    <!-- Element Heading -->
    <div class="container">
      <div class="element-heading">
        <h6>Buat Pengajuan Surat</h6>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-body">
<form class="was-validated" action="#" method="POST" novalidate>
  <div class="form-group">
    <label class="form-label" for="namaPernyataan">Nama Lengkap (Pembuat Pernyataan)</label>
    <input class="form-control" id="namaPernyataan" name="namaPernyataan" type="text" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="nikPernyataan">Nomor KTP / NIK</label>
    <input class="form-control" id="nikPernyataan" name="nikPernyataan" type="text" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="alamatPernyataan">Alamat Lengkap</label>
    <textarea class="form-control" id="alamatPernyataan" name="alamatPernyataan" rows="3" required></textarea>
  </div>

  <div class="form-group">
    <label class="form-label" for="hubungan">Hubungan dengan yang Meninggal</label>
    <input class="form-control" id="hubungan" name="hubungan" type="text" placeholder="Misal: Anak, Suami/Istri, Dll" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="namaMeninggal">Nama Lengkap Orang yang Meninggal</label>
    <input class="form-control" id="namaMeninggal" name="namaMeninggal" type="text" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="tanggalMeninggal">Tanggal Meninggal</label>
    <input class="form-control" id="tanggalMeninggal" name="tanggalMeninggal" type="date" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="tempatMeninggal">Tempat Meninggal</label>
    <input class="form-control" id="tempatMeninggal" name="tempatMeninggal" type="text" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="alasan">Alasan Tidak Bisa Melampirkan KTP</label>
    <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
  </div>

  <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
    Buat Surat
    <i class="bi bi-arrow-right fz-16 ms-1"></i>
  </button>
</form>

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

</html>
