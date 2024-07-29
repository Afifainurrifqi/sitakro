 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT LEMBAGA EKONOMI
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1></h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtlembaga_ekonomi.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtlembaga_ekonomi.update') }}" method="POST"  id="form-edit-rtlembagaekonomi">
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
                                    <label class="col-lg-4 col-form-label">AGEN PENGERAHAN TKI KE LUAR NEGERI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valagentik_jp">Jumlah Perusahaan

                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->agentik_jp ?? '' }}"
                                                class="form-control @error('valagentik_jp') is-invalid @enderror"
                                                id="valagentik_jp" name="valagentik_jp" placeholder="jumlah...">
                                            @error('valagentik_jp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valagentik_jtk">Jumlah Tenaga Kerja
                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->agentik_jtk ?? '' }}"
                                                class="form-control @error('valagentik_jtk') is-invalid @enderror"
                                                id="valagentik_jtk" name="valagentik_jtk" placeholder="jumlah...">
                                            @error('valagentik_jtk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">JUMLAH TATA RUANG INDUSTRI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjtri_sentra">Sentra Industri

                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->jtri_sentra ?? '' }}"
                                                class="form-control @error('valjtri_sentra') is-invalid @enderror"
                                                id="valjtri_sentra" name="valjtri_sentra" placeholder="jumlah...">
                                            @error('valjtri_sentra')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjtri_lingkungan">Lingkungan Industri Kecil

                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->jtri_lingkungan ?? '' }}"
                                                class="form-control @error('valjtri_lingkungan') is-invalid @enderror"
                                                id="valjtri_lingkungan" name="valjtri_lingkungan" placeholder="jumlah...">
                                            @error('valjtri_lingkungan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjtri_kampung">Perkampungan Industri Kecil


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->jtri_kampung ?? '' }}"
                                                class="form-control @error('valjtri_kampung') is-invalid @enderror"
                                                id="valjtri_kampung" name="valjtri_kampung" placeholder="jumlah...">
                                            @error('valjtri_kampung')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KEBERADAAN PUB/DISKOTIK/TEMPAT KARAOKE
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valdiskotik_kpd">Keberadaan PUB/Diskotik/ Tempat Karaoke
                                            </label>
                                            <select class="form-control @error('valdiskotik_kpd') is-invalid @enderror"
                                                id="valdiskotik_kpd" name="valdiskotik_kpd">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('valdiskotik_kpd') == 'ada' || (isset($rtlembaga_ekonomi) && $rtlembaga_ekonomi->diskotik_kpd == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('valdiskotik_kpd') == 'tidak ada' || (isset($rtlembaga_ekonomi) && $rtlembaga_ekonomi->diskotik_kpd == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>

                                            @error('valdiskotik_kpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valdiskotik_jtl">Jarak terdekat ke Lokasi
                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->diskotik_jtl ?? '' }}"
                                                class="form-control @error('valdiskotik_jtl') is-invalid @enderror"
                                                id="valdiskotik_jtl" name="valdiskotik_jtl" placeholder="jumlah...">
                                            @error('valdiskotik_jtl')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PANGKALAN MINYAK TANAH DAN LPG
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="vallpg_kpapm">Keberadaan pangkalan/ agen/penjual minyak tanah
                                            </label>
                                            <select class="form-control @error('vallpg_kpapm') is-invalid @enderror"
                                                id="vallpg_kpapm" name="vallpg_kpapm">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('vallpg_kpapm') == 'ada' || (isset($rtlembaga_ekonomi) && $rtlembaga_ekonomi->lpg_kpapm == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('vallpg_kpapm') == 'tidak ada' || (isset($rtlembaga_ekonomi) && $rtlembaga_ekonomi->lpg_kpapm == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>
                                            @error('vallpg_kpapm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vallpg_kpapg">Keberadaan pangkalan/ agen/penjual LPG

                                            </label>
                                            <select class="form-control @error('vallpg_kpapg') is-invalid @enderror"
                                                id="vallpg_kpapg" name="vallpg_kpapg">
                                                <option value="" disabled selected>Pilih...</option>
                                                <option value="ada"
                                                    {{ old('vallpg_kpapg') == 'ada' || (isset($rtlembaga_ekonomi) && $rtlembaga_ekonomi->lpg_kpapg == 'ada') ? 'selected' : '' }}>
                                                    Ada
                                                </option>
                                                <option value="tidak ada"
                                                    {{ old('vallpg_kpapg') == 'tidak ada' || (isset($rtlembaga_ekonomi) && $rtlembaga_ekonomi->lpg_kpapg == 'tidak ada') ? 'selected' : '' }}>
                                                    Tidak Ada
                                                </option>
                                            </select>
                                            @error('vallpg_kpapg')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">JUMLAH KEBERADAAN KOPERASI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valkoperasi_jumlah">Jumlah KUD
                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->koperasi_jumlah ?? '' }}"
                                                class="form-control @error('valkoperasi_jumlah') is-invalid @enderror"
                                                id="valkoperasi_jumlah" name="valkoperasi_jumlah" placeholder="jumlah...">
                                            @error('valkoperasi_jumlah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudproduksi">KUD yang membeli/ menjual hasil/ produksi pertanian

                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->koperasi_kudproduksi ?? '' }}"
                                                class="form-control @error('valkoperasi_kudproduksi') is-invalid @enderror"
                                                id="valkoperasi_kudproduksi" name="valkoperasi_kudproduksi" placeholder="jumlah...">
                                            @error('valkoperasi_kudproduksi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudkredit">KUD yang menyediakan Kredit Usaha


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->koperasi_kudkredit ?? '' }}"
                                                class="form-control @error('valkoperasi_kudkredit') is-invalid @enderror"
                                                id="valkoperasi_kudkredit" name="valkoperasi_kudkredit" placeholder="jumlah...">
                                            @error('valkoperasi_kudkredit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudkegiatan">KUD kegiatan lainnya


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->koperasi_kudkegiatan ?? '' }}"
                                                class="form-control @error('valkoperasi_kudkegiatan') is-invalid @enderror"
                                                id="valkoperasi_kudkegiatan" name="valkoperasi_kudkegiatan" placeholder="jumlah...">
                                            @error('valkoperasi_kudkegiatan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudindustrik">Koperasi Industri Kecil dan Kerajinan Rakyat


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->koperasi_kudindustrik ?? '' }}"
                                                class="form-control @error('valkoperasi_kudindustrik') is-invalid @enderror"
                                                id="valkoperasi_kudindustrik" name="valkoperasi_kudindustrik" placeholder="jumlah...">
                                            @error('valkoperasi_kudindustrik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudksp">Koperasi Simpan Pinjam


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->koperasi_kudksp ?? '' }}"
                                                class="form-control @error('valkoperasi_kudksp') is-invalid @enderror"
                                                id="valkoperasi_kudksp" name="valkoperasi_kudksp" placeholder="jumlah...">
                                            @error('valkoperasi_kudksp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudksu">Koperasi Serba Usaha


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->koperasi_kudksu ?? '' }}"
                                                class="form-control @error('valkoperasi_kudksu') is-invalid @enderror"
                                                id="valkoperasi_kudksu" name="valkoperasi_kudksu" placeholder="jumlah...">
                                            @error('valkoperasi_kudksu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudlainnya">Koperasi Lainnya


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->koperasi_kudlainnya ?? '' }}"
                                                class="form-control @error('valkoperasi_kudlainnya') is-invalid @enderror"
                                                id="valkoperasi_kudlainnya" name="valkoperasi_kudlainnya" placeholder="jumlah...">
                                            @error('valkoperasi_kudlainnya')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">KIOS SARANA PRODUKSI PETANI/NELAYAN


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valkos_kud">Milik KUD (unit)


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->agentik_jp ?? '' }}"
                                                class="form-control @error('valkos_kud') is-invalid @enderror"
                                                id="valkos_kud" name="valkos_kud" placeholder="jumlah...">
                                            @error('valkos_kud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkos_bumdes">Milik BUMDES (unit)

                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->agentik_jtk ?? '' }}"
                                                class="form-control @error('valkos_bumdes') is-invalid @enderror"
                                                id="valkos_bumdes" name="valkos_bumdes" placeholder="jumlah...">
                                            @error('valkos_bumdes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkos_selain">Milik selain KUD dan BUMDES


                                            </label>
                                            <input type="text" value="{{ $rtlembaga_ekonomi->agentik_jtk ?? '' }}"
                                                class="form-control @error('valkos_selain') is-invalid @enderror"
                                                id="valkos_selain" name="valkos_selain" placeholder="jumlah...">
                                            @error('valkos_selain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

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
            document.getElementById('form-edit-rtlembagaekonomi').submit();
        });
    </script>
@endsection
