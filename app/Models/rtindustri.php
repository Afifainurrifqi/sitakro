<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rtindustri extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_industri';
    protected $fillable = [
        
        'jumlahindustrik_kulit',	
        'jumlahindustris_kulit',	
        'jumlahmanajemen_kulit',	
        'jumlahpekerja_kulit',
        'jumlahindustrik_kayu',	
        'jumlahindustris_kayu',	
        'jumlahmanajemen_kayu',	
        'jumlahpekerja_kayu',
        'jumlahindustrik_logam',	
        'jumlahindustris_logam',	
        'jumlahmanajemen_logam',	
        'jumlahpekerja_logam',
        'jumlahindustrik_logamb',	
        'jumlahindustris_logamb',	
        'jumlahmanajemen_logamb',	
        'jumlahpekerja_logamb',
        'jumlahindustrik_kain',	
        'jumlahindustris_kain',	
        'jumlahmanajemen_kain',	
        'jumlahpekerja_kain',
        'jumlahindustrik_keramik',	
        'jumlahindustris_keramik',	
        'jumlahmanajemen_keramik',	
        'jumlahpekerja_keramik',
        'jumlahindustrik_genteng',	
        'jumlahindustris_genteng',	
        'jumlahmanajemen_genteng',	
        'jumlahpekerja_genteng',
        'jumlahindustrik_anyaman',	
        'jumlahindustris_anyaman',	
        'jumlahmanajemen_anyaman',	
        'jumlahpekerja_anyaman',
        'jumlahindustrik_makanan',	
        'jumlahindustris_makanan',	
        'jumlahmanajemen_makanan',	
        'jumlahpekerja_makanan',
        'jumlahindustrik_lainnya',	
        'jumlahindustris_lainnya',	
        'jumlahmanajemen_lainnya',	
        'jumlahpekerja_lainnya',
        
        
    ];
}
