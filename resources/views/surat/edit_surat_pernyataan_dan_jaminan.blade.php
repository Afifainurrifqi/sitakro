{{-- resources/views/surat/edit_surat_pernyataan_dan_jaminan.blade.php --}}
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
            <h4 class="mb-4">Edit Surat Pernyataan dan Jaminan</h4>

            <form action="{{ route('surat.pernyataandanjaminan.update', $surat->_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- A. Identitas Pembuat Pernyataan (Penjamin) --}}
                <h6 class="mb-2">A. Identitas Pembuat Pernyataan (Penjamin)</h6>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control @error('nama_pembuat') is-invalid @enderror"
                           name="nama_pembuat"
                           value="{{ old('nama_pembuat', $surat->nama_pembuat) }}" required>
                    @error('nama_pembuat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input class="form-control @error('nik_pembuat') is-invalid @enderror"
                           name="nik_pembuat"
                           value="{{ old('nik_pembuat', $surat->nik_pembuat) }}" required>
                    @error('nik_pembuat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat_pembuat') is-invalid @enderror"
                              name="alamat_pembuat" rows="2" required>{{ old('alamat_pembuat', $surat->alamat_pembuat) }}</textarea>
                    @error('alamat_pembuat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Hubungan dengan Terjamin</label>
                    <input class="form-control @error('hubungan_dengan_terjamin') is-invalid @enderror"
                           name="hubungan_dengan_terjamin"
                           placeholder="Orang Tua/Wali/Saudara/Atasan"
                           value="{{ old('hubungan_dengan_terjamin', $surat->hubungan_dengan_terjamin) }}" required>
                    @error('hubungan_dengan_terjamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- B. Identitas Pihak yang Dijamin --}}
                <h6 class="mb-2 mt-3">B. Identitas Pihak yang Dijamin</h6>

                <div class="mb-3">
                    <label class="form-label">Nama Terjamin</label>
                    <input class="form-control @error('nama_terjamin') is-invalid @enderror"
                           name="nama_terjamin"
                           value="{{ old('nama_terjamin', $surat->nama_terjamin) }}" required>
                    @error('nama_terjamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">NIK Terjamin</label>
                    <input class="form-control @error('nik_terjamin') is-invalid @enderror"
                           name="nik_terjamin"
                           value="{{ old('nik_terjamin', $surat->nik_terjamin) }}" required>
                    @error('nik_terjamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Terjamin</label>
                    <textarea class="form-control @error('alamat_terjamin') is-invalid @enderror"
                              name="alamat_terjamin" rows="2" required>{{ old('alamat_terjamin', $surat->alamat_terjamin) }}</textarea>
                    @error('alamat_terjamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- C. Pernyataan & Jaminan --}}
                <h6 class="mb-2 mt-3">C. Pernyataan & Jaminan</h6>

                <div class="mb-3">
                    <label class="form-label">Uraian Pernyataan</label>
                    <textarea class="form-control @error('uraian_pernyataan') is-invalid @enderror"
                              name="uraian_pernyataan" rows="3" required>{{ old('uraian_pernyataan', $surat->uraian_pernyataan) }}</textarea>
                    @error('uraian_pernyataan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Bentuk Jaminan</label>
                    <input class="form-control @error('bentuk_jaminan') is-invalid @enderror"
                           name="bentuk_jaminan"
                           placeholder="contoh: pertanggungjawaban moral / uang jaminan / barang / jasa"
                           value="{{ old('bentuk_jaminan', $surat->bentuk_jaminan) }}">
                    @error('bentuk_jaminan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Berlaku Mulai</label>
                    <input type="date" class="form-control @error('berlaku_mulai') is-invalid @enderror"
                           name="berlaku_mulai"
                           value="{{ old('berlaku_mulai', $surat->berlaku_mulai) }}" required>
                    @error('berlaku_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Berlaku Sampai (opsional)</label>
                    <input type="date" class="form-control @error('berlaku_sampai') is-invalid @enderror"
                           name="berlaku_sampai"
                           value="{{ old('berlaku_sampai', $surat->berlaku_sampai) }}">
                    @error('berlaku_sampai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Berdasarkan (opsional)</label>
                    <textarea class="form-control @error('berdasarkan') is-invalid @enderror"
                              name="berdasarkan" rows="2">{{ old('berdasarkan', $surat->berdasarkan) }}</textarea>
                    @error('berdasarkan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Status & Verifikasi (tampilkan saat edit) --}}
                <div class="mb-3">
                    <label class="form-label" for="status_surat">Status Surat</label>
                    <select class="form-control @error('status_surat') is-invalid @enderror"
                            id="status_surat" name="status_surat" required>
                        @php $statusNow = old('status_surat', $surat->status_surat); @endphp
                        @foreach (['Pending','Di cek','Diterima','Ditolak'] as $st)
                            <option value="{{ $st }}" {{ $statusNow === $st ? 'selected' : '' }}>{{ $st }}</option>
                        @endforeach
                    </select>
                    @error('status_surat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status_verif">Status Verifikasi</label>
                    <select class="form-control @error('status_verif') is-invalid @enderror"
                            id="status_verif" name="status_verif" required>
                        @php $verifNow = old('status_verif', $surat->status_verif); @endphp
                        @foreach (['Belum Verifikasi','Terverifikasi'] as $vf)
                            <option value="{{ $vf }}" {{ $verifNow === $vf ? 'selected' : '' }}>{{ $vf }}</option>
                        @endforeach
                    </select>
                    @error('status_verif')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">No WhatsApp</label>
                    <input class="form-control @error('nowa') is-invalid @enderror"
                           name="nowa" value="{{ old('nowa', $surat->nowa) }}" required>
                    @error('nowa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
