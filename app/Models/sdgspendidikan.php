<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class sdgspendidikan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'datasdgspendidikan';
    protected $fillable = [
        'pendidikan_tertinggi', 'berapa_tahunp', 'pendidikan_diikuti', 'bahasa_Rumah', 'bahasa_Formal',
        'jumlah_kerja1', 'skamling1', 'pesta_rakyat1', 'frekuensiml',
        'frekuensib', 'frekuensimn', 'mendapatp1', 'bagaiamanap',
        'pernahmasukan', 'keterbukaands', 'bencana1', 'apakahb', 'apakahd', 'apakahp',
    ];

    public function sdgspendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_tertinggi', 'nama');
    }
}
