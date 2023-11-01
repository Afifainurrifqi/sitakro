<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class dataindividu extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'dataindividu';
    protected $fillable = [
        'usia_saat_pertama_kali_menikah', 'suku_bangsa', 'warga_negarawarga_negara', 'nohp', 'nowa', 'email', 'facebook','twitter','instagram',
    ];
}
