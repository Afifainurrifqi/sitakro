@extends(Auth::check() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Edit Surat Pengantar SKCK</h4>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('surat.skck.update', $surat->_id ?? $surat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h5 class="mb-3">Data Pemohon</h5>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required value="{{ old('nama', $surat->nama) }}">
                </div>
                <div class="mb-3">
                    <label>Nomor NIK</label>
                    <input type="text" name="nik" class="form-control" required value="{{ old('nik', $surat->nik) }}" maxlength="16" inputmode="numeric">
                </div>
                <div class="mb-3">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" required value="{{ old('tempat_lahir', $surat->tempat_lahir) }}">
                </div>
                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required
                           value="{{ old('tanggal_lahir', optional(\Illuminate\Support\Carbon::parse($surat->tanggal_lahir))->format('Y-m-d')) }}">
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    @php $jk = old('jenis_kelamin', $surat->jenis_kelamin); @endphp
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['Laki-laki','Perempuan'] as $opt)
                            <option value="{{ $opt }}" {{ $jk==$opt?'selected':'' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Kewarganegaraan</label>
                    @php $kw = old('kewarganegaraan', $surat->kewarganegaraan); @endphp
                    <select name="kewarganegaraan" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['WNI','WNA'] as $opt)
                            <option value="{{ $opt }}" {{ $kw==$opt?'selected':'' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    @php $st = old('status', $surat->status); @endphp
                    <select name="status" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $opt)
                            <option value="{{ $opt }}" {{ $st==$opt?'selected':'' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Agama</label>
                    @php $ag = old('agama', $surat->agama); @endphp
                    <select name="agama" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya'] as $opt)
                            <option value="{{ $opt }}" {{ $ag==$opt?'selected':'' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control" required value="{{ old('pendidikan', $surat->pendidikan) }}">
                </div>
                <div class="mb-3">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" required value="{{ old('pekerjaan', $surat->pekerjaan) }}">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat', $surat->alamat) }}</textarea>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Informasi Surat</h5>
                <div class="mb-3">
                    <label>Keperuntukan Surat</label>
                    <input type="text" name="keperuntukan" class="form-control" required value="{{ old('keperuntukan', $surat->keperuntukan) }}">
                </div>

                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat</label>
                    @php $ss = old('status_surat', $surat->status_surat); @endphp
                    <select name="status_surat" id="status_surat" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (['Pending','Di cek','Di terima','Ditolak'] as $opt)
                            <option value="{{ $opt }}" {{ $ss==$opt?'selected':'' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi</label>
                    @php $sv = old('status_verif', $surat->status_verif); @endphp
                    <select name="status_verif" id="status_verif" class="form-control" required>
                        <option value="">-- Pilih Verifikasi --</option>
                        @foreach (['Belum Verifikasi','Terverifikasi'] as $opt)
                            <option value="{{ $opt }}" {{ $sv==$opt?'selected':'' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>No WhatsApp</label>
                    <input type="text" name="nowa" class="form-control" required value="{{ old('nowa', $surat->nowa) }}">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                    <a href="{{ route('surat.skck.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
