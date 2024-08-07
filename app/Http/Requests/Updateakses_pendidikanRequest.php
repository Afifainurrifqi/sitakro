<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updateakses_pendidikanRequest extends FormRequest
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
            'valjaraktempuh_paud' => 'nullable',
            'valwaktutempuh_paud' => 'nullable',
            'valkemudahan_paud' => 'nullable',
            'valjaraktempuh_tk' => 'nullable',
            'valwaktutempuh_tk' => 'nullable',
            'valkemudahan_tk' => 'nullable',
            'valjaraktempuh_sd' => 'nullable',
            'valwaktutempuh_sd' => 'nullable',
            'valkemudahan_sd' => 'nullable',
            'valjaraktempuh_smp' => 'nullable',
            'valwaktutempuh_smp' => 'nullable',
            'valkemudahan_smp' => 'nullable',
            'valjaraktempuh_sma' => 'nullable',
            'valwaktutempuh_sma' => 'nullable',
            'valkemudahan_sma' => 'nullable',
            'valjaraktempuh_pt' => 'nullable',
            'valwaktutempuh_pt' => 'nullable',
            'valkemudahan_pt' => 'nullable',
            'valjaraktempuh_ps' => 'nullable',
            'valwaktutempuh_ps' => 'nullable',
            'valkemudahan_ps' => 'nullable',
            'valjaraktempuh_seminari' => 'nullable',
            'valwaktutempuh_seminari' => 'nullable',
            'valkemudahan_seminari' => 'nullable',
            'valjaraktempuh_pagamalain' => 'nullable',
            'valwaktutempuh_pagamalain' => 'nullable',
            'valkemudahan_pagamalain' => 'nullable',
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
