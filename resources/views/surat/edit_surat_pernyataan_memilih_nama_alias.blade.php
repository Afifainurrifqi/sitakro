@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                <h4 class="mb-4">Edit Surat Keterangan Memilih Nama Alias</h4>

                <form action="{{ route('surat.namaalias.update', $surat->_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required
                               value="{{ old('nama', $surat->nama) }}">
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" required
                               value="{{ old('nik', $surat->nik) }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $surat->alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pemilih" class="form-label">Nama Pemilih</label>
                        <input type="text" name="nama_pemilih" id="nama_pemilih" class="form-control" required
                               value="{{ old('nama_pemilih', $surat->nama_pemilih) }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_akta_kelahiran" class="form-label">No. Akta Kelahiran</label>
                        <input type="text" name="no_akta_kelahiran" id="no_akta_kelahiran" class="form-control"
                               value="{{ old('no_akta_kelahiran', $surat->no_akta_kelahiran) }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_orang_tua" class="form-label">Nama Orang Tua (Ayah/Ibu)</label>
                        <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="form-control"
                               value="{{ old('nama_orang_tua', $surat->nama_orang_tua) }}">
                    </div>

                    <div class="mb-3">
                        <label for="alias" class="form-label">Alias</label>
                        <input type="text" name="alias" id="alias" class="form-control"
                               value="{{ old('alias', $surat->alias) }}">
                    </div>

                    <div class="mb-3">
                        <label for="data_alias_dihapus" class="form-label">Data Alias yang Dihapus</label>
                        <input type="text" name="data_alias_dihapus" id="data_alias_dihapus" class="form-control"
                               value="{{ old('data_alias_dihapus', $surat->data_alias_dihapus) }}">
                    </div>

                    <div class="mb-3">
                        <label for="berdasarkan" class="form-label">Berdasarkan</label>
                        <textarea name="berdasarkan" id="berdasarkan" class="form-control" rows="2">{{ old('berdasarkan', $surat->berdasarkan) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status_surat" class="form-label">Status Surat</label>
                        <select name="status_surat" id="status_surat" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            @foreach (['Pending', 'Di cek', 'Di terima', 'Di tolak'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status_surat', $surat->status_surat) === $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status_verif" class="form-label">Status Verifikasi</label>
                        <select name="status_verif" id="status_verif" class="form-control" required>
                            <option value="">-- Pilih Verifikasi --</option>
                            @foreach (['Belum Verifikasi', 'Terverifikasi'] as $verif)
                                <option value="{{ $verif }}"
                                    {{ old('status_verif', $surat->status_verif) === $verif ? 'selected' : '' }}>
                                    {{ $verif }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nowa" class="form-label">No WhatsApp</label>
                        <input type="text" name="nowa" id="nowa" class="form-control" required
                               placeholder="Contoh: 62812xxxxxxx"
                               value="{{ old('nowa', $surat->nowa) }}">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>

                        @isset($surat->_id)
                            @if (Route::has('surat.namaalias.destroy'))
                                <form action="{{ route('surat.namaalias.destroy', $surat->_id) }}" method="POST" onsubmit="return confirm('Hapus surat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                </form>
                            @endif
                        @endisset
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
