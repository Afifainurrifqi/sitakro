<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKk extends Model
{ protected $fillable = [
    'idkk',
    'idpenduduk', 
];
public function datapenduk()
{
    return $this->belongsTo(Datapenduduk::class, 'idpenduduk');
}

public function kk()
{
    return $this->belongsTo(Kk::class, 'idkk');
}
}
