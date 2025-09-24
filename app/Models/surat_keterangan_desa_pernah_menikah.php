<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_keterangan_desa_pernah_menikah extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_keterangan_desa_pernah_menikah';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'kewarganegaraan',
        'status_perkawinan',
        'pekerjaan',
        'alamat',
        'rt',
        'rw',

        // umum
        'status_surat',
        'status_verif',
        'nowa',
    ];
}
