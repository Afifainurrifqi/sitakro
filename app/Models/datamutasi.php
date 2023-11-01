<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class datamutasi extends Model
{

    protected $fillable = [
        'user_id',
        'nik', 
        'gelarawal',
        'nama',
        'gelarakhir',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama_id',
        'pendidikan_id',
        'pekerjaan_id',
        'goldar_id',
        'status_id',
        'tanggal_perkawinan',
        'hubungan',
        'ayah',
        'ibu',
        'alamat',
        'RT',
        'RW',
        'Datak',
    ];
    public function agama()
    {
        return $this->belongsTo('App\Models\agama', 'agama_id');
    }
    public function pendidikan()
    {
        return $this->belongsTo('App\Models\pendidikan', 'pendidikan_id');
    }
    public function pekerjaan()
    {
        return $this->belongsTo('App\Models\pekerjaan', 'pekerjaan_id');
    }
    public function goldar()
    {
        return $this->belongsTo('App\Models\goldar', 'goldar_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\status', 'status_id');
    }
}
