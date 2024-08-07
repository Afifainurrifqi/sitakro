<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredatadasawismaRequest extends FormRequest
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
            'valEmails' => 'required',
            'valPassword' => 'required',
            'valRole' => 'required',
            'valNamakelompok' => 'required',
        ];
    }
    public function messages(): array
    {
    return [

        'valEmails.required' => ':attribute Kolom tidak boleh kosong',

        'valPassword.required' => ':attribute Kolom tidak boleh kosong',

        'valRole.required' => ':attribute Kolom tidak boleh kosong',

        'valNamakelompok.required' => ':attribute Kolom tidak boleh kosong',
    ];
    }
    public function attributes(): array
{
    return [
        'valEmails' => 'Emails',
        'valPassword' => 'Password',
        'valRole' => 'Role',
        'valNamakelompok' => 'Nama Kelompok',
    ];
}
}
