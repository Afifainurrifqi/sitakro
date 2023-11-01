<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class lokasipemukiman extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'lokasipemukiman';
    protected $fillable = [
        'nik_kepala', 'tempat_tinggal', 'status_lahan', 'luas_lantai_tinggal', 'luas_tanah_tinggal', 'jenis_lantai_tinggal', 'dinding_sebagian', 'jendela', 'atap',
        'penerangan', 'energi_masak', 'jika_kayu_jenis','tempat_sampah', 'mck', 'sumber_air_mandi',
        'sumber_air_mck', 'sumber_air_minum', 'tempat_pembuangan_limbah','rumah_sungai', 'rumah_sutet', 'rumah_lereng_gunung', 'kondi_rumah_kumuh',
    ];
}
