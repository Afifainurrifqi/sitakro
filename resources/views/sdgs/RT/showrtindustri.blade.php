 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT INDSUTRI
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1></h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtindustri.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtindustri.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">NAMA KETUA RT

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datart->nama))
                                            <br>
                                            {{ $datart->nama }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valnama_ketuart')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valalamat">ALAMAT <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datart->alamat))
                                        <br>
                                        {{ $datart->alamat }}
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
                                    <label class="col-lg-4 col-form-label" for="valrt">RT <span
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
                                    <label class="col-lg-4 col-form-label" for="valnohp">NO. HP / TELEPON
                                        <span class="text-danger">*</span>
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
                                    <label class="col-lg-4 col-form-label">Industri Barang dari Kulit (Tas, Sepatu, Sandal, dll)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_kulit">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                                @if (isset($rt_industri->jumlahindustrik_kulit))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_kulit }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_kulit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_kulit">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                           @if (isset($rt_industri->jumlahindustris_kulit))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_kulit }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_kulit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_kulit">JUMLAH MANAJEMEN

                                            </label>
                                           @if (isset($rt_industri->jumlahmanajemen_kulit ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_kulit  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_kulit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_kulit">JUMLAH PEKERJA
                                            </label>
                                           @if (isset($rt_industri->jumlahpekerja_kulit ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_kulit  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahpekerja_kulit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Barang dari Kayu (Meja, Kursi, Lemari, ll)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_kayu">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                             @if (isset($rt_industri->jumlahindustrik_kayu))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_kayu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_kayu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_kayu">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                             @if (isset($rt_industri->jumlahindustris_kayu))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_kayu }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_kayu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_kayu">JUMLAH MANAJEMEN

                                            </label>
                                             @if (isset($rt_industri->jumlahmanajemen_kayu ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_kayu  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_kayu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_kayu">JUMLAH PEKERJA

                                            </label>
                                             @if (isset($rt_industri->jumlahpekerja_kayu ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_kayu  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahpekerja_kayu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Barang dari Logam Mulia atau bahan Logam (Perabot, Perhiasan, dll)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_logam">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                             @if (isset($rt_industri->jumlahindustrik_logam))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_logam }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_logam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_logam">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                             @if (isset($rt_industri->jumlahindustris_logam))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_logam }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_logam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_logam">JUMLAH MANAJEMEN

                                            </label>
                                            @if (isset($rt_industri->jumlahmanajemen_logam ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_logam  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_logam')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_logam">JUMLAH PEKERJA

                                            </label>
                                             @if (isset($rt_industri->jumlahpekerja_logam ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_logam  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                             @if (isset($rt_industri->jumlahindustrik_logamb))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_logamb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_logamb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_logamb">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                             @if (isset($rt_industri->jumlahindustris_logamb))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_logamb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_logamb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_logamb">JUMLAH MANAJEMEN

                                            </label>
                                            @if (isset($rt_industri->jumlahmanajemen_logamb ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_logamb  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_logamb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_logamb">JUMLAH PEKERJA

                                            </label>
                                            @if (isset($rt_industri->jumlahpekerja_logamb ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_logamb  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                             @if (isset($rt_industri->jumlahindustrik_kain))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_kain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_kain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_kain">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                             @if (isset($rt_industri->jumlahindustris_kain))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_kain }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_kain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_kain">JUMLAH MANAJEMEN

                                            </label>
                                            @if (isset($rt_industri->jumlahmanajemen_kain ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_kain  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_kain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_kain">JUMLAH PEKERJA

                                            </label>
                                             @if (isset($rt_industri->jumlahpekerja_kain ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_kain  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahpekerja_kain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri gerabah/keramik/batu (porselen, keramik, tegel, dll)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_keramik">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                            @if (isset($rt_industri->jumlahindustrik_keramik))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_keramik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_keramik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_keramik">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                             @if (isset($rt_industri->jumlahindustris_keramik))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_keramik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_keramik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_keramik">JUMLAH MANAJEMEN

                                            </label>
                                            @if (isset($rt_industri->jumlahmanajemen_keramik ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_keramik  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_keramik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_keramik">JUMLAH PEKERJA

                                            </label>
                                            @if (isset($rt_industri->jumlahpekerja_keramik ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_keramik  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                             @if (isset($rt_industri->jumlahindustrik_genteng))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_genteng }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_genteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_genteng">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                             @if (isset($rt_industri->jumlahindustris_genteng))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_genteng }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_genteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_genteng">JUMLAH MANAJEMEN

                                            </label>
                                            @if (isset($rt_industri->jumlahmanajemen_genteng ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_genteng  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_genteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_genteng">JUMLAH PEKERJA

                                            </label>
                                            @if (isset($rt_industri->jumlahpekerja_genteng ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_genteng  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahpekerja_genteng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Industri Anyaman dari Rotan / Bambu / Rumput / Pandan, dll
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlahindustrik_anyaman">JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA
                                            </label>
                                             @if (isset($rt_industri->jumlahindustrik_anyaman))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_anyaman }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_anyaman')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_anyaman">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                              @if (isset($rt_industri->jumlahindustris_anyaman))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_anyaman }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_anyaman')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_anyaman">JUMLAH MANAJEMEN

                                            </label>
                                             @if (isset($rt_industri->jumlahmanajemen_anyaman ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_anyaman  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_anyaman')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_anyaman">JUMLAH PEKERJA

                                            </label>
                                             @if (isset($rt_industri->jumlahpekerja_anyaman ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_anyaman  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_industri->jumlahindustrik_makanan))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_makanan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_makanan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_makanan">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                             @if (isset($rt_industri->jumlahindustris_makanan))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_makanan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_makanan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_makanan">JUMLAH MANAJEMEN

                                            </label>
                                            @if (isset($rt_industri->jumlahmanajemen_makanan ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_makanan  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_makanan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_makanan">JUMLAH PEKERJA

                                            </label>
                                             @if (isset($rt_industri->jumlahpekerja_makanan ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_makanan  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rt_industri->jumlahindustrik_lainnya))
                                                <br>
                                                {{ $rt_industri->jumlahindustrik_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahindustrik_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahindustris_lainnya">JUMLAH INDUSTRI SEDANG DAN BESAR
                                            </label>
                                             @if (isset($rt_industri->jumlahindustris_lainnya))
                                            <br>
                                            {{ $rt_industri->jumlahindustris_lainnya }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahindustris_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmanajemen_lainnya">JUMLAH MANAJEMEN

                                            </label>
                                             @if (isset($rt_industri->jumlahmanajemen_lainnya ))
                                                <br>
                                                {{ $rt_industri->jumlahmanajemen_lainnya  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahmanajemen_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpekerja_lainnya">JUMLAH PEKERJA

                                            </label>
                                             @if (isset($rt_industri->jumlahpekerja_lainnya ))
                                                <br>
                                                {{ $rt_industri->jumlahpekerja_lainnya  }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahpekerja_lainnya')
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
