 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">KEAMANAN</h1>
                        <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                        <h1 class="card-title"> RW : {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_keamanan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_keamanan.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">ANTAR KELOMPOK MASYARAKAT
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_antardesa">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_antarkelompokmas))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_antarkelompokmas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antarkelompokmas">JUMLAH KEJADIAN
                                            </label>

                                            @if (isset($rt_keamanan->jk_antarkelompokmas))
                                                <br>
                                                {{ $rt_keamanan->jk_antarkelompokmas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjk_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_antarkelompokmas">JUMLAH KORBAN LUKA
                                            </label>

                                            @if (isset($rt_keamanan->jkl_antarkelompokmas))
                                                <br>
                                                {{ $rt_keamanan->jkl_antarkelompokmas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjkl_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antarkelompokmas">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_antarkelompokmas))
                                                <br>
                                                {{ $rt_keamanan->jkl_antarkelompokmas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_antarkelompokmas">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_antarkelompokmas))
                                                <br>
                                                {{ $rt_keamanan->pen_antarkelompokmas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_antarkelompokmas">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_antarkelompokmas))
                                                <br>
                                                {{ $rt_keamanan->pp_antarkelompokmas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_antarkelompokmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KELOMPOK MASYARAKAT ANTAR DESA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_antardesa">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_antardesa))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_antardesa }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_antardesa">JUMLAH KEJADIAN
                                            </label>
                                            @if (isset($rt_keamanan->jk_antardesa))
                                                <br>
                                                {{ $rt_keamanan->jk_antardesa }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valjk_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_antardesa">JUMLAH KORBAN LUKA
                                            </label>
                                            @if (isset($rt_keamanan->jkl_antardesa))
                                                <br>
                                                {{ $rt_keamanan->jkl_antardesa }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjkl_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_antardesa">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_antardesa))
                                                <br>
                                                {{ $rt_keamanan->jkl_antardesa }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_antardesa">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_antardesa))
                                                <br>
                                                {{ $rt_keamanan->pen_antardesa }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_antardesa">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_antardesa))
                                                <br>
                                                {{ $rt_keamanan->pp_antardesa }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_antardesa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KELOMPOK MASYARAKAT DENGAN APARAT KEAMANAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_aparatmk">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_aparatmk))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_aparatmk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_aparatmk">JUMLAH KEJADIAN
                                            </label>
                                            @if (isset($rt_keamanan->jk_aparatmk))
                                                <br>
                                                {{ $rt_keamanan->jk_aparatmk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valjk_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_aparatmk">JUMLAH KORBAN LUKA
                                            </label>
                                            @if (isset($rt_keamanan->jkl_aparatmk))
                                                <br>
                                                {{ $rt_keamanan->jkl_aparatmk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjkl_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_aparatmk">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_aparatmk))
                                                <br>
                                                {{ $rt_keamanan->jkl_aparatmk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_aparatmk">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_aparatmk))
                                                <br>
                                                {{ $rt_keamanan->pen_aparatmk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_aparatmk">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_aparatmk))
                                                <br>
                                                {{ $rt_keamanan->pp_aparatmk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_aparatmk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KELOMPOK MASYARAKAT DENGAN APARAT PEMERINTAH
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_aparatmp">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_aparatmp))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_aparatmp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_aparatmp">JUMLAH KEJADIAN
                                            </label>
                                            @if (isset($rt_keamanan->jk_aparatmp))
                                                <br>
                                                {{ $rt_keamanan->jk_aparatmp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valjk_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_aparatmp">JUMLAH KORBAN LUKA
                                            </label>
                                            @if (isset($rt_keamanan->jkl_aparatmp))
                                                <br>
                                                {{ $rt_keamanan->jkl_aparatmp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjkl_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_aparatmp">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_aparatmp))
                                                <br>
                                                {{ $rt_keamanan->jkl_aparatmp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_aparatmp">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_aparatmp))
                                                <br>
                                                {{ $rt_keamanan->pen_aparatmp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_aparatmp">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_aparatmp))
                                                <br>
                                                {{ $rt_keamanan->pp_aparatmp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_aparatmp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANTAR APARAT KEAMANAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_aparatk">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_aparatk))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_aparatk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_aparatk">JUMLAH KEJADIAN
                                            </label>
                                            @if (isset($rt_keamanan->jk_aparatk))
                                                <br>
                                                {{ $rt_keamanan->jk_aparatk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjk_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_aparatk">JUMLAH KORBAN LUKA
                                            </label>
                                            @if (isset($rt_keamanan->jkl_aparatk))
                                                <br>
                                                {{ $rt_keamanan->jkl_aparatk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjkl_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_aparatk">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_aparatk))
                                                <br>
                                                {{ $rt_keamanan->jkl_aparatk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_aparatk">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_aparatk))
                                                <br>
                                                {{ $rt_keamanan->pen_aparatk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_aparatk">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_aparatk))
                                                <br>
                                                {{ $rt_keamanan->pp_aparatk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_aparatk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANTAR APARAT PEMERINTAH
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_aparatp">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_aparatp))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_aparatp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_aparatp">JUMLAH KEJADIAN
                                            </label>
                                            @if (isset($rt_keamanan->jk_aparatp))
                                                <br>
                                                {{ $rt_keamanan->jk_aparatp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valjk_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_aparatp">JUMLAH KORBAN LUKA
                                            </label>
                                            @if (isset($rt_keamanan->jkl_aparatp))
                                                <br>
                                                {{ $rt_keamanan->jkl_aparatp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjkl_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_aparatp">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_aparatp))
                                                <br>
                                                {{ $rt_keamanan->jkl_aparatp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_aparatp">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_aparatp))
                                                <br>
                                                {{ $rt_keamanan->pen_aparatp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_aparatp">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_aparatp))
                                                <br>
                                                {{ $rt_keamanan->pp_aparatp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_aparatp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PELAJAR/MAHASISWA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_pelajar">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_pelajar))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_pelajar }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_pelajar">JUMLAH KEJADIAN
                                            </label>
                                            @if (isset($rt_keamanan->jk_pelajar))
                                                <br>
                                                {{ $rt_keamanan->jk_pelajar }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valjk_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_pelajar">JUMLAH KORBAN LUKA
                                            </label>
                                            @if (isset($rt_keamanan->jkl_pelajar))
                                                <br>
                                                {{ $rt_keamanan->jkl_pelajar }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjkl_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_pelajar">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_pelajar))
                                                <br>
                                                {{ $rt_keamanan->jkl_pelajar }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_pelajar">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_pelajar))
                                                <br>
                                                {{ $rt_keamanan->pen_pelajar }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_pelajar">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_pelajar))
                                                <br>
                                                {{ $rt_keamanan->pp_pelajar }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_pelajar')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANTAR SUKU

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valpenyebabu_suku">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_suku))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_suku }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_suku">JUMLAH KEJADIAN
                                            </label>
                                            @if (isset($rt_keamanan->jk_suku))
                                                <br>
                                                {{ $rt_keamanan->jk_suku }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjk_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjkl_suku">JUMLAH KORBAN LUKA
                                            </label>
                                            @if (isset($rt_keamanan->jkl_suku))
                                                <br>
                                                {{ $rt_keamanan->jkl_suku }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjkl_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_suku">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_suku))
                                                <br>
                                                {{ $rt_keamanan->jkl_suku }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_suku">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_suku))
                                                <br>
                                                {{ $rt_keamanan->pen_suku }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_suku')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_suku">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_suku))
                                                <br>
                                                {{ $rt_keamanan->pp_suku }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_suku')
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
                                            <label for="valpenyebabu_lainnya">PENYEBAB UTAMA
                                            </label>
                                            @if (isset($rt_keamanan->penyebabu_lainnya))
                                                <br>
                                                {{ $rt_keamanan->penyebabu_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpenyebabu_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjk_lainnya">JUMLAH KEJADIAN
                                            </label>
                                            @if (isset($rt_keamanan->jk_lainnya))
                                                <br>
                                                {{ $rt_keamanan->jk_lainnya }}
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
                                            <label for="valjkl_lainnya">JUMLAH KORBAN LUKA
                                            </label>
                                            @if (isset($rt_keamanan->jkl_lainnya))
                                                <br>
                                                {{ $rt_keamanan->jkl_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjkl_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjt_lainnya">JUMLAH TEWAS
                                            </label>
                                            @if (isset($rt_keamanan->jkl_lainnya))
                                                <br>
                                                {{ $rt_keamanan->jkl_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjt_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpen_lainnya">PENYELESAIAN
                                            </label>
                                            @if (isset($rt_keamanan->pen_lainnya))
                                                <br>
                                                {{ $rt_keamanan->pen_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpen_lainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpp_lainnya">PIHAK PENDAMAI
                                            </label>
                                            @if (isset($rt_keamanan->pp_lainnya))
                                                <br>
                                                {{ $rt_keamanan->pp_lainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpp_lainnya')
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
