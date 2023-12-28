<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_keamanan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_kejahatan';
    protected $fillable = [
    'penyebabu_antarkelompokmas',
    'jk_antarkelompokmas',
    'jkl_antarkelompokmas',
    'jt_antarkelompokmas',
    'pen_antarkelompokmas',
    'pp_antarkelompokmas',
    'penyebabu_antardesa',
    'jk_antardesa',
    'jkl_antardesa',
    'jt_antardesa',
    'pen_antardesa',
    'pp_antardesa',
    'penyebabu_aparatmk',
    'jk_aparatmk',
    'jkl_aparatmk',
    'jt_aparatmk',
    'pen_aparatmk',
    'pp_aparatmk',
    'penyebabu_aparatmp',
    'jk_aparatmp',
    'jkl_aparatmp',
    'jt_aparatmp',
    'pen_aparatmp',
    'pp_aparatmp',        
    'penyebabu_aparatk',
    'jk_aparatk',
    'jkl_aparatk',
    'jt_aparatk',
    'pen_aparatk',
    'pp_aparatk',
    'penyebabu_aparatp',
    'jk_aparatp',
    'jkl_aparatp',
    'jt_aparatp',
    'pen_aparatp',
    'pp_aparatp',
    'penyebabu_pelajar',
    'jk_pelajar',
    'jkl_pelajar',
    'jt_pelajar',
    'pen_pelajar',
    'pp_pelajar',    
    'penyebabu_suku',
    'jk_suku',
    'jkl_suku',
    'jt_suku',
    'pen_suku',
    'pp_suku',
    'penyebabu_lainnya',
    'jk_lainnya',
    'jkl_lainnya',
    'jt_lainnya',
    'pen_lainnya',
    'pp_lainnya',    
];

}


