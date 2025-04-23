<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Pernyataan Tidak Bisa Melampirkan KTP</title>
    <style>
        /* Definisi ukuran kertas F4 dan tanpa margin */
        @page {
            size: 215mm 330mm portrait;
            margin: 0;
        }
        /* Reset margin/padding body */
        body {
            margin: 0;
            padding: 0;
        }
        /* Container surat tepat berukuran F4 minus 20 mm tepi printer */
        .rangkasurat {
            width: 175mm;            /* 215mm - 2×20mm margin */
            height: 290mm;           /* 330mm - 2×20mm margin */
            margin: 20mm auto;       /* 20mm dari tepi atas/bawah, center horizontal */
            padding: 15mm;           /* ruang dalam kotak */
            border: 1px solid #000;
            background-color: #fff;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.8;
        }
        .tengah {
            text-align: center;
        }
        .tulisan-justify {
            text-align: justify;
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        td {
            vertical-align: top;
            padding: 2px 0;
        }
        .ttd {
            margin-top: 30px;
            text-align: right;
        }
        .ttd-space {
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="rangkasurat">
        <div class="tengah">
            <h3><u>SURAT PERNYATAAN</u></h3>
        </div>

        <p class="tulisan-justify">
            Yang bertanda tangan di bawah ini, saya:
        </p>

        <table>
            <tr>
                <td width="35%">Nama</td>
                <td>: {{ $data->nama_pelapor }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $data->nik_pelapor }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>: {{ $data->tempat_lahir_pelapor }}, {{ $data->tanggal_lahir_pelapor }}</td>
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

        <p class="tulisan-justify" style="margin-top: 15px;">
            Menyatakan dengan sebenarnya bahwa tidak bisa melampirkan KTP termohon yang akan digunakan untuk pengurusan
            Akta Kematian dikarenakan <strong>{{ $data->alasan }}</strong> atas nama:
        </p>

        <table>
            <tr>
                <td width="35%">NIK</td>
                <td>: {{ $data->nik_jenazah }}</td>
            </tr>
            <tr>
                <td>Nama / Tgl Lahir</td>
                <td>: {{ $data->nama_jenazah }} / {{ $data->tanggal_lahir_jenazah }}</td>
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

        <p class="tulisan-justify" style="margin-top: 15px;">
            Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dan apabila di kemudian hari ternyata
            pernyataan saya tidak benar, maka saya bersedia diproses secara hukum sesuai peraturan perundang-undangan yang berlaku.
        </p>

        <div class="ttd">
            <p>Blitar, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p>Yang membuat pernyataan,</p>
            <div class="ttd-space"></div>
            <p><u>{{ $data->nama_pelapor }}</u></p>
        </div>
    </div>
</body>
</html>
