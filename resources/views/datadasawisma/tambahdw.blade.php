@extends('layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Form Tambah dasawisma</h1>
                        <button type="button" class="btn mb-1 btn-warning"
                            onclick="window.location='{{ url('datapenduduk') }}'">Kembali
                        </button> <br><br><br>
                        <div class="form-validation">
                            <form class="form-validate" action="{{ route('dasawisma.update', ['nik' => $datapenduduk->nik]) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valNIK">NIK <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="hidden" name="nik" value="{{ $datapenduduk->nik }}">
                                    <div class="col-lg-6">
                                        {{ $datapenduduk->nik }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Nama <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        {{ $datapenduduk->nama }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="email">Email<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ $user->email ?? '' }}" type="text"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Email...">
                                        @error('email')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="password">Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ $user->password ?? '' }}" type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="password...">
                                        @error('password')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role">Role <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" readonly>
                                            <option value="dasawisma">dasawisma</option>
                                        </select>
                                        @error('role')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>  
                                {{-- <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valRW">Nama kelompok <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input value="{{ old('valRW') }}" type="text"
                                            class="form-control @error('valRW') is-invalid @enderror" id="valRW"
                                            name="valRW" placeholder="Nama kelompokmu...">
                                        @error('valRW')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>   --}}
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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