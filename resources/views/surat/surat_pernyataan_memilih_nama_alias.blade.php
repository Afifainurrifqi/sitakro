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
                <h4 class="mb-4">Form Surat Keterangan Memilih Nama Alias</h4>

                <form action="{{ route('surat.namaalias.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required
                            value="{{ old('nama') }}">
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" required
                            value="{{ old('nik') }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pemilih" class="form-label">Nama Pemilih</label>
                        <input type="text" name="nama_pemilih" id="nama_pemilih" class="form-control" required
                            value="{{ old('nama_pemilih') }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_akta_kelahiran" class="form-label">No. Akta Kelahiran</label>
                        <input type="text" name="no_akta_kelahiran" id="no_akta_kelahiran" class="form-control"
                            value="{{ old('no_akta_kelahiran') }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_orang_tua" class="form-label">Nama Orang Tua (Ayah/Ibu)</label>
                        <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control"
                            value="{{ old('nama_orang_tua') }}">
                    </div>

                    <div class="mb-3">
                        <label for="alias" class="form-label">Alias</label>
                        <input type="text" name="alias" id="alias" class="form-control"
                            value="{{ old('alias') }}">
                    </div>

                    <div class="mb-3">
                        <label for="data_alias_dihapus" class="form-label">Data Alias yang Dihapus</label>
                        <input type="text" name="data_alias_dihapus" id="data_alias_dihapus" class="form-control"
                            value="{{ old('data_alias_dihapus') }}">
                    </div>

                    <div class="mb-3">
                        <label for="berdasarkan" class="form-label">Berdasarkan</label>
                        <textarea name="berdasarkan" id="berdasarkan" class="form-control" rows="2">{{ old('berdasarkan') }}</textarea>
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
                                    {{ old('status_verif') == $verif ? 'selected' : '' }}>{{ $verif }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nowa" class="form-label">No WhatsApp</label>
                        <input type="text" name="nowa" id="nowa" class="form-control" required
                            value="{{ old('nowa') }}">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                </form>
            </div>
        </div>
    </div>
@endsection
