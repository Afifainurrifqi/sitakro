@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-lg-12 mx-auto">
      {{-- Flash / Error --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <div class="fw-bold mb-1">Terjadi kesalahan:</div>
          <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Form Pernyataan Beda Nama Buku Nikah</h5>
        </div>

        <div class="card-body">
          <form action="{{ route('surat.bedanama.store') }}" method="POST" novalidate>
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label" for="nama">Nama</label>
              <input type="text" id="nama" name="nama" class="form-control" required
                     value="{{ old('nama') }}">
            </div>

            {{-- NIK --}}
            <div class="mb-3">
              <label class="form-label" for="nik">NIK</label>
              <input type="text" id="nik" name="nik" class="form-control" required
                     value="{{ old('nik') }}">
            </div>

            {{-- Tempat / Tanggal Lahir (single column top-down) --}}
            <div class="mb-3">
              <label class="form-label" for="ttl_tempat">Tempat Lahir</label>
              <input type="text" id="ttl_tempat" name="ttl_tempat" class="form-control" required
                     value="{{ old('ttl_tempat') }}">
            </div>
            <div class="mb-3">
              <label class="form-label" for="ttl_tanggal">Tanggal Lahir</label>
              <input type="date" id="ttl_tanggal" name="ttl_tanggal" class="form-control" required
                     value="{{ old('ttl_tanggal') }}">
            </div>

            {{-- Pekerjaan --}}
            <div class="mb-3">
              <label class="form-label" for="pekerjaan">Pekerjaan</label>
              <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                <option value="">-- Pilih pekerjaan --</option>
                @php
                  $jobs = [
                    'BELUM/TIDAK BEKERJA','PELAJAR/MAHASISWA','TIDAK/BELUM SEKOLAH','KARYAWAN SWASTA','IBU RUMAH TANGGA',
                    'WIRASWASTA','TENTARA NASIONAL INDONESIA (TNI)','KEPOLISIAN RI (POLRI)','DOSEN','GURU',
                    'Guru agama_penumpang_kk','KEPALA DESA','PERANGKAT DESA','Pegawai Kantor Desa','BIDAN','DOKTER','PERAWAT',
                    'PETANI/PEKEBUN PEMILIK LAHAN','BURUH TANI/PERKEBUNAN','PEDAGANG','PEGAWAI NEGERI SIPIL (PNS)',
                    'BURUH HARIAN LEPAS','SOPIR','KARYAWAN BUMN','PENSIUNAN','PEMBANTU RUMAH TANGGA','BURUH PETERNAKAN',
                    'KONSTRUKSI','PELAUT','NELAYAN/PERIKANAN','KARYAWAN HONORER','PETERNAK','MEKANIK','PENATA RIAS',
                    'TUKANG LAS/PANDAI BESI','INDUSTRI','USTADZ/MUBALIGH','TABIB','BURUH NELAYAN/PERIKANAN',
                    'JURU MASAK','SENIMAN','AKUNTAN','Petani/Pekebun penyewa','TKI','Lainnya',
                  ];
                @endphp
                @foreach ($jobs as $job)
                  <option value="{{ $job }}" {{ old('pekerjaan') == $job ? 'selected' : '' }}>
                    {{ $job }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
              <label class="form-label" for="alamat">Alamat</label>
              <textarea id="alamat" name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
            </div>

            {{-- Nama Yang Sesuai --}}
            <div class="mb-3">
              <label class="form-label" for="nama_sesuai">Nama Yang Sesuai</label>
              <input type="text" id="nama_sesuai" name="nama_sesuai" class="form-control" required
                     value="{{ old('nama_sesuai') }}">
            </div>

            {{-- Sumber Data Nama --}}
            <div class="mb-3">
              <label class="form-label" for="sumber_data_nama">Sumber data Nama</label>
              <input type="text" id="sumber_data_nama" name="sumber_data_nama" class="form-control"
                     placeholder="Buku Nikah/KTP/KK" required value="{{ old('sumber_data_nama') }}">
            </div>


              <div class="mb-3">
              <label class="form-label">Status Surat</label>
              <select name="status_surat" class="form-control">
                @foreach (['Pending','Di cek','Di terima','Ditolak'] as $st)
                  <option value="{{ $st }}" {{ old('status_surat', $surat->status_surat ?? 'Pending') === $st ? 'selected' : '' }}>
                    {{ $st }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Status Verifikasi --}}
            <div class="mb-3">
              <label class="form-label">Status Verifikasi</label>
              <select name="status_verif" class="form-control">
                @foreach (['Belum Verifikasi','Terverifikasi'] as $sv)
                  <option value="{{ $sv }}" {{ old('status_verif', $surat->status_verif ?? 'Belum Verifikasi') === $sv ? 'selected' : '' }}>
                    {{ $sv }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- No WhatsApp --}}
            <div class="mb-3">
              <label class="form-label" for="nowa">No WhatsApp</label>
              <input type="text" id="nowa" name="nowa" class="form-control" required
                     value="{{ old('nowa') }}">
            </div>



            <div class="text-end">
              <button class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
