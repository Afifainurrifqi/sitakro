<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class suratketerangantidakmampu extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_keteragan_tidakmampu';

    protected $fillable = [
        'nowa',
        'status_surat',
        'status_verif',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'alamat_rumah',
        'keterangan_fungsi_surat',
    ];
}
