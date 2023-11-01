<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kk extends Model
{
    protected $fillable = [
        'nokk',
    ];

    public function detailkk()
{
    return $this->hasMany(detailkk::class, 'idkk');
}
    public function datapenduduk()
{
    return $this->belongsTo('App\Models\DataPenduduk', 'idpenduduk', 'id');
}
}
