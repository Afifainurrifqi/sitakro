<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatelainkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'valpengtransportsebelum' => 'nullable',
            'valpengtransportsesudah' => 'nullable',
            'valblt' => 'nullable',
            'valpkh' => 'nullable',
            'valbst' => 'nullable',
            'valbantuan_presiden' => 'nullable',
            'valbantuan_umkm' => 'nullable',
            'valbantuan_pekerja' => 'nullable',
            'valbantuan_anak' => 'nullable',
            'vallainnya' => 'nullable',
            'valrata_rata' => 'nullable',


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
