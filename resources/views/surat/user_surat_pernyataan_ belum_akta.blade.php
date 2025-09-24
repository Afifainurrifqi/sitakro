<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pernyataan Belum Pernah Mengurus Akta Kelahiran</title>
    <link rel="icon" href="{{ asset('assets4/img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets4/dist/style.css') }}">
</head>
<body>
<div id="preloader"><div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>
<div class="internet-connection-status" id="internetStatus"></div>

<div class="header-area" id="headerArea">
    <div class="container">
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <div class="back-button"><a href="{{ route('surat.pengajuan_surat') }}"><i class="bi bi-arrow-left-short"></i></a></div>
            <div class="page-heading"><h6 class="mb-0">Pernyataan Belum Mengurus Akta</h6></div>
            <div class="setting-wrapper"></div>
        </div>
    </div>
</div>

<div class="page-content-wrapper py-3">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('surat.userbelumakta.store') }}" method="POST">
                    @csrf

                    <div class="element-heading mb-2"><h6>Yang Bertandatangan</h6></div>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_nama">Nama</label>
                        <input id="ybt_nama" name="ybt_nama" type="text" class="form-control" required value="{{ old('ybt_nama') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_nik">NIK</label>
                        <input id="ybt_nik" name="ybt_nik" type="text" class="form-control" required value="{{ old('ybt_nik') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_alamat">Alamat</label>
                        <textarea id="ybt_alamat" name="ybt_alamat" class="form-control" rows="2" required>{{ old('ybt_alamat') }}</textarea>
                    </div>

                    <hr class="my-4">

                    <div class="element-heading mb-2"><h6>Menyatakan Bahwa</h6></div>
                    <div class="mb-3">
                        <label class="form-label" for="subjek_nama">Nama</label>
                        <input id="subjek_nama" name="subjek_nama" type="text" class="form-control" required value="{{ old('subjek_nama') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subjek_tempat_lahir">Tempat Lahir</label>
                        <input id="subjek_tempat_lahir" name="subjek_tempat_lahir" type="text" class="form-control" required value="{{ old('subjek_tempat_lahir') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subjek_tanggal_lahir">Tanggal Lahir</label>
                        <input id="subjek_tanggal_lahir" name="subjek_tanggal_lahir" type="date" class="form-control" required value="{{ old('subjek_tanggal_lahir') }}">
                    </div>

                    <input type="hidden" name="status_surat" value="Pending">
                    <input type="hidden" name="status_verif" value="Belum Verifikasi">

                    <div class="mb-3">
                        <label class="form-label" for="nowa">No WhatsApp</label>
                        <input id="nowa" name="nowa" type="text" class="form-control" required value="{{ old('nowa') }}">
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
