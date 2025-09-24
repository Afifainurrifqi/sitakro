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
           <form action="{{ route('surat.useranakseorangibu.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Anak Kandung</label>
                            <input type="text" name="nama_anak" class="form-control" value="{{ old('nama_anak') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                value="{{ old('tempat_lahir') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ old('tanggal_lahir') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No WhatsApp</label>
                            <input type="text" name="nowa" class="form-control" value="{{ old('nowa') }}"
                                required>
                        </div>

                        {{-- default status hidden utk user --}}
                        <input type="hidden" name="status_surat" value="Pending">
                        <input type="hidden" name="status_verif" value="Belum Verifikasi">

                        <div class="text-end">
                            <button class="btn btn-primary px-4">Kirim</button>
                        </div>
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
