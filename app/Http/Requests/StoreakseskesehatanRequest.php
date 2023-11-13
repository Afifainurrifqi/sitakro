<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreakseskesehatanRequest extends FormRequest
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
            'valjaraktempuh_rumahs' => 'required',
            'valwaktutempuh_rumahs' => 'required',
            'valkemudahan_rumahs' => 'required',
            'valjaraktempuh_rumahb' => 'required',
            'valwaktutempuh_rumahb' => 'required',
            'valkemudahan_rumahb' => 'required',
            'valjaraktempuh_poliklinik' => 'required',
            'valwaktutempuh_poliklinik' => 'required',
            'valkemudahan_poliklinik' => 'required',
            'valjaraktempuh_puskesmas' => 'required',
            'valwaktutempuh_puskesmas' => 'required',
            'valkemudahan_puskesmas' => 'required',
            'valjaraktempuh_poskedes' => 'required',
            'valwaktutempuh_poskedes' => 'required',
            'valkemudahan_poskedes' => 'required',
            'valjaraktempuh_posyandu' => 'required',
            'valwaktutempuh_posyandu' => 'required',
            'valkemudahan_posyandu' => 'required',
            'valjaraktempuh_apotik' => 'required',
            'valwaktutempuh_apotik' => 'required',
            'valkemudahan_apotik' => 'required',
            'valjaraktempuh_toko_obat' => 'required',
            'valwaktutempuh_toko_obat' => 'required',
            'valkemudahan_toko_obat' => 'required',
           
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
