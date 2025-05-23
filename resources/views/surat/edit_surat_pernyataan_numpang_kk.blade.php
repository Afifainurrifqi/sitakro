@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Surat Pernyataan Numpang KK</h4>

            <form action="{{ isset($suratPernyataanNumpangKk) ? route('surat.numpangkk.update', $suratPernyataanNumpangKk->_id) : route('surat.numpangkk.store') }}" method="POST">
                @csrf
                @if(isset($suratPernyataanNumpangKk))
                    @method('PUT')
                @endif

                <h5>Pemilik KK</h5>
                <div class="mb-3">
                    <label for="nama_pemilik_kk" class="form-label">Nama</label>
                    <input type="text" name="nama_pemilik_kk" id="nama_pemilik_kk" class="form-control" required
                        value="{{ old('nama_pemilik_kk', $suratPernyataanNumpangKk->nama_pemilik_kk ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="nik_pemilik_kk" class="form-label">NIK</label>
                    <input type="text" name="nik_pemilik_kk" id="nik_pemilik_kk" class="form-control" required
                        value="{{ old('nik_pemilik_kk', $suratPernyataanNumpangKk->nik_pemilik_kk ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="no_kk" class="form-label">No. KK</label>
                    <input type="text" name="no_kk" id="no_kk" class="form-control" required
                        value="{{ old('no_kk', $suratPernyataanNumpangKk->no_kk ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_pemilik_kk" class="form-label">Pekerjaan</label>
                    <select name="pekerjaan_pemilik_kk" id="pekerjaan_pemilik_kk" class="form-control" required>
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
                                {{ old('pekerjaan_pemilik_kk', $suratPernyataanNumpangKk->pekerjaan_pemilik_kk ?? '') == $job ? 'selected' : '' }}>
                                {{ $job }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat_pemilik_kk" class="form-label">Alamat</label>
                    <textarea name="alamat_pemilik_kk" id="alamat_pemilik_kk" class="form-control" rows="3" required>{{ old('alamat_pemilik_kk', $suratPernyataanNumpangKk->alamat_pemilik_kk ?? '') }}</textarea>
                </div>

                <hr>

                <h5>Penumpang KK</h5>
                <div class="mb-3">
                    <label for="nama_penumpang_kk" class="form-label">Nama</label>
                    <input type="text" name="nama_penumpang_kk" id="nama_penumpang_kk" class="form-control" required
                        value="{{ old('nama_penumpang_kk', $suratPernyataanNumpangKk->nama_penumpang_kk ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="nik_penumpang_kk" class="form-label">NIK</label>
                    <input type="text" name="nik_penumpang_kk" id="nik_penumpang_kk" class="form-control" required
                        value="{{ old('nik_penumpang_kk', $suratPernyataanNumpangKk->nik_penumpang_kk ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir_penumpang_kk" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_penumpang_kk" id="tempat_lahir_penumpang_kk"
                        class="form-control" required value="{{ old('tempat_lahir_penumpang_kk', $suratPernyataanNumpangKk->tempat_lahir_penumpang_kk ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir_penumpang_kk" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_penumpang_kk" id="tanggal_lahir_penumpang_kk"
                        class="form-control" required value="{{ old('tanggal_lahir_penumpang_kk', $suratPernyataanNumpangKk->tanggal_lahir_penumpang_kk ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="agama_penumpang_kk" class="form-label">Agama</label>
                    <select name="agama_penumpang_kk" id="agama_penumpang_kk" class="form-control" required>
                        <option value="">-- Pilih Agama --</option>
                        @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                            <option value="{{ $agama }}"
                                {{ old('agama_penumpang_kk', $suratPernyataanNumpangKk->agama_penumpang_kk ?? '') == $agama ? 'selected' : '' }}>
                                {{ $agama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_penumpang_kk" class="form-label">Pekerjaan</label>
                    <select name="pekerjaan_penumpang_kk" id="pekerjaan_penumpang_kk" class="form-control" required>
                        <option value="">-- Pilih pekerjaan --</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job }}"
                                {{ old('pekerjaan_penumpang_kk', $suratPernyataanNumpangKk->pekerjaan_penumpang_kk ?? '') == $job ? 'selected' : '' }}>
                                {{ $job }}</option>
                        @endforeach
                    </select>
                </div>

                <hr>

                <div class="mb-3">
                    <label for="nowa" class="form-label">No WhatsApp</label>
                    <input type="text" name="nowa" id="nowa" class="form-control" required
                        value="{{ old('nowa', $suratPernyataanNumpangKk->nowa ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat</label>
                    <select name="status_surat" id="status_surat" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach(['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $status)
                            <option value="{{ $status }}"
                                {{ old('status_surat', $suratPernyataanNumpangKk->status_surat ?? '') == $status ? 'selected' : '' }}>
                                {{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi</label>
                    <select name="status_verif" id="status_verif" class="form-control" required>
                        <option value="">-- Pilih Verifikasi --</option>
                        @foreach(['Belum Verifikasi', 'Terverifikasi'] as $verif)
                            <option value="{{ $verif }}"
                                {{ old('status_verif', $suratPernyataanNumpangKk->status_verif ?? '') == $verif ? 'selected' : '' }}>
                                {{ $verif }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    {{ isset($suratPernyataanNumpangKk) ? 'Update' : 'Kirim' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
