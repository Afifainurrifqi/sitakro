<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rtkegiatan_warga extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rtkegiatan_warga';
    protected $fillable = [
        'jumlah_kpp',
        'jumlah_ppr',
        'jumlah_hansip',
        'pelaporan_tamu_lebih24',
        'sistem_keamanan',
        'sistem_linmas',
        'jumlahpos_digunakan',
        'jumlahpos_tidakdigunakan',
        'jarak_ppt',
        'kemudahan_ppt',
        'jarak_korban',
        'jarak_lokasikumpul',
        'jarak_mangkal',
        'jarak_lokalisasi',

    ];
}
