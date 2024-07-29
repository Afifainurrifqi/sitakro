 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT KEGIATAN WARGA UNTUK MENJAGA KEAMANAN LINGKUNGAN SELAMA SATU TAHUN
                            TERAKHIR
                            <h1 class="card-title">EDIT LOKASI RT</h1>
                            <h1 class="card-title"> RT : {{ $datart->rt }}</h1>
                            <h1 class="card-title"> RW : {{ $datart->rw }}</h1>
                            <button type="button" class="btn mb-1 btn-warning"
                                onclick="window.location='{{ route('rt_kegiatanwarga.index') }}'">Kembali
                            </button>
                            <br><br><br>
                            <div class="form-validation">
                                <form class="form-valide" action="{{ route('rt_kegiatanwarga.update') }}" method="POST" id="form-edit-kegiatan">
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
                                        <label class="col-lg-4 col-form-label" for="valjumlah_kpp">JUMLAH KEGIATAN
                                            PEMBANGUNAN
                                            /PEMELIHARAAN POSKAMLING


                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" value="{{ $rt_kegiatanwarga->jumlah_kpp ?? '' }}"
                                                class="form-control @error('valjumlah_kpp') is-invalid @enderror"
                                                id="valjumlah_kpp" name="valjumlah_kpp"
                                                placeholder="berapa jumlahnya...">
                                            @error('valjumlah_kpp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjumlah_ppr">JUMLAH KEGIATAN
                                            PEMBENTUKAN
                                            /PENGATURAN REGU KEAMANAN
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" value="{{ $rt_kegiatanwarga->jumlah_ppr ?? '' }}"
                                                class="form-control @error('valjumlah_ppr') is-invalid @enderror"
                                                id="valjumlah_ppr" name="valjumlah_ppr"
                                                placeholder="berapa jumlahnya...">
                                            @error('valjumlah_ppr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjumlah_hansip">JUMLAH ANGGOTA
                                            HANSIP
                                            /LINMAS YANG DITAMBAHKAN
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" value="{{ $rt_kegiatanwarga->jumlah_hansip ?? '' }}"
                                                class="form-control @error('valjumlah_hansip') is-invalid @enderror"
                                                id="valjumlah_hansip" name="valjumlah_hansip"
                                                placeholder="berapa jumlahnya...">
                                            @error('valjumlah_hansip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valpelaporan_tamu_lebih24">PELAPORAN
                                            TAMU
                                            YANG MENGINAP LEBIH DARI 24 JAM KE APARAT LINGKUNGAN
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select
                                                class="form-control @error('valpelaporan_tamu_lebih24') is-invalid @enderror"
                                                id="valpelaporan_tamu_lebih24" name="valpelaporan_tamu_lebih24">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ya"
                                                    {{ old('valpelaporan_tamu_lebih24') == 'ya' || (isset($rt_kegiatanwarga) && $rt_kegiatanwarga->pelaporan_tamu_lebih24 == 'ya') ? 'selected' : '' }}>
                                                    Ya
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valpelaporan_tamu_lebih24') == 'tidak' || (isset($rt_kegiatanwarga) && $rt_kegiatanwarga->pelaporan_tamu_lebih24 == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>
                                            @error('valpelaporan_tamu_lebih24')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valsistem_keamanan">PENGAKTIFAN
                                            SISTEM KEAMANAN
                                            LINGKUNGAN BERASAL DARI INISIATIF WARGA
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control @error('valsistem_keamanan') is-invalid @enderror"
                                                id="valsistem_keamanan" name="valsistem_keamanan">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ya"
                                                    {{ old('valsistem_keamanan') == 'ya' || (isset($rt_kegiatanwarga) && $rt_kegiatanwarga->sistem_keamanan == 'ya') ? 'selected' : '' }}>
                                                    Ya
                                                </option>
                                                <option value="tidak"
                                                    {{ old('valsistem_keamanan') == 'tidak' || (isset($rt_kegiatanwarga) && $rt_kegiatanwarga->sistem_keamanan == 'tidak') ? 'selected' : '' }}>
                                                    Tidak
                                                </option>
                                            </select>


                                            @error('valsistem_keamanan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valsistem_linmas">JUMLAH ANGGOTA
                                            LINMAS
                                            ATAU
                                            HANSIP
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" value="{{ $rt_kegiatanwarga->sistem_linmas ?? '' }}"
                                                class="form-control @error('valsistem_linmas') is-invalid @enderror"
                                                id="valsistem_linmas" name="valsistem_linmas"
                                                placeholder="berapa jumlahnya...">
                                            @error('valsistem_linmas')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">JUMLAH POS POLISI

                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="valjumlahpos_digunakan">YANG DIGUNAKAN
                                                </label>
                                                <input type="number"
                                                    value="{{ $rt_kegiatanwarga->jumlahpos_digunakan ?? '' }}"
                                                    class="form-control @error('valjumlahpos_digunakan') is-invalid @enderror"
                                                    id="valjumlahpos_digunakan" name="valjumlahpos_digunakan"
                                                    placeholder="berapa jumlahnya...">
                                                @error('valjumlahpos_digunakan')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valjumlahpos_tidakdigunakan">YANG TIDAK DIGUNAKAN
                                                </label>
                                                <input type="number"
                                                    value="{{ $rt_kegiatanwarga->jumlahpos_tidakdigunakan ?? '' }}"
                                                    class="form-control @error('valjumlahpos_tidakdigunakan') is-invalid @enderror"
                                                    id="valjumlahpos_tidakdigunakan" name="valjumlahpos_tidakdigunakan"
                                                    placeholder="berapa jumlahnya...">
                                                @error('valjumlahpos_tidakdigunakan')
                                                    <div id="" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjarak_ppt">JARAK KE POS POLISI
                                            TERDEKAT
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" value="{{ $rt_kegiatanwarga->jarak_ppt ?? '' }}"
                                                class="form-control @error('valjarak_ppt') is-invalid @enderror"
                                                id="valjarak_ppt" name="valjarak_ppt" placeholder="berapa jumlahnya...">
                                            @error('valjarak_ppt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valkemudahan_ppt">KEMUDAHAN UNTUK
                                            MENCAPAI
                                            POS POLISI
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control @error('valkemudahan_ppt') is-invalid @enderror"
                                                id="valkemudahan_ppt" name="valkemudahan_ppt">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="sangat mudah"
                                                    {{ old('valkemudahan_ppt') == 'sangat mudah' || (isset($rt_kegiatanwarga) && $rt_kegiatanwarga->kemudahan_ppt == 'sangat mudah') ? 'selected' : '' }}>
                                                    Sangat Mudah
                                                </option>
                                                <option value="mudah"
                                                    {{ old('valkemudahan_ppt') == 'mudah' || (isset($rt_kegiatanwarga) && $rt_kegiatanwarga->kemudahan_ppt == 'mudah') ? 'selected' : '' }}>
                                                    Mudah
                                                </option>
                                                <option value="sulit"
                                                    {{ old('valkemudahan_ppt') == 'sulit' || (isset($rt_kegiatanwarga) && $rt_kegiatanwarga->kemudahan_ppt == 'sulit') ? 'selected' : '' }}>
                                                    Sulit
                                                </option>
                                            </select>

                                            @error('valkemudahan_ppt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjarak_korban">JUMLAH KORBAN
                                            (TERMASUK
                                            PERCOBAAN) BUNUH DIRI
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" value="{{ $rt_kegiatanwarga->jarak_korban ?? '' }}"
                                                class="form-control @error('valjarak_korban') is-invalid @enderror"
                                                id="valjarak_korban" name="valjarak_korban"
                                                placeholder="berapa jumlahnya...">
                                            @error('valjarak_korban')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjarak_lokasikumpul">JUMLAH LOKASI
                                            BERKUMPUL / MANGKAL ANAK JALANAN
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number"
                                                value="{{ $rt_kegiatanwarga->jarak_lokasikumpul ?? '' }}"
                                                class="form-control @error('valjarak_lokasikumpul') is-invalid @enderror"
                                                id="valjarak_lokasikumpul" name="valjarak_lokasikumpul"
                                                placeholder="berapa jumlahnya...">
                                            @error('valjarak_lokasikumpul')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjarak_mangkal">JUMLAH TEMPAT
                                            MANGKAL
                                            GELANDANGAN /PENGEMIS
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" value="{{ $rt_kegiatanwarga->jarak_mangkal ?? '' }}"
                                                class="form-control @error('valjarak_mangkal') is-invalid @enderror"
                                                id="valjarak_mangkal" name="valjarak_mangkal"
                                                placeholder="berapa jumlahnya...">
                                            @error('valjarak_mangkal')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="valjarak_lokalisasi">JUMLAH LOKALISASI
                                            /LOKASI /TEMPAT MANGKAL PEKERJA SEKS KOMERSIAL (PSK)


                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" value="{{ $rt_kegiatanwarga->jarak_lokalisasi ?? '' }}"
                                                class="form-control @error('valjarak_lokalisasi') is-invalid @enderror"
                                                id="valjarak_lokalisasi" name="valjarak_lokalisasi"
                                                placeholder="berapa jumlahnya...">
                                            @error('valjarak_lokalisasi')
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
            document.getElementById('form-edit-kegiatan').submit();
        });
    </script>
@endsection
