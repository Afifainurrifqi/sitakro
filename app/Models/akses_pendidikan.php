<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class akses_pendidikan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'aksespendidikan';
    protected $fillable = [
        'jaraktempuh_paud',
        'waktutempuh_paud',
        'kemudahan_paud',
        'jaraktempuh_tk',
        'waktutempuh_tk',
        'kemudahan_tk',
        'jaraktempuh_sd',
        'waktutempuh_sd',
        'kemudahan_sd',
        'jaraktempuh_smp',
        'waktutempuh_smp',
        'kemudahan_smp',
        'jaraktempuh_sma',
        'waktutempuh_sma',
        'kemudahan_sma',
        'jaraktempuh_pt',
        'waktutempuh_pt',
        'kemudahan_pt',
        'jaraktempuh_ps',
        'waktutempuh_ps',
        'kemudahan_ps',
        'jaraktempuh_seminari',
        'waktutempuh_seminari',
        'kemudahan_seminari',
        'jaraktempuh_pagamalain',
        'waktutempuh_pagamalain',
        'kemudahan_pagamalain',
    ];
}
