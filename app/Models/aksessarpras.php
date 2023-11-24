<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class aksessarpras extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'aksessarpras';
    protected $fillable = [
        'jenistrasport_lokasipu',
        'pengtransportumum_lokasipu',
        'waktutempuh_lokasipu',
        'biaya_lokasipu',
        'kemudahan_lokasipu',
        'jenistrasport_lahanpertanian',
        'pengtransportumum_lahanpertanian',
        'waktutempuh_lahanpertanian',
        'biaya_lahanpertanian',
        'kemudahan_lahanpertanian',
        'jenistrasport_sekolah',
        'pengtransportumum_sekolah',
        'waktutempuh_sekolah',
        'biaya_sekolah',
        'kemudahan_sekolah',
        'jenistrasport_berobat',
        'pengtransportumum_berobat',
        'waktutempuh_berobat',
        'biaya_berobat',
        'kemudahan_berobat',
        'jenistrasport_beribadah',
        'pengtransportumum_beribadah',
        'waktutempuh_beribadah',
        'biaya_beribadah',
        'kemudahan_beribadah',
        'jenistrasport_rekreasi',
        'pengtransportumum_rekreasi',
        'waktutempuh_rekreasi',
        'biaya_rekreasi',
        'kemudahan_rekreasi',
       
    ];
}
