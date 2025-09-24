<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_pernyataan_kesanggupan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_kesanggupan';

    protected $fillable = [
        // Yang bertanda tangan
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'tujuan_kegiatan',

        // Pelaksanaan
        'hari',
        'tanggal',
        'waktu',
        'tempat',

        // umum
        'status_surat',
        'status_verif',
        'nowa',
    ];

    /**
     * Penting: pastikan field tanggal jadi Carbon saat diambil.
     * Untuk Jenssegers MongoDB, 'date' / 'datetime' akan mengubah
     * MongoDB\BSON\UTCDateTime -> Carbon.
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal'       => 'date',
    ];
}
