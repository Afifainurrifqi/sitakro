<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Surat Pernyataan Tidak Bisa Melampirkan KTP</title>
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
            text-align: center;
            font-weight: bold;
        }

        .tulisan {
            text-align: justify;
            margin-bottom: 10px;
        }

        table.tulisan {
            width: 100%;
            margin: 0 0 15px 0;
            border-collapse: collapse;
        }

        table.tulisan td {
            vertical-align: top;
            padding: 2px 8px;
        }

        table.tulisan td:first-child {
            width: 180px;
            font-weight: bold;
        }

        .ttd-container {
            width: 100%;
            margin-top: 40px;
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

    <!-- KOP SURAT -->
    <div class="kop-container">
        <table width="100%">
            <tr>
                <td width="15%" align="center">
                    <img src="{{ public_path('assets/images/blitar.jpg') }}" class="kop-logo" alt="Logo Blitar">
                </td>
                <td class="kop-header">
                    <strong>
                        PEMERINTAH KABUPATEN BLITAR<br>
                        KECAMATAN WATES<br>
                        KANTOR KEPALA DESA WATES
                    </strong><br>
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

    <!-- JUDUL SURAT -->
    <div class="judul-surat text-center">
        <h3><u>SURAT PERNYATAAN</u></h3>
    </div>

    <!-- NOMOR SURAT -->
    <div class="nomor">
        Nomor: 300 / 123 / 409.41.2 / {{ \Carbon\Carbon::now('Asia/Jakarta')->year }}
    </div>

    <!-- ISI SURAT -->
    <div class="tulisan">Yang bertanda tangan di bawah ini, saya:</div>

    <table class="tulisan">
        <tr>
            <td>Nama</td>
            <td>: {{ $data->nama_pelapor }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $data->nik_pelapor }}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $data->tempat_lahir_pelapor }},
                {{ \Carbon\Carbon::parse($data->tanggal_lahir_pelapor)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $data->jenis_kelamin_pelapor }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $data->pekerjaan_pelapor }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $data->alamat_pelapor }}</td>
        </tr>
    </table>

    <p class="tulisan">
        Menyatakan dengan sebenarnya bahwa tidak bisa melampirkan KTP termohon yang akan digunakan untuk pengurusan Akta
        Kematian dikarenakan <strong>{{ $data->alasan }}</strong> atas nama:
    </p>

    <table class="tulisan">
        <tr>
            <td>NIK</td>
            <td>: {{ $data->nik_jenazah }}</td>
        </tr>
        <tr>
            <td>Nama / Tgl Lahir</td>
            <td>: {{ $data->nama_jenazah }} /
                {{ \Carbon\Carbon::parse($data->tanggal_lahir_jenazah)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $data->jenis_kelamin_jenazah }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $data->alamat_jenazah }}</td>
        </tr>
    </table>

    <p class="tulisan">
        Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dan apabila dikemudian hari ternyata pernyataan
        saya tidak benar, maka saya bersedia diproses secara hukum sesuai peraturan perundang-undangan yang berlaku, dan
        dokumen yang diterbitkan dari pernyataan ini menjadi tidak sah.
    </p>

    <!-- TTD -->
    <div class="ttd-container">
        <p>Wates, {{ \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y') }}</p>
        <p>Kepala Desa Wates</p>
        <br><br><br>
        <p><strong><u>MOH. HAMID ALMAULUDI S.Pd.I</u></strong></p>
    </div>

</body>

</html>
