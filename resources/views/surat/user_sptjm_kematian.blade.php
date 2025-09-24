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

                    <form action="{{ route('surat.usersptjm.store') }}" method="POST" novalidate>
                        @csrf

                        {{-- Pelapor --}}
                        <h6 class="fw-bold mb-2">Data Pelapor</h6>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input name="nik" class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik') }}" required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat/Tgl. Lahir</label>
                            <div class="row g-2">
                                <div class="col-6"><input name="ttl_tempat"
                                        class="form-control @error('ttl_tempat') is-invalid @enderror"
                                        value="{{ old('ttl_tempat') }}" placeholder="Tempat" required>
                                    @error('ttl_tempat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6"><input type="date" name="ttl_tanggal"
                                        class="form-control @error('ttl_tanggal') is-invalid @enderror"
                                        value="{{ old('ttl_tanggal') }}" required>
                                    @error('ttl_tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
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
                            @error('pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        {{-- Jenazah --}}
                        <h6 class="fw-bold mb-2">Data Jenazah</h6>
                        <div class="mb-3">
                            <label class="form-label">Nama Jenazah</label>
                            <input name="nama_jenazah"
                                class="form-control @error('nama_jenazah') is-invalid @enderror"
                                value="{{ old('nama_jenazah') }}" required>
                            @error('nama_jenazah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input name="nik_jenazah" class="form-control @error('nik_jenazah') is-invalid @enderror"
                                value="{{ old('nik_jenazah') }}" required>
                            @error('nik_jenazah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat/Tgl. Lahir</label>
                            <div class="row g-2">
                                <div class="col-6"><input name="ttl_tempat_jenazah"
                                        class="form-control @error('ttl_tempat_jenazah') is-invalid @enderror"
                                        value="{{ old('ttl_tempat_jenazah') }}" placeholder="Tempat" required>
                                    @error('ttl_tempat_jenazah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6"><input type="date" name="ttl_tanggal_jenazah"
                                        class="form-control @error('ttl_tanggal_jenazah') is-invalid @enderror"
                                        value="{{ old('ttl_tanggal_jenazah') }}" required>
                                    @error('ttl_tanggal_jenazah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                         <div class="col-md-3">
                                <label class="form-label">Anak Ke</label>
                                <input type="number" name="anak_ke" class="form-control" value="{{ old('anak_ke') }}"
                                    min="1" required>
                                <small class="text-muted">Isi angka urutan (contoh: 1, 2, 3)</small>
                            </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ayah Kandung</label>
                            <input name="nama_ayah_kandung"
                                class="form-control @error('nama_ayah_kandung') is-invalid @enderror"
                                value="{{ old('nama_ayah_kandung') }}" required>
                            @error('nama_ayah_kandung')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu Kandung</label>
                            <input name="nama_ibu_kandung"
                                class="form-control @error('nama_ibu_kandung') is-invalid @enderror"
                                value="{{ old('nama_ibu_kandung') }}" required>
                            @error('nama_ibu_kandung')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <div class="mb-3">
                            <label class="form-label">No WhatsApp</label>
                            <input name="nowa" class="form-control @error('nowa') is-invalid @enderror"
                                value="{{ old('nowa') }}" required>
                            @error('nowa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary">Kirim</button>
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
