<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreaksestenagakerjaRequest extends FormRequest
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
            'valjaraktempuh_dr_spesialis' => 'nullable',
            'valwaktutempuh_dr_spesialis' => 'nullable',
            'valkemudahan_dr_spesialis' => 'nullable',
            'valjaraktempuh_dr_umum' => 'nullable',
            'valwaktutempuh_dr_umum' => 'nullable',
            'valkemudahan_dr_umum' => 'nullable',
            'valjaraktempuh_bidan' => 'nullable',
            'valwaktutempuh_bidan' => 'nullable',
            'valkemudahan_bidan' => 'nullable',
            'valjaraktempuh_tenagakes' => 'nullable',
            'valwaktutempuh_tenagakes' => 'nullable',
            'valkemudahan_tenagakes' => 'nullable',
            'valjaraktempuh_dukun' => 'nullable',
            'valwaktutempuh_dukun' => 'nullable',
            'valkemudahan_dukun' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'valjaraktempuh_dr_spesialis.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_dr_spesialis.required' => ':attribute tidak boleh kosong',
            'valkemudahan_dr_spesialis.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_dr_umum.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_dr_umum.required' => ':attribute tidak boleh kosong',
            'valkemudahan_dr_umum.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_bidan.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_bidan.required' => ':attribute tidak boleh kosong',
            'valkemudahan_bidan.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_tenagakes.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_tenagakes.required' => ':attribute tidak boleh kosong',
            'valkemudahan_puskedukuns.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_dukun.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_dukun.required' => ':attribute tidak boleh kosong',
            'valkemudahan_dukun.required' => ':attribute tidak boleh kosong',





        ];
    }

    public function attributes(): array
    {
        return [
            'valjaraktempuh_dr_spesialis' =>  'jaraktempuh_dr_spesialis',
            'valwaktutempuh_dr_spesialis' =>  'waktutempuh_dr_spesialis',
            'valkemudahan_dr_spesialis' =>  'kemudahan_dr_spesialis',
            'valjaraktempuh_dr_umum' =>  'jaraktempuh_dr_umum',
            'valwaktutempuh_dr_umum' =>  'waktutempuh_dr_umum',
            'valkemudahan_dr_umum' =>  'kemudahan_dr_umum',
            'valjaraktempuh_bidan' =>  'jaraktempuh_bidan',
            'valwaktutempuh_bidan' =>  'waktutempuh_bidan',
            'valkemudahan_bidan' =>  'kemudahan_bidan',
            'valjaraktempuh_tenagakes' =>  'jaraktempuh_tenagakes',
            'valwaktutempuh_tenagakes' =>  'waktutempuh_tenagakes',
            'valkemudahan_tenagakes' =>  'kemudahan_tenagakes',
            'valjaraktempuh_dukun' =>  'jaraktempuh_dukun',
            'valwaktutempuh_dukun' =>  'waktutempuh_dukun',
            'valkemudahan_dukun' =>  'kemudahan_dukun',


        ];
    }
}

