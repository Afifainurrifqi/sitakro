<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class surat_pernyataan_belum_akta extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_belum_akta';

    protected $fillable = [
        // Yang bertandatangan
        'ybt_nama',
        'ybt_nik',
        'ybt_alamat',

        // Subjek yang dinyatakan
        'subjek_nama',
        'subjek_tempat_lahir',
        'subjek_tanggal_lahir',

        // Umum
        'status_surat',
        'status_verif',
        'nowa',
    ];

    protected $casts = [
        'subjek_tanggal_lahir' => 'date',
    ];
}
