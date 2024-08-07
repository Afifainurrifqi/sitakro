<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatelembaga_masyarakatRequest extends FormRequest
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


            'valnama'  => 'nullable',
            'valjumlah_kel'  => 'nullable',
            'valjumlah_peng'  => 'nullable',
            'valjumlah_ang'  => 'nullable',
            'valfasilitas'  => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [
            'valnama.required' => ':Attribute tidak boleh kosong',
            'valjumlah_kel.required' => ':Attribute tidak boleh kosong',
            'valjumlah_peng.required' => ':Attribute tidak boleh kosong',
            'valjumlah_ang.required' => ':Attribute tidak boleh kosong',
            'valfasilitas.required' => ':Attribute tidak boleh kosong',


        ];
    }

    public function attributes(): array
    {
        return [


            'valnama' => 'valnama',
            'valjumlah_kel' => 'valjumlah_kel',
            'valjumlah_peng' => 'valjumlah_peng',
            'valjumlah_ang' => 'valjumlah_ang',
            'valfasilitas' => 'valfasilitas',


        ];
    }
}



