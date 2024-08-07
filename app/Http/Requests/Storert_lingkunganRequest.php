<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_lingkunganRequest extends FormRequest
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
            'vallingkungan_lsi' => 'nullable',
            'vallingkungan_slno' => 'nullable',
            'vallingkungan_k' => 'nullable',
            'vallingkungan_hl' => 'nullable',
            'vallingkungan_t' => 'nullable',
            'vallingkungan_kte' => 'nullable',
            'vallingkungan_lgt' => 'nullable',
            'vallingkungan_lpp' => 'nullable',
            'vallingkungan_ah' => 'nullable',
            'vallingkungan_lpns' => 'nullable',
            'vallingkungan_lpertambangan' => 'nullable',
            'vallingkungan_lperumahan' => 'nullable',
            'vallingkungan_lperkantoran' => 'nullable',
            'vallingkungan_lindustri' => 'nullable',
            'vallingkungan_fu' => 'nullable',
            'vallingkungan_ll' => 'nullable',
            'vallingkungan_nsym' => 'nullable',
            'vallingkungan_ndws' => 'nullable',
            'vallingkungan_jma' => 'nullable',
            'vallingkungan_je' => 'nullable',
            'vallingkungan_ksb' => 'nullable',
            'vallingkungan_ks' => 'nullable',
            'vallingkungan_ki' => 'nullable',
            'vallingkungan_kd' => 'nullable',
            'vallingkungan_ke' => 'nullable',
            'vallingkungan_pair' => 'nullable',
            'vallingkungan_ptanah' => 'nullable',
            'vallingkungan_pudara' => 'nullable',
            'vallingkungan_pdusl' => 'nullable',
            'vallingkungan_kmml' => 'nullable',
            'vallingkungan_klpg' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'vallingkungan_lsi.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_slno.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_k.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_hl.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_t.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_kte.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_lgt.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_lpp.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_ah.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_lpns.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_lpertambangan.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_lperumahan.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_lperkantoran.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_lindustri.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_fu.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_ll.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_nsym.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_ndws.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_jma.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_je.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_ksb.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_ks.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_ki.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_kd.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_ke.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_pair.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_ptanah.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_pudara.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_pdusl.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_kmml.required' => ':Attribute tidak boleh kosong',
            'vallingkungan_klpg.required' => ':Attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [


            'vallingkungan_lsi' => 'lingkungan_lsi',
            'vallingkungan_slno' => 'lingkungan_slno',
            'vallingkungan_k' => 'lingkungan_k',
            'vallingkungan_hl' => 'lingkungan_hl',
            'vallingkungan_t' => 'lingkungan_t',
            'vallingkungan_kte' => 'lingkungan_kte',
            'vallingkungan_lgt' => 'lingkungan_lgt',
            'vallingkungan_lpp' => 'lingkungan_lpp',
            'vallingkungan_ah' => 'lingkungan_ah',
            'vallingkungan_lpns' => 'lingkungan_lpns',
            'vallingkungan_lpertambangan' => 'lingkungan_lpertambangan',
            'vallingkungan_lperumahan' => 'lingkungan_lperumahan',
            'vallingkungan_lperkantoran' => 'lingkungan_lperkantoran',
            'vallingkungan_lindustri' => 'lingkungan_lindustri',
            'vallingkungan_fu' => 'lingkungan_fu',
            'vallingkungan_ll' => 'lingkungan_ll',
            'vallingkungan_nsym' => 'lingkungan_nsym',
            'vallingkungan_ndws' => 'lingkungan_ndws',
            'vallingkungan_jma' => 'lingkungan_jma',
            'vallingkungan_je' => 'lingkungan_je',
            'vallingkungan_ksb' => 'lingkungan_ksb',
            'vallingkungan_ks' => 'lingkungan_ks',
            'vallingkungan_ki' => 'lingkungan_ki',
            'vallingkungan_kd' => 'lingkungan_kd',
            'vallingkungan_ke' => 'lingkungan_ke',
            'vallingkungan_pair' => 'lingkungan_pair',
            'vallingkungan_ptanah' => 'lingkungan_ptanah',
            'vallingkungan_pudara' => 'lingkungan_pudara',
            'vallingkungan_pdusl' => 'lingkungan_pdusl',
            'vallingkungan_kmml' => 'lingkungan_kmml',
            'vallingkungan_klpg' => 'lingkungan_klpg',





        ];
    }
}
