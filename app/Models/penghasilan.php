<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class penghasilan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'datapenghasilan';
    protected $fillable = [
        'sumber_penghasilan', 'jumlah_asset_darip', 'satuan', 'penghasilan_setahun','expor',
    ];
}
