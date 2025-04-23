@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
    <h5 class="mb-3">Daftar Jenis Surat</h5>

    <div class="surat-container">
        @php
            // Daftar semua jenis surat
            $jenisSurat = [
                'SURAT PERNYATAAN TIDAK BISA MELAMPIRKAN KTP KEMATIAN',
                'SURAT PERNYATAAN NUMPANG KK',
                'SURAT PERNYATAAN MEMILIH NAMA ALIAS',
                'SURAT PERNYATAAN MEMILIH NAMA ALIAS SATU ORANG TUA',
                'SURAT PERNYATAAN DAN JAMINAN',
                'SURAT PERNYATAAN BELUM PERNAH MENGURUS AKTA KELAHIRAN',
                'SURAT PERNYATAAN BEDA NAMA BUKU NIKAH',
                'SURAT PERNYATAAN ANAK SEORANG NAMA IBU (BARU)',
                'SURAT PERNYATAAN AKTA BARCODE NOMOR SAMA-BARU ISI SENDIRI',
                'SPTJM KEMATIAN',
                'PERNYATAAN PERUBAHAN DATA PENDIDIKAN',
                'PERNYATAAN PEMBETULAN DATA TIDAK MERUBAH LAGI',
                'PERNYATAAN MENGIZINKAN IKUT KK SUAMI-ISTRI-KELUARGA',
                'PERMOHONAN PENGANTAR KEABSAHAN UNTUK DIRI SENDIRI',
                'PERMOHONAN PENGANTAR KEABSAHAN UNTUK ANAK',
                'FORM PERNYATAAN BATAL PINDAH',
                'F-3.01 Formulir Pengajuan User ID',
                'F-2.04 SPTJM SUAMI ISTRI',
                'F-2.03 SPTJM KELAHIRAN',
                'F-2.01 Form PELAPORAN CAPIL WILAYAH NKRI 1',
                'F-1.09 Kartu Keluarga',
                'F-1.08 Biodata Penduduk di wilayah NKRI dan WNI di luar wilayah NKRI',
                'F-1.07 Surat Kuasa Dalam Pelayanan Administrasi Kependudukan',
                'F-1.06 PERNYATAAN PERUBAHAN ELEMEN DATA Kependudukan',
                'F-1.05 Surat Pernyataan Tanggung Jawab Mutlak Perkawinan Perceraian Belum Tercatat',
                'F-1.04 Surat Pernyataan Tidak Memiliki Dokumen Kependudukan',
                'F-1.03 PENDAFTARAN PERPINDAHAN PENDUDUK',
                'F-1.02 PENDAFTARAN PERISTIWA KEPENDUDUKAN',
                'F-1.01 FORM  BIODATA KELUARGA',
                'SURAT   KETERANGAN KEHILANGAN',
                'SURAT   KETERANGAN   DESA  PERNAH MENIKAH',
                'SURAT KETERANGAN TIDAK MAMPU',
                'SURAT KETERANGAN KEMATIAN DESA',
                'SURAT KETERANGAN WARIS',
                'SURAT KETERANGAN HARGA KEPEMILIKAN TANAH',
                'SURAT KETERANGAN NUMPANG NIKAH',
                'KETERANGAN   PENGANTAR   SKCK',
                'Surat Keterangan Desa Warga Miskin',
                'Surat Keterangan Kepemilikan  Aset',
                'SURAT  KETERANGAN  USAHA',
                'Surat Keterangan Desa Warga Miskin',
                'SURAT KETERANGAN MISKIN ( SKM )',
                'SURAT  KETERANGAN  AHLI WARIS',
                'SURAT KETERANGAN GHOIB',
                'SURAT KETERANGAN PENGHASILAN',
                'SURAT KETERANGAN DOMISILI USAHA',
                'SURAT KETERANGAN DOMISILI WARGA',
            ];

            // Surat yang hanya aktif dan dapat diakses
            $aktif = 'SURAT PERNYATAAN TIDAK BISA MELAMPIRKAN KTP KEMATIAN';

            // Menentukan route untuk jenis surat yang aktif
            $routeAktif = route('surat.suratpernyataantidakbisamelampirkanktpkematian');
        @endphp

        @foreach($jenisSurat as $surat)
            <div class="card surat-card">
                <div class="card-body p-2 text-center d-flex flex-column">
                    <h6 class="card-title mb-2" style="font-size: 14px;">{{ $surat }}</h6>

                    <!-- Jika surat sama dengan surat aktif, tampilkan tombol "Buat Surat" -->
                    @if($surat === $aktif)
                        <a href="{{ $routeAktif }}" class="btn btn-sm btn-primary mt-auto">
                            Buat Surat
                        </a>
                    @else
                        <!-- Jika tidak, tampilkan tombol yang dinonaktifkan "Tidak Tersedia" -->
                        <button class="btn btn-sm btn-secondary mt-auto" disabled>
                            Tidak Tersedia
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .surat-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: flex-start;
    }
    .surat-card {
        width: 19.2%;
        min-width: 180px;
        box-shadow: 0 0 6px rgba(0,0,0,0.05);
        border-radius: 8px;
    }
    @media (max-width: 1200px)  { .surat-card { width: 24.2%; } }
    @media (max-width:  992px)  { .surat-card { width: 32.2%; } }
    @media (max-width:  768px)  { .surat-card { width: 48.5%; } }
    @media (max-width:  576px)  { .surat-card { width: 100%;  } }
</style>
@endsection
