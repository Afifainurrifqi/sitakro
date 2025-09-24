<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_keterangan_harga_kepemilikan_tanah extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_keterangan_harga_kepemilikan_tanah';

  protected $fillable = [
        // Informasi Lokasi Tanah
        'rt',
        'rw',
        'no_persil',
        'no_sppt',
        'no_sertifikat',
        'luas',
        'atas_nama_hak_milik',

        // Informasi Batas-batas Tanah
        'batas_utara',
        'batas_timur',
        'batas_selatan',
        'batas_barat',

        // Informasi Kepemilikan dan Harga
        'nama',
        'alamat',
        'pekerjaan',
        'tanah_atas_nama',
        'harga_tanah',
        'harga_bangunan',
        'harga_jumlah',

        // Umum
        'status_surat',
        'status_verif',
        'nowa',
    ];
}
