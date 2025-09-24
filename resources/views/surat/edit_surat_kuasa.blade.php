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
            <h4 class="mb-4">Edit Surat Kuasa</h4>

            <form action="{{ route('surat.kuasa.update', $surat->_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- PIHAK 1 --}}
                <h5 class="mb-3">Pihak 1 (Pemberi Kuasa)</h5>
                <div class="mb-3">
                    <label class="form-label" for="p1_nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="p1_nama_lengkap" name="p1_nama_lengkap" class="form-control" required value="{{ old('p1_nama_lengkap', $surat->p1_nama_lengkap) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="p1_jenis_kelamin">Jenis Kelamin</label>
                    <select id="p1_jenis_kelamin" name="p1_jenis_kelamin" class="form-control" required>
                        @foreach (['Laki-laki','Perempuan'] as $jk)
                            <option value="{{ $jk }}" {{ old('p1_jenis_kelamin', $surat->p1_jenis_kelamin)===$jk?'selected':'' }}>{{ $jk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="p1_tempat_lahir">Tempat Lahir</label>
                        <input type="text" id="p1_tempat_lahir" name="p1_tempat_lahir" class="form-control" required value="{{ old('p1_tempat_lahir', $surat->p1_tempat_lahir) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="p1_tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="p1_tanggal_lahir" name="p1_tanggal_lahir" class="form-control" required value="{{ old('p1_tanggal_lahir', optional($surat->p1_tanggal_lahir)->format('Y-m-d')) }}">
                    </div>
                </div>
                <div class="row g-3 mt-0">
                    <div class="col-md-4">
                        <label class="form-label" for="p1_agama">Agama</label>
                        <select id="p1_agama" name="p1_agama" class="form-control" required>
                            @foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu'] as $ag)
                                <option value="{{ $ag }}" {{ old('p1_agama', $surat->p1_agama)===$ag?'selected':'' }}>{{ $ag }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="p1_status">Status</label>
                        <select id="p1_status" name="p1_status" class="form-control" required>
                            @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $st)
                                <option value="{{ $st }}" {{ old('p1_status', $surat->p1_status)===$st?'selected':'' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="p1_nik">NIK</label>
                        <input type="text" id="p1_nik" name="p1_nik" class="form-control" required value="{{ old('p1_nik', $surat->p1_nik) }}">
                    </div>
                </div>
                <div class="row g-3 mt-0">
                    <div class="col-md-6">
                        <label class="form-label" for="p1_pekerjaan">Pekerjaan</label>
                        <input type="text" id="p1_pekerjaan" name="p1_pekerjaan" class="form-control" required value="{{ old('p1_pekerjaan', $surat->p1_pekerjaan) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="p1_alamat">Alamat</label>
                        <input type="text" id="p1_alamat" name="p1_alamat" class="form-control" required value="{{ old('p1_alamat', $surat->p1_alamat) }}">
                    </div>
                </div>

                <hr class="my-4">

                {{-- PIHAK 2 --}}
                <h5 class="mb-3">Pihak 2 (Penerima Kuasa)</h5>
                <div class="mb-3">
                    <label class="form-label" for="p2_nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="p2_nama_lengkap" name="p2_nama_lengkap" class="form-control" required value="{{ old('p2_nama_lengkap', $surat->p2_nama_lengkap) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="p2_jenis_kelamin">Jenis Kelamin</label>
                    <select id="p2_jenis_kelamin" name="p2_jenis_kelamin" class="form-control" required>
                        @foreach (['Laki-laki','Perempuan'] as $jk)
                            <option value="{{ $jk }}" {{ old('p2_jenis_kelamin', $surat->p2_jenis_kelamin)===$jk?'selected':'' }}>{{ $jk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="p2_tempat_lahir">Tempat Lahir</label>
                        <input type="text" id="p2_tempat_lahir" name="p2_tempat_lahir" class="form-control" required value="{{ old('p2_tempat_lahir', $surat->p2_tempat_lahir) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="p2_tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="p2_tanggal_lahir" name="p2_tanggal_lahir" class="form-control" required value="{{ old('p2_tanggal_lahir', optional($surat->p2_tanggal_lahir)->format('Y-m-d')) }}">
                    </div>
                </div>
                <div class="row g-3 mt-0">
                    <div class="col-md-4">
                        <label class="form-label" for="p2_agama">Agama</label>
                        <select id="p2_agama" name="p2_agama" class="form-control" required>
                            @foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu'] as $ag)
                                <option value="{{ $ag }}" {{ old('p2_agama', $surat->p2_agama)===$ag?'selected':'' }}>{{ $ag }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="p2_status">Status</label>
                        <select id="p2_status" name="p2_status" class="form-control" required>
                            @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $st)
                                <option value="{{ $st }}" {{ old('p2_status', $surat->p2_status)===$st?'selected':'' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="p2_nik">NIK</label>
                        <input type="text" id="p2_nik" name="p2_nik" class="form-control" required value="{{ old('p2_nik', $surat->p2_nik) }}">
                    </div>
                </div>
                <div class="row g-3 mt-0">
                    <div class="col-md-6">
                        <label class="form-label" for="p2_pekerjaan">Pekerjaan</label>
                        <input type="text" id="p2_pekerjaan" name="p2_pekerjaan" class="form-control" required value="{{ old('p2_pekerjaan', $surat->p2_pekerjaan) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="p2_alamat">Alamat</label>
                        <input type="text" id="p2_alamat" name="p2_alamat" class="form-control" required value="{{ old('p2_alamat', $surat->p2_alamat) }}">
                    </div>
                </div>

                <hr class="my-4">

                {{-- STATUS --}}
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="status_surat">Status Surat</label>
                        <select id="status_surat" name="status_surat" class="form-control" required>
                            @foreach (['Pending','Di cek','Di terima','Ditolak'] as $stsurat)
                                <option value="{{ $stsurat }}" {{ old('status_surat', $surat->status_surat ?? 'Pending')===$stsurat?'selected':'' }}>
                                    {{ $stsurat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="status_verif">Status Verifikasi</label>
                        <select id="status_verif" name="status_verif" class="form-control" required>
                            @foreach (['Belum Verifikasi','Terverifikasi'] as $ver)
                                <option value="{{ $ver }}" {{ old('status_verif', $surat->status_verif ?? 'Belum Verifikasi')===$ver?'selected':'' }}>
                                    {{ $ver }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label" for="nowa">No WhatsApp</label>
                    <input type="text" id="nowa" name="nowa" class="form-control" required value="{{ old('nowa', $surat->nowa) }}">
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
