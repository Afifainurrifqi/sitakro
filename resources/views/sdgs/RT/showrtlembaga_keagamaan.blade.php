 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">LEMBAGA KEAGAMAAN
                            <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                            <h1 class="card-title"> RW : {{ $datart->rw }}</h1>
                            <button type="button" class="btn mb-1 btn-warning"
                                onclick="window.location='{{ route('rtlembaga_keagamaan.index') }}'">Kembali
                            </button>
                            <br><br><br>
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('rtlembaga_keagamaan.update') }}" method="POST">
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
                                        <label class="col-lg-4 col-form-label" for="valnama">Nama
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">

                                            @if (isset($rtlembaga_keagamaan->nama))
                                                <br>
                                                {{ $rtlembaga_keagamaan->nama }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valnama')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjumlah_peng">JUMLAH PENGURUS


                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">

                                            @if (isset($rtlembaga_keagamaan->jumlah_peng))
                                                <br>
                                                {{ $rtlembaga_keagamaan->jumlah_peng }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_peng')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjumlah_ang">JUMLAH ANGGOTA


                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            @if (isset($rtlembaga_keagamaan->jumlah_ang))
                                                <br>
                                                {{ $rtlembaga_keagamaan->jumlah_ang }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_ang')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valfasilitas">FASILITAS


                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            @if (isset($rtlembaga_keagamaan->fasilitas))
                                                <br>
                                                {{ $rtlembaga_keagamaan->fasilitas }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valfasilitas')
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
