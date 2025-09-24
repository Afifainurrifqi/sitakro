<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class surat_pernyataan_dan_jaminan extends Eloquent
{
   protected $connection = 'mongodb';
    protected $collection = 'surat_pernyataan_dan_jaminan';

    protected $fillable = [
        // Pembuat pernyataan (penjamin)
        'nama_pembuat',
        'nik_pembuat',
        'alamat_pembuat',
        'hubungan_dengan_terjamin', // mis: Orang Tua/Wali/Saudara/Atasan

        // Identitas pihak yang dijamin
        'nama_terjamin',
        'nik_terjamin',
        'alamat_terjamin',

        // Pokok pernyataan & jaminan
        'uraian_pernyataan',     // isi pernyataan
        'bentuk_jaminan',        // uang/barang/jasa/pertanggungjawaban moral, dll.
        'berlaku_mulai',         // date
        'berlaku_sampai',        // date (nullable)

        // Dasar
        'berdasarkan',           // opsional

        // status & kontak
        'status_surat',          // Pending/Di cek/Diterima/Ditolak
        'status_verif',          // Belum Verifikasi/Terverifikasi
        'nowa',                  // kontak WA
    ];
}
