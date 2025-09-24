<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class surat_keterangan_kematian_desa extends Eloquent
{
     protected $connection = 'mongodb';
    protected $collection = 'surat_keterangan_kematian_desa';

    protected $fillable = [
        // Data almarhum
        'nama_lengkap',
        'jenis_kelamin',
        'kewarganegaraan',
        'status',
        'pekerjaan',
        'alamat',

        // Keterangan meninggal
        'hari',
        'tanggal',
        'penyebab',

        // umum
        'status_surat',
        'status_verif',
        'nowa',
    ];
}
