 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LEMBAGA MASYARAKAT
                            <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                            <h1 class="card-title"> RW : {{ $datart->rw }}</h1>

                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtlembaga_masyarakat.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtlembaga_masyarakat.update') }}" method="POST" id="form-edit-rtlembagamas">
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
                                    <label class="col-lg-4 col-form-label" for="valnama">Nama
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $rtlembaga_masyarakat->nama ?? '' }}"
                                            class="form-control @error('valnama') is-invalid @enderror"
                                            id="valnama" name="valnama" placeholder="berapa jumlahnya...">
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
                                        <input type="number" value="{{ $rtlembaga_masyarakat->jumlah_peng ?? '' }}"
                                            class="form-control @error('valjumlah_peng') is-invalid @enderror"
                                            id="valjumlah_peng" name="valjumlah_peng" placeholder="berapa jumlahnya...">
                                        @error('valjumlah_peng')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_kel">JUMLAH KELOMPOK


                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $rtlembaga_masyarakat->jumlah_kel ?? '' }}"
                                            class="form-control @error('valjumlah_kel') is-invalid @enderror"
                                            id="valjumlah_kel" name="valjumlah_kel" placeholder="berapa jumlahnya...">
                                        @error('valjumlah_kel')
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
                                        <input type="number" value="{{ $rtlembaga_masyarakat->jumlah_ang ?? '' }}"
                                            class="form-control @error('valjumlah_ang') is-invalid @enderror"
                                            id="valjumlah_ang" name="valjumlah_ang" placeholder="berapa jumlahnya...">
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
                                        <select class="form-control @error('valfasilitas') is-invalid @enderror"
                                        id="valfasilitas" name="valfasilitas">
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="ada, dikelola"
                                        {{ old('valfasilitas') == 'ada, dikelola' || (isset($rtlembaga_masyarakat) && $rtlembaga_masyarakat->fasilitas == 'ada, dikelola') ? 'selected' : '' }}>
                                        Ada, dikelola
                                    </option>
                                    <option value="ada, tidak dikelola"
                                        {{ old('valfasilitas') == 'ada, tidak dikelola' || (isset($rtlembaga_masyarakat) && $rtlembaga_masyarakat->fasilitas == 'ada, tidak dikelola') ? 'selected' : '' }}>
                                        Ada, tidak dikelola
                                    </option>
                                    <option value="ridak ada"
                                        {{ old('valfasilitas') == 'ridak ada' || (isset($rtlembaga_masyarakat) && $rtlembaga_masyarakat->fasilitas == 'ridak ada') ? 'selected' : '' }}>
                                        Tidak Ada
                                    </option>
                                    <option value="ada baik"
                                        {{ old('valfasilitas') == 'ada baik' || (isset($rtlembaga_masyarakat) && $rtlembaga_masyarakat->fasilitas == 'ada baik') ? 'selected' : '' }}>
                                        Ada, baik
                                    </option>
                                    <option value="ada rusak sedang"
                                        {{ old('valfasilitas') == 'ada rusak sedang' || (isset($rtlembaga_masyarakat) && $rtlembaga_masyarakat->fasilitas == 'ada rusak sedang') ? 'selected' : '' }}>
                                        Ada, rusak sedang
                                    </option>
                                    <option value="ada rusak parah"
                                        {{ old('valfasilitas') == 'ada rusak parah' || (isset($rtlembaga_masyarakat) && $rtlembaga_masyarakat->fasilitas == 'ada rusak parah') ? 'selected' : '' }}>
                                        Ada, rusak parah
                                    </option>
                                </select>

                                        @error('valfasilitas')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#confirmModal">Simpan</button>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
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
            document.getElementById('form-edit-rtlembagamas').submit();
        });
    </script>
@endsection
