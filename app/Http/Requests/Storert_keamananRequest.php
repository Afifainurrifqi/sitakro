<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_keamananRequest extends FormRequest
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
            'valpenyebabu_antarkelompokmas' => 'required',
            'valjk_antarkelompokmas' => 'required',
            'valjkl_antarkelompokmas' => 'required',
            'valjt_antarkelompokmas' => 'required',
            'valpen_antarkelompokmas' => 'required',
            'valpp_antarkelompokmas' => 'required',
            'valpenyebabu_antardesa' => 'required',
            'valjk_antardesa' => 'required',
            'valjkl_antardesa' => 'required',
            'valjt_antardesa' => 'required',
            'valpen_antardesa' => 'required',
            'valpp_antardesa' => 'required',
            'valpenyebabu_aparatmk' => 'required',
            'valjk_aparatmk' => 'required',
            'valjkl_aparatmk' => 'required',
            'valjt_aparatmk' => 'required',
            'valpen_aparatmk' => 'required',
            'valpp_aparatmk' => 'required',
            'valpenyebabu_aparatmp' => 'required',
            'valjk_aparatmp' => 'required',
            'valjkl_aparatmp' => 'required',
            'valjt_aparatmp' => 'required',
            'valpen_aparatmp' => 'required',
            'valpp_aparatmp' => 'required',
            'valpenyebabu_aparatk' => 'required',
            'valjk_aparatk' => 'required',
            'valjkl_aparatk' => 'required',
            'valjt_aparatk' => 'required',
            'valpen_aparatk' => 'required',
            'valpp_aparatk' => 'required',
            'valpenyebabu_aparatp' => 'required',
            'valjk_aparatp' => 'required',
            'valjkl_aparatp' => 'required',
            'valjt_aparatp' => 'required',
            'valpen_aparatp' => 'required',
            'valpp_aparatp' => 'required',
            'valpenyebabu_pelajar' => 'required',
            'valjk_pelajar' => 'required',
            'valjkl_pelajar' => 'required',
            'valjt_pelajar' => 'required',
            'valpen_pelajar' => 'required',
            'valpp_pelajar' => 'required',
            'valpenyebabu_suku' => 'required',
            'valjk_suku' => 'required',
            'valjkl_suku' => 'required',
            'valjt_suku' => 'required',
            'valpen_suku' => 'required',
            'valpp_suku' => 'required',
            'valpenyebabu_lainnya' => 'required',
            'valjk_lainnya' => 'required',
            'valjkl_lainnya' => 'required',
            'valjt_lainnya' => 'required',
            'valpen_lainnya' => 'required',
            'valpp_lainnya' => 'required',
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

