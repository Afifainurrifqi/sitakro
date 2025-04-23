@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
    <h5 class="mb-3">Daftar Jenis Surat</h5>

    <div class="surat-container">
        @php
            $jenisSurat = [
                'Surat Keterangan Domisili',
                'Surat Keterangan Usaha',
                'Surat Keterangan Tidak Mampu',
                'Surat Keterangan Kematian',
                'Surat Keterangan Lahir',
                'Surat Keterangan Menikah',
                'Surat Keterangan Cerai',
                'Surat Keterangan Penghasilan',
                'Surat Keterangan Kepemilikan Tanah',
                'Surat Keterangan Pindah Domisili',
                'Surat Keterangan Tinggal Sementara',
                'Surat Izin Keramaian',
                'Surat Keterangan Bepergian',
                'Surat Keterangan Belum Menikah',
                'Surat Keterangan Janda/Duda',
                'Surat Pengantar SKCK',
                'Surat Pengantar Nikah',
                'Surat Pengantar KTP',
                'Surat Pengantar KK',
                'Surat Pengantar Pindah',
                'Surat Pengantar Kelurahan',
                'Surat Keterangan Keluarga Tidak Mampu',
                'Surat Keterangan Kependudukan',
                'Surat Keterangan Pengantar Sekolah',
                'Surat Keterangan Pengantar Beasiswa',
                'Surat Keterangan Wali',
                'Surat Keterangan Belum Sekolah',
                'Surat Keterangan Kepemilikan Kendaraan',
                'Surat Keterangan Usulan Bantuan',
                'Surat Keterangan Kehilangan',
                'Surat Keterangan Ahli Waris',
                'Surat Keterangan Hibah',
                'Surat Keterangan Cuti',
                'Surat Keterangan Karyawan',
                'Surat Keterangan Pekerjaan',
                'Surat Keterangan Tidak Bekerja',
                'Surat Keterangan Pernyataan',
                'Surat Keterangan Kepemilikan Bangunan',
                'Surat Keterangan Tidak Punya Rumah',
                'Surat Keterangan Sehat',
                'Surat Keterangan Imunisasi'
            ];
        @endphp

        @foreach($jenisSurat as $surat)
            <div class="card surat-card">
                <div class="card-body p-2 text-center d-flex flex-column">
                    <h6 class="card-title mb-2" style="font-size: 14px;">{{ $surat }}</h6>
                    <a href="#" class="btn btn-sm btn-primary mt-auto">Buat Surat</a>
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
        width: 19.2%; /* 5 cards with 8px gap between */
        min-width: 180px;
        box-shadow: 0 0 6px rgba(0,0,0,0.05);
        border-radius: 8px;
    }

    @media (max-width: 1200px) {
        .surat-card {
            width: 24.2%; /* 4 per row */
        }
    }

    @media (max-width: 992px) {
        .surat-card {
            width: 32.2%; /* 3 per row */
        }
    }

    @media (max-width: 768px) {
        .surat-card {
            width: 48.5%; /* 2 per row */
        }
    }

    @media (max-width: 576px) {
        .surat-card {
            width: 100%;
        }
    }
</style>
@endsection
