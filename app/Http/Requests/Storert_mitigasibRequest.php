<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_mitigasibRequest extends FormRequest
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


            'valmitigasi_sp' => 'nullable',
            'valmitigasi_spd' => 'nullable',
            'valmitigasi_pk' => 'nullable',
            'valmitigasi_rrj' => 'nullable',
            'valmitigasi_ppn' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'valmitigasi_sp.required' => ':Attribute tidak boleh kosong',
            'valmitigasi_spd.required' => ':Attribute tidak boleh kosong',
            'valmitigasi_pk.required' => ':Attribute tidak boleh kosong',
            'valmitigasi_rrj.required' => ':Attribute tidak boleh kosong',
            'valmitigasi_ppn.required' => ':Attribute tidak boleh kosong',



        ];
    }

    public function attributes(): array
    {
        return [


            'valmitigasi_sp' => 'mitigasi_sp',
            'valmitigasi_spd' => 'mitigasi_spd',
            'valmitigasi_pk' => 'mitigasi_pk',
            'valmitigasi_rrj' => 'mitigasi_rrj',
            'valmitigasi_ppn' => 'mitigasi_ppn',



        ];
    }
}
