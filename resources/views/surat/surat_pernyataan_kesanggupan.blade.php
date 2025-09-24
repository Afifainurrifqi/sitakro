@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-4">Form Surat Pernyataan Kesanggupan</h4>

                <form action="{{ route('surat.kesanggupan.store') }}" method="POST">
                    @csrf

                    <h5 class="mb-3">Yang Bertandatangan</h5>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
                    </div>
                    <div class="mb-3">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" required value="{{ old('nik') }}">
                    </div>
                    <div class="mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required
                            value="{{ old('tempat_lahir') }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required
                            value="{{ old('tanggal_lahir') }}">
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Tujuan Kegiatan</label>
                        <input type="text" name="tujuan_kegiatan" class="form-control" required
                            value="{{ old('tujuan_kegiatan') }}">
                    </div>

                    <hr class="my-4">
                    <h5 class="mb-3">Pelaksanaan</h5>
                    <div class="mb-3">
                        <label>Hari</label>
                        <input type="text" name="hari" class="form-control" required value="{{ old('hari') }}">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required value="{{ old('tanggal') }}">
                    </div>
                    <div class="mb-3">
                        <label>Waktu</label>
                        <input type="text" name="waktu" class="form-control" required value="{{ old('waktu') }}">
                    </div>
                    <div class="mb-3">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control" required value="{{ old('tempat') }}">
                    </div>

                    {{-- Hidden default --}}
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
                                <option value="{{ $verif }}" {{ old('status_verif') == $verif ? 'selected' : '' }}>
                                    {{ $verif }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>No WhatsApp</label>
                        <input type="text" name="nowa" class="form-control" required value="{{ old('nowa') }}">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
