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
                    <h6 class="mb-0">Form Surat Kuasa</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="element-heading">
                <h6>Buat Pengajuan Surat Kuasa</h6>
            </div>
        </div>

        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('surat.userskck.store') }}" method="POST">
                        @csrf

                        <h5 class="mb-3">Data Pemohon</h5>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required
                                value="{{ old('nama') }}">
                        </div>
                        <div class="mb-3">
                            <label>Nomor NIK</label>
                            <input type="text" name="nik" class="form-control" required
                                value="{{ old('nik') }}" maxlength="16" inputmode="numeric" placeholder="16 digit">
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
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach (['Laki-laki', 'Perempuan'] as $jk)
                                    <option value="{{ $jk }}"
                                        {{ old('jenis_kelamin') == $jk ? 'selected' : '' }}>
                                        {{ $jk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Kewarganegaraan</label>
                            <select name="kewarganegaraan" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach (['WNI', 'WNA'] as $kw)
                                    <option value="{{ $kw }}"
                                        {{ old('kewarganegaraan') == $kw ? 'selected' : '' }}>
                                        {{ $kw }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach (['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $st)
                                    <option value="{{ $st }}" {{ old('status') == $st ? 'selected' : '' }}>
                                        {{ $st }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Agama</label>
                            <select name="agama" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'] as $ag)
                                    <option value="{{ $ag }}" {{ old('agama') == $ag ? 'selected' : '' }}>
                                        {{ $ag }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Pendidikan</label>
                            <input type="text" name="pendidikan" class="form-control" required
                                value="{{ old('pendidikan') }}">
                        </div>
                        <div class="mb-3">
                            <label>Pekerjaan</label>
                            <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                                <option value="">-- Pilih pekerjaan --</option>
                                @php
                                    $jobs = [
                                        'BELUM/TIDAK BEKERJA',
                                        'PELAJAR/MAHASISWA',
                                        'TIDAK/BELUM SEKOLAH',
                                        'KARYAWAN SWASTA',
                                        'IBU RUMAH TANGGA',
                                        'WIRASWASTA',
                                        'TENTARA NASIONAL INDONESIA (nama_ibu_kandung)',
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
                                        {{ old('pekerjaan') == $job ? 'selected' : '' }}>
                                        {{ $job }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3">Informasi Surat</h5>
                        <div class="mb-3">
                            <label>Keperuntukan Surat</label>
                            <input type="text" name="keperuntukan" class="form-control" required
                                value="{{ old('keperuntukan') }}" placeholder="Misal: Pengajuan SKCK di Polres ...">
                        </div>

                        <input type="hidden" name="status_surat" value="Pending">
                        <input type="hidden" name="status_verif" value="Belum Verifikasi">

                        <div class="mb-3">
                            <label>No WhatsApp</label>
                            <input type="text" name="nowa" class="form-control" required
                                value="{{ old('nowa') }}" placeholder="+62812xxxx">
                        </div>

                        <div class="text-end">
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
