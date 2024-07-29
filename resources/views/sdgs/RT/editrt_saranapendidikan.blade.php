 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT SARANA PENDIDIKAN
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_saranapendidikan.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_saranapendidikan.update') }}" method="POST" id="form-edit-rtsarpend">
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
                                    <label class="col-lg-4 col-form-label">POS PAUD
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="valnama_paud">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_paud ?? '' }}"
                                                class="form-control @error('valnama_paud') is-invalid @enderror"
                                                id="valnama_paud" name="valnama_paud" placeholder="Nama...">

                                            @error('valnama_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_paud">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_paud') is-invalid @enderror"
                                                id="valpemilik_paud" name="valpemilik_paud">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_paud') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_paud == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_paud') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_paud == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_paud">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_paud') is-invalid @enderror"
                                                id="valkondisi_paud" name="valkondisi_paud">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_paud') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_paud == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_paud') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_paud == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_paud">JUMLAH GURU

                                            </label>
                                            <input type="number" value="{{ $rt_saranapendidikan->jumlahguru_paud ?? '' }}"
                                                class="form-control @error('valjumlahguru_paud') is-invalid @enderror"
                                                id="valjumlahguru_paud" name="valjumlahguru_paud" placeholder="Jumlah...">
                                            @error('valjumlahguru_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_paud">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_paud ?? '' }}"
                                                class="form-control @error('valjumlahmurid_paud') is-invalid @enderror"
                                                id="valjumlahmurid_paud" name="valjumlahmurid_paud" placeholder="Jumlah...">
                                            @error('valjumlahmurid_paud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_paud">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_paud ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_paud') is-invalid @enderror"
                                                id="valjumlahpegawai_paud" name="valjumlahpegawai_paud"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_tk ?? '' }}"
                                                class="form-control @error('valnama_tk') is-invalid @enderror"
                                                id="valnama_tk" name="valnama_tk" placeholder="Nama...">
                                            @error('valnama_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tk">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_tk') is-invalid @enderror"
                                                id="valpemilik_tk" name="valpemilik_tk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_tk') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_tk == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_tk') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_tk == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>
                                            @error('valpemilik_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_tk">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_tk') is-invalid @enderror"
                                                id="valkondisi_tk" name="valkondisi_tk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_tk') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_tk == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_tk') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_tk == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_tk">JUMLAH GURU

                                            </label>
                                            <input type="number" value="{{ $rt_saranapendidikan->jumlahguru_tk ?? '' }}"
                                                class="form-control @error('valjumlahguru_tk') is-invalid @enderror"
                                                id="valjumlahguru_tk" name="valjumlahguru_tk" placeholder="Jumlah...">
                                            @error('valjumlahguru_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_tk">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_tk ?? '' }}"
                                                class="form-control @error('valjumlahmurid_tk') is-invalid @enderror"
                                                id="valjumlahmurid_tk" name="valjumlahmurid_tk" placeholder="Jumlah...">
                                            @error('valjumlahmurid_tk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_tk">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_tk ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_tk') is-invalid @enderror"
                                                id="valjumlahpegawai_tk" name="valjumlahpegawai_tk"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_sd ?? '' }}"
                                                class="form-control @error('valnama_sd') is-invalid @enderror"
                                                id="valnama_sd" name="valnama_sd" placeholder="Nama...">
                                            @error('valnama_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_sd">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_sd') is-invalid @enderror"
                                                id="valpemilik_sd" name="valpemilik_sd">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_sd') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_sd == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_sd') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_sd == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_sd">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_sd') is-invalid @enderror"
                                                id="valkondisi_sd" name="valkondisi_sd">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_sd') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_sd == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_sd') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_sd == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_sd">JUMLAH GURU

                                            </label>
                                            <input type="number" value="{{ $rt_saranapendidikan->jumlahguru_sd ?? '' }}"
                                                class="form-control @error('valjumlahguru_sd') is-invalid @enderror"
                                                id="valjumlahguru_sd" name="valjumlahguru_sd" placeholder="Jumlah...">
                                            @error('valjumlahguru_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_sd">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_sd ?? '' }}"
                                                class="form-control @error('valjumlahmurid_sd') is-invalid @enderror"
                                                id="valjumlahmurid_sd" name="valjumlahmurid_sd" placeholder="Jumlah...">
                                            @error('valjumlahmurid_sd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_sd">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_sd ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_sd') is-invalid @enderror"
                                                id="valjumlahpegawai_sd" name="valjumlahpegawai_sd"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_smp ?? '' }}"
                                                class="form-control @error('valnama_smp') is-invalid @enderror"
                                                id="valnama_smp" name="valnama_smp" placeholder="Nama...">
                                            @error('valnama_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_smp">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_smp') is-invalid @enderror"
                                                id="valpemilik_smp" name="valpemilik_smp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_smp') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_smp == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_smp') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_smp == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_smp">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_smp') is-invalid @enderror"
                                                id="valkondisi_smp" name="valkondisi_smp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_smp') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_smp == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_smp') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_smp == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_smp">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_smp ?? '' }}"
                                                class="form-control @error('valjumlahguru_smp') is-invalid @enderror"
                                                id="valjumlahguru_smp" name="valjumlahguru_smp" placeholder="Jumlah...">
                                            @error('valjumlahguru_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_smp">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_smp ?? '' }}"
                                                class="form-control @error('valjumlahmurid_smp') is-invalid @enderror"
                                                id="valjumlahmurid_smp" name="valjumlahmurid_smp"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_smp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_smp">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_smp ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_smp') is-invalid @enderror"
                                                id="valjumlahpegawai_smp" name="valjumlahpegawai_smp"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_smplb ?? '' }}"
                                                class="form-control @error('valnama_smplb') is-invalid @enderror"
                                                id="valnama_smplb" name="valnama_smplb" placeholder="Nama...">
                                            @error('valnama_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_smplb">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_smplb') is-invalid @enderror"
                                                id="valpemilik_smplb" name="valpemilik_smplb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_smplb') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_smplb == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_smplb') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_smplb == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_smplb">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_smplb') is-invalid @enderror"
                                                id="valkondisi_smplb" name="valkondisi_smplb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_smplb') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_smplb == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_smplb') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_smplb == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_smplb">JUMLAH GURU
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_smplb ?? '' }}"
                                                class="form-control @error('valjumlahguru_smplb') is-invalid @enderror"
                                                id="valjumlahguru_smplb" name="valjumlahguru_smplb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_smplb">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_smplb ?? '' }}"
                                                class="form-control @error('valjumlahmurid_smplb') is-invalid @enderror"
                                                id="valjumlahmurid_smplb" name="valjumlahmurid_smplb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_smplb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_smplb">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_smplb ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_smplb') is-invalid @enderror"
                                                id="valjumlahpegawai_smplb" name="valjumlahpegawai_smplb"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_sma ?? '' }}"
                                                class="form-control @error('valnama_sma') is-invalid @enderror"
                                                id="valnama_sma" name="valnama_sma" placeholder="Nama...">
                                            @error('valnama_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_sma">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_sma') is-invalid @enderror"
                                                id="valpemilik_sma" name="valpemilik_sma">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_sma') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_sma == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_sma') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_sma == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_sma">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_sma') is-invalid @enderror"
                                                id="valkondisi_sma" name="valkondisi_sma">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_sma') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_sma == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_sma') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_sma == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_sma">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_sma ?? '' }}"
                                                class="form-control @error('valjumlahguru_sma') is-invalid @enderror"
                                                id="valjumlahguru_sma" name="valjumlahguru_sma" placeholder="Jumlah...">
                                            @error('valjumlahguru_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_sma">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_sma ?? '' }}"
                                                class="form-control @error('valjumlahmurid_sma') is-invalid @enderror"
                                                id="valjumlahmurid_sma" name="valjumlahmurid_sma"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_sma')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_sma">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_sma ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_sma') is-invalid @enderror"
                                                id="valjumlahpegawai_sma" name="valjumlahpegawai_sma"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_smk ?? '' }}"
                                                class="form-control @error('valnama_smk') is-invalid @enderror"
                                                id="valnama_smk" name="valnama_smk" placeholder="Nama...">
                                            @error('valnama_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_smk">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_smk') is-invalid @enderror"
                                                id="valpemilik_smk" name="valpemilik_smk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_smk') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_smk == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_smk') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_smk == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_smk">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_smk') is-invalid @enderror"
                                                id="valkondisi_smk" name="valkondisi_smk">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_smk') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_smk == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_smk') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_smk == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_smk">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_smk ?? '' }}"
                                                class="form-control @error('valjumlahguru_smk') is-invalid @enderror"
                                                id="valjumlahguru_smk" name="valjumlahguru_smk" placeholder="Jumlah...">
                                            @error('valjumlahguru_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_smk">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_smk ?? '' }}"
                                                class="form-control @error('valjumlahmurid_smk') is-invalid @enderror"
                                                id="valjumlahmurid_smk" name="valjumlahmurid_smk"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_smk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_smk">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_smk ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_smk') is-invalid @enderror"
                                                id="valjumlahpegawai_smk" name="valjumlahpegawai_smk"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_smalb ?? '' }}"
                                                class="form-control @error('valnama_smalb') is-invalid @enderror"
                                                id="valnama_smalb" name="valnama_smalb" placeholder="Nama...">
                                            @error('valnama_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_smalb">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_smalb') is-invalid @enderror"
                                                id="valpemilik_smalb" name="valpemilik_smalb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_smalb') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_smalb == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_smalb') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_smalb == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_smalb">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_smalb') is-invalid @enderror"
                                                id="valkondisi_smalb" name="valkondisi_smalb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_smalb') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_smalb == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_smalb') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_smalb == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_smalb">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_smalb ?? '' }}"
                                                class="form-control @error('valjumlahguru_smalb') is-invalid @enderror"
                                                id="valjumlahguru_smalb" name="valjumlahguru_smalb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_smalb">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_smalb ?? '' }}"
                                                class="form-control @error('valjumlahmurid_smalb') is-invalid @enderror"
                                                id="valjumlahmurid_smalb" name="valjumlahmurid_smalb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_smalb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_smalb">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_smalb ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_smalb') is-invalid @enderror"
                                                id="valjumlahpegawai_smalb" name="valjumlahpegawai_smalb"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_akademi ?? '' }}"
                                                class="form-control @error('valnama_akademi') is-invalid @enderror"
                                                id="valnama_akademi" name="valnama_akademi" placeholder="Nama...">
                                            @error('valnama_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_akademi">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_akademi') is-invalid @enderror"
                                                id="valpemilik_akademi" name="valpemilik_akademi">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_akademi') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_akademi == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_akademi') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_akademi == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_akademi">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_akademi') is-invalid @enderror"
                                                id="valkondisi_akademi" name="valkondisi_akademi">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_akademi') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_akademi == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_akademi') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_akademi == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_akademi">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_akademi ?? '' }}"
                                                class="form-control @error('valjumlahguru_akademi') is-invalid @enderror"
                                                id="valjumlahguru_akademi" name="valjumlahguru_akademi"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_akademi">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_akademi ?? '' }}"
                                                class="form-control @error('valjumlahmurid_akademi') is-invalid @enderror"
                                                id="valjumlahmurid_akademi" name="valjumlahmurid_akademi"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_akademi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_akademi">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_akademi ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_akademi') is-invalid @enderror"
                                                id="valjumlahpegawai_akademi" name="valjumlahpegawai_akademi"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_pesantren ?? '' }}"
                                                class="form-control @error('valnama_pesantren') is-invalid @enderror"
                                                id="valnama_pesantren" name="valnama_pesantren" placeholder="Nama...">
                                            @error('valnama_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pesantren">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_pesantren') is-invalid @enderror"
                                                id="valpemilik_pesantren" name="valpemilik_pesantren">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_pesantren') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_pesantren == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_pesantren') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_pesantren == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_pesantren">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_pesantren') is-invalid @enderror"
                                                id="valkondisi_pesantren" name="valkondisi_pesantren">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_pesantren') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_pesantren == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_pesantren') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_pesantren == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_pesantren">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_pesantren ?? '' }}"
                                                class="form-control @error('valjumlahguru_pesantren') is-invalid @enderror"
                                                id="valjumlahguru_pesantren" name="valjumlahguru_pesantren"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_pesantren">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_pesantren ?? '' }}"
                                                class="form-control @error('valjumlahmurid_pesantren') is-invalid @enderror"
                                                id="valjumlahmurid_pesantren" name="valjumlahmurid_pesantren"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_pesantren')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_pesantren">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_pesantren ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_pesantren') is-invalid @enderror"
                                                id="valjumlahpegawai_pesantren" name="valjumlahpegawai_pesantren"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_madrasahdn ?? '' }}"
                                                class="form-control @error('valnama_madrasahdn') is-invalid @enderror"
                                                id="valnama_madrasahdn" name="valnama_madrasahdn" placeholder="Nama...">
                                            @error('valnama_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_madrasahdn">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_madrasahdn') is-invalid @enderror"
                                                id="valpemilik_madrasahdn" name="valpemilik_madrasahdn">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_madrasahdn') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_madrasahdn == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_madrasahdn') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_madrasahdn == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_madrasahdn">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_madrasahdn') is-invalid @enderror"
                                                id="valkondisi_madrasahdn" name="valkondisi_madrasahdn">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_madrasahdn') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_madrasahdn == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_madrasahdn') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_madrasahdn == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_madrasahdn">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_madrasahdn ?? '' }}"
                                                class="form-control @error('valjumlahguru_madrasahdn') is-invalid @enderror"
                                                id="valjumlahguru_madrasahdn" name="valjumlahguru_madrasahdn"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_madrasahdn">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_madrasahdn ?? '' }}"
                                                class="form-control @error('valjumlahmurid_madrasahdn') is-invalid @enderror"
                                                id="valjumlahmurid_madrasahdn" name="valjumlahmurid_madrasahdn"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_madrasahdn')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_madrasahdn">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_madrasahdn ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_madrasahdn') is-invalid @enderror"
                                                id="valjumlahpegawai_madrasahdn" name="valjumlahpegawai_madrasahdn"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_seminari ?? '' }}"
                                                class="form-control @error('valnama_seminari') is-invalid @enderror"
                                                id="valnama_seminari" name="valnama_seminari" placeholder="Nama...">
                                            @error('valnama_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_seminari">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_seminari') is-invalid @enderror"
                                                id="valpemilik_seminari" name="valpemilik_seminari">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_seminari') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_seminari == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_seminari') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_seminari == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_seminari">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_seminari') is-invalid @enderror"
                                                id="valkondisi_seminari" name="valkondisi_seminari">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_seminari') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_seminari == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_seminari') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_seminari == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_seminari">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_seminari ?? '' }}"
                                                class="form-control @error('valjumlahguru_seminari') is-invalid @enderror"
                                                id="valjumlahguru_seminari" name="valjumlahguru_seminari"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_seminari">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_seminari ?? '' }}"
                                                class="form-control @error('valjumlahmurid_seminari') is-invalid @enderror"
                                                id="valjumlahmurid_seminari" name="valjumlahmurid_seminari"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_seminari')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_seminari">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_seminari ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_seminari') is-invalid @enderror"
                                                id="valjumlahpegawai_seminari" name="valjumlahpegawai_seminari"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_sekolahag ?? '' }}"
                                                class="form-control @error('valnama_sekolahag') is-invalid @enderror"
                                                id="valnama_sekolahag" name="valnama_sekolahag" placeholder="Nama...">
                                            @error('valnama_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_sekolahag">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_sekolahag') is-invalid @enderror"
                                                id="valpemilik_sekolahag" name="valpemilik_sekolahag">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_sekolahag') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_sekolahag == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_sekolahag') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_sekolahag == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_sekolahag">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_sekolahag') is-invalid @enderror"
                                                id="valkondisi_sekolahag" name="valkondisi_sekolahag">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_sekolahag') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_sekolahag == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_sekolahag') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_sekolahag == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_sekolahag">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_sekolahag ?? '' }}"
                                                class="form-control @error('valjumlahguru_sekolahag') is-invalid @enderror"
                                                id="valjumlahguru_sekolahag" name="valjumlahguru_sekolahag"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_sekolahag">JUMLAH MURID
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_sekolahag ?? '' }}"
                                                class="form-control @error('valjumlahmurid_sekolahag') is-invalid @enderror"
                                                id="valjumlahmurid_sekolahag" name="valjumlahmurid_sekolahag"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_sekolahag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_sekolahag">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_sekolahag ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_sekolahag') is-invalid @enderror"
                                                id="valjumlahpegawai_sekolahag" name="valjumlahpegawai_sekolahag"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_butaaksara ?? '' }}"
                                                class="form-control @error('valnama_butaaksara') is-invalid @enderror"
                                                id="valnama_butaaksara" name="valnama_butaaksara" placeholder="Nama...">
                                            @error('valnama_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_butaaksara">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_butaaksara') is-invalid @enderror"
                                                id="valpemilik_butaaksara" name="valpemilik_butaaksara">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_butaaksara') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_butaaksara == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_butaaksara') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_butaaksara == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_butaaksara">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_butaaksara') is-invalid @enderror"
                                                id="valkondisi_butaaksara" name="valkondisi_butaaksara">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_butaaksara') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_butaaksara == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_butaaksara') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_butaaksara == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_butaaksara">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_butaaksara ?? '' }}"
                                                class="form-control @error('valjumlahguru_butaaksara') is-invalid @enderror"
                                                id="valjumlahguru_butaaksara" name="valjumlahguru_butaaksara"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_butaaksara">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_butaaksara ?? '' }}"
                                                class="form-control @error('valjumlahmurid_butaaksara') is-invalid @enderror"
                                                id="valjumlahmurid_butaaksara" name="valjumlahmurid_butaaksara"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_butaaksara')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_butaaksara">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_butaaksara ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_butaaksara') is-invalid @enderror"
                                                id="valjumlahpegawai_butaaksara" name="valjumlahpegawai_butaaksara"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_paketa ?? '' }}"
                                                class="form-control @error('valnama_paketa') is-invalid @enderror"
                                                id="valnama_paketa" name="valnama_paketa" placeholder="Nama...">
                                            @error('valnama_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_paketa">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_paketa') is-invalid @enderror"
                                                id="valpemilik_paketa" name="valpemilik_paketa">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_paketa') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_paketa == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_paketa') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_paketa == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_paketa">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_paketa') is-invalid @enderror"
                                                id="valkondisi_paketa" name="valkondisi_paketa">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_paketa') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_paketa == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_paketa') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_paketa == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_paketa">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_paketa ?? '' }}"
                                                class="form-control @error('valjumlahguru_paketa') is-invalid @enderror"
                                                id="valjumlahguru_paketa" name="valjumlahguru_paketa"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_paketa">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_paketa ?? '' }}"
                                                class="form-control @error('valjumlahmurid_paketa') is-invalid @enderror"
                                                id="valjumlahmurid_paketa" name="valjumlahmurid_paketa"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_paketa')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_paketa">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_paketa ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_paketa') is-invalid @enderror"
                                                id="valjumlahpegawai_paketa" name="valjumlahpegawai_paketa"
                                                placeholder="Jumlah...">
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
                                            <input type="text" value="{{ $rt_saranapendidikan->nama_paketb ?? '' }}"
                                                class="form-control @error('valnama_paketb') is-invalid @enderror"
                                                id="valnama_paketb" name="valnama_paketb" placeholder="Nama...">
                                            @error('valnama_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_paketb">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_paketb') is-invalid @enderror"
                                                id="valpemilik_paketb" name="valpemilik_paketb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_paketb') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_paketb == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_paketb') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_paketb == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_paketb">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_paketb') is-invalid @enderror"
                                                id="valkondisi_paketb" name="valkondisi_paketb">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_paketb') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_paketb == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_paketb') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_paketb == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_paketb">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_paketb ?? '' }}"
                                                class="form-control @error('valjumlahguru_paketb') is-invalid @enderror"
                                                id="valjumlahguru_paketb" name="valjumlahguru_paketb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_paketb">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_paketb ?? '' }}"
                                                class="form-control @error('valjumlahmurid_paketb') is-invalid @enderror"
                                                id="valjumlahmurid_paketb" name="valjumlahmurid_paketb"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_paketb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_paketb">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_paketb ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_paketb') is-invalid @enderror"
                                                id="valjumlahpegawai_paketb" name="valjumlahpegawai_paketb"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_paketc ?? '' }}"
                                                class="form-control @error('valnama_paketc') is-invalid @enderror"
                                                id="valnama_paketc" name="valnama_paketc" placeholder="Nama...">
                                            @error('valnama_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_paketc">PEMILIK
                                            </label>
                                            <select class="form-control @error('valpemilik_paketc') is-invalid @enderror"
                                                id="valpemilik_paketc" name="valpemilik_paketc">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_paketc') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_paketc == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_paketc') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_paketc == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_paketc">KONDISI BANGUNAN
                                            </label>
                                            <select class="form-control @error('valkondisi_paketc') is-invalid @enderror"
                                                id="valkondisi_paketc" name="valkondisi_paketc">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_paketc') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_paketc == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_paketc') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_paketc == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_paketc">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_paketc ?? '' }}"
                                                class="form-control @error('valjumlahguru_paketc') is-invalid @enderror"
                                                id="valjumlahguru_paketc" name="valjumlahguru_paketc"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_paketc">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_paketc ?? '' }}"
                                                class="form-control @error('valjumlahmurid_paketc') is-invalid @enderror"
                                                id="valjumlahmurid_paketc" name="valjumlahmurid_paketc"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_paketc')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_paketc">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_paketc ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_paketc') is-invalid @enderror"
                                                id="valjumlahpegawai_paketc" name="valjumlahpegawai_paketc"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_playgrup ?? '' }}"
                                                class="form-control @error('valnama_playgrup') is-invalid @enderror"
                                                id="valnama_playgrup" name="valnama_playgrup" placeholder="Nama...">
                                            @error('valnama_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_playgrup">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_playgrup') is-invalid @enderror"
                                                id="valpemilik_playgrup" name="valpemilik_playgrup">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_playgrup') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_playgrup == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_playgrup') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_playgrup == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_playgrup">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_playgrup') is-invalid @enderror"
                                                id="valkondisi_playgrup" name="valkondisi_playgrup">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_playgrup') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_playgrup == 'Layak') ? 'selected' : '' }}>
                                                   Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_playgrup') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_playgrup == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_playgrup">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_playgrup ?? '' }}"
                                                class="form-control @error('valjumlahguru_playgrup') is-invalid @enderror"
                                                id="valjumlahguru_playgrup" name="valjumlahguru_playgrup"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_playgrup">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_playgrup ?? '' }}"
                                                class="form-control @error('valjumlahmurid_playgrup') is-invalid @enderror"
                                                id="valjumlahmurid_playgrup" name="valjumlahmurid_playgrup"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_playgrup')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_playgrup">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_playgrup ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_playgrup') is-invalid @enderror"
                                                id="valjumlahpegawai_playgrup" name="valjumlahpegawai_playgrup"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_penitipananak ?? '' }}"
                                                class="form-control @error('valnama_penitipananak') is-invalid @enderror"
                                                id="valnama_penitipananak" name="valnama_penitipananak"
                                                placeholder="Nama...">
                                            @error('valnama_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_penitipananak">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_penitipananak') is-invalid @enderror"
                                                id="valpemilik_penitipananak" name="valpemilik_penitipananak">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_penitipananak') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_penitipananak == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_penitipananak') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_penitipananak == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_penitipananak">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_penitipananak') is-invalid @enderror"
                                                id="valkondisi_penitipananak" name="valkondisi_penitipananak">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_penitipananak') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_penitipananak == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_penitipananak') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_penitipananak == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_penitipananak">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_penitipananak ?? '' }}"
                                                class="form-control @error('valjumlahguru_penitipananak') is-invalid @enderror"
                                                id="valjumlahguru_penitipananak" name="valjumlahguru_penitipananak"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_penitipananak">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_penitipananak ?? '' }}"
                                                class="form-control @error('valjumlahmurid_penitipananak') is-invalid @enderror"
                                                id="valjumlahmurid_penitipananak" name="valjumlahmurid_penitipananak"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_penitipananak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_penitipananak">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_penitipananak ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_penitipananak') is-invalid @enderror"
                                                id="valjumlahpegawai_penitipananak"
                                                name="valjumlahpegawai_penitipananak" placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_pendidikanq ?? '' }}"
                                                class="form-control @error('valnama_pendidikanq') is-invalid @enderror"
                                                id="valnama_pendidikanq" name="valnama_pendidikanq"
                                                placeholder="Nama...">
                                            @error('valnama_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_pendidikanq">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_pendidikanq') is-invalid @enderror"
                                                id="valpemilik_pendidikanq" name="valpemilik_pendidikanq">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_pendidikanq') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_pendidikanq == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_pendidikanq') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_pendidikanq == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_pendidikanq">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_pendidikanq') is-invalid @enderror"
                                                id="valkondisi_pendidikanq" name="valkondisi_pendidikanq">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_pendidikanq') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_pendidikanq == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_pendidikanq') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_pendidikanq == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_pendidikanq">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_pendidikanq ?? '' }}"
                                                class="form-control @error('valjumlahguru_pendidikanq') is-invalid @enderror"
                                                id="valjumlahguru_pendidikanq" name="valjumlahguru_pendidikanq"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_pendidikanq">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_pendidikanq ?? '' }}"
                                                class="form-control @error('valjumlahmurid_pendidikanq') is-invalid @enderror"
                                                id="valjumlahmurid_pendidikanq" name="valjumlahmurid_pendidikanq"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_pendidikanq')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_pendidikanq">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_pendidikanq ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_pendidikanq') is-invalid @enderror"
                                                id="valjumlahpegawai_pendidikanq" name="valjumlahpegawai_pendidikanq"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_bahasaas ?? '' }}"
                                                class="form-control @error('valnama_bahasaas') is-invalid @enderror"
                                                id="valnama_bahasaas" name="valnama_bahasaas" placeholder="Nama...">
                                            @error('valnama_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_bahasaas">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_bahasaas') is-invalid @enderror"
                                                id="valpemilik_bahasaas" name="valpemilik_bahasaas">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_bahasaas') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_bahasaas == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_bahasaas') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_bahasaas == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bahasaas">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_bahasaas') is-invalid @enderror"
                                                id="valkondisi_bahasaas" name="valkondisi_bahasaas">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_bahasaas') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_bahasaas == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_bahasaas') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_bahasaas == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_bahasaas">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_bahasaas ?? '' }}"
                                                class="form-control @error('valjumlahguru_bahasaas') is-invalid @enderror"
                                                id="valjumlahguru_bahasaas" name="valjumlahguru_bahasaas"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_bahasaas">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_bahasaas ?? '' }}"
                                                class="form-control @error('valjumlahmurid_bahasaas') is-invalid @enderror"
                                                id="valjumlahmurid_bahasaas" name="valjumlahmurid_bahasaas"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_bahasaas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_bahasaas">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_bahasaas ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_bahasaas') is-invalid @enderror"
                                                id="valjumlahpegawai_bahasaas" name="valjumlahpegawai_bahasaas"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursuskomp ?? '' }}"
                                                class="form-control @error('valnama_kursuskomp') is-invalid @enderror"
                                                id="valnama_kursuskomp" name="valnama_kursuskomp"
                                                placeholder="Nama...">
                                            @error('valnama_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursuskomp">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursuskomp') is-invalid @enderror"
                                                id="valpemilik_kursuskomp" name="valpemilik_kursuskomp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursuskomp') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursuskomp == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursuskomp') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursuskomp == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursuskomp">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursuskomp') is-invalid @enderror"
                                                id="valkondisi_kursuskomp" name="valkondisi_kursuskomp">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursuskomp') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursuskomp == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursuskomp') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursuskomp == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursuskomp">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursuskomp ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursuskomp') is-invalid @enderror"
                                                id="valjumlahguru_kursuskomp" name="valjumlahguru_kursuskomp"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursuskomp">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursuskomp ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursuskomp') is-invalid @enderror"
                                                id="valjumlahmurid_kursuskomp" name="valjumlahmurid_kursuskomp"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursuskomp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursuskomp">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursuskomp ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursuskomp') is-invalid @enderror"
                                                id="valjumlahpegawai_kursuskomp" name="valjumlahpegawai_kursuskomp"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursusmenjahit ?? '' }}"
                                                class="form-control @error('valnama_kursusmenjahit') is-invalid @enderror"
                                                id="valnama_kursusmenjahit" name="valnama_kursusmenjahit"
                                                placeholder="Nama...">
                                            @error('valnama_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursusmenjahit">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursusmenjahit') is-invalid @enderror"
                                                id="valpemilik_kursusmenjahit" name="valpemilik_kursusmenjahit">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursusmenjahit') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursusmenjahit == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursusmenjahit') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursusmenjahit == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursusmenjahit">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursusmenjahit') is-invalid @enderror"
                                                id="valkondisi_kursusmenjahit" name="valkondisi_kursusmenjahit">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursusmenjahit') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursusmenjahit == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursusmenjahit') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursusmenjahit == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursusmenjahit">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursusmenjahit ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursusmenjahit') is-invalid @enderror"
                                                id="valjumlahguru_kursusmenjahit" name="valjumlahguru_kursusmenjahit"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursusmenjahit">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursusmenjahit ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursusmenjahit') is-invalid @enderror"
                                                id="valjumlahmurid_kursusmenjahit" name="valjumlahmurid_kursusmenjahit"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursusmenjahit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursusmenjahit">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursusmenjahit ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursusmenjahit') is-invalid @enderror"
                                                id="valjumlahpegawai_kursusmenjahit"
                                                name="valjumlahpegawai_kursusmenjahit" placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursuskecantikan ?? '' }}"
                                                class="form-control @error('valnama_kursuskecantikan') is-invalid @enderror"
                                                id="valnama_kursuskecantikan" name="valnama_kursuskecantikan"
                                                placeholder="Nama...">
                                            @error('valnama_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursuskecantikan">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursuskecantikan') is-invalid @enderror"
                                                id="valpemilik_kursuskecantikan" name="valpemilik_kursuskecantikan">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursuskecantikan') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursuskecantikan == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursuskecantikan') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursuskecantikan == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursuskecantikan">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursuskecantikan') is-invalid @enderror"
                                                id="valkondisi_kursuskecantikan" name="valkondisi_kursuskecantikan">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursuskecantikan') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursuskecantikan == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursuskecantikan') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursuskecantikan == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursuskecantikan">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursuskecantikan ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursuskecantikan') is-invalid @enderror"
                                                id="valjumlahguru_kursuskecantikan"
                                                name="valjumlahguru_kursuskecantikan" placeholder="Jumlah...">
                                            @error('valjumlahguru_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursuskecantikan">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursuskecantikan ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursuskecantikan') is-invalid @enderror"
                                                id="valjumlahmurid_kursuskecantikan"
                                                name="valjumlahmurid_kursuskecantikan" placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursuskecantikan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursuskecantikan">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursuskecantikan ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursuskecantikan') is-invalid @enderror"
                                                id="valjumlahpegawai_kursuskecantikan"
                                                name="valjumlahpegawai_kursuskecantikan" placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursusmontir ?? '' }}"
                                                class="form-control @error('valnama_kursusmontir') is-invalid @enderror"
                                                id="valnama_kursusmontir" name="valnama_kursusmontir"
                                                placeholder="Nama...">
                                            @error('valnama_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursusmontir">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursusmontir') is-invalid @enderror"
                                                id="valpemilik_kursusmontir" name="valpemilik_kursusmontir">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursusmontir') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursusmontir == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursusmontir') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursusmontir == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursusmontir">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursusmontir') is-invalid @enderror"
                                                id="valkondisi_kursusmontir" name="valkondisi_kursusmontir">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursusmontir') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursusmontir == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursusmontir') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursusmontir == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursusmontir">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursusmontir ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursusmontir') is-invalid @enderror"
                                                id="valjumlahguru_kursusmontir" name="valjumlahguru_kursusmontir"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursusmontir">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursusmontir ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursusmontir') is-invalid @enderror"
                                                id="valjumlahmurid_kursusmontir" name="valjumlahmurid_kursusmontir"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursusmontir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursusmontir">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursusmontir ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursusmontir') is-invalid @enderror"
                                                id="valjumlahpegawai_kursusmontir" name="valjumlahpegawai_kursusmontir"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursussetir ?? '' }}"
                                                class="form-control @error('valnama_kursussetir') is-invalid @enderror"
                                                id="valnama_kursussetir" name="valnama_kursussetir"
                                                placeholder="Nama...">
                                            @error('valnama_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursussetir">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursussetir') is-invalid @enderror"
                                                id="valpemilik_kursussetir" name="valpemilik_kursussetir">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursussetir') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursussetir == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursussetir') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursussetir == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursussetir">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursussetir') is-invalid @enderror"
                                                id="valkondisi_kursussetir" name="valkondisi_kursussetir">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursussetir') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursussetir == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursussetir') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursussetir == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursussetir">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursussetir ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursussetir') is-invalid @enderror"
                                                id="valjumlahguru_kursussetir" name="valjumlahguru_kursussetir"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursussetir">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursussetir ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursussetir') is-invalid @enderror"
                                                id="valjumlahmurid_kursussetir" name="valjumlahmurid_kursussetir"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursussetir')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursussetir">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursussetir ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursussetir') is-invalid @enderror"
                                                id="valjumlahpegawai_kursussetir" name="valjumlahpegawai_kursussetir"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursuselektronik ?? '' }}"
                                                class="form-control @error('valnama_kursuselektronik') is-invalid @enderror"
                                                id="valnama_kursuselektronik" name="valnama_kursuselektronik"
                                                placeholder="Nama...">
                                            @error('valnama_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursuselektronik">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursuselektronik') is-invalid @enderror"
                                                id="valpemilik_kursuselektronik" name="valpemilik_kursuselektronik">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursuselektronik') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursuselektronik == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursuselektronik') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursuselektronik == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursuselektronik">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursuselektronik') is-invalid @enderror"
                                                id="valkondisi_kursuselektronik" name="valkondisi_kursuselektronik">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursuselektronik') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursuselektronik == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursuselektronik') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursuselektronik == 'Rusak') ? 'selected' : '' }}>
                                                   Rusak</option>
                                            </select>
                                            @error('valkondisi_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursuselektronik">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursuselektronik ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursuselektronik') is-invalid @enderror"
                                                id="valjumlahguru_kursuselektronik"
                                                name="valjumlahguru_kursuselektronik" placeholder="Jumlah...">
                                            @error('valjumlahguru_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursuselektronik">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursuselektronik ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursuselektronik') is-invalid @enderror"
                                                id="valjumlahmurid_kursuselektronik"
                                                name="valjumlahmurid_kursuselektronik" placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursuselektronik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursuselektronik">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursuselektronik ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursuselektronik') is-invalid @enderror"
                                                id="valjumlahpegawai_kursuselektronik"
                                                name="valjumlahpegawai_kursuselektronik" placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_tataboga ?? '' }}"
                                                class="form-control @error('valnama_tataboga') is-invalid @enderror"
                                                id="valnama_tataboga" name="valnama_tataboga" placeholder="Nama...">
                                            @error('valnama_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_tataboga">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_tataboga') is-invalid @enderror"
                                                id="valpemilik_tataboga" name="valpemilik_tataboga">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_tataboga') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_tataboga == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_tataboga') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_tataboga == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_tataboga">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_tataboga') is-invalid @enderror"
                                                id="valkondisi_tataboga" name="valkondisi_tataboga">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_tataboga') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_tataboga == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_tataboga') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_tataboga == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_tataboga">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_tataboga ?? '' }}"
                                                class="form-control @error('valjumlahguru_tataboga') is-invalid @enderror"
                                                id="valjumlahguru_tataboga" name="valjumlahguru_tataboga"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_tataboga">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_tataboga ?? '' }}"
                                                class="form-control @error('valjumlahmurid_tataboga') is-invalid @enderror"
                                                id="valjumlahmurid_tataboga" name="valjumlahmurid_tataboga"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_tataboga')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_tataboga">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_tataboga ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_tataboga') is-invalid @enderror"
                                                id="valjumlahpegawai_tataboga" name="valjumlahpegawai_tataboga"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursusketik ?? '' }}"
                                                class="form-control @error('valnama_kursusketik') is-invalid @enderror"
                                                id="valnama_kursusketik" name="valnama_kursusketik"
                                                placeholder="Nama...">
                                            @error('valnama_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursusketik">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursusketik') is-invalid @enderror"
                                                id="valpemilik_kursusketik" name="valpemilik_kursusketik">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursusketik') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursusketik == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursusketik') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursusketik == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursusketik">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursusketik') is-invalid @enderror"
                                                id="valkondisi_kursusketik" name="valkondisi_kursusketik">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursusketik') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursusketik == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursusketik') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursusketik == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursusketik">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursusketik ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursusketik') is-invalid @enderror"
                                                id="valjumlahguru_kursusketik" name="valjumlahguru_kursusketik"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursusketik">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursusketik ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursusketik') is-invalid @enderror"
                                                id="valjumlahmurid_kursusketik" name="valjumlahmurid_kursusketik"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursusketik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursusketik">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursusketik ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursusketik') is-invalid @enderror"
                                                id="valjumlahpegawai_kursusketik" name="valjumlahpegawai_kursusketik"
                                                placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursusakuntan ?? '' }}"
                                                class="form-control @error('valnama_kursusakuntan') is-invalid @enderror"
                                                id="valnama_kursusakuntan" name="valnama_kursusakuntan"
                                                placeholder="Nama...">
                                            @error('valnama_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursusakuntan">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursusakuntan') is-invalid @enderror"
                                                id="valpemilik_kursusakuntan" name="valpemilik_kursusakuntan">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursusakuntan') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursusakuntan == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursusakuntan') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursusakuntan == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursusakuntan">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursusakuntan') is-invalid @enderror"
                                                id="valkondisi_kursusakuntan" name="valkondisi_kursusakuntan">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursusakuntan') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursusakuntan == 'Layak') ? 'selected' : '' }}>
                                                    Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursusakuntan') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursusakuntan == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursusakuntan">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursusakuntan ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursusakuntan') is-invalid @enderror"
                                                id="valjumlahguru_kursusakuntan" name="valjumlahguru_kursusakuntan"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursusakuntan">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursusakuntan ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursusakuntan') is-invalid @enderror"
                                                id="valjumlahmurid_kursusakuntan" name="valjumlahmurid_kursusakuntan"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursusakuntan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursusakuntan">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursusakuntan ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursusakuntan') is-invalid @enderror"
                                                id="valjumlahpegawai_kursusakuntan"
                                                name="valjumlahpegawai_kursusakuntan" placeholder="Jumlah...">
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
                                            <input type="text"
                                                value="{{ $rt_saranapendidikan->nama_kursuslain ?? '' }}"
                                                class="form-control @error('valnama_kursuslain') is-invalid @enderror"
                                                id="valnama_kursuslain" name="valnama_kursuslain"
                                                placeholder="Nama...">
                                            @error('valnama_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpemilik_kursuslain">PEMILIK
                                            </label>
                                            <select
                                                class="form-control @error('valpemilik_kursuslain') is-invalid @enderror"
                                                id="valpemilik_kursuslain" name="valpemilik_kursuslain">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="negeri"
                                                    {{ old('valpemilik_kursuslain') == 'negeri' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursuslain == 'negeri') ? 'selected' : '' }}>
                                                    Negeri</option>
                                                <option value="swasta"
                                                    {{ old('valpemilik_kursuslain') == 'swasta' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->pemilik_kursuslain == 'swasta') ? 'selected' : '' }}>
                                                    Swasta</option>
                                            </select>

                                            @error('valpemilik_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kursuslain">KONDISI BANGUNAN
                                            </label>
                                            <select
                                                class="form-control @error('valkondisi_kursuslain') is-invalid @enderror"
                                                id="valkondisi_kursuslain" name="valkondisi_kursuslain">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="Layak"
                                                    {{ old('valkondisi_kursuslain') == 'Layak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursuslain == 'Layak') ? 'selected' : '' }}>
                                                   Layak</option>
                                                <option value="Rusak"
                                                    {{ old('valkondisi_kursuslain') == 'Rusak' || (isset($rt_saranapendidikan) && $rt_saranapendidikan->kondisi_kursuslain == 'Rusak') ? 'selected' : '' }}>
                                                    Rusak</option>
                                            </select>
                                            @error('valkondisi_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahguru_kursuslain">JUMLAH GURU

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahguru_kursuslain ?? '' }}"
                                                class="form-control @error('valjumlahguru_kursuslain') is-invalid @enderror"
                                                id="valjumlahguru_kursuslain" name="valjumlahguru_kursuslain"
                                                placeholder="Jumlah...">
                                            @error('valjumlahguru_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahmurid_kursuslain">JUMLAH MURID

                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahmurid_kursuslain ?? '' }}"
                                                class="form-control @error('valjumlahmurid_kursuslain') is-invalid @enderror"
                                                id="valjumlahmurid_kursuslain" name="valjumlahmurid_kursuslain"
                                                placeholder="Jumlah...">
                                            @error('valjumlahmurid_kursuslain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpegawai_kursuslain">JUMLAH PEGAWAI
                                            </label>
                                            <input type="number"
                                                value="{{ $rt_saranapendidikan->jumlahpegawai_kursuslain ?? '' }}"
                                                class="form-control @error('valjumlahpegawai_kursuslain') is-invalid @enderror"
                                                id="valjumlahpegawai_kursuslain" name="valjumlahpegawai_kursuslain"
                                                placeholder="Jumlah...">
                                            @error('valjumlahpegawai_kursuslain')
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
            document.getElementById('form-edit-rtsarpend').submit();
        });
    </script>
@endsection
