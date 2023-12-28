@extends('layout.main')


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">EDIT KEGIATAN WARGA UNTUK MENJAGA KEAMANAN LINGKUNGAN SELAMA SATU TAHUN
                            TERAKHIR


                            {{ $datap->nama }}</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rt_kegiatanwarga.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rt_kegiatanwarga.update') }}" method="POST">
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
                                    <label class="col-lg-4 col-form-label" for="valjumlah_kpp">JUMLAH KEGIATAN PEMBANGUNAN
                                        /PEMELIHARAAN POSKAMLING
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->jumlah_kpp))
                                            <br>
                                            {{ $rt_kegiatanwarga->jumlah_kpp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlah_kpp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_ppr">JUMLAH KEGIATAN PEMBENTUKAN
                                        /PENGATURAN REGU KEAMANAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->jumlah_kpp))
                                            <br>
                                            {{ $rt_kegiatanwarga->jumlah_kpp }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjumlah_ppr')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjumlah_hansip">JUMLAH ANGGOTA HANSIP
                                        /LINMAS YANG DITAMBAHKAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->jumlah_hansip))
                                        <br>
                                        {{ $rt_kegiatanwarga->jumlah_hansip }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valjumlah_hansip')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valpelaporan_tamu_lebih24">PELAPORAN TAMU
                                        YANG MENGINAP LEBIH DARI 24 JAM KE APARAT LINGKUNGAN
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->pelaporan_tamu_lebih24))
                                        <br>
                                        {{ $rt_kegiatanwarga->pelaporan_tamu_lebih24 }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
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
                                        @if (isset($rt_kegiatanwarga->sistem_keamanan))
                                        <br>
                                        {{ $rt_kegiatanwarga->sistem_keamanan }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif

                                        @error('valsistem_keamanan')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valsistem_linmas">JUMLAH ANGGOTA LINMAS ATAU
                                        HANSIP
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->sistem_linmas))
                                        <br>
                                        {{ $rt_kegiatanwarga->sistem_linmas }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
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
                                            @if (isset($rt_kegiatanwarga->jumlahpos_digunakan))
                                            <br>
                                            {{ $rt_kegiatanwarga->jumlahpos_digunakan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpos_digunakan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valjumlahpos_tidakdigunakan">YANG TIDAK DIGUNAKAN
                                            </label>
                                            @if (isset($rt_kegiatanwarga->jumlahpos_tidakdigunakan))
                                            <br>
                                            {{ $rt_kegiatanwarga->jumlahpos_tidakdigunakan }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                            @error('valjumlahpos_tidakdigunakan')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjarak_ppt">JARAK KE POS POLISI TERDEKAT
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->jarak_ppt))
                                            <br>
                                            {{ $rt_kegiatanwarga->jarak_ppt }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valjarak_ppt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valkemudahan_ppt">KEMUDAHAN UNTUK MENCAPAI
                                        POS POLISI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->kemudahan_ppt))
                                        <br>
                                        {{ $rt_kegiatanwarga->kemudahan_ppt }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valkemudahan_ppt')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjarak_korban">JUMLAH KORBAN (TERMASUK
                                        PERCOBAAN) BUNUH DIRI
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->jarak_korban))
                                        <br>
                                        {{ $rt_kegiatanwarga->jarak_korban }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
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
                                        @if (isset($rt_kegiatanwarga->jarak_lokasikumpul))
                                        <br>
                                        {{ $rt_kegiatanwarga->jarak_lokasikumpul }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valjarak_lokasikumpul')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valjarak_mangkal">JUMLAH TEMPAT MANGKAL
                                        GELANDANGAN /PENGEMIS
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @if (isset($rt_kegiatanwarga->jarak_mangkal))
                                        <br>
                                        {{ $rt_kegiatanwarga->jarak_mangkal }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
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
                                        @if (isset($rt_kegiatanwarga->jarak_lokalisasi))
                                        <br>
                                        {{ $rt_kegiatanwarga->jarak_lokalisasi }}
                                    @else
                                        <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                        Data tidak tersedia.
                                    @endif
                                        @error('valjarak_lokalisasi')
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
