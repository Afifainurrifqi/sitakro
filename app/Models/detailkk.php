<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailkk extends Model
{ protected $fillable = [
    'idkk',
    'idpenduduk', 
];
public function datapenduk()
{
    return $this->belongsTo(datapenduk::class, 'idpenduduk');
}

public function kk()
{
    return $this->belongsTo(kk::class, 'idkk');
}
}
