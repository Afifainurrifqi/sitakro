<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        @page {
            margin: 2cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            background: #fff;
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
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            font-size: 16pt;
        }

        .nomor {
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
        }

        .isi {
            text-align: justify;
            margin-bottom: 30px;
        }

        table.data-diri {
            width: 100%;
            margin: 10px 0 20px 0;
            border-collapse: collapse;
        }

        table.data-diri td {
            vertical-align: top;
            padding: 4px 8px;
        }

        .ttd-container {
            width: 100%;
            margin-top: 50px;
            text-align: right;
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
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
                    <img src="{{ public_path('assets/images/blitar.jpg') }}" class="kop-logo" alt="Logo Blitar">
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
                <img src="{{ public_path('assets/images/wates.png') }}" class="kop-logo" alt="Logo Wates">
                </td>
            </tr>
        </table>
        <hr class="kop-garis">
    </div>

    {{-- JUDUL SURAT --}}
    <div class="judul-surat">
        SURAT KETERANGAN TIDAK MAMPU
    </div>

    <div class="nomor">
        Nomor : 475 / &nbsp;&nbsp;&nbsp;&nbsp;/ 409.41.2 / {{ \Carbon\Carbon::now()->year }}
    </div>

    {{-- ISI SURAT --}}
    <div class="isi">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Wates, Kecamatan Wates, Kabupaten Blitar, menerangkan dengan sebenarnya bahwa :</p>

        <table class="data-diri">
            <tr>
                <td width="35%">Nama Lengkap</td>
                <td>: {{ $data->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $data->nik }}</td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>: {{ $data->tempat_lahir }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>: {{ $data->kewarganegaraan }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $data->agama }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: {{ $data->status_perkawinan }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $data->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat Rumah</td>
                <td>: {{ $data->alamat_rumah }}</td>
            </tr>
        </table>

        <p>
            Orang tersebut di atas benar-benar penduduk Desa Wates Kecamatan Wates Kabupaten Blitar dan yang bersangkutan tergolong keluarga yang tidak mampu.
            Surat keterangan ini diberikan untuk kelengkapan <strong>{{ $data->keterangan_fungsi_surat }}</strong>.
        </p>

        <p>
            Demikian surat keterangan ini dibuat atas dasar yang sebenarnya untuk menjadikan periksa dan dapat dipergunakan sebagaimana perlunya.
        </p>
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
