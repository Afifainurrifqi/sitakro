<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sitakro - Aplikasi Pertanian">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>Permohonan Pembukaan Rekening</title>
    <link rel="icon" href="{{ asset('assets4/img/core-img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets4/img/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets4/img/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets4/img/icons/icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets4/img/icons/icon-180x180.png') }}">
    <link rel="stylesheet" href="{{ asset('assets4/dist/style.css') }}">
    <link rel="manifest" href="/assets4/dist/manifest.json">
</head>
<body>
<div id="preloader"><div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>
<div class="internet-connection-status" id="internetStatus"></div>

<div class="header-area" id="headerArea">
    <div class="container">
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <div class="back-button"><a href="{{ route('surat.pengajuan_surat') }}"><i class="bi bi-arrow-left-short"></i></a></div>
            <div class="page-heading"><h6 class="mb-0">Permohonan Pembukaan Rekening</h6></div>
            <div class="setting-wrapper"></div>
        </div>
    </div>
</div>

<div class="page-content-wrapper py-3">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('surat.userrekening.store') }}" method="POST">
                    @csrf

                    <div class="element-heading mb-3"><h6>Kepada</h6></div>
                    <div class="mb-3">
                        <label class="form-label" for="kepada_nama_instansi">Nama Instansi</label>
                        <input type="text" class="form-control" id="kepada_nama_instansi" name="kepada_nama_instansi" required
                               value="{{ old('kepada_nama_instansi') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kepada_alamat">Alamat Instansi</label>
                        <textarea class="form-control" id="kepada_alamat" name="kepada_alamat" rows="2" required>{{ old('kepada_alamat') }}</textarea>
                    </div>

                    <hr class="my-4">

                    <div class="element-heading mb-3"><h6>Yang Bertanda Tangan</h6></div>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_nama">Nama</label>
                        <input type="text" class="form-control" id="ybt_nama" name="ybt_nama" required value="{{ old('ybt_nama') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="ybt_jabatan" name="ybt_jabatan" required value="{{ old('ybt_jabatan') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ybt_alamat">Alamat</label>
                        <textarea class="form-control" id="ybt_alamat" name="ybt_alamat" rows="2" required>{{ old('ybt_alamat') }}</textarea>
                    </div>

                    <hr class="my-4">

                    <div class="element-heading mb-3"><h6>Ketentuan</h6></div>
                    <div class="mb-3">
                        <label class="form-label" for="rekening_atas_nama">Rekening Atas Nama</label>
                        <input type="text" class="form-control" id="rekening_atas_nama" name="rekening_atas_nama" required
                               value="{{ old('rekening_atas_nama') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="rekening_alamat">Alamat</label>
                        <textarea class="form-control" id="rekening_alamat" name="rekening_alamat" rows="2" required>{{ old('rekening_alamat') }}</textarea>
                    </div>

                    <hr class="my-4">

                    <div class="element-heading mb-2"><h6>Yang Berwenang</h6></div>
                    <div class="row g-2 align-items-end mb-2">
                        <div class="col-6">
                            <label class="form-label" for="berwenang_jumlah">Jumlah</label>
                            <input type="number" min="0" id="berwenang_jumlah" name="berwenang_jumlah" class="form-control"
                                   value="{{ old('berwenang_jumlah', 0) }}">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody id="berwenang-wrapper"></tbody>
                        </table>
                    </div>

                    <input type="hidden" name="status_surat" value="Pending">
                    <input type="hidden" name="status_verif" value="Belum Verifikasi">

                    <div class="mb-3 mt-3">
                        <label class="form-label" for="nowa">No WhatsApp</label>
                        <input type="text" class="form-control" id="nowa" name="nowa" required value="{{ old('nowa') }}">
                    </div>

                    <div class="text-end mt-4">
                        <button class="btn btn-primary px-4" type="submit">Kirim</button>
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

<script>
(function(){
    const tbody   = document.getElementById('berwenang-wrapper');
    const jumlah  = document.getElementById('berwenang_jumlah');
    const oldNama    = @json(old('berwenang_nama', []));
    const oldJabatan = @json(old('berwenang_jabatan', []));

    const rowHTML = (i, nama, jabatan) => `
        <tr>
            <td><input type="text" name="berwenang_nama[]" class="form-control" placeholder="Nama ${i+1}"
                       value="${nama ? String(nama).replace(/"/g, '&quot;') : ''}"></td>
            <td><input type="text" name="berwenang_jabatan[]" class="form-control" placeholder="Jabatan ${i+1}"
                       value="${jabatan ? String(jabatan).replace(/"/g, '&quot;') : ''}"></td>
        </tr>`;

    function render(n){
        tbody.innerHTML = '';
        const total = parseInt(n || 0, 10);
        for (let i=0;i<total;i++){
            tbody.insertAdjacentHTML('beforeend', rowHTML(i, oldNama[i] || '', oldJabatan[i] || ''));
        }
    }

    render(jumlah.value);
    jumlah.addEventListener('input', () => render(jumlah.value));
})();
</script>
</body>
</html>
