<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatert_fasilitas_ekonomiRequest extends FormRequest
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

            'valkredit_usaha' => 'nullable',
            'valkredit_ketahanan' => 'nullable',
            'valkredit_kecil' => 'nullable',
            'valkelompok_usaha' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'valkredit_usaha.required' => ':Attribute tidak boleh kosong',
            'valkredit_ketahanan.required' => ':Attribute tidak boleh kosong',
            'valkredit_kecil.required' => ':Attribute tidak boleh kosong',
            'valkelompok_usaha.required' => ':Attribute tidak boleh kosong',

        ];
    }

    public function attributes(): array
    {
        return [

            'valkredit_usaha' =>'valkredit_usaha',
            'valkredit_ketahanan' =>'valkredit_ketahanan',
            'valkredit_kecil' =>'valkredit_kecil',
            'valkelompok_usaha' =>'valkelompok_usaha',

        ];
    }
}
