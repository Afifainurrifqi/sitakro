<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datadasawisma extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function datapenduduk()
    {
        return $this->belongsTo('App\Models\datapenduduk', 'penduduk_id');
    }

}
