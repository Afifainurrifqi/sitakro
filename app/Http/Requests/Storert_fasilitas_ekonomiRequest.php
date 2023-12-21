<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_fasilitas_ekonomiRequest extends FormRequest
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
            
            'valkredit_usaha' => 'required',
            'valkredit_ketahanan' => 'required',
            'valkredit_kecil' => 'required',
            'valkelompok_usaha' => 'required',
           
           
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
