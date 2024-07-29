 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">DATA PEKERJAAN {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ url('/sdgs/individu/datasdgspekerjaan') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">

                            <form class="form-valide" action="{{ route('pekerjaan.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">NIK <span
                                            class="text-danger">*</span>
                                        <input type="hidden" name="valNIK" value="{{ $datap->nik }}">
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->nik }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNama">Nama <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->nama }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valKondisipekerjaan">KONDISI PEKERJAAN <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if (isset($datapk->kondisi_pekerjaan))
                                            {{ $datapk->kondisi_pekerjaan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valKondisipekerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valPekerjaanutama">PEKERJAAN UTAMA <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if (isset($datapk->pekerjaan_utama))
                                            {{ $datapk->pekerjaan_utama }}
                                        @else
                                            <!-- Tindakan atau pesan jika pekerjaan_utama kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valPekerjaanutama')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valJaminanketenagakerjaan">JAMINAN SOSISAL KETENAGAKERJAAN <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if(isset($datapk->jaminan_sosial_ketenagakerjaan))
                                            {{ $datapk->jaminan_sosial_ketenagakerjaan }}
                                        @else
                                            Data tidak tersedia.
                                        @endif
                                        @error('valJaminanketenagakerjaan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valPenghasilansetahun">PENGHASILAN SETAHUN TERKAHIR <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if(isset($datapk->penghasilan_setahun_terakhir))
                                        Rp {{ number_format($datapk->penghasilan_setahun_terakhir, 0, ',', '.') }}
                                        @else
                                            Data tidak tersedia.
                                        @endif
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
