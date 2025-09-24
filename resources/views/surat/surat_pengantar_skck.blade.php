@extends(Auth::check() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Form Surat Pengantar SKCK</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('surat.skck.store') }}" method="POST">
                @csrf

                <h5 class="mb-3">Data Pemohon</h5>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
                </div>
                <div class="mb-3">
                    <label>Nomor NIK</label>
                    <input type="text" name="nik" class="form-control" required value="{{ old('nik') }}" maxlength="16" inputmode="numeric" placeholder="16 digit">
                </div>
                <div class="mb-3">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" required value="{{ old('tempat_lahir') }}">
                </div>
                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required value="{{ old('tanggal_lahir') }}">
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['Laki-laki','Perempuan'] as $jk)
                            <option value="{{ $jk }}" {{ old('jenis_kelamin')==$jk?'selected':'' }}>{{ $jk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Kewarganegaraan</label>
                    <select name="kewarganegaraan" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['WNI','WNA'] as $kw)
                            <option value="{{ $kw }}" {{ old('kewarganegaraan')==$kw?'selected':'' }}>{{ $kw }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $st)
                            <option value="{{ $st }}" {{ old('status')==$st?'selected':'' }}>{{ $st }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Agama</label>
                    <select name="agama" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya'] as $ag)
                            <option value="{{ $ag }}" {{ old('agama')==$ag?'selected':'' }}>{{ $ag }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control" required value="{{ old('pendidikan') }}">
                </div>
                <div class="mb-3">
                    <label>Pekerjaan</label>
                     <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                                    <option value="">-- Pilih pekerjaan --</option>
                                    @php
                                        $jobs = [
                                            'BELUM/TIDAK BEKERJA',
                                            'PELAJAR/MAHASISWA',
                                            'TIDAK/BELUM SEKOLAH',
                                            'KARYAWAN SWASTA',
                                            'IBU RUMAH TANGGA',
                                            'WIRASWASTA',
                                            'TENTARA NASIONAL INDONESIA (nama_ibu_kandung)',
                                            'KEPOLISIAN RI (POLRI)',
                                            'DOSEN',
                                            'GURU',
                                            'Guru agama_penumpang_kk',
                                            'KEPALA DESA',
                                            'PERANGKAT DESA',
                                            'Pegawai Kantor Desa',
                                            'BIDAN',
                                            'DOKTER',
                                            'PERAWAT',
                                            'PETANI/PEKEBUN PEMILIK LAHAN',
                                            'BURUH TANI/PERKEBUNAN',
                                            'PEDAGANG',
                                            'PEGAWAI NEGERI SIPIL (PNS)',
                                            'BURUH HARIAN LEPAS',
                                            'SOPIR',
                                            'KARYAWAN BUMN',
                                            'PENSIUNAN',
                                            'PEMBANTU RUMAH TANGGA',
                                            'BURUH PETERNAKAN',
                                            'KONSTRUKSI',
                                            'PELAUT',
                                            'NELAYAN/PERIKANAN',
                                            'KARYAWAN HONORER',
                                            'PETERNAK',
                                            'MEKANIK',
                                            'PENATA RIAS',
                                            'TUKANG LAS/PANDAI BESI',
                                            'INDUSTRI',
                                            'USTADZ/MUBALIGH',
                                            'TABIB',
                                            'BURUH NELAYAN/PERIKANAN',
                                            'JURU MASAK',
                                            'SENIMAN',
                                            'AKUNTAN',
                                            'Petani/Pekebun penyewa',
                                            'TKI',
                                            'Lainnya',
                                        ];
                                    @endphp
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job }}"
                                            {{ old('pekerjaan') == $job ? 'selected' : '' }}>
                                            {{ $job }}</option>
                                    @endforeach
                                </select>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Informasi Surat</h5>
                <div class="mb-3">
                    <label>Keperuntukan Surat</label>
                    <input type="text" name="keperuntukan" class="form-control" required value="{{ old('keperuntukan') }}" placeholder="Misal: Pengajuan SKCK di Polres ...">
                </div>

                {{-- Status mengikuti referensi UI kamu --}}
                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat</label>
                    <select name="status_surat" id="status_surat" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (['Pending','Di cek','Di terima','Ditolak'] as $status)
                            <option value="{{ $status }}" {{ old('status_surat')==$status?'selected':'' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi</label>
                    <select name="status_verif" id="status_verif" class="form-control" required>
                        <option value="">-- Pilih Verifikasi --</option>
                        @foreach (['Belum Verifikasi','Terverifikasi'] as $verif)
                            <option value="{{ $verif }}" {{ old('status_verif')==$verif?'selected':'' }}>{{ $verif }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>No WhatsApp</label>
                    <input type="text" name="nowa" class="form-control" required value="{{ old('nowa') }}" placeholder="+62812xxxx">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
