<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_mitigasib extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_mitigasib';
    protected $fillable = [
        
        'mitigasi_sp',
        'mitigasi_spd',
        'mitigasi_pk',
        'mitigasi_rrj',
        'mitigasi_ppn',
        
        
    ];
}
