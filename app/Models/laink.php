<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class laink extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'kk_lain';
    protected $fillable = [
        'pengtransportsebelum',
        'pengtransportsesudah',
        'blt',
        'pkh',
        'bst',
        'bantuan_presiden',
        'bantuan_umkm',
        'bantuan_pekerja',
        'bantuan_anak',
        'lainnya',
        'rata_rata',
    ];
}
