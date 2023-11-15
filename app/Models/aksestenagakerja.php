<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class aksestenagakerja extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'aksestenagakerja';
    protected $fillable = [
        'jaraktempuh_dr_spesialis',
        'waktutempuh_dr_spesialis',
        'kemudahan_dr_spesialis',
        'jaraktempuh_dr_umum',
        'waktutempuh_dr_umum',
        'kemudahan_dr_umum',
        'jaraktempuh_bidan',
        'waktutempuh_bidan',
        'kemudahan_bidan',
        'jaraktempuh_tenagakes',
        'waktutempuh_tenagakes',
        'kemudahan_tenagakes',
        'jaraktempuh_dukun',
        'waktutempuh_dukun',
        'kemudahan_dukun',
    ];
}
