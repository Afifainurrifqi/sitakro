<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_permohonan_pembukaan_rekening extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_permohonan_pembukaan_rekening';

    protected $fillable = [
        // Kepada
        'kepada_nama_instansi',
        'kepada_alamat',

        // Yang Bertanda Tangan
        'ybt_nama',
        'ybt_jabatan',
        'ybt_alamat',

        // Ketentuan
        'rekening_atas_nama',
        'rekening_alamat',

        // Yang Berwenang (dinamis)
        'berwenang_jumlah',
        'berwenang_nama',
        'berwenang_jabatan',

        // umum
        'status_surat',
        'status_verif',
        'nowa',
    ];

    protected $casts = [
        'berwenang_jumlah' => 'integer',
        'berwenang_nama'   => 'array',
        'berwenang_jabatan'=> 'array',
    ];
}
