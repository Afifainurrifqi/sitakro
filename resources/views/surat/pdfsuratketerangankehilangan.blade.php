<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @page { margin: 2cm; }
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5; color: #000; }
        h3, p { margin: 0; padding: 0; }
        .text-center { text-align: center; }
        .judul-surat { margin-top: 20px; margin-bottom: 10px; }
        .nomor { margin-bottom: 30px; text-align:center; font-weight:bold; }
        .isi { text-align: justify; margin-bottom: 30px; }
        table.data-diri { width: 100%; margin: 10px 0 20px 0; border-collapse: collapse; }
        table.data-diri td { vertical-align: top; padding: 4px 6px; }
        .kop-container { width: 100%; font-size: 12pt; }
        .kop-logo { width: 130px; }
        .kop-header { text-align: center; line-height: 1.4; }
        .kop-garis { border: 2px solid black; margin-top: 5px; margin-bottom: 20px; }
        .ttd-container { width: 100%; margin-top: 40px; text-align: right; }
        .ttd-container p { margin: 0; }
    </style>
</head>
<body>
@php
    use Carbon\Carbon;

    $safeDate = function($tgl) {
        try {
            return $tgl ? Carbon::parse($tgl)->locale('id')->translatedFormat('d F Y') : null;
        } catch (\Throwable $e) {
            return $tgl;
        }
    };

    // Nomor: pakai yang tersimpan; jika belum ada, fallback dari nomor_urut/tahun_nomor dengan prefix 430
    $nomorCetak = $data->nomor_surat ?? null;
    if (!$nomorCetak) {
        $urut  = $data->nomor_urut ?? null;
        $tahun = $data->tahun_nomor ?? now('Asia/Jakarta')->year;
        $nnn   = $urut ? str_pad($urut, 3, '0', STR_PAD_LEFT) : '---';
        $nomorCetak = "430 / {$nnn} / 409.41.2 / {$tahun}";
    }
@endphp

    {{-- KOP SURAT --}}
    <div class="kop-container">
        <table width="100%">
            <tr>
                <td width="15%" align="center">
                    <img src="{{ public_path('assets/images/blitar.jpg') }}" class="kop-logo" alt="Logo Blitar">
                </td>
                <td class="kop-header">
                    <strong>PEMERINTAH KABUPATEN BLITAR<br>
                        KECAMATAN Sawentar<br>
                        KANTOR KEPALA DESA Sawentar</strong><br>
                    <small>
                        Jln. Merdeka No. 74 Telp. 082139324445<br>
                        Email: Sawentarberkelas@gmail.com | Website: Sawentar-blitarkab.desa.id
                    </small>
                </td>
                <td width="15%" align="center">
                    <img src="{{ public_path('assets/images/Sawentar.png') }}" class="kop-logo" alt="Logo Sawentar">
                </td>
            </tr>
        </table>
        <hr class="kop-garis">
    </div>

    {{-- JUDUL --}}
    <div class="judul-surat text-center">
        <h3><u>SURAT KETERANGAN KEHILANGAN</u></h3>
    </div>

    {{-- NOMOR --}}
    <div class="nomor">
        Nomor : {{ $nomorCetak }}
    </div>

    {{-- ISI --}}
    <div class="isi">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Sawentar, Kecamatan Sawentar, Kabupaten Blitar, menerangkan dengan sebenarnya bahwa:</p>

        <table class="data-diri">
            <tr><td width="35%">Nama Lengkap</td><td>: {{ $data->nama_pelapor }}</td></tr>
            <tr><td>Tempat, Tanggal Lahir</td><td>: {{ $data->tempat_lahir_pelapor }} / {{ $safeDate($data->tanggal_lahir_pelapor) }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>: {{ $data->jenis_kelamin_pelapor }}</td></tr>
            <tr><td>NIK</td><td>: {{ $data->nik_pelapor }}</td></tr>
            <tr><td>Agama</td><td>: {{ $data->agama_pelapor }}</td></tr>
            <tr><td>Status</td><td>: {{ $data->status_pelapor }}</td></tr>
            <tr><td>Pekerjaan</td><td>: {{ $data->pekerjaan_pelapor }}</td></tr>
            <tr><td>Alamat Rumah</td><td>: {{ $data->alamat_pelapor }}</td></tr>
        </table>

        <p>
            Yang bersangkutan telah kehilangan <strong>{{ $data->jenis_kehilangan }}</strong> atas nama
            <strong>{{ $data->atas_nama }}</strong> dengan keterangan {{ $data->berisi }} pada tanggal
            <strong>{{ $safeDate($data->tanggal_kehilangan) }}</strong>, hilang saat <strong>{{ $data->hilang_saat }}</strong>.
        </p>

        <p>Demikian surat keterangan kehilangan ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>
    </div>

    {{-- TTD --}}
    <div class="ttd-container">
        <p>Sawentar, {{ now('Asia/Jakarta')->translatedFormat('d F Y') }}</p>
        <p>Kepala Desa Sawentar</p>
        <br><br><br>
        <p><strong><u>MOH. HAMID ALMAULUDI S.Pd.I</u></strong></p>
    </div>
</body>
</html>
