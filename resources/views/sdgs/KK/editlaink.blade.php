 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LAIN-LAIN
                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('laink.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('laink.update') }}" method="POST" id="form-edit-laink">
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
                                    <label class="col-lg-4 col-form-label" for="valpengtransportsebelum">JUMLAH ANGGOTA KELUARGA
                                        PENGGUNA TRANSPORTASI UMUM 1 BULAN TERAKHIR
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $laink->pengtransportsebelum ?? '' }}"
                                            class="form-control @error('valpengtransportsebelum') is-invalid @enderror"
                                            id="valpengtransportsebelum" name="valpengtransportsebelum" placeholder="berapa jumlahnya...">
                                        @error('valpengtransportsebelum')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpengtransportsesudah">JUMLAH ANGGOTA KELUARGA
                                        PENGGUNA TRANSPORTASI UMUM 1 BULAN SEBELUMNYA
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ $laink->pengtransportsesudah ?? '' }}"
                                            class="form-control @error('valpengtransportsesudah') is-invalid @enderror"
                                            id="valpengtransportsesudah" name="valpengtransportsesudah" placeholder="berapa jumlahnya...">
                                        @error('valpengtransportsesudah')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PEMANFAAT/PENERIMA PROGRAM PEMERINTAH
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valblt">BLT
                                            </label>
                                            <select class="form-control @error('valblt') is-invalid @enderror"
                                                id="valblt" name="valblt">
                                                <option value="Ya"
                                                    {{ old('valblt') == 'Ya' || (isset($laink) && $laink->valblt == 'Ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="Tidak"
                                                    {{ old('valblt') == 'Tidak' || (isset($laink) && $laink->valblt == 'Tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valjenistrasport_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valpkh">PKH
                                            </label>
                                            <select class="form-control @error('valpkh') is-invalid @enderror"
                                                id="valpkh" name="valpkh">
                                                <option value="Ya"
                                                    {{ old('valpkh') == 'Ya' || (isset($laink) && $laink->valpkh == 'Ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="Tidak"
                                                    {{ old('valpkh') == 'Tidak' || (isset($laink) && $laink->valblt == 'Tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valpkh')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbst">BST
                                            </label>
                                            <select class="form-control @error('valbst') is-invalid @enderror"
                                                id="valbst" name="valbst">
                                                <option value="Ya"
                                                    {{ old('valbst') == 'Ya' || (isset($laink) && $laink->valbst == 'Ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="Tidak"
                                                    {{ old('valbst') == 'Tidak' || (isset($laink) && $laink->valbst == 'Tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valjenistrasport_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbantuan_presiden">BANTUAN PRESIDEN

                                            </label>
                                            <select class="form-control @error('valbantuan_presiden') is-invalid @enderror"
                                                id="valbantuan_presiden" name="valbantuan_presiden">
                                                <option value="Ya"
                                                    {{ old('valbantuan_presiden') == 'Ya' || (isset($laink) && $laink->bantuan_presiden == 'Ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="Tidak"
                                                    {{ old('valbantuan_presiden') == 'Tidak' || (isset($laink) && $laink->bantuan_presiden == 'Tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valjenistrasport_lokasipu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbantuan_umkm">BANTUAN UMKM

                                            </label>
                                            <select class="form-control @error('valbantuan_umkm') is-invalid @enderror"
                                                id="valbantuan_umkm" name="valbantuan_umkm">
                                                <option value="Ya"
                                                    {{ old('valbantuan_umkm') == 'Ya' || (isset($laink) && $laink->valbantuan_umkm == 'Ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="Tidak"
                                                    {{ old('valbantuan_umkm') == 'Tidak' || (isset($laink) && $laink->valbantuan_umkm == 'Tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valbantuan_umkm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbantuan_pekerja">BANTUAN UNTUK PEKERJA

                                            </label>
                                            <select class="form-control @error('valbantuan_pekerja') is-invalid @enderror"
                                                id="valbantuan_pekerja" name="valbantuan_pekerja">
                                                <option value="Ya"
                                                    {{ old('valbantuan_pekerja') == 'Ya' || (isset($laink) && $laink->valbantuan_pekerja == 'Ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="Tidak"
                                                    {{ old('valbantuan_pekerja') == 'Tidak' || (isset($laink) && $laink->valbantuan_pekerja == 'Tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valbantuan_pekerja')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valbantuan_anak">BANTUAN PENDIDIKAN ANAK

                                            </label>
                                            <select class="form-control @error('valbantuan_anak') is-invalid @enderror"
                                                id="valbantuan_anak" name="valbantuan_anak">
                                                <option value="Ya"
                                                    {{ old('valbantuan_anak') == 'Ya' || (isset($laink) && $laink->bantuan_anak == 'Ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="Tidak"
                                                    {{ old('valbantuan_anak') == 'Tidak' || (isset($laink) && $laink->bantuan_anak == 'Tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('valbantuan_anak
                                            bantuan_anak')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vallainnya">LAINNYA

                                            </label>
                                            <select class="form-control @error('vallainnya') is-invalid @enderror"
                                                id="vallainnya" name="vallainnya">
                                                <option value="Ya"
                                                    {{ old('vallainnya') == 'Ya' || (isset($laink) && $laink->lainnya == 'Ya') ? 'selected' : '' }}>
                                                    Ya</option>
                                                <option value="Tidak"
                                                    {{ old('vallainnya') == 'Tidak' || (isset($laink) && $laink->lainnya == 'Tidak') ? 'selected' : '' }}>
                                                    Tidak</option>
                                            </select>
                                            @error('vallainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                    </div>



                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valrata_rata">BERAPA RATA-RATA PENGELUARAN SATU KELUARGA DALAM SEBULAN (Rp.)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $laink->rata_rata ?? '' }}"
                                        class="form-control @error('valrata_rata') is-invalid @enderror"
                                        id="valrata_rata" name="valrata_rata" placeholder="Rp..." oninput="formatNumber(this)">
                                 <script>
                                     function formatNumber(input) {
                                         // Menghapus karakter selain digit (0-9)
                                         var sanitized = input.value.replace(/[^0-9]/g, '');

                                         // Menambahkan tanda titik setiap tiga angka dari belakang
                                         var formatted = sanitized.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                         // Memasukkan hasil format kembali ke dalam input
                                         input.value = formatted;
                                     }
                                 </script>

                                        @error('valrata_rata')
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
            document.getElementById('form-edit-laink').submit();
        });
    </script>
@endsection
