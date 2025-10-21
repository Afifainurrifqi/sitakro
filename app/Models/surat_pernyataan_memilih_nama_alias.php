<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_pernyataan_memilih_nama_alias extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_memilih_nama_alias';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'nama_pemilih',
        'no_akta_kelahiran',
        'nama_orang_tua',
        'alias',
        'data_alias_dihapus',
        'berdasarkan',

        'status_surat',
        'status_verif',
        'nowa',

        // --- nomor surat ---
        'nomor_surat',  // string "410 / 001 / 409.41.2 / 2025"
        'nomor_urut',   // int
        'tahun_nomor',  // int
    ];

    protected $casts = [
        'nomor_urut'  => 'integer',
        'tahun_nomor' => 'integer',
    ];
}
