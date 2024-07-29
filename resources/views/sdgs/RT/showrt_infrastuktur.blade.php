 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">INFRASTUKTUR
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtinfrastuktur.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtinfrastuktur.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnik">NIK <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                       @if (isset($datart->nik))
                                                <br>
                                                {{ $datart->nik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                        @error('valnik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">Nama Ketua RT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                       @if (isset($datart->nama))
                                                <br>
                                                {{ $datart->nama }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                        @error('valnama_ketuart')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valalamat">ALAMAT<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                       @if (isset($datart->nik))
                                                <br>
                                                {{ $datart->nik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                        @error('valalamat')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrt">RT<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                      @if (isset($datart->rt))
                                                <br>
                                                {{ $datart->rt }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                        @error('valrt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrw">RW <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datart->rw))
                                                <br>
                                                {{ $datart->rw }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                        @error('valrw')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnohp">NO HP <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datart->nohp))
                                                <br>
                                                {{ $datart->nohp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                        @error('valnohp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpenerangan_jalan">PENERANGAN DI JALAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtinfrastuktur->penerangan_jalan))
                                            <br>
                                            {{ $rtinfrastuktur->penerangan_jalan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valpenerangan_jalan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valkredit_ketahanan">PRASARANA TRANSPORTASI
                                        ANTAR RT
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtinfrastuktur->pra_transportrt))
                                            <br>
                                            {{ $rtinfrastuktur->pra_transportrt }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif

                                        @error('valpra_transportrt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PANJANG JALAN (KM)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjalan_aspal">JALAN ASPAL
                                            </label>
                                            @if (isset($rtinfrastuktur->jalan_aspal))
                                                <br>
                                                {{ $rtinfrastuktur->jalan_aspal }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjalan_aspal')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_makadam">JALAN MAKADAM/ TELFORD
                                            </label>
                                            @if (isset($rtinfrastuktur->jalan_makadam))
                                                <br>
                                                {{ $rtinfrastuktur->jalan_makadam }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjalan_makadam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_tanah">JALAN TANAH
                                            </label>
                                            </label>
                                            @if (isset($rtinfrastuktur->jalan_tanah))
                                                <br>
                                                {{ $rtinfrastuktur->jalan_tanah }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjalan_tanah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_papan_atasaair">JALAN PAPAN DI ATAS AIR
                                            </label>
                                            @if (isset($rtinfrastuktur->jalan_papan_atasaair))
                                                <br>
                                                {{ $rtinfrastuktur->jalan_papan_atasaair }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjalan_papan_atasaair')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_setapak">JALAN SETAPAK

                                            </label>
                                            @if (isset($rtinfrastuktur->jalan_setapak))
                                                <br>
                                                {{ $rtinfrastuktur->jalan_setapak }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjalan_setapak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_lainnya">JALAN LAINNYA

                                            </label>
                                            @if (isset($rtinfrastuktur->jalan_lainnya))
                                                <br>
                                                {{ $rtinfrastuktur->jalan_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjalan_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjalan_darat_roda4">JALAN DARAT DAPAT
                                        DILALUI KENDARAAN BERMOTOR RODA 4 ATAU LEBIH
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtinfrastuktur->jalan_darat_roda4))
                                            <br>
                                            {{ $rtinfrastuktur->jalan_darat_roda4 }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif


                                        @error('valjalan_darat_roda4')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEBERADAAN ANGKUTAN UMUM

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valangkutanumum_trayek">Trayek Angkutan Umum
                                            </label>
                                            @if (isset($rtinfrastuktur->angkutanumum_trayek))
                                                <br>
                                                {{ $rtinfrastuktur->angkutanumum_trayek }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valangkutanumum_trayek')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valangkutanumum_opra">Operasional Angkutan Umum

                                            </label>
                                            @if (isset($rtinfrastuktur->angkutanumum_opra))
                                                <br>
                                                {{ $rtinfrastuktur->angkutanumum_opra }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valangkutanumum_opra')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valangkutanumum_jamopra">Jam Operasional Angkutan Umum

                                            </label>
                                            @if (isset($rtinfrastuktur->angkutanumum_jamopra))
                                                <br>
                                                {{ $rtinfrastuktur->angkutanumum_jamopra }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valangkutanumum_jamopra')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valdermaga_laut">DERMAGA LAUT / SUNGAI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtinfrastuktur->dermaga_laut))
                                            <br>
                                            {{ $rtinfrastuktur->dermaga_laut }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif

                                        @error('valdermaga_laut')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SINYAL HP
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valsinyalhp_bts">JUMLAH MENARA BTS
                                            </label>
                                            @if (isset($rtinfrastuktur->sinyalhp_bts))
                                                <br>
                                                {{ $rtinfrastuktur->sinyalhp_bts }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valsinyalhp_bts')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_telkom">TELKOMSEL
                                            </label>
                                            @if (isset($rtinfrastuktur->sinyalhp_telkom))
                                                <br>
                                                {{ $rtinfrastuktur->sinyalhp_telkom }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valsinyalhp_telkom')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_indo">INDOSAT

                                            </label>
                                            @if (isset($rtinfrastuktur->sinyalhp_indo))
                                                <br>
                                                {{ $rtinfrastuktur->sinyalhp_indo }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valsinyalhp_indo')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_xl">XL/AXIS
                                            </label>
                                            @if (isset($rtinfrastuktur->sinyalhp_xl))
                                                <br>
                                                {{ $rtinfrastuktur->sinyalhp_xl }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valsinyalhp_xl')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_hut">HUTCHISON 3
                                            </label>
                                            @if (isset($rtinfrastuktur->sinyalhp_hut))
                                                <br>
                                                {{ $rtinfrastuktur->sinyalhp_hut }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valsinyalhp_hut')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_psn">PSN by RU
                                            </label>
                                            @if (isset($rtinfrastuktur->sinyalhp_psn))
                                                <br>
                                                {{ $rtinfrastuktur->sinyalhp_psn }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valsinyalhp_psn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_smart">SMARTFREN
                                            </label>
                                            @if (isset($rtinfrastuktur->sinyalhp_smart))
                                                <br>
                                                {{ $rtinfrastuktur->sinyalhp_smart }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valsinyalhp_smart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_bakrie">BAKRIE TELCOM
                                            </label>
                                            @if (isset($rtinfrastuktur->sinyalhp_bakrie))
                                                <br>
                                                {{ $rtinfrastuktur->sinyalhp_bakrie }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valsinyalhp_bakrie')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpos_pembantu">KANTOR POS PEMBANTU
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtinfrastuktur->pos_pembantu))
                                            <br>
                                            {{ $rtinfrastuktur->pos_pembantu }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif


                                        @error('valpos_pembantu')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpos_keliling">LAYANAN POS KELILING
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtinfrastuktur->pos_keliling))
                                            <br>
                                            {{ $rtinfrastuktur->pos_keliling }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif

                                        @error('valpos_keliling')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valagen_jasa">PERUSAHAAN / AGEN
                                        JASA EKSPEDISI SWASTA
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtinfrastuktur->agen_jasa))
                                            <br>
                                            {{ $rtinfrastuktur->agen_jasa }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif

                                        @error('valagen_jasa')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SIARAN TVRI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valchanel_tvri">TCHANEL DAPAT DITERIMA ATAU TIDAK
                                            </label>
                                            @if (isset($rtinfrastuktur->chanel_tvri))
                                                <br>
                                                {{ $rtinfrastuktur->chanel_tvri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valwaktutempuh_rumahs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_tvri">PERLU PARABOLA
                                            </label>
                                            @if (isset($rtinfrastuktur->parabola_tvri))
                                                <br>
                                                {{ $rtinfrastuktur->parabola_tvri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valparabola_tvri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SIARAN TVRI DAERAH


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valchanel_tvrid">TCHANEL DAPAT DITERIMA ATAU TIDAK
                                            </label>
                                            @if (isset($rtinfrastuktur->chanel_tvrid))
                                                <br>
                                                {{ $rtinfrastuktur->chanel_tvrid }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valchanel_tvrid')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_tvrid">PERLU PARABOLA


                                            </label>
                                            @if (isset($rtinfrastuktur->parabola_tvrid))
                                                <br>
                                                {{ $rtinfrastuktur->parabola_tvrid }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valparabola_tvrid')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SIARAN TV SWASTA


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valchanel_s">TCHANEL DAPAT DITERIMA ATAU TIDAK
                                            </label>
                                            @if (isset($rtinfrastuktur->chanel_s))
                                                <br>
                                                {{ $rtinfrastuktur->chanel_s }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valchanel_s')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_s">PERLU PARABOLA


                                            </label>
                                            @if (isset($rtinfrastuktur->parabola_s))
                                                <br>
                                                {{ $rtinfrastuktur->parabola_s }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valparabola_s')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SIARAN TV LUAR NEGERI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valchanel_ln">TCHANEL DAPAT DITERIMA ATAU TIDAK
                                            </label>
                                            @if (isset($rtinfrastuktur->chanel_ln))
                                                <br>
                                                {{ $rtinfrastuktur->chanel_ln }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valchanel_ln')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_ln">PERLU PARABOLA


                                            </label>
                                            @if (isset($rtinfrastuktur->parabola_ln))
                                                <br>
                                                {{ $rtinfrastuktur->parabola_ln }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valparabola_ln')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SIARAN RRI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valchanel_rri">TCHANEL DAPAT DITERIMA ATAU TIDAK
                                            </label>
                                            @if (isset($rtinfrastuktur->chanel_rri))
                                                <br>
                                                {{ $rtinfrastuktur->chanel_rri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valchanel_rri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_rri">PERLU PARABOLA


                                            </label>
                                            @if (isset($rtinfrastuktur->parabola_rri))
                                                <br>
                                                {{ $rtinfrastuktur->parabola_rri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valparabola_rri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SIARAN RRI DAERAH


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valchanel_rrid">TCHANEL DAPAT DITERIMA ATAU TIDAK
                                            </label>
                                            @if (isset($rtinfrastuktur->chanel_rrid))
                                                <br>
                                                {{ $rtinfrastuktur->chanel_rrid }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valchanel_rrid')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_rrid">PERLU PARABOLA


                                            </label>
                                            @if (isset($rtinfrastuktur->parabola_rrid))
                                                <br>
                                                {{ $rtinfrastuktur->parabola_rrid }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valparabola_rrid')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SIARAN RADIO SWASTA


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valchanel_radios">TCHANEL DAPAT DITERIMA ATAU TIDAK
                                            </label>
                                            @if (isset($rtinfrastuktur->chanel_radios))
                                                <br>
                                                {{ $rtinfrastuktur->chanel_radios }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valchanel_radios')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_radios">PERLU PARABOLA


                                            </label>
                                            @if (isset($rtinfrastuktur->parabola_radios))
                                                <br>
                                                {{ $rtinfrastuktur->parabola_radios }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valparabola_radios')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SIARAN RADIO KOMUNITAS


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valchanel_radiok">TCHANEL DAPAT DITERIMA ATAU TIDAK
                                            </label>
                                            @if (isset($rtinfrastuktur->chanel_radiok))
                                                <br>
                                                {{ $rtinfrastuktur->chanel_radiok }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valchanel_radiok')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_radiok">PERLU PARABOLA


                                            </label>
                                            @if (isset($rtinfrastuktur->parabola_radiok))
                                                <br>
                                                {{ $rtinfrastuktur->parabola_radiok }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valparabola_radiok')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_lokasi_air">JUMLAH LOKASI
                                        PEMUKIMAN LIAR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rtinfrastuktur->jumlah_lokasi_air))
                                            <br>
                                            {{ $rtinfrastuktur->jumlah_lokasi_air }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlah_lokasi_air')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">JUMLAH FASILITAS UMUM YANG DITINGGALI PENDUDUK
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_pasar">PASAR

                                            </label>
                                            @if (isset($rtinfrastuktur->fasilitas_umump_pasar))
                                            <br>
                                            {{ $rtinfrastuktur->fasilitas_umump_pasar }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valfasilitas_umump_pasar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_stasiun">STASIUN

                                            </label>
                                            @if (isset($rtinfrastuktur->fasilitas_umump_stasiun))
                                            <br>
                                            {{ $rtinfrastuktur->fasilitas_umump_stasiun }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valfasilitas_umump_stasiun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_terminal">TERMINAL

                                            </label>
                                            @if (isset($rtinfrastuktur->fasilitas_umump_terminal))
                                            <br>
                                            {{ $rtinfrastuktur->fasilitas_umump_terminal }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valfasilitas_umump_terminal')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_kolong">KOLONG JEMBATAN
                                            </label>
                                            @if (isset($rtinfrastuktur->fasilitas_umump_kolong))
                                            <br>
                                            {{ $rtinfrastuktur->fasilitas_umump_kolong }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valfasilitas_umump_kolong')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_pelabuhan">PELABUHAN
                                            </label>
                                            @if (isset($rtinfrastuktur->fasilitas_umump_pelabuhan))
                                            <br>
                                            {{ $rtinfrastuktur->fasilitas_umump_pelabuhan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valfasilitas_umump_pelabuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">JUMLAH LOKASI PEMUKIMAN KHUSUS
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_mewah">PERUMAHAN MEWAH


                                            </label>
                                            @if (isset($rtinfrastuktur->pemukiman_khusus_mewah))
                                            <br>
                                            {{ $rtinfrastuktur->pemukiman_khusus_mewah }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpemukiman_khusus_mewah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_apart">APARTEMEN


                                            </label>
                                            @if (isset($rtinfrastuktur->pemukiman_khusus_apart))
                                            <br>
                                            {{ $rtinfrastuktur->pemukiman_khusus_apart }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpemukiman_khusus_apart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_susun">RUMAH SUSUN


                                            </label>
                                            @if (isset($rtinfrastuktur->pemukiman_khusus_susun))
                                            <br>
                                            {{ $rtinfrastuktur->pemukiman_khusus_susun }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpemukiman_khusus_susun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_school">BOARDING SCHOOL


                                            </label>
                                            @if (isset($rtinfrastuktur->pemukiman_khusus_school))
                                            <br>
                                            {{ $rtinfrastuktur->pemukiman_khusus_school }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpemukiman_khusus_school')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_kos"> KOS-KOSAN

                                            </label>
                                            @if (isset($rtinfrastuktur->pemukiman_khusus_kos))
                                            <br>
                                            {{ $rtinfrastuktur->pemukiman_khusus_kos }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpemukiman_khusus_kos')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_asrama"> ASRAMA/ BARAK MILITIER


                                            </label>
                                            @if (isset($rtinfrastuktur->pemukiman_khusus_asrama))
                                            <br>
                                            {{ $rtinfrastuktur->pemukiman_khusus_asrama }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpemukiman_khusus_asrama')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_lp"> LP / RUTAN


                                            </label>
                                            @if (isset($rtinfrastuktur->pemukiman_khusus_lp))
                                            <br>
                                            {{ $rtinfrastuktur->pemukiman_khusus_lp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valpemukiman_khusus_lp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

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
