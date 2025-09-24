<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pernyataan Beda Nama Buku Nikah</title>
  <link rel="stylesheet" href="{{ asset('assets4/dist/style.css') }}">
</head>
<body>
<div id="preloader"><div class="spinner-grow text-primary" role="status"></div></div>
<div class="header-area" id="headerArea">
  <div class="container">
    <div class="header-content header-style-five d-flex align-items-center justify-content-between">
      <div class="back-button"><a href="{{ route('surat.pengajuan_surat') }}"><i class="bi bi-arrow-left-short"></i></a></div>
      <div class="page-heading"><h6 class="mb-0">Pernyataan Beda Nama Buku Nikah</h6></div>
      <div class="setting-wrapper"></div>
    </div>
  </div>
</div>

<div class="page-content-wrapper py-3">
  <div class="container">
    <div class="card shadow-sm">
      <div class="card-body">
        <form method="POST" action="{{ route('surat.userbedanama.store') }}">
          @csrf

          <h6 class="mb-2">Data Pemohon</h6>
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tempat/Tanggal Lahir</label>
            <div class="row g-2">
              <div class="col-6"><input type="text" name="ttl_tempat" class="form-control" placeholder="Tempat" value="{{ old('ttl_tempat') }}" required></div>
              <div class="col-6"><input type="date" name="ttl_tanggal" class="form-control" value="{{ old('ttl_tanggal') }}" required></div>
            </div>
          </div>
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
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
          </div>

          <hr class="my-3">

          <h6 class="mb-2">Kesesuaian Nama</h6>
          <div class="mb-3">
            <label class="form-label">Nama Yang Sesuai</label>
            <input type="text" name="nama_sesuai" class="form-control" value="{{ old('nama_sesuai') }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Sumber data Nama</label>
            <input type="text" name="sumber_data_nama" class="form-control" placeholder="contoh: Buku Nikah, KTP, KK" value="{{ old('sumber_data_nama') }}" required>
          </div>

          <input type="hidden" name="status_surat" value="Pending">
          <input type="hidden" name="status_verif" value="Belum Verifikasi">
          <div class="mb-3">
            <label class="form-label">No WhatsApp</label>
            <input type="text" name="nowa" class="form-control" value="{{ old('nowa') }}" required>
          </div>

          <div class="text-end"><button class="btn btn-primary px-4" type="submit">Kirim</button></div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="footer-nav-area" id="footerNav">
  <div class="container px-0">
    <div class="footer-nav position-relative">
      <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
        <li class="active"><a href="{{ route('surat.pengajuan_surat') }}"><i class="bi bi-house"></i><span>Beranda</span></a></li>
      </ul>
    </div>
  </div>
</div>

<script src="{{ asset('assets4/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets4/dist/js/active.js') }}"></script>
</body>
</html>
