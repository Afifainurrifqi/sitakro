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
            <h4 class="mb-4">Edit Surat Keterangan Ahli Waris</h4>

            <form action="{{ route('surat.ahliwaris.update', $surat->_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- YANG BERTANDA TANGAN --}}
                <h5 class="mb-3">Yang Bertanda Tangan</h5>
                <div class="mb-3">
                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required
                        value="{{ old('nama_lengkap', $surat->nama_lengkap) }}">
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
                    <label class="form-label" for="agama">Agama</label>
                    <select id="agama" name="agama" class="form-control" required>
                        <option value="">-- Pilih Agama --</option>
                        @foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu'] as $a)
                            <option value="{{ $a }}" {{ old('agama', $surat->agama) === $a ? 'selected' : '' }}>{{ $a }}</option>
                        @endforeach
                    </select>
                </div>
                @php
                    $jobs = [
                        'BELUM/TIDAK BEKERJA','PELAJAR/MAHASISWA','TIDAK/BELUM SEKOLAH','KARYAWAN SWASTA','IBU RUMAH TANGGA',
                        'WIRASWASTA','TNI','POLRI','DOSEN','GURU','KEPALA DESA','PERANGKAT DESA','Pegawai Kantor Desa',
                        'BIDAN','DOKTER','PERAWAT','PETANI/PEKEBUN PEMILIK LAHAN','BURUH TANI/PERKEBUNAN','PEDAGANG',
                        'PNS','BURUH HARIAN LEPAS','SOPIR','KARYAWAN BUMN','PENSIUNAN','PEMBANTU RUMAH TANGGA',
                        'BURUH PETERNAKAN','KONSTRUKSI','PELAUT','NELAYAN/PERIKANAN','KARYAWAN HONORER','PETERNAK',
                        'MEKANIK','PENATA RIAS','TUKANG LAS/PANDAI BESI','INDUSTRI','USTADZ/MUBALIGH','TABIB',
                        'BURUH NELAYAN/PERIKANAN','JURU MASAK','SENIMAN','AKUNTAN','Petani/Pekebun penyewa','TKI','Lainnya'
                    ];
                @endphp
                <div class="mb-3">
                    <label class="form-label" for="pekerjaan">Pekerjaan</label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                        <option value="">-- Pilih pekerjaan --</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job }}" {{ old('pekerjaan', $surat->pekerjaan) == $job ? 'selected' : '' }}>{{ $job }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_ktp">No KTP</label>
                    <input type="text" id="no_ktp" name="no_ktp" class="form-control" required
                        value="{{ old('no_ktp', $surat->no_ktp) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $s)
                            <option value="{{ $s }}" {{ old('status', $surat->status) === $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="2" required>{{ old('alamat', $surat->alamat) }}</textarea>
                </div>

                <hr class="my-4">

                {{-- KETERANGAN ISTRI --}}
                <h5 class="mb-3">Keterangan Istri</h5>
                <div class="mb-3">
                    <label class="form-label" for="nama_istri">Nama Lengkap</label>
                    <input type="text" id="nama_istri" name="nama_istri" class="form-control" required
                        value="{{ old('nama_istri', $surat->nama_istri) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tempat_lahir_istri">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir_istri" name="tempat_lahir_istri" class="form-control" required
                        value="{{ old('tempat_lahir_istri', $surat->tempat_lahir_istri) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tanggal_lahir_istri">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir_istri" name="tanggal_lahir_istri" class="form-control" required
                        value="{{ old('tanggal_lahir_istri', optional($surat->tanggal_lahir_istri)->format('Y-m-d')) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="agama_istri">Agama</label>
                    <select id="agama_istri" name="agama_istri" class="form-control" required>
                        <option value="">-- Pilih Agama --</option>
                        @foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu'] as $ai)
                            <option value="{{ $ai }}" {{ old('agama_istri', $surat->agama_istri) === $ai ? 'selected' : '' }}>{{ $ai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="pekerjaan_istri">Pekerjaan</label>
                    <select name="pekerjaan_istri" id="pekerjaan_istri" class="form-control" required>
                        <option value="">-- Pilih pekerjaan --</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job }}" {{ old('pekerjaan_istri', $surat->pekerjaan_istri) == $job ? 'selected' : '' }}>{{ $job }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="status_istri">Status</label>
                    <select id="status_istri" name="status_istri" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $si)
                            <option value="{{ $si }}" {{ old('status_istri', $surat->status_istri) === $si ? 'selected' : '' }}>{{ $si }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_ktp_istri">No KTP</label>
                    <input type="text" id="no_ktp_istri" name="no_ktp_istri" class="form-control" required
                        value="{{ old('no_ktp_istri', $surat->no_ktp_istri) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat_istri">Alamat</label>
                    <textarea id="alamat_istri" name="alamat_istri" class="form-control" rows="2" required>{{ old('alamat_istri', $surat->alamat_istri) }}</textarea>
                </div>

                <hr class="my-4">

                {{-- ANAK DINAMIS --}}
                @php
                    $jumlahAnakOld = old('jumlah_anak', $surat->jumlah_anak ?? 0);
                    $listAnakOld = old('nama_anak', $surat->nama_anak ?? []);
                    if (!is_array($listAnakOld)) $listAnakOld = (array) $listAnakOld;
                @endphp

                <h5 class="mb-2">Anak</h5>
                <div class="row g-2 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label" for="jumlah_anak">Jumlah Anak</label>
                        <input type="number" min="0" id="jumlah_anak" name="jumlah_anak" class="form-control" required
                            value="{{ $jumlahAnakOld }}">
                    </div>
                </div>
                <div id="anak-wrapper" class="mt-3"></div>

                <div class="mb-3 mt-3">
                    <label class="form-label" for="hubungan_dengan_ahli_waris">Hubungan dengan Ahli Waris</label>
                    <input type="text" id="hubungan_dengan_ahli_waris" name="hubungan_dengan_ahli_waris"
                        class="form-control" required
                        value="{{ old('hubungan_dengan_ahli_waris', $surat->hubungan_dengan_ahli_waris) }}">
                </div>

                <hr class="my-4">

                {{-- SAKSI DINAMIS --}}
                @php
                    $jumlahSaksiOld = old('jumlah_saksi', $surat->jumlah_saksi ?? 0);
                    $listSaksiOld = old('nama_saksi', $surat->nama_saksi ?? []);
                    if (!is_array($listSaksiOld)) $listSaksiOld = (array) $listSaksiOld;
                @endphp

                <h5 class="mb-2">Saksi</h5>
                <div class="row g-2 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label" for="jumlah_saksi">Jumlah Saksi</label>
                        <input type="number" min="0" id="jumlah_saksi" name="jumlah_saksi" class="form-control" required
                            value="{{ $jumlahSaksiOld }}">
                    </div>
                </div>
                <div id="saksi-wrapper" class="mt-3"></div>

                {{-- STATUS (Admin bisa ubah) --}}
                <div class="mb-3 mt-3">
                    <label class="form-label" for="status_surat">Status Surat</label>
                    <select id="status_surat" name="status_surat" class="form-control" required>
                        @foreach (['Pending','Di cek','Di terima','Ditolak'] as $st)
                            <option value="{{ $st }}" {{ old('status_surat', $surat->status_surat) === $st ? 'selected' : '' }}>{{ $st }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="status_verif">Status Verifikasi</label>
                    <select id="status_verif" name="status_verif" class="form-control" required>
                        @foreach (['Belum Verifikasi','Terverifikasi'] as $vf)
                            <option value="{{ $vf }}" {{ old('status_verif', $surat->status_verif) === $vf ? 'selected' : '' }}>{{ $vf }}</option>
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

{{-- JS Dinamis Anak & Saksi (prefill dari data lama) --}}
<script>
(function () {
    const anakWrapper = document.getElementById('anak-wrapper');
    const saksiWrapper = document.getElementById('saksi-wrapper');
    const jumlahAnak = document.getElementById('jumlah_anak');
    const jumlahSaksi = document.getElementById('jumlah_saksi');

    const oldAnak = @json($listAnakOld);
    const oldSaksi = @json($listSaksiOld);

    function escape(val) {
        return String(val ?? '').replace(/"/g, '&quot;');
    }

    function renderInputs(wrapper, count, name, label, oldVals) {
        wrapper.innerHTML = '';
        const n = parseInt(count || 0, 10);
        for (let i = 0; i < n; i++) {
            const div = document.createElement('div');
            div.className = 'mb-2';
            const val = oldVals[i] ?? '';
            div.innerHTML = `
                <label class="form-label">${label} ${i + 1}</label>
                <input type="text" name="${name}[]" class="form-control" value="${escape(val)}">
            `;
            wrapper.appendChild(div);
        }
    }

    renderInputs(anakWrapper, jumlahAnak.value, 'nama_anak', 'Nama Anak', oldAnak);
    renderInputs(saksiWrapper, jumlahSaksi.value, 'nama_saksi', 'Nama Saksi', oldSaksi);

    jumlahAnak.addEventListener('input', () => renderInputs(anakWrapper, jumlahAnak.value, 'nama_anak', 'Nama Anak', []));
    jumlahSaksi.addEventListener('input', () => renderInputs(saksiWrapper, jumlahSaksi.value, 'nama_saksi', 'Nama Saksi', []));
})();
</script>
@endsection
