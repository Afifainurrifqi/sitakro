<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_lingkungan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_lingkungan';
    protected $fillable = [
        'lingkungan_lsi',
        'lingkungan_slno',
        'lingkungan_k',
        'lingkungan_hl',
        'lingkungan_t',
        'lingkungan_kte',
        'lingkungan_lgt',
        'lingkungan_lpp',
        'lingkungan_ah',
        'lingkungan_lpns',
        'lingkungan_lpertambangan',
        'lingkungan_lperumahan',
        'lingkungan_lperkantoran',
        'lingkungan_lindustri',
        'lingkungan_fu',
        'lingkungan_ll',
        'lingkungan_nsym',
        'lingkungan_ndws',
        'lingkungan_jma',
        'lingkungan_je',
        'lingkungan_ksb',
        'lingkungan_ks',
        'lingkungan_ki',
        'lingkungan_kd',
        'lingkungan_ke',
        'lingkungan_pair',
        'lingkungan_ptanah',
        'lingkungan_pudara',
        'lingkungan_pdusl',
        'lingkungan_kmml',
        'lingkungan_klpg',
       
    ];
}
