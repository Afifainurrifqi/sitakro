<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_kesehatan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_kesehatan';
    protected $fillable = [
        'nama_rs',
        'pemilik_rs',
        'jd_rs',
        'jb_rs',
        'jts_rs',
        'jp_rs',
        'nama_rsb',
        'pemilik_rsb',
        'jd_rsb',
        'jb_rsb',
        'jts_rsb',
        'jp_rsb',
        'nama_pdri',
        'pemilik_pdri',
        'jd_pdri',
        'jb_pdri',
        'jts_pdri',
        'jp_pdri',
        'nama_ptri',
        'pemilik_ptri',
        'jd_ptri',
        'jb_ptri',
        'jts_ptri',
        'jp_ptri',
        'nama_pp',
        'pemilik_pp',
        'jd_pp',
        'jb_pp',
        'jts_pp',
        'jp_pp',
        'nama_pbp',
        'pemilik_pbp',
        'jd_pbp',
        'jb_pbp',
        'jts_pbp',
        'jp_pbp',
        'nama_tpd',
        'pemilik_tpd',
        'jd_tpd',
        'jb_tpd',
        'jts_tpd',
        'jp_tpd',
        'nama_rb',
        'pemilik_rb',
        'jd_rb',
        'jb_rb',
        'jts_rb',
        'jp_rb',
        'nama_tpb',
        'pemilik_tpb',
        'jd_tpb',
        'jb_tpb',
        'jts_tpb',
        'jp_tpb',
        'nama_poskedes',
        'pemilik_poskedes',
        'jd_poskedes',
        'jb_poskedes',
        'jts_poskedes',
        'jp_poskedes',
        'nama_polindes',
        'pemilik_polindes',
        'jd_polindes',
        'jb_polindes',
        'jts_polindes',
        'jp_polindes',
        'nama_apotik',
        'pemilik_apotik',
        'jd_apotik',
        'jb_apotik',
        'jts_apotik',
        'jp_apotik',
        'nama_tokojamu',
        'pemilik_tokojamu',
        'jd_tokojamu',
        'jb_tokojamu',
        'jts_tokojamu',
        'jp_tokojamu',
        'nama_posyandu',
        'pemilik_posyandu',
        'jd_posyandu',
        'jb_posyandu',
        'jts_posyandu',
        'jp_posyandu',
        'nama_posbindu',
        'pemilik_posbindu',
        'jd_posbindu',
        'jb_posbindu',
        'jts_posbindu',
        'jp_posbindu',
        'nama_tpd',
        'pemilik_tpd',
        'jd_tpd',
        'jb_tpd',
        'jts_tpd',
        'jp_tpd',        

    ];
}
