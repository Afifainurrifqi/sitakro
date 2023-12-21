<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_kejadianluarbiasa extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_kejadianluarbiasa';
    protected $fillable = [
        'nama_muntaber',
        'jp_muntaber',
        'jm_muntaber',
        'nama_dbd',
        'jp_dbd',
        'jm_dbd',
        'nama_campak',
        'jp_campak',
        'jm_campak',
        'nama_malaria',
        'jp_malaria',
        'jm_malaria',
        'nama_fluburung',
        'jp_fluburung',
        'jm_fluburung',
        'nama_covid19',
        'jp_covid19',
        'jm_covid19',
        'nama_hepatitisb',
        'jp_hepatitisb',
        'jm_hepatitisb',
        'nama_hepatitise',
        'jp_hepatitise',
        'jm_hepatitise',
        'nama_dipteri',
        'jp_dipteri',
        'jm_dipteri',
        'nama_chikung',
        'jp_chikung',
        'jm_chikung',
        'nama_leptos',
        'jp_leptos',
        'jm_leptos',
        'nama_kolera',
        'jp_kolera',
        'jm_kolera',
        'nama_giziburuk',
        'jp_giziburuk',
        'jm_giziburuk',
        'nama_lainnya',
        'jp_lainnya',
        'jm_lainnya',


              

    ];
}
