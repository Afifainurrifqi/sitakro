<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorelokasipemukimanRequest extends FormRequest
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
           
            'valnik_kepala' => 'required|min:16|max:16',
            'valtempat_tinggal' => 'required',
            'valstatus_lahan' => 'required',
            'valluas_lantai_tinggal' => 'required',
            'valluas_tanah_tinggal' => 'required',
            'valjenis_lantai_tinggal' => 'required',
            'valdinding_sebagian' => 'required',
            'valjendela' => 'required',
            'valatap' => 'required',
            'valpenerangan' => 'required',
            'valenergi_masak' => 'required',
            'valjika_kayu_jenis' => 'required',
            'valtempat_sampah' => 'required',
            'valmck' => 'required',
            'valsumber_air_mandi' => 'required',
            'valsumber_air_mck' => 'required',
            'valsumber_air_minum' => 'required',
            'valtempat_pembuangan_limbah' => 'required',
            'valrumah_sutet' => 'required',
            'valrumah_sungai' => 'required',
            'valrumah_lereng_gunung' => 'required',
            'valkondi_rumah_kumuh' => 'required',

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
