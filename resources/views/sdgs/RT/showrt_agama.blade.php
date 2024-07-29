 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LAIN-LAIN
                            <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                            <h1 class="card-title"> RW : {{ $datart->rw }}</h1>

                            <button type="button" class="btn mb-1 btn-warning"
                                onclick="window.location='{{ route('rt_agama.index') }}'">Kembali
                            </button>
                            <br><br><br>
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('rt_agama.update') }}" method="POST">
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
                                        <label class="col-lg-4 col-form-label" for="valjumlahwarga_jamkes">JUMLAH WARGA
                                            PESERTA
                                            JAMSKES
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">

                                            @if (isset($rt_agama->jumlahwarga_jamkes))
                                                <br>
                                                {{ $rt_agama->jumlahwarga_jamkes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahwarga_jamkes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjumlahwarga_jamketerangan">JUMLAH
                                            WARGA
                                            PESERTA JAMS KETENAGAKERJAAN
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            @if (isset($rt_agama->jumlahwarga_jamketerangan))
                                                <br>
                                                {{ $rt_agama->jumlahwarga_jamketerangan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlahwarga_jamketerangan')
                                                <div id="" class="invalid-feedback">

                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">JUMLAH TEMPAT IBADAH
                                            <span class="text-danger">*</span></label>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="valjumlahtempat_masjid">MASJID
                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_masjid))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_masjid }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_masjid')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valjumlahtempat_musholla">MUSHOLLAH
                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_musholla))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_musholla }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_musholla')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="valjumlahtempat_kristen">GEREJA KRISTEN
                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_kristen))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_kristen }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_kristen')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="valjumlahtempat_katolik">GEREJA KATOLIK


                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_katolik))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_katolik }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_katolik')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="valjumlahtempat_kapel">KAPEL


                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_kapel))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_kapel }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_kapel')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="valjumlahtempat_pura">PURA


                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_pura))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_pura }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_pura')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="valjumlahtempat_wihara">WIHARA


                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_wihara))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_wihara }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_wihara')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="valjumlahtempat_kelenteng">KELENTENG


                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_kelenteng))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_kelenteng }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_kelenteng')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="valjumlahtempat_lainnya">LAINNYA


                                                </label>
                                                @if (isset($rt_agama->jumlahtempat_lainnya))
                                                    <br>
                                                    {{ $rt_agama->jumlahtempat_lainnya }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valjumlahtempat_lainnya')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">SITUS CAGAR BUDAYA

                                            <span class="text-danger">*</span></label>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="valcagar_bud1">SITUS CAGAR BUDAYA 1

                                                </label>
                                                @if (isset($rt_agama->cagar_bud1))
                                                    <br>
                                                    {{ $rt_agama->cagar_bud1 }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valcagar_bud1')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valcagar_bud2">SITUS CAGAR BUDAYA 2

                                                </label>
                                                @if (isset($rt_agama->cagar_bud2))
                                                    <br>
                                                    {{ $rt_agama->cagar_bud2 }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valcagar_bud2')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valcagar_bud3">SITUS CAGAR BUDAYA 3
                                                </label>
                                                @if (isset($rt_agama->cagar_bud3))
                                                    <br>
                                                    {{ $rt_agama->cagar_bud3 }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valcagar_bud3')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">KEBERADAAN SUKU TERASING
                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="valsukuasing_keluarga">JUMLAH KELUARGA
                                                </label>
                                                @if (isset($rt_agama->sukuasing_keluarga))
                                                    <br>
                                                    {{ $rt_agama->sukuasing_keluarga }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valsukuasing_keluarga')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valsukuasing_jiwa">JUMLAH JIWA


                                                </label>
                                                @if (isset($rt_agama->sukuasing_jiwa))
                                                    <br>
                                                    {{ $rt_agama->sukuasing_jiwa }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valsukuasing_jiwa')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valruangpublik_terbuka">RUANG PUBLIK
                                            TERBUKA UNTUK SANTAI/ BERMAIN


                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            @if (isset($rt_agama->ruangpublik_terbuka))
                                                <br>
                                                {{ $rt_agama->ruangpublik_terbuka }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valruangpublik_terbuka')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">NAMA KEARIFAN LOKAL ATAU ADAT
                                            <span class="text-danger">*</span></label>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="valadat_kehamilan">KEHAMILAN
                                                </label>
                                                @if (isset($rt_agama->adat_kehamilan))
                                                    <br>
                                                    {{ $rt_agama->adat_kehamilan }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valadat_kehamilan')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valadat_kelahiran">KELAHIRAN

                                                </label>
                                                @if (isset($rt_agama->adat_kelahiran))
                                                    <br>
                                                    {{ $rt_agama->adat_kelahiran }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valadat_kelahiran')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valadat_pekerjaan">PEKERJAAN

                                                </label>
                                                @if (isset($rt_agama->adat_pekerjaan))
                                                    <br>
                                                    {{ $rt_agama->adat_pekerjaan }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valadat_pekerjaan')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valadat_alam">ALAM / LINGKUNGAN HIDUP

                                                </label>
                                                @if (isset($rt_agama->adat_alam))
                                                    <br>
                                                    {{ $rt_agama->adat_alam }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valadat_alam')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valadat_perkawinan">PERKAWINAN
                                                </label>
                                                @if (isset($rt_agama->adat_perkawinan))
                                                    <br>
                                                    {{ $rt_agama->adat_perkawinan }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valadat_perkawinan')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valadat_kehidupanwarga">KEHIDUPAN WARGA

                                                </label>
                                                @if (isset($rt_agama->adat_kehidupanwarga))
                                                    <br>
                                                    {{ $rt_agama->adat_kehidupanwarga }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valadat_kehidupanwarga')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valadat_kematian">KEMATIAN

                                                </label>
                                                @if (isset($rt_agama->adat_kematian))
                                                    <br>
                                                    {{ $rt_agama->adat_kematian }}
                                                @else
                                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                    Data tidak tersedia.
                                                @endif
                                                @error('valadat_kematian')
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
