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
                            <form class="form-valide" action="{{ route('rtlembaga_ekonomi.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">NAMA KETUA RT

                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datart->nama))
                                            <br>
                                            {{ $datart->nama }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valnama_ketuart')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valalamat">ALAMAT <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($datart->alamat))
                                        <br>
                                        {{ $datart->alamat }}
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
                                    <label class="col-lg-4 col-form-label" for="valrt">RT <span
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
                                    <label class="col-lg-4 col-form-label" for="valnohp">NO. HP / TELEPON
                                        <span class="text-danger">*</span>
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
                                    <label class="col-lg-4 col-form-label">AGEN PENGERAHAN TKI KE LUAR NEGERI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valagentik_jp">Jumlah Perusahaan

                                            </label>

                                            @if (isset($rtlembaga_ekonomi->agentik_jp))
                                                <br>
                                                {{ $rtlembaga_ekonomi->agentik_jp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valagentik_jp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valagentik_jtk">Jumlah Tenaga Kerja
                                            </label>
                                            @if (isset($rtlembaga_ekonomi->agentik_jtk))
                                                <br>
                                                {{ $rtlembaga_ekonomi->agentik_jtk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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

                                            @if (isset($rtlembaga_ekonomi->jtri_sentra))
                                                <br>
                                                {{ $rtlembaga_ekonomi->jtri_sentra }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjtri_sentra')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjtri_lingkungan">Lingkungan Industri Kecil
                                            </label>
                                            @if (isset($rtlembaga_ekonomi->jtri_lingkungan))
                                                <br>
                                                {{ $rtlembaga_ekonomi->jtri_lingkungan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjtri_lingkungan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjtri_kampung">Perkampungan Industri Kecil


                                            </label>

                                            @if (isset($rtlembaga_ekonomi->jtri_kampung))
                                                <br>
                                                {{ $rtlembaga_ekonomi->jtri_kampung }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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

                                            @if (isset($rtlembaga_ekonomi->diskotik_kpd))
                                                <br>
                                                {{ $rtlembaga_ekonomi->diskotik_kpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valdiskotik_kpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valdiskotik_jtl">Jarak terdekat ke Lokasi
                                            </label>

                                            @if (isset($rtlembaga_ekonomi->diskotik_jtl))
                                                <br>
                                                {{ $rtlembaga_ekonomi->diskotik_jtl }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rtlembaga_ekonomi->lpg_kpapm))
                                                <br>
                                                {{ $rtlembaga_ekonomi->lpg_kpapm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('vallpg_kpapm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vallpg_kpapg">Keberadaan pangkalan/ agen/penjual LPG

                                            </label>
                                            @if (isset($rtlembaga_ekonomi->lpg_kpapg))
                                                <br>
                                                {{ $rtlembaga_ekonomi->lpg_kpapg }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rtlembaga_ekonomi->koperasi_jumlah))
                                                <br>
                                                {{ $rtlembaga_ekonomi->koperasi_jumlah }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkoperasi_jumlah')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudproduksi">KUD yang membeli/ menjual hasil/ produksi
                                                pertanian

                                            </label>
                                            @if (isset($rtlembaga_ekonomi->koperasi_kudproduksi))
                                                <br>
                                                {{ $rtlembaga_ekonomi->koperasi_kudproduksi }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkoperasi_kudproduksi')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudkredit">KUD yang menyediakan Kredit Usaha


                                            </label>
                                            @if (isset($rtlembaga_ekonomi->koperasi_kudkredit))
                                                <br>
                                                {{ $rtlembaga_ekonomi->koperasi_kudkredit }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkoperasi_kudkredit')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudkegiatan">KUD kegiatan lainnya


                                            </label>
                                            @if (isset($rtlembaga_ekonomi->koperasi_kudkegiatan))
                                                <br>
                                                {{ $rtlembaga_ekonomi->koperasi_kudkegiatan }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkoperasi_kudkegiatan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudindustrik">Koperasi Industri Kecil dan Kerajinan
                                                Rakyat


                                            </label>
                                            @if (isset($rtlembaga_ekonomi->koperasi_kudindustrik))
                                                <br>
                                                {{ $rtlembaga_ekonomi->koperasi_kudindustrik }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkoperasi_kudindustrik')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudksp">Koperasi Simpan Pinjam


                                            </label>
                                            @if (isset($rtlembaga_ekonomi->koperasi_kudksp))
                                                <br>
                                                {{ $rtlembaga_ekonomi->koperasi_kudksp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkoperasi_kudksp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudksu">Koperasi Serba Usaha


                                            </label>
                                            @if (isset($rtlembaga_ekonomi->koperasi_kudksu))
                                                <br>
                                                {{ $rtlembaga_ekonomi->koperasi_kudksu }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkoperasi_kudksu')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkoperasi_kudlainnya">Koperasi Lainnya


                                            </label>
                                            @if (isset($rtlembaga_ekonomi->koperasi_kudlainnya))
                                                <br>
                                                {{ $rtlembaga_ekonomi->koperasi_kudlainnya }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
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
                                            @if (isset($rtlembaga_ekonomi->kos_kud))
                                                <br>
                                                {{ $rtlembaga_ekonomi->kos_kud }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkos_kud')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkos_bumdes">Milik BUMDES (unit)

                                            </label>
                                            @if (isset($rtlembaga_ekonomi->kos_bumdes))
                                                <br>
                                                {{ $rtlembaga_ekonomi->kos_bumdes }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkos_bumdes')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkos_selain">Milik selain KUD dan BUMDES


                                            </label>
                                            @if (isset($rtlembaga_ekonomi->kos_selain))
                                                <br>
                                                {{ $rtlembaga_ekonomi->kos_selain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkos_selain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

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
