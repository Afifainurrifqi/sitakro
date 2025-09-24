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
                    <form action="{{ route('surat.userkepemilikantanah.store') }}" method="POST">
                        @csrf

                        <h5 class="mb-3">Informasi Lokasi Tanah</h5>
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label>RT</label>
                                <input type="text" name="rt" class="form-control" required
                                    value="{{ old('rt') }}">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>RW</label>
                                <input type="text" name="rw" class="form-control" required
                                    value="{{ old('rw') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>No Persil</label>
                                <input type="text" name="no_persil" class="form-control" required
                                    value="{{ old('no_persil') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>No SPPT</label>
                                <input type="text" name="no_sppt" class="form-control" required
                                    value="{{ old('no_sppt') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>No Sertifikat</label>
                            <input type="text" name="no_sertifikat" class="form-control"
                                value="{{ old('no_sertifikat') }}">
                        </div>
                        <div class="mb-3">
                            <label>Luas</label>
                            <input type="text" name="luas" class="form-control" required
                                value="{{ old('luas') }}">
                        </div>
                        <div class="mb-3">
                            <label>Atas Nama Hak Milik</label>
                            <input type="text" name="atas_nama_hak_milik" class="form-control" required
                                value="{{ old('atas_nama_hak_milik') }}">
                        </div>

                        <hr class="my-4">
                        <h5 class="mb-3">Batas-Batas Tanah</h5>
                        <div class="mb-3">
                            <label>Batas Utara</label>
                            <input type="text" name="batas_utara" class="form-control" required
                                value="{{ old('batas_utara') }}">
                        </div>
                        <div class="mb-3">
                            <label>Batas Timur</label>
                            <input type="text" name="batas_timur" class="form-control" required
                                value="{{ old('batas_timur') }}">
                        </div>
                        <div class="mb-3">
                            <label>Batas Selatan</label>
                            <input type="text" name="batas_selatan" class="form-control" required
                                value="{{ old('batas_selatan') }}">
                        </div>
                        <div class="mb-3">
                            <label>Batas Barat</label>
                            <input type="text" name="batas_barat" class="form-control" required
                                value="{{ old('batas_barat') }}">
                        </div>

                        <hr class="my-4">
                        <h5 class="mb-3">Informasi Kepemilikan & Harga</h5>
                        <div class="mb-3">
                            <label>Nama Pemilik</label>
                            <input type="text" name="nama" class="form-control" required
                                value="{{ old('nama') }}">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
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
                        </div>
                        <div class="mb-3">
                            <label>Tanah Atas Nama</label>
                            <input type="text" name="tanah_atas_nama" class="form-control" required
                                value="{{ old('tanah_atas_nama') }}">
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Harga Tanah</label>
                                <input type="number" name="harga_tanah" class="form-control" required
                                    value="{{ old('harga_tanah') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Harga Bangunan</label>
                                <input type="number" name="harga_bangunan" class="form-control" required
                                    value="{{ old('harga_bangunan') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Total Harga</label>
                                <input type="number" name="harga_jumlah" class="form-control" required
                                    value="{{ old('harga_jumlah') }}">
                            </div>
                        </div>

                        <input type="hidden" name="status_surat" value="Pending">
                        <input type="hidden" name="status_verif" value="Belum Verifikasi">


                        <div class="mb-3">
                            <label>No WhatsApp</label>
                            <input type="text" name="nowa" class="form-control" required
                                value="{{ old('nowa') }}">
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

<script>
    (function() {
        const anakWrapper = document.getElementById('anak-wrapper');
        const saksiWrapper = document.getElementById('saksi-wrapper');
        const jumlahAnak = document.getElementById('jumlah_anak');
        const jumlahSaksi = document.getElementById('jumlah_saksi');

        const oldAnak = @json(old('nama_anak', []));
        const oldSaksi = @json(old('nama_saksi', []));

        function renderInputs(wrapper, count, name, placeholder, oldVals) {
            wrapper.innerHTML = '';
            const n = parseInt(count || 0, 10);
            for (let i = 0; i < n; i++) {
                const div = document.createElement('div');
                div.className = 'mb-2';
                div.innerHTML = `
                <label class="form-label">${placeholder} ${i+1}</label>
                <input type="text" name="${name}[]" class="form-control" value="${oldVals[i] ? String(oldVals[i]).replace(/"/g,'&quot;') : ''}">
            `;
                wrapper.appendChild(div);
            }
        }

        renderInputs(anakWrapper, jumlahAnak.value, 'nama_anak', 'Nama Anak', oldAnak);
        renderInputs(saksiWrapper, jumlahSaksi.value, 'nama_saksi', 'Nama Saksi', oldSaksi);

        jumlahAnak.addEventListener('input', () => renderInputs(anakWrapper, jumlahAnak.value, 'nama_anak',
            'Nama Anak', []));
        jumlahSaksi.addEventListener('input', () => renderInputs(saksiWrapper, jumlahSaksi.value, 'nama_saksi',
            'Nama Saksi', []));
    })();
</script>
