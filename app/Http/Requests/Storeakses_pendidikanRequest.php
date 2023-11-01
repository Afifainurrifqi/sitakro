<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeakses_pendidikanRequest extends FormRequest
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
            'valjaraktempuh_paud' => 'required',
            'valwaktutempuh_paud' => 'required',
            'valkemudahan_paud' => 'required',
            'valjaraktempuh_tk' => 'required',
            'valwaktutempuh_tk' => 'required',
            'valkemudahan_tk' => 'required',
            'valjaraktempuh_sd' => 'required',
            'valwaktutempuh_sd' => 'required',
            'valkemudahan_sd' => 'required',
            'valjaraktempuh_smp' => 'required',
            'valwaktutempuh_smp' => 'required',
            'valkemudahan_smp' => 'required',
            'valjaraktempuh_sma' => 'required',
            'valwaktutempuh_sma' => 'required',
            'valkemudahan_sma' => 'required',
            'valjaraktempuh_pt' => 'required',
            'valwaktutempuh_pt' => 'required',
            'valkemudahan_pt' => 'required',
            'valjaraktempuh_ps' => 'required',
            'valwaktutempuh_ps' => 'required',
            'valkemudahan_ps' => 'required',
            'valjaraktempuh_seminari' => 'required',
            'valwaktutempuh_seminari' => 'required',
            'valkemudahan_seminari' => 'required',
            'valjaraktempuh_pagamalain' => 'required',
            'valwaktutempuh_pagamalain' => 'required',
            'valkemudahan_pagamalain' => 'required',
        ];
    }

    public function messages(): array
    {
        return [

            'valjaraktempuh_paud.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_paud.required' => ':attribute tidak boleh kosong',
            'valkemudahan_paud.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_tk.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_tk.required' => ':attribute tidak boleh kosong',
            'valkemudahan_tk.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_sd.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_sd.required' => ':attribute tidak boleh kosong',
            'valkemudahan_sd.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_smp.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_smp.required' => ':attribute tidak boleh kosong',
            'valkemudahan_smp.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_sma.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_sma.required' => ':attribute tidak boleh kosong',
            'valkemudahan_sma.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_pt.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_pt.required' => ':attribute tidak boleh kosong',
            'valkemudahan_pt.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_ps.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_ps.required' => ':attribute tidak boleh kosong',
            'valkemudahan_ps.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_seminari.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_seminari.required' => ':attribute tidak boleh kosong',
            'valkemudahan_seminari.required' => ':attribute tidak boleh kosong',
            'valjaraktempuh_pagamalain.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_pagamalain.required' => ':attribute tidak boleh kosong',
            'valkemudahan_pagamalain.required' => ':attribute tidak boleh kosong',



        ];
    }

    public function attributes(): array
    {
        return [
            'valjaraktempuh_paud' =>  'jaraktempuh_paud',
            'valwaktutempuh_paud' =>  'waktutempuh_paud',
            'valkemudahan_paud' =>  'kemudahan_paud',
            'valjaraktempuh_tk' =>  'jaraktempuh_tk',
            'valwaktutempuh_tk' =>  'waktutempuh_tk',
            'valkemudahan_tk' =>  'kemudahan_tk',
            'valjaraktempuh_sd' =>  'jaraktempuh_sd',
            'valwaktutempuh_sd' =>  'waktutempuh_sd',
            'valkemudahan_sd' =>  'kemudahan_sd',
            'valjaraktempuh_smp' =>  'jaraktempuh_smp',
            'valwaktutempuh_smp' =>  'waktutempuh_smp',
            'valkemudahan_smp' =>  'kemudahan_smp',
            'valjaraktempuh_sma' =>  'jaraktempuh_sma',
            'valwaktutempuh_sma' =>  'waktutempuh_sma',
            'valkemudahan_sma' =>  'kemudahan_sma',
            'valjaraktempuh_pt' =>  'jaraktempuh_pt',
            'valwaktutempuh_pt' =>  'waktutempuh_pt',
            'valkemudahan_pt' =>  'kemudahan_pt',
            'valjaraktempuh_ps' =>  'jaraktempuh_ps',
            'valwaktutempuh_ps' =>  'waktutempuh_ps',
            'valkemudahan_ps' =>  'kemudahan_ps',
            'valjaraktempuh_seminari' =>  'jaraktempuh_seminari',
            'valwaktutempuh_seminari' =>  'waktutempuh_seminari',
            'valkemudahan_seminari' =>  'kemudahan_seminari',
            'valjaraktempuh_pagamalain' =>  'jaraktempuh_pagamalain',
            'valwaktutempuh_pagamalain' =>  'waktutempuh_pagamalain',
            'valkemudahan_pagamalain' =>  'kemudahan_pagamalain',

        ];
    }
}
