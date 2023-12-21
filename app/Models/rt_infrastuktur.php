<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_infrastuktur extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_infrastuktur';
    protected $fillable = [
        
        'penerangan_jalan',	
        'pra_transportrt',	
        'jalan_aspal',	
        'jalan_makadam',
        'jalan_tanah',	
        'jalan_papan_atasaair',	
        'jalan_setapak',	
        'jalan_lainnya',
        'jalan_darat_roda4',	
        'angkutanumum_trayek',	
        'angkutanumum_opra',	
        'angkutanumum_jamopra',
        'dermaga_laut',	
        'sinyalhp_bts',	
        'sinyalhp_telkom',	
        'sinyalhp_indo',	
        'sinyalhp_xl',
        'sinyalhp_hut',	
        'sinyalhp_psn',	
        'sinyalhp_smart',	
        'sinyalhp_bakrie',
        'pos_pembantu',	
        'pos_keliling',	
        'agen_jasa',	
        'chanel_tvri',
        'parabola_tvri',
        'chanel_tvrid',
        'parabola_tvrid',
        'chanel_s',
        'parabola_s',
        'chanel_ln',
        'parabola_ln',
        'chanel_rri',
        'parabola_rri',
        'chanel_rrid',
        'parabola_rrid',
        'chanel_radios',
        'parabola_radios',
        'chanel_radiok',
        'parabola_radiok',	
        'jumlah_lokasi_air',	
        'fasilitas_umump_pasar',	
        'fasilitas_umump_stasiun',	
        'fasilitas_umump_terminal',	
        'fasilitas_umump_kolong',	
        'fasilitas_umump_pelabuhan',
        'pemukiman_khusus_mewah',
        'pemukiman_khusus_apart',
        'pemukiman_khusus_susun',
        'pemukiman_khusus_school',
        'pemukiman_khusus_kos',
        'pemukiman_khusus_asrama',
        'pemukiman_khusus_lp',
            
        
    ];
}
