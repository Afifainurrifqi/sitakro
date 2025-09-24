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
            <h4 class="mb-4">Edit Surat Keterangan Kematian Desa</h4>

            <form action="{{ route('surat.kematian.update', $surat->_id) }}" method="POST">
                @csrf
                @method('PUT')

                <h5 class="mb-3">Data Almarhum</h5>

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required
                           value="{{ old('nama_lengkap', $surat->nama_lengkap) }}">
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['Laki-laki','Perempuan'] as $jk)
                            <option value="{{ $jk }}" {{ old('jenis_kelamin', $surat->jenis_kelamin) == $jk ? 'selected' : '' }}>
                                {{ $jk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" required
                           value="{{ old('kewarganegaraan', $surat->kewarganegaraan ?? 'Indonesia') }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" id="status" class="form-control" required
                           value="{{ old('status', $surat->status) }}">
                </div>

                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required
                           value="{{ old('pekerjaan', $surat->pekerjaan) }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="2" required>{{ old('alamat', $surat->alamat) }}</textarea>
                </div>

                <h5 class="mb-3">Keterangan Meninggal</h5>

                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <input type="text" name="hari" id="hari" class="form-control" required
                           value="{{ old('hari', $surat->hari) }}">
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required
                           value="{{ old('tanggal', isset($surat->tanggal) ? \Carbon\Carbon::parse($surat->tanggal)->format('Y-m-d') : '') }}">
                </div>

                <div class="mb-3">
                    <label for="penyebab" class="form-label">Disebabkan Karena</label>
                    <input type="text" name="penyebab" id="penyebab" class="form-control" required
                           value="{{ old('penyebab', $surat->penyebab) }}">
                </div>

                {{-- Status Surat --}}
                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat</label>
                    <select name="status_surat" id="status_surat" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $status)
                            <option value="{{ $status }}"
                                {{ old('status_surat', $surat->status_surat) == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Status Verifikasi --}}
                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi</label>
                    <select name="status_verif" id="status_verif" class="form-control" required>
                        <option value="">-- Pilih Verifikasi --</option>
                        @foreach (['Belum Verifikasi', 'Terverifikasi'] as $verif)
                            <option value="{{ $verif }}"
                                {{ old('status_verif', $surat->status_verif) == $verif ? 'selected' : '' }}>
                                {{ $verif }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nowa" class="form-label">No WhatsApp</label>
                    <input type="text" name="nowa" id="nowa" class="form-control" required
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
