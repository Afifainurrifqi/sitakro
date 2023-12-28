<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rtlembaga_keagamaan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_lembaga_agama';
    protected $fillable = [
        'nama',
        'jumlah_peng',
        'jumlah_ang',
        'fasilitas',
        


    ];
}
