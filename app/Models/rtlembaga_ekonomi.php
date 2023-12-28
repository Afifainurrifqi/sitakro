<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rtlembaga_ekonomi extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_lembaga_ekonomi';
    protected $fillable = [
        'agentik_jp',
        'agentik_jtk',
        'jtri_sentra',
        'jtri_lingkungan',
        'jtri_kampung',
        'diskotik_kpd',
        'diskotik_jtl',
        'lpg_kpapm',
        'lpg_kpapg',        
        'koperasi_jumlah',
        'koperasi_kudproduksi',
        'koperasi_kudkredit',
        'koperasi_kudkegiatan',
        'koperasi_kudindustrik',
        'koperasi_kudksp',
        'koperasi_kudksu',
        'koperasi_kudlainnya',
        'kos_kud',
        'kos_bumdes',
        'kos_selain',   


    ];
}
