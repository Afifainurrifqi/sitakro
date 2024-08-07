<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_bencanaRequest extends FormRequest
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
            'valk_longsor' => 'nullable',
            'valf_longsor' => 'nullable',
            'valkj_longsor' => 'nullable',
            'valjp_longsor' => 'nullable',
            'valwt_longsor' => 'nullable',
            'valk_banjir' => 'nullable',
            'valf_banjir' => 'nullable',
            'valkj_banjir' => 'nullable',
            'valjp_banjir' => 'nullable',
            'valwt_banjir' => 'nullable',
            'valk_bandang' => 'nullable',
            'valf_bandang' => 'nullable',
            'valkj_bandang' => 'nullable',
            'valjp_bandang' => 'nullable',
            'valwt_bandang' => 'nullable',
            'valk_gempa' => 'nullable',
            'valf_gempa' => 'nullable',
            'valkj_gempa' => 'nullable',
            'valjp_gempa' => 'nullable',
            'valwt_gempa' => 'nullable',
            'valk_tsunami' => 'nullable',
            'valf_tsunami' => 'nullable',
            'valkj_tsunami' => 'nullable',
            'valjp_tsunami' => 'nullable',
            'valwt_tsunami' => 'nullable',
            'valk_puyuh' => 'nullable',
            'valf_puyuh' => 'nullable',
            'valkj_puyuh' => 'nullable',
            'valjp_puyuh' => 'nullable',
            'valwt_puyuh' => 'nullable',
            'valk_gunungm' => 'nullable',
            'valf_gunungm' => 'nullable',
            'valkj_gunungm' => 'nullable',
            'valjp_gunungm' => 'nullable',
            'valwt_gunungm' => 'nullable',
            'valk_hutank' => 'nullable',
            'valf_hutank' => 'nullable',
            'valkj_hutank' => 'nullable',
            'valjp_hutank' => 'nullable',
            'valwt_hutank' => 'nullable',
            'valk_kekeringan' => 'nullable',
            'valf_kekeringan' => 'nullable',
            'valkj_kekeringan' => 'nullable',
            'valjp_kekeringan' => 'nullable',
            'valwt_kekeringan' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'valk_longsor.required' => ':Attribute tidak boleh kosong',
            'valf_longsor.required' => ':Attribute tidak boleh kosong',
            'valkj_longsor.required' => ':Attribute tidak boleh kosong',
            'valjp_longsor.required' => ':Attribute tidak boleh kosong',
            'valwt_longsor.required' => ':Attribute tidak boleh kosong',
            'valk_banjir.required' => ':Attribute tidak boleh kosong',
            'valf_banjir.required' => ':Attribute tidak boleh kosong',
            'valkj_banjir.required' => ':Attribute tidak boleh kosong',
            'valjp_banjir.required' => ':Attribute tidak boleh kosong',
            'valwt_banjir.required' => ':Attribute tidak boleh kosong',
            'valk_bandang.required' => ':Attribute tidak boleh kosong',
            'valf_bandang.required' => ':Attribute tidak boleh kosong',
            'valkj_bandang.required' => ':Attribute tidak boleh kosong',
            'valjp_bandang.required' => ':Attribute tidak boleh kosong',
            'valwt_bandang.required' => ':Attribute tidak boleh kosong',
            'valk_gempa.required' => ':Attribute tidak boleh kosong',
            'valf_gempa.required' => ':Attribute tidak boleh kosong',
            'valkj_gempa.required' => ':Attribute tidak boleh kosong',
            'valjp_gempa.required' => ':Attribute tidak boleh kosong',
            'valwt_gempa.required' => ':Attribute tidak boleh kosong',
            'valk_tsunami.required' => ':Attribute tidak boleh kosong',
            'valf_tsunami.required' => ':Attribute tidak boleh kosong',
            'valkj_tsunami.required' => ':Attribute tidak boleh kosong',
            'valjp_tsunami.required' => ':Attribute tidak boleh kosong',
            'valwt_tsunami.required' => ':Attribute tidak boleh kosong',
            'valk_puyuh.required' => ':Attribute tidak boleh kosong',
            'valf_puyuh.required' => ':Attribute tidak boleh kosong',
            'valkj_puyuh.required' => ':Attribute tidak boleh kosong',
            'valjp_puyuh.required' => ':Attribute tidak boleh kosong',
            'valwt_puyuh.required' => ':Attribute tidak boleh kosong',
            'valk_gunungm.required' => ':Attribute tidak boleh kosong',
            'valf_gunungm.required' => ':Attribute tidak boleh kosong',
            'valkj_gunungm.required' => ':Attribute tidak boleh kosong',
            'valjp_gunungm.required' => ':Attribute tidak boleh kosong',
            'valwt_gunungm.required' => ':Attribute tidak boleh kosong',
            'valk_hutank.required' => ':Attribute tidak boleh kosong',
            'valf_hutank.required' => ':Attribute tidak boleh kosong',
            'valkj_hutank.required' => ':Attribute tidak boleh kosong',
            'valjp_hutank.required' => ':Attribute tidak boleh kosong',
            'valwt_hutank.required' => ':Attribute tidak boleh kosong',
            'valk_kekeringan.required' => ':Attribute tidak boleh kosong',
            'valf_kekeringan.required' => ':Attribute tidak boleh kosong',
            'valkj_kekeringan.required' => ':Attribute tidak boleh kosong',
            'valjp_kekeringan.required' => ':Attribute tidak boleh kosong',
            'valwt_kekeringan.required' => ':Attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [


            'valk_longsor' => 'k_longsor',
            'valf_longsor' => 'f_longsor',
            'valkj_longsor' => 'kj_longsor',
            'valjp_longsor' => 'jp_longsor',
            'valwt_longsor' => 'wt_longsor',
            'valk_banjir' => 'k_banjir',
            'valf_banjir' => 'f_banjir',
            'valkj_banjir' => 'kj_banjir',
            'valjp_banjir' => 'jp_banjir',
            'valwt_banjir' => 'wt_banjir',
            'valk_bandang' => 'k_bandang',
            'valf_bandang' => 'f_bandang',
            'valkj_bandang' => 'kj_bandang',
            'valjp_bandang' => 'jp_bandang',
            'valwt_bandang' => 'wt_bandang',
            'valk_gempa' => 'k_gempa',
            'valf_gempa' => 'f_gempa',
            'valkj_gempa' => 'kj_gempa',
            'valjp_gempa' => 'jp_gempa',
            'valwt_gempa' => 'wt_gempa',
            'valk_tsunami' => 'k_tsunami',
            'valf_tsunami' => 'f_tsunami',
            'valkj_tsunami' => 'kj_tsunami',
            'valjp_tsunami' => 'jp_tsunami',
            'valwt_tsunami' => 'wt_tsunami',
            'valk_puyuh' => 'k_puyuh',
            'valf_puyuh' => 'f_puyuh',
            'valkj_puyuh' => 'kj_puyuh',
            'valjp_puyuh' => 'jp_puyuh',
            'valwt_puyuh' => 'wt_puyuh',
            'valk_gunungm' => 'k_gunungm',
            'valf_gunungm' => 'f_gunungm',
            'valkj_gunungm' => 'kj_gunungm',
            'valjp_gunungm' => 'jp_gunungm',
            'valwt_gunungm' => 'wt_gunungm',
            'valk_hutank' => 'k_hutank',
            'valf_hutank' => 'f_hutank',
            'valkj_hutank' => 'kj_hutank',
            'valjp_hutank' => 'jp_hutank',
            'valwt_hutank' => 'wt_hutank',
            'valk_kekeringan' => 'k_kekeringan',
            'valf_kekeringan' => 'f_kekeringan',
            'valkj_kekeringan' => 'kj_kekeringan',
            'valjp_kekeringan' => 'jp_kekeringan',
            'valwt_kekeringan' => 'wt_kekeringan',



        ];
    }
}


