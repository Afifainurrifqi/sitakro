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
            <h4 class="mb-4">Edit Surat Pernyataan Tidak Bisa Melampirkan KTP Kematian</h4>

            <form action="{{ route('suratpernyataantidakbisamelampirkanktpkematian.update', $surat->_id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Pelapor -->
                <div class="mb-3">
                    <label for="nama_pelapor" class="form-label">Nama Pelapor <span class="text-danger">*</span></label>
                    <input type="text" name="nama_pelapor" id="nama_pelapor"
                           class="form-control"
                           value="{{ old('nama_pelapor', $surat->nama_pelapor) }}" required>
                </div>

                <!-- NIK Pelapor -->
                <div class="mb-3">
                    <label for="nik_pelapor" class="form-label">NIK Pelapor <span class="text-danger">*</span></label>
                    <input type="text" name="nik_pelapor" id="nik_pelapor"
                           class="form-control"
                           value="{{ old('nik_pelapor', $surat->nik_pelapor) }}" required>
                </div>

                <!-- Tempat Lahir Pelapor -->
                <div class="mb-3">
                    <label for="tempat_lahir_pelapor" class="form-label">Tempat Lahir Pelapor</label>
                    <input type="text" name="tempat_lahir_pelapor" id="tempat_lahir_pelapor"
                           class="form-control"
                           value="{{ old('tempat_lahir_pelapor', $surat->tempat_lahir_pelapor) }}">
                </div>

                <!-- Tanggal Lahir Pelapor -->
                <div class="mb-3">
                    <label for="tanggal_lahir_pelapor" class="form-label">Tanggal Lahir Pelapor</label>
                    <input type="date" name="tanggal_lahir_pelapor" id="tanggal_lahir_pelapor"
                           class="form-control"
                           value="{{ old('tanggal_lahir_pelapor', $surat->tanggal_lahir_pelapor) }}">
                </div>

                <!-- Agama Pelapor -->
                <div class="mb-3">
                    <label for="agama_pelapor" class="form-label">Agama Pelapor</label>
                    <select name="agama_pelapor" id="agama_pelapor" class="form-control" required>
                        @foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu'] as $agama)
                            <option value="{{ $agama }}"
                              {{ old('agama_pelapor', $surat->agama_pelapor) == $agama ? 'selected' : '' }}>
                              {{ $agama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Jenis Kelamin Pelapor -->
                <div class="mb-3">
                    <label for="jenis_kelamin_pelapor" class="form-label">Jenis Kelamin Pelapor</label>
                    <select name="jenis_kelamin_pelapor" id="jenis_kelamin_pelapor" class="form-control" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin_pelapor',$surat->jenis_kelamin_pelapor) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin_pelapor',$surat->jenis_kelamin_pelapor) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Pekerjaan Pelapor -->
                <div class="mb-3">
    <label for="pekerjaan_pelapor" class="form-label">Pekerjaan Pelapor <span class="text-danger">*</span></label>
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
                'GURU AGAMA',
                'KEPALA DESA',
                'PERANGKAT DESA',
                'PEGAWAI KANTOR DESA',
                'BIDAN',
                'DOKTER',
                'PERAWAT',
                'PETANI/PEKEBUN PEMILIK LAHAN',
                'BURUH TANI/PEKEBUNAN',
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
                'PETANI/PEKEBUN PENYEWA',
                'TKI',
                'LAINNYA',
            ];
        @endphp

        @foreach ($jobs as $job)
            <option value="{{ $job }}"
                {{ old('pekerjaan_pelapor', $surat->pekerjaan_pelapor) == $job ? 'selected' : '' }}>
                {{ $job }}
            </option>
        @endforeach
    </select>
</div>

                <!-- Alamat Pelapor -->
                <div class="mb-3">
                    <label for="alamat_pelapor" class="form-label">Alamat Pelapor</label>
                    <input type="text" name="alamat_pelapor" id="alamat_pelapor"
                           class="form-control"
                           value="{{ old('alamat_pelapor', $surat->alamat_pelapor) }}">
                </div>

                <!-- Alasan Tidak Bisa Melampirkan KTP -->
                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan Tidak Bisa Melampirkan KTP</label>
                    <input type="text" name="alasan" id="alasan"
                           class="form-control"
                           value="{{ old('alasan', $surat->alasan) }}">
                </div>

                <!-- Data Jenazah -->
                <div class="mb-3">
                    <label for="nik_jenazah" class="form-label">NIK Jenazah</label>
                    <input type="text" name="nik_jenazah" id="nik_jenazah"
                           class="form-control"
                           value="{{ old('nik_jenazah', $surat->nik_jenazah) }}">
                </div>

                <div class="mb-3">
                    <label for="nama_jenazah" class="form-label">Nama Jenazah</label>
                    <input type="text" name="nama_jenazah" id="nama_jenazah"
                           class="form-control"
                           value="{{ old('nama_jenazah', $surat->nama_jenazah) }}">
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir_jenazah" class="form-label">Tanggal Lahir Jenazah</label>
                    <input type="date" name="tanggal_lahir_jenazah" id="tanggal_lahir_jenazah"
                           class="form-control"
                           value="{{ old('tanggal_lahir_jenazah', $surat->tanggal_lahir_jenazah) }}">
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin_jenazah" class="form-label">Jenis Kelamin Jenazah</label>
                    <select name="jenis_kelamin_jenazah" id="jenis_kelamin_jenazah" class="form-control">
                        <option value="Laki-laki" {{ old('jenis_kelamin_jenazah',$surat->jenis_kelamin_jenazah) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin_jenazah',$surat->jenis_kelamin_jenazah) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat_jenazah" class="form-label">Alamat Jenazah</label>
                    <input type="text" name="alamat_jenazah" id="alamat_jenazah"
                           class="form-control"
                           value="{{ old('alamat_jenazah', $surat->alamat_jenazah) }}">
                </div>

                <!-- No WhatsApp -->
                <div class="mb-3">
                    <label for="nowa" class="form-label">No WhatsApp</label>
                    <input type="text" name="nowa" id="nowa"
                           class="form-control"
                           value="{{ old('nowa', $surat->nowa) }}">
                </div>

                <!-- Status Surat -->
                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat</label>
                    <select name="status_surat" id="status_surat" class="form-control">
                        @foreach (['Pending','Di cek','Di terima','Ditolak'] as $status)
                            <option value="{{ $status }}"
                              {{ old('status_surat', $surat->status_surat) == $status ? 'selected' : '' }}>
                              {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Verifikasi -->
                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi</label>
                    <select name="status_verif" id="status_verif" class="form-control">
                        @foreach (['Belum Verifikasi','Terverifikasi'] as $status)
                            <option value="{{ $status }}"
                              {{ old('status_verif', $surat->status_verif) == $status ? 'selected' : '' }}>
                              {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('surat/suratmasuk') }}" class="btn btn-danger">Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
