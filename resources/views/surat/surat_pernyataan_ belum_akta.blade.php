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

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-4">Surat Pernyataan Belum Pernah Mengurus Akta Kelahiran</h4>

                <form action="{{ route('surat.belumakta.store') }}" method="POST">
                    @csrf

                    <h5 class="mb-3">Yang Bertandatangan</h5>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_nama">Nama</label>
                        <input id="ybt_nama" name="ybt_nama" type="text" class="form-control" required
                            value="{{ old('ybt_nama') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_nik">NIK</label>
                        <input id="ybt_nik" name="ybt_nik" type="text" class="form-control" required
                            value="{{ old('ybt_nik') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_alamat">Alamat</label>
                        <textarea id="ybt_alamat" name="ybt_alamat" rows="2" class="form-control" required>{{ old('ybt_alamat') }}</textarea>
                    </div>

                    <hr class="my-4">

                    <h5 class="mb-3">Menyatakan Bahwa</h5>
                    <div class="mb-3">
                        <label class="form-label" for="subjek_nama">Nama</label>
                        <input id="subjek_nama" name="subjek_nama" type="text" class="form-control" required
                            value="{{ old('subjek_nama') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subjek_tempat_lahir">Tempat Lahir</label>
                        <input id="subjek_tempat_lahir" name="subjek_tempat_lahir" type="text" class="form-control"
                            required value="{{ old('subjek_tempat_lahir') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subjek_tanggal_lahir">Tanggal Lahir</label>
                        <input id="subjek_tanggal_lahir" name="subjek_tanggal_lahir" type="date" class="form-control"
                            required value="{{ old('subjek_tanggal_lahir') }}">
                    </div>

                    <div class="mb-3">
                        <label for="status_surat" class="form-label">Status Surat</label>
                        <select name="status_surat" id="status_surat" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            @foreach (['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $status)
                                <option value="{{ $status }}" {{ old('status_surat') == $status ? 'selected' : '' }}>
                                    {{ $status }}</option>
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
                        <label class="form-label" for="nowa">No WhatsApp</label>
                        <input id="nowa" name="nowa" type="text" class="form-control" required
                            value="{{ old('nowa') }}">
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary px-4" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
