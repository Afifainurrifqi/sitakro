 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">DATA PENDIDIKAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('pendidikan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">

                            <form class="form-valide" action="{{ route('pendidikan.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">NoKK <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">NIK <span
                                            class="text-danger">*</span>
                                        <input type="hidden" name="valNIK" value="{{ $datap->nik }}">
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->nik }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNama">Nama <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->nama }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpendidikan_tertinggi"> Pendidikan Tertinggi<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->pendidikan_tertinggin))
                                        {{ $datasdgspendidikan->pendidikan_tertinggi }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valberapa_tahunp">Berapa Tahun mengenyam
                                        pendidikan dasar (SD,SMP,SMA) <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->berapa_tahunp))
                                        {{ $datasdgspendidikan->berapa_tahunp }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpendidikan_diikuti">Pendidikan yang sedang di ikuti<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->pendidikan_diikuti))
                                        {{ $datasdgspendidikan->pendidikan_diikuti }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbahasa_Rumah">Bahasa yang digunakan di Rumah dan Pemukiman<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->bahasa_Rumah))
                                        {{ $datasdgspendidikan->bahasa_Rumah}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbahasa_Formal">Bahasa yang digunakan di Lembaga Formal<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->bahasa_Formal))
                                        {{ $datasdgspendidikan->bahasa_Formal}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_kerja1">Jumlah kerja bakti 1 tahun terakhir                                       <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->jumlah_kerja1))
                                        {{ $datasdgspendidikan->jumlah_kerja1}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valskamling">Siskamling 1 tahun terakhir
                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->skamling1))
                                        {{ $datasdgspendidikan->skamling1}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpesta_rakyat1">Pesta Rakyat (Adat) 1 tahun terakhir
                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->pesta_rakyat1))
                                        {{ $datasdgspendidikan->pesta_rakyat1}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valfrekuensiml">Frekuensi Melayat 1 tahun terakhir
                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->frekuensiml))
                                        {{ $datasdgspendidikan->frekuensiml}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valfrekuensib">Frekuensi besuk orang sakit 1 tahun terakhir
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->frekuensib))
                                        {{ $datasdgspendidikan->frekuensib}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valfrekuensmn">Frekuensi menolong kecelakaan 1 tahun terakhir<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->frekuensimn))
                                        {{ $datasdgspendidikan->frekuensimn}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valmendapatp1">Mendapatkan Pelayanan Desa 1 tahun terakhir<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->mendapatp1))
                                        {{ $datasdgspendidikan->mendapatp1}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbagaiamanap">Bagaimana pelayanan desa yang diperoleh?
                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->bagaiamanap))
                                        {{ $datasdgspendidikan->bagaiamanap}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpernahmasukan">Pernah menyampaikan masukan/saran kepada pihak Desa?

                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->pernahmasukan))
                                        {{ $datasdgspendidikan->pernahmasukan}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valketerbukaands">Bagaimana keterbukaan desa terhadap masukan?

                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->keterbukaands))
                                        {{ $datasdgspendidikan->keterbukaands}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valbencana1">Terjadi Bencana 1 tahun terakhir

                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->bencana1))
                                        {{ $datasdgspendidikan->bencana1}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valapakahb">Apakah anda terkena dampak bencana

                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->apakahb))
                                        {{ $datasdgspendidikan->apakahb}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vvalapakahd">Apakah menerima pemenuhan Kebutuhan Dasar saat Bencana (makanan, pakaian, tempat tinggal)?

                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->apakahd))
                                        {{ $datasdgspendidikan->apakahd}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valapakahp">Apakah ada penanganan psikososial keluarga terdampak bencana (penyuluhan/konseling/terapi)?

                                        <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datasdgspendidikan->apakahp))
                                        {{ $datasdgspendidikan->apakahp}}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
