<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatertlembaga_ekonomiRequest extends FormRequest
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
            

            'valagentik_jp' => 'required',
            'valagentik_jtk' => 'required',
            'valjtri_sentra' => 'required',
            'valjtri_lingkungan' => 'required',
            'valjtri_kampung' => 'required',
            'valdiskotik_kpd' => 'required',
            'valdiskotik_jtl' => 'required',
            'vallpg_kpapm' => 'required',
            'vallpg_kpapg' => 'required',
            'valkoperasi_jumlah' => 'required',
            'valkoperasi_kudproduksi' => 'required',
            'valkoperasi_kudkredit' => 'required',
            'valkoperasi_kudkegiatan' => 'required',
            'valkoperasi_kudindustrik' => 'required',
            'valkoperasi_kudksp' => 'required',
            'valkoperasi_kudksu' => 'required',
            'valkoperasi_kudlainnya' => 'required',
            'valkos_kud' => 'required',
            'valkos_bumdes' => 'required',
            'valkos_selain' => 'required',
           
           
        ];
    }

    public function messages(): array
    {
        return [
            'valagentik_jp.required' => ':Attribute tidak boleh kosong',
            'valagentik_jtk.required' => ':Attribute tidak boleh kosong',
            'valjtri_sentra.required' => ':Attribute tidak boleh kosong',
            'valjtri_lingkungan.required' => ':Attribute tidak boleh kosong',
            'valjtri_kampung.required' => ':Attribute tidak boleh kosong',
            'valdiskotik_kpd.required' => ':Attribute tidak boleh kosong',
            'valdiskotik_jtl.required' => ':Attribute tidak boleh kosong',
            'vallpg_kpapm.required' => ':Attribute tidak boleh kosong',
            'vallpg_kpapg.required' => ':Attribute tidak boleh kosong',
            'valkoperasi_jumlah.required' => ':Attribute tidak boleh kosong',
            'valkoperasi_kudproduksi.required' => ':Attribute tidak boleh kosong',
            'valkoperasi_kudkredit.required' => ':Attribute tidak boleh kosong',
            'valkoperasi_kudkegiatan.required' => ':Attribute tidak boleh kosong',
            'valkoperasi_kudindustrik.required' => ':Attribute tidak boleh kosong',
            'valkoperasi_kudksp.required' => ':Attribute tidak boleh kosong',
            'valkoperasi_kudksu.required' => ':Attribute tidak boleh kosong',
            'valkoperasi_kudlainnya.required' => ':Attribute tidak boleh kosong',
            'valkos_kud.required' => ':Attribute tidak boleh kosong',
            'valkos_bumdes.required' => ':Attribute tidak boleh kosong',
            'valkos_selain.required' => ':Attribute tidak boleh kosong',

        ];
    }

    public function attributes(): array
    {
        return [


            'valagentik_jp' => 'valagentik_jp',
            'valagentik_jtk' => 'valagentik_jtk',
            'valjtri_sentra' => 'valjtri_sentra',
            'valjtri_lingkungan' => 'valjtri_lingkungan',
            'valjtri_kampung' => 'valjtri_kampung',
            'valdiskotik_kpd' => 'valdiskotik_kpd',
            'valdiskotik_jtl' => 'valdiskotik_jtl',
            'vallpg_kpapm' => 'vallpg_kpapm',
            'vallpg_kpapg' => 'vallpg_kpapg',
            'valkoperasi_jumlah' => 'valkoperasi_jumlah',
            'valkoperasi_kudproduksi' => 'valkoperasi_kudproduksi',
            'valkoperasi_kudkredit' => 'valkoperasi_kudkredit',
            'valkoperasi_kudkegiatan' => 'valkoperasi_kudkegiatan',
            'valkoperasi_kudindustrik' => 'valkoperasi_kudindustrik',
            'valkoperasi_kudksp' => 'valkoperasi_kudksp',
            'valkoperasi_kudksu' => 'valkoperasi_kudksu',
            'valkoperasi_kudlainnya' => 'valkoperasi_kudlainnya',
            'valkos_kud' => 'valkos_kud',
            'valkos_bumdes' => 'valkos_bumdes',
            'valkos_selain' => 'valkos_selain',
             
           

        ];
    }
}