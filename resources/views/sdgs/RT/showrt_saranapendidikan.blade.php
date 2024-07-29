 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">SARANA PENDIDIKAN
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_saranapendidikan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_saranapendidikan.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label">POS PAUD
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_paud">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_paud))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_paud }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_paud">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_paud))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_paud }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_paud">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_paud))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_paud }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_paud">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_paud))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_paud }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_paud">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_paud))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_paud }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_paud">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_paud))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_paud }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TK/RA/BA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_tk">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_tk))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_tk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tk">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_tk))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_tk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpemilik_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_tk">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_tk))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_tk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_tk">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_tk))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_tk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_tk">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_tk))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_tk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_tk">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_tk))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_tk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SD/MI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_sd">NAMA
                                            </label>
                                              @if (isset($rt_saranapendidikan->nama_sd))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_sd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_sd">PEMILIK
                                            </label>
                                              @if (isset($rt_saranapendidikan->pemilik_sd))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_sd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_sd">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_sd))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_sd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_sd">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_sd))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_sd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_sd">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_sd))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_sd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_sd">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_sd))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_sd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SMP/MTs

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_smp">NAMA
                                            </label>
                                              @if (isset($rt_saranapendidikan->nama_smp))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_smp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_smp">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_smp))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_smp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpemilik_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_smp">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_smp))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_smp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_smp">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_smp))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_smp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_smp">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_smp))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_smp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_smp">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_smp))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_smp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SMPLB

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_smplb">NAMA
                                            </label>
                                              @if (isset($rt_saranapendidikan->nama_smplb))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_smplb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_smplb">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_smplb))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_smplb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_smplb">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_smplb))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_smplb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_smplb">JUMLAH GURU
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_smplb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_smplb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_smplb">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_smplb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_smplb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_smplb">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_smplb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_smplb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SMA/MA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_sma">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_sma))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_sma }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_sma">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_sma))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_sma }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_sma">KONDISI BANGUNAN
                                            </label>
                                           @if (isset($rt_saranapendidikan->kondisi_sma))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_sma }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_sma">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_sma))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_sma }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_sma">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_sma))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_sma }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_sma">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_sma))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_sma }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SMK

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_smk">NAMA
                                            </label>
                                              @if (isset($rt_saranapendidikan->nama_smk))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_smk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_smk">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_smk))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_smk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_smk">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_smk))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_smk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_smk">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_smk))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_smk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_smk">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_smk))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_smk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_smk">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_smk))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_smk }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SMA/LB

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_smalb">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_smalb))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_smalb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_smalb">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_smalb))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_smalb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_smalb">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_smalb))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_smalb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_smalb">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_smalb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_smalb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_smalb">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_smalb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_smalb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_smalb">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_smalb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_smalb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AKADEMI/PERGURUAN TINGGI
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_akademi">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_akademi))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_akademi }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_akademi">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_akademi))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_akademi }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_akademi">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_akademi))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_akademi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_akademi">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_akademi))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_akademi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_akademi">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_akademi))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_akademi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_akademi">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_akademi))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_akademi }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PESANTREN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_pesantren">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_pesantren))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_pesantren }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pesantren">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_pesantren))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_pesantren }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_pesantren">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_pesantren))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_pesantren }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_pesantren">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_pesantren))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_pesantren }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_pesantren">JUMLAH MURID

                                            </label>
                                              @if (isset($rt_saranapendidikan->jumlahmurid_pesantren))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_pesantren }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_pesantren">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_pesantren))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_pesantren }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">MADRASAH DINIYAH
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_madrasahdn">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_madrasahnd))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_madrasahnd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_madrasahdn">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_madrasahnd))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_madrasahnd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_madrasahdn">KONDISI BANGUNAN
                                            </label>
                                             @if (isset($rt_saranapendidikan->kondisi_madrasahnd))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_madrasahnd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_madrasahdn">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_madrasahnd))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_madrasahnd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_madrasahdn">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_madrasahnd))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_madrasahnd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_madrasahdn">JUMLAH PEGAWAI
                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahpegawai_madrasahnd))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_madrasahnd }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SEMINARI/SEJENISNYA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_seminari">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_seminari))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_seminari }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_seminari">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_seminari))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_seminari }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_seminari">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_seminari))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_seminari }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_seminari">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_seminari))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_seminari }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_seminari">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_seminari))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_seminari }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_seminari">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_seminari))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_seminari }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SEKOLAH AGAMA LAIINYA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_sekolahag">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_sekolahag))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_sekolahag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_sekolahag">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_sekolahag))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_sekolahag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_sekolahag">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_sekolahag))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_sekolahag }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_sekolahag">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_sekolahag))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_sekolahag }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_sekolahag">JUMLAH MURID
                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_sekolahag))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_sekolahag }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_sekolahag">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_sekolahag))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_sekolahag }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEGIATAN PEMBERANTASAN BUTA AKSARA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_butaaksara">NAMA
                                            </label>
                                              @if (isset($rt_saranapendidikan->nama_butaaksara))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_butaaksara }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_butaaksara">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_butaaksara))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_butaaksara }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_butaaksara">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_butaaksara))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_butaaksara }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_butaaksara">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_butaaksara))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_butaaksara }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_butaaksara">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_butaaksara))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_butaaksara }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_butaaksara">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_butaaksara))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_butaaksara }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEGIATAN KEJAR PAKET A

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_paketa">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_paketa))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_paketa }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_paketa">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_paketa))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_paketa }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_paketa">KONDISI BANGUNAN
                                            </label>
                                             @if (isset($rt_saranapendidikan->kondisi_paketa))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_paketa }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_paketa">JUMLAH GURU

                                            </label>
                                              @if (isset($rt_saranapendidikan->jumlahguru_paketa))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_paketa }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_paketa">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_paketa))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_paketa }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_paketa">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_paketa))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_paketa }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEGIATAN KEJAR PAKET B

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_paketb">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_paketb))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_paketb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_paketb">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_paketb))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_paketb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valpemilik_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_paketb">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_paketb))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_paketb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_paketb">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_paketb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_paketb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_paketb">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_paketb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_paketb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_paketb">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_paketb))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_paketb }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEGIATAN KEJAR PAKET C

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_paketc">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_paketc))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_paketc }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_paketc">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_paketc))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_paketc }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_paketc">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_paketc))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_paketc }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_paketc">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_paketc))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_paketc }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_paketc">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_paketc))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_paketc }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_paketc">JUMLAH PEGAWAI
                                            </label>
                                           @if (isset($rt_saranapendidikan->jumlahpegawai_paketc))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_paketc }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KELOMPOK BERMAIN/PLAYGRUP
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_playgrup">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_playgrup))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_playgrup }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_playgrup">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_playgrup))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_playgrup }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_playgrup">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_playgrup))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_playgrup }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_playgrup">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_playgrup))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_playgrup }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_playgrup">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_playgrup))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_playgrup }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_playgrup">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_playgrup))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_playgrup }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TEMPAT PENITIPAN ANAK

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_penitipananak">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_penitipananak))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_penitipananak }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_penitipananak">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_penitipananak))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_penitipananak }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_penitipananak">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_penitipananak))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_penitipananak }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_penitipananak">JUMLAH GURU

                                            </label>
                                              @if (isset($rt_saranapendidikan->jumlahguru_penitipananak))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_penitipananak }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_penitipananak">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_penitipananak))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_penitipananak }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_penitipananak">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_penitipananak))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_penitipananak }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TAMAN PENDIDIKAN AL QURAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_pendidikanq">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_pendidikanaq))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_pendidikanaq }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pendidikanq">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_pendidikanaq))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_pendidikanaq }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_pendidikanq">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_pendidikanaq))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_pendidikanaq }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_pendidikanq">JUMLAH GURU

                                            </label>
                                              @if (isset($rt_saranapendidikan->jumlahguru_pendidikanaq))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_pendidikanaq }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_pendidikanq">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_pendidikanaq))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_pendidikanaq }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_pendidikanq">JUMLAH PEGAWAI
                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahpegawai_pendidikanaq))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_pendidikanaq }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURUSU BAHASA ASING

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_bahasaas">NAMA
                                            </label>
                                          @if (isset($rt_saranapendidikan->nama_bahasaas))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_bahasaas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_bahasaas">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_bahasaas))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_bahasaas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bahasaas">KONDISI BANGUNAN
                                            </label>
                                          @if (isset($rt_saranapendidikan->kondisi_bahasaas))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_bahasaas }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_bahasaas">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_bahasaas))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_bahasaas }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_bahasaas">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_bahasaas))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_bahasaas }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_bahasaas">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_bahasaas))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_bahasaas }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS KOMPUTER

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursuskomp">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_kursuskomp))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kursuskomp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursuskomp">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_kursuskomp))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kursuskomp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursuskomp">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_kursuskomp))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kursuskomp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursuskomp">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_kursuskomp))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kursuskomp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursuskomp">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_kursuskomp))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kursuskomp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursuskomp">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_kursuskomp))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kursuskomp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS MENJAHIT / TATA BUSANA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursusmenjahit">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_kursusmenjahit))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kursusmenjahit }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursusmenjahit">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_kursusmenjahit))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kursusmenjahit }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursusmenjahit">KONDISI BANGUNAN
                                            </label>
                                             @if (isset($rt_saranapendidikan->kondisi_kursusmenjahit))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kursusmenjahit }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursusmenjahit">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_kursusmenjahit))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kursusmenjahit }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursusmenjahit">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_kursusmenjahit))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kursusmenjahit }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursusmenjahit">JUMLAH PEGAWAI
                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahpegawai_kursusmenjahit))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kursusmenjahit }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS KECANTIKAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursuskecantikan">NAMA
                                            </label>
                                           @if (isset($rt_saranapendidikan->nama_kurseskecantikan))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kurseskecantikan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursuskecantikan">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_kurseskecantikan))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kurseskecantikan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursuskecantikan">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_kurseskecantikan))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kurseskecantikan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursuskecantikan">JUMLAH GURU

                                            </label>
                                              @if (isset($rt_saranapendidikan->jumlahguru_kurseskecantikan))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kurseskecantikan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursuskecantikan">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_kurseskecantikan))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kurseskecantikan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursuskecantikan">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_kurseskecantikan))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kurseskecantikan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS MONTIR MOBIL/MOTOR

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursusmontir">NAMA
                                            </label>
                                             @if (isset($rt_saranapendidikan->nama_kursusmontir))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kursusmontir }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursusmontir">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_kursusmontir))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kursusmontir }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursusmontir">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_kursusmontir))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kursusmontir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursusmontir">JUMLAH GURU

                                            </label>
                                              @if (isset($rt_saranapendidikan->jumlahguru_kursusmontir))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kursusmontir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursusmontir">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_kursusmontir))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kursusmontir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursusmontir">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_kursusmontir))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kursusmontir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS MENYETIR

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursussetir">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_kursessetir))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kursessetir }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursussetir">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_kursessetir))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kursessetir }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursussetir">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_kursessetir))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kursessetir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursussetir">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_kursessetir))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kursessetir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursussetir">JUMLAH MURID

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahmurid_kursessetir))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kursessetir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursussetir">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_kursessetir))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kursessetir }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS ELEKTRONIKA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursuselektronik">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_kurseselektronik))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kurseselektronik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursuselektronik">PEMILIK
                                            </label>
                                             @if (isset($rt_saranapendidikan->pemilik_kurseselektronik))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kurseselektronik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursuselektronik">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_kurseselektronik))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kurseselektronik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursuselektronik">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_kurseselektronik))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kurseselektronik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursuselektronik">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_kurseselektronik))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kurseselektronik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursuselektronik">JUMLAH PEGAWAI
                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahpegawai_kurseselektronik))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kurseselektronik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS MEMASAK/TATABOGA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_tataboga">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_tataboga))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_tataboga }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tataboga">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_tataboga))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_tataboga }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_tataboga">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_tataboga))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_tataboga }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_tataboga">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_tataboga))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_tataboga }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_tataboga">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_tataboga))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_tataboga }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_tataboga">JUMLAH PEGAWAI
                                            </label>
                                           @if (isset($rt_saranapendidikan->jumlahpegawai_tataboga))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_tataboga }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS MENGETIK

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursusketik">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_kursusketik))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kursusketik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursusketik">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_kursusketik))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kursusketik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursusketik">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_kursusketik))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kursusketik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursusketik">JUMLAH GURU

                                            </label>
                                              @if (isset($rt_saranapendidikan->jumlahguru_kursusketik))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kursusketik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursusketik">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_kursusketik))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kursusketik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursusketik">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_kursusketik))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kursusketik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS AKUNTANSI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursusakuntan">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_kursusakuntan))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kursusakuntan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursusakuntan">PEMILIK
                                            </label>
                                           @if (isset($rt_saranapendidikan->pemilik_kursusakuntan))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kursusakuntan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursusakuntan">KONDISI BANGUNAN
                                            </label>
                                           @if (isset($rt_saranapendidikan->kondisi_kursusakuntan))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kursusakuntan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursusakuntan">JUMLAH GURU

                                            </label>
                                             @if (isset($rt_saranapendidikan->jumlahguru_kursusakuntan))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kursusakuntan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursusakuntan">JUMLAH MURID

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahmurid_kursusakuntan))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kursusakuntan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursusakuntan">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_kursusakuntan))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kursusakuntan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KURSUS LAINNYA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_kursuslain">NAMA
                                            </label>
                                            @if (isset($rt_saranapendidikan->nama_kursuslain))
                                                <br>
                                                {{ $rt_saranapendidikan->nama_kursuslain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursuslain">PEMILIK
                                            </label>
                                            @if (isset($rt_saranapendidikan->pemilik_kursuslain))
                                                <br>
                                                {{ $rt_saranapendidikan->pemilik_kursuslain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valpemilik_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursuslain">KONDISI BANGUNAN
                                            </label>
                                            @if (isset($rt_saranapendidikan->kondisi_kursuslain))
                                            <br>
                                            {{ $rt_saranapendidikan->kondisi_kursuslain }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valkondisi_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursuslain">JUMLAH GURU

                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahguru_kursuslain))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahguru_kursuslain }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahguru_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursuslain">JUMLAH MURID

                                            </label>
                                           @if (isset($rt_saranapendidikan->jumlahmurid_kursuslain))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahmurid_kursuslain }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahmurid_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursuslain">JUMLAH PEGAWAI
                                            </label>
                                            @if (isset($rt_saranapendidikan->jumlahpegawai_kursuslain))
                                            <br>
                                            {{ $rt_saranapendidikan->jumlahpegawai_kursuslain }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpegawai_kursuslain')
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
