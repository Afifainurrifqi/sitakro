<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_sptjm_kematian extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';                 // sesuaikan bila perlu
    protected $collection = 'surat_sptjm_kematian';    // nama koleksi MongoDB

    protected $fillable = [
        'nama',
        'nik',
        'ttl_tempat',
        'ttl_tanggal',
        'pekerjaan',
        'alamat',
        // menyatakan:
        'nama_jenazah',
        'nik_jenazah',
        'ttl_tempat_jenazah',
        'ttl_tanggal_jenazah',
        'jenis_kelamin',
        'anak_ke',
        'nama_ayah_kandung',
        'nama_ibu_kandung',
        // umum
        'nowa',
        'status_surat',
        'status_verif',
    ];

    protected $casts = [
        'ttl_tanggal'         => 'date',
        'ttl_tanggal_jenazah' => 'date',
        'anak_ke'             => 'integer',
    ];
}
