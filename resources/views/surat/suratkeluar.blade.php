@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">

            {{-- TABEL ARSIP SURAT --}}
            <div class="card shadow-sm">
                <div class="card-header">
                    @if (session('success'))
                        <div class="alert alert-success mb-2">{{ session('success') }}</div>
                    @endif
                    <h5 class="card-title mb-0">ARSIP SURAT KELUAR</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>Nama Pelapor</th>
                                    <th>NIK Pelapor</th>
                                    <th>Jenis Surat</th>
                                    <th>No Whatsapp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php use Illuminate\Support\Str; @endphp
                                @foreach ($data as $index => $item)
                                    @php
                                        $modelClass = get_class($item);
                                        $jenisSurat = match ($modelClass) {
                                            'App\Models\surat_keterangan_kehilangan' => 'SuratKeteranganKehilangan',
                                            'App\Models\surat_pernyataan_numpang_kk' => 'SuratPernyataanNumpangKk',
                                            'App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian' => 'SuratPernyataanTidakBisaMelampirkanKtpKematian',
                                            default => class_basename($item),
                                        };

                                        $statusClass = match ($item->status_surat) {
                                            'Pending' => 'bg-pending',
                                            'Di cek' => 'bg-cek',
                                            'Di terima' => 'bg-diterima',
                                            'Ditolak' => 'bg-ditolak',
                                            default => '',
                                        };

                                        $verifClass = ($item->status_verif === 'Terverifikasi')
                                            ? 'bg-terverifikasi'
                                            : 'bg-belum-verifikasi';
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('surat.export-pdf', ['jenis' => strtolower($jenisSurat), 'id' => $item->_id]) }}"
                                                class="btn btn-success btn-sm" target="_blank">Export PDF</a>

                                            @if ($jenisSurat === 'SuratKeteranganKehilangan')
                                                <a href="{{ route('suratkehilangan.edit', $item->_id) }}" class="btn btn-primary btn-sm ms-1">Edit</a>
                                            @elseif ($jenisSurat === 'SuratPernyataanNumpangKk')
                                                <a href="{{ route('surat.numpangkk.edit', $item->_id) }}" class="btn btn-primary btn-sm ms-1">Edit</a>
                                            @endif
                                        </td>

                                        {{-- Nama Pelapor --}}
                                        <td>
                                            @if ($jenisSurat === 'SuratKeteranganKehilangan' || $jenisSurat === 'SuratPernyataanTidakBisaMelampirkanKtpKematian')
                                                {{ $item->nama_pelapor ?? '-' }}
                                            @elseif ($jenisSurat === 'SuratPernyataanNumpangKk')
                                                {{ $item->nama_pemilik_kk ?? '-' }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        {{-- NIK Pelapor --}}
                                        <td>
                                            @if ($jenisSurat === 'SuratKeteranganKehilangan' || $jenisSurat === 'SuratPernyataanTidakBisaMelampirkanKtpKematian')
                                                {{ $item->nik_pelapor ?? '-' }}
                                            @elseif ($jenisSurat === 'SuratPernyataanNumpangKk')
                                                {{ $item->nik_pemilik_kk ?? '-' }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        {{-- Jenis Surat --}}
                                        <td>{{ $jenisSurat }}</td>

                                        {{-- No Whatsapp --}}
                                        <td>
                                            <a href="https://wa.me/{{ $item->nowa }}" target="_blank" class="btn btn-success btn-sm">
                                                {{ $item->nowa }}
                                            </a>
                                        </td>

                                        {{-- Jenis Kelamin --}}
                                        <td>
                                            @if ($jenisSurat === 'SuratKeteranganKehilangan')
                                                {{ $item->jenis_kelamin_pelapor ?? '-' }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        {{-- Alamat --}}
                                        <td>
                                            @if ($jenisSurat === 'SuratKeteranganKehilangan' || $jenisSurat === 'SuratPernyataanTidakBisaMelampirkanKtpKematian')
                                                {{ $item->alamat_pelapor ?? '-' }}
                                            @elseif ($jenisSurat === 'SuratPernyataanNumpangKk')
                                                {{ $item->alamat_pemilik_kk ?? '-' }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        {{-- Status Surat --}}
                                        <td><span class="badge rounded-pill {{ $statusClass }}">{{ $item->status_surat }}</span></td>

                                        {{-- Status Verifikasi --}}
                                        <td><span class="badge rounded-pill {{ $verifClass }}">{{ $item->status_verif }}</span></td>
                                    </tr>
                                @endforeach

                                @if ($data->isEmpty())
                                    <tr>
                                        <td colspan="10" class="text-center">Belum ada data.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Tambahan Style Badge --}}
<style>
    .bg-pending {
        background-color: #6c757d;
        color: #fff;
    }

    .bg-cek {
        background-color: #ffc107;
        color: #000;
    }

    .bg-diterima {
        background-color: #198754;
        color: #fff;
    }

    .bg-ditolak {
        background-color: #dc3545;
        color: #fff;
    }

    .bg-belum-verifikasi {
        background-color: #0d6efd;
        color: #fff;
    }

    .bg-terverifikasi {
        background-color: #198754;
        color: #fff;
    }
</style>
@endsection
