 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')



<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Form Edit Data penduduk</h1>
        <button type="button" class="btn mb-1 btn-warning" onclick="window.location='{{ url('datapenduduk') }}'">Kembali
        </button> <br><br><br>
                    <div class="form-validation">

                        <form class="form-valide" action="{{ route('datapenduduk.update',['nik'=>$valNIK]) }}" method="POST" id="form-edit-datpen">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valKK">KK <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="valNokk" name="valNokk" value="{{ old('valNokk', $valKK) }}" required>
                                    @error('valKK')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNIK">NIK <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    {{ $valNIK }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valGelara">Gelar awal <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $valGelara }}" class="form-control @error('valGelara') is-invalid @enderror" id="valGelara" name="valGelara"  placeholder="Gelar Awalmu...">
                                    @error('valGelara')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valNama">Nama <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $valNama }}" class="form-control @error('valNama') is-invalid @enderror" id="valNama" name="valNama"  placeholder="Gelar Awalmu...">
                                    @error('valNama')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valGelart">Gelar akhir <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $valGelart }}" class="form-control @error('valGelart') is-invalid @enderror" id="valGelart" name="valGelart"  placeholder="Nama Lengkapmu...">
                                    @error('valGelart')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valJeniskelamin">Jenis kelamin <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select name="valJeniskelamin" class="form-control @error('valJeniskelamin') is-invalid @enderror" id="valJeniskelamin" required>
                                        <option value="1" {{ ($valJeniskelamin=='1') ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="0"  {{ ($valJeniskelamin=='0') ? 'selected' : '' }} >Perempuann</option>
                                    </select>
                                    @error('valJeniskelamin')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valconfirm-Tempatlahir">Tempat Lahir <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $valTempatlahir }}" class="form-control @error('valTempatlahir') is-invalid @enderror" id="valTempatlahir" name="valTempatlahir" placeholder="Tempat lahir">
                                    @error('valTempatlahir')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valTanggallahir">Tanggal Lahir <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="date" vc class="form-control @error('valTanggallahir') is-invalid @enderror" id="valTanggallahir" name="valTanggallahir" value="{{ $valTanggallahir }}" placeholder="Tanggal lahir...">
                                    @error('valTanggallahir')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valAgama">Agama <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valAgama') is-invalid @enderror" id="valAgama" name="valAgama">
                                        <option value="0" disabled selected>--Pilih Agama--</option>
                                        @foreach ($agama as $item)
                                        <option value="{{ $item->id }}" {{ $valAgama == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
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
                                <label class="col-lg-4 col-form-label" for="valPendidikan">Pendidikan <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valPendidikan') is-invalid @enderror" id="valPendidikan" name="valPendidikan">
                                        <option value="0" disabled selected>--Pilih Pendidikan--</option>
                                        @foreach ($pendidikan as $item)
                                        <option value="{{ $item->id }}" {{ $valPendidikan == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                    @endforeach
                                    </select>
                                    @error('valPendidikan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valPekerjaan">Pekerjaan <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valPekerjaan') is-invalid @enderror" id="valPekerjaan" name="valPekerjaan">
                                        <option value="0" disabled selected>--Pilih Pekerjaan--</option>
                                        @foreach ($pekerjaan as $item)
                                        <option value="{{ $item->id }}" {{ $valPekerjaan == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                    @endforeach
                                    </select>
                                    @error('valPekerjaan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valGoldar">Golongan darah <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valGoldar') is-invalid @enderror" id="valGoldar" name="valGoldar">
                                        <option value="0" disabled selected>--Pilih Goldar--</option>
                                        @foreach ($goldar as $item)
                                        <option value="{{ $item->id }}" {{ $valGoldar == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                    @endforeach
                                    </select>
                                    @error('valGoldar')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valStatus">Status <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control @error('valStatus') is-invalid @enderror" id="valStatus" name="valStatus">
                                        <option value="0" disabled selected>--Pilih Status--</option>
                                        @foreach ($status as $item)
                                            <option value="{{ $item->id }}" {{ old('valStatus') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('valStatus')
                                        <div id="" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group row" id="tanggalPerkawinanFormGroup" style="display: none;">
                                        <label class="col-lg-4 col-form-label" for="valTanggalperkawinan">Tanggal Perkawinan <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="date" value="{{ old('valTanggalperkawinan') }}"
                                                   class="form-control @error('valTanggalperkawinan') is-invalid @enderror"
                                                   id="valTanggalperkawinan" name="valTanggalperkawinan" placeholder="Tanggal Tanggalperkawinan...">
                                            @error('valTanggalperkawinan')
                                                <div id="" class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script>
                                document.getElementById('valStatus').addEventListener('change', function () {
                                    var selectedStatus = this.value;
                                    var tanggalPerkawinanFormGroup = document.getElementById('tanggalPerkawinanFormGroup');

                                    // Tampilkan atau sembunyikan form tanggal perkawinan berdasarkan status yang dipilih
                                    if (selectedStatus === '1') { // Gantilah '1' dengan nilai yang sesuai untuk status 'Kawin'
                                        tanggalPerkawinanFormGroup.style.display = 'block';
                                    } else {
                                        tanggalPerkawinanFormGroup.style.display = 'none';
                                    }
                                });
                            </script>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label " for="valHubungan">Hubungan <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $valHubungan }}" class="form-control @error('valHubungan') is-invalid @enderror" id="valHubungan" name="valHubungan" placeholder="Hubungan">
                                    @error('valHubungan')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valAyah">Ayah <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $valAyah }}" class="form-control" @error('valAyah') is-invalid @enderror id="valAyah" name="valAyah" placeholder="Nama Ayah...">
                                    @error('valAyah')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valIbu">Ibu <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" value="{{ $valIbu }}" class="form-control @error('valIbu') is-invalid @enderror" id="valIbu" name="valIbu" placeholder="Nama Ibu...">
                                    @error('valIbu')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valAlamat">Alamat<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input value="{{ $valAlamat }}" type="text" class="form-control @error('valAlamat') is-invalid @enderror" id="valAlamat" name="valAlamat" placeholder="Masukkan Alamatmu...">
                                    @error('valAlamat')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valRT">RT<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input value="{{ $valRT }}" type="text" class="form-control @error('valRT') is-invalid @enderror" id="valRT" name="valRT" placeholder="RT...">
                                    @error('valRT')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valRW">RW <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input value="{{ $valRW }}" type="text" class="form-control @error('valRW') is-invalid @enderror" id="valRW" name="valRW" placeholder="RW..">
                                    @error('valRW')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="valDatak">Status kependudukan <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select name="valDatak" class="form-control @error('valDatak') is-invalid @enderror" id="valDatak" required>
                                        <option value="Tetap" {{ old('valDatak') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                                        <option value="Pindah" {{ old('valDatak') == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                                        <option value="Meninggal" {{ old('valDatak') == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                                         <option value="Tidaktetap" {{ old('valDatak') == 'Tidaktetap' ? 'selected' : '' }}>Tidak tetap</option>
                                    </select>
                                    @error('valDatak')
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
        document.getElementById('form-edit-datpen').submit();
    });
</script>

@endsection
