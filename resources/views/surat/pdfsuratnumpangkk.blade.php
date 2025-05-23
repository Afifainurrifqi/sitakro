<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Pernyataan Numpang KK</title>
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
            margin-bottom: 20px;
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
                    <img src="assets/images/blitar.jpg" class="kop-logo" alt="Logo Blitar">
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
                    <img src="assets/images/wates.png" class="kop-logo" alt="Logo Wates">
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
    <div class="nomor text-center">
        <strong>Nomor: 300 / 123 / 409.41.2 / 2025</strong>
    </div>

    <!-- ISI SURAT -->
    <div class="tulisan">Saya yang bertanda tangan di bawah ini:</div>
    <table class="tulisan">
        <tr>
            <td>Nama</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>No. KK</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: ...........................................</td>
        </tr>
    </table>

    <div class="tulisan">
        Selaku Kepala Keluarga, menyatakan tidak keberatan memasukkan orang berikut ke Kartu Keluarga saya:
    </div>
    <table class="tulisan">
        <tr>
            <td>Nama</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>: ...........................................</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: ...........................................</td>
        </tr>
    </table>

    <div class="tulisan">
        Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dan tanpa paksaan dari pihak manapun, untuk dipergunakan sebagaimana mestinya.
    </div>

    <!-- TTD -->
    <div class="ttd-container">
       <p>Wates, {{ \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y') }}</p>
        <p>Kepala Desa Wates</p>
        <br><br><br>
        <p><strong><u>MOH. HAMID ALMAULUDI S.Pd.I</u></strong></p>
    </div>

</body>

</html>
