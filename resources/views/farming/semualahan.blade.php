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

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- # Header Five Layout -->
            <!-- # Copy the code from here ... -->
            <!-- Header Content -->
            <div
                class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                <!-- Logo Wrapper -->
                <div class="logo-wrapper">
                    <a href="home.html">
                        <img src="assets4/dist/img/core-img/logosi.png" alt="">
                    </a>
                </div>

                <!-- Navbar Toggler -->
                {{-- <div class="navbar--toggler" id="affanNavbarToggler6" data-bs-toggle="offcanvas"
        data-bs-target="#affanOffcanvas" aria-controls="affanOffcanvas">
        <span class="d-block"></span>
        <span class="d-block"></span>
        <span class="d-block"></span>
      </div> --}}
            </div>
            <!-- # Header Five Layout End -->
        </div>
    </div>

    <!-- # Sidenav Left -->
    <div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1"
        aria-labelledby="affanOffcanvsLabel">

        <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>

        <div class="offcanvas-body p-0">
            <div class="sidenav-wrapper">
                <!-- Sidenav Profile -->
                <div class="sidenav-profile bg-gradient">
                    <div class="sidenav-style1"></div>

                    <!-- User Thumbnail -->
                    <div class="user-profile">
                        <img src="assets4/dist/img/bg-img/2.jpg" alt="">
                    </div>

                    <!-- User Info -->
                    <div class="user-info">
                        <h6 class="user-name mb-0">Affan Islam</h6>
                        <span>CEO, Designing World</span>
                    </div>
                </div>

                <!-- Sidenav Nav -->
                <ul class="sidenav-nav ps-0">
                    <li>
                        <a href="home.html"><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li>
                        <a href="elements.html"><i class="bi bi-heart"></i> Elements
                            <span class="badge bg-danger rounded-pill ms-2">220+</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages.html"><i class="bi bi-folder2-open"></i> Pages
                            <span class="badge bg-success rounded-pill ms-2">100+</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="bi bi-cart-check"></i> Shop</a>
                        <ul>
                            <li>
                                <a href="shop-grid.html"> Shop Grid</a>
                            </li>
                            <li>
                                <a href="shop-list.html"> Shop List</a>
                            </li>
                            <li>
                                <a href="shop-details.html"> Shop Details</a>
                            </li>
                            <li>
                                <a href="cart.html"> Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html"> Checkout</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="settings.html"><i class="bi bi-gear"></i> Settings</a>
                    </li>
                    <li>
                        <div class="night-mode-nav">
                            <i class="bi bi-moon"></i> Night Mode
                            <div class="form-check form-switch">
                                <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="login.html"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>

                <!-- Social Info -->
                <div class="social-info-wrap">
                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>

                <!-- Copyright Info -->
                <div class="copyright-info">
                    <p>
                        <span id="copyrightYear"></span>
                        &copy; Made by <a href="#"> Designing World</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper">

        <!-- Welcome Toast -->
        <div class="toast toast-autohide custom-toast-1 toast-primary home-page-toast shadow" role="alert"
            aria-live="assertive" aria-atomic="true" data-bs-delay="60000" data-bs-autohide="true"
            id="installWrap">
            <div class="toast-body p-4">
                <div class="toast-text me-2">
                    <h6 class="text-white">Hallo mas muhajir</h6>
                </div>
            </div>
            <button class="btn btn-close btn-close-white position-absolute p-2" type="button"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>

        <!-- Tiny Slider One Wrapper -->

        <div class="pt-3"></div>







        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped w-100" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Alamat</th>
                                    <th>Luas Lahan (m²)</th>
                                    <th>Jenis Tanaman</th>
                                    <th>Jumlah Pohon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jl. Raya No. 1</td>
                                    <td>2000</td>
                                    <td>Kelapa Sawit</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Jl. Merdeka No. 2</td>
                                    <td>1500</td>
                                    <td>Padi</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>Jl. Kebun No. 3</td>
                                    <td>2500</td>
                                    <td>Karet</td>
                                    <td>75</td>
                                </tr>
                                <tr>
                                    <td>Jl. Sejahtera No. 4</td>
                                    <td>1800</td>
                                    <td>Kopi</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>Jl. Makmur No. 5</td>
                                    <td>3000</td>
                                    <td>Kelapa</td>
                                    <td>90</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        {{-- <div class="container direction-rtl">
      <div class="card mb-3">
        <div class="card-body">
          <div class="row g-3">
            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/sass.png" alt="">
                </div>
                <p class="mb-0">SCSS</p>
              </div>
            </div>

            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/npm.png" alt="">
                </div>
                <p class="mb-0">npm</p>
              </div>
            </div>

            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/gulp.png" alt="">
                </div>
                <p class="mb-0">Gulp 4</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

        {{-- <div class="container">
      <div class="card bg-primary mb-3 bg-img" style="background-image: url('img/core-img/1.png')">
        <div class="card-body direction-rtl p-4">
          <h2 class="text-white">35+ Ready Pages</h2>
          <p class="mb-3 text-white">Already designed more than 35+ pages for your needs. Such as - Authentication,
            Chats, eCommerce, Blog &amp; Miscellaneous pages.</p>
          <a class="btn btn-warning" href="pages.html">All Pages <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div> --}}

        {{-- <div class="container direction-rtl">
      <div class="card mb-3">
        <div class="card-body">
          <div class="row g-3">
            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/dark.png" alt="">
                </div>
                <p class="mb-0">Dark Mode</p>
              </div>
            </div>

            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/rtl.png" alt="">
                </div>
                <p class="mb-0">RTL Ready</p>
              </div>
            </div>

            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/code.png" alt="">
                </div>
                <p class="mb-0">Easy Code</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

        {{-- <div class="container">
      <div class="card mb-3">
        <div class="card-body">
          <h3>Customer Review</h3>

          <div class="testimonial-slide-three-wrapper">
            <div class="testimonial-slide3 testimonial-style3">

              <!-- Single Testimonial Slide -->
              <div class="single-testimonial-slide">
                <div class="text-content">
                  <span class="d-inline-block badge bg-warning mb-2">
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill"></i>
                  </span>
                  <h6 class="mb-2">The code looks clean, and the designs are excellent. I recommend.</h6>
                  <span class="d-block">Mrrickez, Themeforest</span>
                </div>
              </div>

              <!-- Single Testimonial Slide -->
              <div class="single-testimonial-slide">
                <div class="text-content">
                  <span class="d-inline-block badge bg-warning mb-2">
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill"></i>
                  </span>
                  <h6 class="mb-2">All complete, <br> great craft.</h6>
                  <span class="d-block">Mazatlumm, Themeforest</span>
                </div>
              </div>

              <!-- Single Testimonial Slide -->
              <div class="single-testimonial-slide">
                <div class="text-content">
                  <span class="d-inline-block badge bg-warning mb-2">
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill"></i>
                  </span>
                  <h6 class="mb-2">Awesome template! <br> Excellent support!</h6>
                  <span class="d-block">Vguntars, Themeforest</span>
                </div>
              </div>

              <!-- Single Testimonial Slide -->
              <div class="single-testimonial-slide">
                <div class="text-content">
                  <span class="d-inline-block badge bg-warning mb-2">
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill"></i>
                  </span>
                  <h6 class="mb-2">Nice modern design, <br> I love the product.</h6>
                  <span class="d-block">electroMEZ, Themeforest</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

        {{-- <div class="container direction-rtl">
      <div class="card">
        <div class="card-body">
          <div class="row g-3">
            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/star.png" alt="">
                </div>
                <p class="mb-0">Best Rated</p>
              </div>
            </div>

            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/elegant.png" alt="">
                </div>
                <p class="mb-0">Elegant</p>
              </div>
            </div>

            <div class="col-4">
              <div class="feature-card mx-auto text-center">
                <div class="card mx-auto bg-gray">
                  <img src="assets4/dist/img/demo-img/lightning.png" alt="">
                </div>
                <p class="mb-0">Trendsetter</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

        <div class="pb-3"></div>
    </div>

    <!-- Footer Nav -->
    <div class="footer-nav-area" id="footerNav">
        <div class="container px-0">
            <!-- Footer Content -->
            <div class="footer-nav position-relative footer-style-four shadow-sm">
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li>
                        <a href="{{ route('farm.home') }}">
                            <i class="bi bi-house"></i>
                        </a>
                        <span>Beranda</span>
                    </li>

                    <li class="active">
                        <a href="{{ route('farm.lahan') }}">
                            <i class="bi bi-bar-chart"></i>
                        </a>
                        <span>Lahan</span>
                    </li>

                    <li class="active">
                        <a href="{{ route('farm.perawatan') }}">
                            <i class="bi bi-clipboard-heart"></i>
                        </a>
                        <span>Perawatan</span>
                    </li>

                    <li>
                        <a href="{{ route('farm.profile') }}">
                            <i class="bi bi-person"></i>
                        </a>
                        <span>Profile</span>
                    </li>
                </ul>
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
