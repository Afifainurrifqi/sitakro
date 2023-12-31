<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedatapendudukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() 
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          
            'valNama' => 'required',
           
            'valJeniskelamin' => 'required',
            'valTempatlahir' => 'required',
            'valTanggallahir' => 'required',
            'valAgama' => 'required',
            'valPendidikan' => 'required',
            'valPekerjaan' => 'required',
            'valGoldar' => 'required',
            'valStatus' => 'required',
          
            'valHubungan' => 'required',
            'valAyah' => 'required',
            'valIbu' => 'required',
            'valAlamat' => 'required',
            'valRT' => 'required',
            'valRW' => 'required',
            'valDatak'=> 'required'
        ];
    }

    public function attributes(): array
{
    return [
       
        'valNama' => 'Nama',
     
        'valJeniskelamin' => 'Jenis Kelamin',
        'valTempatlahir' => 'Tempat Lahir',
        'valTanggallahir' => 'Tanggal lahir',
        'valAgama' => 'Agama',
        'valPendidikan' => 'Pendidikan',
        'valPekerjaan' => 'Pekerjaan',
        'valGoldar' => 'Goldar',
        'valStatus' => 'Status',
       
        'valHubungan' => 'Hubungan',
        'valAyah' => 'Ayah',
        'valIbu' => 'Ibu',
        'valAlamat' => 'Alamat',
        'valRT' => 'RT',
        'valRW' => 'RW',
        'valDatak' => 'Status Kependudukan'
    ];
}

public function messages(): array
    {
    return [
        
      

       
        
        'valNama.required' => ':attribute Kolom tidak boleh kosong',
        
      
        
        'valJeniskelamin.required' => ':attribute Kolom tidak boleh kosong',
        
        'valTempatlahir.required' => ':attribute Kolom tidak boleh kosong',
        
        'valTanggallahir.required' => ':attribute Kolom tidak boleh kosong',
        
        'valAgama.required' => ':attribute Kolom tidak boleh kosong',
        
        'valPendidikan.required' => ':attribute Kolom tidak boleh kosong',
        
        'valPekerjaan.required' => ':attribute Kolom tidak boleh kosong',
        
        'valGoldar.required' => ':attribute Kolom tidak boleh kosong',
        
        'valStatus.required' => ':attribute Kolom tidak boleh kosong',
        
      
        
        'valHubungan.required' => ':attribute Kolom tidak boleh kosong',
        
        'valAyah.required' => ':attribute Kolom tidak boleh kosong',
        
        'valIbu.required' => ':attribute Kolom tidak boleh kosong',
        
        'valRT.required' => ':attribute Kolom tidak boleh kosong',
        
        'valRW.required' => ':attribute Kolom tidak boleh kosong',

        'valDatak.required' => ':attribute Kolom tidak boleh kosong',
        
    ];
    }

    

}
