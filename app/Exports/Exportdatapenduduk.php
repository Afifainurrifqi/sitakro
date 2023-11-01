<?php

namespace App\Exports;

use App\Models\agama;
use App\Models\datapenduduk;
use App\Models\goldar;
use App\Models\pekerjaan;
use App\Models\pendidikan;
use App\Models\status;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Exportdatapenduduk implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $datapenduduk = datapenduduk::where('datak', ['Tetap', 'Tidaktetap'])->get();
        $agama = agama::all(); 
        $pendidikan = pendidikan::all();
        $pekerjaan = pekerjaan::all();
        $goldar = goldar::all();
        $status = status::all();
        return view('datapenduduk.tabel', compact('datapenduduk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status'));


    }
}
