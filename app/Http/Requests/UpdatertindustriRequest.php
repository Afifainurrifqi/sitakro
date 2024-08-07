<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatertindustriRequest extends FormRequest
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

            'valjumlahindustrik_kulit' => 'nullable',
            'valjumlahindustris_kulit' => 'nullable',
            'valjumlahmanajemen_kulit' => 'nullable',
            'valjumlahpekerja_kulit' => 'nullable',
            'valjumlahindustrik_kayu' => 'nullable',
            'valjumlahindustris_kayu' => 'nullable',
            'valjumlahmanajemen_kayu' => 'nullable',
            'valjumlahpekerja_kayu' => 'nullable',
            'valjumlahindustrik_logam' => 'nullable',
            'valjumlahindustris_logam' => 'nullable',
            'valjumlahmanajemen_logam' => 'nullable',
            'valjumlahpekerja_logam' => 'nullable',
            'valjumlahindustrik_logamb' => 'nullable',
            'valjumlahindustris_logamb' => 'nullable',
            'valjumlahmanajemen_logamb' => 'nullable',
            'valjumlahpekerja_logamb' => 'nullable',
            'valjumlahindustrik_kain' => 'nullable',
            'valjumlahindustris_kain' => 'nullable',
            'valjumlahmanajemen_kain' => 'nullable',
            'valjumlahpekerja_kain' => 'nullable',
            'valjumlahindustrik_keramik' => 'nullable',
            'valjumlahindustris_keramik' => 'nullable',
            'valjumlahmanajemen_keramik' => 'nullable',
            'valjumlahpekerja_keramik' => 'nullable',
            'valjumlahindustrik_genteng' => 'nullable',
            'valjumlahindustris_genteng' => 'nullable',
            'valjumlahmanajemen_genteng' => 'nullable',
            'valjumlahpekerja_genteng' => 'nullable',
            'valjumlahindustrik_anyaman' => 'nullable',
            'valjumlahindustris_anyaman' => 'nullable',
            'valjumlahmanajemen_anyaman' => 'nullable',
            'valjumlahpekerja_anyaman' => 'nullable',
            'valjumlahindustrik_makanan' => 'nullable',
            'valjumlahindustris_makanan' => 'nullable',
            'valjumlahmanajemen_makanan' => 'nullable',
            'valjumlahpekerja_makanan' => 'nullable',
            'valjumlahindustrik_lainnya' => 'nullable',
            'valjumlahindustris_lainnya' => 'nullable',
            'valjumlahmanajemen_lainnya' => 'nullable',
            'valjumlahpekerja_lainnya' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'valjumlahindustrik_kulit.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_kulit.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_kulit.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_kulit.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_kayu.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_kayu.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_kayu.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_kayu.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_logam.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_logam.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_logam.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_logam.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_logamb.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_logamb.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_logamb.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_logamb.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_kain.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_kain.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_kain.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_kain.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_keramik.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_keramik.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_keramik.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_keramik.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_genteng.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_genteng.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_genteng.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_genteng.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_anyaman.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_anyaman.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_anyaman.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_anyaman.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_makanan.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_makanan.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_makanan.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_makanan.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustrik_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjumlahindustris_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjumlahmanajemen_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjumlahpekerja_lainnya.required' => ':Attribute tidak boleh kosong',



        ];
    }

    public function attributes(): array
    {
        return [

            'valjumlahindustrik_kulit' => 'jumlahindustrik_kulit',
            'valjumlahindustris_kulit' => 'jumlahindustris_kulit',
            'valjumlahmanajemen_kulit' => 'jumlahmanajemen_kulit',
            'valjumlahpekerja_kulit' => 'jumlahpekerja_kulit',
            'valjumlahindustrik_kayu' => 'jumlahindustrik_kayu',
            'valjumlahindustris_kayu' => 'jumlahindustris_kayu',
            'valjumlahmanajemen_kayu' => 'jumlahmanajemen_kayu',
            'valjumlahpekerja_kayu' => 'jumlahpekerja_kayu',
            'valjumlahindustrik_logam' => 'jumlahindustrik_logam',
            'valjumlahindustris_logam' => 'jumlahindustris_logam',
            'valjumlahmanajemen_logam' => 'jumlahmanajemen_logam',
            'valjumlahpekerja_logam' => 'jumlahpekerja_logam',
            'valjumlahindustrik_logamb' => 'jumlahindustrik_logamb',
            'valjumlahindustris_logamb' => 'jumlahindustris_logamb',
            'valjumlahmanajemen_logamb' => 'jumlahmanajemen_logamb',
            'valjumlahpekerja_logamb' => 'jumlahpekerja_logamb',
            'valjumlahindustrik_kain' => 'jumlahindustrik_kain',
            'valjumlahindustris_kain' => 'jumlahindustris_kain',
            'valjumlahmanajemen_kain' => 'jumlahmanajemen_kain',
            'valjumlahpekerja_kain' => 'jumlahpekerja_kain',
            'valjumlahindustrik_keramik' => 'jumlahindustrik_keramik',
            'valjumlahindustris_keramik' => 'jumlahindustris_keramik',
            'valjumlahmanajemen_keramik' => 'jumlahmanajemen_keramik',
            'valjumlahpekerja_keramik' => 'jumlahpekerja_keramik',
            'valjumlahindustrik_genteng' => 'jumlahindustrik_genteng',
            'valjumlahindustris_genteng' => 'jumlahindustris_genteng',
            'valjumlahmanajemen_genteng' => 'jumlahmanajemen_genteng',
            'valjumlahpekerja_genteng' => 'jumlahpekerja_genteng',
            'valjumlahindustrik_anyaman' => 'jumlahindustrik_anyaman',
            'valjumlahindustris_anyaman' => 'jumlahindustris_anyaman',
            'valjumlahmanajemen_anyaman' => 'jumlahmanajemen_anyaman',
            'valjumlahpekerja_anyaman' => 'jumlahpekerja_anyaman',
            'valjumlahindustrik_makanan' => 'jumlahindustrik_makanan',
            'valjumlahindustris_makanan' => 'jumlahindustris_makanan',
            'valjumlahmanajemen_makanan' => 'jumlahmanajemen_makanan',
            'valjumlahpekerja_makanan' => 'jumlahpekerja_makanan',
            'valjumlahindustrik_lainnya' => 'jumlahindustrik_lainnya',
            'valjumlahindustris_lainnya' => 'jumlahindustris_lainnya',
            'valjumlahmanajemen_lainnya' => 'jumlahmanajemen_lainnya',
            'valjumlahpekerja_lainnya' => 'jumlahpekerja_lainnya',


        ];
    }
}
