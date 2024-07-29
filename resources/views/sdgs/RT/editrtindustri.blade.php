 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT INDSUTRI
                            <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                            <h1 class="card-title"> RW : {{ $datart->rw }}</h1>
                        </h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtindustri.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtindustri.update') }}" method="POST"
                                id="form-edit-rtindustri">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnik">NIK <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnik', $datart->nik) }}"
                                            class="form-control @error('valnik') is-invalid @enderror" id="valnik"
                                            name="valnik" placeholder="Nama Lengkap...">
                                        <div class="col-lg-6">
                                            {{ $datart->nik }}
                                        </div>
                                        @error('valnik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">Nama Ketua RT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnama_ketuart', $datart->nama) }}"
                                            class="form-control @error('valnama_ketuart') is-invalid @enderror"
                                            id="valnama_ketuart" name="valnama_ketuart" placeholder="Nama Lengkap...">
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
                                    <label class="col-lg-4 col-form-label">Industri Barang dari Kulit (Tas, Sepatu, Sandal,
                                        dll)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_kulit">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text" value="{{ $rt_industri->jumlahindustrik_kulit ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_kulit') is-invalid @enderror"
                                                id="valjumlahindustrik_kulit" name="valjumlahindustrik_kulit"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_kulit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_kulit">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text" value="{{ $rt_industri->jumlahindustris_kulit ?? '' }}"
                                                class="form-control @error('valjumlahindustris_kulit') is-invalid @enderror"
                                                id="valjumlahindustris_kulit" name="valjumlahindustris_kulit"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_kulit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_kulit">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahmanajemen_kulit ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_kulit') is-invalid @enderror"
                                                id="valjumlahmanajemen_kulit" name="valjumlahmanajemen_kulit"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_kulit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_kulit">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_kulit ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_kulit') is-invalid @enderror"
                                                id="valjumlahpekerja_kulit" name="valjumlahpekerja_kulit"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_kulit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Barang dari Kayu (Meja, Kursi, Lemari,
                                        ll)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_kayu">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text" value="{{ $rt_industri->jumlahindustrik_kayu ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_kayu') is-invalid @enderror"
                                                id="valjumlahindustrik_kayu" name="valjumlahindustrik_kayu"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_kayu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_kayu">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text" value="{{ $rt_industri->jumlahindustris_kayu ?? '' }}"
                                                class="form-control @error('valjumlahindustris_kayu') is-invalid @enderror"
                                                id="valjumlahindustris_kayu" name="valjumlahindustris_kayu"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_kayu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_kayu">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahmanajemen_kayu ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_kayu') is-invalid @enderror"
                                                id="valjumlahmanajemen_kayu" name="valjumlahmanajemen_kayu"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_kayu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_kayu">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_kayu ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_kayu') is-invalid @enderror"
                                                id="valjumlahpekerja_kayu" name="valjumlahpekerja_kayu"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_kayu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Barang dari Logam Mulia atau bahan
                                        Logam (Perabot, Perhiasan, dll)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_logam">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text" value="{{ $rt_industri->jumlahindustrik_logam ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_logam') is-invalid @enderror"
                                                id="valjumlahindustrik_logam" name="valjumlahindustrik_logam"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_logam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_logam">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text" value="{{ $rt_industri->jumlahindustris_logam ?? '' }}"
                                                class="form-control @error('valjumlahindustris_logam') is-invalid @enderror"
                                                id="valjumlahindustris_logam" name="valjumlahindustris_logam"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_logam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_logam">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahmanajemen_logam ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_logam') is-invalid @enderror"
                                                id="valjumlahmanajemen_logam" name="valjumlahmanajemen_logam"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_logam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_logam">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_logam ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_logam') is-invalid @enderror"
                                                id="valjumlahpekerja_logam" name="valjumlahpekerja_logam"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_logam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Logam Berat
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_logamb">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustrik_logamb ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_logamb') is-invalid @enderror"
                                                id="valjumlahindustrik_logamb" name="valjumlahindustrik_logamb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_logamb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_logamb">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustris_logamb ?? '' }}"
                                                class="form-control @error('valjumlahindustris_logamb') is-invalid @enderror"
                                                id="valjumlahindustris_logamb" name="valjumlahindustris_logamb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_logamb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_logamb">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_industri->jumlahmanajemen_logamb ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_logamb') is-invalid @enderror"
                                                id="valjumlahmanajemen_logamb" name="valjumlahmanajemen_logamb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_logamb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_logamb">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_logamb ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_logamb') is-invalid @enderror"
                                                id="valjumlahpekerja_logamb" name="valjumlahpekerja_logamb"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_logamb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Barang dari Kain (Tenun, Konveksi, dll)

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_kain">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text" value="{{ $rt_industri->jumlahindustrik_kain ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_kain') is-invalid @enderror"
                                                id="valjumlahindustrik_kain" name="valjumlahindustrik_kain"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_kain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_kain">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text" value="{{ $rt_industri->jumlahindustris_kain ?? '' }}"
                                                class="form-control @error('valjumlahindustris_kain') is-invalid @enderror"
                                                id="valjumlahindustris_kain" name="valjumlahindustris_kain"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_kain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_kain">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahmanajemen_kain ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_kain') is-invalid @enderror"
                                                id="valjumlahmanajemen_kain" name="valjumlahmanajemen_kain"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_kain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_kain">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_kain ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_kain') is-invalid @enderror"
                                                id="valjumlahpekerja_kain" name="valjumlahpekerja_kain"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_kain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri gerabah/keramik/batu (porselen,
                                        keramik, tegel, dll)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_keramik">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustrik_keramik ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_keramik') is-invalid @enderror"
                                                id="valjumlahindustrik_keramik" name="valjumlahindustrik_keramik"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_keramik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_keramik">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustris_keramik ?? '' }}"
                                                class="form-control @error('valjumlahindustris_keramik') is-invalid @enderror"
                                                id="valjumlahindustris_keramik" name="valjumlahindustris_keramik"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_keramik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_keramik">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_industri->jumlahmanajemen_keramik ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_keramik') is-invalid @enderror"
                                                id="valjumlahmanajemen_keramik" name="valjumlahmanajemen_keramik"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_keramik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_keramik">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_keramik ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_keramik') is-invalid @enderror"
                                                id="valjumlahpekerja_keramik" name="valjumlahpekerja_keramik"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_keramik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Genteng dan Batu Bata
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_genteng">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustrik_genteng ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_genteng') is-invalid @enderror"
                                                id="valjumlahindustrik_genteng" name="valjumlahindustrik_genteng"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_genteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_genteng">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustris_genteng ?? '' }}"
                                                class="form-control @error('valjumlahindustris_genteng') is-invalid @enderror"
                                                id="valjumlahindustris_genteng" name="valjumlahindustris_genteng"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_genteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_genteng">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_industri->jumlahmanajemen_genteng ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_genteng') is-invalid @enderror"
                                                id="valjumlahmanajemen_genteng" name="valjumlahmanajemen_genteng"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_genteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_genteng">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_genteng ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_genteng') is-invalid @enderror"
                                                id="valjumlahpekerja_genteng" name="valjumlahpekerja_genteng"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_genteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Anyaman dari Rotan / Bambu / Rumput /
                                        Pandan, dll
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_anyaman">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustrik_anyaman ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_anyaman') is-invalid @enderror"
                                                id="valjumlahindustrik_anyaman" name="valjumlahindustrik_anyaman"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_anyaman')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_anyaman">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustris_anyaman ?? '' }}"
                                                class="form-control @error('valjumlahindustris_anyaman') is-invalid @enderror"
                                                id="valjumlahindustris_anyaman" name="valjumlahindustris_anyaman"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_anyaman')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_anyaman">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_industri->jumlahmanajemen_anyaman ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_anyaman') is-invalid @enderror"
                                                id="valjumlahmanajemen_anyaman" name="valjumlahmanajemen_anyaman"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_anyaman')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_anyaman">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_anyaman ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_anyaman') is-invalid @enderror"
                                                id="valjumlahpekerja_anyaman" name="valjumlahpekerja_anyaman"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_anyaman')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri makanan dan minuman
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_makanan">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustrik_makanan ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_makanan') is-invalid @enderror"
                                                id="valjumlahindustrik_makanan" name="valjumlahindustrik_makanan"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_makanan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_makanan">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustris_makanan ?? '' }}"
                                                class="form-control @error('valjumlahindustris_makanan') is-invalid @enderror"
                                                id="valjumlahindustris_makanan" name="valjumlahindustris_makanan"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_makanan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_makanan">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_industri->jumlahmanajemen_makanan ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_makanan') is-invalid @enderror"
                                                id="valjumlahmanajemen_makanan" name="valjumlahmanajemen_makanan"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_makanan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_makanan">JUMLAH PEKERJA

                                            </label>
                                            <input type="number" value="{{ $rt_industri->jumlahpekerja_makanan ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_makanan') is-invalid @enderror"
                                                id="valjumlahpekerja_makanan" name="valjumlahpekerja_makanan"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_makanan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri lainnya, tuliskan di bawah
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_lainnya">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustrik_lainnya ?? '' }}"
                                                class="form-control @error('valjumlahindustrik_lainnya') is-invalid @enderror"
                                                id="valjumlahindustrik_lainnya" name="valjumlahindustrik_lainnya"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustrik_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_lainnya">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                            <input type="text"
                                                value="{{ $rt_industri->jumlahindustris_lainnya ?? '' }}"
                                                class="form-control @error('valjumlahindustris_lainnya') is-invalid @enderror"
                                                id="valjumlahindustris_lainnya" name="valjumlahindustris_lainnya"
                                                placeholder="Jumlah...">
                                            @error('valjumlahindustris_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_lainnya">JUMLAH MANAJEMEN

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_industri->jumlahmanajemen_lainnya ?? '' }}"
                                                class="form-control @error('valjumlahmanajemen_lainnya') is-invalid @enderror"
                                                id="valjumlahmanajemen_lainnya" name="valjumlahmanajemen_lainnya"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmanajemen_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_lainnya">JUMLAH PEKERJA

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_industri->jumlahpekerja_lainnya ?? '' }}"
                                                class="form-control @error('valjumlahpekerja_lainnya') is-invalid @enderror"
                                                id="valjumlahpekerja_lainnya" name="valjumlahpekerja_lainnya"
                                                placeholder="jumlah...">
                                            @error('valjumlahpekerja_lainnya')
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
            document.getElementById('form-edit-rtindustri').submit();
        });
    </script>
@endsection
