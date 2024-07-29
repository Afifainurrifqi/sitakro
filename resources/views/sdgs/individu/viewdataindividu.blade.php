 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h1 class="card-title">DATA INDIVIDU {{ $datap->nama }}</h1> --}}
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ url('/sdgs/individu/dataindividu') }}'">Kembali
                        </button>
                        <br><br><br>
                        <div class="form-validation">

                            <form class="form-valide" action="{{ route('individu.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">KK <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->detailkk->kk->nokk}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">NIK <span
                                            class="text-danger">*</span>
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
                                    <label class="col-lg-4 col-form-label" for="valJeniskelamin">Jenis kelamin <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select name="valJeniskelamin"
                                            class="form-control-plaintext @error('valJeniskelamin') is-invalid @enderror"
                                            id="valJeniskelamin" required disabled>
                                            <option value="1" {{ $datap->jenis_kelamin == '1' ? 'selected' : '' }}>
                                                Laki-Laki</option>
                                            <option value="0" {{ $datap->jenis_kelamin == '0' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valconfirm-Tempatlahir">Tempat Lahir <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        {{ $datap->tempat_lahir }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valTanggallahir">Tanggal Lahir <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" vc
                                            class="form-control-plaintext @error('valTanggallahir') is-invalid @enderror"
                                            id="valTanggallahir" name="valTanggallahir" value="{{ $datap->tanggal_lahir }}"
                                            required disabled>
                                        @error('valTanggallahir')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">Usia <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        @php
                                            $usia = Carbon\Carbon::parse($datap->tanggal_lahir)->age;
                                        @endphp

                                        {{ $usia }} tahun.
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valStatus">Status <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control-plaintext @error('valStatus') is-invalid @enderror"
                                            id="valStatus" name="valStatus" required disabled>
                                            <option value="0" disabled selected>--Pilih Status--</option>
                                            @foreach ($status as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $datap->status_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
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
                                    <label class="col-lg-4 col-form-label" for="valUsiapertamamenikahr"> USIA SAAT PERTAMA
                                        KALI MENIKAH <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">

                                        @isset($datai->usia_saat_pertama_kali_menikah)
                                            {{ $datai->usia_saat_pertama_kali_menikah }} Tahun
                                        @else
                                            Data tidak tersedia.
                                        @endisset


                                        @error('valUsiapertamamenikah')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valAgama">Agama <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control-plaintext @error('valAgama') is-invalid @enderror"
                                            id="valAgama" name="valAgama" required disabled>
                                            <option value="0" disabled selected>--Pilih Agama--</option>
                                            @foreach ($agama as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $datap->agama_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
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
                                    <label class="col-lg-4 col-form-label" for="valNIK">Suku bangsa <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @isset($datai->suku_bangsa)
                                            {{ $datai->suku_bangsa }}
                                        @else
                                            Data tidak tersedia.
                                        @endisset


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valWarganegara">Warga Nergara <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @isset($datai->warga_negarawarga_negara)
                                            {{ $datai->warga_negarawarga_negara }}
                                        @else
                                            Data tidak tersedia.
                                        @endisset


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">No HP <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @isset($datai->nohp)
                                            {{ $datai->nohp }}
                                        @else
                                            Data tidak tersedia.
                                        @endisset
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">No WA <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @isset($datai->nowa)
                                            {{ $datai->nowa }}
                                        @else
                                            Data tidak tersedia.
                                        @endisset
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">Email <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @isset($datai->email)
                                            {{ $datai->email }}
                                        @else
                                            Data tidak tersedia.
                                        @endisset
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">Facebook <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @isset($datai->facebook)
                                            <a href="{{ $datai->facebook }}">Facebook</a>
                                        @else
                                            Data tidak tersedia.
                                        @endisset
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">Twitter <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @isset($datai->twitter)
                                            <a href="{{ $datai->twitter }}">Twitter</a>
                                        @else
                                            Data tidak tersedia.
                                        @endisset
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">Instagram <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @isset($datai->instagram)
                                            <a href="{{ $datai->instagram }}">Instagram</a>
                                        @else
                                            Data tidak tersedia.
                                        @endisset
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
