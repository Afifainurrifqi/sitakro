 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">DATA KESEHATAN
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_kesehatan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_kesehatan.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">RUMAH SAKIT
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_rs">NAMA
                                            </label>
                                            @if (isset($rt_kesehatan->nama_rs))
                                                <br>
                                                {{ $rt_kesehatan->nama_rs }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valnama_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_rs">PEMILIK
                                            </label>

                                            @if (isset($rt_kesehatan->pemilik_rs))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_rs }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_rs">JUMLAH DOKTER
                                            </label>
                                            @if (isset($rt_kesehatan->jd_rs))
                                                <br>
                                                {{ $rt_kesehatan->jd_rs }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valjd_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_rs">JUMLAH BIDAN
                                            </label>
                                            @if (isset($rt_kesehatan->jb_rs))
                                                <br>
                                                {{ $rt_kesehatan->jb_rs }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_rs">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            @if (isset($rt_kesehatan->jts_rs))
                                                <br>
                                                {{ $rt_kesehatan->jts_rs }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valjts_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_rs">JUMLAH PEGAWAI

                                            </label>

                                            @if (isset($rt_kesehatan->jp_rs))
                                                <br>
                                                {{ $rt_kesehatan->jp_rs }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_rs')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">RUMAH SAKIT BERSALIN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_rsb">NAMA
                                            </label>
                                            @if (isset($rt_kesehatan->nama_rsb))
                                                <br>
                                                {{ $rt_kesehatan->nama_rsb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_rsb">PEMILIK
                                            </label>
                                            @if (isset($rt_kesehatan->pemilik_rsb))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_rsb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_rsb">JUMLAH DOKTER
                                            </label>
                                            @if (isset($rt_kesehatan->jd_rsb))
                                                <br>
                                                {{ $rt_kesehatan->jd_rsb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_rsb">JUMLAH BIDAN
                                            </label>
                                            @if (isset($rt_kesehatan->jb_rsb))
                                                <br>
                                                {{ $rt_kesehatan->jb_rsb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_rsb">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            @if (isset($rt_kesehatan->jts_rsb))
                                                <br>
                                                {{ $rt_kesehatan->jts_rsb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_rsb">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset($rt_kesehatan->jp_rsb))
                                                <br>
                                                {{ $rt_kesehatan->jp_rsb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_rsb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PUSKESMAS DENGAN RAWAT INAP

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_pdri">NAMA
                                            </label>
                                             @if (isset($rt_kesehatan->nama_pdri))
                                                <br>
                                                {{ $rt_kesehatan->nama_pdri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valnama_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pdri">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_pdri))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_pdri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_pdri">JUMLAH DOKTER
                                            </label>
                                                 @if (isset($rt_kesehatan->jd_pdri))
                                                <br>
                                                {{ $rt_kesehatan->jd_pdri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_pdri">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_pdri))
                                                <br>
                                                {{  $rt_kesehatan->jb_pdri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_pdri">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_pdri))
                                                <br>
                                                {{  $rt_kesehatan->jts_pdri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_pdri">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_pdri))
                                                <br>
                                                {{  $rt_kesehatan->jp_pdri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_pdri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PUSKESMAS TANPA RAWAT INAP

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_ptri">NAMA
                                            </label>
                                               @if (isset($rt_kesehatan->nama_ptri))
                                                <br>
                                                {{ $rt_kesehatan->nama_ptri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_ptri">PEMILIK
                                            </label>
                                              @if (isset($rt_kesehatan->pemilik_ptri))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_ptri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_ptri">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_ptri))
                                                <br>
                                                {{ $rt_kesehatan->jd_ptri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_ptri">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_ptri))
                                                <br>
                                                {{  $rt_kesehatan->jb_ptri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_ptri">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_ptri))
                                                <br>
                                                {{  $rt_kesehatan->jts_ptri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_ptri">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_ptri))
                                                <br>
                                                {{  $rt_kesehatan->jp_ptri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_ptri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PUSKESMAS PEMBANTU

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_pp">NAMA
                                            </label>
                                               @if (isset($rt_kesehatan->nama_pp))
                                                <br>
                                                {{ $rt_kesehatan->nama_pp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pp">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_pp))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_pp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_pp">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_pp))
                                                <br>
                                                {{ $rt_kesehatan->jd_pp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_pp">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_pp))
                                                <br>
                                                {{  $rt_kesehatan->jb_pp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_pp">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            @if (isset( $rt_kesehatan->jts_pp))
                                                <br>
                                                {{  $rt_kesehatan->jts_pp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_pp">JUMLAH PEGAWAI

                                            </label>
                                           @if (isset( $rt_kesehatan->jp_pp))
                                                <br>
                                                {{  $rt_kesehatan->jp_pp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_pp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POLIKLINIK/BALAI PENGOBATAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_pbp">NAMA
                                            </label>
                                               @if (isset($rt_kesehatan->nama_pbp))
                                                <br>
                                                {{ $rt_kesehatan->nama_pbp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valnama_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pbp">PEMILIK
                                            </label>
                                            @if (isset($rt_kesehatan->pemilik_pbp))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_pbp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_pbp">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_pbp))
                                                <br>
                                                {{ $rt_kesehatan->jd_pbp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_pbp">JUMLAH BIDAN
                                            </label>
                                            @if (isset( $rt_kesehatan->jb_pbp))
                                                <br>
                                                {{  $rt_kesehatan->jb_pbp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_pbp">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_pbp))
                                                <br>
                                                {{  $rt_kesehatan->jts_pbp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_pbp">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_pbp))
                                                <br>
                                                {{  $rt_kesehatan->jp_pbp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_pbp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TEMPAT PRAKTIK DOKTER
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_tpd">NAMA
                                            </label>
                                             @if (isset($rt_kesehatan->nama_tpd))
                                                <br>
                                                {{ $rt_kesehatan->nama_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tpd">PEMILIK
                                            </label>
                                            @if (isset($rt_kesehatan->pemilik_tpd))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_tpd">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_tpd))
                                                <br>
                                                {{ $rt_kesehatan->jd_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_tpd">JUMLAH BIDAN
                                            </label>
                                          @if (isset( $rt_kesehatan->jb_tpd))
                                                <br>
                                                {{  $rt_kesehatan->jb_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_tpd">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_tpd))
                                                <br>
                                                {{  $rt_kesehatan->jts_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tpd">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_tpd))
                                                <br>
                                                {{  $rt_kesehatan->jp_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">RUMAH BERSALIN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_rb">NAMA
                                            </label>
                                              @if (isset($rt_kesehatan->nama_rb))
                                                <br>
                                                {{ $rt_kesehatan->nama_rb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_rb">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_rb))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_rb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_rb">JUMLAH DOKTER
                                            </label>
                                                 @if (isset($rt_kesehatan->jd_rb))
                                                <br>
                                                {{ $rt_kesehatan->jd_rb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_rb">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_rb))
                                                <br>
                                                {{  $rt_kesehatan->jb_rb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_rb">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            @if (isset( $rt_kesehatan->jts_rb))
                                                <br>
                                                {{  $rt_kesehatan->jts_rb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_rb">JUMLAH PEGAWAI

                                            </label>
                                             @if (isset( $rt_kesehatan->jp_rb))
                                                <br>
                                                {{  $rt_kesehatan->jp_rb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_rb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TEMPAT PRAKTEK BIDAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_tpb">NAMA
                                            </label>
                                              @if (isset($rt_kesehatan->nama_tpb))
                                                <br>
                                                {{ $rt_kesehatan->nama_tpb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tpb">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_tpb))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_tpb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_tpb">JUMLAH DOKTER
                                            </label>
                                              @if (isset($rt_kesehatan->jd_tpb))
                                                <br>
                                                {{ $rt_kesehatan->jd_tpb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_tpb">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_tpb))
                                                <br>
                                                {{  $rt_kesehatan->jb_tpb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_tpb">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_tpb))
                                                <br>
                                                {{  $rt_kesehatan->jts_tpb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tpb">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_tpb))
                                                <br>
                                                {{  $rt_kesehatan->jp_tpb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_tpb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POSKESDES

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_poskedes">NAMA
                                            </label>
                                              @if (isset($rt_kesehatan->nama_pokedes))
                                                <br>
                                                {{ $rt_kesehatan->nama_pokedes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_poskedes">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_pokedes))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_pokedes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_poskedes">JUMLAH DOKTER
                                            </label>
                                                 @if (isset($rt_kesehatan->jd_pokedes))
                                                <br>
                                                {{ $rt_kesehatan->jd_pokedes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_poskedes">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_pokedes))
                                                <br>
                                                {{  $rt_kesehatan->jb_pokedes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_poskedes">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_pokedes))
                                                <br>
                                                {{  $rt_kesehatan->jts_pokedes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_poskedes">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_pokedes))
                                                <br>
                                                {{  $rt_kesehatan->jp_pokedes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_poskedes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POLINDES

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_polindes">NAMA
                                            </label>
                                               @if (isset($rt_kesehatan->nama_polindes))
                                                <br>
                                                {{ $rt_kesehatan->nama_polindes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_polindes">PEMILIK
                                            </label>
                                              @if (isset($rt_kesehatan->pemilik_polindes))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_polindes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_polindes">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_polindes))
                                                <br>
                                                {{ $rt_kesehatan->jd_polindes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_polindes">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_polindes))
                                                <br>
                                                {{  $rt_kesehatan->jb_polindes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_polindes">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_polindes))
                                                <br>
                                                {{  $rt_kesehatan->jts_polindes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_polindes">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_polindes))
                                                <br>
                                                {{  $rt_kesehatan->jp_polindes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_polindes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">APOTIK

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_apotik">NAMA
                                            </label>
                                              @if (isset($rt_kesehatan->nama_apotik))
                                                <br>
                                                {{ $rt_kesehatan->nama_apotik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valnama_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_apotik">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_apotik))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_apotik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_apotik">JUMLAH DOKTER
                                            </label>
                                              @if (isset($rt_kesehatan->jd_apotik))
                                                <br>
                                                {{ $rt_kesehatan->jd_apotik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_apotik">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_apotik))
                                                <br>
                                                {{  $rt_kesehatan->jb_apotik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_apotik">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_apotik))
                                                <br>
                                                {{  $rt_kesehatan->jts_apotik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_apotik">JUMLAH PEGAWAI

                                            </label>
                                             @if (isset( $rt_kesehatan->jp_apotik))
                                                <br>
                                                {{  $rt_kesehatan->jp_apotik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_apotik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TOKO KHUSUS OBAT / JAMU
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_tokojamu">NAMA
                                            </label>
                                              @if (isset($rt_kesehatan->nama_tokojamu))
                                                <br>
                                                {{ $rt_kesehatan->nama_tokojamu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tokojamu">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_tokojamu))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_tokojamu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_tokojamu">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_tokojamu))
                                                <br>
                                                {{ $rt_kesehatan->jd_tokojamu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_tokojamu">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_tokojamu))
                                                <br>
                                                {{  $rt_kesehatan->jb_tokojamu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_tokojamu">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_tokojamu))
                                                <br>
                                                {{  $rt_kesehatan->jts_tokojamu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tokojamu">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_tokojamu))
                                                <br>
                                                {{  $rt_kesehatan->jp_tokojamu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_tokojamu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POSYANDU
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_posyandu">NAMA
                                            </label>
                                             @if (isset($rt_kesehatan->nama_posyandu))
                                                <br>
                                                {{ $rt_kesehatan->nama_posyandu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_posyandu">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_posyandu))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_posyandu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_posyandu">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_posyandu))
                                                <br>
                                                {{ $rt_kesehatan->jd_posyandu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_posyandu">JUMLAH BIDAN
                                            </label>
                                            @if (isset( $rt_kesehatan->jb_posyandu))
                                                <br>
                                                {{  $rt_kesehatan->jb_posyandu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_posyandu">JUMLAH TENAGA KESEHATAN

                                            </label>
                                            @if (isset( $rt_kesehatan->jts_posyandu))
                                                <br>
                                                {{  $rt_kesehatan->jts_posyandu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_posyandu">JUMLAH PEGAWAI

                                            </label>
                                            < @if (isset( $rt_kesehatan->jp_posyandu))
                                                <br>
                                                {{  $rt_kesehatan->jp_posyandu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_posyandu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">POSBINDU

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_posbindu">NAMA
                                            </label>
                                            @if (isset($rt_kesehatan->nama_posbindu))
                                                <br>
                                                {{ $rt_kesehatan->nama_posbindu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valnama_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_posbindu">PEMILIK
                                            </label>
                                             @if (isset($rt_kesehatan->pemilik_posbindu))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_posbindu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_posbindu">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_posbindu))
                                                <br>
                                                {{ $rt_kesehatan->jd_posbindu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_posbindu">JUMLAH BIDAN
                                            </label>
                                             @if (isset( $rt_kesehatan->jb_posbindu))
                                                <br>
                                                {{  $rt_kesehatan->jb_posbindu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_posbindu">JUMLAH TENAGA KESEHATAN

                                            </label>
                                              @if (isset( $rt_kesehatan->jts_posbindu))
                                                <br>
                                                {{  $rt_kesehatan->jts_posbindu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_posbindu">JUMLAH PEGAWAI

                                            </label>
                                            @if (isset( $rt_kesehatan->jp_posbindu))
                                                <br>
                                                {{  $rt_kesehatan->jp_posbindu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_posbindu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TEMPAT PRAKTEK DUKUN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_tpd">NAMA
                                            </label>
                                              @if (isset($rt_kesehatan->nama_tpd))
                                                <br>
                                                {{ $rt_kesehatan->nama_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valnama_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tpd">PEMILIK
                                            </label>
                                            @if (isset($rt_kesehatan->pemilik_tpd))
                                                <br>
                                                {{ $rt_kesehatan->pemilik_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjd_tpd">JUMLAH DOKTER
                                            </label>
                                                @if (isset($rt_kesehatan->jd_tpd))
                                                <br>
                                                {{ $rt_kesehatan->jd_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjd_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjb_tpd">JUMLAH BIDAN
                                            </label>
                                            @if (isset( $rt_kesehatan->jb_tpd))
                                                <br>
                                                {{  $rt_kesehatan->jb_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjb_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjts_tpd">JUMLAH TENAGA KESEHATAN

                                            </label>
                                             @if (isset( $rt_kesehatan->jts_tpd))
                                                <br>
                                                {{  $rt_kesehatan->jts_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjts_tpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjp_tpd">JUMLAH PEGAWAI

                                            </label>
                                           @if (isset( $rt_kesehatan->jp_tpd))
                                                <br>
                                                {{  $rt_kesehatan->jp_tpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjp_tpd')
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
