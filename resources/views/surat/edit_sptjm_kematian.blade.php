@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit SPTJM Kematian</h5>
                        <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Periksa kembali input:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('surat.sptjm.update', $surat->_id ?? $surat->id) }}" method="POST"
                            novalidate>
                            @csrf @method('PUT')

                            {{-- Pelapor --}}
                            <h6 class="fw-bold mb-2">Data Pelapor</h6>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $surat->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input name="nik" class="form-control @error('nik') is-invalid @enderror"
                                    value="{{ old('nik', $surat->nik) }}" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat/Tgl. Lahir</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input name="ttl_tempat"
                                            class="form-control @error('ttl_tempat') is-invalid @enderror"
                                            value="{{ old('ttl_tempat', $surat->ttl_tempat) }}" required>
                                        @error('ttl_tempat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input type="date" name="ttl_tanggal"
                                            class="form-control @error('ttl_tanggal') is-invalid @enderror"
                                            value="{{ old('ttl_tanggal', optional($surat->ttl_tanggal)->format('Y-m-d')) }}"
                                            required>
                                        @error('ttl_tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <select name="pekerjaan" id="pekerjaan"
                                    class="form-control @error('pekerjaan') is-invalid @enderror" required>
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
                                        $selectedJob = old('pekerjaan', $surat->pekerjaan ?? '');
                                    @endphp

                                    {{-- Optional: jika nilai di DB tidak ada di list, tampilkan sebagai option di atas agar tetap terlihat --}}
                                    @if ($selectedJob && !in_array($selectedJob, $jobs, true))
                                        <option value="{{ $selectedJob }}" selected>{{ $selectedJob }} (tersimpan)
                                        </option>
                                        <option disabled>──────────</option>
                                    @endif

                                    @foreach ($jobs as $job)
                                        <option value="{{ $job }}" @selected($selectedJob === $job)>
                                            {{ $job }}</option>
                                    @endforeach
                                </select>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $surat->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>
                            {{-- Jenazah --}}
                            <h6 class="fw-bold mb-2">Data Jenazah</h6>
                            <div class="mb-3">
                                <label class="form-label">Nama Jenazah</label>
                                <input name="nama_jenazah" class="form-control @error('nama_jenazah') is-invalid @enderror"
                                    value="{{ old('nama_jenazah', $surat->nama_jenazah) }}" required>
                                @error('nama_jenazah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input name="nik_jenazah" class="form-control @error('nik_jenazah') is-invalid @enderror"
                                    value="{{ old('nik_jenazah', $surat->nik_jenazah) }}" required>
                                @error('nik_jenazah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat/Tgl. Lahir</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input name="ttl_tempat_jenazah"
                                            class="form-control @error('ttl_tempat_jenazah') is-invalid @enderror"
                                            value="{{ old('ttl_tempat_jenazah', $surat->ttl_tempat_jenazah) }}" required>
                                        @error('ttl_tempat_jenazah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input type="date" name="ttl_tanggal_jenazah"
                                            class="form-control @error('ttl_tanggal_jenazah') is-invalid @enderror"
                                            value="{{ old('ttl_tanggal_jenazah', optional($surat->ttl_tanggal_jenazah)->format('Y-m-d')) }}"
                                            required>
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
                                    @foreach (['Laki-laki', 'Perempuan'] as $jk)
                                        <option value="{{ $jk }}"
                                            {{ old('jenis_kelamin', $surat->jenis_kelamin) === $jk ? 'selected' : '' }}>
                                            {{ $jk }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Anak Ke (dinamis) --}}
                            <div class="col-md-3">
                                <label class="form-label">Anak Ke</label>
                                <input type="number" name="anak_ke" class="form-control"
                                    value="{{ old('anak_ke', $surat->anak_ke) }}" min="1" required>
                                <small class="text-muted">Isi angka urutan (contoh: 1, 2, 3)</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Ayah Kandung</label>
                                <input name="nama_ayah_kandung"
                                    class="form-control @error('nama_ayah_kandung') is-invalid @enderror"
                                    value="{{ old('nama_ayah_kandung', $surat->nama_ayah_kandung) }}" required>
                                @error('nama_ayah_kandung')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Ibu Kandung</label>
                                <input name="nama_ibu_kandung"
                                    class="form-control @error('nama_ibu_kandung') is-invalid @enderror"
                                    value="{{ old('nama_ibu_kandung', $surat->nama_ibu_kandung) }}" required>
                                @error('nama_ibu_kandung')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>
                            <div class="mb-3">
                                <label class="form-label">No WhatsApp</label>
                                <input name="nowa" class="form-control @error('nowa') is-invalid @enderror"
                                    value="{{ old('nowa', $surat->nowa) }}" required>
                                @error('nowa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Surat</label>
                                <select name="status_surat" class="form-control">
                                    @foreach (['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $st)
                                        <option value="{{ $st }}"
                                            {{ old('status_surat', $surat->status_surat ?? 'Pending') === $st ? 'selected' : '' }}>
                                            {{ $st }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Verifikasi</label>
                                <select name="status_verif" class="form-control">
                                    @foreach (['Belum Verifikasi', 'Terverifikasi'] as $sv)
                                        <option value="{{ $sv }}"
                                            {{ old('status_verif', $surat->status_verif ?? 'Belum Verifikasi') === $sv ? 'selected' : '' }}>
                                            {{ $sv }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
