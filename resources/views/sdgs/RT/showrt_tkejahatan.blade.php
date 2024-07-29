 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">TINDAK KEJAHATAN</h1>
                        <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                        <h1 class="card-title"> RW : {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_tkejahatan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_tkejahatan.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">PENCURIAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_pencurian">JUMLAH KASUS
                                            </label>
                                            @if (isset($rt_tkejahatan->jk_pencurian))
                                                <br>
                                                {{ $rt_tkejahatan->jk_pencurian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>

                                            @if (isset($rt_tkejahatan->jumlahselesai_pencurian))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_pencurian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pencurian">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_pencurian))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_pencurian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkll_pencurian">KORBAN LUKA-LUKA
                                            </label>

                                            @if (isset($rt_tkejahatan->kll_pencurian))
                                                <br>
                                                {{ $rt_tkejahatan->kll_pencurian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pencurian">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_pencurian))
                                                <br>
                                                {{ $rt_tkejahatan->kt_pencurian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkt_pencurian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENCURIAN DENGAN KEKERASAN<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjk_pencuriankeras">JUMLAH KASUS
                                            </label>
                                            @if (isset($rt_tkejahatan->jk_pencuriankeras))
                                                <br>
                                                {{ $rt_tkejahatan->jk_pencuriankeras }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_pencuriankeras))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_pencuriankeras }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pencuriankeras">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_pencuriankeras))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_pencuriankeras }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_pencuriankeras))
                                                <br>
                                                {{ $rt_tkejahatan->kll_pencuriankeras }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_pencuriankeras')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pencuriankeras">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_pencuriankeras))
                                                <br>
                                                {{ $rt_tkejahatan->kt_pencuriankeras }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_penipuan))
                                                <br>
                                                {{ $rt_tkejahatan->jk_penipuan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_penipuan))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_penipuan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_penipuan">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_penipuan))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_penipuan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_penipuan))
                                                <br>
                                                {{ $rt_tkejahatan->kll_penipuan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_penipuan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_penipuan">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_penipuan))
                                                <br>
                                                {{ $rt_tkejahatan->kt_penipuan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_penganiyayaan))
                                                <br>
                                                {{ $rt_tkejahatan->jk_penganiyayaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_penganiyayaan))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_penganiyayaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_penganiyayaan">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_penganiyayaan))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_penganiyayaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_penganiyayaan))
                                                <br>
                                                {{ $rt_tkejahatan->kll_penganiyayaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_penganiyayaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_penganiyayaan">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_penganiyayaan))
                                                <br>
                                                {{ $rt_tkejahatan->kt_penganiyayaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_pembakaran))
                                                <br>
                                                {{ $rt_tkejahatan->jk_pembakaran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_pembakaran))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_pembakaran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pembakaran">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_pembakaran))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_pembakaran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_pembakaran))
                                                <br>
                                                {{ $rt_tkejahatan->kll_pembakaran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_pembakaran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pembakaran">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_pembakaran))
                                                <br>
                                                {{ $rt_tkejahatan->kt_pembakaran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_pemerkosaan))
                                                <br>
                                                {{ $rt_tkejahatan->jk_pemerkosaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_pemerkosaan))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_pemerkosaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pemerkosaan">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_pemerkosaan))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_pemerkosaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_pemerkosaan))
                                                <br>
                                                {{ $rt_tkejahatan->kll_pemerkosaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_pemerkosaan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pemerkosaan">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_pemerkosaan))
                                                <br>
                                                {{ $rt_tkejahatan->kt_pemerkosaan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_narkoba))
                                                <br>
                                                {{ $rt_tkejahatan->jk_narkoba }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_narkoba))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_narkoba }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_narkoba">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_narkoba))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_narkoba }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_narkoba))
                                                <br>
                                                {{ $rt_tkejahatan->kll_narkoba }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_narkoba')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_narkoba">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_narkoba))
                                                <br>
                                                {{ $rt_tkejahatan->kt_narkoba }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_perjudian))
                                                <br>
                                                {{ $rt_tkejahatan->jk_perjudian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_perjudian))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_perjudian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_perjudian">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_perjudian))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_perjudian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_perjudian))
                                                <br>
                                                {{ $rt_tkejahatan->kll_perjudian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_perjudian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_perjudian">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_perjudian))
                                                <br>
                                                {{ $rt_tkejahatan->kt_perjudian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_pembunuhan))
                                                <br>
                                                {{ $rt_tkejahatan->jk_pembunuhan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_pembunuhan))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_pembunuhan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_pembunuhan">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_pembunuhan))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_pembunuhan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_pembunuhan))
                                                <br>
                                                {{ $rt_tkejahatan->kll_pembunuhan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_pembunuhan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_pembunuhan">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_pembunuhan))
                                                <br>
                                                {{ $rt_tkejahatan->kt_pembunuhan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_perdaganganorang))
                                                <br>
                                                {{ $rt_tkejahatan->jk_perdaganganorang }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_perdaganganorang))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_perdaganganorang }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_perdaganganorang">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_perdaganganorang))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_perdaganganorang }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_perdaganganorang))
                                                <br>
                                                {{ $rt_tkejahatan->kll_perdaganganorang }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_perdaganganorang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_perdaganganorang">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_perdaganganorang))
                                                <br>
                                                {{ $rt_tkejahatan->kt_perdaganganorang }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_korupsi))
                                                <br>
                                                {{ $rt_tkejahatan->jk_korupsi }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_korupsi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_korupsi))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_korupsi }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlahselesai_korupsi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_korupsi">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_korupsi))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_korupsi }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_korupsi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_korupsi))
                                                <br>
                                                {{ $rt_tkejahatan->kll_korupsi }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_korupsi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_korupsi">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_korupsi))
                                                <br>
                                                {{ $rt_tkejahatan->kt_korupsi }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_tkejahatan->jk_lainnya))
                                                <br>
                                                {{ $rt_tkejahatan->jk_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjk_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH SELESAI KASUS YANG DITANGANI

                                            </label>
                                            @if (isset($rt_tkejahatan->jumlahselesai_lainnya))
                                                <br>
                                                {{ $rt_tkejahatan->jumlahselesai_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahselesai_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjktbd_lainnya">JUMLAH KASUS TIDAK BISA DITANGANI
                                            </label>
                                            @if (isset($rt_tkejahatan->jktbd_lainnya))
                                                <br>
                                                {{ $rt_tkejahatan->jktbd_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjktbd_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">KORBAN LUKA-LUKA

                                            </label>
                                            @if (isset($rt_tkejahatan->kll_lainnya))
                                                <br>
                                                {{ $rt_tkejahatan->kll_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkll_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkt_lainnya">KORBAN TEWAS

                                            </label>
                                            @if (isset($rt_tkejahatan->kt_lainnya))
                                                <br>
                                                {{ $rt_tkejahatan->kt_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkt_lainnya')
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
