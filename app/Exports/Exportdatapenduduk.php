<?php

namespace App\Exports;

use App\Models\Datapenduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Exportdatapenduduk implements FromCollection, WithHeadings
{
    public function collection()
{
    $datapenduduk = Datapenduduk::with('detailkk.kk')->get();

    // Modify NIK column values
    $modifiedData = $datapenduduk->map(function ($item) {
        $item->nik = "'" . $item->nik;
        $item->agama_id = optional($item->agama)->nama;
        $item->pendidikan_id = optional($item->pendidikan)->nama;
        $item->pekerjaan_id = optional($item->pekerjaan)->nama;
        $item->goldar_id = optional($item->goldar)->nama;
        $item->status_id = optional($item->status)->nama;

        // Create an associative array with the correct order of columns
        $data = [
            'ID' => $item->id,
            'No KK' => "'" . optional($item->detailkk->kk)->nokk,
            'NIK' => $item->nik,
            'Gelar Awal' => $item->gelar_awal,
            'Nama' => $item->nama,
            'Gelar Akhir' => $item->gelar_akhir,
            'Jenis Kelamin' => $item->jenis_kelamin,
            'Tempat Lahir' => $item->tempat_lahir,
            'Tanggal Lahir' => $item->tanggal_lahir,
            'Agama' => $item->agama_id,
            'Pendidikan' => $item->pendidikan_id,
            'Pekerjaan' => $item->pekerjaan_id,
            'Golongan Darah' => $item->goldar_id,
            'Status' => $item->status_id,
            'Tanggal Perkawinan' => $item->tanggal_perkawinan,
            'Hubungan' => $item->hubungan,
            'Ayah' => $item->ayah,
            'Ibu' => $item->ibu,
            'Alamat' => $item->alamat,
            'RT' => $item->rt,
            'RW' => $item->rw,
            'Status Kependudukan' => $item->datak,
        ];

        return $data;
    });

    return $modifiedData;
}


    public function headings(): array
    {
        return [
            'ID',
            'No KK',
            'NIK',
            'Gelar Awal',
            'Nama',
            'Gelar Akhir',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Pendidikan',
            'Pekerjaan',
            'Golongan Darah',
            'Status',
            'Tanggal Perkawinan',
            'Hubungan',
            'Ayah',
            'Ibu',
            'Alamat',
            'RT',
            'RW',
            'Status Kependudukan',
        ];
    }
}
