<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Datart extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'alamat', 
        'rt',
        'rw',
        'nohp',
        
    ];
}
