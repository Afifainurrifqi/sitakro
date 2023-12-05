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

            'valnama_ketuarw' => 'required',
            'valnik_ketuarw' => 'required',
            'valnohp_ketuarw' => 'required',
            'valmenjabat_ketuarw' => 'required',
            'valnama_sekrw' => 'required',
            'valnik_sekrw' => 'required',
            'valnohp_sekrw' => 'required',
            'valmenjabat_sekrw' => 'required',
            'valnama_benrw' => 'required',
            'valnik_benrw' => 'required',
            'valnohp_benrw' => 'required',
            'valmenjabat_benrw' => 'required',
            'valnama_ketuart' => 'required',
            'valnik_ketuart' => 'required',
            'valnohp_ketuart' => 'required',
            'valmenjabat_ketuart' => 'required',
            'valnama_sekrt' => 'required',
            'valnik_sekrt' => 'required',
            'valnohp_sekrt' => 'required',
            'valmenjabat_sekrt' => 'required',
            'valnama_benrt' => 'required',
            'valnik_benrt' => 'required',
            'valnohp_benrt' => 'required',
            'valmenjabat_benrt' => 'required',
           
           
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
