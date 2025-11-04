@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Form Edit Data Penduduk</h1>

                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('datapenduduk.update', ['nik' => $valNIK]) }}"
                                method="POST" id="form-edit-datpen">
                                @csrf
                                @method('PUT')

                                {{-- NO KK --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNokk">KK <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('valNokk') is-invalid @enderror"
                                            id="valNokk" name="valNokk" value="{{ old('valNokk', $valKK) }}" required>
                                        @error('valNokk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- NIK (readonly/ditampilkan saja) --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="">NIK <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6 pt-2">
                                        {{ $valNIK }}
                                    </div>
                                </div>

                                {{-- Gelar Awal --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valGelara">Gelar awal</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('valGelara', $valGelara) }}"
                                            class="form-control @error('valGelara') is-invalid @enderror" id="valGelara"
                                            name="valGelara" placeholder="Gelar Awal...">
                                        @error('valGelara')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Nama --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNama">Nama <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('valNama', $valNama) }}"
                                            class="form-control @error('valNama') is-invalid @enderror" id="valNama"
                                            name="valNama" placeholder="Nama lengkap...">
                                        @error('valNama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Gelar Akhir --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valGelart">Gelar akhir</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('valGelart', $valGelart) }}"
                                            class="form-control @error('valGelart') is-invalid @enderror" id="valGelart"
                                            name="valGelart" placeholder="Gelar akhir...">
                                        @error('valGelart')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Jenis Kelamin --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valJeniskelamin">Jenis kelamin <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select name="valJeniskelamin"
                                            class="form-control @error('valJeniskelamin') is-invalid @enderror"
                                            id="valJeniskelamin" required>
                                            <option value="1"
                                                {{ (string) old('valJeniskelamin', $valJeniskelamin) === '1' ? 'selected' : '' }}>
                                                Laki-Laki</option>
                                            <option value="0"
                                                {{ (string) old('valJeniskelamin', $valJeniskelamin) === '0' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('valJeniskelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Tempat Lahir --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valTempatlahir">Tempat Lahir <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('valTempatlahir', $valTempatlahir) }}"
                                            class="form-control @error('valTempatlahir') is-invalid @enderror"
                                            id="valTempatlahir" name="valTempatlahir" placeholder="Tempat lahir">
                                        @error('valTempatlahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Tanggal Lahir --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valTanggallahir">Tanggal Lahir <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="date"
                                            class="form-control @error('valTanggallahir') is-invalid @enderror"
                                            id="valTanggallahir" name="valTanggallahir"
                                            value="{{ old('valTanggallahir', $valTanggallahir) }}">
                                        @error('valTanggallahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Agama --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valAgama">Agama <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valAgama') is-invalid @enderror"
                                            id="valAgama" name="valAgama">
                                            <option value="0" disabled>--Pilih Agama--</option>
                                            @foreach ($agama as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ (string) old('valAgama', $valAgama) === (string) $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('valAgama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Pendidikan --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valPendidikan">Pendidikan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valPendidikan') is-invalid @enderror"
                                            id="valPendidikan" name="valPendidikan">
                                            <option value="0" disabled>--Pilih Pendidikan--</option>
                                            @foreach ($pendidikan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ (string) old('valPendidikan', $valPendidikan) === (string) $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('valPendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Pekerjaan --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valPekerjaan">Pekerjaan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valPekerjaan') is-invalid @enderror"
                                            id="valPekerjaan" name="valPekerjaan">
                                            <option value="0" disabled>--Pilih Pekerjaan--</option>
                                            @foreach ($pekerjaan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ (string) old('valPekerjaan', $valPekerjaan) === (string) $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('valPekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Goldar --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valGoldar">Golongan darah <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valGoldar') is-invalid @enderror"
                                            id="valGoldar" name="valGoldar">
                                            <option value="0" disabled>--Pilih Goldar--</option>
                                            @foreach ($goldar as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ (string) old('valGoldar', $valGoldar) === (string) $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('valGoldar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Status Pernikahan --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valStatus">Status <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('valStatus') is-invalid @enderror"
                                            id="valStatus" name="valStatus">
                                            <option value="0" disabled>--Pilih Status--</option>
                                            @foreach ($status as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ (string) old('valStatus', $valStatus) === (string) $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('valStatus')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        {{-- Tanggal Perkawinan (muncul jika status = Kawin) --}}
                                        <div class="form-group row mt-3" id="tanggalPerkawinanFormGroup"
                                            style="display:none;">
                                            <label class="col-lg-4 col-form-label" for="valTanggalperkawinan">Tanggal
                                                Perkawinan <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date"
                                                    value="{{ old('valTanggalperkawinan', $valTanggalperkawinan) }}"
                                                    class="form-control @error('valTanggalperkawinan') is-invalid @enderror"
                                                    id="valTanggalperkawinan" name="valTanggalperkawinan">
                                                @error('valTanggalperkawinan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Hubungan --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valHubungan">Hubungan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('valHubungan', $valHubungan) }}"
                                            class="form-control @error('valHubungan') is-invalid @enderror"
                                            id="valHubungan" name="valHubungan" placeholder="Hubungan">
                                        @error('valHubungan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Ayah --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valAyah">Ayah <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('valAyah', $valAyah) }}"
                                            class="form-control @error('valAyah') is-invalid @enderror" id="valAyah"
                                            name="valAyah" placeholder="Nama Ayah...">
                                        @error('valAyah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Ibu --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valIbu">Ibu <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('valIbu', $valIbu) }}"
                                            class="form-control @error('valIbu') is-invalid @enderror" id="valIbu"
                                            name="valIbu" placeholder="Nama Ibu...">
                                        @error('valIbu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Alamat --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valAlamat">Alamat <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valAlamat', $valAlamat) }}" type="text"
                                            class="form-control @error('valAlamat') is-invalid @enderror" id="valAlamat"
                                            name="valAlamat" placeholder="Masukkan Alamat...">
                                        @error('valAlamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- RT --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valRT">RT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valRT', $valRT) }}" type="text"
                                            class="form-control @error('valRT') is-invalid @enderror" id="valRT"
                                            name="valRT" placeholder="RT...">
                                        @error('valRT')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- RW --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valRW">RW <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valRW', $valRW) }}" type="text"
                                            class="form-control @error('valRW') is-invalid @enderror" id="valRW"
                                            name="valRW" placeholder="RW...">
                                        @error('valRW')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Datak --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valDatak">Status kependudukan <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @php $datak = old('valDatak', $valDatak); @endphp
                                        <select name="valDatak"
                                            class="form-control @error('valDatak') is-invalid @enderror" id="valDatak"
                                            required>
                                            <option value="Tetap" {{ $datak === 'Tetap' ? 'selected' : '' }}>Tetap
                                            </option>
                                            <option value="Pindah" {{ $datak === 'Pindah' ? 'selected' : '' }}>Pindah
                                            </option>
                                            <option value="Meninggal" {{ $datak === 'Meninggal' ? 'selected' : '' }}>
                                                Meninggal</option>
                                            <option value="Tidaktetap" {{ $datak === 'Tidaktetap' ? 'selected' : '' }}>
                                                Tidak tetap</option>
                                        </select>
                                        @error('valDatak')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Tombol Simpan (pakai modal konfirmasi) --}}
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

    {{-- Modal Konfirmasi --}}
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">Apakah kamu sudah yakin?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmSave">Yakin</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Script tombol simpan + toggle tanggal perkawinan --}}
    <script>
        document.getElementById('confirmSave').addEventListener('click', function() {
            document.getElementById('form-edit-datpen').submit();
        });

        function toggleTanggalPerkawinan() {
            const KAWIN_ID = '{{ $statusKawinId }}'; // ID status "Kawin" dari controller
            const selectedStatus = document.getElementById('valStatus').value;
            const fg = document.getElementById('tanggalPerkawinanFormGroup');

            if (selectedStatus === String(KAWIN_ID)) {
                fg.style.display = 'block';
            } else {
                fg.style.display = 'none';
                // Opsional: kosongkan ketika bukan kawin
                // document.getElementById('valTanggalperkawinan').value = '';
            }
        }

        document.getElementById('valStatus').addEventListener('change', toggleTanggalPerkawinan);
        document.addEventListener('DOMContentLoaded', toggleTanggalPerkawinan);
    </script>
@endsection
