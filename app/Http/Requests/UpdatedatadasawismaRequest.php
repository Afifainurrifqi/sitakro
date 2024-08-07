<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedatadasawismaRequest extends FormRequest
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
            'valNIK' => 'NIK',
            'valNama' => 'Nama',
            'valAlamat' => 'Alamat',
            'valNohp' => 'validateNohp',
            'valRT' => 'RT',
            'valRW' => 'RW',
            'valEmails' => 'required',
            'valPassword' => 'required',
            'valRole' => 'required',
            'valNamakelompok' => 'required',
        ];
    }
    public function messages(): array
    {
        return [


            'valNIK.required' => ':attribute Kolom tidak boleh kosong',

            'valNama.required' => ':attribute Kolom tidak boleh kosong',

            'valAlamat.required' => ':attribute Kolom tidak boleh kosong',

            'valNohp.required' => ':attribute Kolom tidak boleh kosong',

            'valRT.required' => ':attribute Kolom tidak boleh kosong',

            'valRW.required' => ':attribute Kolom tidak boleh kosong',

            'valEmails.required' => ':attribute Kolom tidak boleh kosong',

            'valPassword.required' => ':attribute Kolom tidak boleh kosong',

            'valRole.required' => ':attribute Kolom tidak boleh kosong',

            'valNamakelompok.required' => ':attribute Kolom tidak boleh kosong',



        ];
    }
    public function attributes(): array
    {
        return [
            'valNIK' => 'NIK',
            'valNama' => 'Nama',
            'valAlamat' => 'Alamat',
            'valNohp' => 'Nohp',
            'valRT' => 'RT',
            'valRW' => 'RW',
            'valEmails' => 'Emails',
            'valPassword' => 'Password',
            'valRole' => 'Role',
            'valNamakelompok' => 'Nama Kelompok',
        ];
    }
}
