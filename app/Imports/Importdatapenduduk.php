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
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class Importdatapenduduk implements ToModel
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        dd($row);
        // foreach ($rows as $row) {

            // datapenduduk::create([
            //     // 'id'=> $row[0],

            //     'nik' => $row[1], // Change 'valNIK' to 'nik'
            //     'gelarawal' => $row[2], // Adjust column names accordingly
            //     'nama' => $row[3],
            //     'gelarakhir' => $row[4],
            //     'jenis_kelamin' => $row[5],
            //     'tempat_lahir' => $row[6],
            //     'tanggal_lahir' => date('Y-m-d', strtotime($row[7])),
            //     'agama_id' => $row[8],
            //     'pendidikan_id' => $row[9],
            //     'pekerjaan_id' => $row[10],
            //     'goldar_id' => $row[11],
            //     'status_id' => $row[12],
            //     'tanggal_perkawinan' => date('Y-m-d', strtotime($row[13])),
            //     'hubungan' => $row[14],
            //     'ayah' => $row[15],
            //     'ibu' => $row[16],
            //     'alamat' => $row[17],
            //     'RT' => $row[18],
            //     'RW' => $row[19],
            //     'Datak' => $row[20],



            // ]);

            $datapenduduk = new DataPenduduk;
            $datapenduduk->nik = $row[1];
            $datapenduduk->gelarawal = $row[2];
            $datapenduduk->nama = $row[3];
            $datapenduduk->gelarakhir = $row[4];
            $datapenduduk->jenis_kelamin = $row[5];
            $datapenduduk->tempat_lahir = $row[6];
            $datapenduduk->tanggal_lahir = date('Y-m-d', strtotime($row[7]));
            $datapenduduk->agama_id = $row[8];
            $datapenduduk->pendidikan_id =  $row[9];
            $datapenduduk->pekerjaan_id = $row[10];
            $datapenduduk->goldar_id = $row[11];
            $datapenduduk->status_id = $row[12];
            $datapenduduk->tanggal_perkawinan = date('Y-m-d', strtotime($row[13]));
            $datapenduduk->hubungan = $row[14];
            $datapenduduk->ayah = $row[15];
            $datapenduduk->ibu = $row[16];
            $datapenduduk->alamat = $row[17];
            $datapenduduk->rt = $row[18];
            $datapenduduk->rw = $row[19];
            $datapenduduk->datak = $row[20];
            $datapenduduk->save();


            // kk::create([
            //     'nokk' => $row[0],
            // ]);
            $kartuk = new kk;
            $kartuk->nokk = $row[0];
            $kartuk->save();

            // detailkk::create([
            //     'nokk' => $row[0],
            // ]);

            $detailk = new detailkk();
            $detailk->idpenduduk = $datapenduduk->id;
            $detailk->idkk = $kartuk->id;
            $detailk->save();
        // }



        // Sesuaikan dengan nama kolom Excel dan field pada model Anda

    }
    public function rules(): array
    {
        return [
            'valNokk' => 'required',
            'valNIK' => 'required|unique:datapenduduks,nik|min:16|max:16',
            'valGelara' => 'required',
            'valNama' => 'required',
            'valGelart' => 'required',
            'valJeniskelamin' => 'required',
            'valTempatlahir' => 'required',
            'valTanggallahir' => 'required',
            'valAgama' => 'required',
            'valPendidikan' => 'required',
            'valPekerjaan' => 'required',
            'valGoldar' => 'required',
            'valStatus' => 'required',
            'valTanggalperkawinan' => 'required',
            'valHubungan' => 'required',
            'valAyah' => 'required',
            'valIbu' => 'required',
            'valAlamat' => 'required',
            'valRT' => 'required',
            'valRW' => 'required',
            'valDatak' => 'required'
        ];
    }
}
