<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_kuasa extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'surat_kuasa';

    protected $fillable = [
        // PIHAK 1 (Pemberi Kuasa)
        'p1_nama_lengkap','p1_jenis_kelamin','p1_tempat_lahir','p1_tanggal_lahir','p1_agama','p1_status',
        'p1_nik','p1_pekerjaan','p1_alamat',

        // PIHAK 2 (Penerima Kuasa)
        'p2_nama_lengkap','p2_jenis_kelamin','p2_tempat_lahir','p2_tanggal_lahir','p2_agama','p2_status',
        'p2_nik','p2_pekerjaan','p2_alamat',

        // umum
        'status_surat','status_verif','nowa',
        // opsional: uraian kuasa
        'uraian_kuasa',
    ];

    protected $casts = [
        'p1_tanggal_lahir' => 'date',
        'p2_tanggal_lahir' => 'date',
    ];
}
