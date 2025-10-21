<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_ktp';

    protected $fillable = [
        'nowa',
        'status_surat',
        'status_verif',
        'nama_pelapor',
        'nik_pelapor',
        'tempat_lahir_pelapor',
        'tanggal_lahir_pelapor',
        'agama_pelapor',
        'jenis_kelamin_pelapor',
        'pekerjaan_pelapor',
        'alamat_pelapor',
        'alasan',
        'nik_jenazah',
        'nama_jenazah',
        'tanggal_lahir_jenazah',
        'jenis_kelamin_jenazah',
        'alamat_jenazah',

        // penomoran
        'nomor_surat', // "475 / 001 / 409.41.2 / 2025"
        'nomor_urut',  // 1,2,3...
        'tahun_nomor', // 2025
    ];

    protected $casts = [
        'tanggal_lahir_pelapor'  => 'datetime:Y-m-d',
        'tanggal_lahir_jenazah'  => 'datetime:Y-m-d',
        'nomor_urut'             => 'integer',
        'tahun_nomor'            => 'integer',
    ];
}
