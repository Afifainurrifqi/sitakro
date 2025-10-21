<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class nama_alias_ortu extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_nama_alias_satu_ortu';

    protected $fillable = [
        // data utama
        'nama','nik','alamat','nama_menyatakan','no_akta_kelahiran',

        // orang tua tercatat & alias yang dipilih
        'nama_ortu_ayah_tercatat','nama_alias_ayah',
        'nama_ortu_ibu_tercatat','nama_alias_ibu',

        // alias yang dihapus
        'nama_alias_dihapus_1','nama_alias_dihapus_2',

        // dasar hukum
        'berdasarkan',

        // status & kontak
        'status_surat','status_verif','nowa',

        // --- nomor surat ---
        'nomor_surat',  // string: "411 / 001 / 409.41.2 / 2025"
        'nomor_urut',   // int: 1,2,3,... per tahun
        'tahun_nomor',  // int: 2025
    ];

    protected $casts = [
        'nomor_urut'  => 'integer',
        'tahun_nomor' => 'integer',
    ];
}
