@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Edit Surat Pernyataan Memilih Nama Alias (Satu Orang Tua)</h4>

            <form action="{{ route('surat.namaaliasortu.update', $surat->_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- DATA UTAMA --}}
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input class="form-control @error('nama') is-invalid @enderror"
                           id="nama" name="nama" required
                           value="{{ old('nama', $surat->nama) }}">
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nik">NIK</label>
                    <input class="form-control @error('nik') is-invalid @enderror"
                           id="nik" name="nik" required
                           value="{{ old('nik', $surat->nik) }}">
                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                              id="alamat" name="alamat" rows="3" required>{{ old('alamat', $surat->alamat) }}</textarea>
                    @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_menyatakan">Nama Yang Menyatakan</label>
                    <input class="form-control @error('nama_menyatakan') is-invalid @enderror"
                           id="nama_menyatakan" name="nama_menyatakan" required
                           value="{{ old('nama_menyatakan', $surat->nama_menyatakan) }}">
                    @error('nama_menyatakan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="no_akta_kelahiran">No. Akta Kelahiran</label>
                    <input class="form-control @error('no_akta_kelahiran') is-invalid @enderror"
                           id="no_akta_kelahiran" name="no_akta_kelahiran"
                           value="{{ old('no_akta_kelahiran', $surat->no_akta_kelahiran) }}">
                    @error('no_akta_kelahiran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <hr>

                {{-- AYAH --}}
                <div class="mb-3">
                    <label class="form-label" for="nama_ortu_ayah_tercatat">Nama Orang Tua Tercatat (Ayah)</label>
                    <input class="form-control @error('nama_ortu_ayah_tercatat') is-invalid @enderror"
                           id="nama_ortu_ayah_tercatat" name="nama_ortu_ayah_tercatat"
                           value="{{ old('nama_ortu_ayah_tercatat', $surat->nama_ortu_ayah_tercatat) }}">
                    @error('nama_ortu_ayah_tercatat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_alias_ayah">Nama Alias (Ayah)</label>
                    <input class="form-control @error('nama_alias_ayah') is-invalid @enderror"
                           id="nama_alias_ayah" name="nama_alias_ayah"
                           value="{{ old('nama_alias_ayah', $surat->nama_alias_ayah) }}">
                    @error('nama_alias_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- IBU --}}
                <div class="mb-3">
                    <label class="form-label" for="nama_ortu_ibu_tercatat">Nama Orang Tua Tercatat (Ibu)</label>
                    <input class="form-control @error('nama_ortu_ibu_tercatat') is-invalid @enderror"
                           id="nama_ortu_ibu_tercatat" name="nama_ortu_ibu_tercatat"
                           value="{{ old('nama_ortu_ibu_tercatat', $surat->nama_ortu_ibu_tercatat) }}">
                    @error('nama_ortu_ibu_tercatat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_alias_ibu">Nama Alias (Ibu)</label>
                    <input class="form-control @error('nama_alias_ibu') is-invalid @enderror"
                           id="nama_alias_ibu" name="nama_alias_ibu"
                           value="{{ old('nama_alias_ibu', $surat->nama_alias_ibu) }}">
                    @error('nama_alias_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Alias Dihapus --}}
                <div class="mb-3">
                    <label class="form-label" for="nama_alias_dihapus_1">Nama Alias yang Dihapus (1)</label>
                    <input class="form-control @error('nama_alias_dihapus_1') is-invalid @enderror"
                           id="nama_alias_dihapus_1" name="nama_alias_dihapus_1"
                           value="{{ old('nama_alias_dihapus_1', $surat->nama_alias_dihapus_1) }}">
                    @error('nama_alias_dihapus_1')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_alias_dihapus_2">Nama Alias yang Dihapus (2)</label>
                    <input class="form-control @error('nama_alias_dihapus_2') is-invalid @enderror"
                           id="nama_alias_dihapus_2" name="nama_alias_dihapus_2"
                           value="{{ old('nama_alias_dihapus_2', $surat->nama_alias_dihapus_2) }}">
                    @error('nama_alias_dihapus_2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Berdasarkan --}}
                <div class="mb-3">
                    <label class="form-label" for="berdasarkan">Berdasarkan</label>
                    <textarea class="form-control @error('berdasarkan') is-invalid @enderror"
                              id="berdasarkan" name="berdasarkan" rows="2">{{ old('berdasarkan', $surat->berdasarkan) }}</textarea>
                    @error('berdasarkan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <hr>

                {{-- STATUS & KONTAK --}}
                <div class="mb-3">
                    <label class="form-label" for="status_surat">Status Surat</label>
                    <select class="form-control @error('status_surat') is-invalid @enderror"
                            id="status_surat" name="status_surat" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (['Pending','Di cek','Diterima','Ditolak'] as $st)
                            <option value="{{ $st }}" {{ old('status_surat', $surat->status_surat) === $st ? 'selected' : '' }}>
                                {{ $st }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status_verif">Status Verifikasi</label>
                    <select class="form-control @error('status_verif') is-invalid @enderror"
                            id="status_verif" name="status_verif" required>
                        <option value="">-- Pilih Verifikasi --</option>
                        @foreach (['Belum Verifikasi','Terverifikasi'] as $vf)
                            <option value="{{ $vf }}" {{ old('status_verif', $surat->status_verif) === $vf ? 'selected' : '' }}>
                                {{ $vf }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_verif')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nowa">No WhatsApp</label>
                    <input class="form-control @error('nowa') is-invalid @enderror"
                           id="nowa" name="nowa" required
                           value="{{ old('nowa', $surat->nowa) }}">
                    @error('nowa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="d-flex gap-2">

                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
