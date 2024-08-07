<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatert_keamananRequest extends FormRequest
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
            'valpenyebabu_antarkelompokmas' => 'nullable',
            'valjk_antarkelompokmas' => 'nullable',
            'valjkl_antarkelompokmas' => 'nullable',
            'valjt_antarkelompokmas' => 'nullable',
            'valpen_antarkelompokmas' => 'nullable',
            'valpp_antarkelompokmas' => 'nullable',
            'valpenyebabu_antardesa' => 'nullable',
            'valjk_antardesa' => 'nullable',
            'valjkl_antardesa' => 'nullable',
            'valjt_antardesa' => 'nullable',
            'valpen_antardesa' => 'nullable',
            'valpp_antardesa' => 'nullable',
            'valpenyebabu_aparatmk' => 'nullable',
            'valjk_aparatmk' => 'nullable',
            'valjkl_aparatmk' => 'nullable',
            'valjt_aparatmk' => 'nullable',
            'valpen_aparatmk' => 'nullable',
            'valpp_aparatmk' => 'nullable',
            'valpenyebabu_aparatmp' => 'nullable',
            'valjk_aparatmp' => 'nullable',
            'valjkl_aparatmp' => 'nullable',
            'valjt_aparatmp' => 'nullable',
            'valpen_aparatmp' => 'nullable',
            'valpp_aparatmp' => 'nullable',
            'valpenyebabu_aparatk' => 'nullable',
            'valjk_aparatk' => 'nullable',
            'valjkl_aparatk' => 'nullable',
            'valjt_aparatk' => 'nullable',
            'valpen_aparatk' => 'nullable',
            'valpp_aparatk' => 'nullable',
            'valpenyebabu_aparatp' => 'nullable',
            'valjk_aparatp' => 'nullable',
            'valjkl_aparatp' => 'nullable',
            'valjt_aparatp' => 'nullable',
            'valpen_aparatp' => 'nullable',
            'valpp_aparatp' => 'nullable',
            'valpenyebabu_pelajar' => 'nullable',
            'valjk_pelajar' => 'nullable',
            'valjkl_pelajar' => 'nullable',
            'valjt_pelajar' => 'nullable',
            'valpen_pelajar' => 'nullable',
            'valpp_pelajar' => 'nullable',
            'valpenyebabu_suku' => 'nullable',
            'valjk_suku' => 'nullable',
            'valjkl_suku' => 'nullable',
            'valjt_suku' => 'nullable',
            'valpen_suku' => 'nullable',
            'valpp_suku' => 'nullable',
            'valpenyebabu_lainnya' => 'nullable',
            'valjk_lainnya' => 'nullable',
            'valjkl_lainnya' => 'nullable',
            'valjt_lainnya' => 'nullable',
            'valpen_lainnya' => 'nullable',
            'valpp_lainnya' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [


            'valpenyebabu_antarkelompokmas.required' => ':Attribute tidak boleh kosong',
            'valjk_antarkelompokmas.required' => ':Attribute tidak boleh kosong',
            'valjkl_antarkelompokmas.required' => ':Attribute tidak boleh kosong',
            'valjt_antarkelompokmas.required' => ':Attribute tidak boleh kosong',
            'valpen_antarkelompokmas.required' => ':Attribute tidak boleh kosong',
            'valpp_antarkelompokmas.required' => ':Attribute tidak boleh kosong',
            'valpenyebabu_antardesa.required' => ':Attribute tidak boleh kosong',
            'valjk_antardesa.required' => ':Attribute tidak boleh kosong',
            'valjkl_antardesa.required' => ':Attribute tidak boleh kosong',
            'valjt_antardesa.required' => ':Attribute tidak boleh kosong',
            'valpen_antardesa.required' => ':Attribute tidak boleh kosong',
            'valpp_antardesa.required' => ':Attribute tidak boleh kosong',
            'valpenyebabu_aparatmk.required' => ':Attribute tidak boleh kosong',
            'valjk_aparatmk.required' => ':Attribute tidak boleh kosong',
            'valjkl_aparatmk.required' => ':Attribute tidak boleh kosong',
            'valjt_aparatmk.required' => ':Attribute tidak boleh kosong',
            'valpen_aparatmk.required' => ':Attribute tidak boleh kosong',
            'valpp_aparatmk.required' => ':Attribute tidak boleh kosong',
            'valpenyebabu_aparatmp.required' => ':Attribute tidak boleh kosong',
            'valjk_aparatmp.required' => ':Attribute tidak boleh kosong',
            'valjkl_aparatmp.required' => ':Attribute tidak boleh kosong',
            'valjt_aparatmp.required' => ':Attribute tidak boleh kosong',
            'valpen_aparatmp.required' => ':Attribute tidak boleh kosong',
            'valpp_aparatmp.required' => ':Attribute tidak boleh kosong',
            'valpenyebabu_aparatk.required' => ':Attribute tidak boleh kosong',
            'valjk_aparatk.required' => ':Attribute tidak boleh kosong',
            'valjkl_aparatk.required' => ':Attribute tidak boleh kosong',
            'valjt_aparatk.required' => ':Attribute tidak boleh kosong',
            'valpen_aparatk.required' => ':Attribute tidak boleh kosong',
            'valpp_aparatk.required' => ':Attribute tidak boleh kosong',
            'valpenyebabu_aparatp.required' => ':Attribute tidak boleh kosong',
            'valjk_aparatp.required' => ':Attribute tidak boleh kosong',
            'valjkl_aparatp.required' => ':Attribute tidak boleh kosong',
            'valjt_aparatp.required' => ':Attribute tidak boleh kosong',
            'valpen_aparatp.required' => ':Attribute tidak boleh kosong',
            'valpp_aparatp.required' => ':Attribute tidak boleh kosong',
            'valpenyebabu_pelajar.required' => ':Attribute tidak boleh kosong',
            'valjk_pelajar.required' => ':Attribute tidak boleh kosong',
            'valjkl_pelajar.required' => ':Attribute tidak boleh kosong',
            'valjt_pelajar.required' => ':Attribute tidak boleh kosong',
            'valpen_pelajar.required' => ':Attribute tidak boleh kosong',
            'valpp_pelajar.required' => ':Attribute tidak boleh kosong',
            'valpenyebabu_suku.required' => ':Attribute tidak boleh kosong',
            'valjk_suku.required' => ':Attribute tidak boleh kosong',
            'valjkl_suku.required' => ':Attribute tidak boleh kosong',
            'valjt_suku.required' => ':Attribute tidak boleh kosong',
            'valpen_suku.required' => ':Attribute tidak boleh kosong',
            'valpp_suku.required' => ':Attribute tidak boleh kosong',
            'valpenyebabu_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjk_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjkl_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjt_lainnya.required' => ':Attribute tidak boleh kosong',
            'valpen_lainnya.required' => ':Attribute tidak boleh kosong',
            'valpp_lainnya.required' => ':Attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [




            'valpenyebabu_antarkelompokmas' => 'penyebabu_antarkelompokmas',
            'valjk_antarkelompokmas' => 'jk_antarkelompokmas',
            'valjkl_antarkelompokmas' => 'jkl_antarkelompokmas',
            'valjt_antarkelompokmas' => 'jt_antarkelompokmas',
            'valpen_antarkelompokmas' => 'pen_antarkelompokmas',
            'valpp_antarkelompokmas' => 'pp_antarkelompokmas',
            'valpenyebabu_antardesa' => 'penyebabu_antardesa',
            'valjk_antardesa' => 'jk_antardesa',
            'valjkl_antardesa' => 'jkl_antardesa',
            'valjt_antardesa' => 'jt_antardesa',
            'valpen_antardesa' => 'pen_antardesa',
            'valpp_antardesa' => 'pp_antardesa',
            'valpenyebabu_aparatmk' => 'penyebabu_aparatmk',
            'valjk_aparatmk' => 'jk_aparatmk',
            'valjkl_aparatmk' => 'jkl_aparatmk',
            'valjt_aparatmk' => 'jt_aparatmk',
            'valpen_aparatmk' => 'pen_aparatmk',
            'valpp_aparatmk' => 'pp_aparatmk',
            'valpenyebabu_aparatmp' => 'penyebabu_aparatmp',
            'valjk_aparatmp' => 'jk_aparatmp',
            'valjkl_aparatmp' => 'jkl_aparatmp',
            'valjt_aparatmp' => 'jt_aparatmp',
            'valpen_aparatmp' => 'pen_aparatmp',
            'valpp_aparatmp' => 'pp_aparatmp',
            'valpenyebabu_aparatk' => 'penyebabu_aparatk',
            'valjk_aparatk' => 'jk_aparatk',
            'valjkl_aparatk' => 'jkl_aparatk',
            'valjt_aparatk' => 'jt_aparatk',
            'valpen_aparatk' => 'pen_aparatk',
            'valpp_aparatk' => 'pp_aparatk',
            'valpenyebabu_aparatp' => 'penyebabu_aparatp',
            'valjk_aparatp' => 'jk_aparatp',
            'valjkl_aparatp' => 'jkl_aparatp',
            'valjt_aparatp' => 'jt_aparatp',
            'valpen_aparatp' => 'pen_aparatp',
            'valpp_aparatp' => 'pp_aparatp',
            'valpenyebabu_pelajar' => 'penyebabu_pelajar',
            'valjk_pelajar' => 'jk_pelajar',
            'valjkl_pelajar' => 'jkl_pelajar',
            'valjt_pelajar' => 'jt_pelajar',
            'valpen_pelajar' => 'pen_pelajar',
            'valpp_pelajar' => 'pp_pelajar',
            'valpenyebabu_suku' => 'penyebabu_suku',
            'valjk_suku' => 'jk_suku',
            'valjkl_suku' => 'jkl_suku',
            'valjt_suku' => 'jt_suku',
            'valpen_suku' => 'pen_suku',
            'valpp_suku' => 'pp_suku',
            'valpenyebabu_lainnya' => 'penyebabu_lainnya',
            'valjk_lainnya' => 'jk_lainnya',
            'valjkl_lainnya' => 'jkl_lainnya',
            'valjt_lainnya' => 'jt_lainnya',
            'valpen_lainnya' => 'pen_lainnya',
            'valpp_lainnya' => 'pp_lainnya',

        ];
    }
}

