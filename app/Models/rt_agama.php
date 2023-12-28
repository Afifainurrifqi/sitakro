<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_agama extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_agama';
    protected $fillable = [
        'jumlahwarga_jamkes',
        'jumlahwarga_jamketerangan',
        'jumlahtempat_masjid',
        'jumlahtempat_musholla        ',
        'jumlahtempat_kristen',
        'jumlahtempat_katolik',
        'jumlahtempat_kapel',
        'jumlahtempat_pura',
        'jumlahtempat_wihara',
        'jumlahtempat_kelenteng',
        'jumlahtempat_lainnya',
        'cagar_bud1',
        'cagar_bud2',
        'cagar_bud3',
        'sukuasing_keluarga',
        'sukuasing_jiwa',
        'ruangpublik_terbuka',
        'adat_kehamilan',
        'adat_kelahiran',
        'adat_pekerjaan',
        'adat_alam',
        'adat_perkawinan',
        'adat_kehidupanwarga',
        'adat_kematian',
       
        
    ];
}
