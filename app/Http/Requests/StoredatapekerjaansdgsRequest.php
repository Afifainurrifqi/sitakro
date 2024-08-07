<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredatapekerjaansdgsRequest extends FormRequest
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
            'valKondisipekerjaan' => 'nullable',
            'valPekerjaanutama' => 'nullable',
            'valJaminanketenagakerjaan' => 'nullable',

        ];
    }

    public function messages(): array
    {
    return [


        'valKondisipekerjaan.required' => ':attribute Kolom tidak boleh kosong',

        'valPekerjaanutama.required' => ':attribute Kolom tidak boleh kosong',

        'valJaminanketenagakerjaan.required' => ':attribute Kolom tidak boleh kosong',





    ];
    }

    public function attributes(): array
{
    return [
        'valKondisipekerjaan' => 'Pekerjaanutama',
        'valPekerjaanutama' => 'Pekerjaanutama',
        'valJaminanketenagakerjaan' => 'Jaminanketenagakerjaan',


    ];
}
}
