<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SuratPengantarSkck extends  Eloquent
{
  protected $connection = 'mongodb';
    protected $collection = 'surat_pengantar_skck';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'status',
        'nik',
        'agama',
        'pendidikan',
        'pekerjaan',
        'alamat',
        'keperuntukan',
        'status_surat',
        'status_verif',
        'nowa',
    ];
}
