@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-lg-12 mx-auto">

      <div class="card shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit Pernyataan Anak Seorang Nama Ibu</h5>
          <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">Kembali</a>
        </div>

        <div class="card-body">
          <form action="{{ route('surat.anakseorangibu.update', $surat->_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control"
                     value="{{ old('nama', $surat->nama) }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control"
                     value="{{ old('nik', $surat->nik) }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat',$surat->alamat) }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Nama Anak Kandung</label>
              <input type="text" name="nama_anak" class="form-control"
                     value="{{ old('nama_anak', $surat->nama_anak) }}" required>
            </div>

            <div class="row g-2">
              <div class="col-md-6 mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control"
                       value="{{ old('tempat_lahir', $surat->tempat_lahir) }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control"
                       value="{{ old('tanggal_lahir', optional($surat->tanggal_lahir)->format('Y-m-d')) }}" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">No WhatsApp</label>
              <input type="text" name="nowa" class="form-control"
                     value="{{ old('nowa',$surat->nowa) }}" required>
            </div>

            <div class="row g-2">
              <div class="col-md-6 mb-3">
                <label class="form-label">Status Surat</label>
                <select name="status_surat" class="form-control">
                  @foreach (['Pending','Di cek','Di terima','Ditolak'] as $st)
                    <option value="{{ $st }}" {{ old('status_surat',$surat->status_surat)===$st?'selected':'' }}>{{ $st }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Status Verifikasi</label>
                <select name="status_verif" class="form-control">
                  @foreach (['Belum Verifikasi','Terverifikasi'] as $sv)
                    <option value="{{ $sv }}" {{ old('status_verif',$surat->status_verif)===$sv?'selected':'' }}>{{ $sv }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="text-end">
              <button class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
