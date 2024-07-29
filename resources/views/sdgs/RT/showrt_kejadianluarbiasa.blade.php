 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">KEJADIAN LUAR BIASA
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_kejadianluarbiasa.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_kejadianluarbiasa.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">MUNTABER/DIARE
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_muntaber">KEJADIAN
                                            </label>


                                            @if (isset($rt_kejadianluarbiasa->nama_muntaber))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_muntaber }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_muntaber')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_muntaber">JUMLAH PENDERITA
                                            </label>

                                            @if (isset($rt_kejadianluarbiasa->jp_muntaber))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_muntaber }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjp_muntaber')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_muntaber">JUMLAH MENINGGAL

                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->jm_muntaber))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_muntaber }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_muntaber')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">DEMAM BERDARAH

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_dbd">KEJADIAN
                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->nama_dbd))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_dbd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_dbd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_dbd">JUMLAH PENDERITA
                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jp_dbd))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_dbd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjp_dbd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_dbd">JUMLAH MENINGGAL

                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jm_dbd))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_dbd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_dbd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">CAMPAK

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_campak">KEJADIAN
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->nama_campak))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_campak }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_campak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_campak">JUMLAH PENDERITA
                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jp_campak))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_campak }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjp_campak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_campak">JUMLAH MENINGGAL

                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jm_campak))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_campak }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_campak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">MALARIA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_malaria">KEJADIAN
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->nama_malaria))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_malaria }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_malaria')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_malaria">JUMLAH PENDERITA
                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jp_malaria))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_malaria }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_malaria')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_malaria">JUMLAH MENINGGAL

                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jm_malaria))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_malaria }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_malaria')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">FLU BURUNG/SARS

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_fluburung">KEJADIAN
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->nama_fluburung))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_fluburung }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_fluburung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_fluburung">JUMLAH PENDERITA
                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jp_fluburung))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_fluburung }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjp_fluburung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_fluburung">JUMLAH MENINGGAL

                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->jm_fluburung))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_fluburung }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_fluburung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">COVID-19

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_covid19">KEJADIAN
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->nama_covid19))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_covid19 }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valnama_covid19')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_covid19">JUMLAH PENDERITA
                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jp_covid19))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_covid19 }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjp_covid19')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_covid19">JUMLAH MENINGGAL

                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jm_covid19))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_covid19 }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_covid19')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">HEPATITIS B

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_hepatitisb">KEJADIAN
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->nama_hepatitisb))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_hepatitisb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_hepatitisb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_hepatitisb">JUMLAH PENDERITA
                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jp_hepatitisb))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_hepatitisb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_hepatitisb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_hepatitisb">JUMLAH MENINGGAL

                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jm_hepatitisb))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_hepatitisb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_hepatitisb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">HEPATITIS E

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_hepatitise">KEJADIAN
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->nama_hepatitise))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_hepatitise }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_hepatitise')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_hepatitise">JUMLAH PENDERITA
                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jp_hepatitise))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_hepatitise }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_hepatitise')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_hepatitise">JUMLAH MENINGGAL

                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jm_hepatitise))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_hepatitise }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_hepatitise')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">DIPTERI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_dipteri">KEJADIAN
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->nama_dipteri))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_dipteri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_dipteri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_dipteri">JUMLAH PENDERITA
                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->jp_dipteri))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_dipteri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_dipteri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_dipteri">JUMLAH MENINGGAL

                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jm_dipteri))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_dipteri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_dipteri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">CHIKUNGUNYA
                                        <span class="text-danger">*</span></label>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_chikung">KEJADIAN
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->nama_chikung))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_chikung }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valnama_chikung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_chikung">JUMLAH PENDERITA
                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jp_chikung))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_chikung }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjp_chikung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_chikung">JUMLAH MENINGGAL
                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jm_chikung))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_chikung }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_chikung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">LEPTOSPIROSIS
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_leptos">KEJADIAN
                                            </label>
                                             @if (isset($rt_kejadianluarbiasa->nama_lepto))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_lepto }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_leptos')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_leptos">JUMLAH PENDERITA
                                            </label>
                                            @if (isset($rt_kejadianluarbiasa->jp_lepto))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_lepto }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjp_leptos')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="valjm_leptos">JUMLAH MENINGGAL

                                            </label>
                                              @if (isset($rt_kejadianluarbiasa->jm_lepto))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_lepto }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjm_leptos')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>





                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">KOLERA
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="valnama_kolera">KEJADIAN
                                    </label>
                                     @if (isset($rt_kejadianluarbiasa->nama_kolera))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_kolera }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                    @error('valnama_kolera')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="valjp_kolera">JUMLAH PENDERITA
                                    </label>
                                    @if (isset($rt_kejadianluarbiasa->jp_kolera))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_kolera }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                    @error('valjp_kolera')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="valjm_kolera">JUMLAH MENINGGAL

                                    </label>
                                     @if (isset($rt_kejadianluarbiasa->jm_kolera))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_kolera }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                    @error('valjm_kolera')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">GIZI BURUK (MARASMUS KWASHIORKOR)
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="valnama_giziburuk">KEJADIAN
                                    </label>
                                    @if (isset($rt_kejadianluarbiasa->nama_giziburuk))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_giziburuk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                    @error('valnama_giziburuk')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="valjp_giziburuk">JUMLAH PENDERITA
                                    </label>
                                      @if (isset($rt_kejadianluarbiasa->jp_giziburuk))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_giziburuk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                    @error('valjp_giziburuk')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="valjm_giziburuk">JUMLAH MENINGGAL

                                    </label>
                                     @if (isset($rt_kejadianluarbiasa->jm_giziburuk))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_giziburuk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                    @error('valjm_giziburuk')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">LAINNYA

                                <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="valnama_lainnya">KEJADIAN
                                    </label>
                                   @if (isset($rt_kejadianluarbiasa->nama_lainnya))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->nama_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                    @error('valnama_lainnya')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="valjp_lainnya">JUMLAH PENDERITA
                                    </label>
                                     @if (isset($rt_kejadianluarbiasa->jp_lainnya))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jp_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                    @error('valjp_lainnya')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="valjm_lainnya">JUMLAH MENINGGAL

                                    </label>
                                     @if (isset($rt_kejadianluarbiasa->jm_lainnya))
                                                <br>
                                                {{ $rt_kejadianluarbiasa->jm_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                    @error('valjm_lainnya')
                                        <div id="" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
