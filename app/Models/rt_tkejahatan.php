<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class rt_tkejahatan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'rt_kejahatan';
    protected $fillable = [
    'jk_pencurian',
    'jumlahselesai_pencurian',
    'jktbd_pencurian',
    'kll_pencurian',
    'kt_pencurian',
    'jk_pencuriankeras',
    'jumlahselesai_pencuriankeras',
    'jktbd_pencuriankeras',
    'kll_pencuriankeras',
    'kt_pencuriankeras',
    'jk_penipuan',
    'jumlahselesai_penipuan',
    'jktbd_penipuan',
    'kll_penipuan',
    'kt_penipuan',
    'jk_penganiyayaan',
    'jumlahselesai_penganiyayaan',
    'jktbd_penganiyayaan',
    'kll_penganiyayaan',
    'kt_penganiyayaan',
    'jk_pembakaran',
    'jumlahselesai_pembakaran',
    'jktbd_pembakaran',
    'kll_pembakaran',
    'kt_pembakaran',
    'jk_pemerkosaan',
    'jumlahselesai_pemerkosaan',
    'jktbd_pemerkosaan',
    'kll_pemerkosaan',
    'kt_pemerkosaan',
    'jk_narkoba',
    'jumlahselesai_narkoba',
    'jktbd_narkoba',
    'kll_narkoba',
    'kt_narkoba',
    'jk_perjudian',
    'jumlahselesai_perjudian',
    'jktbd_perjudian',
    'kll_perjudian',
    'kt_perjudian',
    'jk_pembunuhan',
    'jumlahselesai_pembunuhan',
    'jktbd_pembunuhan',
    'kll_pembunuhan',
    'kt_pembunuhan',
    'jk_perdaganganorang',
    'jumlahselesai_perdaganganorang',
    'jktbd_perdaganganorang',
    'kll_perdaganganorang',
    'kt_perdaganganorang',
    'jk_korupsi',
    'jumlahselesai_korupsi',
    'jktbd_korupsi',
    'kll_korupsi',
    'kt_korupsi',
    'jk_lainnya',
    'jumlahselesai_lainnya',
    'jktbd_lainnya',
    'kll_lainnya',
    'kt_lainnya',
          

];

}
