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
            <h4 class="mb-4">Edit Surat Pernyataan Kesanggupan</h4>

            <form action="{{ route('surat.kesanggupan.update', $surat->_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- YANG BERTANDATANGAN --}}
                <h5 class="mb-3">Yang Bertandatangan</h5>
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" required
                           value="{{ old('nama', $surat->nama) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" class="form-control" required
                           value="{{ old('nik', $surat->nik) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required
                           value="{{ old('tempat_lahir', $surat->tempat_lahir) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required
                           value="{{ old('tanggal_lahir', optional($surat->tanggal_lahir)->format('Y-m-d')) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="2" required>{{ old('alamat', $surat->alamat) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tujuan_kegiatan">Tujuan Kegiatan</label>
                    <input type="text" id="tujuan_kegiatan" name="tujuan_kegiatan" class="form-control" required
                           value="{{ old('tujuan_kegiatan', $surat->tujuan_kegiatan) }}">
                </div>

                <hr class="my-4">

                {{-- PELAKSANAAN --}}
                <h5 class="mb-3">Pelaksanaan</h5>
                <div class="mb-3">
                    <label class="form-label" for="hari">Hari</label>
                    <input type="text" id="hari" name="hari" class="form-control" required
                           value="{{ old('hari', $surat->hari) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" required
                           value="{{ old('tanggal', optional($surat->tanggal)->format('Y-m-d')) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="waktu">Waktu</label>
                    <input type="text" id="waktu" name="waktu" class="form-control" required
                           value="{{ old('waktu', $surat->waktu) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tempat">Tempat</label>
                    <input type="text" id="tempat" name="tempat" class="form-control" required
                           value="{{ old('tempat', $surat->tempat) }}">
                </div>

                <hr class="my-4">

                {{-- STATUS (dibiarkan tampak di edit agar admin bisa ubah) --}}
                <div class="mb-3">
                    <label class="form-label" for="status_surat">Status Surat</label>
                    @php $opsiStatus = ['Pending', 'Di cek', 'Di terima', 'Ditolak']; @endphp
                    <select name="status_surat" id="status_surat" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        @foreach ($opsiStatus as $s)
                            <option value="{{ $s }}" {{ old('status_surat', $surat->status_surat) === $s ? 'selected' : '' }}>
                                {{ $s }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status_verif">Status Verifikasi</label>
                    @php $opsiVerif = ['Belum Verifikasi', 'Terverifikasi']; @endphp
                    <select name="status_verif" id="status_verif" class="form-control">
                        <option value="">-- Pilih Verifikasi --</option>
                        @foreach ($opsiVerif as $v)
                            <option value="{{ $v }}" {{ old('status_verif', $surat->status_verif) === $v ? 'selected' : '' }}>
                                {{ $v }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nowa">No WhatsApp</label>
                    <input type="text" id="nowa" name="nowa" class="form-control" required
                           value="{{ old('nowa', $surat->nowa) }}">
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
