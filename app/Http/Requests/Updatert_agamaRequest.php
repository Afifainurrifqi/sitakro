<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatert_agamaRequest extends FormRequest
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
            'valjumlahwarga_jamkes' => 'nullable',
            'valjumlahwarga_jamketerangan' => 'nullable',
            'valjumlahtempat_masjid' => 'nullable',
            'valjumlahtempat_musholla' => 'nullable',
            'valjumlahtempat_kristen' => 'nullable',
            'valjumlahtempat_katolik' => 'nullable',
            'valjumlahtempat_kapel' => 'nullable',
            'valjumlahtempat_pura' => 'nullable',
            'valjumlahtempat_wihara' => 'nullable',
            'valjumlahtempat_kelenteng' => 'nullable',
            'valjumlahtempat_lainnya' => 'nullable',
            'valcagar_bud1' => 'nullable',
            'valcagar_bud2' => 'nullable',
            'valcagar_bud3' => 'nullable',
            'valsukuasing_keluarga' => 'nullable',
            'valsukuasing_jiwa' => 'nullable',
            'valruangpublik_terbuka' => 'nullable',
            'valadat_kehamilan' => 'nullable',
            'valadat_kelahiran' => 'nullable',
            'valadat_pekerjaan' => 'nullable',
            'valadat_alam' => 'nullable',
            'valadat_perkawinan' => 'nullable',
            'valadat_kehidupanwarga' => 'nullable',
            'valadat_kematian' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'valjumlahwarga_jamkes.required' => ':Attribute tidak boleh kosong',
            'valjumlahwarga_jamketerangan.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_masjid.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_musholla.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_kristen.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_katolik.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_kapel.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_pura.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_wihara.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_kelenteng.required' => ':Attribute tidak boleh kosong',
            'valjumlahtempat_lainnya.required' => ':Attribute tidak boleh kosong',
            'valcagar_bud1.required' => ':Attribute tidak boleh kosong',
            'valcagar_bud2.required' => ':Attribute tidak boleh kosong',
            'valcagar_bud3.required' => ':Attribute tidak boleh kosong',
            'valsukuasing_keluarga.required' => ':Attribute tidak boleh kosong',
            'valsukuasing_jiwa.required' => ':Attribute tidak boleh kosong',
            'valruangpublik_terbuka.required' => ':Attribute tidak boleh kosong',
            'valadat_kehamilan.required' => ':Attribute tidak boleh kosong',
            'valadat_kelahiran.required' => ':Attribute tidak boleh kosong',
            'valadat_pekerjaan.required' => ':Attribute tidak boleh kosong',
            'valadat_alam.required' => ':Attribute tidak boleh kosong',
            'valadat_perkawinan.required' => ':Attribute tidak boleh kosong',
            'valadat_kehidupanwarga.required' => ':Attribute tidak boleh kosong',
            'valadat_kematian.required' => ':Attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [

            'valjumlahwarga_jamkes' => 'jumlahwarga_jamkes',
            'valjumlahwarga_jamketerangan' => 'jumlahwarga_jamketerangan',
            'valjumlahtempat_masjid' => 'jumlahtempat_masjid',
            'valjumlahtempat_musholla' => 'jumlahtempat_musholla',
            'valjumlahtempat_kristen' => 'jumlahtempat_kristen',
            'valjumlahtempat_katolik' => 'jumlahtempat_katolik',
            'valjumlahtempat_kapel' => 'jumlahtempat_kapel',
            'valjumlahtempat_pura' => 'jumlahtempat_pura',
            'valjumlahtempat_wihara' => 'jumlahtempat_wihara',
            'valjumlahtempat_kelenteng' => 'jumlahtempat_kelenteng',
            'valjumlahtempat_lainnya' => 'jumlahtempat_lainnya',
            'valcagar_bud1' => 'cagar_bud1',
            'valcagar_bud2' => 'cagar_bud2',
            'valcagar_bud3' => 'cagar_bud3',
            'valsukuasing_keluarga' => 'sukuasing_keluarga',
            'valsukuasing_jiwa' => 'sukuasing_jiwa',
            'valruangpublik_terbuka' => 'ruangpublik_terbuka',
            'valadat_kehamilan' => 'adat_kehamilan',
            'valadat_kelahiran' => 'adat_kelahiran',
            'valadat_pekerjaan' => 'adat_pekerjaan',
            'valadat_alam' => 'adat_alam',
            'valadat_perkawinan' => 'adat_perkawinan',
            'valadat_kehidupanwarga' => 'adat_kehidupanwarga',
            'valadat_kematian' => 'adat_kematian',



        ];
    }
}
