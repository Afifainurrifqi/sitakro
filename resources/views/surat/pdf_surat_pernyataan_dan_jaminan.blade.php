<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pernyataan dan Jaminan</title>
    <style>
        @page { margin: 2cm; }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            background: #fff;
        }

        h3, p { margin: 0; padding: 0; }

        .text-center { text-align: center; }
        .text-right  { text-align: right; }
        .text-justify{ text-align: justify; }

        .kop-container { width: 100%; }
        .kop-logo { width: 130px; }
        .kop-header { text-align: center; line-height: 1.4; }
        .kop-garis { border: 2px solid #000; margin-top: 5px; margin-bottom: 20px; }

        .judul-surat {
            margin-top: 10px;
            margin-bottom: 6px;
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            font-size: 16pt;
            text-transform: uppercase;
        }

        .nomor {
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .isi { text-align: justify; margin-bottom: 16px; }

        table.data-diri {
            width: 100%;
            margin: 8px 0 14px 0;
            border-collapse: collapse;
        }
        table.data-diri td {
            vertical-align: top;
            padding: 4px 8px;
        }
        table.data-diri td.label  { width: 35%; }
        table.data-diri td.colon  { width: 2%; }
        table.data-diri td.value  { width: 63%; }

        .row-ttd {
            width: 100%;
            margin-top: 32px;
            table-layout: fixed;
        }
        .row-ttd td { vertical-align: top; padding: 0 10px; }

        .blok-ttd { text-align: center; }
        .materai {
            border: 1px dashed #333;
            width: 120px; height: 70px;
            margin: 10px auto 0 auto;
            font-size: 10pt;
            display: flex; align-items: center; justify-content: center;
        }
        .nama-ttd { margin-top: 70px; font-weight: bold; text-decoration: underline; }
        .hint { font-size: 10pt; color: #333; }
    </style>
</head>
<body>
@php
    use Carbon\Carbon;

    $fmt = function ($tgl) {
        try {
            return $tgl ? Carbon::parse($tgl)->locale('id')->translatedFormat('d F Y') : null;
        } catch (\Throwable $e) {
            return $tgl;
        }
    };

    // Nomor surat opsional (kalau ada kolomnya)
    $nomor = data_get($data, 'nomor_surat') ?? data_get($data, 'nomor');

    // Lokasi & tanggal terbit
    $kota   = data_get($data, 'kota_terbit', 'Wates');
    $tglNow = Carbon::now('Asia/Jakarta')->translatedFormat('d F Y');

    // Pejabat penandatangan (bisa diisi via controller/model)
    $namaPejabat = data_get($data, 'nama_pejabat', 'MOH. HAMID ALMAULUDI S.Pd.I');
    $jabatan     = data_get($data, 'jabatan_pejabat', 'Kepala Desa Wates');

    // Pembuat pernyataan (penjamin)
    $pNama   = data_get($data, 'nama_pembuat', '................................................');
    $pNik    = data_get($data, 'nik_pembuat', '................................................');
    $pAlamat = data_get($data, 'alamat_pembuat', '................................................');

    // Pihak yang dijamin
    $tNama   = data_get($data, 'nama_terjamin', '................................................');
    $tNik    = data_get($data, 'nik_terjamin', '................................................');
    $tAlamat = data_get($data, 'alamat_terjamin', '................................................');

    // Detail pernyataan/jaminan
    $hubungan      = data_get($data, 'hubungan_dengan_terjamin', '................................................');
    $uraian        = data_get($data, 'uraian_pernyataan', null);
    $bentukJaminan = data_get($data, 'bentuk_jaminan', null);
    $mulai         = $fmt(data_get($data, 'berlaku_mulai'));
    $sampai        = $fmt(data_get($data, 'berlaku_sampai'));
    $berdasarkan   = data_get($data, 'berdasarkan', null);
@endphp

    {{-- KOP SURAT --}}
    <div class="kop-container">
        <table width="100%">
            <tr>
                <td width="15%" align="center">
                    <img src="{{ public_path('assets/images/blitar.jpg') }}" class="kop-logo" alt="Logo Kiri">
                </td>
                <td class="kop-header">
                    <strong>PEMERINTAH KABUPATEN BLITAR<br>
                        KECAMATAN WATES<br>
                        KANTOR KEPALA DESA WATES</strong><br>
                    <small>
                        Jln. Merdeka No. 74 Telp. 082139324445<br>
                        Email: watesberkelas@gmail.com | Website: wates-blitarkab.desa.id
                    </small>
                </td>
                <td width="15%" align="center">
                    <img src="{{ public_path('assets/images/wates.png') }}" class="kop-logo" alt="Logo Kanan">
                </td>
            </tr>
        </table>
        <hr class="kop-garis">
    </div>

    {{-- JUDUL --}}
    <div class="judul-surat">SURAT PERNYATAAN DAN JAMINAN</div>
    @if(!empty($nomor))
        <div class="nomor">Nomor : {{ $nomor }}</div>
    @endif

    {{-- PEMBUKA --}}
    <div class="isi">
        <p>Yang bertanda tangan di bawah ini:</p>
    </div>

    {{-- IDENTITAS PENJAMIN --}}
    <table class="data-diri">
        <tr><td class="label">Nama</td><td class="colon">:</td><td class="value">{{ $pNama }}</td></tr>
        <tr><td class="label">NIK</td><td class="colon">:</td><td class="value">{{ $pNik }}</td></tr>
        <tr><td class="label">Alamat</td><td class="colon">:</td><td class="value">{{ $pAlamat }}</td></tr>
    </table>

    <div class="isi"><p>Dengan ini menyatakan dan menjamin bahwa:</p></div>

    {{-- IDENTITAS TERJAMIN --}}
    <table class="data-diri">
        <tr><td class="label">Nama</td><td class="colon">:</td><td class="value">{{ $tNama }}</td></tr>
        <tr><td class="label">NIK</td><td class="colon">:</td><td class="value">{{ $tNik }}</td></tr>
        <tr><td class="label">Alamat</td><td class="colon">:</td><td class="value">{{ $tAlamat }}</td></tr>
        <tr><td class="label">Hubungan dengan Penjamin</td><td class="colon">:</td><td class="value">{{ $hubungan }}</td></tr>
    </table>

    {{-- URAIAN PERNYATAAN / BENTUK JAMINAN --}}
    @if($uraian)
        <div class="isi"><p><strong>Uraian Pernyataan:</strong><br>{!! nl2br(e($uraian)) !!}</p></div>
    @endif

    @if($bentukJaminan)
        <div class="isi"><p><strong>Bentuk Jaminan:</strong> {{ $bentukJaminan }}</p></div>
    @endif

    {{-- MASA BERLAKU --}}
    @if($mulai || $sampai)
        <div class="isi">
            <p><strong>Masa Berlaku:</strong>
                @if($mulai && $sampai)
                    {{ $mulai }} s.d. {{ $sampai }}
                @elseif($mulai && !$sampai)
                    {{ $mulai }} s.d. selesai
                @else
                    s.d. {{ $sampai }}
                @endif
            </p>
        </div>
    @endif

    {{-- BERDASARKAN (opsional) --}}
    @if($berdasarkan)
        <div class="isi">
            <p><em>Berdasarkan:</em> {{ $berdasarkan }}.</p>
        </div>
    @endif

    {{-- PENUTUP --}}
    <div class="isi">
        <p>Demikian surat pernyataan dan jaminan ini saya buat dengan sebenar-benarnya. Apabila di kemudian hari ternyata
           terdapat ketidakbenaran, saya bersedia mempertanggungjawabkan sesuai ketentuan peraturan perundang-undangan
           yang berlaku.</p>
    </div>

    {{-- TANDA TANGAN (Penjamin & Pejabat) --}}
    <table class="row-ttd">
        <tr>
            <td class="blok-ttd" style="width:50%;">
                <div>{{ $kota }}, {{ $tglNow }}</div>
                <div><strong>Yang Membuat Pernyataan / Penjamin</strong></div>
                <div class="materai">Materai Rp10.000</div>
                <div class="nama-ttd">{{ $pNama }}</div>
                <div class="hint">NIK: {{ $pNik }}</div>
            </td>
            <td class="blok-ttd" style="width:50%;">
                <div>&nbsp;</div>
                <div><strong>{{ $jabatan }}</strong></div>
                <br><br><br>
                <div class="nama-ttd">{{ $namaPejabat }}</div>
            </td>
        </tr>
    </table>
</body>
</html>
