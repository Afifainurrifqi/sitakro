<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;




class datakesehatan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'datakesehatan';
    protected $fillable = ['penyakitsetahun','rumah_sakit','rumah_sakitb','puskesmas_denganri','puskesmas_tanpari',
        'puskemas_pembantu','poliklinik','tempat_praktekdr','rumah_bersalin',
        'tempat_praktek','poskesdes','polindes','apotik',
        'toko_obat','posyandu','posbindu','tempat_praktikdb',
        'jamkes','bayiu16',];
}
