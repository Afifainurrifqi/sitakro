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
                <h4 class="mb-4">Edit Surat Keterangan Desa Pernah Menikah</h4>

                {{-- Ganti ke route update + method PUT --}}
                <form action="{{ route('surat.pernahmenikah.update', $surat->_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h5 class="mb-3">Data Pemohon</h5>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required
                               value="{{ old('nama_lengkap', $surat->nama_lengkap) }}">
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" required
                               value="{{ old('nik', $surat->nik) }}">
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            @php $jk = old('jenis_kelamin', $surat->jenis_kelamin); @endphp
                            <option value="Laki-laki" {{ $jk === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $jk === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required
                               value="{{ old('tempat_lahir', $surat->tempat_lahir) }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required
                               value="{{ old('tanggal_lahir', \Illuminate\Support\Str::of($surat->tanggal_lahir)->substr(0,10)) }}">
                    </div>

                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select name="agama" id="agama" class="form-control" required>
                            <option value="">-- Pilih Agama --</option>
                            @php $agamaVal = old('agama', $surat->agama); @endphp
                            @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu'] as $ag)
                                <option value="{{ $ag }}" {{ $agamaVal === $ag ? 'selected' : '' }}>{{ $ag }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" required
                               value="{{ old('kewarganegaraan', $surat->kewarganegaraan ?? 'Indonesia') }}">
                    </div>

                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                            <option value="">-- Pilih Status Perkawinan --</option>
                            @php $sp = old('status_perkawinan', $surat->status_perkawinan); @endphp
                            <option value="Belum Kawin"  {{ $sp === 'Belum Kawin'  ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin"        {{ $sp === 'Kawin'        ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup"  {{ $sp === 'Cerai Hidup'  ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati"   {{ $sp === 'Cerai Mati'   ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required
                               value="{{ old('pekerjaan', $surat->pekerjaan) }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $surat->alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" name="rt" id="rt" class="form-control" required
                               value="{{ old('rt', $surat->rt) }}">
                    </div>

                    <div class="mb-3">
                        <label for="rw" class="form-label">RW</label>
                        <input type="text" name="rw" id="rw" class="form-control" required
                               value="{{ old('rw', $surat->rw) }}">
                    </div>

                    <hr class="my-4">

                    <div class="mb-3">
                        <label for="status_surat" class="form-label">Status Surat</label>
                        <select name="status_surat" id="status_surat" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            @php $sts = old('status_surat', $surat->status_surat); @endphp
                            @foreach(['Pending','Di cek','Di terima','Ditolak'] as $status)
                                <option value="{{ $status }}" {{ $sts === $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status_verif" class="form-label">Status Verifikasi</label>
                        @php $verif = old('status_verif', $surat->status_verif); @endphp
                        <select name="status_verif" id="status_verif" class="form-control" required>
                            <option value="">-- Pilih Verifikasi --</option>
                            @foreach(['Belum Verifikasi','Terverifikasi'] as $v)
                                <option value="{{ $v }}" {{ $verif === $v ? 'selected' : '' }}>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nowa" class="form-label">No WhatsApp</label>
                        <input type="text" name="nowa" id="nowa" class="form-control" required
                               value="{{ old('nowa', $surat->nowa) }}">
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
