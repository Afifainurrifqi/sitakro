<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class lembaga_masyarakat extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rtlembaga_masyarakat';
    protected $fillable = [
        'nama',
        'jumlah_kel',
        'jumlah_peng',
        'jumlah_ang',
        'fasilitas',


    ];
}

