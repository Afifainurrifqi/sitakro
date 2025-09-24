<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'nama_orang_tua',   // bisa ayah/ibu
        'alias',
        'data_alias_dihapus',
        'berdasarkan',

        // Status surat dan verifikasi
        'status_surat',
        'status_verif',

        // No WhatsApp pelapor / kontak
        'nowa',
    ];
}
