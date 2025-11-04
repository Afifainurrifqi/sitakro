<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Desa Pernah Menikah</title>
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

        .kop-container { width: 100%; font-family: 'Times New Roman', Times, serif; font-size: 12pt; }
        .kop-logo { width: 130px; }
        .kop-header { text-align: center; line-height: 1.4; }
        .kop-garis { border: 2px solid #000; margin-top: 5px; margin-bottom: 20px; }

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

        .isi { text-align: justify; margin-bottom: 30px; }

        table.data-diri {
            width: 100%;
            margin: 10px 0 20px 0;
            border-collapse: collapse;
        }
        table.data-diri td {
            vertical-align: top;
            padding: 4px 8px;
        }
        table.data-diri td.label { width: 35%; }
        table.data-diri td.colon { width: 2%; }
        table.data-diri td.value { width: 63%; }

        .ttd-container {
            width: 100%;
            margin-top: 50px;
            text-align: right;
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
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
                        KECAMATAN Kemirigede<br>
                        KANTOR KEPALA DESA Kemirigede</strong><br>
                    <small>
                        Jln. Merdeka No. 74 Telp. 082139324445<br>
                        Email: Kemirigedeberkelas@gmail.com | Website: Kemirigede-blitarkab.desa.id
                    </small>
                </td>
                <td width="15%" align="center">
                    <img src="{{ public_path('assets/images/Kemirigede.png') }}" class="kop-logo" alt="Logo Kemirigede">
                </td>
            </tr>
        </table>
        <hr class="kop-garis">
    </div>

    {{-- JUDUL --}}
    <div class="judul-surat">SURAT KETERANGAN DESA PERNAH MENIKAH</div>

    {{-- NOMOR SURAT (silakan sesuaikan format kalau kamu pakai auto-number) --}}
    <div class="nomor">
        Nomor : 470 / &nbsp;&nbsp;&nbsp;&nbsp;/ 409.41.2 / {{ \Carbon\Carbon::now()->year }}
    </div>

    {{-- ISI --}}
    <div class="isi">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Kemirigede, Kecamatan Kemirigede, Kabupaten Blitar, menerangkan dengan sebenarnya bahwa:</p>

        <table class="data-diri">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->nama_lengkap }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->nik }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, Tanggal Lahir</td>
                <td class="colon">:</td>
                <td class="value">
                    {{ $data->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>
            </tr>
            <tr>
                <td class="label">Agama</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->agama }}</td>
            </tr>
            <tr>
                <td class="label">Kewarganegaraan</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->kewarganegaraan }}</td>
            </tr>
            <tr>
                <td class="label">Status Perkawinan</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->status_perkawinan }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->pekerjaan }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td class="value">
                    {{ $data->alamat }} RT {{ $data->rt }} / RW {{ $data->rw }}<br>
                    Dusun/Desa Kemirigede, Kec. Kemirigede, Kab. Blitar
                </td>
            </tr>
        </table>

        <p>
            Berdasarkan data kependudukan yang ada pada Pemerintah Desa Kemirigede, yang bersangkutan tersebut di atas
            benar-benar penduduk Desa Kemirigede dan <strong>benar pernah menikah</strong>.
        </p>

        <p>
            Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
        </p>
    </div>

    {{-- TTD --}}
    <div class="ttd-container">
        <p>Kemirigede, {{ \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y') }}</p>
        <p>Kepala Desa Kemirigede</p>
        <br><br><br>
        <p><strong><u>MOH. HAMID ALMAULUDI S.Pd.I</u></strong></p>
    </div>

</body>
</html>
