<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\agama;
use App\Models\datapenduduk;
use App\Models\detailkk;
use App\Models\goldar;
use App\Models\kk;
use App\Models\pekerjaan;
use App\Models\pendidikan;
use App\Models\status;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

class Importdatapenduduk implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    public function readCell($column, $row, $worksheetName = '')
    {
        // Include only rows starting from the second row
        return ($row >= 2);
    }

    public function model(array $row)
    {
        $datapenduduk = new dataPenduduk;
            $datapenduduk->nik = strval($row[1]);
            $datapenduduk->gelarawal = $row[2];
            $datapenduduk->nama = $row[3];
            $datapenduduk->gelarakhir = $row[4];
            $datapenduduk->jenis_kelamin = $row[5];
            $datapenduduk->tempat_lahir = $row[6];
            $datapenduduk->tanggal_lahir = Carbon::createFromFormat('d/m/Y', $row[7])->format('Y-m-d');
            $datapenduduk->agama_id = $row[8];
            $datapenduduk->pendidikan_id =  $row[9];
            $datapenduduk->pekerjaan_id = $row[10];
            $datapenduduk->goldar_id = $row[11];
            $datapenduduk->status_id = $row[12];
            if (!empty($row[13])) {
                $datapenduduk->tanggal_perkawinan = Carbon::createFromFormat('d/m/Y', $row[13])->format('Y-m-d');
            }
            $datapenduduk->hubungan = $row[14];
            $datapenduduk->ayah = $row[15];
            $datapenduduk->ibu = $row[16];
            $datapenduduk->alamat = $row[17];
            $datapenduduk->rt = $row[18];
            $datapenduduk->rw = $row[19];
            $datapenduduk->datak = $row[20];
            $datapenduduk->save();

        // Update date format if necessary (depends on the format in your CSV)
        // $datapenduduk->tanggal_lahir = Date::excelToDateTimeObject($row[7]);
        // $datapenduduk->tanggal_perkawinan = Date::excelToDateTimeObject($row[13]);

        // ...

        $datapenduduk->save();

        $kartuk = new kk;
        $kartuk->nokk = strval($row[0]);
        $kartuk->save();

        $detailk = new detailkk();
        $detailk->idpenduduk = $datapenduduk->id;
        $detailk->idkk = $kartuk->id;
        $detailk->save();
    }

    public function readFilter($column, $row, $worksheetName = '')
    {
        // Include only rows starting from the second row
        return ($row >= 2);
    }
}

