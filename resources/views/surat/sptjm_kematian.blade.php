@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Tambah SPTJM Kematian</h5>
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

                        <form action="{{ route('surat.sptjm.store') }}" method="POST" novalidate>
                            @csrf

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
                                    <div class="col-6">
                                        <input name="ttl_tempat"
                                            class="form-control @error('ttl_tempat') is-invalid @enderror"
                                            value="{{ old('ttl_tempat') }}" placeholder="Tempat" required>
                                        @error('ttl_tempat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input type="date" name="ttl_tanggal"
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
                            <h6 class="fw-bold mb-2">Data Jenazah</h6>
                            <div class="mb-3">
                                <label class="form-label">Nama Jenazah</label>
                                <input name="nama_jenazah" class="form-control @error('nama_jenazah') is-invalid @enderror"
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
                                    <div class="col-6">
                                        <input name="ttl_tempat_jenazah"
                                            class="form-control @error('ttl_tempat_jenazah') is-invalid @enderror"
                                            value="{{ old('ttl_tempat_jenazah') }}" placeholder="Tempat" required>
                                        @error('ttl_tempat_jenazah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input type="date" name="ttl_tanggal_jenazah"
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
                                    <option value="Laki-laki" {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Anak Ke (dinamis) --}}
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

                            <div class="mb-3">
                                <label class="form-label">Status Surat</label>
                                <select name="status_surat" class="form-control">
                                    @foreach (['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $st)
                                        <option value="{{ $st }}"
                                            {{ old('status_surat', 'Pending') === $st ? 'selected' : '' }}>
                                            {{ $st }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Verifikasi</label>
                                <select name="status_verif" class="form-control">
                                    @foreach (['Belum Verifikasi', 'Terverifikasi'] as $sv)
                                        <option value="{{ $sv }}"
                                            {{ old('status_verif', 'Belum Verifikasi') === $sv ? 'selected' : '' }}>
                                            {{ $sv }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- (Opsional) Tabel daftar SPTJM kematian --}}
                @if (isset($data) && $data->count())
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h6 class="mb-0">Data Tersimpan</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pelapor</th>
                                            <th>Nama Jenazah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $s)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $s->nama }}</td>
                                                <td>{{ $s->j_nama }}</td>
                                                <td>{{ $s->status_surat }} / {{ $s->status_verif }}</td>
                                                <td><a class="btn btn-sm btn-primary"
                                                        href="{{ route('surat.sptjm.edit', $s->_id ?? $s->id) }}">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
