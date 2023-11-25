<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorelainkRequest extends FormRequest
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
            
            'valpengtransportsebelum' => 'required',
            'valpengtransportsesudah' => 'required',
            'valblt' => 'required',
            'valpkh' => 'required',
            'valbst' => 'required',
            'valbantuan_presiden' => 'required',
            'valbantuan_umkm' => 'required',
            'valbantuan_pekerja' => 'required',
            'valbantuan_anak' => 'required',
            'vallainnya' => 'required',
            'valrata_rata' => 'required',
           
           
        ];
    }

    public function messages(): array
    {
        return [

            'valpengtransportsebelum.required' => ': attribute tidak boleh kosong',
            'valpengtransportsesudah.required' => ': attribute tidak boleh kosong',
            'valblt.required' => ': attribute tidak boleh kosong',
            'valpkh.required' => ': attribute tidak boleh kosong',
            'valbst.required' => ': attribute tidak boleh kosong',
            'valbantuan_presiden.required' => ': attribute tidak boleh kosong',
            'valbantuan_umkm.required' => ': attribute tidak boleh kosong',
            'valbantuan_pekerja.required' => ': attribute tidak boleh kosong',
            'valbantuan_anak.required' => ': attribute tidak boleh kosong',
            'vallainnya.required' => ': attribute tidak boleh kosong',
            'valrata_rata.required' => ': attribute tidak boleh kosong',
           



        ];
    }

    public function attributes(): array
    {
        return [

            'valpengtransportsebelum' =>  'pengtransportsebelum',
            'valpengtransportsesudah' =>  'pengtransportsesudah',
            'valblt' =>  'blt',
            'valpkh' =>  'pkh',
            'valbst' =>  'bst',
            'valbantuan_presiden' =>  'bantuan_presiden',
            'valbantuan_umkm' =>  'bantuan_umkm',
            'valbantuan_pekerja' =>  'bantuan_pekerja',
            'valbantuan_anak' =>  'bantuan_anak',
            'vallainnya' =>  'lainnya',
            'valrata_rata' =>  'rata_rata',
             
           

        ];
    }
}

