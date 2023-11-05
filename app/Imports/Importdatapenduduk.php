<?php 
 
namespace App\Imports; 
 
use PhpOffice\PhpSpreadsheet\Cell\DataType;
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
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadingRow; 
 
 
class Importdatapenduduk implements ToModel , WithColumnFormatting
{ 
    /** 
     * @param Collection $collection 
     */ 
    public function model(array $row) 
    { 
        // dd($row); 
         
 
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
    
     public function columnFormats(): array
    {
        return [
            'valNokk' => DataType::TYPE_STRING, // Assuming 'A' is the column with nokk
            'valNIK' => DataType::TYPE_STRING, // Assuming 'B' is the column with nik
        ];
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