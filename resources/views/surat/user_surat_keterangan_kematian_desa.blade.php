@extends(Auth::user() && Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Form Surat Keterangan Kematian Desa</h4>

            <form action="{{ route('surat.kematian.store') }}" method="POST">
                @csrf

                <h5 class="mb-3">Data Almarhum</h5>
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" required value="Indonesia">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" id="status" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="2" required></textarea>
                </div>

                <h5 class="mb-3">Keterangan Meninggal</h5>
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <input type="text" name="hari" id="hari" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="penyebab" class="form-label">Disebabkan Karena</label>
                    <input type="text" name="penyebab" id="penyebab" class="form-control" required>
                </div>

                {{-- Hidden default --}}
                <input type="hidden" name="status_surat" value="Pending">
                <input type="hidden" name="status_verif" value="Belum Verifikasi">

                <div class="mb-3">
                    <label for="nowa" class="form-label">No WhatsApp</label>
                    <input type="text" name="nowa" id="nowa" class="form-control" required>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
