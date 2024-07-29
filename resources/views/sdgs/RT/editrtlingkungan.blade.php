 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LINGKUNGAN RT
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtlingkungan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtlingkungan.update') }}" method="POST" id="form-edit-rtlingkungan">
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
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_lsi">LAHAN SAWAH IRIGASI (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_lsi ?? '' }}"
                                            class="form-control @error('vallingkungan_lsi') is-invalid @enderror"
                                            id="vallingkungan_lsi" name="vallingkungan_lsi" placeholder="lingkungan...">
                                        @error('vallingkungan_lsi')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_slno">LAHAN SAWAH NON IRIGASI
                                        (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_slno ?? '' }}"
                                            class="form-control @error('vallingkungan_slno') is-invalid @enderror"
                                            id="vallingkungan_slno" name="vallingkungan_slno" placeholder="lingkungan...">
                                        @error('vallingkungan_slno')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_k">KEBUN (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_k ?? '' }}"
                                            class="form-control @error('vallingkungan_k') is-invalid @enderror"
                                            id="vallingkungan_k" name="vallingkungan_k" placeholder="lingkungan...">
                                        @error('vallingkungan_k')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_hl">HUMA / LADANG (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_hl ?? '' }}"
                                            class="form-control @error('vallingkungan_hl') is-invalid @enderror"
                                            id="vallingkungan_hl" name="vallingkungan_hl" placeholder="lingkungan...">
                                        @error('vallingkungan_hl')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_t">TAMBAK (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_t ?? '' }}"
                                            class="form-control @error('vallingkungan_t') is-invalid @enderror"
                                            id="vallingkungan_t" name="vallingkungan_t" placeholder="lingkungan...">
                                        @error('vallingkungan_t')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_kte">KOLAM / TEBAT / EMPANG
                                        (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_kte ?? '' }}"
                                            class="form-control @error('vallingkungan_kte') is-invalid @enderror"
                                            id="vallingkungan_kte" name="vallingkungan_kte" placeholder="lingkungan...">
                                        @error('vallingkungan_kte')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_lgt">LAHAN GEMBALA TERNAK
                                        (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_lgt ?? '' }}"
                                            class="form-control @error('vallingkungan_lgt') is-invalid @enderror"
                                            id="vallingkungan_lgt" name="vallingkungan_lgt" placeholder="lingkungan...">
                                        @error('vallingkungan_lgt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_lpp">LAHAN PERUSAHAAN
                                        PERKEBUNAN (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_lpp ?? '' }}"
                                            class="form-control @error('vallingkungan_lpp') is-invalid @enderror"
                                            id="vallingkungan_lpp" name="vallingkungan_lpp" placeholder="lingkungan...">
                                        @error('vallingkungan_lpp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_ah">AREA HUTAN (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_ah ?? '' }}"
                                            class="form-control @error('vallingkungan_ah') is-invalid @enderror"
                                            id="vallingkungan_ah" name="vallingkungan_ah" placeholder="lingkungan...">
                                        @error('vallingkungan_ah')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_lpns">LAHAN PERTANIAN NON
                                        SAWAH LAINNYA (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_lpns ?? '' }}"
                                            class="form-control @error('vallingkungan_lpns') is-invalid @enderror"
                                            id="vallingkungan_lpns" name="vallingkungan_lpns"
                                            placeholder="lingkungan...">
                                        @error('vallingkungan_lpns')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_lpertambangan">LAHAN
                                        PERTAMBANGAN (Ha)


                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text"
                                            value="{{ $rt_lingkungan->lingkungan_lpertambangan ?? '' }}"
                                            class="form-control @error('vallingkungan_lpertambangan') is-invalid @enderror"
                                            id="vallingkungan_lpertambangan" name="vallingkungan_lpertambangan"
                                            placeholder="lingkungan...">
                                        @error('vallingkungan_lpertambangan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_lperumahan">LAHAN PERUMAHAN
                                        (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_lperumahan ?? '' }}"
                                            class="form-control @error('vallingkungan_lperumahan') is-invalid @enderror"
                                            id="vallingkungan_lperumahan" name="vallingkungan_lperumahan"
                                            placeholder="lingkungan...">
                                        @error('vallingkungan_lperumahan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_lperkantoran">LAHAN
                                        PERKANTORAN (Ha)

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_lperkantoran ?? '' }}"
                                            class="form-control @error('vallingkungan_lperkantoran') is-invalid @enderror"
                                            id="vallingkungan_lperkantoran" name="vallingkungan_lperkantoran"
                                            placeholder="lingkungan...">
                                        @error('vallingkungan_lperkantoran')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_lindustri">LAHAN INDUSTRI
                                        (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_lindustri ?? '' }}"
                                            class="form-control @error('vallingkungan_lindustri') is-invalid @enderror"
                                            id="vallingkungan_lindustri" name="vallingkungan_lindustri"
                                            placeholder="lingkungan...">
                                        @error('vallingkungan_lindustri')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_fu">FASILITAS UMUM
                                        (Lapangan, Jalan, dll) (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_fu ?? '' }}"
                                            class="form-control @error('vallingkungan_fu') is-invalid @enderror"
                                            id="vallingkungan_fu" name="vallingkungan_fu" placeholder="lingkungan...">
                                        @error('vallingkungan_fu')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_ll">LAHAN LAINNYA (Ha)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_ll ?? '' }}"
                                            class="form-control @error('vallingkungan_ll') is-invalid @enderror"
                                            id="vallingkungan_ll" name="vallingkungan_ll" placeholder="lingkungan...">
                                        @error('vallingkungan_ll')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_nsym">NAMA SUNGAI YANG
                                        MELINTASI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_nsym ?? '' }}"
                                            class="form-control @error('vallingkungan_nsym') is-invalid @enderror"
                                            id="vallingkungan_nsym" name="vallingkungan_nsym"
                                            placeholder="lingkungan...">
                                        @error('vallingkungan_nsym')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_ndws">NAMA DANAU / WADUK /
                                        SITU
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_ndws ?? '' }}"
                                            class="form-control @error('vallingkungan_ndws') is-invalid @enderror"
                                            id="vallingkungan_ndws" name="vallingkungan_ndws"
                                            placeholder="lingkungan...">
                                        @error('vallingkungan_ndws')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_jma">JUMLAH MATA AIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_jma ?? '' }}"
                                            class="form-control @error('vallingkungan_jma') is-invalid @enderror"
                                            id="vallingkungan_jma" name="vallingkungan_jma" placeholder="lingkungan...">
                                        @error('vallingkungan_jma')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_je">JUMLAH EMBUNG
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rt_lingkungan->lingkungan_je ?? '' }}"
                                            class="form-control @error('vallingkungan_je') is-invalid @enderror"
                                            id="vallingkungan_je" name="vallingkungan_je" placeholder="lingkungan...">
                                        @error('vallingkungan_je')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_ksb">KETERSEDIAAN SUMUR BOR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('vallingkungan_ksb') is-invalid @enderror"
                                            id="vallingkungan_ksb" name="vallingkungan_ksb">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="tidak ada"
                                                {{ old('vallingkungan_ksb') == 'tidak ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ksb == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                            <option value="ada"
                                                {{ old('vallingkungan_ksb') == 'ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ksb == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                        </select>
                                        @error('vallingkungan_ksb')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_ks">KONDISI SUNGAI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('vallingkungan_ks') is-invalid @enderror"
                                            id="vallingkungan_ks" name="vallingkungan_ks">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="tidak ada"
                                                {{ old('vallingkungan_ks') == 'tidak ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ks == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                            <option value="kondisi baik"
                                                {{ old('vallingkungan_ks') == 'kondisi baik' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ks == 'kondisi baik') ? 'selected' : '' }}>
                                                Kondisi Baik</option>
                                            <option value="tercemar"
                                                {{ old('vallingkungan_ks') == 'tercemar' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ks == 'tercemar') ? 'selected' : '' }}>
                                                Tercemar</option>
                                        </select>

                                        @error('vallingkungan_ks')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_ki">KONDISI IRIGASI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('vallingkungan_ki') is-invalid @enderror"
                                            id="vallingkungan_ki" name="vallingkungan_ki">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="tidak ada"
                                                {{ old('vallingkungan_ki') == 'tidak ada' || (isset($rt_lingkungan) && $rt_lingkungan->ketergantungan_hutan == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                            <option value="kondisi baik"
                                                {{ old('vallingkungan_ki') == 'kondisi baik' || (isset($rt_lingkungan) && $rt_lingkungan->ketergantungan_hutan == 'kondisi baik') ? 'selected' : '' }}>
                                                Kondisi Baik</option>
                                            <option value="tercemar"
                                                {{ old('vallingkungan_ki') == 'tercemar' || (isset($rt_lingkungan) && $rt_lingkungan->ketergantungan_hutan == 'tercemar') ? 'selected' : '' }}>
                                                Tercemar</option>
                                        </select>

                                        @error('vallingkungan_ki')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_kd">KONDISI DANAU
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('vallingkungan_kd') is-invalid @enderror"
                                            id="vallingkungan_kd" name="vallingkungan_kd">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="tidak ada"
                                                {{ old('vallingkungan_kd') == 'tidak ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_kd == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                            <option value="kondisi baik"
                                                {{ old('vallingkungan_kd') == 'kondisi baik' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_kd == 'kondisi baik') ? 'selected' : '' }}>
                                                Kondisi Baik</option>
                                            <option value="tercemar"
                                                {{ old('vallingkungan_kd') == 'tercemar' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_kd == 'tercemar') ? 'selected' : '' }}>
                                                Tercemar</option>
                                        </select>

                                        @error('vallingkungan_kd')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_ke">KONDISI EMBUNG
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('vallingkungan_ke') is-invalid @enderror"
                                            id="vallingkungan_ke" name="vallingkungan_ke">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="tidak ada"
                                                {{ old('vallingkungan_ke') == 'tidak ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ke == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                            <option value="kondisi baik"
                                                {{ old('vallingkungan_ke') == 'kondisi baik' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ke == 'kondisi baik') ? 'selected' : '' }}>
                                                Kondisi Baik</option>
                                            <option value="tercemar"
                                                {{ old('vallingkungan_ke') == 'tercemar' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ke == 'tercemar') ? 'selected' : '' }}>
                                                Tercemar</option>
                                        </select>

                                        @error('vallingkungan_ke')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENCEMARAN 1 TAHUN TERAKHIR
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="vallingkungan_pair">AIR</label>
                                            <select class="form-control @error('vallingkungan_pair') is-invalid @enderror" id="vallingkungan_pair"
                                            name="vallingkungan_pair">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="tidak ada"
                                                {{ old('vallingkungan_pair') == 'tidak ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_pair == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                            <option value="ada"
                                                {{ old('vallingkungan_pair') == 'ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_pair == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                        </select>
                                            @error('vallingkungan_pair')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vallingkungan_ptanah">TANAH</label>
                                            <select class="form-control @error('vallingkungan_ptanah') is-invalid @enderror" id="vallingkungan_ptanah"
                                            name="vallingkungan_ptanah">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="tidak ada"
                                                {{ old('vallingkungan_ptanah') == 'tidak ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ptanah == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                            <option value="ada"
                                                {{ old('vallingkungan_ptanah') == 'ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_ptanah == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                        </select>
                                            @error('vallingkungan_ptanah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vallingkungan_pudara">UDARA</label>
                                            <select class="form-control @error('vallingkungan_pudara') is-invalid @enderror" id="vallingkungan_pudara"
                                            name="vallingkungan_pudara">

                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="tidak ada"
                                                {{ old('vallingkungan_pudara') == 'tidak ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_pudara == 'tidak ada') ? 'selected' : '' }}>
                                                Tidak ada</option>
                                            <option value="ada"
                                                {{ old('vallingkungan_pudara') == 'ada' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_pudara == 'ada') ? 'selected' : '' }}>
                                                Ada</option>
                                        </select>
                                            @error('vallingkungan_pudara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_pdusl">PENGOLAHAN / DAUR ULANG SAMPAH / LIMBAH
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('vallingkungan_pdusl') is-invalid @enderror"
                                        id="vallingkungan_pdusl" name="vallingkungan_pdusl">

                                        <option value="" disabled selected>Pilih...</option>
                                        <option value="ada sebagian warga terlibat"
                                            {{ old('vallingkungan_pdusl') == 'ada sebagian warga terlibat' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_pdusl == 'ada sebagian warga terlibat') ? 'selected' : '' }}>
                                            Ada, sebagian warga terlibat</option>
                                        <option value="ada-warga-tidak-terlibat"
                                            {{ old('vallingkungan_pdusl') == 'ada-warga-tidak-terlibat' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_pdusl == 'ada-warga-tidak-terlibat') ? 'selected' : '' }}>
                                            Ada, warga tidak terlibat</option>
                                        <option value="tidak ada kegiatan"
                                            {{ old('vallingkungan_pdusl') == 'tidak ada kegiatan' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_pdusl == 'tidak ada kegiatan') ? 'selected' : '' }}>
                                            Tidak ada kegiatan</option>
                                    </select>

                                        @error('vallingkungan_pdusl')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_kmml">KEBIASAAN MASYARAKAT MEMBAKAR LADANG UNTUK PROSES USAHA PERTANIAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('vallingkungan_kmml') is-invalid @enderror"
                                        id="vallingkungan_kmml" name="vallingkungan_kmml">

                                        <option value="" disabled selected>Pilih...</option>
                                        <option value="ya"
                                            {{ old('vallingkungan_kmml') == 'ya' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_kmml == 'ya') ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="tidak"
                                            {{ old('vallingkungan_kmml') == 'tidak' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_kmml == 'tidak') ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                        @error('vallingkungan_kmml')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="vallingkungan_klpg">KEBERADAAN LOKASI PENGGALIAN GOLONGAN C
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('vallingkungan_klpg') is-invalid @enderror"
                                        id="vallingkungan_klpg" name="vallingkungan_klpg">

                                        <option value="" disabled selected>Pilih...</option>
                                        <option value="ya"
                                            {{ old('vallingkungan_klpg') == 'ya' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_klpg == 'ya') ? 'selected' : '' }}>
                                            Ya</option>
                                        <option value="tidak"
                                            {{ old('vallingkungan_klpg') == 'tidak' || (isset($rt_lingkungan) && $rt_lingkungan->lingkungan_klpg == 'tidak') ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                        @error('vallingkungan_klpg')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
            document.getElementById('form-edit-rtlingkungan').submit();
        });
    </script>

@endsection
