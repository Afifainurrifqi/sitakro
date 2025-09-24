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

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container">
            <div class="header-content position-relative d-flex align-items-center justify-content-between">
                <div class="back-button">
                    <a href={{ route('surat.pengajuan_surat') }}>
                        <i class="bi bi-arrow-left-short"></i>
                    </a>
                </div>
                <div class="page-heading">
                    <h6 class="mb-0">Form Keterangan Kehilangan</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="element-heading">
                <h6>Buat Pengajuan Surat</h6>
            </div>
        </div>

        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('surat.userkehilangan.store') }}" method="POST">
                        @csrf

                        <h5 class="mb-3">Data Pelapor</h5>

                        <div class="mb-3">
                            <label for="nama_pelapor" class="form-label">Nama pelapor</label>
                            <input type="text" name="nama_pelapor" id="nama_pelapor" class="form-control" required
                                autocomplete="name" value="{{ old('nama_pelapor') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tempat_lahir_pelapor" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_pelapor" id="tempat_lahir_pelapor"
                                class="form-control" required value="{{ old('tempat_lahir_pelapor') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir_pelapor" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_pelapor" id="tanggal_lahir_pelapor"
                                class="form-control" required value="{{ old('tanggal_lahir_pelapor') }}">
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin_pelapor" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin_pelapor" id="jenis_kelamin_pelapor" class="form-control"
                                required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin_pelapor') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin_pelapor') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nik_pelapor" class="form-label">NIK</label>
                            <input type="text" name="nik_pelapor" id="nik_pelapor" class="form-control" required
                                autocomplete="off" value="{{ old('nik_pelapor') }}">
                        </div>

                        <div class="mb-3">
                            <label for="agama_pelapor" class="form-label">Agama</label>
                            <select name="agama_pelapor" id="agama_pelapor" class="form-control" required>
                                <option value="">-- Pilih agama --</option>
                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama_pelapor)
                                    <option value="{{ $agama_pelapor }}"
                                        {{ old('agama_pelapor') == $agama_pelapor ? 'selected' : '' }}>
                                        {{ $agama_pelapor }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status_pelapor" class="form-label">Status Perkawinan</label>
                            <select name="status_pelapor" id="status_pelapor" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                @foreach (['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai'] as $status_pelapor)
                                    <option value="{{ $status_pelapor }}"
                                        {{ old('status_pelapor') == $status_pelapor ? 'selected' : '' }}>
                                        {{ $status_pelapor }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan_pelapor" class="form-label">Pekerjaan</label>
                            <select name="pekerjaan_pelapor" id="pekerjaan_pelapor" class="form-control" required>
                                <option value="">-- Pilih Pekerjaan --</option>
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
                                        'Guru agama_pelapor',
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
                                        {{ old('pekerjaan_pelapor') == $job ? 'selected' : '' }}>{{ $job }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="alamat_pelapor" class="form-label">Alamat</label>
                            <textarea name="alamat_pelapor" id="alamat_pelapor" class="form-control" rows="3" required>{{ old('alamat_pelapor') }}</textarea>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3">Data Kehilangan</h5>

                        <div class="mb-3">
                            <label for="jenis_kehilangan" class="form-label">Jenis Kehilangan</label>
                            <input type="text" name="jenis_kehilangan" id="jenis_kehilangan" class="form-control"
                                required value="{{ old('jenis_kehilangan') }}">
                        </div>

                        <div class="mb-3">
                            <label for="atas_nama" class="form-label">Atas Nama</label>
                            <input type="text" name="atas_nama" id="atas_nama" class="form-control" required
                                value="{{ old('atas_nama') }}">
                        </div>

                        <div class="mb-3">
                            <label for="berisi" class="form-label">Isi yang Hilang</label>
                            <input type="text" name="berisi" id="berisi" class="form-control" required
                                value="{{ old('berisi') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_kehilangan" class="form-label">Tanggal Kehilangan</label>
                            <input type="date" name="tanggal_kehilangan" id="tanggal_kehilangan"
                                class="form-control" required value="{{ old('tanggal_kehilangan') }}">
                        </div>

                        <div class="mb-3">
                            <label for="hilang_saat" class="form-label">Kehilangan Saat</label>
                            <input type="text" name="hilang_saat" id="hilang_saat" class="form-control" required
                                value="{{ old('hilang_saat') }}">
                        </div>

                        <hr class="my-4">

                        <div class="mb-3">
                            <label for="nowa" class="form-label">No WhatsApp <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="nowa" id="nowa" class="form-control" required
                                value="{{ old('nowa') }}">
                        </div>

                        <div class="mb-3 d-none">
                            <label for="status_surat" class="form-label">Status Surat</label>
                            <select name="status_surat" id="status_surat" class="form-control">
                                <option value="Pending" selected>Pending</option>
                            </select>
                        </div>

                        <div class="mb-3 d-none">
                            <label for="status_verif" class="form-label">Status Verifikasi</label>
                            <select name="status_verif" id="status_verif" class="form-control">
                                <option value="Belum Verifikasi" selected>Belum Verifikasi</option>
                            </select>
                        </div>


                        <div class="mt-4 text-end">
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
                        <a href={{ route('surat.pengajuan_surat') }}>
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
