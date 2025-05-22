<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SuratMasuk extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'suratmasuk';
    protected $fillable = [
        'nama_instansi',
        'keterangan',
        'file',
        'tanggal_masuk',
    ];
}
