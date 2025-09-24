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
    -->
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

    <!-- Dark mode switching -->
    <div class="dark-mode-switching">
        <div class="d-flex w-100 h-100 align-items-center justify-content-center">
            <div class="dark-mode-text text-center">
                <i class="bi bi-moon"></i>
                <p class="mb-0">Switching to dark mode</p>
            </div>
            <div class="light-mode-text text-center">
                <i class="bi bi-brightness-high"></i>
                <p class="mb-0">Switching to light mode</p>
            </div>
        </div>
    </div>

    <!-- RTL mode switching -->
    <div class="rtl-mode-switching">
        <div class="d-flex w-100 h-100 align-items-center justify-content-center">
            <div class="rtl-mode-text text-center">
                <i class="bi bi-text-right"></i>
                <p class="mb-0">Switching to RTL mode</p>
            </div>
            <div class="ltr-mode-text text-center">
                <i class="bi bi-text-left"></i>
                <p class="mb-0">Switching to default mode</p>
            </div>
        </div>
    </div>

    <!-- Setting Popup Overlay -->
    <div id="setting-popup-overlay"></div>

    <!-- Setting Popup Card -->
    <div class="card setting-popup-card shadow-lg" id="settingCard">
        <div class="card-body">
            <div class="container">
                <div class="setting-heading d-flex align-items-center justify-content-between mb-3">
                    <p class="mb-0">Settings</p>
                    <div class="btn-close" id="settingCardClose"></div>
                </div>

                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="availabilityStatus" checked>
                        <label class="form-check-label" for="availabilityStatus">Availability status</label>
                    </div>
                </div>

                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="sendMeNotifications" checked>
                        <label class="form-check-label" for="sendMeNotifications">Send me notifications</label>
                    </div>
                </div>

                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="darkSwitch">
                        <label class="form-check-label" for="darkSwitch">Dark mode</label>
                    </div>
                </div>

                <div class="single-setting-panel">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rtlSwitch">
                        <label class="form-check-label" for="rtlSwitch">RTL mode</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Header Content -->
            <div class="header-content position-relative d-flex align-items-center justify-content-between">
                <!-- Back Button -->
                <div class="back-button">
                     <a href={{ route('surat.pengajuan_surat') }}>
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
                <h6>Buat Pengajuan Surat Pernyataan tidak bisa melampirkan KTP Kematian</h6>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user_suratpernyataantidakbisamelampirkanktpkematian.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="card shadow-sm">
                                <div class="card-body">

                                    <h5 class="mb-4">Data Pelapor</h5>

                                    <div class="mb-3">
                                        <label for="nama_pelapor" class="form-label">Nama Pelapor <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nama_pelapor" id="nama_pelapor"
                                            class="form-control" required value="{{ old('nama_pelapor') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_pelapor" class="form-label">NIK Pelapor <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nik_pelapor" id="nik_pelapor"
                                            class="form-control" required value="{{ old('nik_pelapor') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_lahir_pelapor" class="form-label">Tempat Lahir Pelapor
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="tempat_lahir_pelapor" id="tempat_lahir_pelapor"
                                            class="form-control" required value="{{ old('tempat_lahir_pelapor') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir_pelapor" class="form-label">Tanggal Lahir Pelapor
                                            <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_lahir_pelapor" id="tanggal_lahir_pelapor"
                                            class="form-control" required value="{{ old('tanggal_lahir_pelapor') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin_pelapor" class="form-label">Jenis Kelamin Pelapor
                                            <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin_pelapor" id="jenis_kelamin_pelapor"
                                            class="form-select" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki"
                                                {{ old('jenis_kelamin_pelapor') == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan"
                                                {{ old('jenis_kelamin_pelapor') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan_pelapor" class="form-label">Pekerjaan Pelapor <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="pekerjaan_pelapor" id="pekerjaan_pelapor"
                                            class="form-control" required value="{{ old('pekerjaan_pelapor') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_pelapor" class="form-label">Alamat Pelapor <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="alamat_pelapor" id="alamat_pelapor"
                                            class="form-control" required value="{{ old('alamat_pelapor') }}">
                                    </div>

                                    <hr>

                                    <h5 class="mb-4">Data Jenazah</h5>

                                    <div class="mb-3">
                                        <label for="nik_jenazah" class="form-label">NIK Jenazah <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nik_jenazah" id="nik_jenazah"
                                            class="form-control" required value="{{ old('nik_jenazah') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_jenazah" class="form-label">Nama Jenazah <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nama_jenazah" id="nama_jenazah"
                                            class="form-control" required value="{{ old('nama_jenazah') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir_jenazah" class="form-label">Tanggal Lahir Jenazah
                                            <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_lahir_jenazah" id="tanggal_lahir_jenazah"
                                            class="form-control" required value="{{ old('tanggal_lahir_jenazah') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin_jenazah" class="form-label">Jenis Kelamin Jenazah
                                            <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin_jenazah" id="jenis_kelamin_jenazah"
                                            class="form-select" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki"
                                                {{ old('jenis_kelamin_jenazah') == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan"
                                                {{ old('jenis_kelamin_jenazah') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat_jenazah" class="form-label">Alamat Jenazah <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="alamat_jenazah" id="alamat_jenazah"
                                            class="form-control" required value="{{ old('alamat_jenazah') }}">
                                    </div>

                                    <hr>

                                    <div class="mb-3">
                                        <label for="alasan" class="form-label">Alasan Tidak Bisa Melampirkan KTP
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="alasan" id="alasan" class="form-control"
                                            required value="{{ old('alasan') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nowa" class="form-label">No WhatsApp <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nowa" id="nowa" class="form-control"
                                            required value="{{ old('nowa') }}">
                                    </div>

                                    <!-- Hidden select untuk status surat dan verif -->
                                    <select name="status_surat" id="status_surat" class="form-select d-none"
                                        required>
                                        <option value="Pending" selected>Pending</option>
                                    </select>

                                    <select name="status_verif" id="status_verif" class="form-select d-none"
                                        required>
                                        <option value="Belum Verifikasi" selected>Belum Verifikasi</option>
                                    </select>

                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


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
