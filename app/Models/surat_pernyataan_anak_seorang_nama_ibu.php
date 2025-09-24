<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_pernyataan_anak_seorang_nama_ibu extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_anak_seorang_nama_ibu';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'nama_anak',
        'tempat_lahir',
        'tanggal_lahir',

        // umum
        'status_surat',
        'status_verif',
        'nowa',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
