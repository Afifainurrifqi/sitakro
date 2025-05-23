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

            <form action="{{ route('suratpernyataantidakbisamelampirkanktpkematian.update', $surat->_id) }}" method="POST">
                @csrf
                @method('PUT')

                <h5 class="mb-3">Data Pelapor</h5>

                <div class="mb-3">
                    <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                    <input type="text" name="nama_pelapor" id="nama_pelapor" class="form-control" required
                        value="{{ old('nama_pelapor', $surat->nama_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="nik_pelapor" class="form-label">NIK Pelapor</label>
                    <input type="text" name="nik_pelapor" id="nik_pelapor" class="form-control" required
                        value="{{ old('nik_pelapor', $surat->nik_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir_pelapor" class="form-label">Tempat Lahir Pelapor</label>
                    <input type="text" name="tempat_lahir_pelapor" id="tempat_lahir_pelapor" class="form-control" required
                        value="{{ old('tempat_lahir_pelapor', $surat->tempat_lahir_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir_pelapor" class="form-label">Tanggal Lahir Pelapor</label>
                    <input type="date" name="tanggal_lahir_pelapor" id="tanggal_lahir_pelapor" class="form-control" required
                        value="{{ old('tanggal_lahir_pelapor', $surat->tanggal_lahir_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin_pelapor" class="form-label">Jenis Kelamin Pelapor</label>
                    <select name="jenis_kelamin_pelapor" id="jenis_kelamin_pelapor" class="form-control" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin_pelapor', $surat->jenis_kelamin_pelapor) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin_pelapor', $surat->jenis_kelamin_pelapor) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_pelapor" class="form-label">Pekerjaan Pelapor</label>
                    <input type="text" name="pekerjaan_pelapor" id="pekerjaan_pelapor" class="form-control" required
                        value="{{ old('pekerjaan_pelapor', $surat->pekerjaan_pelapor) }}">
                </div>
                <div class="mb-3">
                    <label for="alamat_pelapor" class="form-label">Alamat Pelapor</label>
                    <input type="text" name="alamat_pelapor" id="alamat_pelapor" class="form-control" required
                        value="{{ old('alamat_pelapor', $surat->alamat_pelapor) }}">
                </div>

                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan Tidak Bisa Melampirkan KTP</label>
                    <input type="text" name="alasan" id="alasan" class="form-control" required
                        value="{{ old('alasan', $surat->alasan) }}">
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Data Jenazah</h5>

                <div class="mb-3">
                    <label for="nik_jenazah" class="form-label">NIK Jenazah</label>
                    <input type="text" name="nik_jenazah" id="nik_jenazah" class="form-control" required
                        value="{{ old('nik_jenazah', $surat->nik_jenazah) }}">
                </div>
                <div class="mb-3">
                    <label for="nama_jenazah" class="form-label">Nama Jenazah</label>
                    <input type="text" name="nama_jenazah" id="nama_jenazah" class="form-control" required
                        value="{{ old('nama_jenazah', $surat->nama_jenazah) }}">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir_jenazah" class="form-label">Tanggal Lahir Jenazah</label>
                    <input type="date" name="tanggal_lahir_jenazah" id="tanggal_lahir_jenazah" class="form-control" required
                        value="{{ old('tanggal_lahir_jenazah', $surat->tanggal_lahir_jenazah) }}">
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin_jenazah" class="form-label">Jenis Kelamin Jenazah</label>
                    <select name="jenis_kelamin_jenazah" id="jenis_kelamin_jenazah" class="form-control" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin_jenazah', $surat->jenis_kelamin_jenazah) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin_jenazah', $surat->jenis_kelamin_jenazah) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat_jenazah" class="form-label">Alamat Jenazah</label>
                    <input type="text" name="alamat_jenazah" id="alamat_jenazah" class="form-control" required
                        value="{{ old('alamat_jenazah', $surat->alamat_jenazah) }}">
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label for="nowa" class="form-label">No WhatsApp</label>
                    <input type="text" name="nowa" id="nowa" class="form-control" required
                        value="{{ old('nowa', $surat->nowa) }}">
                </div>

                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat</label>
                    <select name="status_surat" id="status_surat" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach(['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $status)
                            <option value="{{ $status }}" {{ old('status_surat', $surat->status_surat) == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi</label>
                    <select name="status_verif" id="status_verif" class="form-control" required>
                        <option value="">-- Pilih Verifikasi --</option>
                        @foreach(['Belum Verifikasi', 'Terverifikasi'] as $verif)
                            <option value="{{ $verif }}" {{ old('status_verif', $surat->status_verif) == $verif ? 'selected' : '' }}>{{ $verif }}</option>
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
