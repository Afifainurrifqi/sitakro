<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_pernyataan_beda_nama_buku_nikah extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_beda_nama_buku_nikah';

    protected $fillable = [
        'nama',
        'nik',
        'ttl_tempat',
        'ttl_tanggal',      // format: YYYY-MM-DD
        'pekerjaan',
        'alamat',
        'nama_sesuai',
        'sumber_data_nama',
        // umum
        'status_surat',     // Pending | Di cek | Di terima | Ditolak
        'status_verif',     // Belum Verifikasi | Terverifikasi
        'nowa',
    ];

    protected $casts = [
        'ttl_tanggal' => 'date:Y-m-d',
    ];
}
