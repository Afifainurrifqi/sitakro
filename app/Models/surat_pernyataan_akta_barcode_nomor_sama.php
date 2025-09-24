<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_pernyataan_akta_barcode_nomor_sama extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_akta_barcode_nomor_sama';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'nama_dalam_akta',
        'no_akta',
        'nomor',
        'nowa',
        'status_surat',
        'status_verif',
    ];
}
