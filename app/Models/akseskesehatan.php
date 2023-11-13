<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class akseskesehatan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'akseskesehatan';
    protected $fillable = [
        'jaraktempuh_rumahs',
        'waktutempuh_rumahs',
        'kemudahan_rumahs',
        'jaraktempuh_rumahb',
        'waktutempuh_rumahb',
        'kemudahan_rumahb',
        'jaraktempuh_poliklinik',
        'waktutempuh_poliklinik',
        'kemudahan_poliklinik',
        'jaraktempuh_puskesmas',
        'waktutempuh_puskesmas',
        'kemudahan_puskesmas',
        'jaraktempuh_poskedes',
        'waktutempuh_poskedes',
        'kemudahan_poskedes',
        'jaraktempuh_posyandu',
        'waktutempuh_posyandu',
        'kemudahan_posyandu',
        'jaraktempuh_apotik',
        'waktutempuh_apotik',
        'kemudahan_apotik',
        'jaraktempuh_toko_obat',
        'waktutempuh_toko_obat',
        'kemudahan_toko_obat',
    ];
}
