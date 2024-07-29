 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">SARANA EKONOMI
                            <h1  class="card-title"> RT : {{ $datart->rt }}</h1> <h1 class="card-title"> RW :  {{ $datart->rw }}</h1></h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ route('rtsare.index') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('rtsare.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnik">NIK <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if (isset($datart->nik))
                                            <br>
                                            {{ $datart->nik }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
                                        @error('valnik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valnama_ketuart">Nama Ketua RT <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if (isset($datart->nama))
                                            <br>
                                            {{ $datart->nama }}
                                        @else
                                            <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                            Data tidak tersedia.
                                        @endif
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
                                        @if (isset($datart->nik))
                                            <br>
                                            {{ $datart->nik }}
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
                                    <label class="col-lg-4 col-form-label" for="valrt">RT<span
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
                                    <label class="col-lg-4 col-form-label" for="valnohp">NO HP <span
                                            class="text-danger">*</span>
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
                                    <label class="col-lg-4 col-form-label">KELOMPOK PERTOKOAN (MINIMAL 10 TOKO DAN
                                        MENGELOMPOK DALAM SATU LOKASI)

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_toko">JUMLAH
                                            </label>

                                            @if (isset($rt_sare->jumlah_toko))
                                                <br>
                                                {{ $rt_sare->jumlah_toko }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlah_toko')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_toko">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_toko))
                                                <br>
                                                {{ $rt_sare->kondisi_toko }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_toko')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_toko">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_toko))
                                                <br>
                                                {{ $rt_sare->Jarak_toko }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valJarak_toko')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_toko">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_toko))
                                                <br>
                                                {{ $rt_sare->kemudahan_toko }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valkemudahan_toko')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PASAR DENGAN BANGUNAN PERMANEN MEMILIKI ATAP,
                                        LANTAI, DAN DINDING
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_pasar_permanen">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_pasar_permanen))
                                                <br>
                                                {{ $rt_sare->jumlah_pasar_permanen }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlah_pasar_permanen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_pasar_permanen">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_pasar_permanen))
                                                <br>
                                                {{ $rt_sare->kondisi_pasar_permanen }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_pasar_permanen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_pasar_permanen">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_pasar_permanen))
                                                <br>
                                                {{ $rt_sare->Jarak_pasar_permanen }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_pasar_permanen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_pasar_permanen">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_pasar_permanen))
                                                <br>
                                                {{ $rt_sare->kemudahan_pasar_permanen }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkemudahan_pasar_permanen')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PASAR DENGAN BANGUNAN SEMI PERMANEN MEMILIKI ATAP
                                        DAN LANTAI TANPA DINDING
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_semip">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_semip))
                                                <br>
                                                {{ $rt_sare->jumlah_semip }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlah_semip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_semip">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_semip))
                                                <br>
                                                {{ $rt_sare->kondisi_semip }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkondisi_semip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_semip">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_semip))
                                                <br>
                                                {{ $rt_sare->Jarak_semip }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_semip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_semip">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_semip))
                                                <br>
                                                {{ $rt_sare->kemudahan_semip }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkemudahan_semip')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PASAR TANPA BANGUNAN (MISALNYA : PASAR SUBUH,
                                        PASAR TERAPUNG)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_tanpap">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_tanpap))
                                                <br>
                                                {{ $rt_sare->jumlah_tanpap }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlah_tanpap')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_tanpap">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_tanpap))
                                                <br>
                                                {{ $rt_sare->kondisi_tanpap }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_tanpap')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_tanpap">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_tanpap))
                                                <br>
                                                {{ $rt_sare->Jarak_tanpap }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_tanpap')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_tanpap">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_tanpap))
                                                <br>
                                                {{ $rt_sare->kemudahan_tanpap }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_tanpap')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">JUMLAH MINIMARKET / SWALAYAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_minimarket">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_minimarket))
                                                <br>
                                                {{ $rt_sare->jumlah_minimarket }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlah_minimarket')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_minimarket">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_minimarket))
                                                <br>
                                                {{ $rt_sare->kondisi_minimarket }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_minimarket')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_minimarket">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_minimarket))
                                                <br>
                                                {{ $rt_sare->Jarak_minimarket }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_minimarket')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_minimarket">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_minimarket))
                                                <br>
                                                {{ $rt_sare->kemudahan_minimarket }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkemudahan_minimarket')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TOKO / WARUNG KELONTONG

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_warungk">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_warungk))
                                                <br>
                                                {{ $rt_sare->jumlah_warungk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlah_warungk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_warungk">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_warungk))
                                                <br>
                                                {{ $rt_sare->kondisi_warungk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkondisi_warungk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_warungk">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_warungk))
                                                <br>
                                                {{ $rt_sare->Jarak_warungk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_warungk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_warungk">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_warungk))
                                                <br>
                                                {{ $rt_sare->kemudahan_warungk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_warungk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">TOKO / WARUNG KELONTONG YANG MENJUAL BAHAN
                                        PANGAN
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_warungp">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_warungp))
                                                <br>
                                                {{ $rt_sare->jumlah_warungp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlah_warungp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_warungp">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_warungp))
                                                <br>
                                                {{ $rt_sare->kondisi_warungp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_warungp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_warungp">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_warungp))
                                                <br>
                                                {{ $rt_sare->Jarak_warungp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_warungp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_warungp">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_warungp))
                                                <br>
                                                {{ $rt_sare->kemudahan_warungp }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_warungp')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">RESTORAN / RUMAH MAKAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_restoran">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_restoran))
                                                <br>
                                                {{ $rt_sare->jumlah_restoran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valjumlah_restoran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_restoran">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_restoran))
                                                <br>
                                                {{ $rt_sare->kondisi_restoran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_restoran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_restoran">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_restoran))
                                                <br>
                                                {{ $rt_sare->Jarak_restoran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_restoran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_restoran">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_restoran))
                                                <br>
                                                {{ $rt_sare->kemudahan_restoran }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_restoran')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">WARUNG / KEDAI MAKANAN MINUMAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_kedaim">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_kedaim))
                                                <br>
                                                {{ $rt_sare->jumlah_kedaim }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_kedaim')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_kedaim">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_kedaim))
                                                <br>
                                                {{ $rt_sare->kondisi_kedaim }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_kedaim')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_kedaim">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_kedaim))
                                                <br>
                                                {{ $rt_sare->Jarak_kedaim }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_kedaim')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_kedaim">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_kedaim))
                                                <br>
                                                {{ $rt_sare->kemudahan_kedaim }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_kedaim')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">HOTEL
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_hotel">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_hotel))
                                                <br>
                                                {{ $rt_sare->jumlah_hotel }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_hotel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_hotel">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_hotel))
                                                <br>
                                                {{ $rt_sare->kondisi_hotel }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_hotel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_hotel">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_hotel))
                                                <br>
                                                {{ $rt_sare->Jarak_hotel }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_hotel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_hotel">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_hotel))
                                                <br>
                                                {{ $rt_sare->kemudahan_hotel }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_hotel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PENGINAPAN : HOSTEL/MOTEL/LOSMEN/WISMA

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_hostel">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_hostel))
                                                <br>
                                                {{ $rt_sare->jumlah_hostel }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_hostel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_hostel">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_hostel))
                                                <br>
                                                {{ $rt_sare->kondisi_hostel }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_hostel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_hostel">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_hostel))
                                                <br>
                                                {{ $rt_sare->Jarak_hostel }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_hostel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_hostel">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_hostel))
                                                <br>
                                                {{ $rt_sare->kemudahan_hostel }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_hostel')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BENGKEL MOBIL/MOTOR

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bengkelm">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bengkelm))
                                                <br>
                                                {{ $rt_sare->jumlah_bengkelm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bengkelm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bengkelm">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bengkelm))
                                                <br>
                                                {{ $rt_sare->kondisi_bengkelm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bengkelm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bengkelm">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bengkelm))
                                                <br>
                                                {{ $rt_sare->Jarak_bengkelm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bengkelm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bengkelm">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bengkelm))
                                                <br>
                                                {{ $rt_sare->kemudahan_bengkelm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bengkelm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SALON KECANTIKAN

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_salonk">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_salonk))
                                                <br>
                                                {{ $rt_sare->jumlah_salonk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_salonk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_salonk">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_salonk))
                                                <br>
                                                {{ $rt_sare->kondisi_salonk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkondisi_salonk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_salonk">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_salonk))
                                                <br>
                                                {{ $rt_sare->Jarak_salonk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_salonk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_salonk">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_salonk))
                                                <br>
                                                {{ $rt_sare->kemudahan_salonk }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_salonk')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN TIKET / TRAVEL / BIRO PERJALANAN


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_agent">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_agent))
                                                <br>
                                                {{ $rt_sare->jumlah_agent }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_agent')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_agent">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_agent))
                                                <br>
                                                {{ $rt_sare->kondisi_agent }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_agent')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_agent">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_agent))
                                                <br>
                                                {{ $rt_sare->Jarak_agent }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_agent')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_agent">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_agent))
                                                <br>
                                                {{ $rt_sare->kemudahan_agent }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_agent')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK BRI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbri">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankbri))
                                                <br>
                                                {{ $rt_sare->jumlah_bankbri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankbri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbri">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankbri))
                                                <br>
                                                {{ $rt_sare->kondisi_bankbri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankbri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbri">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankbri))
                                                <br>
                                                {{ $rt_sare->Jarak_bankbri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankbri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbri">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankbri))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankbri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bankbri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN BRI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_briag">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_briag))
                                                <br>
                                                {{ $rt_sare->jumlah_briag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_briag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_briag">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_briag))
                                                <br>
                                                {{ $rt_sare->kondisi_briag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_briag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_briag">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_briag))
                                                <br>
                                                {{ $rt_sare->Jarak_briag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_briag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_briag">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_briag))
                                                <br>
                                                {{ $rt_sare->kemudahan_briag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_briag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK BNI
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbni">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankbni))
                                                <br>
                                                {{ $rt_sare->jumlah_bankbni }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankbni')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbni">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankbni))
                                                <br>
                                                {{ $rt_sare->kondisi_bankbni }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankbni')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbni">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankbni))
                                                <br>
                                                {{ $rt_sare->Jarak_bankbni }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankbni')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbni">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankbni))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankbni }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bankbni')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN BNI <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bniag">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bniag))
                                                <br>
                                                {{ $rt_sare->jumlah_bniag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bniag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bniag">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bniag))
                                                <br>
                                                {{ $rt_sare->kondisi_bniag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bniag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bniag">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bniag))
                                                <br>
                                                {{ $rt_sare->Jarak_bniag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bniag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bniag">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bniag))
                                                <br>
                                                {{ $rt_sare->kemudahan_bniag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bniag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK MANDIRI

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankmandiri">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankmandiri))
                                                <br>
                                                {{ $rt_sare->jumlah_bankmandiri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankmandiri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankmandiri">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankmandiri))
                                                <br>
                                                {{ $rt_sare->kondisi_bankmandiri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankmandiri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankmandiri">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankmandiri))
                                                <br>
                                                {{ $rt_sare->Jarak_bankmandiri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankmandiri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankmandiri">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankmandiri))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankmandiri }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bankmandiri')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN MANDIRI


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_mandiriag">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_mandiriag))
                                                <br>
                                                {{ $rt_sare->jumlah_mandiriag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_mandiriag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_mandiriag">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_mandiriag))
                                                <br>
                                                {{ $rt_sare->kondisi_mandiriag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_mandiriag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_mandiriag">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_mandiriag))
                                                <br>
                                                {{ $rt_sare->Jarak_mandiriag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_mandiriag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_mandiriag">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_mandiriag))
                                                <br>
                                                {{ $rt_sare->kemudahan_mandiriag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_mandiriag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK BPD

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbpd">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankbpd))
                                                <br>
                                                {{ $rt_sare->jumlah_bankbpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankbpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbpd">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankbpd))
                                                <br>
                                                {{ $rt_sare->kondisi_bankbpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankbpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbpd">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankbpd))
                                                <br>
                                                {{ $rt_sare->Jarak_bankbpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankbpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbpd">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankbpd))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankbpd }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bankbpd')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">AGEN BPD


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bpdag">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bpdag))
                                                <br>
                                                {{ $rt_sare->jumlah_bpdag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bpdag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bpdag">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bpdag))
                                                <br>
                                                {{ $rt_sare->kondisi_bpdag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bpdag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bpdag">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bpdag))
                                                <br>
                                                {{ $rt_sare->Jarak_bpdag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bpdag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bpdag">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bpdag))
                                                <br>
                                                {{ $rt_sare->kemudahan_bpdag }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bpdag')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK UMUM PEMERINTAH LAINNYA


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankumum">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankumum))
                                                <br>
                                                {{ $rt_sare->jumlah_bankumum }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankumum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankumum">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankumum))
                                                <br>
                                                {{ $rt_sare->kondisi_bankumum }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankumum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankumum">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankumum))
                                                <br>
                                                {{ $rt_sare->Jarak_bankumum }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankumum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankumum">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankumum))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankumum }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bankumum')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK BCA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbca">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankbca))
                                                <br>
                                                {{ $rt_sare->jumlah_bankbca }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankbca')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbca">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankbca))
                                                <br>
                                                {{ $rt_sare->kondisi_bankbca }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkondisi_bankbca')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbca">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankbca))
                                                <br>
                                                {{ $rt_sare->Jarak_bankbca }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankbca')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbca">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankbca))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankbca }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valkemudahan_bankbca')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK CIMB / NIAGA / MAYBANK


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankcimb">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankcimb))
                                                <br>
                                                {{ $rt_sare->jumlah_bankcimb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankcimb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankcimb">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankcimb))
                                                <br>
                                                {{ $rt_sare->kondisi_bankcimb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankcimb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankcimb">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankcimb))
                                                <br>
                                                {{ $rt_sare->Jarak_bankcimb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankcimb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankcimb">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankcimb))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankcimb }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bankcimb')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK SINARMAS


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_banksinarm">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_banksinarm))
                                                <br>
                                                {{ $rt_sare->jumlah_banksinarm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_banksinarm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_banksinarm">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_banksinarm))
                                                <br>
                                                {{ $rt_sare->kondisi_banksinarm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_banksinarm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_banksinarm">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_banksinarm))
                                                <br>
                                                {{ $rt_sare->Jarak_banksinarm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_banksinarm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_banksinarm">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_banksinarm))
                                                <br>
                                                {{ $rt_sare->kemudahan_banksinarm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_banksinarm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK PERMATA


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankpermata">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankpermata))
                                                <br>
                                                {{ $rt_sare->jumlah_bankpermata }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankpermata')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankpermata">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankpermata))
                                                <br>
                                                {{ $rt_sare->kondisi_bankpermata }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankpermata')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankpermata">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankpermata))
                                                <br>
                                                {{ $rt_sare->Jarak_bankpermata }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankpermata')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankpermata">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankpermata))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankpermata }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkemudahan_bankpermata')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BANK SWASTA LAINNYA
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankswastalain">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankswastalain))
                                                <br>
                                                {{ $rt_sare->jumlah_bankswastalain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankswastalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankswastalain">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankswastalain))
                                                <br>
                                                {{ $rt_sare->kondisi_bankswastalain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankswastalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankswastalain">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankswastalain))
                                                <br>
                                                {{ $rt_sare->Jarak_bankswastalain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankswastalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankswastalain">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankswastalain))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankswastalain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valkemudahan_bankswastalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BPR (BANK PERKREDITAN RAKYAT)


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bankbpr">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankbpr))
                                                <br>
                                                {{ $rt_sare->jumlah_bankbpr }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bankbpr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bankbpr">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankbpr))
                                                <br>
                                                {{ $rt_sare->kondisi_bankbpr }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bankbpr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bankbpr">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankbpr))
                                                <br>
                                                {{ $rt_sare->Jarak_bankbpr }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bankbpr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bankbpr">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankbpr))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankbpr }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valkemudahan_bankbpr')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">BAITUL MAAL WA TAMWIL (BMT)

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_bmt">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_bankbmt))
                                                <br>
                                                {{ $rt_sare->jumlah_bankbmt }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_bmt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_bmt">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_bankbmt))
                                                <br>
                                                {{ $rt_sare->kondisi_bankbmt }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_bmt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_bmt">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_bankbmt))
                                                <br>
                                                {{ $rt_sare->Jarak_bankbmt }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_bmt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_bmt">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_bankbmt))
                                                <br>
                                                {{ $rt_sare->kemudahan_bankbmt }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valkemudahan_bmt')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">PEGADAIAN


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_pegadaian">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_pegadaian))
                                                <br>
                                                {{ $rt_sare->jumlah_pegadaian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_pegadaian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_pegadaian">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_pegadaian))
                                                <br>
                                                {{ $rt_sare->kondisi_pegadaian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_pegadaian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_pegadaian">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_pegadaian))
                                                <br>
                                                {{ $rt_sare->Jarak_pegadaian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_pegadaian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_pegadaian">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_pegadaian))
                                                <br>
                                                {{ $rt_sare->kemudahan_pegadaian }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valkemudahan_pegadaian')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ANJUNGAN TUNAI MANDIRI (ATM)
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_atm">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_atm))
                                                <br>
                                                {{ $rt_sare->jumlah_atm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_atm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_atm">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_atm))
                                                <br>
                                                {{ $rt_sare->kondisi_atm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_atm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_atm">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_atm))
                                                <br>
                                                {{ $rt_sare->Jarak_atm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_atm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_atm">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_atm))
                                                <br>
                                                {{ $rt_sare->kemudahan_atm }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valkemudahan_atm')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">SARANA EKONOMI LAIN


                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="valjumlah_saranalain">JUMLAH
                                            </label>
                                            @if (isset($rt_sare->jumlah_saranalain))
                                                <br>
                                                {{ $rt_sare->jumlah_saranalain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valjumlah_saranalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkondisi_saranalain">KONDISI
                                            </label>
                                            @if (isset($rt_sare->kondisi_saranalain))
                                                <br>
                                                {{ $rt_sare->kondisi_saranalain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif

                                            @error('valkondisi_saranalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valJarak_saranalain">JARAK TERDEKAT

                                            </label>
                                            @if (isset($rt_sare->Jarak_saranalain))
                                                <br>
                                                {{ $rt_sare->Jarak_saranalain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif
                                            @error('valJarak_saranalain')
                                                <div id="" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="valkemudahan_saranalain">KEMUDAHAN UNTUK MENCAPAI
                                            </label>
                                            @if (isset($rt_sare->kemudahan_saranalain))
                                                <br>
                                                {{ $rt_sare->kemudahan_saranalain }}
                                            @else
                                                <!-- Tindakan atau pesan jika kondisi_pekerjaan kosong -->
                                                Data tidak tersedia.
                                            @endif


                                            @error('valkemudahan_saranalain')
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
