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
                <h6>Surat Pernyataan Memilih Nama Alias Satu Orang Tua</h6>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="card-body">

                <form action="{{ route('surat.usernamaliasortu.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama</label>
                        <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            required value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nik">NIK</label>
                        <input class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                            required value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                            required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nama_menyatakan">Nama Yang Menyatakan</label>
                        <input class="form-control @error('nama_menyatakan') is-invalid @enderror" id="nama_menyatakan"
                            name="nama_menyatakan" required value="{{ old('nama_menyatakan') }}">
                        @error('nama_menyatakan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="no_akta_kelahiran">No. Akta Kelahiran</label>
                        <input class="form-control @error('no_akta_kelahiran') is-invalid @enderror" id="no_akta_kelahiran"
                            name="no_akta_kelahiran" value="{{ old('no_akta_kelahiran') }}">
                        @error('no_akta_kelahiran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label" for="nama_ortu_ayah_tercatat">Nama Orang Tua Tercatat (Ayah)</label>
                        <input class="form-control @error('nama_ortu_ayah_tercatat') is-invalid @enderror"
                            id="nama_ortu_ayah_tercatat" name="nama_ortu_ayah_tercatat"
                            value="{{ old('nama_ortu_ayah_tercatat') }}">
                        @error('nama_ortu_ayah_tercatat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nama_alias_ayah">Nama Alias (Ayah)</label>
                        <input class="form-control @error('nama_alias_ayah') is-invalid @enderror" id="nama_alias_ayah"
                            name="nama_alias_ayah" value="{{ old('nama_alias_ayah') }}">
                        @error('nama_alias_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nama_ortu_ibu_tercatat">Nama Orang Tua Tercatat (Ibu)</label>
                        <input class="form-control @error('nama_ortu_ibu_tercatat') is-invalid @enderror"
                            id="nama_ortu_ibu_tercatat" name="nama_ortu_ibu_tercatat"
                            value="{{ old('nama_ortu_ibu_tercatat') }}">
                        @error('nama_ortu_ibu_tercatat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nama_alias_ibu">Nama Alias (Ibu)</label>
                        <input class="form-control @error('nama_alias_ibu') is-invalid @enderror" id="nama_alias_ibu"
                            name="nama_alias_ibu" value="{{ old('nama_alias_ibu') }}">
                        @error('nama_alias_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nama_alias_dihapus_1">Nama Alias yang Dihapus (1)</label>
                        <input class="form-control @error('nama_alias_dihapus_1') is-invalid @enderror"
                            id="nama_alias_dihapus_1" name="nama_alias_dihapus_1"
                            value="{{ old('nama_alias_dihapus_1') }}">
                        @error('nama_alias_dihapus_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nama_alias_dihapus_2">Nama Alias yang Dihapus (2)</label>
                        <input class="form-control @error('nama_alias_dihapus_2') is-invalid @enderror"
                            id="nama_alias_dihapus_2" name="nama_alias_dihapus_2"
                            value="{{ old('nama_alias_dihapus_2') }}">
                        @error('nama_alias_dihapus_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="berdasarkan">Berdasarkan</label>
                        <textarea class="form-control @error('berdasarkan') is-invalid @enderror" id="berdasarkan" name="berdasarkan"
                            rows="2">{{ old('berdasarkan') }}</textarea>
                        @error('berdasarkan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>

                    <input type="hidden" name="status_surat"
                        value="{{ old('status_surat', $surat->status_surat ?? 'Pending') }}">

                    {{-- Status Verifikasi (hidden, default Belum Verifikasi) --}}
                    <input type="hidden" name="status_verif"
                        value="{{ old('status_verif', $surat->status_verif ?? 'Belum Verifikasi') }}">

                    <div class="mb-3">
                        <label class="form-label" for="nowa">No WhatsApp</label>
                        <input class="form-control @error('nowa') is-invalid @enderror" id="nowa" name="nowa"
                            required value="{{ old('nowa') }}">
                        @error('nowa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary mt-2" type="submit">Kirim</button>
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
