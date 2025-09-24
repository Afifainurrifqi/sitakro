<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sitakro - Aplikasi Pertanian">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <meta name="theme-color" content="#0134d4">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <!-- Title -->
  <title>Sitakro Pertanian</title>

  <!-- Favicon -->
   <link rel="icon" href="assets4/dist/img/core-img/favicon.ico">
    <link rel="apple-touch-icon" href="assets4/img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets4/dist/img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="assets4/dist/img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets4/dist/img/icons/icon-180x180.png">

  <!-- Style CSS -->
  <link rel="stylesheet" href="assets4/dist/style.css">

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

  <!-- Hero Block Wrapper -->
  <div class="hero-block-wrapper bg-primary">
    <!-- Styles -->
    <div class="hero-block-styles">
      <div class="hb-styles1" style="background-image: url('assets4/dist/img/core-img/dot.png')"></div>
      <div class="hb-styles2"></div>
      <div class="hb-styles3"></div>
    </div>

    <div class="custom-container">
      <!-- Skip Page -->
      <div class="skip-page">
        <a href="{{ route('farm.login') }}">Skip</a>
      </div>

      <!-- Hero Block Content -->
      <div class="hero-block-content">
        <img class="mb-4" src="assets4/dist/img/bg-img/bgs.png" alt="">
        <h2 class="display-4 text-white mb-3">Selamat datang di SITAKRO Farming App</h2>
        <p class="text-white">Biarkan kami membantumu dalam mengelola lahan</p>
        <a class="btn btn-warning btn-lg w-100" href="{{ route('farm.login') }}">Mulai</a>
      </div>
    </div>
  </div>

  <!-- All JavaScript Files -->
  <script src="assets4/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets4/dist/js/slideToggle.min.js"></script>
  <script src="assets4/dist/js/internet-status.js"></script>
  <script src="assets4/dist/js/tiny-slider.js"></script>
  <script src="assets4/dist/js/venobox.min.js"></script>
  <script src="assets4/dist/js/countdown.js"></script>
  <script src="assets4/dist/js/rangeslider.min.js"></script>
  <script src="assets4/dist/js/vanilla-dataTables.min.js"></script>
  <script src="assets4/dist/js/index.js"></script>
  <script src="assets4/dist/js/imagesloaded.pkgd.min.js"></script>
  <script src="assets4/dist/js/isotope.pkgd.min.js"></script>
  <script src="assets4/dist/js/dark-rtl.js"></script>
  <script src="assets4/dist/js/active.js"></script>
  <script src="assets4/dist/js/pwa.js"></script>
</body>

</html>
