{{-- resources/views/surat/tidakmampu/create.blade.php --}}
@extends(auth()->user()?->role === 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container">
    {{-- Alert error validasi --}}
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
            <h4 class="mb-4">Form Surat Keterangan Tidak Mampu</h4>

            <form action="{{ route('surat.tidakmampu.store') }}" method="POST" novalidate>
                @csrf

                {{-- Peruntukan SKTM --}}
                <div class="mb-3">
                    <label for="peruntukan_sktm" class="form-label">
                        Peruntukan untuk SKTM <span class="text-danger">*</span>
                    </label>
                    <select name="peruntukan_sktm" id="peruntukan_sktm" class="form-control @error('peruntukan_sktm') is-invalid @enderror" required>
                        <option value="">-- Pilih Peruntukan --</option>
                        @foreach (['Biaya Pendidikan', 'Bantuan Sosial', 'Biaya Kesehatan'] as $peruntukan)
                            <option value="{{ $peruntukan }}" {{ old('peruntukan_sktm') == $peruntukan ? 'selected' : '' }}>
                                {{ $peruntukan }}
                            </option>
                        @endforeach
                    </select>
                    @error('peruntukan_sktm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                        class="form-control @error('nama_lengkap') is-invalid @enderror"
                        required value="{{ old('nama_lengkap') }}">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NIK --}}
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" id="nik"
                        class="form-control @error('nik') is-invalid @enderror"
                        required value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TTL --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                            required value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            required value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Kewarganegaraan --}}
                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
                    <input type="text" name="kewarganegaraan" id="kewarganegaraan"
                        class="form-control @error('kewarganegaraan') is-invalid @enderror"
                        required value="{{ old('kewarganegaraan') }}">
                    @error('kewarganegaraan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Agama --}}
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                    <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror" required>
                        <option value="">-- Pilih Agama --</option>
                        @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                            <option value="{{ $agama }}" {{ old('agama') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>
                    @error('agama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status Perkawinan --}}
                <div class="mb-3">
                    <label for="status_perkawinan" class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                    <select name="status_perkawinan" id="status_perkawinan"
                        class="form-control @error('status_perkawinan') is-invalid @enderror" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach(['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai'] as $status)
                            <option value="{{ $status }}" {{ old('status_perkawinan') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status_perkawinan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pekerjaan --}}
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                    @php
                        $jobs = [
                            "BELUM/TIDAK BEKERJA","PELAJAR/MAHASISWA","TIDAK/BELUM SEKOLAH","KARYAWAN SWASTA",
                            "IBU RUMAH TANGGA","WIRASWASTA","TENTARA NASIONAL INDONESIA (TNI)","KEPOLISIAN RI (POLRI)",
                            "DOSEN","GURU","Guru agama_pelapor","KEPALA DESA","PERANGKAT DESA","Pegawai Kantor Desa","BIDAN",
                            "DOKTER","PERAWAT","PETANI/PEKEBUN PEMILIK LAHAN","BURUH TANI/PERKEBUNAN","PEDAGANG",
                            "PEGAWAI NEGERI SIPIL (PNS)","BURUH HARIAN LEPAS","SOPIR","KARYAWAN BUMN","PENSIUNAN",
                            "PEMBANTU RUMAH TANGGA","BURUH PETERNAKAN","KONSTRUKSI","PELAUT","NELAYAN/PERIKANAN",
                            "KARYAWAN HONORER","PETERNAK","MEKANIK","PENATA RIAS","TUKANG LAS/PANDAI BESI","INDUSTRI",
                            "USTADZ/MUBALIGH","TABIB","BURUH NELAYAN/PERIKANAN","JURU MASAK","SENIMAN","AKUNTAN",
                            "Petani/Pekebun penyewa","TKI","Lainnya"
                        ];
                    @endphp
                    <select name="pekerjaan" id="pekerjaan"
                        class="form-control @error('pekerjaan') is-invalid @enderror" required>
                        <option value="">-- Pilih pekerjaan --</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job }}" {{ old('pekerjaan') == $job ? 'selected' : '' }}>{{ $job }}</option>
                        @endforeach
                    </select>
                    @error('pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Alamat Rumah --}}
                <div class="mb-3">
                    <label for="alamat_rumah" class="form-label">Alamat Rumah <span class="text-danger">*</span></label>
                    <textarea name="alamat_rumah" id="alamat_rumah" rows="3"
                        class="form-control @error('alamat_rumah') is-invalid @enderror" required>{{ old('alamat_rumah') }}</textarea>
                    @error('alamat_rumah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Keterangan Fungsi Surat --}}
                <div class="mb-3">
                    <label for="keterangan_fungsi_surat" class="form-label">Keterangan Fungsi Surat (Kelengkapan) <span class="text-danger">*</span></label>
                    <textarea name="keterangan_fungsi_surat" id="keterangan_fungsi_surat" rows="3"
                        class="form-control @error('keterangan_fungsi_surat') is-invalid @enderror" required>{{ old('keterangan_fungsi_surat') }}</textarea>
                    @error('keterangan_fungsi_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Bantuan Sosial + Input ID Dinamis --}}
                @php
                    $bansosMap = [
                        'pkh'    => 'PKH',
                        'kip'    => 'KIP',
                        'kis'    => 'KIS',
                        'bpnt'   => 'BPNT',
                        'dtks'   => 'ID. DTKS',
                        'blt_dd' => 'BLT DD',
                        'bansos' => 'BANSOS',
                    ];
                    $oldBantuan = old('bantuan', []);     // array of selected keys
                    $oldIds     = old('bantuan_id', []);  // assoc: bantuan_id[key] => value
                @endphp

                <div class="mb-3">
                    <label class="form-label">Apakah anda memiliki bantuan sosial?</label>
                    <div class="d-flex flex-column gap-2">
                        @foreach ($bansosMap as $key => $label)
                            @php
                                $isChecked = in_array($key, (array) $oldBantuan);
                                $cbId   = "bantuan_$key";
                                $wrapId = "wrap_$key";
                            @endphp

                            <div class="border rounded p-2">
                                <div class="form-check">
                                    <input
                                        class="form-check-input bantuan-checkbox"
                                        type="checkbox"
                                        name="bantuan[]"
                                        id="{{ $cbId }}"
                                        value="{{ $key }}"
                                        data-target="#{{ $wrapId }}"
                                        {{ $isChecked ? 'checked' : '' }}
                                        onchange="toggleBansosWrap(this)"
                                    >
                                    <label class="form-check-label" for="{{ $cbId }}">{{ $label }}</label>
                                </div>

                                <div id="{{ $wrapId }}" class="mt-2" style="{{ $isChecked ? '' : 'display:none' }}">
                                    <label for="bantuan_id_{{ $key }}" class="form-label mb-1">
                                        ID {{ $label }} <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control @error("bantuan_id.$key") is-invalid @enderror"
                                        name="bantuan_id[{{ $key }}]"
                                        id="bantuan_id_{{ $key }}"
                                        value="{{ $oldIds[$key] ?? '' }}"
                                        {{ $isChecked ? 'required' : '' }}
                                        placeholder="Masukkan ID {{ $label }}"
                                    >
                                    @error("bantuan_id.$key")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('bantuan')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- No WhatsApp --}}
                <div class="mb-3">
                    <label for="nowa" class="form-label">No WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="nowa" id="nowa"
                        class="form-control @error('nowa') is-invalid @enderror"
                        required value="{{ old('nowa') }}">
                    @error('nowa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status Surat --}}
                <div class="mb-3">
                    <label for="status_surat" class="form-label">Status Surat <span class="text-danger">*</span></label>
                    <select name="status_surat" id="status_surat"
                        class="form-control @error('status_surat') is-invalid @enderror" required>
                        @foreach(['Pending', 'Di cek', 'Di terima', 'Ditolak'] as $statusSurat)
                            <option value="{{ $statusSurat }}" {{ old('status_surat') == $statusSurat ? 'selected' : '' }}>
                                {{ $statusSurat }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status Verifikasi --}}
                <div class="mb-3">
                    <label for="status_verif" class="form-label">Status Verifikasi <span class="text-danger">*</span></label>
                    <select name="status_verif" id="status_verif"
                        class="form-control @error('status_verif') is-invalid @enderror" required>
                        @foreach(['Belum Verifikasi', 'Terverifikasi'] as $statusVerif)
                            <option value="{{ $statusVerif }}" {{ old('status_verif') == $statusVerif ? 'selected' : '' }}>
                                {{ $statusVerif }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_verif')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Inline Script agar langsung jalan --}}
<script>
function toggleBansosWrap(cb) {
    var sel = cb.getAttribute('data-target');
    var wrap = document.querySelector(sel);
    if (!wrap) return;
    var input = wrap.querySelector('input');

    if (cb.checked) {
        wrap.style.display = '';
        if (input) input.setAttribute('required', 'required');
    } else {
        wrap.style.display = 'none';
        if (input) {
            input.removeAttribute('required');
            // opsional: kosongkan saat uncheck
            // input.value = '';
        }
    }
}

// Inisialisasi onload (untuk old values saat gagal validasi)
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.bantuan-checkbox').forEach(function (cb) {
        toggleBansosWrap(cb);
    });
});
</script>
@endsection
