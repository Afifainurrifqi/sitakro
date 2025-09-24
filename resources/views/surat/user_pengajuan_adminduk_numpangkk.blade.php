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
                <h6>Buat Pengajuan Surat Pernyataan Numpang KK</h6>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('surat.usernumpangkk.store') }}" method="POST">
                        @csrf

                        <h5>Pemilik KK</h5>
                        <div class="mb-3">
                            <label for="nama_pemilik_kk" class="form-label">Nama</label>
                            <input type="text" name="nama_pemilik_kk" id="nama_pemilik_kk" class="form-control"
                                required value="{{ old('nama_pemilik_kk') }}">
                        </div>
                        <div class="mb-3">
                            <label for="nik_pemilik_kk" class="form-label">NIK</label>
                            <input type="text" name="nik_pemilik_kk" id="nik_pemilik_kk" class="form-control"
                                required value="{{ old('nik_pemilik_kk') }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_kk" class="form-label">No. KK</label>
                            <input type="text" name="no_kk" id="no_kk" class="form-control" required
                                value="{{ old('no_kk') }}">
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan_pemilik_kk" class="form-label">Pekerjaan</label>
                            <select name="pekerjaan_pemilik_kk" id="pekerjaan_pemilik_kk" class="form-control"
                                required>
                                <option value="">-- Pilih pekerjaan --</option>
                                @php
                                    $jobs = [
                                        'BELUM/TIDAK BEKERJA',
                                        'PELAJAR/MAHASISWA',
                                        'TIDAK/BELUM SEKOLAH',
                                        'KARYAWAN SWASTA',
                                        'IBU RUMAH TANGGA',
                                        'WIRASWASTA',
                                        'TENTARA NASIONAL INDONESIA (TNI)',
                                        'KEPOLISIAN RI (POLRI)',
                                        'DOSEN',
                                        'GURU',
                                        'Guru agama_penumpang_kk',
                                        'KEPALA DESA',
                                        'PERANGKAT DESA',
                                        'Pegawai Kantor Desa',
                                        'BIDAN',
                                        'DOKTER',
                                        'PERAWAT',
                                        'PETANI/PEKEBUN PEMILIK LAHAN',
                                        'BURUH TANI/PERKEBUNAN',
                                        'PEDAGANG',
                                        'PEGAWAI NEGERI SIPIL (PNS)',
                                        'BURUH HARIAN LEPAS',
                                        'SOPIR',
                                        'KARYAWAN BUMN',
                                        'PENSIUNAN',
                                        'PEMBANTU RUMAH TANGGA',
                                        'BURUH PETERNAKAN',
                                        'KONSTRUKSI',
                                        'PELAUT',
                                        'NELAYAN/PERIKANAN',
                                        'KARYAWAN HONORER',
                                        'PETERNAK',
                                        'MEKANIK',
                                        'PENATA RIAS',
                                        'TUKANG LAS/PANDAI BESI',
                                        'INDUSTRI',
                                        'USTADZ/MUBALIGH',
                                        'TABIB',
                                        'BURUH NELAYAN/PERIKANAN',
                                        'JURU MASAK',
                                        'SENIMAN',
                                        'AKUNTAN',
                                        'Petani/Pekebun penyewa',
                                        'TKI',
                                        'Lainnya',
                                    ];
                                @endphp
                                @foreach ($jobs as $job)
                                    <option value="{{ $job }}"
                                        {{ old('pekerjaan_pemilik_kk') == $job ? 'selected' : '' }}>
                                        {{ $job }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_pemilik_kk" class="form-label">Alamat</label>
                            <textarea name="alamat_pemilik_kk" id="alamat_pemilik_kk" class="form-control" rows="3" required>{{ old('alamat_pemilik_kk') }}</textarea>
                        </div>

                        <hr>

                        <h5>Penumpang KK</h5>
                        <div class="mb-3">
                            <label for="nama_penumpang_kk" class="form-label">Nama</label>
                            <input type="text" name="nama_penumpang_kk" id="nama_penumpang_kk"
                                class="form-control" required value="{{ old('nama_penumpang_kk') }}">
                        </div>
                        <div class="mb-3">
                            <label for="nik_penumpang_kk" class="form-label">NIK</label>
                            <input type="text" name="nik_penumpang_kk" id="nik_penumpang_kk" class="form-control"
                                required value="{{ old('nik_penumpang_kk') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir_penumpang_kk" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_penumpang_kk" id="tempat_lahir_penumpang_kk"
                                class="form-control" required value="{{ old('tempat_lahir_penumpang_kk') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir_penumpang_kk" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_penumpang_kk" id="tanggal_lahir_penumpang_kk"
                                class="form-control" required value="{{ old('tanggal_lahir_penumpang_kk') }}">
                        </div>

                        <div class="mb-3">
                            <label for="agama_penumpang_kk" class="form-label">Agama</label>
                            <select name="agama_penumpang_kk" id="agama_penumpang_kk" class="form-control" required>
                                <option value="">-- Pilih Agama --</option>
                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama_penumpang_kk)
                                    <option value="{{ $agama_penumpang_kk }}"
                                        {{ old('agama_penumpang_kk') == $agama_penumpang_kk ? 'selected' : '' }}>
                                        {{ $agama_penumpang_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan_penumpang_kk" class="form-label">Pekerjaan</label>
                            <select name="pekerjaan_penumpang_kk" id="pekerjaan_penumpang_kk" class="form-control"
                                required>
                                <option value="">-- Pilih pekerjaan --</option>
                                @php
                                    $jobs = [
                                        'BELUM/TIDAK BEKERJA',
                                        'PELAJAR/MAHASISWA',
                                        'TIDAK/BELUM SEKOLAH',
                                        'KARYAWAN SWASTA',
                                        'IBU RUMAH TANGGA',
                                        'WIRASWASTA',
                                        'TENTARA NASIONAL INDONESIA (TNI)',
                                        'KEPOLISIAN RI (POLRI)',
                                        'DOSEN',
                                        'GURU',
                                        'Guru agama_penumpang_kk',
                                        'KEPALA DESA',
                                        'PERANGKAT DESA',
                                        'Pegawai Kantor Desa',
                                        'BIDAN',
                                        'DOKTER',
                                        'PERAWAT',
                                        'PETANI/PEKEBUN PEMILIK LAHAN',
                                        'BURUH TANI/PERKEBUNAN',
                                        'PEDAGANG',
                                        'PEGAWAI NEGERI SIPIL (PNS)',
                                        'BURUH HARIAN LEPAS',
                                        'SOPIR',
                                        'KARYAWAN BUMN',
                                        'PENSIUNAN',
                                        'PEMBANTU RUMAH TANGGA',
                                        'BURUH PETERNAKAN',
                                        'KONSTRUKSI',
                                        'PELAUT',
                                        'NELAYAN/PERIKANAN',
                                        'KARYAWAN HONORER',
                                        'PETERNAK',
                                        'MEKANIK',
                                        'PENATA RIAS',
                                        'TUKANG LAS/PANDAI BESI',
                                        'INDUSTRI',
                                        'USTADZ/MUBALIGH',
                                        'TABIB',
                                        'BURUH NELAYAN/PERIKANAN',
                                        'JURU MASAK',
                                        'SENIMAN',
                                        'AKUNTAN',
                                        'Petani/Pekebun penyewa',
                                        'TKI',
                                        'Lainnya',
                                    ];
                                @endphp
                                @foreach ($jobs as $job)
                                    <option value="{{ $job }}"
                                        {{ old('pekerjaan_penumpang_kk') == $job ? 'selected' : '' }}>
                                        {{ $job }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label for="nowa" class="form-label">No WhatsApp</label>
                            <input type="text" name="nowa" id="nowa" class="form-control" required
                                value="{{ old('nowa') }}">
                        </div>

                        <select name="status_surat" id="status_surat" style="display:none;">
                            <option value="Pending" selected>Pending</option>
                            <option value="Di cek">Di cek</option>
                            <option value="Di terima">Di terima</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>

                        <select name="status_verif" id="status_verif" style="display:none;">
                            <option value="Belum Verifikasi" selected>Belum Verifikasi</option>
                            <option value="Terverifikasi">Terverifikasi</option>
                        </select>


                        <button type="submit" class="btn btn-primary mt-3">Kirim</button>
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
