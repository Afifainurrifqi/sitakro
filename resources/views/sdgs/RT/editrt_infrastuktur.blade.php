 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT INFRASTUKTUR
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtinfrastuktur.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtinfrastuktur.update') }}" method="POST" id="form-edit-rtinfras">
                                @csrf
                                <div class="form-group row" >
                                    <label class="col-lg-4 col-form-label" for="valnik">NIK <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnik', $datart->nik) }}" class="form-control @error('valnik') is-invalid @enderror" id="valnik" name="valnik" placeholder="Nama Lengkap...">
                                        <div class="col-lg-6">
                                            {{ $datart->nik }}
                                        </div>
                                        @error('valnik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">Nama Ketua RT <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnama_ketuart', $datart->nama) }}" class="form-control @error('valnama_ketuart') is-invalid @enderror" id="valnama_ketuart" name="valnama_ketuart" placeholder="Nama Lengkap...">
                                        <div class="col-lg-6">
                                            {{ $datart->nama }}
                                        </div>
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
                                        <input value="{{ old('valnama_ketuart', $datart->alamat) }}" type="hidden"
                                            class="form-control @error('valalamat') is-invalid @enderror" id="valalamat"
                                            name="valalamat" placeholder="Alamat...">
                                            <div class="col-lg-6">
                                                {{ $datart->alamat }}
                                            </div>
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
                                        <input value="{{ old('valnama_ketuart', $datart->rt) }}" type="hidden"
                                            class="form-control @error('valrt') is-invalid @enderror" id="valrt"
                                            name="valrt" placeholder="RT...">
                                            <div class="col-lg-6">
                                                {{ $datart->rt }}
                                            </div>
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
                                        <input value="{{ old('valnama_ketuart', $datart->rw) }}" type="hidden"
                                            class="form-control @error('valrw') is-invalid @enderror" id="valrw"
                                            name="valrw" placeholder="RW..">
                                            <div class="col-lg-6">
                                                {{ $datart->rw }}
                                            </div>
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
                                        <input value="{{ old('valnama_ketuart', $datart->nohp) }}" type="hidden"
                                            class="form-control @error('valnohp') is-invalid @enderror" id="valnohp"
                                            name="valnohp" placeholder="RW..">
                                            <div class="col-lg-6">
                                                {{ $datart->nohp }}
                                            </div>
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
                                        <select class="form-control @error('valpenerangan_jalan') is-invalid @enderror"
                                            id="valpenerangan_jalan" name="valpenerangan_jalan">
                                            <option value="" disabled selected>Pilih Wilayah Penerangan...</option>
                                            <option value="listrik pemerintah"
                                                {{ old('valpenerangan_jalan') == 'listrik pemerintah' || (isset($rtinfrastuktur) && $rtinfrastuktur->penerangan_jalan == 'listrik pemerintah') ? 'selected' : '' }}>
                                                Listrik Diusahakan Pemerintah</option>
                                            <option value="listrik non pemerintah"
                                                {{ old('valpenerangan_jalan') == 'listrik non pemerintah' || (isset($rtinfrastuktur) && $rtinfrastuktur->penerangan_jalan == 'listrik non pemerintah') ? 'selected' : '' }}>
                                                Listrik Diusahakan Non Pemerintah</option>
                                            <option value="non listrik"
                                                {{ old('valpenerangan_jalan') == 'non listrik' || (isset($rtinfrastuktur) && $rtinfrastuktur->penerangan_jalan == 'non listrik') ? 'selected' : '' }}>
                                                Non Listrik</option>
                                            <option value="tidak ada"
                                                {{ old('valpenerangan_jalan') == 'tidak ada' || (isset($rtinfrastuktur) && $rtinfrastuktur->penerangan_jalan == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
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
                                        <select class="form-control @error('valpra_transportrt') is-invalid @enderror"
                                            id="valpra_transportrt" name="valpra_transportrt">
                                            <option value="" disabled selected>Pilih Transportasi...</option>
                                            <option value="darat"
                                                {{ old('valpra_transportrt') == 'darat' || (isset($rtinfrastuktur) && $rtinfrastuktur->pra_transportrt == 'darat') ? 'selected' : '' }}>
                                                Darat</option>
                                            <option value="air"
                                                {{ old('valpra_transportrt') == 'air' || (isset($rtinfrastuktur) && $rtinfrastuktur->pra_transportrt == 'air') ? 'selected' : '' }}>
                                                Air</option>
                                            <option value="daratan_dan_air"
                                                {{ old('valpra_transportrt') == 'daratan_dan_air' || (isset($rtinfrastuktur) && $rtinfrastuktur->pra_transportrt == 'daratan_dan_air') ? 'selected' : '' }}>
                                                Daratan dan Air</option>
                                            <option value="udara"
                                                {{ old('valpra_transportrt') == 'udara' || (isset($rtinfrastuktur) && $rtinfrastuktur->pra_transportrt == 'udara') ? 'selected' : '' }}>
                                                Udara</option>
                                        </select>

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
                                            <input type="number" value="{{ $rtinfrastuktur->jalan_aspal ?? '' }}"
                                                class="form-control @error('valjalan_aspal') is-invalid @enderror"
                                                id="valjalan_aspal" name="valjalan_aspal"
                                                placeholder="Berapa kilometer...">
                                            @error('valjalan_aspal')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_makadam">JALAN MAKADAM/ TELFORD
                                            </label>
                                            <input type="number" value="{{ $rtinfrastuktur->jalan_makadam ?? '' }}"
                                                class="form-control @error('valjalan_makadam') is-invalid @enderror"
                                                id="valjalan_makadam" name="valjalan_makadam"
                                                placeholder="Berapa kilometer...">
                                            @error('valjalan_makadam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_tanah">JALAN TANAH
                                            </label>
                                            <input type="number" value="{{ $rtinfrastuktur->jalan_tanah ?? '' }}"
                                                class="form-control @error('valjalan_tanah') is-invalid @enderror"
                                                id="valjalan_tanah" name="valjalan_tanah"
                                                placeholder="Berapa kilometer...">
                                            @error('valjalan_tanah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_papan_atasaair">JALAN PAPAN DI ATAS AIR
                                            </label>
                                            <input type="number" value="{{ $rtinfrastuktur->jalan_papan_atasaair ?? '' }}"
                                                class="form-control @error('valjalan_papan_atasaair') is-invalid @enderror"
                                                id="valjalan_papan_atasaair" name="valjalan_papan_atasaair"
                                                placeholder="Berapa kilometer...">
                                            @error('valjalan_papan_atasaair')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_setapak">JALAN SETAPAK

                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->jalan_setapak ?? '' }}"
                                                class="form-control @error('valjalan_setapak') is-invalid @enderror"
                                                id="valjalan_setapak" name="valjalan_setapak"
                                                placeholder="Berapa kilometer...">
                                            @error('valjalan_setapak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjalan_lainnya">JALAN LAINNYA

                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->jalan_lainnya ?? '' }}"
                                                class="form-control @error('valjalan_lainnya') is-invalid @enderror"
                                                id="valjalan_lainnya" name="valjalan_lainnya"
                                                placeholder="Berapa kilometer...">
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
                                        <select class="form-control @error('valjalan_darat_roda4') is-invalid @enderror"
                                            id="valjalan_darat_roda4" name="valjalan_darat_roda4">
                                            <option value="" disabled selected>Pilih jalan...</option>
                                            <option value="sepanjang tahun"
                                                {{ old('valjalan_darat_roda4') == 'sepanjang tahun' || (isset($rtinfrastuktur) && $rtinfrastuktur->jalan_darat_roda4 == 'sepanjang tahun') ? 'selected' : '' }}>
                                                Sepanjang Tahun</option>
                                            <option value="sepanjang tahun kecuali saat tertentu"
                                                {{ old('valjalan_darat_roda4') == 'sepanjang tahun kecuali saat tertentu' || (isset($rtinfrastuktur) && $rtinfrastuktur->jalan_darat_roda4 == 'sepanjang tahun kecuali saat tertentu') ? 'selected' : '' }}>
                                                Sepanjang Tahun Kecuali Saat Tertentu (Hujan, Pasang, dll)</option>
                                            <option value="selama musim kemarau"
                                                {{ old('valjalan_darat_roda4') == 'selama musim kemarau' || (isset($rtinfrastuktur) && $rtinfrastuktur->jalan_darat_roda4 == 'selama musim kemarau') ? 'selected' : '' }}>
                                                Selama Musim Kemarau</option>
                                            <option value="tidak dapat dilalui sepanjang tahun"
                                                {{ old('valjalan_darat_roda4') == 'tidak dapat dilalui sepanjang tahun' || (isset($rtinfrastuktur) && $rtinfrastuktur->jalan_darat_roda4 == 'tidak dapat dilalui sepanjang tahun') ? 'selected' : '' }}>
                                                Tidak Dapat Dilalui Sepanjang Tahun</option>
                                        </select>


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
                                            <select class="form-control @error('valangkutanumum_trayek') is-invalid @enderror"
                                                id="valangkutanumum_trayek" name="valangkutanumum_trayek">
                                                <option value="" disabled selected>Pilih Trayek...</option>
                                                <option value="trayek tetap"
                                                    {{ old('valangkutanumum_trayek') == 'trayek tetap' || (isset($rtinfrastuktur) && $rtinfrastuktur->angkutanumum_trayek == 'trayek tetap') ? 'selected' : '' }}>
                                                    Trayek Tetap</option>
                                                <option value="trayek tidak tetap"
                                                    {{ old('valangkutanumum_trayek') == 'trayek tidak tetap' || (isset($rtinfrastuktur) && $rtinfrastuktur->angkutanumum_trayek == 'trayek tidak tetap') ? 'selected' : '' }}>
                                                    Trayek Tidak Tetap</option>
                                                <option value="tidak ada angkutan umum"
                                                    {{ old('valangkutanumum_trayek') == 'tidak ada angkutan umum' || (isset($rtinfrastuktur) && $rtinfrastuktur->angkutanumum_trayek == 'tidak ada angkutan umum') ? 'selected' : '' }}>
                                                    Tidak Ada Angkutan Umum</option>
                                            </select>

                                            @error('valangkutanumum_trayek')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valangkutanumum_opra">Operasional Angkutan Umum

                                            </label>
                                            <select class="form-control @error('valangkutanumum_opra') is-invalid @enderror"
                                                id="valangkutanumum_opra" name="valangkutanumum_opra">
                                                <option value="" disabled selected>Pilih Oprational...</option>
                                                <option value="setiap hari"
                                                    {{ old('valangkutanumum_opra') == 'setiap hari' || (isset($rtinfrastuktur) && $rtinfrastuktur->angkutanumum_opra == 'setiap hari') ? 'selected' : '' }}>
                                                    Setiap Hari</option>
                                                <option value="tidak setiap hari"
                                                    {{ old('valangkutanumum_opra') == 'tidak setiap hari' || (isset($rtinfrastuktur) && $rtinfrastuktur->angkutanumum_opra == 'tidak setiap hari') ? 'selected' : '' }}>
                                                    Tidak Setiap Hari</option>
                                            </select>

                                            @error('valangkutanumum_opra')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valangkutanumum_jamopra">Jam Operasional Angkutan Umum

                                            </label>
                                            <select class="form-control @error('valangkutanumum_jamopra') is-invalid @enderror"
                                                id="valangkutanumum_jamopra" name="valangkutanumum_jamopra">
                                                <option value="" disabled selected>Pilih jam...</option>
                                                <option value="siang dan malam"
                                                    {{ old('valangkutanumum_jamopra') == 'siang dan malam' || (isset($rtinfrastuktur) && $rtinfrastuktur->angkutanumum_jamopra == 'siang dan malam') ? 'selected' : '' }}>
                                                    Siang dan Malam Hari</option>
                                                <option value="hanya siang"
                                                    {{ old('valangkutanumum_jamopra') == 'hanya siang' || (isset($rtinfrastuktur) && $rtinfrastuktur->angkutanumum_jamopra == 'hanya siang') ? 'selected' : '' }}>
                                                    Hanya Siang Hari</option>
                                            </select>

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
                                        <select class="form-control @error('valdermaga_laut') is-invalid @enderror"
                                            id="valdermaga_laut" name="valdermaga_laut">
                                            <option value="" disabled selected>Pilih kondisi...</option>
                                            <option value="tidak ada"
                                                {{ old('valdermaga_laut') == 'tidak ada' || (isset($rtinfrastuktur) && $rtinfrastuktur->dermaga_laut == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="ada_kondisi_baik"
                                                {{ old('valdermaga_laut') == 'ada_kondisi_baik' || (isset($rtinfrastuktur) && $rtinfrastuktur->dermaga_laut == 'ada_kondisi_baik') ? 'selected' : '' }}>
                                                Ada, Kondisi Baik</option>
                                            <option value="ada_kondisi_buruk"
                                                {{ old('valdermaga_laut') == 'ada_kondisi_buruk' || (isset($rtinfrastuktur) && $rtinfrastuktur->dermaga_laut == 'ada_kondisi_buruk') ? 'selected' : '' }}>
                                                Ada, Kondisi Buruk</option>
                                        </select>

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
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->sinyalhp_bts ?? '' }}"
                                                class="form-control @error('valsinyalhp_bts') is-invalid @enderror"
                                                id="valsinyalhp_bts" name="valsinyalhp_bts"
                                                placeholder="Berapa kilometer...">
                                            @error('valsinyalhp_bts')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_telkom">TELKOMSEL
                                            </label>
                                            <select class="form-control @error('valsinyalhp_telkom') is-invalid @enderror"
                                                id="valsinyalhp_telkom" name="valsinyalhp_telkom">
                                                <option value="" disabled selected>Pilih jaringan...</option>
                                                <option value="tidak ada sinyal"
                                                    {{ old('valsinyalhp_telkom') == 'tidak ada sinyal' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'tidak ada sinyal') ? 'selected' : '' }}>
                                                    Tidak Ada Sinyal; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat tidak ada internet"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal sangat kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal sangat kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat 4g lte"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal sangat kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal sangat kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 4G/LTE</option>
                                                <option value="sinyal sangat kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal sangat kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal sangat kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal sangat kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal sangat kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal sangat kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal kuat tidak ada internet"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal kuat 4g lte"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 4G/LTE</option>
                                                <option value="sinyal kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal lemah tidak ada internet"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal lemah tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal lemah tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Lemah; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal lemah 4g lte"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal lemah 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal lemah 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 4G/LTE</option>
                                                <option value="sinyal lemah 3g h h+ evdo"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal lemah 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal lemah 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 3G/H/H+/EVDO</option>
                                                <option value="sinyal lemah 2.5g gprs"
                                                    {{ old('valsinyalhp_telkom') == 'sinyal lemah 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_telkom == 'sinyal lemah 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 2.5G/GPRS</option>
                                            </select>

                                            @error('valsinyalhp_telkom')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_indo">INDOSAT

                                            </label>
                                            <select class="form-control @error('valsinyalhp_indo') is-invalid @enderror"
                                                id="valsinyalhp_indo" name="valsinyalhp_indo">
                                                <option value="" disabled selected>Pilih jaringan...</option>
                                                <option value="tidak ada sinyal"
                                                    {{ old('valsinyalhp_indo') == 'tidak ada sinyal' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'tidak ada sinyal') ? 'selected' : '' }}>
                                                    Tidak Ada Sinyal; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat tidak ada internet"
                                                    {{ old('valsinyalhp_indo') == 'sinyal sangat kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal sangat kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat 4g lte"
                                                    {{ old('valsinyalhp_indo') == 'sinyal sangat kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal sangat kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 4G/LTE</option>
                                                <option value="sinyal sangat kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_indo') == 'sinyal sangat kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal sangat kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal sangat kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_indo') == 'sinyal sangat kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal sangat kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal kuat tidak ada internet"
                                                    {{ old('valsinyalhp_indo') == 'sinyal kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal kuat 4g lte"
                                                    {{ old('valsinyalhp_indo') == 'sinyal kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 4G/LTE</option>
                                                <option value="sinyal kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_indo') == 'sinyal kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_indo') == 'sinyal kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal lemah tidak ada internet"
                                                    {{ old('valsinyalhp_indo') == 'sinyal lemah tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal lemah tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Lemah; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal lemah 4g lte"
                                                    {{ old('valsinyalhp_indo') == 'sinyal lemah 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal lemah 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 4G/LTE</option>
                                                <option value="sinyal lemah 3g h h+ evdo"
                                                    {{ old('valsinyalhp_indo') == 'sinyal lemah 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal lemah 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 3G/H/H+/EVDO</option>
                                                <option value="sinyal lemah 2.5g gprs"
                                                    {{ old('valsinyalhp_indo') == 'sinyal lemah 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_indo == 'sinyal lemah 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 2.5G/GPRS</option>
                                            </select>

                                            @error('valsinyalhp_indo')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_xl">XL/AXIS
                                            </label>
                                            <select class="form-control @error('valsinyalhp_xl') is-invalid @enderror"
                                                id="valsinyalhp_xl" name="valsinyalhp_xl">
                                                <option value="" disabled selected>Pilih jaringan...</option>
                                                <option value="tidak ada sinyal"
                                                    {{ old('valsinyalhp_xl') == 'tidak ada sinyal' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'tidak ada sinyal') ? 'selected' : '' }}>
                                                    Tidak Ada Sinyal; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat tidak ada internet"
                                                    {{ old('valsinyalhp_xl') == 'sinyal sangat kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal sangat kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat 4g lte"
                                                    {{ old('valsinyalhp_xl') == 'sinyal sangat kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal sangat kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 4G/LTE</option>
                                                <option value="sinyal sangat kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_xl') == 'sinyal sangat kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal sangat kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal sangat kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_xl') == 'sinyal sangat kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal sangat kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal kuat tidak ada internet"
                                                    {{ old('valsinyalhp_xl') == 'sinyal kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal kuat 4g lte"
                                                    {{ old('valsinyalhp_xl') == 'sinyal kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 4G/LTE</option>
                                                <option value="sinyal kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_xl') == 'sinyal kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_xl') == 'sinyal kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal lemah tidak ada internet"
                                                    {{ old('valsinyalhp_xl') == 'sinyal lemah tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal lemah tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Lemah; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal lemah 4g lte"
                                                    {{ old('valsinyalhp_xl') == 'sinyal lemah 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal lemah 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 4G/LTE</option>
                                                <option value="sinyal lemah 3g h h+ evdo"
                                                    {{ old('valsinyalhp_xl') == 'sinyal lemah 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal lemah 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 3G/H/H+/EVDO</option>
                                                <option value="sinyal lemah 2.5g gprs"
                                                    {{ old('valsinyalhp_xl') == 'sinyal lemah 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_xl == 'sinyal lemah 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 2.5G/GPRS</option>
                                            </select>

                                            @error('valsinyalhp_xl')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_hut">HUTCHISON 3
                                            </label>
                                            <select class="form-control @error('valsinyalhp_hut') is-invalid @enderror"
                                                id="valsinyalhp_hut" name="valsinyalhp_hut">
                                                <option value="" disabled selected>Pilih jaringan...</option>
                                                <option value="tidak ada sinyal"
                                                    {{ old('valsinyalhp_hut') == 'tidak ada sinyal' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'tidak ada sinyal') ? 'selected' : '' }}>
                                                    Tidak Ada Sinyal; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat tidak ada internet"
                                                    {{ old('valsinyalhp_hut') == 'sinyal sangat kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal sangat kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat 4g lte"
                                                    {{ old('valsinyalhp_hut') == 'sinyal sangat kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal sangat kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 4G/LTE</option>
                                                <option value="sinyal sangat kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_hut') == 'sinyal sangat kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal sangat kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal sangat kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_hut') == 'sinyal sangat kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal sangat kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal kuat tidak ada internet"
                                                    {{ old('valsinyalhp_hut') == 'sinyal kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal kuat 4g lte"
                                                    {{ old('valsinyalhp_hut') == 'sinyal kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 4G/LTE</option>
                                                <option value="sinyal kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_hut') == 'sinyal kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_hut') == 'sinyal kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal lemah tidak ada internet"
                                                    {{ old('valsinyalhp_hut') == 'sinyal lemah tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal lemah tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Lemah; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal lemah 4g lte"
                                                    {{ old('valsinyalhp_hut') == 'sinyal lemah 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal lemah 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 4G/LTE</option>
                                                <option value="sinyal lemah 3g h h+ evdo"
                                                    {{ old('valsinyalhp_hut') == 'sinyal lemah 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal lemah 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 3G/H/H+/EVDO</option>
                                                <option value="sinyal lemah 2.5g gprs"
                                                    {{ old('valsinyalhp_hut') == 'sinyal lemah 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_hut == 'sinyal lemah 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 2.5G/GPRS</option>
                                            </select>

                                            @error('valsinyalhp_hut')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_psn">PSN by RU
                                            </label>
                                            <select class="form-control @error('valsinyalhp_psn') is-invalid @enderror"
                                                id="valsinyalhp_psn" name="valsinyalhp_psn">
                                                <option value="" disabled selected>Pilih jaringan...</option>
                                                <option value="tidak ada sinyal"
                                                    {{ old('valsinyalhp_psn') == 'tidak ada sinyal' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'tidak ada sinyal') ? 'selected' : '' }}>
                                                    Tidak Ada Sinyal; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat tidak ada internet"
                                                    {{ old('valsinyalhp_psn') == 'sinyal sangat kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal sangat kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat 4g lte"
                                                    {{ old('valsinyalhp_psn') == 'sinyal sangat kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal sangat kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 4G/LTE</option>
                                                <option value="sinyal sangat kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_psn') == 'sinyal sangat kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal sangat kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal sangat kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_psn') == 'sinyal sangat kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal sangat kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal kuat tidak ada internet"
                                                    {{ old('valsinyalhp_psn') == 'sinyal kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal kuat 4g lte"
                                                    {{ old('valsinyalhp_psn') == 'sinyal kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 4G/LTE</option>
                                                <option value="sinyal kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_psn') == 'sinyal kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_psn') == 'sinyal kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal lemah tidak ada internet"
                                                    {{ old('valsinyalhp_psn') == 'sinyal lemah tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal lemah tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Lemah; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal lemah 4g lte"
                                                    {{ old('valsinyalhp_psn') == 'sinyal lemah 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal lemah 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 4G/LTE</option>
                                                <option value="sinyal lemah 3g h h+ evdo"
                                                    {{ old('valsinyalhp_psn') == 'sinyal lemah 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal lemah 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 3G/H/H+/EVDO</option>
                                                <option value="sinyal lemah 2.5g gprs"
                                                    {{ old('valsinyalhp_psn') == 'sinyal lemah 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_psn == 'sinyal lemah 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 2.5G/GPRS</option>
                                            </select>

                                            @error('valsinyalhp_psn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_smart">SMARTFREN
                                            </label>
                                            <select class="form-control @error('valsinyalhp_smart') is-invalid @enderror"
                                                id="valsinyalhp_smart" name="valsinyalhp_smart">
                                                <option value="" disabled selected>Pilih jaringan...</option>
                                                <option value="tidak ada sinyal"
                                                    {{ old('valsinyalhp_smart') == 'tidak ada sinyal' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'tidak ada sinyal') ? 'selected' : '' }}>
                                                    Tidak Ada Sinyal; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat tidak ada internet"
                                                    {{ old('valsinyalhp_smart') == 'sinyal sangat kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal sangat kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat 4g lte"
                                                    {{ old('valsinyalhp_smart') == 'sinyal sangat kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal sangat kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 4G/LTE</option>
                                                <option value="sinyal sangat kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_smart') == 'sinyal sangat kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal sangat kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal sangat kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_smart') == 'sinyal sangat kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal sangat kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal kuat tidak ada internet"
                                                    {{ old('valsinyalhp_smart') == 'sinyal kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal kuat 4g lte"
                                                    {{ old('valsinyalhp_smart') == 'sinyal kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 4G/LTE</option>
                                                <option value="sinyal kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_smart') == 'sinyal kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_smart') == 'sinyal kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal lemah tidak ada internet"
                                                    {{ old('valsinyalhp_smart') == 'sinyal lemah tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal lemah tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Lemah; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal lemah 4g lte"
                                                    {{ old('valsinyalhp_smart') == 'sinyal lemah 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal lemah 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 4G/LTE</option>
                                                <option value="sinyal lemah 3g h h+ evdo"
                                                    {{ old('valsinyalhp_smart') == 'sinyal lemah 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal lemah 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 3G/H/H+/EVDO</option>
                                                <option value="sinyal lemah 2.5g gprs"
                                                    {{ old('valsinyalhp_smart') == 'sinyal lemah 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_smart == 'sinyal lemah 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 2.5G/GPRS</option>
                                            </select>

                                            @error('valsinyalhp_smart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valsinyalhp_bakrie">BAKRIE TELCOM
                                            </label>
                                            <select class="form-control @error('valsinyalhp_bakrie') is-invalid @enderror"
                                                id="valsinyalhp_bakrie" name="valsinyalhp_bakrie">
                                                <option value="" disabled selected>Pilih jaringan...</option>
                                                <option value="tidak ada sinyal"
                                                    {{ old('valsinyalhp_bakrie') == 'tidak ada sinyal' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'tidak ada sinyal') ? 'selected' : '' }}>
                                                    Tidak Ada Sinyal; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat tidak ada internet"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal sangat kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal sangat kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal sangat kuat 4g lte"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal sangat kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal sangat kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 4G/LTE</option>
                                                <option value="sinyal sangat kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal sangat kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal sangat kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal sangat kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal sangat kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal sangat kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Sangat Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal kuat tidak ada internet"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal kuat tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal kuat tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Kuat; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal kuat 4g lte"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal kuat 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal kuat 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 4G/LTE</option>
                                                <option value="sinyal kuat 3g h h+ evdo"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal kuat 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal kuat 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 3G/H/H+/EVDO</option>
                                                <option value="sinyal kuat 2.5g gprs"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal kuat 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal kuat 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Kuat; 2.5G/GPRS</option>
                                                <option value="sinyal lemah tidak ada internet"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal lemah tidak ada internet' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal lemah tidak ada internet') ? 'selected' : '' }}>
                                                    Sinyal Lemah; Tidak Ada Sinyal Internet</option>
                                                <option value="sinyal lemah 4g lte"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal lemah 4g lte' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal lemah 4g lte') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 4G/LTE</option>
                                                <option value="sinyal lemah 3g h h+ evdo"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal lemah 3g h h+ evdo' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal lemah 3g h h+ evdo') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 3G/H/H+/EVDO</option>
                                                <option value="sinyal lemah 2.5g gprs"
                                                    {{ old('valsinyalhp_bakrie') == 'sinyal lemah 2.5g gprs' || (isset($rtinfrastuktur) && $rtinfrastuktur->sinyalhp_bakrie == 'sinyal lemah 2.5g gprs') ? 'selected' : '' }}>
                                                    Sinyal Lemah; 2.5G/GPRS</option>
                                            </select>

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
                                        <select class="form-control @error('valpos_pembantu') is-invalid @enderror"
                                            id="valpos_pembantu" name="valpos_pembantu">
                                            <option value="" disabled selected>Pilih kodisi...</option>
                                            <option value="tidak ada"
                                                {{ old('valpos_pembantu') == 'tidak ada' || (isset($rtinfrastuktur) && $rtinfrastuktur->pos_pembantu == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="beroperasi"
                                                {{ old('valpos_pembantu') == 'beroperasi' || (isset($rtinfrastuktur) && $rtinfrastuktur->pos_pembantu == 'beroperasi') ? 'selected' : '' }}>
                                                Beroperasi</option>
                                            <option value="jarang_beroperasi"
                                                {{ old('valpos_pembantu') == 'jarang_beroperasi' || (isset($rtinfrastuktur) && $rtinfrastuktur->pos_pembantu == 'jarang_beroperasi') ? 'selected' : '' }}>
                                                Jarang Beroperasi</option>
                                            <option value="tidak_beroperasi"
                                                {{ old('valpos_pembantu') == 'tidak_beroperasi' || (isset($rtinfrastuktur) && $rtinfrastuktur->pos_pembantu == 'tidak_beroperasi') ? 'selected' : '' }}>
                                                Tidak Beroperasi</option>
                                        </select>


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
                                        <select class="form-control @error('valpos_keliling') is-invalid @enderror"
                                            id="valpos_keliling" name="valpos_keliling">
                                            <option value="" disabled selected>Pilih kodisi...</option>
                                            <option value="tidak ada"
                                                {{ old('valpos_keliling') == 'tidak ada' || (isset($rtinfrastuktur) && $rtinfrastuktur->pos_keliling == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="ada"
                                                {{ old('valpos_keliling') == 'ada' || (isset($rtinfrastuktur) && $rtinfrastuktur->topo_terluas_rt == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                        </select>
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
                                        <select class="form-control @error('valagen_jasa') is-invalid @enderror"
                                            id="valagen_jasa" name="valagen_jasa">
                                            <option value="" disabled selected>Pilih kodisi...</option>
                                            <option value="tidak ada"
                                                {{ old('valagen_jasa') == 'tidak ada' || (isset($rtinfrastuktur) && $rtinfrastuktur->agen_jasa == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                            <option value="beroperasi"
                                                {{ old('valagen_jasa') == 'beroperasi' || (isset($rtinfrastuktur) && $rtinfrastuktur->agen_jasa == 'beroperasi') ? 'selected' : '' }}>
                                                Beroperasi</option>
                                            <option value="jarang_beroperasi"
                                                {{ old('valagen_jasa') == 'jarang_beroperasi' || (isset($rtinfrastuktur) && $rtinfrastuktur->agen_jasa == 'jarang_beroperasi') ? 'selected' : '' }}>
                                                Jarang Beroperasi</option>
                                            <option value="tidak_beroperasi"
                                                {{ old('valagen_jasa') == 'tidak_beroperasi' || (isset($rtinfrastuktur) && $rtinfrastuktur->agen_jasa == 'tidak_beroperasi') ? 'selected' : '' }}>
                                                Tidak Beroperasi</option>
                                        </select>

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
                                            <select class="form-control @error('valchanel_tvri') is-invalid @enderror"
                                                id="valchanel_tvri" name="valchanel_tvri">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valchanel_tvri') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_tvri == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valchanel_tvri') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->topo_terluas_rt == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valwaktutempuh_rumahs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_tvri">PERLU PARABOLA
                                            </label>
                                            <select class="form-control @error('valparabola_tvri') is-invalid @enderror"
                                                id="valparabola_tvri" name="valparabola_tvri">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valparabola_tvri') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_tvri == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valparabola_tvri') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_tvri == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>


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
                                            <select class="form-control @error('valchanel_tvrid') is-invalid @enderror"
                                                id="valchanel_tvrid" name="valchanel_tvrid">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valchanel_tvrid') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_tvrid == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valchanel_tvrid') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_tvrid == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valchanel_tvrid')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_tvrid">PERLU PARABOLA


                                            </label>
                                            <select class="form-control @error('valparabola_tvrid') is-invalid @enderror"
                                                id="valparabola_tvrid" name="valparabola_tvrid">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valparabola_tvrid') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_tvrid == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valparabola_tvrid') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_tvrid == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>


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
                                            <select class="form-control @error('valchanel_s') is-invalid @enderror"
                                                id="valchanel_s" name="valchanel_s">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valchanel_s') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_s == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valchanel_s') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_s == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valchanel_s')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_s">PERLU PARABOLA


                                            </label>
                                            <select class="form-control @error('valparabola_s') is-invalid @enderror"
                                                id="valparabola_s" name="valparabola_s">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valparabola_s') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_s == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valparabola_s') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_s == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>


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
                                            <select class="form-control @error('valchanel_ln') is-invalid @enderror"
                                                id="valchanel_ln" name="valchanel_ln">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valchanel_ln') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_ln == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valchanel_ln') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_ln == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valchanel_ln')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_ln">PERLU PARABOLA


                                            </label>
                                            <select class="form-control @error('valparabola_ln') is-invalid @enderror"
                                                id="valparabola_ln" name="valparabola_ln">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valparabola_ln') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_ln == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valparabola_ln') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_ln == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>


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
                                            <select class="form-control @error('valchanel_rri') is-invalid @enderror"
                                                id="valchanel_rri" name="valchanel_rri">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valchanel_rri') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_rri == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valchanel_rri') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_rri == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valchanel_rri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_rri">PERLU PARABOLA


                                            </label>
                                            <select class="form-control @error('valparabola_rri') is-invalid @enderror"
                                                id="valparabola_rri" name="valparabola_rri">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valparabola_rri') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_rri == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valparabola_rri') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_rri == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
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
                                            <select class="form-control @error('valchanel_rrid') is-invalid @enderror"
                                                id="valchanel_rrid" name="valchanel_rrid">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valchanel_rrid') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_rrid == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valchanel_rrid') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_rrid == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valchanel_rrid')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_rrid">PERLU PARABOLA


                                            </label>
                                            <select class="form-control @error('valparabola_rrid') is-invalid @enderror"
                                                id="valparabola_rrid" name="valparabola_rrid">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valparabola_rrid') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_rrid == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valparabola_rrid') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_rrid == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>


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
                                            <select class="form-control @error('valchanel_radios') is-invalid @enderror"
                                                id="valchanel_radios" name="valchanel_radios">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valchanel_radios') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_radios == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valchanel_radios') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_radios == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valchanel_radios')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_radios">PERLU PARABOLA


                                            </label>
                                            <select class="form-control @error('valparabola_radios') is-invalid @enderror"
                                                id="valparabola_radios" name="valparabola_radios">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valparabola_radios') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_radios == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valparabola_radios') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_radios == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>


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
                                            <select class="form-control @error('valchanel_radiok') is-invalid @enderror"
                                                id="valchanel_radiok" name="valchanel_radiok">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valchanel_radiok') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_radiok == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valchanel_radiok') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->chanel_radiok == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valchanel_radiok')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valparabola_radiok">PERLU PARABOLA


                                            </label>
                                            <select class="form-control @error('valparabola_radiok') is-invalid @enderror"
                                                id="valparabola_radiok" name="valparabola_radiok">
                                                <option value="" disabled selected>Pilih Ya/Tidak...
                                                </option>
                                                <option value="ya"
                                                    {{ old('valparabola_radiok') == 'ya' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_radiok == 'ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="tidak"
                                                    {{ old('valparabola_radiok') == 'tidak' || (isset($rtinfrastuktur) && $rtinfrastuktur->parabola_radiok == 'tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>


                                            @error('valparabola_radiok')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_lokasi_air">JUMLAH LOKASI PEMUKIMAN LIAR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rtinfrastuktur->jumlah_lokasi_air ?? '' }}"
                                            class="form-control @error('valjumlah_lokasi_air') is-invalid @enderror"
                                            id="valjumlah_lokasi_air" name="valjumlah_lokasi_air" placeholder="Jumlah...">
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
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->fasilitas_umump_pasar ?? '' }}"
                                                class="form-control @error('valfasilitas_umump_pasar') is-invalid @enderror"
                                                id="valfasilitas_umump_pasar" name="valfasilitas_umump_pasar"
                                                placeholder="jumlah...">
                                            @error('valfasilitas_umump_pasar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_stasiun">STASIUN

                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->fasilitas_umump_stasiun ?? '' }}"
                                                class="form-control @error('valfasilitas_umump_stasiun') is-invalid @enderror"
                                                id="valfasilitas_umump_stasiun" name="valfasilitas_umump_stasiun"
                                                placeholder="jumlah...">
                                            @error('valfasilitas_umump_stasiun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_terminal">TERMINAL

                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->fasilitas_umump_terminal ?? '' }}"
                                                class="form-control @error('valfasilitas_umump_terminal') is-invalid @enderror"
                                                id="valfasilitas_umump_terminal" name="valfasilitas_umump_terminal"
                                                placeholder="jumlah...">
                                            @error('valfasilitas_umump_terminal')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_kolong">KOLONG JEMBATAN
                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->fasilitas_umump_kolong ?? '' }}"
                                                class="form-control @error('valfasilitas_umump_kolong') is-invalid @enderror"
                                                id="valfasilitas_umump_kolong" name="valfasilitas_umump_kolong"
                                                placeholder="jumlah...">
                                            @error('valfasilitas_umump_kolong')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valfasilitas_umump_pelabuhan">PELABUHAN
                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->fasilitas_umump_pelabuhan ?? '' }}"
                                                class="form-control @error('valfasilitas_umump_pelabuhan') is-invalid @enderror"
                                                id="valfasilitas_umump_pelabuhan" name="valfasilitas_umump_pelabuhan"
                                                placeholder="jumlah...">
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
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->pemukiman_khusus_mewah ?? '' }}"
                                                class="form-control @error('valpemukiman_khusus_mewah') is-invalid @enderror"
                                                id="valpemukiman_khusus_mewah" name="valpemukiman_khusus_mewah"
                                                placeholder="jumlah...">
                                            @error('valpemukiman_khusus_mewah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_apart">APARTEMEN


                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->pemukiman_khusus_apart ?? '' }}"
                                                class="form-control @error('valpemukiman_khusus_apart') is-invalid @enderror"
                                                id="valpemukiman_khusus_apart" name="valpemukiman_khusus_apart"
                                                placeholder="jumlah...">
                                            @error('valpemukiman_khusus_apart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_susun">RUMAH SUSUN


                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->pemukiman_khusus_susun ?? '' }}"
                                                class="form-control @error('valpemukiman_khusus_susun') is-invalid @enderror"
                                                id="valpemukiman_khusus_susun" name="valpemukiman_khusus_susun"
                                                placeholder="jumlah...">
                                            @error('valpemukiman_khusus_susun')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_school">BOARDING SCHOOL


                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->pemukiman_khusus_school ?? '' }}"
                                                class="form-control @error('valpemukiman_khusus_school') is-invalid @enderror"
                                                id="valpemukiman_khusus_school" name="valpemukiman_khusus_school"
                                                placeholder="jumlah...">
                                            @error('valpemukiman_khusus_school')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_kos"> KOS-KOSAN

                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->pemukiman_khusus_kos ?? '' }}"
                                                class="form-control @error('valpemukiman_khusus_kos') is-invalid @enderror"
                                                id="valpemukiman_khusus_kos" name="valpemukiman_khusus_kos"
                                                placeholder="jumlah...">
                                            @error('valpemukiman_khusus_kos')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_asrama"> ASRAMA/ BARAK MILITIER


                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->pemukiman_khusus_asrama ?? '' }}"
                                                class="form-control @error('valpemukiman_khusus_asrama') is-invalid @enderror"
                                                id="valpemukiman_khusus_asrama" name="valpemukiman_khusus_asrama"
                                                placeholder="jumlah...">
                                            @error('valpemukiman_khusus_asrama')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemukiman_khusus_lp"> LP / RUTAN


                                            </label>
                                            <input type="number"
                                                value="{{ $rtinfrastuktur->pemukiman_khusus_lp ?? '' }}"
                                                class="form-control @error('valpemukiman_khusus_lp') is-invalid @enderror"
                                                id="valpemukiman_khusus_lp" name="valpemukiman_khusus_lp"
                                                placeholder="jumlah...">
                                            @error('valpemukiman_khusus_lp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah kamu sudah yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmSave">Yakin</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('confirmSave').addEventListener('click', function() {
            document.getElementById('form-edit-rtinfras').submit();
        });
    </script>
@endsection
