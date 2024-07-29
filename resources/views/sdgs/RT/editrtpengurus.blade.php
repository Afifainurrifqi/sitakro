 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT PENGURUS
                            <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                            <h1 class="card-title"> RW : {{ $datart->rw }}</h1>
                        </h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtpengurus.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtpengurus.update') }}" method="POST"
                                id="form-edit-rtpengurus">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnik">NIK <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnik', $datart->nik) }}"
                                            class="form-control @error('valnik') is-invalid @enderror" id="valnik"
                                            name="valnik" placeholder="Nama Lengkap...">
                                        <div class="col-lg-6">
                                            {{ $datart->nik }}
                                        </div>
                                        @error('valnik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">Nama Ketua RT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="hidden" value="{{ old('valnama_ketuart', $datart->nama) }}"
                                            class="form-control @error('valnama_ketuart') is-invalid @enderror"
                                            id="valnama_ketuart" name="valnama_ketuart" placeholder="Nama Lengkap...">
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
                                    <label class="col-lg-4 col-form-label">KETUA RW
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_ketuarw">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_ketuarw ?? '' }}"
                                                class="form-control @error('valnama_ketuarw') is-invalid @enderror"
                                                id="valnama_ketuarw" name="valnama_ketuarw" placeholder="Nama...">
                                            @error('valnama_ketuarw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_ketuarw">NIK
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nik_ketuarw ?? '' }}"
                                                class="form-control @error('valnik_ketuarw') is-invalid @enderror"
                                                id="valnik_ketuarw" name="valnik_ketuarw" placeholder="NIK..."
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_ketuarw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_ketuarw">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_ketuarw ?? '' }}"
                                                class="form-control @error('valnohp_ketuarw') is-invalid @enderror"
                                                id="valnohp_ketuarw" name="valnohp_ketuarw" placeholder="Nohp...">
                                            @error('valnohp_ketuarw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_ketuarw">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_ketuarw ?? '' }}"
                                                class="form-control @error('valmenjabat_ketuarw') is-invalid @enderror"
                                                id="valmenjabat_ketuarw" name="valmenjabat_ketuarw"
                                                placeholder="jumlah...">
                                            @error('valmenjabat_ketuarw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SEKRETARIS RW

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_sekrw">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_sekrw ?? '' }}"
                                                class="form-control @error('valnama_sekrw') is-invalid @enderror"
                                                id="valnama_sekrw" name="valnama_sekrw" placeholder="Nama...">
                                            @error('valnama_sekrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_sekrw">NIK
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nik_sekrw ?? '' }}"
                                                class="form-control @error('valnik_sekrw') is-invalid @enderror"
                                                id="valnik_sekrw" name="valnik_sekrw" placeholder="NIK..."
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_sekrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_sekrw">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_sekrw ?? '' }}"
                                                class="form-control @error('valnohp_sekrw') is-invalid @enderror"
                                                id="valnohp_sekrw" name="valnohp_sekrw" placeholder="Nohp...">
                                            @error('valnohp_sekrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_sekrw">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_sekrw ?? '' }}"
                                                class="form-control @error('valmenjabat_sekrw') is-invalid @enderror"
                                                id="valmenjabat_sekrw" name="valmenjabat_sekrw" placeholder="jumlah...">
                                            @error('valmenjabat_sekrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BENDAHARA RW
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_benrw">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_benrw ?? '' }}"
                                                class="form-control @error('valnama_benrw') is-invalid @enderror"
                                                id="valnama_benrw" name="valnama_benrw" placeholder="jumlah...">
                                            @error('valnama_benrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_benrw">NIK
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nik_benrw ?? '' }}"
                                                class="form-control @error('valnik_benrw') is-invalid @enderror"
                                                id="valnik_benrw" name="valnik_benrw" placeholder="NIK..."
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_benrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_benrw">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_benrw ?? '' }}"
                                                class="form-control @error('valnohp_benrw') is-invalid @enderror"
                                                id="valnohp_benrw" name="valnohp_benrw" placeholder="Nohp...">
                                            @error('valnohp_benrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_benrw">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_benrw ?? '' }}"
                                                class="form-control @error('valmenjabat_benrw') is-invalid @enderror"
                                                id="valmenjabat_benrw" name="valmenjabat_benrw" placeholder="jumlah...">
                                            @error('valmenjabat_benrw')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KETUA RT
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_ketuart">NAMA
                                            </label>
                                            <input type="hidden" value="{{ $datart->nama ?? '' }}"
                                                class="form-control @error('valnama_ketuart') is-invalid @enderror"
                                                id="valnama_ketuart" name="valnama_ketuart" placeholder="Nama...">
                                            <div class="col-lg-6">
                                                {{ $datart->nama }}
                                            </div>
                                            @error('valnama_ketuart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_ketuart">NIK
                                            </label>
                                            <input type="hidden" value="{{ $datart->nik ?? '' }}"
                                                class="form-control @error('valnik_ketuart') is-invalid @enderror"
                                                id="valnik_ketuart" name="valnik_ketuart" placeholder="NIK..."
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            <div class="col-lg-6">
                                                {{ $datart->nik }}
                                            </div>
                                            @error('valnik_ketuart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_ketuart">NO HP
                                            </label>
                                            <input type="hidden" value="{{ $datart->nohp ?? '' }}"
                                                class="form-control @error('valnohp_ketuart') is-invalid @enderror"
                                                id="valnohp_ketuart" name="valnohp_ketuart" placeholder="Nohp...">
                                            <div class="col-lg-6">
                                                {{ $datart->nohp }}
                                            </div>
                                            @error('valnohp_ketuart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_ketuart">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_ketuart ?? '' }}"
                                                class="form-control @error('valmenjabat_ketuart') is-invalid @enderror"
                                                id="valmenjabat_ketuart" name="valmenjabat_ketuart"
                                                placeholder="jumlah...">
                                            <div class="col-lg-6">

                                            </div>
                                            @error('valmenjabat_ketuart')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SEKRETARIS RT
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_sekrt">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_sekrt ?? '' }}"
                                                class="form-control @error('valnama_sekrt') is-invalid @enderror"
                                                id="valnama_sekrt" name="valnama_sekrt" placeholder="Nama...">
                                            @error('valnama_sekrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_sekrt">NIK
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nik_sekrt ?? '' }}"
                                                class="form-control @error('valnik_sekrt') is-invalid @enderror"
                                                id="valnik_sekrt" name="valnik_sekrt" placeholder="NIK..."
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_sekrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_sekrt">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_sekrt ?? '' }}"
                                                class="form-control @error('valnohp_sekrt') is-invalid @enderror"
                                                id="valnohp_sekrt" name="valnohp_sekrt" placeholder="Nohp...">
                                            @error('valnohp_sekrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_sekrt">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_sekrt ?? '' }}"
                                                class="form-control @error('valmenjabat_sekrt') is-invalid @enderror"
                                                id="valmenjabat_sekrt" name="valmenjabat_sekrt" placeholder="jumlah...">
                                            @error('valmenjabat_sekrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BENDAHARA RT
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valnama_benrt">NAMA
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nama_benrt ?? '' }}"
                                                class="form-control @error('valnama_benrt') is-invalid @enderror"
                                                id="valnama_benrt" name="valnama_benrt" placeholder="Nama...">
                                            @error('valnama_benrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnik_benrt">NIK
                                            </label>
                                            <input type="text" value="{{ $rt_pengurus->nik_benrt ?? '' }}"
                                                class="form-control @error('valnik_benrt') is-invalid @enderror"
                                                id="valnik_benrt" name="valnik_benrt" placeholder="NIK..."
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('valnik_benrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valnohp_benrt">NO HP
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->nohp_benrt ?? '' }}"
                                                class="form-control @error('valnohp_benrt') is-invalid @enderror"
                                                id="valnohp_benrt" name="valnohp_benrt" placeholder="Nohp...">
                                            @error('valnohp_benrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valmenjabat_benrt">MENJABAT SEJAK
                                            </label>
                                            <input type="number" value="{{ $rt_pengurus->menjabat_benrt ?? '' }}"
                                                class="form-control @error('valmenjabat_benrt') is-invalid @enderror"
                                                id="valmenjabat_benrt" name="valmenjabat_benrt" placeholder="jumlah...">
                                            @error('valmenjabat_benrt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

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
            document.getElementById('form-edit-rtpengurus').submit();
        });
    </script>
@endsection
