@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-12">


                {{-- FORM PEMBUATAN SURAT --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pembuatan Surat</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('surat.prosesForm') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="adminduk">Adminduk</option>
                                    <option value="keterangan">Keterangan</option>
                                    <option value="pernyataan">Pernyataan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_form">Jenis Form</label>
                                <select name="jenis_form" id="jenis_form" class="form-control" required disabled>
                                    <option value="">-- Pilih Jenis Form --</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Lanjut</button>
                        </form>
                    </div>
                </div>

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
                                                'App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian'
                                                    => 'SuratPernyataanTidakBisaMelampirkanKtpKematian',
                                                'App\Models\suratketerangantidakmampu' => 'surat_keterangan_tidakmampu',
                                                default => class_basename($item),
                                            };

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
                                        @endphp
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <a href="{{ route('surat.export-pdf', ['jenis' => strtolower($jenisSurat), 'id' => $item->_id]) }}"
                                                    class="btn btn-success btn-sm" target="_blank">Export PDF</a>

                                                @if ($jenisSurat === 'SuratKeteranganKehilangan')
                                                    <a href="{{ route('suratkehilangan.edit', $item->_id) }}"
                                                        class="btn btn-primary btn-sm ms-1">Edit</a>
                                                @elseif ($jenisSurat === 'SuratPernyataanNumpangKk')
                                                    <a href="{{ route('surat.numpangkk.edit', $item->_id) }}"
                                                        class="btn btn-primary btn-sm ms-1">Edit</a>
                                                @elseif ($jenisSurat === 'surat_keterangan_tidakmampu')
                                                    <a href="{{ route('surat.tidakmampu.edit', $item->_id) }}"
                                                        class="btn btn-primary btn-sm ms-1">Edit</a>
                                                @endif
                                            </td>

                                            {{-- Nama Pelapor --}}
                                            <td>
                                                @if ($jenisSurat === 'SuratKeteranganKehilangan' || $jenisSurat === 'SuratPernyataanTidakBisaMelampirkanKtpKematian')
                                                    {{ $item->nama_pelapor ?? '-' }}
                                                @elseif ($jenisSurat === 'SuratPernyataanNumpangKk')
                                                    {{ $item->nama_pemilik_kk ?? '-' }}
                                                @elseif ($jenisSurat === 'surat_keterangan_tidakmampu')
                                                    {{ $item->nama_lengkap ?? '-' }}
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
                                                @elseif ($jenisSurat === 'surat_keterangan_tidakmampu')
                                                    {{ $item->nik ?? '-' }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            {{-- Jenis Surat --}}
                                            <td>{{ $jenisSurat }}</td>

                                            {{-- No Whatsapp --}}
                                            <td>
                                                <a href="https://wa.me/{{ $item->nowa }}" target="_blank"
                                                    class="btn btn-success btn-sm">
                                                    {{ $item->nowa }}
                                                </a>
                                            </td>

                                            {{-- Jenis Kelamin --}}
                                            <td>
                                                @if ($jenisSurat === 'SuratKeteranganKehilangan' || $jenisSurat === 'SuratPernyataanTidakBisaMelampirkanKtpKematian')
                                                    {{ $item->jenis_kelamin_pelapor ?? '-' }}
                                                @elseif ($jenisSurat === 'surat_keterangan_tidakmampu')
                                                    {{-- Jika ada field jenis_kelamin di model surat_keterangan_tidakmampu, ganti di sini --}}
                                                    {{-- Misal field tidak ada, bisa diisi '-' --}}
                                                    {{ $item->jenis_kelamin ?? '-' }}
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
                                                @elseif ($jenisSurat === 'surat_keterangan_tidakmampu')
                                                    {{ $item->alamat_rumah ?? '-' }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            {{-- Status Surat --}}
                                            <td><span
                                                    class="badge rounded-pill {{ $statusClass }}">{{ $item->status_surat }}</span>
                                            </td>

                                            {{-- Status Verifikasi --}}
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

    <script>
        const data = {
            adminduk: [
                "SURAT PERNYATAAN TIDAK BISA MELAMPIRKAN KTP KEMATIAN",
                "SURAT PERNYATAAN NUMPANG KK",
                "SURAT PERNYATAAN MEMILIH NAMA ALIAS",
                "SURAT PERNYATAAN MEMILIH NAMA ALIAS SATU ORANG TUA",
                "SURAT PERNYATAAN DAN JAMINAN",
                "SURAT PERNYATAAN BELUM PERNAH MENGURUS AKTA KELAHIRAN",
                "SURAT PERNYATAAN BEDA NAMA BUKU NIKAH",
                "SURAT PERNYATAAN ANAK SEORANG NAMA IBU (BARU)",
                "SURAT PERNYATAAN AKTA BARCODE NOMOR SAMA-BARU ISI SENDIRI",
                "SPTJM KEMATIAN",
                "PERNYATAAN PERUBAHAN DATA PENDIDIKAN",
                "PERNYATAAN PEMBETULAN DATA TIDAK MERUBAH LAGI",
                "PERNYATAAN MENGIZINKAN IKUT KK SUAMI-ISTRI-KELUARGA",
                "PERMOHONAN PENGANTAR KEABSAHAN UNTUK DIRI SENDIRI",
                "PERMOHONAN PENGANTAR KEABSAHAN UNTUK ANAK",
                "FORM PERNYATAAN BATAL PINDAH",
                "F-3.01 Formulir Pengajuan User ID",
                "F-2.04 SPTJM SUAMI ISTRI",
                "F-2.03 SPTJM KELAHIRAN",
                "F-2.01 Form PELAPORAN CAPIL WILAYAH NKRI 1",
                "F-1.09 Kartu Keluarga",
                "F-1.08 Biodata Penduduk di wilayah NKRI dan WNI di luar wilayah NKRI",
                "F-1.07 Surat Kuasa Dalam Pelayanan Administrasi Kependudukan",
                "F-1.06 PERNYATAAN PERUBAHAN ELEMEN DATA Kependudukan",
                "F-1.05 Surat Pernyataan Tanggung Jawab Mutlak Perkawinan Perceraian Belum Tercatat",
                "F-1.04 Surat Pernyataan Tidak Memiliki Dokumen Kependudukan",
                "F-1.03 PENDAFTARAN PERPINDAHAN PENDUDUK",
                "F-1.02 PENDAFTARAN PERISTIWA KEPENDUDUKAN",
                "F-1.01 FORM  BIODATA KELUARGA"
            ],
            keterangan: [
                "SURAT KETERANGAN KEHILANGAN",
                "SURAT KETERANGAN DESA PERNAH MENIKAH",
                "SURAT KETERANGAN TIDAK MAMPU",
                "SURAT KETERANGAN KEMATIAN DESA",
                "SURAT KETERANGAN WARIS",
                "SURAT KETERANGAN HARGA KEPEMILIKAN TANAH",
                "SURAT KETERANGAN NUMPANG NIKAH",
                "KETERANGAN PENGANTAR SKCK",
                "Surat Keterangan Desa Warga Miskin",
                "Surat Keterangan Kepemilikan Aset",
                "SURAT KETERANGAN USAHA",
                "SURAT KETERANGAN MISKIN ( SKM )",
                "SURAT KETERANGAN AHLI WARIS",
                "SURAT KETERANGAN GHOIB",
                "SURAT KETERANGAN PENGHASILAN",
                "SURAT KETERANGAN DOMISILI USAHA",
                "SURAT KETERANGAN DOMISILI WARGA"
            ],
            pernyataan: [
                "SURAT PERNYATAAN Kepemilikan Dokumen  Asli",
                "SURAT PERNYATAAN KESANGGUPAN",
                "Surat Pernyataan Tidak memiliki kartu JAMKESMAS,ASKES atau JKN",
                "Surat Pernyataan Miskin",
                "SURAT  IJIN KELUARGA",
                "SURAT  KUASA",
                "Permohonan Pembukaan Rekening Tabungan",
                "SURAT PERINTAH TUGAS",
                "SURAT PERINTAH PERJALANAN DINAS",
                "Undangan",
                "Rekomendasi",
                "FORMAT BLANGKO NOTA ANGKUTAN",
                "SURAT REKOMENDASI PEMBELIAN BBM JENIS TERTENTU",
                "SURAT PENYELENGGARAAN KERAMAIAN",
                "Permohonan surat  Pernyataan miskin",
                "Surat Permohonan Tebang pohon"
            ]
        };

        const kategoriSelect = document.getElementById('kategori');
        const jenisFormSelect = document.getElementById('jenis_form');

        kategoriSelect.addEventListener('change', function() {
            const selected = this.value;
            jenisFormSelect.innerHTML = '<option value="">-- Pilih Jenis Form --</option>';
            jenisFormSelect.disabled = true;

            if (selected && data[selected]) {
                data[selected].forEach(function(item) {
                    const option = document.createElement('option');
                    option.value = item.toLowerCase().replace(/ /g, '_').replace(/[^a-z0-9_]/g, '');
                    option.textContent = item;
                    jenisFormSelect.appendChild(option);
                });
                jenisFormSelect.disabled = false;
            }
        });
    </script>
@endsection
