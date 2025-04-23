<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'jenis_kelamin_pelapor',
        'pekerjaan_pelapor',
        'alamat_pelapor',
        'alasan',
        'nik_jenazah',
        'nama_jenazah',
        'tanggal_lahir_jenazah',
        'jenis_kelamin_jenazah',
        'alamat_jenazah',

    ];
}
