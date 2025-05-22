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
            <h4 class="mb-4">Edit Surat Kehilangan</h4>

            <form action="{{ route('suratkehilangan.update', $surat_keterangan_kehilangan->_id) }}" method="POST">
                @csrf
                @method('PUT')

                <h5 class="mb-3">Data Pelapor</h5>
                <div class="mb-3">
                    <label for="nama_pelapor" class="form-label">Nama pelapor</label>
                    <input type="text" name="nama_pelapor" id="nama_pelapor" class="form-control" required
                        value="{{ old('nama_pelapor', $surat_keterangan_kehilangan->nama_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir_pelapor" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_pelapor" id="tempat_lahir_pelapor" class="form-control" required
                        value="{{ old('tempat_lahir_pelapor', $surat_keterangan_kehilangan->tempat_lahir_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir_pelapor" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_pelapor" id="tanggal_lahir_pelapor" class="form-control" required
                        value="{{ old('tanggal_lahir_pelapor', $surat_keterangan_kehilangan->tanggal_lahir_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin_pelapor" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin_pelapor" id="jenis_kelamin_pelapor" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin_pelapor', $surat_keterangan_kehilangan->jenis_kelamin_pelapor) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin_pelapor', $surat_keterangan_kehilangan->jenis_kelamin_pelapor) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nik_pelapor" class="form-label">NIK Pelapor</label>
                    <input type="text" name="nik_pelapor" id="nik_pelapor" class="form-control" required
                        value="{{ old('nik_pelapor', $surat_keterangan_kehilangan->nik_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="agama_pelapor" class="form-label">Agama Pelapor</label>
                    <select name="agama_pelapor" id="agama_pelapor" class="form-control" required>
                        <option value="">-- Pilih agama --</option>
                        @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                            <option value="{{ $agama }}" {{ old('agama_pelapor', $surat_keterangan_kehilangan->agama_pelapor) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_pelapor" class="form-label">Status Perkawinan</label>
                    <select name="status_pelapor" id="status_pelapor" class="form-control" required>
                        <option value="">-- Pilih status --</option>
                        @foreach(['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai'] as $status)
                            <option value="{{ $status }}" {{ old('status_pelapor', $surat_keterangan_kehilangan->status_pelapor) == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_pelapor" class="form-label">Pekerjaan Pelapor</label>
                    <select name="pekerjaan_pelapor" id="pekerjaan_pelapor" class="form-control" required>
                        <option value="">-- Pilih pekerjaan --</option>
                        @php
                            $jobs = [
                                "BELUM/TIDAK BEKERJA", "PELAJAR/MAHASISWA", "TIDAK/BELUM SEKOLAH", "KARYAWAN SWASTA",
                                "IBU RUMAH TANGGA", "WIRASWASTA", "TENTARA NASIONAL INDONESIA (TNI)", "KEPOLISIAN RI (POLRI)",
                                "DOSEN", "GURU", "Guru agama_pelapor", "KEPALA DESA", "PERANGKAT DESA", "Pegawai Kantor Desa", "BIDAN",
                                "DOKTER", "PERAWAT", "PETANI/PEKEBUN PEMILIK LAHAN", "BURUH TANI/PERKEBUNAN", "PEDAGANG",
                                "PEGAWAI NEGERI SIPIL (PNS)", "BURUH HARIAN LEPAS", "SOPIR", "KARYAWAN BUMN", "PENSIUNAN",
                                "PEMBANTU RUMAH TANGGA", "BURUH PETERNAKAN", "KONSTRUKSI", "PELAUT", "NELAYAN/PERIKANAN",
                                "KARYAWAN HONORER", "PETERNAK", "MEKANIK", "PENATA RIAS", "TUKANG LAS/PANDAI BESI", "INDUSTRI",
                                "USTADZ/MUBALIGH", "TABIB", "BURUH NELAYAN/PERIKANAN", "JURU MASAK", "SENIMAN", "AKUNTAN",
                                "Petani/Pekebun penyewa", "TKI", "Lainnya"
                            ];
                        @endphp
                        @foreach ($jobs as $job)
                            <option value="{{ $job }}" {{ old('pekerjaan_pelapor', $surat_keterangan_kehilangan->pekerjaan_pelapor) == $job ? 'selected' : '' }}>{{ $job }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat_pelapor" class="form-label">Alamat Pelapor</label>
                    <textarea name="alamat_pelapor" id="alamat_pelapor" class="form-control" rows="3" required>{{ old('alamat_pelapor', $surat_keterangan_kehilangan->alamat_pelapor) }}</textarea>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Data Kehilangan</h5>
                <div class="mb-3">
                    <label for="jenis_kehilangan" class="form-label">Jenis Kehilangan</label>
                    <input type="text" name="jenis_kehilangan" id="jenis_kehilangan" class="form-control" required
                        value="{{ old('jenis_kehilangan', $surat_keterangan_kehilangan->jenis_kehilangan) }}">
                </div>
                <div class="mb-3">
                    <label for="atas_nama" class="form-label">Atas Nama</label>
                    <input type="text" name="atas_nama" id="atas_nama" class="form-control" required
                        value="{{ old('atas_nama', $surat_keterangan_kehilangan->atas_nama) }}">
                </div>
                <div class="mb-3">
                    <label for="berisi" class="form-label">Isi dari yang Hilang</label>
                    <input type="text" name="berisi" id="berisi" class="form-control" required
                        value="{{ old('berisi', $surat_keterangan_kehilangan->berisi) }}">
                </div>
                <div class="mb-3">
                    <label for="tanggal_kehilangan" class="form-label">Tanggal Kehilangan</label>
                    <input type="date" name="tanggal_kehilangan" id="tanggal_kehilangan" class="form-control" required
                        value="{{ old('tanggal_kehilangan', $surat_keterangan_kehilangan->tanggal_kehilangan) }}">
                </div>
                <div class="mb-3">
                    <label for="hilang_saat" class="form-label">Kehilangan Saat / Di Lokasi</label>
                    <input type="text" name="hilang_saat" id="hilang_saat" class="form-control" required
                        value="{{ old('hilang_saat', $surat_keterangan_kehilangan->hilang_saat) }}">
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label for="nowa" class="form-label">No WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="nowa" id="nowa" class="form-control" required
                        value="{{ old('nowa', $surat_keterangan_kehilangan->nowa) }}">
                </div>

                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat <span class="text-danger">*</span></label>
                    <select name="status_surat" id="status_surat" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach(['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $status)
                            <option value="{{ $status }}" {{ old('status_surat', $surat_keterangan_kehilangan->status_surat) == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi <span class="text-danger">*</span></label>
                    <select name="status_verif" id="status_verif" class="form-control" required>
                        <option value="">-- Pilih Verifikasi --</option>
                        @foreach(['Belum Verifikasi', 'Terverifikasi'] as $verif)
                            <option value="{{ $verif }}" {{ old('status_verif', $surat_keterangan_kehilangan->status_verif) == $verif ? 'selected' : '' }}>{{ $verif }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
