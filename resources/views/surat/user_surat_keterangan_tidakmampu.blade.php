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
                    <form action="{{ route('surat.usertidakmampu.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="peruntukan_sktm" class="form-label">
                                Peruntukan untuk SKTM <span class="text-danger">*</span>
                            </label>
                            <select name="peruntukan_sktm" id="peruntukan_sktm" class="form-control" required>
                                <option value="">-- Pilih Peruntukan --</option>
                                @foreach (['Biaya Pendidikan', 'Bantuan Sosial', 'Biaya Kesehatan'] as $peruntukan)
                                    <option value="{{ $peruntukan }}"
                                        {{ old('peruntukan_sktm') == $peruntukan ? 'selected' : '' }}>
                                        {{ $peruntukan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required
                                value="{{ old('nama_lengkap') }}">
                        </div>

                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                            <input type="text" name="nik" id="nik" class="form-control" required
                                value="{{ old('nik') }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    required value="{{ old('tempat_lahir') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    required value="{{ old('tanggal_lahir') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="kewarganegaraan" class="form-label">Kewarganegaraan <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control"
                                required value="{{ old('kewarganegaraan') }}">
                        </div>

                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                            <select name="agama" id="agama" class="form-control" required>
                                <option value="">-- Pilih Agama --</option>
                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                                    <option value="{{ $agama }}"
                                        {{ old('agama') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan <span
                                    class="text-danger">*</span></label>
                            <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                @foreach (['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai'] as $status)
                                    <option value="{{ $status }}"
                                        {{ old('status_perkawinan') == $status ? 'selected' : '' }}>
                                        {{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan <span
                                    class="text-danger">*</span></label>
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
                                        {{ old('pekerjaan') == $job ? 'selected' : '' }}>{{ $job }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="alamat_rumah" class="form-label">Alamat Rumah <span
                                    class="text-danger">*</span></label>
                            <textarea name="alamat_rumah" id="alamat_rumah" class="form-control" rows="3" required>{{ old('alamat_rumah') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan_fungsi_surat" class="form-label">Keterangan Fungsi Surat
                                (Kelengkapan) <span class="text-danger">*</span></label>
                            <textarea name="keterangan_fungsi_surat" id="keterangan_fungsi_surat" class="form-control" rows="3" required>{{ old('keterangan_fungsi_surat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apakah anda memiliki bantuan sosial?</label>
                            @php
                                $bantuanOptions = ['PKH', 'KIP', 'KIS', 'BPNT', 'ID. DTKS', 'BLT DD', 'BANSOS'];
                                $oldBantuan = old('bantuan', []);
                            @endphp
                            <div class="form-check">
                                @foreach ($bantuanOptions as $bantuan)
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="bantuan[]"
                                            id="bantuan_{{ $loop->index }}" value="{{ $bantuan }}"
                                            {{ in_array($bantuan, $oldBantuan) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="bantuan_{{ $loop->index }}">{{ $bantuan }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="nowa" class="form-label">No WhatsApp <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="nowa" id="nowa" class="form-control" required
                                value="{{ old('nowa') }}">
                        </div>

                        <div class="mb-3" style="display: none;">
                            <label for="status_surat" class="form-label">Status Surat</label>
                            <select name="status_surat" id="status_surat" class="form-control">
                                @foreach (['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $statusSurat)
                                    <option value="{{ $statusSurat }}"
                                        {{ $statusSurat == 'Pending' ? 'selected' : '' }}>
                                        {{ $statusSurat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3" style="display: none;">
                            <label for="status_verif" class="form-label">Status Verifikasi</label>
                            <select name="status_verif" id="status_verif" class="form-control">
                                @foreach (['Belum Verifikasi', 'Terverifikasi'] as $statusVerif)
                                    <option value="{{ $statusVerif }}"
                                        {{ $statusVerif == 'Belum Verifikasi' ? 'selected' : '' }}>
                                        {{ $statusVerif }}
                                    </option>
                                @endforeach
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
