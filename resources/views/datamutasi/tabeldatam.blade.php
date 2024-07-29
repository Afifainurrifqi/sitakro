<div class="table-responsive">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
                <th>No</th>
                <th>No KK</th>
                <th>NIK</th>
                <th>Gelar awal</th>
                <th>Nama</th>
                <th>Gelar akhir</th>
                <th>Jenis kelamin</th>
                <th>Tempat lahir</th>
                <th>Tanggal_lahir</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Pekejaan</th>
                <th>Goldar</th>
                <th>Status</th>
                <th>Tanggal perkawinan</th>
                <th>Hubungan</th>
                <th>Ayah</th>
                <th>Ibu</th>
                <th>alamat</th>
                <th>RT</th>
                <th>RW</th>
                <th>Statu kependudukan</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($datapenduduk as $row)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $row->detailkk->kk->nokk }}</td>
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->gelarawal }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->gelarakhir }}</td>
                    <td>
                        @if ($row->jenis_kelamin == 1)
                            Laki-Laki
                        @else
                            Perempuan
                        @endif
                    </td>
                    <td>{{ $row->tempat_lahir }}</td>
                    <td>{{ $row->tanggal_lahir }}</td>
                    <td>{{ $row->agama->nama }}</td>
                    <td>{{ $row->pendidikan->nama }}</td>
                    <td>{{ $row->pekerjaan->nama }}</td>
                    <td>{{ $row->goldar->nama }}</td>
                    <td>{{ $row->status->nama }}</td>
                    <td>@if($row->tanggal_perkawinan == '1970-01-01')
                        Belum Kawin
                    @else
                        {{ $row->tanggal_perkawinan }}
                    @endif</td>
                    <td>{{ $row->hubungan }}</td>
                    <td>{{ $row->ayah }}</td>
                    <td>{{ $row->ibu }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->rt }}</td>
                    <td>{{ $row->rw }}</td>
                    <td>{{ $row->datak }}</td>
                </tr>


            @endforeach



        </tbody>
    </table>
    </div>
