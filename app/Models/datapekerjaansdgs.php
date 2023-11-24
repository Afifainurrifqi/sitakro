<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class datapekerjaansdgs extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'datapekerjaansgds';
    protected $fillable = [
        'kondisi_pekerjaan', 'pekerjaan_utama', 'jaminan_sosial_ketenagakerjaan', 'penghasilan_setahun_terakhir',
    ];
    public function pekerjaan()
{
    return $this->belongsTo('App\Models\Pekerjaan', 'pekerjaan_utama', 'id'); 
}
}

