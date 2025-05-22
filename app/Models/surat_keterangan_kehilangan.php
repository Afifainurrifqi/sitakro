<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_keterangan_kehilangan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_keterangan_kehilangan';

    protected $fillable = [
        'nowa',
        'status_surat',
        'status_verif',
        'nama_pelapor',
        'tempat_lahir_pelapor',
        'tanggal_lahir_pelapor',
        'jenis_kelamin_pelapor',
        'nik_pelapor',
        'agama_pelapor',
        'status_pelapor',
        'pekerjaan_pelapor',
        'alamat_pelapor',
        'jenis_kehilangan',
        'atas_nama',
        'berisi',
        'tanggal_kehilangan',
        'hilang_saat',
    ];
}
