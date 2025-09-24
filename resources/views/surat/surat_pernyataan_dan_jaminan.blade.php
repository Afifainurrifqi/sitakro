@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger"><ul class="mb-0">
            @foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul></div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Form Surat Pernyataan dan Jaminan</h4>
            <form action="{{ route('surat.pernyataandanjaminan.store') }}" method="POST">
                @csrf

                <h6 class="mb-2">A. Identitas Pembuat Pernyataan (Penjamin)</h6>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control" name="nama_pembuat" value="{{ old('nama_pembuat') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input class="form-control" name="nik_pembuat" value="{{ old('nik_pembuat') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat_pembuat" rows="2" required>{{ old('alamat_pembuat') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hubungan dengan Terjamin</label>
                    <input class="form-control" name="hubungan_dengan_terjamin" value="{{ old('hubungan_dengan_terjamin') }}" placeholder="Orang Tua/Wali/Saudara/Atasan" required>
                </div>

                <h6 class="mb-2 mt-3">B. Identitas Pihak yang Dijamin</h6>
                <div class="mb-3">
                    <label class="form-label">Nama Terjamin</label>
                    <input class="form-control" name="nama_terjamin" value="{{ old('nama_terjamin') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIK Terjamin</label>
                    <input class="form-control" name="nik_terjamin" value="{{ old('nik_terjamin') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat Terjamin</label>
                    <textarea class="form-control" name="alamat_terjamin" rows="2" required>{{ old('alamat_terjamin') }}</textarea>
                </div>

                <h6 class="mb-2 mt-3">C. Pernyataan & Jaminan</h6>
                <div class="mb-3">
                    <label class="form-label">Uraian Pernyataan</label>
                    <textarea class="form-control" name="uraian_pernyataan" rows="3" required>{{ old('uraian_pernyataan') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bentuk Jaminan</label>
                    <input class="form-control" name="bentuk_jaminan" value="{{ old('bentuk_jaminan') }}" placeholder="contoh: pertanggungjawaban moral / uang jaminan / barang / jasa">
                </div>
                <div class="mb-3">
                    <label class="form-label">Berlaku Mulai</label>
                    <input type="date" class="form-control" name="berlaku_mulai" value="{{ old('berlaku_mulai') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Berlaku Sampai (opsional)</label>
                    <input type="date" class="form-control" name="berlaku_sampai" value="{{ old('berlaku_sampai') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Berdasarkan (opsional)</label>
                    <textarea class="form-control" name="berdasarkan" rows="2">{{ old('berdasarkan') }}</textarea>
                </div>

                {{-- status hidden default --}}
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
                    <label class="form-label">No WhatsApp</label>
                    <input class="form-control" name="nowa" value="{{ old('nowa') }}" required>
                </div>

                <button class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection
