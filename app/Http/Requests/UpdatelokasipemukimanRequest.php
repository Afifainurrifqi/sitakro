<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatelokasipemukimanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'valnik_kepala' => 'required|min:16|max:16',
            'valtempat_tinggal' => 'nullable',
            'valstatus_lahan' => 'nullable',
            'valluas_lantai_tinggal' => 'nullable',
            'valluas_tanah_tinggal' => 'nullable',
            'valjenis_lantai_tinggal' => 'nullable',
            'valdinding_sebagian' => 'nullable',
            'valjendela' => 'nullable',
            'valatap' => 'nullable',
            'valpenerangan' => 'nullable',
            'valenergi_masak' => 'nullable',
            'valjika_kayu_jenis' => 'nullable',
            'valtempat_sampah' => 'nullable',
            'valmck' => 'nullable',
            'valsumber_air_mandi' => 'nullable',
            'valsumber_air_mck' => 'nullable',
            'valsumber_air_minum' => 'nullable',
            'valtempat_pembuangan_limbah' => 'nullable',
            'valrumah_sutet' => 'nullable',
            'valrumah_sungai' => 'nullable',
            'valrumah_lereng_gunung' => 'nullable',
            'valkondi_rumah_kumuh' => 'nullable',

        ];
    }

    public function messages(): array
    {
        return [

            'valnik_kepala.required' => ':attribute tidak boleh kosong',
            'valtempat_tinggal.required' => ':attribute tidak boleh kosong',
            'valstatus_lahan.required' => ':attribute tidak boleh kosong',
            'valluas_lantai_tinggal.required' => ':attribute tidak boleh kosong',
            'valluas_tanah_tinggal.required' => ':attribute tidak boleh kosong',
            'valjenis_lantai_tinggal.required' => ':attribute tidak boleh kosong',
            'valdinding_sebagian.required' => ':attribute tidak boleh kosong',
            'valjendela.required' => ':attribute tidak boleh kosong',
            'valatap.required' => ':attribute tidak boleh kosong',
            'valpenerangan.required' => ':attribute tidak boleh kosong',
            'valenergi_masak.required' => ':attribute tidak boleh kosong',
            'valjika_kayu_jenis.required' => ':attribute tidak boleh kosong',
            'valtempat_sampah.required' => ':attribute tidak boleh kosong',
            'valmck.required' => ':attribute tidak boleh kosong',
            'valsumber_air_mandi.required' => ':attribute tidak boleh kosong',
            'valsumber_air_mck.required' => ':attribute tidak boleh kosong',
            'valsumber_air_minum.required' => ':attribute tidak boleh kosong',
            'valtempat_pembuangan_limbah.required' => ':attribute tidak boleh kosong',
            'valrumah_sutet.required' => ':attribute tidak boleh kosong',
            'valrumah_sungai.required' => ':attribute tidak boleh kosong',
            'valrumah_lereng_gunung.required' => ':attribute tidak boleh kosong',
            'valkondi_rumah_kumuh.required' => ':attribute tidak boleh kosong',



        ];
    }

    public function attributes(): array
    {
        return [
            'valnik_kepala' =>  'nik_kepala',
            'valtempat_tinggal' =>  'tempat_tinggal,',
            'valstatus_lahan' =>  'status_lahan',
            'valluas_lantai_tinggal' =>  'luas_lantai_tinggal,',
            'valluas_tanah_tinggal' =>  'luas_tanah_tinggal,',
            'valjenis_lantai_tinggal' =>  'jenis_lantai_tinggal',
            'valdinding_sebagian' =>  'dinding_sebagian',
            'valjendela' =>  'jendela,',
            'valatap' =>  'atap',
            'valpenerangan' =>  'penerangan,',
            'valenergi_masak' =>  'energi_masak',
            'valjika_kayu_jenis' =>  'jika_kayu_jenis',
            'valtempat_sampah' =>  'tempat_sampah',
            'valmck' =>  'mck',
            'valsumber_air_mandi' =>  'sumber_air_mandi',
            'valsumber_air_mck' =>  'sumber_air_mck',
            'valsumber_air_minum' =>  'sumber_air_minum',
            'valtempat_pembuangan_limbah' =>  'tempat_pembuangan_limbah',
            'valrumah_sutet' =>  'rumah_sutet',
            'valrumah_sungai' =>  'rumah_sungai,',
            'valrumah_lereng_gunung' =>  'rumah_lereng_gunung',
            'valkondi_rumah_kumuh' =>  'kondi_rumah_kumuh',

        ];
    }
}
