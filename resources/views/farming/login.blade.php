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
  <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
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

  <!-- Back Button -->
  <div class="login-back-button">
    <a href="{{ route('farm.start') }}">
      <i class="bi bi-arrow-left-short"></i>
    </a>
  </div>

  <!-- Login Wrapper Area -->
  <div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
      <div class="text-center px-4">
        <img class="login-intro-img" src="assets4/dist/img/bg-img/logins.png" alt="">
      </div>

      <!-- Register Form -->
      <div class="register-form mt-4">
        <h6 class="mb-3 text-center">Masuk untuk melanjutkan Pertanian</h6>

        <form action="home.html">
          <div class="form-group">
            <input class="form-control" type="text" id="username" placeholder="Masukkan NIK. . .">
          </div>

          <div class="form-group position-relative">
            <input class="form-control" id="psw-input" type="password" placeholder="Enter Password">
            <div class="position-absolute" id="password-visibility">
              <i class="bi bi-eye"></i>
              <i class="bi bi-eye-slash"></i>
            </div>
          </div>


          <a class="btn btn-primary w-100" href="{{ route('farm.home') }}">Masuk</a>
        </form>
      </div>

      <!-- Login Meta -->
      {{-- <div class="login-meta-data text-center">
        <a class="stretched-link forgot-password d-block mt-3 mb-1" href="forget-password.html">Forgot
          Password?</a>
        <p class="mb-0">Didn't have an account? <a class="stretched-link" href="register.html">Register Now</a></p>
      </div> --}}
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
