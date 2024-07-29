 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">DATA PENGHASILAN {{ $datap->nama }}</h1>
                    <button type="button" class="btn mb-1 btn-warning" onclick="window.location='{{ route('datapenghasilan.index') }}'">Kembali
                     </button>
                     <br><br><br>
                    <div class="form-validation">

                        <form class="form-valide" action="{{ route('penghasilan.update') }}" method="POST">
                             @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNIK">NIK <span class="text-danger">*</span>
                                    <input type="hidden" name="valNIK" value="{{ $datap->nik }}">
                                </label>
                                <div class="col-lg-6">
                                    {{ $datap->nik }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNama">Nama <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    {{ $datap->nama }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valSumberpenghasilan">SUMBER PENGHASILAN <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                     @if (isset($dataph->sumber_penghasilan))
                                            {{ $dataph->sumber_penghasilan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                    @error('valSumberpenghasilan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valJumlahasset">JUMLAH ASET DARI SUMBER PENGHASILAN <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    @if (isset($dataph->jumlah_asset_darip))
                                            {{ $dataph->jumlah_asset_darip }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                    @error('valJumlahasset')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valSatuan">SATUAN <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    @if (isset($dataph->satuan))
                                            {{ $dataph->satuan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                    @error('valSatuan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valPenghasilanset">PENGHASILAN SETAHUN <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    @if (isset($dataph->penghasilan_setahun))
                                    Rp {{ number_format($dataph->penghasilan_setahun, 0, ',', '.') }}
                                @else
                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                    Data tidak tersedia.
                                @endif
                                    @error('valPenghasilanset')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valExport">DI  EKSPOR <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    @if (isset($dataph->expor))
                                    {{ $dataph->expor }}
                                @else
                                    <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                    Data tidak tersedia.
                                @endif
                                    @error('valExport')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
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
