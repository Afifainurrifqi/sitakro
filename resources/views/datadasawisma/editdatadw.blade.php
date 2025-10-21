@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('title', 'Edit Dasawisma')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">

                        <h1 class="card-title">Edit Dasawisma</h1>
                        <br><br>

                        @if (session('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                        @endif

                        <form action="{{ route('dasawisma.update', $nik) }}" method="POST"
                              id="form-tambah-dasawisma" autocomplete="off">
                            @csrf

                            {{-- NIK (readonly di edit) --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="ValNIK">
                                    NIK <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input value="{{ old('ValNIK', $valNIK ?? $nik) }}" type="text"
                                               class="form-control @error('ValNIK') is-invalid @enderror"
                                               id="ValNIK" name="ValNIK" placeholder="NIK..."
                                               inputmode="numeric" maxlength="20" pattern="\d*" readonly>
                                        <div class="input-group-append d-none">
                                            <button class="btn btn-secondary" type="button" id="btnCariNik">
                                                <span id="btnCariNikText">Cari</span>
                                                <span id="btnCariNikSpinner" class="spinner-border spinner-border-sm d-none"
                                                      role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                    @error('ValNIK') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <div id="nik-alert" class="mt-2"></div>
                                </div>
                            </div>

                            {{-- Nama (auto isi) --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nama">Nama <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input value="{{ old('nama', $valNama ?? '') }}" type="text"
                                           class="form-control @error('nama') is-invalid @enderror"
                                           id="nama" name="nama" placeholder="nama..." readonly>
                                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Alamat / RT / RW --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="alamat">Alamat</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                           value="{{ old('alamat', $valAlamat ?? '') }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="rt">RT</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" id="rt" name="rt"
                                           value="{{ old('rt', $valRT ?? '') }}" readonly>
                                </div>
                                <label class="col-lg-2 col-form-label" for="rw">RW</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" id="rw" name="rw"
                                           value="{{ old('rw', $valRW ?? '') }}" readonly>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input value="{{ old('email', $valEmail ?? '') }}" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" placeholder="Email...">
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Password (wajib sesuai validasi update kamu) --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="password baru...">
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Role (hidden) --}}
                            <div class="d-none">
                                <select id="role" name="role">
                                    <option value="dasawisma"
                                        {{ old('role', $valRole ?? 'dasawisma') === 'dasawisma' ? 'selected' : '' }}>
                                        dasawisma
                                    </option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#confirmModal" id="btnOpenConfirm">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal konfirmasi --}}
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Update</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">Simpan perubahan data?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmSave">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
(function() {
  // Di edit, tombol cari memang disembunyikan/disabled
  const confirmSaveBtn = document.getElementById('confirmSave');
  if (confirmSaveBtn) {
    confirmSaveBtn.addEventListener('click', function() {
      document.getElementById('form-tambah-dasawisma').submit();
    });
  }
})();
</script>
@endsection
