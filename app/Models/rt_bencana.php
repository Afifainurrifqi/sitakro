<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_bencana extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_bencana';
    protected $fillable = [
        
        'k_longsor',	
        'f_longsor',	
        'kj_longsor',	
        'jp_longsor',	
        'wt_longsor',
        'k_banjir',	
        'f_banjir',	
        'kj_banjir',	
        'jp_banjir',	
        'wt_banjir',
        'k_bandang',	
        'f_bandang',	
        'kj_bandang',	
        'jp_bandang',	
        'wt_bandang',
        'k_gempa',	
        'f_gempa',	
        'kj_gempa',	
        'jp_gempa',	
        'wt_gempa',
        'k_tsunami',	
        'f_tsunami',	
        'kj_tsunami',	
        'jp_tsunami',	
        'wt_tsunami',
        'k_puyuh',	
        'f_puyuh',	
        'kj_puyuh',	
        'jp_puyuh',	
        'wt_puyuh',
        'k_gunungm',	
        'f_gunungm',	
        'kj_gunungm',	
        'jp_gunungm',	
        'wt_gunungm',
        'k_hutank',	
        'f_hutank',	
        'kj_hutank',	
        'jp_hutank',	
        'wt_hutank',
        'k_kekeringan',	
        'f_kekeringan',	
        'kj_kekeringan',	
        'jp_kekeringan',	
        'wt_kekeringan',
        
        
        
        
    ];
}
