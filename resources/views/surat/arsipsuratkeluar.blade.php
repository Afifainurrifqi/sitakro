@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid py-3">
        <div class="card">
            <div class="card-header">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <h2 class="card-title">ARSIP SURAT KELUAR</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
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
                                    // styling badge
                                    $statusClass = match ($item->status_surat) {
                                        'Pending' => 'bg-pending',
                                        'Di cek' => 'bg-cek',
                                        'Di terima' => 'bg-diterima',
                                        'Ditolak' => 'bg-ditolak',
                                        default => '',
                                    };
                                    $verifClass =
                                        $item->status_verif === 'Terverifikasi'
                                            ? 'bg-terverifikasi'
                                            : 'bg-belum-verifikasi';

                                    // nama class model, lalu StudlyCase
                                    $jenisSurat = Str::studly(class_basename($item));
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="{{ route('surat.export_ktp', $item->_id) }}" class="btn btn-success btn-sm">
                                            Export PDF
                                        </a>
                                        {{-- <a href="#" class="btn btn-warning btn-sm">Edit</a> --}}
                                    </td>
                                    <td>{{ $item->nama_pelapor }}</td>
                                    <td>{{ $item->nik_pelapor }}</td>
                                    <td>{{ $jenisSurat }}</td>
                                    <td>
                                        <a href="https://wa.me/{{ $item->nowa }}" target="_blank"
                                            class="btn btn-success btn-sm">
                                            {{ $item->nowa }}
                                        </a>
                                    </td>
                                    <td>{{ $item->jenis_kelamin_pelapor }}</td>
                                    <td>{{ $item->alamat_pelapor }}</td>
                                    <td><span
                                            class="badge rounded-pill {{ $statusClass }}">{{ $item->status_surat }}</span>
                                    </td>
                                    <td><span
                                            class="badge rounded-pill {{ $verifClass }}">{{ $item->status_verif }}</span>
                                    </td>
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
