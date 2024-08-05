<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedataindividuRequest extends FormRequest
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

            'valSukubangsa' => 'nullable',
            'valWarganegara' => 'nullable',

        ];
    }


    public function messages(): array
    {
    return [




        'valSukubangsa.nullable' => ':attribute Kolom tidak boleh kosong',

        'valWarganegara.nullable' => ':attribute Kolom tidak boleh kosong',





    ];
    }

    public function attributes(): array
{
    return [

        'valSukubangsa' => 'Sukubangsa',
        'valWarganegara' => 'Warganegara',

    ];
}
}
