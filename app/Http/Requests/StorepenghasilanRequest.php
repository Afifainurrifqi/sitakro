<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepenghasilanRequest extends FormRequest
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
            'valSumberpenghasilan' => 'nullable',
            'valJumlahasset' => 'nullable',
            'valSatuan' => 'nullable',
            'valPenghasilanset' => 'nullable',
            'valExport' => 'nullable',
        ];
    }

    public function messages(): array
    {
    return [


        'valSumberpenghasilan.required' => ':attribute tidak boleh kosong',

        'valJumlahasset.required' => ':attribute tidak boleh kosong',

        'valSatuan.required' => ':attribute tidak boleh kosong',

        'valPenghasilanset.required' => ':attribute tidak boleh kosong',

        'valExport.required' => ':attribute tidak boleh kosong',



    ];
    }

    public function attributes(): array
{
    return [
        'valSumberpenghasilan' => 'Sumberpenghasilan',
        'valJumlahasset' => 'Jumlahasset',
        'valSatuan' => 'Satuan',
        'valPenghasilanset' => 'Penghasilansetahun',
        'valExport' => 'Export',

    ];
}
}
