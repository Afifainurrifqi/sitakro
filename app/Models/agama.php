<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class agama extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    

    /**
     * @var array
     */
    protected $fillable = ['nama'];
    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function identities()
    {
        return $this->hasMany('App\Models\datapenduduk;', 'agama_id');
    }
}
