<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storedata_rtRequest extends FormRequest
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

            'valnama_ketuart' => 'nullable',
            'valalamat' => 'nullable',
            'valrt' => 'nullable',
            'valrw' => 'nullable',
            'valnohp' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'valnama_ketuart.required' => ':Attribute tidak boleh kosong',
            'valalamat.required' => ':Attribute tidak boleh kosong',
            'valrt.required' => ':Attribute tidak boleh kosong',
            'valrw.required' => ':Attribute tidak boleh kosong',
            'valnohp.required' => ':Attribute tidak boleh kosong',

        ];
    }

    public function attributes(): array
    {
        return [

            'valnama_ketuart' => 'nama_ketuart',
            'valalamat' => 'alamat',
            'valrt' => 'rt',
            'valrw' => 'rw',
            'valnohp' => 'nohp',



        ];
    }
}

