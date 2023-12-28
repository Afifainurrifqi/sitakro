<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatert_tkejahatanRequest extends FormRequest
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

            'valjk_pencurian' => 'required',
            'valjumlahselesai_pencurian' => 'required',
            'valjktbd_pencurian' => 'required',
            'valkll_pencurian' => 'required',
            'valkt_pencurian' => 'required',
            'valjk_pencuriankeras' => 'required',
            'valjumlahselesai_pencuriankeras' => 'required',
            'valjktbd_pencuriankeras' => 'required',
            'valkll_pencuriankeras' => 'required',
            'valkt_pencuriankeras' => 'required',
            'valjk_penipuan' => 'required',
            'valjumlahselesai_penipuan' => 'required',
            'valjktbd_penipuan' => 'required',
            'valkll_penipuan' => 'required',
            'valkt_penipuan' => 'required',
            'valjk_penganiyayaan' => 'required',
            'valjumlahselesai_penganiyayaan' => 'required',
            'valjktbd_penganiyayaan' => 'required',
            'valkll_penganiyayaan' => 'required',
            'valkt_penganiyayaan' => 'required',
            'valjk_pembakaran' => 'required',
            'valjumlahselesai_pembakaran' => 'required',
            'valjktbd_pembakaran' => 'required',
            'valkll_pembakaran' => 'required',
            'valkt_pembakaran' => 'required',
            'valjk_pemerkosaan' => 'required',
            'valjumlahselesai_pemerkosaan' => 'required',
            'valjktbd_pemerkosaan' => 'required',
            'valkll_pemerkosaan' => 'required',
            'valkt_pemerkosaan' => 'required',            
            'valjk_narkoba' => 'required',
            'valjumlahselesai_narkoba' => 'required',
            'valjktbd_narkoba' => 'required',
            'valkll_narkoba' => 'required',
            'valkt_narkoba' => 'required',
            'valjk_perjudian' => 'required',
            'valjumlahselesai_perjudian' => 'required',
            'valjktbd_perjudian' => 'required',
            'valkll_perjudian' => 'required',
            'valkt_perjudian' => 'required',          
            'valjk_pembunuhan' => 'required',
            'valjumlahselesai_pembunuhan' => 'required',
            'valjktbd_pembunuhan' => 'required',
            'valkll_pembunuhan' => 'required',
            'valkt_pembunuhan' => 'required',     
            'valjk_perdaganganorang' => 'required',
            'valjumlahselesai_perdaganganorang' => 'required',
            'valjktbd_perdaganganorang' => 'required',
            'valkll_perdaganganorang' => 'required',
            'valkt_perdaganganorang' => 'required',
            'valjk_korupsi' => 'required',
            'valjumlahselesai_korupsi' => 'required',
            'valjktbd_korupsi' => 'required',
            'valkll_korupsi' => 'required',
            'valkt_korupsi' => 'required',
            'valjk_lainnya' => 'required',
            'valjumlahselesai_lainnya' => 'required',
            'valjktbd_lainnya' => 'required',
            'valkll_lainnya' => 'required',
            'valkt_lainnya' => 'required',
          
           
           
        ];
    }

    public function messages(): array
    {
        return [

            'valjk_pencurian.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pencurian.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pencurian.required' => ':Attribute tidak boleh kosong',
            'valkll_pencurian.required' => ':Attribute tidak boleh kosong',
            'valkt_pencurian.required' => ':Attribute tidak boleh kosong',
  
            'valjk_pencuriankeras.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pencuriankeras.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pencuriankeras.required' => ':Attribute tidak boleh kosong',
            'valkll_pencuriankeras.required' => ':Attribute tidak boleh kosong',
            'valkt_pencuriankeras.required' => ':Attribute tidak boleh kosong',
      
            'valjk_penipuan.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_penipuan.required' => ':Attribute tidak boleh kosong',
            'valjktbd_penipuan.required' => ':Attribute tidak boleh kosong',
            'valkll_penipuan.required' => ':Attribute tidak boleh kosong',
            'valkt_penipuan.required' => ':Attribute tidak boleh kosong',
            
            'valjk_penganiyayaan.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_penganiyayaan.required' => ':Attribute tidak boleh kosong',
            'valjktbd_penganiyayaan.required' => ':Attribute tidak boleh kosong',
            'valkll_penganiyayaan.required' => ':Attribute tidak boleh kosong',
            'valkt_penganiyayaan.required' => ':Attribute tidak boleh kosong',
          
            'valjk_pembakaran.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pembakaran.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pembakaran.required' => ':Attribute tidak boleh kosong',
            'valkll_pembakaran.required' => ':Attribute tidak boleh kosong',
            'valkt_pembakaran.required' => ':Attribute tidak boleh kosong',
        
            'valjk_pemerkosaan.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pemerkosaan.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pemerkosaan.required' => ':Attribute tidak boleh kosong',
            'valkll_pemerkosaan.required' => ':Attribute tidak boleh kosong',
            'valkt_pemerkosaan.required' => ':Attribute tidak boleh kosong',
          
            'valjk_narkoba.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_narkoba.required' => ':Attribute tidak boleh kosong',
            'valjktbd_narkoba.required' => ':Attribute tidak boleh kosong',
            'valkll_narkoba.required' => ':Attribute tidak boleh kosong',
            'valkt_narkoba.required' => ':Attribute tidak boleh kosong',
        
            'valjk_perjudian.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_perjudian.required' => ':Attribute tidak boleh kosong',
            'valjktbd_perjudian.required' => ':Attribute tidak boleh kosong',
            'valkll_perjudian.required' => ':Attribute tidak boleh kosong',
            'valkt_perjudian.required' => ':Attribute tidak boleh kosong',
        
            'valjk_pembunuhan.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pembunuhan.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pembunuhan.required' => ':Attribute tidak boleh kosong',
            'valkll_pembunuhan.required' => ':Attribute tidak boleh kosong',
            'valkt_pembunuhan.required' => ':Attribute tidak boleh kosong',
          
            'valjk_perdaganganorang.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_perdaganganorang.required' => ':Attribute tidak boleh kosong',
            'valjktbd_perdaganganorang.required' => ':Attribute tidak boleh kosong',
            'valkll_perdaganganorang.required' => ':Attribute tidak boleh kosong',
            'valkt_perdaganganorang.required' => ':Attribute tidak boleh kosong',
           
            'valjk_korupsi.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_korupsi.required' => ':Attribute tidak boleh kosong',
            'valjktbd_korupsi.required' => ':Attribute tidak boleh kosong',
            'valkll_korupsi.required' => ':Attribute tidak boleh kosong',
            'valkt_korupsi.required' => ':Attribute tidak boleh kosong',
         
            'valjk_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjktbd_lainnya.required' => ':Attribute tidak boleh kosong',
            'valkll_lainnya.required' => ':Attribute tidak boleh kosong',
            'valkt_lainnya.required' => ':Attribute tidak boleh kosong',
         
           



        ];
    }

    public function attributes(): array
    {
        return [

           'valjk_pencurian' => 'jk_pencurian',
            'valjumlahselesai_pencurian' => 'jumlahselesai_pencurian',
            'valjktbd_pencurian' => 'jktbd_pencurian',
            'valkll_pencurian' => 'kll_pencurian',
            'valkt_pencurian' => 'kt_pencurian',          
            'valjk_pencuriankeras' => 'jk_pencuriankeras',
            'valjumlahselesai_pencuriankeras' => 'jumlahselesai_pencuriankeras',
            'valjktbd_pencuriankeras' => 'jktbd_pencuriankeras',
            'valkll_pencuriankeras' => 'kll_pencuriankeras',
            'valkt_pencuriankeras' => 'kt_pencuriankeras',          
            'valjk_penipuan' => 'jk_penipuan',
            'valjumlahselesai_penipuan' => 'jumlahselesai_penipuan',
            'valjktbd_penipuan' => 'jktbd_penipuan',
            'valkll_penipuan' => 'kll_penipuan',
            'valkt_penipuan' => 'kt_penipuan',          
            'valjk_penganiyayaan' => 'jk_penganiyayaan',
            'valjumlahselesai_penganiyayaan' => 'jumlahselesai_penganiyayaan',
            'valjktbd_penganiyayaan' => 'jktbd_penganiyayaan',
            'valkll_penganiyayaan' => 'kll_penganiyayaan',
            'valkt_penganiyayaan' => 'kt_penganiyayaan',          
            'valjk_pembakaran' => 'jk_pembakaran',
            'valjumlahselesai_pembakaran' => 'jumlahselesai_pembakaran',
            'valjktbd_pembakaran' => 'jktbd_pembakaran',
            'valkll_pembakaran' => 'kll_pembakaran',
            'valkt_pembakaran' => 'kt_pembakaran',        
            'valjk_pemerkosaan' => 'jk_pemerkosaan',
            'valjumlahselesai_pemerkosaan' => 'jumlahselesai_pemerkosaan',
            'valjktbd_pemerkosaan' => 'jktbd_pemerkosaan',
            'valkll_pemerkosaan' => 'kll_pemerkosaan',
            'valkt_pemerkosaan' => 'kt_pemerkosaan',         
            'valjk_narkoba' => 'jk_narkoba',
            'valjumlahselesai_narkoba' => 'jumlahselesai_narkoba',
            'valjktbd_narkoba' => 'jktbd_narkoba',
            'valkll_narkoba' => 'kll_narkoba',
            'valkt_narkoba' => 'kt_narkoba',         
            'valjk_perjudian' => 'jk_perjudian',
            'valjumlahselesai_perjudian' => 'jumlahselesai_perjudian',
            'valjktbd_perjudian' => 'jktbd_perjudian',
            'valkll_perjudian' => 'kll_perjudian',
            'valkt_perjudian' => 'kt_perjudian',         
            'valjk_pembunuhan' => 'jk_pembunuhan',
            'valjumlahselesai_pembunuhan' => 'jumlahselesai_pembunuhan',
            'valjktbd_pembunuhan' => 'jktbd_pembunuhan',
            'valkll_pembunuhan' => 'kll_pembunuhan',
            'valkt_pembunuhan' => 'kt_pembunuhan',          
            'valjk_perdaganganorang' => 'jk_perdaganganorang',
            'valjumlahselesai_perdaganganorang' => 'jumlahselesai_perdaganganorang',
            'valjktbd_perdaganganorang' => 'jktbd_perdaganganorang',
            'valkll_perdaganganorang' => 'kll_perdaganganorang',
            'valkt_perdaganganorang' => 'kt_perdaganganorang',           
            'valjk_korupsi' => 'jk_korupsi',
            'valjumlahselesai_korupsi' => 'jumlahselesai_korupsi',
            'valjktbd_korupsi' => 'jktbd_korupsi',
            'valkll_korupsi' => 'kll_korupsi',
            'valkt_korupsi' => 'kt_korupsi',           
            'valjk_lainnya' => 'jk_lainnya',
            'valjumlahselesai_lainnya' => 'jumlahselesai_lainnya',
            'valjktbd_lainnya' => 'jktbd_lainnya',
            'valkll_lainnya' => 'kll_lainnya',
            'valkt_lainnya' => 'kt_lainnya',
             
           

        ];
    }
}