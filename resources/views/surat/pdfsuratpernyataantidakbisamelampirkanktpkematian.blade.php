<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Surat Pernyataan Tidak Bisa Melampirkan KTP</title>
    <style>
        @page {
            size: A4;
            margin: 2cm 2cm 2cm 2cm;
        }
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .rangkasurat {
            background-color: #fff;
            padding: 10px 15px;
            /* Hapus border */
            /* border: 1px solid #000; */
            width: 100%;
            box-sizing: border-box;
        }
        .tengah {
            text-align: center;
        }
        .tulisan {
            font-size: 12pt;
        }
        .tulisan-justify {
            text-align: justify;
        }
        table {
            width: 100%;
            margin: 10px 0;
            border-collapse: collapse;
        }
        td {
            vertical-align: top;
            padding-bottom: 6px;
        }
        .ttd {
            margin-top: 30px;
            text-align: right;
        }
        .ttd-space {
            height: 60px;
        }
        h3 {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="rangkasurat">
        <div class="tengah">
            <h3><u>SURAT PERNYATAAN</u></h3>
        </div>

        <p class="tulisan tulisan-justify">Yang bertanda tangan di bawah ini, saya:</p>

        <table class="tulisan">
            <tr><td style="width: 35%;">Nama</td><td>: {{ $data->nama_pelapor }}</td></tr>
            <tr><td>NIK</td><td>: {{ $data->nik_pelapor }}</td></tr>
            <tr><td>Tempat, Tanggal Lahir</td><td>: {{ $data->tempat_lahir_pelapor }}, {{ $data->tanggal_lahir_pelapor }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>: {{ $data->jenis_kelamin_pelapor }}</td></tr>
            <tr><td>Pekerjaan</td><td>: {{ $data->pekerjaan_pelapor }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $data->alamat_pelapor }}</td></tr>
        </table>

        <p class="tulisan tulisan-justify">
            Menyatakan dengan sebenarnya bahwa tidak bisa melampirkan KTP termohon yang akan digunakan untuk pengurusan Akta Kematian dikarenakan <strong>{{ $data->alasan }}</strong> atas nama:
        </p>

        <table class="tulisan">
            <tr><td style="width: 35%;">NIK</td><td>: {{ $data->nik_jenazah }}</td></tr>
            <tr><td>Nama / Tgl Lahir</td><td>: {{ $data->nama_jenazah }} / {{ $data->tanggal_lahir_jenazah }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>: {{ $data->jenis_kelamin_jenazah }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $data->alamat_jenazah }}</td></tr>
        </table>

        <p class="tulisan tulisan-justify">
            Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dan apabila dikemudian hari ternyata pernyataan saya tidak benar, maka saya bersedia diproses secara hukum sesuai peraturan perundang-undangan yang berlaku, dan dokumen yang diterbitkan dari pernyataan ini menjadi tidak sah.
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
