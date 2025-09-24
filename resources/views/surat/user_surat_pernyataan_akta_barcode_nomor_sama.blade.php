<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sitakro - Pernyataan Akta Barcode Nomor Sama</title>
  <link rel="icon" href="{{ asset('assets4/img/core-img/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('assets4/dist/style.css') }}">
  <link rel="manifest" href="/assets4/dist/manifest.json">
</head>
<body>
  <div id="preloader">
    <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
  </div>

  <div class="internet-connection-status" id="internetStatus"></div>

  <div class="header-area" id="headerArea">
    <div class="container">
      <div class="header-content position-relative d-flex align-items-center justify-content-between">
        <div class="back-button">
          <a href="{{ route('surat.pengajuan_surat') }}"><i class="bi bi-arrow-left-short"></i></a>
        </div>
        <div class="page-heading">
          <h6 class="mb-0">Pernyataan Akta Barcode Nomor Sama</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="page-content-wrapper py-3">
    <div class="container">
      <div class="element-heading"><h6>Form Pernyataan Akta Barcode Nomor Sama</h6></div>

      <div class="card shadow-sm">
        <div class="card-body">
          <form action="{{ route('surat.useraktabarcode.store') }}" method="POST">
            @csrf

            <h5 class="mb-3">Data Pemohon</h5>
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
            </div>

            <hr class="my-4">

            <h5 class="mb-3">Detail Akta</h5>
            <div class="mb-3">
              <label class="form-label">Nama Dalam Akta</label>
              <input type="text" name="nama_dalam_akta" class="form-control" value="{{ old('nama_dalam_akta') }}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">No. Akta</label>
              <input type="text" name="no_akta" class="form-control" value="{{ old('no_akta') }}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor</label>
              <input type="text" name="nomor" class="form-control" value="{{ old('nomor') }}" required>
            </div>

            {{-- Hidden default status untuk USER --}}
            <input type="hidden" name="status_surat" value="Pending">
            <input type="hidden" name="status_verif" value="Belum Verifikasi">

            <div class="mb-3">
              <label class="form-label" for="nowa">No WhatsApp</label>
              <input type="text" id="nowa" name="nowa" class="form-control" value="{{ old('nowa') }}" required>
            </div>

            <div class="text-end mt-3">
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
          <li class="active">
            <a href="{{ route('surat.pengajuan_surat') }}">
              <i class="bi bi-house"></i><span>Beranda</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets4/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets4/dist/js/active.js') }}"></script>
</body>
</html>
