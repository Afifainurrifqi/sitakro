<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rtpuengurus extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_pengurus';
    protected $fillable = [
        'nama_ketuarw',
        'nik_ketuarw',
        'nohp_ketuarw',
        'menjabat_ketuarw',
        'nama_sekrw',
        'nik_sekrw',
        'nohp_sekrw',
        'menjabat_sekrw',
        'nama_benrw',
        'nik_benrw',
        'nohp_benrw',
        'menjabat_benrw',
        'nama_ketuart',
        'nik_ketuart',
        'nohp_ketuart',
        'menjabat_ketuart',
        'nama_sekrt',
        'nik_sekrt',
        'nohp_sekrt',
        'menjabat_sekrt',
        'nama_benrt',
        'nik_benrt',
        'nohp_benrt',
        'menjabat_benrt',
        
    ];
}
