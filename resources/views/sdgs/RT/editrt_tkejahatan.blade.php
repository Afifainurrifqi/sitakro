 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT TINDAK KEJAHATAN</h1>
                        <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_tkejahatan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_tkejahatan.update') }}" method="POST" id="form-edit-rttkkejahatan">
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
                                    <label class="col-lg-4 col-form-label">PENCURIAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_pencurian">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_pencurian ?? '' }}"
                                            class="form-control @error('valjk_pencurian') is-invalid @enderror"
                                            id="valjk_pencurian" name="valjk_pencurian" placeholder="jumlah...">
                                            @error('valjk_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_pencurian ?? '' }}"
                                                class="form-control @error('valjumlahselesai_pencurian') is-invalid @enderror"
                                                id="valjumlahselesai_pencurian" name="valjumlahselesai_pencurian" placeholder="jumlah...">

                                            @error('valjumlahselesai_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pencurian">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_pencurian ?? '' }}"
                                                class="form-control @error('valjktbd_pencurian') is-invalid @enderror"
                                                id="valjktbd_pencurian" name="valjktbd_pencurian" placeholder="Jumlah...">
                                            @error('valjktbd_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_pencurian ?? '' }}"
                                                class="form-control @error('valkll_pencurian') is-invalid @enderror"
                                                id="valkll_pencurian" name="valkll_pencurian" placeholder="Jumlah...">
                                            @error('valkll_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pencurian">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_pencurian ?? '' }}"
                                            class="form-control @error('valkt_pencurian') is-invalid @enderror"
                                            id="valkt_pencurian" name="valkt_pencurian" placeholder="Jumlah...">
                                            @error('valkt_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENCURIAN DENGAN KEKERASAN<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_pencuriankeras">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_pencuriankeras ?? '' }}"
                                            class="form-control @error('valjk_pencuriankeras') is-invalid @enderror"
                                            id="valjk_pencuriankeras" name="valjk_pencuriankeras" placeholder="jumlah...">
                                            @error('valjk_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_pencuriankeras ?? '' }}"
                                                class="form-control @error('valjumlahselesai_pencuriankeras') is-invalid @enderror"
                                                id="valjumlahselesai_pencuriankeras" name="valjumlahselesai_pencuriankeras" placeholder="jumlah...">

                                            @error('valjumlahselesai_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pencuriankeras">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_pencuriankeras ?? '' }}"
                                                class="form-control @error('valjktbd_pencuriankeras') is-invalid @enderror"
                                                id="valjktbd_pencuriankeras" name="valjktbd_pencuriankeras" placeholder="Jumlah...">
                                            @error('valjktbd_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_pencuriankeras ?? '' }}"
                                                class="form-control @error('valkll_pencuriankeras') is-invalid @enderror"
                                                id="valkll_pencuriankeras" name="valkll_pencuriankeras" placeholder="Jumlah...">
                                            @error('valkll_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pencuriankeras">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_pencuriankeras ?? '' }}"
                                            class="form-control @error('valkt_pencuriankeras') is-invalid @enderror"
                                            id="valkt_pencuriankeras" name="valkt_pencuriankeras" placeholder="Jumlah...">
                                            @error('valkt_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENIPUAN / PENGGELAPAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_penipuan">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_penipuan ?? '' }}"
                                            class="form-control @error('valjk_penipuan') is-invalid @enderror"
                                            id="valjk_penipuan" name="valjk_penipuan" placeholder="jumlah...">
                                            @error('valjk_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_penipuan ?? '' }}"
                                                class="form-control @error('valjumlahselesai_penipuan') is-invalid @enderror"
                                                id="valjumlahselesai_penipuan" name="valjumlahselesai_penipuan" placeholder="jumlah...">

                                            @error('valjumlahselesai_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_penipuan">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_penipuan ?? '' }}"
                                                class="form-control @error('valjktbd_penipuan') is-invalid @enderror"
                                                id="valjktbd_penipuan" name="valjktbd_penipuan" placeholder="Jumlah...">
                                            @error('valjktbd_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_penipuan ?? '' }}"
                                                class="form-control @error('valkll_penipuan') is-invalid @enderror"
                                                id="valkll_penipuan" name="valkll_penipuan" placeholder="Jumlah...">
                                            @error('valkll_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_penipuan">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_penipuan ?? '' }}"
                                            class="form-control @error('valkt_penipuan') is-invalid @enderror"
                                            id="valkt_penipuan" name="valkt_penipuan" placeholder="Jumlah...">
                                            @error('valkt_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENGANIAYAAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_penganiyayaan">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_penganiyayaan ?? '' }}"
                                            class="form-control @error('valjk_penganiyayaan') is-invalid @enderror"
                                            id="valjk_penganiyayaan" name="valjk_penganiyayaan" placeholder="jumlah...">
                                            @error('valjk_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_penganiyayaan ?? '' }}"
                                                class="form-control @error('valjumlahselesai_penganiyayaan') is-invalid @enderror"
                                                id="valjumlahselesai_penganiyayaan" name="valjumlahselesai_penganiyayaan" placeholder="jumlah...">

                                            @error('valjumlahselesai_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_penganiyayaan">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_penganiyayaan ?? '' }}"
                                                class="form-control @error('valjktbd_penganiyayaan') is-invalid @enderror"
                                                id="valjktbd_penganiyayaan" name="valjktbd_penganiyayaan" placeholder="Jumlah...">
                                            @error('valjktbd_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_penganiyayaan ?? '' }}"
                                                class="form-control @error('valkll_penganiyayaan') is-invalid @enderror"
                                                id="valkll_penganiyayaan" name="valkll_penganiyayaan" placeholder="Jumlah...">
                                            @error('valkll_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_penganiyayaan">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_penganiyayaan ?? '' }}"
                                            class="form-control @error('valkt_penganiyayaan') is-invalid @enderror"
                                            id="valkt_penganiyayaan" name="valkt_penganiyayaan" placeholder="Jumlah...">
                                            @error('valkt_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PEMBAKARAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_pembakaran">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_pembakaran ?? '' }}"
                                            class="form-control @error('valjk_pembakaran') is-invalid @enderror"
                                            id="valjk_pembakaran" name="valjk_pembakaran" placeholder="jumlah...">
                                            @error('valjk_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_pembakaran ?? '' }}"
                                                class="form-control @error('valjumlahselesai_pembakaran') is-invalid @enderror"
                                                id="valjumlahselesai_pembakaran" name="valjumlahselesai_pembakaran" placeholder="jumlah...">

                                            @error('valjumlahselesai_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pembakaran">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_pembakaran ?? '' }}"
                                                class="form-control @error('valjktbd_pembakaran') is-invalid @enderror"
                                                id="valjktbd_pembakaran" name="valjktbd_pembakaran" placeholder="Jumlah...">
                                            @error('valjktbd_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_pembakaran ?? '' }}"
                                                class="form-control @error('valkll_pembakaran') is-invalid @enderror"
                                                id="valkll_pembakaran" name="valkll_pembakaran" placeholder="Jumlah...">
                                            @error('valkll_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pembakaran">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_pembakaran ?? '' }}"
                                            class="form-control @error('valkt_pembakaran') is-invalid @enderror"
                                            id="valkt_pembakaran" name="valkt_pembakaran" placeholder="Jumlah...">
                                            @error('valkt_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PEMERKOSAAN / KEJAHATAN KESUSILAAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_pemerkosaan">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_pemerkosaan ?? '' }}"
                                            class="form-control @error('valjk_pemerkosaan') is-invalid @enderror"
                                            id="valjk_pemerkosaan" name="valjk_pemerkosaan" placeholder="jumlah...">
                                            @error('valjk_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_pemerkosaan ?? '' }}"
                                                class="form-control @error('valjumlahselesai_pemerkosaan') is-invalid @enderror"
                                                id="valjumlahselesai_pemerkosaan" name="valjumlahselesai_pemerkosaan" placeholder="jumlah...">

                                            @error('valjumlahselesai_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pemerkosaan">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_pemerkosaan ?? '' }}"
                                                class="form-control @error('valjktbd_pemerkosaan') is-invalid @enderror"
                                                id="valjktbd_pemerkosaan" name="valjktbd_pemerkosaan" placeholder="Jumlah...">
                                            @error('valjktbd_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_pemerkosaan ?? '' }}"
                                                class="form-control @error('valkll_pemerkosaan') is-invalid @enderror"
                                                id="valkll_pemerkosaan" name="valkll_pemerkosaan" placeholder="Jumlah...">
                                            @error('valkll_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pemerkosaan">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_pemerkosaan ?? '' }}"
                                            class="form-control @error('valkt_pemerkosaan') is-invalid @enderror"
                                            id="valkt_pemerkosaan" name="valkt_pemerkosaan" placeholder="Jumlah...">
                                            @error('valkt_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENYALAHGUNAAN / PEREDARAN NARKOBA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_narkoba">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_narkoba ?? '' }}"
                                            class="form-control @error('valjk_narkoba') is-invalid @enderror"
                                            id="valjk_narkoba" name="valjk_narkoba" placeholder="jumlah...">
                                            @error('valjk_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_narkoba ?? '' }}"
                                                class="form-control @error('valjumlahselesai_narkoba') is-invalid @enderror"
                                                id="valjumlahselesai_narkoba" name="valjumlahselesai_narkoba" placeholder="jumlah...">

                                            @error('valjumlahselesai_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_narkoba">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_narkoba ?? '' }}"
                                                class="form-control @error('valjktbd_narkoba') is-invalid @enderror"
                                                id="valjktbd_narkoba" name="valjktbd_narkoba" placeholder="Jumlah...">
                                            @error('valjktbd_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_narkoba ?? '' }}"
                                                class="form-control @error('valkll_narkoba') is-invalid @enderror"
                                                id="valkll_narkoba" name="valkll_narkoba" placeholder="Jumlah...">
                                            @error('valkll_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_narkoba">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_narkoba ?? '' }}"
                                            class="form-control @error('valkt_narkoba') is-invalid @enderror"
                                            id="valkt_narkoba" name="valkt_narkoba" placeholder="Jumlah...">
                                            @error('valkt_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PERJUDIAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_perjudian">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_perjudian ?? '' }}"
                                            class="form-control @error('valjk_perjudian') is-invalid @enderror"
                                            id="valjk_perjudian" name="valjk_perjudian" placeholder="jumlah...">
                                            @error('valjk_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_perjudian ?? '' }}"
                                                class="form-control @error('valjumlahselesai_perjudian') is-invalid @enderror"
                                                id="valjumlahselesai_perjudian" name="valjumlahselesai_perjudian" placeholder="jumlah...">

                                            @error('valjumlahselesai_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_perjudian">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_perjudian ?? '' }}"
                                                class="form-control @error('valjktbd_perjudian') is-invalid @enderror"
                                                id="valjktbd_perjudian" name="valjktbd_perjudian" placeholder="Jumlah...">
                                            @error('valjktbd_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_perjudian ?? '' }}"
                                                class="form-control @error('valkll_perjudian') is-invalid @enderror"
                                                id="valkll_perjudian" name="valkll_perjudian" placeholder="Jumlah...">
                                            @error('valkll_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_perjudian">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_perjudian ?? '' }}"
                                            class="form-control @error('valkt_perjudian') is-invalid @enderror"
                                            id="valkt_perjudian" name="valkt_perjudian" placeholder="Jumlah...">
                                            @error('valkt_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PEMBUNUHAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_pembunuhan">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_pembunuhan ?? '' }}"
                                            class="form-control @error('valjk_pembunuhan') is-invalid @enderror"
                                            id="valjk_pembunuhan" name="valjk_pembunuhan" placeholder="jumlah...">
                                            @error('valjk_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_pembunuhan ?? '' }}"
                                                class="form-control @error('valjumlahselesai_pembunuhan') is-invalid @enderror"
                                                id="valjumlahselesai_pembunuhan" name="valjumlahselesai_pembunuhan" placeholder="jumlah...">

                                            @error('valjumlahselesai_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pembunuhan">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_pembunuhan ?? '' }}"
                                                class="form-control @error('valjktbd_pembunuhan') is-invalid @enderror"
                                                id="valjktbd_pembunuhan" name="valjktbd_pembunuhan" placeholder="Jumlah...">
                                            @error('valjktbd_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_pembunuhan ?? '' }}"
                                                class="form-control @error('valkll_pembunuhan') is-invalid @enderror"
                                                id="valkll_pembunuhan" name="valkll_pembunuhan" placeholder="Jumlah...">
                                            @error('valkll_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pembunuhan">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_pembunuhan ?? '' }}"
                                            class="form-control @error('valkt_pembunuhan') is-invalid @enderror"
                                            id="valkt_pembunuhan" name="valkt_pembunuhan" placeholder="Jumlah...">
                                            @error('valkt_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PERDAGANGAN ORANG

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_perdaganganorang">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_perdaganganorang ?? '' }}"
                                            class="form-control @error('valjk_perdaganganorang') is-invalid @enderror"
                                            id="valjk_perdaganganorang" name="valjk_perdaganganorang" placeholder="jumlah...">
                                            @error('valjk_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_perdaganganorang ?? '' }}"
                                                class="form-control @error('valjumlahselesai_perdaganganorang') is-invalid @enderror"
                                                id="valjumlahselesai_perdaganganorang" name="valjumlahselesai_perdaganganorang" placeholder="jumlah...">

                                            @error('valjumlahselesai_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_perdaganganorang">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_perdaganganorang ?? '' }}"
                                                class="form-control @error('valjktbd_perdaganganorang') is-invalid @enderror"
                                                id="valjktbd_perdaganganorang" name="valjktbd_perdaganganorang" placeholder="Jumlah...">
                                            @error('valjktbd_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_perdaganganorang ?? '' }}"
                                                class="form-control @error('valkll_perdaganganorang') is-invalid @enderror"
                                                id="valkll_perdaganganorang" name="valkll_perdaganganorang" placeholder="Jumlah...">
                                            @error('valkll_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_perdaganganorang">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_perdaganganorang ?? '' }}"
                                            class="form-control @error('valkt_perdaganganorang') is-invalid @enderror"
                                            id="valkt_perdaganganorang" name="valkt_perdaganganorang" placeholder="Jumlah...">
                                            @error('valkt_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KORUPSI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_korupsi">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_korupsi ?? '' }}"
                                            class="form-control @error('valjk_korupsi') is-invalid @enderror"
                                            id="valjk_korupsi" name="valjk_korupsi" placeholder="jumlah...">
                                            @error('valjk_korupsi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_korupsi ?? '' }}"
                                                class="form-control @error('valjumlahselesai_korupsi') is-invalid @enderror"
                                                id="valjumlahselesai_korupsi" name="valjumlahselesai_korupsi" placeholder="jumlah...">

                                            @error('valjumlahselesai_korupsi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_korupsi">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_korupsi ?? '' }}"
                                                class="form-control @error('valjktbd_korupsi') is-invalid @enderror"
                                                id="valjktbd_korupsi" name="valjktbd_korupsi" placeholder="Jumlah...">
                                            @error('valjktbd_korupsi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_korupsi ?? '' }}"
                                                class="form-control @error('valkll_korupsi') is-invalid @enderror"
                                                id="valkll_korupsi" name="valkll_korupsi" placeholder="Jumlah...">
                                            @error('valkll_korupsi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_korupsi">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_korupsi ?? '' }}"
                                            class="form-control @error('valkt_korupsi') is-invalid @enderror"
                                            id="valkt_korupsi" name="valkt_korupsi" placeholder="Jumlah...">
                                            @error('valkt_korupsi')
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
                                            <label for="valjk_lainnya">JUMLAH KASUS
                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jk_lainnya ?? '' }}"
                                            class="form-control @error('valjk_lainnya') is-invalid @enderror"
                                            id="valjk_lainnya" name="valjk_lainnya" placeholder="jumlah...">
                                            @error('valjk_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            <input type="text" value="{{ $rt_tkejahatan->jumlahselesai_lainnya ?? '' }}"
                                                class="form-control @error('valjumlahselesai_lainnya') is-invalid @enderror"
                                                id="valjumlahselesai_lainnya" name="valjumlahselesai_lainnya" placeholder="jumlah...">

                                            @error('valjumlahselesai_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_lainnya">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->jktbd_lainnya ?? '' }}"
                                                class="form-control @error('valjktbd_lainnya') is-invalid @enderror"
                                                id="valjktbd_lainnya" name="valjktbd_lainnya" placeholder="Jumlah...">
                                            @error('valjktbd_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kll_lainnya ?? '' }}"
                                                class="form-control @error('valkll_lainnya') is-invalid @enderror"
                                                id="valkll_lainnya" name="valkll_lainnya" placeholder="Jumlah...">
                                            @error('valkll_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_lainnya">KORBAN TEWAS

                                            </label>
                                            <input type="number" value="{{ $rt_tkejahatan->kt_lainnya ?? '' }}"
                                            class="form-control @error('valkt_lainnya') is-invalid @enderror"
                                            id="valkt_lainnya" name="valkt_lainnya" placeholder="Jumlah...">
                                            @error('valkt_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#confirmModal">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
    aria-hidden="true">
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
        document.getElementById('form-edit-rttkkejahatan').submit();
    });
</script>
@endsection
