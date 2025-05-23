<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_pernyataan_numpang_kk extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_numpang_kk';

    protected $fillable = [
        // Pemilik KK
        'nama_pemilik_kk',
        'nik_pemilik_kk',
        'no_kk',
        'pekerjaan_pemilik_kk',
        'alamat_pemilik_kk',

        // Penumpang KK
        'nama_penumpang_kk',
        'nik_penumpang_kk',
        'tempat_lahir_penumpang_kk',
        'tanggal_lahir_penumpang_kk', // Tanggal lahir terpisah dan bertipe date string
        'agama_penumpang_kk',
        'pekerjaan_penumpang_kk',

        // Status surat dan verifikasi
        'status_surat',
        'status_verif',

        // No WhatsApp pelapor / kontak
        'nowa',
    ];
}
