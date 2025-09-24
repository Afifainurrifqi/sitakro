<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @page {
            margin: 2cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
        }

        h3,
        p {
            margin: 0;
            padding: 0;
        }

        .text-center {
            text-align: center;
        }

        .judul-surat {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .nomor {
            margin-bottom: 30px;
        }

        .isi {
            text-align: justify;
            margin-bottom: 30px;
        }

        table.data-diri {
            width: 100%;
            margin: 10px 0 20px 0;
        }

        table.data-diri td {
            vertical-align: top;
            padding: 4px;
        }

        .ttd-container {
            width: 100%;
            margin-top: 50px;
            text-align: right;
        }

        .ttd-container p {
            margin: 0;
        }

        .kop-container {
            width: 100%;
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
        }

        .kop-logo {
            width: 130px;
        }

        .kop-header {
            text-align: center;
            line-height: 1.4;
        }

        .kop-garis {
            border: 2px solid black;
            margin-top: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    {{-- KOP SURAT --}}
    <div class="kop-container">
        <table width="100%">
            <tr>
                <td width="15%" align="center">
                    <img src="assets/images/blitar.jpg" class="kop-logo">
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
                    <img src="assets/images/wates.png" class="kop-logo">
                </td>
            </tr>
        </table>
        <hr class="kop-garis">
    </div>

    {{-- JUDUL --}}
    <div class="judul-surat text-center">
        <h3><u>SURAT KETERANGAN KEHILANGAN</u></h3>
    </div>

    <div class="nomor text-center">
        <strong>Nomor : 300 / &nbsp;&nbsp;&nbsp;&nbsp; / 409.41.2 / 2025</strong>
    </div>

    {{-- ISI SURAT --}}
    <div class="isi">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Wates, Kecamatan Wates, Kabupaten Blitar, menerangkan dengan
            sebenarnya bahwa:</p>

        <table class="data-diri">
            <tr>
                <td width="35%">Nama Lengkap</td>
                <td>: {{ $data->nama_pelapor }}</td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>: {{ $data->tempat_lahir_pelapor }} /
                    {{ \Carbon\Carbon::parse($data->tanggal_lahir_pelapor)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $data->jenis_kelamin_pelapor }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $data->nik_pelapor }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $data->agama_pelapor }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: {{ $data->status_pelapor }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $data->pekerjaan_pelapor }}</td>
            </tr>
            <tr>
                <td>Alamat Rumah</td>
                <td>: {{ $data->alamat_pelapor }}</td>
            </tr>
        </table>

        <p>Orang tersebut di atas adalah penduduk Desa Wates, Kecamatan Wates, Kabupaten Blitar yang benar-benar
            kehilangan <strong>{{ $data->jenis_kehilangan }}</strong> atas nama
            <strong>{{ $data->atas_nama }}</strong>. dengan {{ $data->berisi }} telah hilang pada tanggal
            <strong>{{ \Carbon\Carbon::parse($data->tanggal_kehilangan)->translatedFormat('d F Y') }}</strong>, hilang
            saat <strong>{{ $data->hilang_saat }}</strong>.
        </p>

        <p>Demikian surat kehilangan ini dibuat atas dasar yang sebenarnya untuk menjadi periksa dan dapat digunakan
            seperlunya.</p>
    </div>

    {{-- TTD --}}
    <div class="ttd-container">
        <p>Wates, {{ \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y') }}</p>
        <p>Kepala Desa Wates</p>
        <br><br><br>
        <p><strong><u>MOH. HAMID ALMAULUDI S.Pd.I</u></strong></p>
    </div>

</body>

</html>
