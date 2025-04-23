@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Surat Masuk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('suratpernyataantidakbisamelampirkanktpkematian.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Pelapor <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="nama_pelapor" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">NIK Pelapor <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="nik_pelapor" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Tempat Lahir Pelapor <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="tempat_lahir_pelapor" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Tanggal Lahir Pelapor <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="date" name="tanggal_lahir_pelapor" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jenis_kelamin_pelapor">Jenis Kelamin Pelapor <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select name="jenis_kelamin_pelapor" id="jenis_kelamin_pelapor" class="form-control" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Pekerjaan Pelapor <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="pekerjaan_pelapor" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Alamat Pelapor <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="alamat_pelapor" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Alasan Tidak Bisa Melampirkan KTP <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="alasan" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">NIK Jenazah <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="nik_jenazah" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Jenazah <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="nama_jenazah" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Tanggal Lahir Jenazah <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="date" name="tanggal_lahir_jenazah" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jenis_kelamin_jenazah">Jenis Kelamin Jenazah <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select name="jenis_kelamin_jenazah" id="jenis_kelamin_jenazah" class="form-control" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Alamat Jenazah <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="alamat_jenazah" class="form-control" required>
                            </div>
                        </div>

                        <!-- NO WA -->
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">No WhatsApp <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" name="nowa" class="form-control" required>
                            </div>
                        </div>

                        <!-- STATUS SURAT -->
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="status_surat">Status Surat <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select name="status_surat" id="status_surat" class="form-control" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Di cek">Di cek</option>
                                    <option value="Di terima">Di terima</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>

                        <!-- STATUS VERIFIKASI -->
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="status_verif">Status Verifikasi <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select name="status_verif" id="status_verif" class="form-control" required>
                                    <option value="Belum Verifikasi">Belum Verifikasi</option>
                                    <option value="Terverifikasi">Terverifikasi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-10 offset-lg-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('surat/suratmasuk') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
