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
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Internet Connection Status -->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container">
            <div class="header-content position-relative d-flex align-items-center justify-content-between">
                <div class="back-button">
                    <a href="{{ route('surat.pengajuan_surat') }}">
                        <i class="bi bi-arrow-left-short"></i>
                    </a>
                </div>
                <div class="page-heading">
                    <h6 class="mb-0">Form Surat Keterangan Tidak Mampu</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="element-heading">
                <h6>Buat Pengajuan Surat Keterangan Tidak Mampu</h6>
            </div>
        </div>

        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('surat.userkesanggupan.store') }}" method="POST">
                        @csrf

                        <h5 class="mb-3">Yang Bertandatangan</h5>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required
                                value="{{ old('nama') }}">
                        </div>
                        <div class="mb-3">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" required
                                value="{{ old('nik') }}">
                        </div>
                        <div class="mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required
                                value="{{ old('tempat_lahir') }}">
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required
                                value="{{ old('tanggal_lahir') }}">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Tujuan Kegiatan</label>
                            <input type="text" name="tujuan_kegiatan" class="form-control" required
                                value="{{ old('tujuan_kegiatan') }}">
                        </div>

                        <hr class="my-4">
                        <h5 class="mb-3">Pelaksanaan</h5>
                        <div class="mb-3">
                            <label>Hari</label>
                            <input type="text" name="hari" class="form-control" required
                                value="{{ old('hari') }}">
                        </div>
                        <div class="mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required
                                value="{{ old('tanggal') }}">
                        </div>
                        <div class="mb-3">
                            <label>Waktu</label>
                            <input type="text" name="waktu" class="form-control" required
                                value="{{ old('waktu') }}">
                        </div>
                        <div class="mb-3">
                            <label>Tempat</label>
                            <input type="text" name="tempat" class="form-control" required
                                value="{{ old('tempat') }}">
                        </div>

                        {{-- Hidden default --}}
                        <input type="hidden" name="status_surat" value="Pending">
                        <input type="hidden" name="status_verif" value="Belum Verifikasi">

                        <div class="mb-3">
                            <label>No WhatsApp</label>
                            <input type="text" name="nowa" class="form-control" required
                                value="{{ old('nowa') }}">
                        </div>

                        <div class="text-start">
                            <button type="submit" class="btn btn-primary px-4">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

    <!-- JavaScript Files -->
    <script src="{{ asset('assets4/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets4/dist/js/active.js') }}"></script>
</body>

</html>
