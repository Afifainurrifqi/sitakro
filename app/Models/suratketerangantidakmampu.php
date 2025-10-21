<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class suratketerangantidakmampu extends Eloquent
{
    /**
     * Koneksi & koleksi MongoDB
     */
    protected $connection = 'mongodb';
    protected $collection = 'surat_keterangan_tidakmampu'; // pastikan sama dengan yang ada di DB

    /**
     * Field yang boleh diisi mass-assignment
     */
    protected $fillable = [
        'nowa',
        'status_surat',
        'status_verif',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'alamat_rumah',
        'peruntukan_sktm',
        'keterangan_fungsi_surat',

        // Bantuan (ceklist + map ID)
        'bantuan',     // array contoh: ['pkh','kis']
        'bantuan_id',  // map contoh: ['pkh' => 'ID-123', 'kis' => 'ID-456']

        // Penomoran surat
        'nomor_surat', // contoh: "475 / 001 / 409.41.2 / 2025"
        'nomor_urut',  // integer: 1,2,3,...
        'tahun_nomor', // integer: 2025
    ];

    /**
     * Casting atribut
     */
    protected $casts = [
        'tanggal_lahir' => 'datetime:Y-m-d',
        'bantuan'       => 'array',
        'bantuan_id'    => 'array',
        'nomor_urut'    => 'integer',
        'tahun_nomor'   => 'integer',
    ];

    /**
     * (Opsional) Jika mau memaksa timestamps otomatis di Mongo
     * default-nya true seperti Eloquent; biarkan saja kecuali ingin dimatikan.
     */
    // public $timestamps = true;
}
