<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateakseskesehatanRequest extends FormRequest
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
            'valjaraktempuh_rumahs' => 'nullable',
            'valwaktutempuh_rumahs' => 'nullable',
            'valkemudahan_rumahs' => 'nullable',
            'valjaraktempuh_rumahb' => 'nullable',
            'valwaktutempuh_rumahb' => 'nullable',
            'valkemudahan_rumahb' => 'nullable',
            'valjaraktempuh_poliklinik' => 'nullable',
            'valwaktutempuh_poliklinik' => 'nullable',
            'valkemudahan_poliklinik' => 'nullable',
            'valjaraktempuh_puskesmas' => 'nullable',
            'valwaktutempuh_puskesmas' => 'nullable',
            'valkemudahan_puskesmas' => 'nullable',
            'valjaraktempuh_poskedes' => 'nullable',
            'valwaktutempuh_poskedes' => 'nullable',
            'valkemudahan_poskedes' => 'nullable',
            'valjaraktempuh_posyandu' => 'nullable',
            'valwaktutempuh_posyandu' => 'nullable',
            'valkemudahan_posyandu' => 'nullable',
            'valjaraktempuh_apotik' => 'nullable',
            'valwaktutempuh_apotik' => 'nullable',
            'valkemudahan_apotik' => 'nullable',
            'valjaraktempuh_toko_obat' => 'nullable',
            'valwaktutempuh_toko_obat' => 'nullable',
            'valkemudahan_toko_obat' => 'nullable',

        ];
    }

    public function messages(): array
    {
        return [

            'valjaraktempuh_rumahs.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_rumahs.required' => ':attribute tidak boleh kosong',
            'valkemudahan_rumahs.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_rumahb.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_rumahb.required' => ':attribute tidak boleh kosong',
            'valkemudahan_rumahb.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_poliklinik.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_poliklinik.required' => ':attribute tidak boleh kosong',
            'valkemudahan_poliklinik.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_puskesmas.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_puskesmas.required' => ':attribute tidak boleh kosong',
            'valkemudahan_puskeposkedess.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_poskedes.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_poskedes.required' => ':attribute tidak boleh kosong',
            'valkemudahan_poskedes.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_posyandu.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_posyandu.required' => ':attribute tidak boleh kosong',
            'valkemudahan_posyandu.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_apotik.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_apotik.required' => ':attribute tidak boleh kosong',
            'valkemudahan_apotik.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_toko_obat.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_toko_obat.required' => ':attribute tidak boleh kosong',
            'valkemudahan_toko_obat.required' => ':attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [
            'valjaraktempuh_rumahs' =>  'jaraktempuh_rumahs',
            'valwaktutempuh_rumahs' =>  'waktutempuh_rumahs',
            'valkemudahan_rumahs' =>  'kemudahan_rumahs',
            'valjaraktempuh_rumahb' =>  'jaraktempuh_rumahb',
            'valwaktutempuh_rumahb' =>  'waktutempuh_rumahb',
            'valkemudahan_rumahb' =>  'kemudahan_rumahb',
            'valjaraktempuh_poliklinik' =>  'jaraktempuh_poliklinik',
            'valwaktutempuh_poliklinik' =>  'waktutempuh_poliklinik',
            'valkemudahan_poliklinik' =>  'kemudahan_poliklinik',
            'valjaraktempuh_puskesmas' =>  'jaraktempuh_puskesmas',
            'valwaktutempuh_puskesmas' =>  'waktutempuh_puskesmas',
            'valkemudahan_puskesmas' =>  'kemudahan_puskesmas',
            'valjaraktempuh_poskedes' =>  'jaraktempuh_poskedes',
            'valwaktutempuh_poskedes' =>  'waktutempuh_poskedes',
            'valkemudahan_poskedes' =>  'kemudahan_poskedes',
            'valjaraktempuh_posyandu' =>  'jaraktempuh_posyandu',
            'valwaktutempuh_posyandu' =>  'waktutempuh_posyandu',
            'valkemudahan_posyandu' =>  'kemudahan_posyandu',
            'valjaraktempuh_apotik' =>  'jaraktempuh_apotik',
            'valwaktutempuh_apotik' =>  'waktutempuh_apotik',
            'valkemudahan_apotik' =>  'kemudahan_apotik',
            'valjaraktempuh_toko_obat' =>  'jaraktempuh_toko_obat',
            'valwaktutempuh_toko_obat' =>  'waktutempuh_toko_obat',
            'valkemudahan_toko_obat' =>  'kemudahan_toko_obat',


        ];
    }
}

