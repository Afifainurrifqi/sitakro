@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-4">Form Surat Keterangan Harga Kepemilikan Tanah</h4>

                <form action="{{ route('surat.kepemilikantanah.store') }}" method="POST">
                    @csrf

                    <h5 class="mb-3">Informasi Lokasi Tanah</h5>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label>RT</label>
                            <input type="text" name="rt" class="form-control" required value="{{ old('rt') }}">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>RW</label>
                            <input type="text" name="rw" class="form-control" required value="{{ old('rw') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>No Persil</label>
                            <input type="text" name="no_persil" class="form-control" required
                                value="{{ old('no_persil') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>No SPPT</label>
                            <input type="text" name="no_sppt" class="form-control" required value="{{ old('no_sppt') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>No Sertifikat</label>
                        <input type="text" name="no_sertifikat" class="form-control" value="{{ old('no_sertifikat') }}">
                    </div>
                    <div class="mb-3">
                        <label>Luas</label>
                        <input type="text" name="luas" class="form-control" required value="{{ old('luas') }}">
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
                        <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
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
                                <option value="{{ $job }}" {{ old('pekerjaan') == $job ? 'selected' : '' }}>
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

                    <div class="mb-3">
                        <label for="status_surat" class="form-label">Status Surat</label>
                        <select name="status_surat" id="status_surat" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            @foreach (['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status_surat') == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status_verif" class="form-label">Status Verifikasi</label>
                        <select name="status_verif" id="status_verif" class="form-control" required>
                            <option value="">-- Pilih Verifikasi --</option>
                            @foreach (['Belum Verifikasi', 'Terverifikasi'] as $verif)
                                <option value="{{ $verif }}"
                                    {{ old('status_verif') == $verif ? 'selected' : '' }}>
                                    {{ $verif }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>No WhatsApp</label>
                        <input type="text" name="nowa" class="form-control" required value="{{ old('nowa') }}">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
