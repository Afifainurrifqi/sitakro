<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatertpuengurusRequest extends FormRequest
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

            'valnama_ketuarw' => 'nullable',
            'valnik_ketuarw' => 'nullable',
            'valnohp_ketuarw' => 'nullable',
            'valmenjabat_ketuarw' => 'nullable',
            'valnama_sekrw' => 'nullable',
            'valnik_sekrw' => 'nullable',
            'valnohp_sekrw' => 'nullable',
            'valmenjabat_sekrw' => 'nullable',
            'valnama_benrw' => 'nullable',
            'valnik_benrw' => 'nullable',
            'valnohp_benrw' => 'nullable',
            'valmenjabat_benrw' => 'nullable',
            'valnama_ketuart' => 'nullable',
            'valnik_ketuart' => 'nullable',
            'valnohp_ketuart' => 'nullable',
            'valmenjabat_ketuart' => 'nullable',
            'valnama_sekrt' => 'nullable',
            'valnik_sekrt' => 'nullable',
            'valnohp_sekrt' => 'nullable',
            'valmenjabat_sekrt' => 'nullable',
            'valnama_benrt' => 'nullable',
            'valnik_benrt' => 'nullable',
            'valnohp_benrt' => 'nullable',
            'valmenjabat_benrt' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [
            'valnama_ketuarw.required' => ':Attribute tidak boleh kosong',
            'valnik_ketuarw.required' => ':Attribute tidak boleh kosong',
            'valnohp_ketuarw.required' => ':Attribute tidak boleh kosong',
            'valmenjabat_ketuarw.required' => ':Attribute tidak boleh kosong',
            'valnama_sekrw.required' => ':Attribute tidak boleh kosong',
            'valnik_sekrw.required' => ':Attribute tidak boleh kosong',
            'valnohp_sekrw.required' => ':Attribute tidak boleh kosong',
            'valmenjabat_sekrw.required' => ':Attribute tidak boleh kosong',
            'valnama_benrw.required' => ':Attribute tidak boleh kosong',
            'valnik_benrw.required' => ':Attribute tidak boleh kosong',
            'valnohp_benrw.required' => ':Attribute tidak boleh kosong',
            'valmenjabat_benrw.required' => ':Attribute tidak boleh kosong',
            'valnama_ketuart.required' => ':Attribute tidak boleh kosong',
            'valnik_ketuart.required' => ':Attribute tidak boleh kosong',
            'valnohp_ketuart.required' => ':Attribute tidak boleh kosong',
            'valmenjabat_ketuart.required' => ':Attribute tidak boleh kosong',
            'valnama_sekrt.required' => ':Attribute tidak boleh kosong',
            'valnik_sekrt.required' => ':Attribute tidak boleh kosong',
            'valnohp_sekrt.required' => ':Attribute tidak boleh kosong',
            'valmenjabat_sekrt.required' => ':Attribute tidak boleh kosong',
            'valnama_benrt.required' => ':Attribute tidak boleh kosong',
            'valnik_benrt.required' => ':Attribute tidak boleh kosong',
            'valnohp_benrt.required' => ':Attribute tidak boleh kosong',
            'valmenjabat_benrt.required' => ':Attribute tidak boleh kosong',

        ];
    }

    public function attributes(): array
    {
        return [
            'valnama_ketuarw' => 'nama_ketuarw',
            'valnik_ketuarw' => 'nik_ketuarw',
            'valnohp_ketuarw' => 'nohp_ketuarw',
            'valmenjabat_ketuarw' => 'menjabat_ketuarw',
            'valnama_sekrw' => 'nama_sekrw',
            'valnik_sekrw' => 'nik_sekrw',
            'valnohp_sekrw' => 'nohp_sekrw',
            'valmenjabat_sekrw' => 'menjabat_sekrw',
            'valnama_benrw' => 'nama_benrw',
            'valnik_benrw' => 'nik_benrw',
            'valnohp_benrw' => 'nohp_benrw',
            'valmenjabat_benrw' => 'menjabat_benrw',
            'valnama_ketuart' => 'nama_ketuart',
            'valnik_ketuart' => 'nik_ketuart',
            'valnohp_ketuart' => 'nohp_ketuart',
            'valmenjabat_ketuart' => 'menjabat_ketuart',
            'valnama_sekrt' => 'nama_sekrt',
            'valnik_sekrt' => 'nik_sekrt',
            'valnohp_sekrt' => 'nohp_sekrt',
            'valmenjabat_sekrt' => 'menjabat_sekrt',
            'valnama_benrt' => 'nama_benrt',
            'valnik_benrt' => 'nik_benrt',
            'valnohp_benrt' => 'nohp_benrt',
            'valmenjabat_benrt' => 'menjabat_benrt',
        ];
    }
}
