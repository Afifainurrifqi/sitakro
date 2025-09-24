<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class nama_alias_ortu extends  Eloquent
{
     protected $connection = 'mongodb';
    protected $collection = 'surat_nama_alias_satu_ortu';

    protected $fillable = [
        // data utama
        'nama',
        'nik',
        'alamat',
        'nama_menyatakan',
        'no_akta_kelahiran',

        // orang tua tercatat & alias yang dipilih
        'nama_ortu_ayah_tercatat',
        'nama_alias_ayah',
        'nama_ortu_ibu_tercatat',
        'nama_alias_ibu',

        // alias yang dihapus (jika ada duplikasi entri, kita sediakan dua kolom)
        'nama_alias_dihapus_1',
        'nama_alias_dihapus_2',

        // dasar hukum / berdasarkan
        'berdasarkan',

        // status & kontak
        'status_surat',
        'status_verif',
        'nowa',

        ];
}
