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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>

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

        <div class="page-content-wrapper py-3">
            <!-- Element Heading -->
            <div class="container">
                <div class="element-heading">
                    <h6>Tambah lahan</h6>
                </div>
            </div>

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label class="form-label" for="inputLuasLahan">Luas lahan (m<sup>2</sup>)</label>
                                <input class="form-control" id="inputLuasLahan" type="number"
                                    placeholder="Masukkan luas lahan">
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="inputAlamatLahan">Alamat lahan (Nama Desa)</label>
                                <input class="form-control" id="inputAlamatLahan" type="text"
                                    placeholder="Masukkan nama desa">
                                <button type="button" onclick="cariKoordinat()">Cari Koordinat</button>
                            </div>
                            <div id="map"></div>
                            <div class="form-group">
                                <label class="form-label" for="inputLatitude">Latitude</label>
                                <input class="form-control" id="inputLatitude" type="text" placeholder="Latitude"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="inputLongitude">Longitude</label>
                                <input class="form-control" id="inputLongitude" type="text"
                                    placeholder="Longitude" readonly>
                            </div>

                            <!-- MAP CONTAINER -->



                            <div class="form-group">
                                <label class="form-label" for="inputJenisTanaman">Jenis tanaman</label>
                                <input class="form-control" id="inputJenisTanaman" type="text"
                                    placeholder="Masukkan jenis tanaman">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="inputJumlahTanaman">Jumlah tanaman</label>
                                <input class="form-control" id="inputJumlahTanaman" type="number"
                                    placeholder="Masukkan jumlah tanaman">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="inputTanggalTanam">Tanggal tanam</label>
                                <input class="form-control" id="inputTanggalTanam" type="date">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="inputMasaTanam">Masa tanam (hari)</label>
                                <input class="form-control" id="inputMasaTanam" type="number"
                                    placeholder="Masukkan masa tanam">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="inputTanggalPanen">Tanggal panen</label>
                                <input class="form-control" id="inputTanggalPanen" type="date">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="inputPerkiraanPanen">Perkiraan hasil panen</label>
                                <input class="form-control" id="inputPerkiraanPanen" type="number"
                                    placeholder="Masukkan perkiraan hasil panen">
                            </div>

                            <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center"
                                type="submit">
                                Tambah lahan
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
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script>
            // Inisialisasi Peta
            var map = L.map('map').setView([-2.5489, 118.0149], 5); // Pusat di Indonesia

            // Tambahkan Tile Layer (OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([-2.5489, 118.0149], { draggable: true }).addTo(map) // Default marker
                .bindPopup("Geser marker untuk menyesuaikan lokasi").openPopup();

            // Fungsi memperbarui form saat marker dipindahkan
            marker.on('dragend', function (e) {
                var posisi = marker.getLatLng();
                document.getElementById('inputLatitude').value = posisi.lat.toFixed(6);
                document.getElementById('inputLongitude').value = posisi.lng.toFixed(6);
            });

            function cariKoordinat() {
                var desa = document.getElementById('inputAlamatLahan').value;
                if (!desa) {
                    alert("Silakan masukkan nama desa terlebih dahulu.");
                    return;
                }

                var url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(desa)}, Indonesia`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            var latitude = parseFloat(data[0].lat);
                            var longitude = parseFloat(data[0].lon);

                            // Isi form koordinat
                            document.getElementById('inputLatitude').value = latitude.toFixed(6);
                            document.getElementById('inputLongitude').value = longitude.toFixed(6);

                            // Update posisi marker
                            marker.setLatLng([latitude, longitude]);
                            marker.bindPopup(`<b>${desa}</b><br>Lat: ${latitude}, Lng: ${longitude}`).openPopup();

                            map.setView([latitude, longitude], 13); // Zoom ke lokasi
                        } else {
                            alert("Lokasi tidak ditemukan. Coba masukkan nama desa yang lebih spesifik.");
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>

</body>

</html>
