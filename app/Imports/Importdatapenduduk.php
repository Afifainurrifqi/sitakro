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
        dd($row[0]);
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
            $kartuk = new kk;
            $kartuk->nokk = $row[0];
            $kartuk->save();

            // detailkk::create([
            //     'nokk' => $row[0],
            // ]);

            $detailk = new detailkk();
            $detailk->idpenduduk = $datapenduduks->id;
            $detailk->idkk = $kartuk->id;
            $detailk->save();

            $datapenduduks = new DataPenduduk;
            $datapenduduks->nik = $row[1];
            $datapenduduks->gelarawal = $row[2];
            $datapenduduks->nama = $row[3];
            $datapenduduks->gelarakhir = $row[4];
            $datapenduduks->jenis_kelamin = $row[5];
            $datapenduduks->tempat_lahir = $row[6];
            $datapenduduks->tanggal_lahir = date('Y-m-d', strtotime($row[7]));
            $datapenduduks->agama_id = $row[8];
            $datapenduduks->pendidikan_id =  $row[9];
            $datapenduduks->pekerjaan_id = $row[10];
            $datapenduduks->goldar_id = $row[11];
            $datapenduduks->status_id = $row[12];
            $datapenduduks->tanggal_perkawinan = date('Y-m-d', strtotime($row[13]));
            $datapenduduks->hubungan = $row[14];
            $datapenduduks->ayah = $row[15];
            $datapenduduks->ibu = $row[16];
            $datapenduduks->alamat = $row[17];
            $datapenduduks->rt = $row[18];
            $datapenduduks->rw = $row[19];
            $datapenduduks->datak = $row[20];
            $datapenduduks->save();


            // kk::create([
            //     'nokk' => $row[0],
            // ]);
           
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
