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
                    <form action="{{ route('surat.userahliwaris.store') }}" method="POST">
                        @csrf

                        {{-- YANG BERTANDA TANGAN --}}
                        <h5 class="mb-3">Yang Bertanda Tangan</h5>
                        <div class="mb-3">
                            <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required
                                value="{{ old('nama_lengkap') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required
                                value="{{ old('tempat_lahir') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required
                                value="{{ old('tanggal_lahir') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="agama">Agama</label>
                            <select id="agama" name="agama" class="form-control" required>
                                <option value="">-- Pilih Agama --</option>
                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $a)
                                    <option value="{{ $a }}" {{ old('agama') === $a ? 'selected' : '' }}>
                                        {{ $a }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pekerjaan">Pekerjaan</label>
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
                            <label class="form-label" for="no_ktp">No KTP</label>
                            <input type="text" id="no_ktp" name="no_ktp" class="form-control" required
                                value="{{ old('no_ktp') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                @foreach (['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $s)
                                    <option value="{{ $s }}" {{ old('status') === $s ? 'selected' : '' }}>
                                        {{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
                        </div>

                        <hr class="my-4">

                        {{-- KETERANGAN ISTRI --}}
                        <h5 class="mb-3">Keterangan Istri</h5>
                        <div class="mb-3">
                            <label class="form-label" for="nama_istri">Nama Lengkap</label>
                            <input type="text" id="nama_istri" name="nama_istri" class="form-control" required
                                value="{{ old('nama_istri') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tempat_lahir_istri">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir_istri" name="tempat_lahir_istri"
                                class="form-control" required value="{{ old('tempat_lahir_istri') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_lahir_istri">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir_istri" name="tanggal_lahir_istri"
                                class="form-control" required value="{{ old('tanggal_lahir_istri') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="agama_istri">Agama</label>
                            <select id="agama_istri" name="agama_istri" class="form-control" required>
                                <option value="">-- Pilih Agama --</option>
                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $ai)
                                    <option value="{{ $ai }}"
                                        {{ old('agama_istri') === $ai ? 'selected' : '' }}>
                                        {{ $ai }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pekerjaan_istri">Pekerjaan</label>
                            <select name="pekerjaan_istri" id="pekerjaan_istri" class="form-control" required>
                                <option value="">-- Pilih pekerjaan_istri --</option>
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
                                        {{ old('pekerjaan_istri') == $job ? 'selected' : '' }}>
                                        {{ $job }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status_istri">Status</label>
                            <select id="status_istri" name="status_istri" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                @foreach (['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $si)
                                    <option value="{{ $si }}"
                                        {{ old('status_istri') === $si ? 'selected' : '' }}>
                                        {{ $si }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="no_ktp_istri">No KTP</label>
                            <input type="text" id="no_ktp_istri" name="no_ktp_istri" class="form-control"
                                required value="{{ old('no_ktp_istri') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alamat_istri">Alamat</label>
                            <textarea id="alamat_istri" name="alamat_istri" class="form-control" rows="2" required>{{ old('alamat_istri') }}</textarea>
                        </div>

                        <hr class="my-4">

                        {{-- ANAK DINAMIS --}}
                        <h5 class="mb-2">Anak</h5>
                        <div class="row g-2 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label" for="jumlah_anak">Jumlah Anak</label>
                                <input type="number" min="0" id="jumlah_anak" name="jumlah_anak"
                                    class="form-control" required value="{{ old('jumlah_anak', 0) }}">
                            </div>
                        </div>
                        <div id="anak-wrapper" class="mt-3"></div>

                        <div class="mb-3 mt-3">
                            <label class="form-label" for="hubungan_dengan_ahli_waris">Hubungan dengan Ahli
                                Waris</label>
                            <input type="text" id="hubungan_dengan_ahli_waris" name="hubungan_dengan_ahli_waris"
                                class="form-control" required value="{{ old('hubungan_dengan_ahli_waris') }}">
                        </div>

                        <hr class="my-4">

                        {{-- SAKSI DINAMIS --}}
                        <h5 class="mb-2">Saksi</h5>
                        <div class="row g-2 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label" for="jumlah_saksi">Jumlah Saksi</label>
                                <input type="number" min="0" id="jumlah_saksi" name="jumlah_saksi"
                                    class="form-control" required value="{{ old('jumlah_saksi', 0) }}">
                            </div>
                        </div>
                        <div id="saksi-wrapper" class="mt-3"></div>

                        {{-- Hidden default status untuk USER --}}
                        <input type="hidden" name="status_surat" value="Pending">
                        <input type="hidden" name="status_verif" value="Belum Verifikasi">

                        <div class="mb-3 mt-3">
                            <label class="form-label" for="nowa">No WhatsApp</label>
                            <input type="text" id="nowa" name="nowa" class="form-control" required
                                value="{{ old('nowa') }}">
                        </div>

                        <div class="text-end mt-4">
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
