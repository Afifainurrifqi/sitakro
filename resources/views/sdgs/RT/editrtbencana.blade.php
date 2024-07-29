 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT BENCANA
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtbencana.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtbencana.update') }}" method="POST" id="form-edit-rtbencana">
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
                                    <label class="col-lg-4 col-form-label">TANAH LONGSOR
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_longsor">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_longsor') is-invalid @enderror"
                                                id="valk_longsor" name="valk_longsor">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_longsor') == 'ada' || (isset($rtbencana) && $rtbencana->k_longsor == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_longsor') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_longsor == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_longsor')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_longsor">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_longsor ?? '' }}"
                                                class="form-control @error('valf_longsor') is-invalid @enderror"
                                                id="valf_longsor" name="valf_longsor" placeholder="Jumlah...">
                                            @error('valf_longsor')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_longsor">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_longsor ?? '' }}"
                                                class="form-control @error('valkj_longsor') is-invalid @enderror"
                                                id="valkj_longsor" name="valkj_longsor" placeholder="Jumlah...">
                                            @error('valkj_longsor')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_longsor">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_longsor ?? '' }}"
                                                class="form-control @error('valjp_longsor') is-invalid @enderror"
                                                id="valjp_longsor" name="valjp_longsor" placeholder="Jumlah...">
                                            @error('valjp_longsor')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_longsor">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_longsor ?? '' }}"
                                                class="form-control @error('valwt_longsor') is-invalid @enderror"
                                                id="valwt_longsor" name="valwt_longsor" placeholder="Jumlah...">
                                            @error('valwt_longsor')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANJIR

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_banjir">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_banjir') is-invalid @enderror"
                                                id="valk_banjir" name="valk_banjir">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_banjir') == 'ada' || (isset($rtbencana) && $rtbencana->k_banjir == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_banjir') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_banjir == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_banjir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_banjir">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_banjir ?? '' }}"
                                                class="form-control @error('valf_banjir') is-invalid @enderror"
                                                id="valf_banjir" name="valf_banjir" placeholder="Jumlah...">
                                            @error('valf_banjir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_banjir">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_banjir ?? '' }}"
                                                class="form-control @error('valkj_banjir') is-invalid @enderror"
                                                id="valkj_banjir" name="valkj_banjir" placeholder="Jumlah...">
                                            @error('valkj_banjir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_banjir">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_banjir ?? '' }}"
                                                class="form-control @error('valjp_banjir') is-invalid @enderror"
                                                id="valjp_banjir" name="valjp_banjir" placeholder="Jumlah...">
                                            @error('valjp_banjir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_banjir">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_banjir ?? '' }}"
                                                class="form-control @error('valwt_banjir') is-invalid @enderror"
                                                id="valwt_banjir" name="valwt_banjir" placeholder="Jumlah...">
                                            @error('valwt_banjir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANJIR BANDANG

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_bandang">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_bandang') is-invalid @enderror"
                                                id="valk_bandang" name="valk_bandang">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_bandang') == 'ada' || (isset($rtbencana) && $rtbencana->k_bandang == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_bandang') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_bandang == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_bandang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_bandang">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_bandang ?? '' }}"
                                                class="form-control @error('valf_bandang') is-invalid @enderror"
                                                id="valf_bandang" name="valf_bandang" placeholder="Jumlah...">
                                            @error('valf_bandang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_bandang">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_bandang ?? '' }}"
                                                class="form-control @error('valkj_bandang') is-invalid @enderror"
                                                id="valkj_bandang" name="valkj_bandang" placeholder="Jumlah...">
                                            @error('valkj_bandang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_bandang">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_bandang ?? '' }}"
                                                class="form-control @error('valjp_bandang') is-invalid @enderror"
                                                id="valjp_bandang" name="valjp_bandang" placeholder="Jumlah...">
                                            @error('valjp_bandang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_bandang">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_bandang ?? '' }}"
                                                class="form-control @error('valwt_bandang') is-invalid @enderror"
                                                id="valwt_bandang" name="valwt_bandang" placeholder="Jumlah...">
                                            @error('valwt_bandang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">GEMPA BUMI
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_gempa">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_gempa') is-invalid @enderror"
                                                id="valk_gempa" name="valk_gempa">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_gempa') == 'ada' || (isset($rtbencana) && $rtbencana->k_gempa == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_gempa') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_gempa == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_gempa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_gempa">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_gempa ?? '' }}"
                                                class="form-control @error('valf_gempa') is-invalid @enderror"
                                                id="valf_gempa" name="valf_gempa" placeholder="Jumlah...">
                                            @error('valf_gempa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_gempa">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_gempa ?? '' }}"
                                                class="form-control @error('valkj_gempa') is-invalid @enderror"
                                                id="valkj_gempa" name="valkj_gempa" placeholder="Jumlah...">
                                            @error('valkj_gempa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_gempa">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_gempa ?? '' }}"
                                                class="form-control @error('valjp_gempa') is-invalid @enderror"
                                                id="valjp_gempa" name="valjp_gempa" placeholder="Jumlah...">
                                            @error('valjp_gempa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_gempa">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_gempa ?? '' }}"
                                                class="form-control @error('valwt_gempa') is-invalid @enderror"
                                                id="valwt_gempa" name="valwt_gempa" placeholder="Jumlah...">
                                            @error('valwt_gempa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TSUNAMI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_tsunami">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_tsunami') is-invalid @enderror"
                                                id="valk_tsunami" name="valk_tsunami">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_tsunami') == 'ada' || (isset($rtbencana) && $rtbencana->k_tsunami == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_tsunami') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_tsunami == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_tsunami')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_tsunami">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_tsunami ?? '' }}"
                                                class="form-control @error('valf_tsunami') is-invalid @enderror"
                                                id="valf_tsunami" name="valf_tsunami" placeholder="Jumlah...">
                                            @error('valf_tsunami')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_tsunami">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_tsunami ?? '' }}"
                                                class="form-control @error('valkj_tsunami') is-invalid @enderror"
                                                id="valkj_tsunami" name="valkj_tsunami" placeholder="Jumlah...">
                                            @error('valkj_tsunami')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tsunami">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_tsunami ?? '' }}"
                                                class="form-control @error('valjp_tsunami') is-invalid @enderror"
                                                id="valjp_tsunami" name="valjp_tsunami" placeholder="Jumlah...">
                                            @error('valjp_tsunami')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_tsunami">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_tsunami ?? '' }}"
                                                class="form-control @error('valwt_tsunami') is-invalid @enderror"
                                                id="valwt_tsunami" name="valwt_tsunami" placeholder="Jumlah...">
                                            @error('valwt_tsunami')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANGIN PUYUH / PUTING BELIUNG / TOPAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_puyuh">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_puyuh') is-invalid @enderror"
                                                id="valk_puyuh" name="valk_puyuh">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_puyuh') == 'ada' || (isset($rtbencana) && $rtbencana->k_puyuh == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_puyuh') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_puyuh == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_puyuh')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_puyuh">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_puyuh ?? '' }}"
                                                class="form-control @error('valf_puyuh') is-invalid @enderror"
                                                id="valf_puyuh" name="valf_puyuh" placeholder="Jumlah...">
                                            @error('valf_puyuh')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_puyuh">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_puyuh ?? '' }}"
                                                class="form-control @error('valkj_puyuh') is-invalid @enderror"
                                                id="valkj_puyuh" name="valkj_puyuh" placeholder="Jumlah...">
                                            @error('valkj_puyuh')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_puyuh">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_puyuh ?? '' }}"
                                                class="form-control @error('valjp_puyuh') is-invalid @enderror"
                                                id="valjp_puyuh" name="valjp_puyuh" placeholder="Jumlah...">
                                            @error('valjp_puyuh')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_puyuh">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_puyuh ?? '' }}"
                                                class="form-control @error('valwt_puyuh') is-invalid @enderror"
                                                id="valwt_puyuh" name="valwt_puyuh" placeholder="Jumlah...">
                                            @error('valwt_puyuh')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">GUNUNG MELETUS

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_gunungm">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_gunungm') is-invalid @enderror"
                                                id="valk_gunungm" name="valk_gunungm">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_gunungm') == 'ada' || (isset($rtbencana) && $rtbencana->k_gunungm == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_gunungm') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_gunungm == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_gunungm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_gunungm">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_gunungm ?? '' }}"
                                                class="form-control @error('valf_gunungm') is-invalid @enderror"
                                                id="valf_gunungm" name="valf_gunungm" placeholder="Jumlah...">
                                            @error('valf_gunungm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_gunungm">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_gunungm ?? '' }}"
                                                class="form-control @error('valkj_gunungm') is-invalid @enderror"
                                                id="valkj_gunungm" name="valkj_gunungm" placeholder="Jumlah...">
                                            @error('valkj_gunungm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_gunungm">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_gunungm ?? '' }}"
                                                class="form-control @error('valjp_gunungm') is-invalid @enderror"
                                                id="valjp_gunungm" name="valjp_gunungm" placeholder="Jumlah...">
                                            @error('valjp_gunungm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_gunungm">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_gunungm ?? '' }}"
                                                class="form-control @error('valwt_gunungm') is-invalid @enderror"
                                                id="valwt_gunungm" name="valwt_gunungm" placeholder="Jumlah...">
                                            @error('valwt_gunungm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEBAKARAN HUTAN / LAHAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_hutank">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_hutank') is-invalid @enderror"
                                                id="valk_hutank" name="valk_hutank">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_hutank') == 'ada' || (isset($rtbencana) && $rtbencana->k_hutank == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_hutank') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_hutank == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_hutank')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_hutank">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_hutank ?? '' }}"
                                                class="form-control @error('valf_hutank') is-invalid @enderror"
                                                id="valf_hutank" name="valf_hutank" placeholder="Jumlah...">
                                            @error('valf_hutank')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_hutank">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_hutank ?? '' }}"
                                                class="form-control @error('valkj_hutank') is-invalid @enderror"
                                                id="valkj_hutank" name="valkj_hutank" placeholder="Jumlah...">
                                            @error('valkj_hutank')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_hutank">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_hutank ?? '' }}"
                                                class="form-control @error('valjp_hutank') is-invalid @enderror"
                                                id="valjp_hutank" name="valjp_hutank" placeholder="Jumlah...">
                                            @error('valjp_hutank')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_hutank">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_hutank ?? '' }}"
                                                class="form-control @error('valwt_hutank') is-invalid @enderror"
                                                id="valwt_hutank" name="valwt_hutank" placeholder="Jumlah...">
                                            @error('valwt_hutank')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEKERINGAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valk_kekeringan">KEJADIAN
                                            </label>
                                            <select class="form-control @error('valk_kekeringan') is-invalid @enderror"
                                                id="valk_kekeringan" name="valk_kekeringan">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valk_kekeringan') == 'ada' || (isset($rtbencana) && $rtbencana->k_kekeringan == 'ada') ? 'selected' : '' }}>
                                                    Ada</option>
                                                <option value="tidak ada"
                                                    {{ old('valk_kekeringan') == 'tidak ada' || (isset($rtbencana) && $rtbencana->k_kekeringan == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada</option>
                                            </select>
                                            @error('valk_kekeringan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valf_kekeringan">FREKUENSI KEJADIAN

                                            </label>
                                            <input type="number" value="{{ $rtbencana->f_kekeringan ?? '' }}"
                                                class="form-control @error('valf_kekeringan') is-invalid @enderror"
                                                id="valf_kekeringan" name="valf_kekeringan" placeholder="Jumlah...">
                                            @error('valf_kekeringan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkj_kekeringan">KORBAN JIWA

                                            </label>
                                            <input type="number" value="{{ $rtbencana->kj_kekeringan ?? '' }}"
                                                class="form-control @error('valkj_kekeringan') is-invalid @enderror"
                                                id="valkj_kekeringan" name="valkj_kekeringan" placeholder="Jumlah...">
                                            @error('valkj_kekeringan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_kekeringan">JUMLAH PENGUNGSI
                                            </label>
                                            <input type="number" value="{{ $rtbencana->jp_kekeringan ?? '' }}"
                                                class="form-control @error('valjp_kekeringan') is-invalid @enderror"
                                                id="valjp_kekeringan" name="valjp_kekeringan" placeholder="Jumlah...">
                                            @error('valjp_kekeringan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valwt_kekeringan">WARGA TERDAMPAK
                                            </label>
                                            <input type="number" value="{{ $rtbencana->wt_kekeringan ?? '' }}"
                                                class="form-control @error('valwt_kekeringan') is-invalid @enderror"
                                                id="valwt_kekeringan" name="valwt_kekeringan" placeholder="Jumlah...">
                                            @error('valwt_kekeringan')
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
            document.getElementById('form-edit-rtbencana').submit();
        });
    </script>
@endsection
