<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_fasilitas_ekonomi extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_fasilitas_ekonomi';
    protected $fillable = [
        'kredit_usaha',
        'kredit_ketahanan',
        'kredit_kecil',
        'kelompok_usaha',
    ];
}
