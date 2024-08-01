<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorejenisdisabilitasRequest extends FormRequest
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
            'valjenisdisab'  => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [

            'valjenisdisab.required'  => ':attribute tidak boleh kosong',



        ];
    }

    public function attributes(): array
    {
        return [
            'valjenisdisab' => 'Jenis disabilitas',

        ];
    }
}
