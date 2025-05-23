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
            <h4 class="mb-4">Form Edit Surat Keterangan Tidak Mampu</h4>

            <form action="{{ route('surat.tidakmampu.update', $suratketerangantidakmampu->_id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required
                        value="{{ old('nama_lengkap', $suratketerangantidakmampu->nama_lengkap) }}">
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" id="nik" class="form-control" required
                        value="{{ old('nik', $suratketerangantidakmampu->nik) }}">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required
                            value="{{ old('tempat_lahir', $suratketerangantidakmampu->tempat_lahir) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required
                            value="{{ old('tanggal_lahir', $suratketerangantidakmampu->tanggal_lahir) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
                    <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" required
                        value="{{ old('kewarganegaraan', $suratketerangantidakmampu->kewarganegaraan) }}">
                </div>

                <div class="mb-3">
                    <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                    <select name="agama" id="agama" class="form-control" required>
                        <option value="">-- Pilih Agama --</option>
                        @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                            <option value="{{ $agama }}" {{ old('agama', $suratketerangantidakmampu->agama) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status_perkawinan" class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                    <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach(['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai'] as $status)
                            <option value="{{ $status }}" {{ old('status_perkawinan', $suratketerangantidakmampu->status_perkawinan) == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control" required>
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
                            <option value="{{ $job }}" {{ old('pekerjaan', $suratketerangantidakmampu->pekerjaan) == $job ? 'selected' : '' }}>{{ $job }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat_rumah" class="form-label">Alamat Rumah <span class="text-danger">*</span></label>
                    <textarea name="alamat_rumah" id="alamat_rumah" class="form-control" rows="3" required>{{ old('alamat_rumah', $suratketerangantidakmampu->alamat_rumah) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="keterangan_fungsi_surat" class="form-label">Keterangan Fungsi Surat (Kelengkapan) <span class="text-danger">*</span></label>
                    <textarea name="keterangan_fungsi_surat" id="keterangan_fungsi_surat" class="form-control" rows="3" required>{{ old('keterangan_fungsi_surat', $suratketerangantidakmampu->keterangan_fungsi_surat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="nowa" class="form-label">No WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="nowa" id="nowa" class="form-control" required
                        value="{{ old('nowa', $suratketerangantidakmampu->nowa) }}">
                </div>

                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat <span class="text-danger">*</span></label>
                    <select name="status_surat" id="status_surat" class="form-control" required>
                        @foreach(['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $statusSurat)
                            <option value="{{ $statusSurat }}" {{ old('status_surat', $suratketerangantidakmampu->status_surat) == $statusSurat ? 'selected' : '' }}>{{ $statusSurat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi <span class="text-danger">*</span></label>
                    <select name="status_verif" id="status_verif" class="form-control" required>
                        @foreach(['Belum Verifikasi', 'Terverifikasi'] as $statusVerif)
                            <option value="{{ $statusVerif }}" {{ old('status_verif', $suratketerangantidakmampu->status_verif) == $statusVerif ? 'selected' : '' }}>{{ $statusVerif }}</option>
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
