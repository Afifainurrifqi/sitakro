<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rtlokasi extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_lokasi';
    protected $fillable = [
        'lokasi_rt_pulau',
        'topo_terluas_rt',
        'jumlah_warga_lereng',
        'penanaman_pohon_lahan_kritis',
        'pantai_garis_panjang',
        'pemanfaatan_laut_perangkap',
        'pemanfaatan_laut_budidaya',
        'pemanfaatan_laut_tambakg',
        'pemanfaatan_laut_bahari',
        'pemanfaatan_laut_transport',
        'kondisi_mangrove',
        'penanaman_mangrove',
        'jumlah_warga_pesisir',
        'jumlah_warga_atasair',
        'wilayah_desa_dalamhutan',
        'wilayah_desa_tepihutan',
        'fungsihutan_kons',
        'fungsihutan_lindung',
        'fungsihutan_produk',
        'fungsihutan_hutandes',
        'jumlahwarga_tinggal_dalamhutan',
        'jumlahwarga_tinggal_sekitarhutan',
        'ketergantungan_hutan',
        'reboisasi',
        'jumlah_produk_luardesa_masuk',
        'jumlah_produk_luardesa_keluar',
    ];
}
