<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_keterangan_ahli_waris extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_keterangan_ahli_waris';

    protected $fillable = [
        // Yang bertanda tangan
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pekerjaan',
        'no_ktp',
        'status',
        'alamat',

        // Istri
        'nama_istri',
        'tempat_lahir_istri',
        'tanggal_lahir_istri',
        'agama_istri',
        'pekerjaan_istri',
        'status_istri',
        'no_ktp_istri',
        'alamat_istri',

        // Anak & Saksi (dinamis)
        'jumlah_anak',
        'nama_anak',                   // array of strings
        'hubungan_dengan_ahli_waris',
        'jumlah_saksi',
        'nama_saksi',                  // array of strings

        // Umum
        'status_surat',
        'status_verif',
        'nowa',
    ];

    protected $casts = [
        'tanggal_lahir'        => 'date',
        'tanggal_lahir_istri'  => 'date',
        'jumlah_anak'          => 'integer',
        'jumlah_saksi'         => 'integer',
        'nama_anak'            => 'array',
        'nama_saksi'           => 'array',
    ];
}
