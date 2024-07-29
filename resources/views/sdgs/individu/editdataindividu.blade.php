 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">EDIT DATA INDIVIDU {{ $datap->nama }}</h1>
                    <button type="button" class="btn mb-1 btn-warning" onclick="window.location='{{ url('/sdgs/individu/dataindividu') }}'">Kembali
                     </button>
                     <br><br><br>
                    <div class="form-validation">

                        <form class="form-valide" action="{{ route('individu.update') }}" method="POST" id="form-edit-individu">
                             @csrf
                             <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valKK">KK <span class="text-danger">*</span>
                                    <input type="hidden" name="valKK" value="{{ $datap->detailkk->kk->nokk }}">
                                </label>
                                <div class="col-lg-6">
                                    {{ $datap->detailkk->kk->nokk }}
                                </div>
                            </div>
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
                                <input type="hidden" name="valNama" value="{{ $datap->nama }}">
                                <div class="col-lg-6">
                                    {{ $datap->nama }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valJeniskelamin">Jenis kelamin <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <!-- Hidden input to send the value to the server -->
                                    <input type="hidden" name="valJeniskelamin" value="{{ $datap->jenis_kelamin }}">

                                    <!-- Disabled select element for display purposes -->
                                    <select disabled class="form-control-plaintext">
                                        <option value="1" {{ $datap->jenis_kelamin == '1' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="0" {{ $datap->jenis_kelamin == '0' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valTempatlahir">Tempat Lahir <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="hidden" name="valTempatlahir" value="{{ $datap->tempat_lahir }}">
                                    {{ $datap->tempat_lahir }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valTanggallahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <!-- Hidden input to send the value to the server -->
                                    <input type="hidden" name="valTanggallahir" value="{{ $datap->tanggal_lahir }}">

                                    <!-- Read-only date input for display purposes -->
                                    <input type="date" class="form-control-plaintext" id="valTanggallahir" name="valTanggallahir" value="{{ $datap->tanggal_lahir }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valUsia">Usia <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    @php
                                    $usia = Carbon\Carbon::parse($datap->tanggal_lahir)->age;
                                    @endphp
                                    {{ $usia }} tahun.
                                    <input type="hidden" name="valUsia" value="{{ $usia }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valStatus">Status <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <!-- Hidden input to send the value to the server -->
                                    <input type="hidden" name="valStatus" value="{{ $datap->status_id }}">

                                    <!-- Disabled select element for display purposes -->
                                    <select disabled class="form-control-plaintext">
                                        <option value="0" disabled selected>--Pilih Status--</option>
                                        @foreach ($status as $item)
                                            <option value="{{ $item->id }}" {{ $datap->status_id == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('valStatus')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valUsiapertamamenikah">Usia saat pertama kali menikah <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number"  class="form-control @error('valUsiapertamamenikah') is-invalid @enderror" id="valUsiapertamamenikah" name="valUsiapertamamenikah" value="{{ $datai->usia_saat_pertama_kali_menikah ?? ''}}" placeholder="Usia berapa tahun...">
                                    @error('valUsiapertamamenikah')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valAgama">Agama <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <!-- Hidden input to send the value to the server -->
                                    <input type="hidden" name="valAgama" value="{{ $datap->agama_id }}">

                                    <!-- Disabled select element for display purposes -->
                                    <select disabled class="form-control-plaintext">
                                        <option value="0" disabled selected>--Pilih Agama--</option>
                                        @foreach ($agama as $item)
                                            <option value="{{ $item->id }}" {{ $datap->agama_id == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('valAgama')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valSukubangsa">Suku Bangsa <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->suku_bangsa ?? '' }}" class="form-control @error('valSukubangsa') is-invalid @enderror" id="valSukubangsa" name="valSukubangsa"  placeholder="Tulis suku bangsamu...">
                                    @error('valSukubangsa')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valWarganegara">Warga Nergara <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->suku_bangsa ?? '' }}" class="form-control @error('valWarganegara') is-invalid @enderror" id="valWarganegara" name="valWarganegara"  placeholder="Tulis suku bangsamu...">
                                    @error('valWarganegara')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNohp">Nomer HP <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->nohp ?? '' }}" pattern="[0-9]+" class="form-control @error('valNohp') is-invalid @enderror" id="valNohp" name="valNohp"  placeholder="Tulis Nomermu">
                                    @error('valNohp')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNowa">Nomer Whatsapp <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->nowa ?? '' }}" pattern="[0-9]+" class="form-control @error('valNowa') is-invalid @enderror" id="valNowa" name="valNowa"  placeholder="Tulis Nomermu">
                                    @error('valNowa')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valEmail">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->email ?? '' }}" class="form-control @error('valEmail') is-invalid @enderror" id="valEmail" name="valEmail"  placeholder="Tulis Emailmu">
                                    @error('valEmail')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valFacebook">Facebook <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->facebook ?? '' }}" class="form-control @error('valFacebook') is-invalid @enderror" id="valFacebook" name="valFacebook"  placeholder="Tulis link facebookmu">
                                    @error('valFacebook')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valTwitter">Twitter <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->twitter ?? '' }}" class="form-control @error('valTwitter') is-invalid @enderror" id="valTwitter" name="valTwitter"  placeholder="Tulis link Twitter">
                                    @error('valTwitter')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valInstagram">Instagram <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $datai->instagram ?? '' }}" class="form-control @error('valInstagram') is-invalid @enderror" id="valInstagram" name="valInstagram"  placeholder="Tulis link Instagram">
                                    @error('valInstagram')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
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
        document.getElementById('form-edit-individu').submit();
    });
</script>

@endsection
