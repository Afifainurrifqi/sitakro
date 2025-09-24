<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pernyataan Memilih Nama Alias (Satu Orang Tua)</title>
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

        /* KOP */
        .kop-container { width: 100%; }
        .kop-logo { width: 130px; }
        .kop-header { text-align: center; line-height: 1.4; }
        .kop-garis { border: 2px solid #000; margin-top: 5px; margin-bottom: 20px; }

        /* Judul */
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

        /* Isi */
        .isi { text-align: justify; margin-bottom: 20px; }

        table.data-diri {
            width: 100%;
            margin: 10px 0 15px 0;
            border-collapse: collapse;
        }
        table.data-diri td {
            vertical-align: top;
            padding: 4px 8px;
        }
        table.data-diri td.label  { width: 35%; }
        table.data-diri td.colon  { width: 2%; }
        table.data-diri td.value  { width: 63%; }

        /* TTD */
        .ttd-wrapper {
            width: 100%;
            margin-top: 40px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
        }
        .ttd-table { width: 100%; }
        .ttd-table td { vertical-align: top; }

        .materai-box {
            width: 140px;
            height: 90px;
            border: 1px dashed #000;
            display: inline-block;
            text-align: center;
            padding-top: 10px;
            margin-top: 6px;
            font-size: 10pt;
        }

        .underline { text-decoration: underline; }
        .bold { font-weight: bold; }
        .mb-0 { margin-bottom: 0; }
        .mt-0 { margin-top: 0; }
    </style>
</head>
<body>

    {{-- =================== KOP SURAT =================== --}}
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

    {{-- =================== JUDUL =================== --}}
    <div class="judul-surat">SURAT PERNYATAAN MEMILIH NAMA ALIAS</div>

    {{-- (opsional) nomor surat, jika kamu simpan di dokumen --}}
    @php $nomor = data_get($data, 'nomor'); @endphp
    @if(!empty($nomor))
        <div class="nomor">Nomor : {{ $nomor }}</div>
    @endif

    {{-- =================== PEMBUKA =================== --}}
    <div class="isi">
        <p class="mb-0">Yang bertanda tangan di bawah ini, saya:</p>
    </div>

    {{-- =================== IDENTITAS PEMBUAT PERNYATAAN =================== --}}
    <table class="data-diri">
        <tr>
            <td class="label">Nama</td>
            <td class="colon">:</td>
            <td class="value">{{ data_get($data, 'nama_menyatakan', '................................................') }}</td>
        </tr>
        <tr>
            <td class="label">NIK</td>
            <td class="colon">:</td>
            <td class="value">{{ data_get($data, 'nik', '................................................') }}</td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td class="colon">:</td>
            <td class="value">{{ data_get($data, 'alamat', '................................................') }}</td>
        </tr>
    </table>

    {{-- =================== BAGIAN AKTA KELAHIRAN =================== --}}
    <div class="isi">
        <p class="mb-0">Menyatakan dengan sebenar-benarnya bahwa pada Akta Kelahiran:</p>
    </div>

    <table class="data-diri">
        <tr>
            <td class="label">Nama pada Akta</td>
            <td class="colon">:</td>
            <td class="value">{{ data_get($data, 'nama', '................................................') }}</td>
        </tr>
        <tr>
            <td class="label">No. Akta Kelahiran</td>
            <td class="colon">:</td>
            <td class="value">{{ data_get($data, 'no_akta_kelahiran', '................................................') }}</td>
        </tr>
    </table>

    {{-- =================== ORANG TUA & ALIAS =================== --}}
    <div class="isi">
        <p class="mb-0">Nama orang tua yang tercatat adalah:</p>
    </div>

    <table class="data-diri">
        @php
            $ayah = trim((string) data_get($data, 'nama_ortu_ayah_tercatat', ''));
            $aliasAyah = trim((string) data_get($data, 'nama_alias_ayah', ''));
            $ibu  = trim((string) data_get($data, 'nama_ortu_ibu_tercatat', ''));
            $aliasIbu  = trim((string) data_get($data, 'nama_alias_ibu', ''));
        @endphp

        @if($ayah !== '')
        <tr>
            <td class="label">Ayah</td>
            <td class="colon">:</td>
            <td class="value">
                {{ $ayah }}
                @if($aliasAyah !== '') &nbsp;alias&nbsp;<strong>{{ $aliasAyah }}</strong>@endif
            </td>
        </tr>
        @endif

        @if($ibu !== '')
        <tr>
            <td class="label">Ibu</td>
            <td class="colon">:</td>
            <td class="value">
                {{ $ibu }}
                @if($aliasIbu !== '') &nbsp;alias&nbsp;<strong>{{ $aliasIbu }}</strong>@endif
            </td>
        </tr>
        @endif

        @if($ayah === '' && $ibu === '')
        <tr>
            <td class="label">Orang Tua</td>
            <td class="colon">:</td>
            <td class="value">................................................</td>
        </tr>
        @endif
    </table>

    {{-- =================== PENGHAPUSAN ALIAS =================== --}}
    <div class="isi">
        <p class="mb-0">
            Selanjutnya saya mengajukan pembetulan nama orang tua pada Akta Kelahiran dengan
            <strong>menghapus bagian nama alias</strong> menjadi:
        </p>
    </div>

    @php
        $hapus1 = trim((string) data_get($data, 'nama_alias_dihapus_1', ''));
        $hapus2 = trim((string) data_get($data, 'nama_alias_dihapus_2', ''));
    @endphp
    <table class="data-diri">
        <tr>
            <td class="label">Alias dihapus</td>
            <td class="colon">:</td>
            <td class="value">
                <strong>
                    @if($hapus1 === '' && $hapus2 === '')
                        ................................................
                    @else
                        {{ $hapus1 }}@if($hapus1 !== '' && $hapus2 !== ''), @endif{{ $hapus2 }}
                    @endif
                </strong>
            </td>
        </tr>
    </table>

    {{-- =================== DASAR / BERDASARKAN =================== --}}
    @php $berdasarkan = trim((string) data_get($data, 'berdasarkan', '')); @endphp
    @if($berdasarkan !== '')
        <div class="isi">
            <p class="mb-0"><em>Berdasarkan</em> {{ $berdasarkan }}.</p>
        </div>
    @endif

    {{-- =================== PENUTUP =================== --}}
    <div class="isi">
        <p>Demikian surat pernyataan ini saya buat dengan sebenar-benarnya. Apabila di kemudian hari ternyata pernyataan
            ini tidak benar, saya bersedia diproses sesuai ketentuan peraturan perundang-undangan dan seluruh dokumen
            yang diterbitkan akibat pernyataan ini menjadi tidak sah.</p>
        <p class="mb-0"><i>*Pilih salah satu (Ayah/Ibu) sesuai kebutuhan.</i></p>
    </div>

    {{-- =================== TANDA TANGAN ala referensi (kanan + materai) =================== --}}
    @php
        use Carbon\Carbon;
        $kota    = data_get($data, 'kota_terbit', 'Wates');
        $tanggal = Carbon::now('Asia/Jakarta')->translatedFormat('d F Y');
        $namaTtd = data_get($data, 'nama_menyatakan', data_get($data, 'nama', '( ................................. )'));
    @endphp

    <div class="ttd-wrapper">
        <table class="ttd-table">
            <tr>
                <td width="55%"></td>
                <td class="text-center">
                    <p class="mb-0">{{ $kota }}, {{ $tanggal }}</p>
                    <p class="mb-0">Yang Membuat Pernyataan</p>
                    <div class="materai-box">Materai<br>Rp10.000</div>
                    <p class="mt-0 bold underline">{{ $namaTtd }}</p>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
