<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatert_kejadianluarbiasaRequest extends FormRequest
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


            'valnama_muntaber' => 'nullable',
            'valjp_muntaber' => 'nullable',
            'valjm_muntaber' => 'nullable',
            'valnama_dbd' => 'nullable',
            'valjp_dbd' => 'nullable',
            'valjm_dbd' => 'nullable',
            'valnama_campak' => 'nullable',
            'valjp_campak' => 'nullable',
            'valjm_campak' => 'nullable',
            'valnama_malaria' => 'nullable',
            'valjp_malaria' => 'nullable',
            'valjm_malaria' => 'nullable',
            'valnama_fluburung' => 'nullable',
            'valjp_fluburung' => 'nullable',
            'valjm_fluburung' => 'nullable',
            'valnama_covid19' => 'nullable',
            'valjp_covid19' => 'nullable',
            'valjm_covid19' => 'nullable',
            'valnama_hepatitisb' => 'nullable',
            'valjp_hepatitisb' => 'nullable',
            'valjm_hepatitisb' => 'nullable',
            'valnama_hepatitise' => 'nullable',
            'valjp_hepatitise' => 'nullable',
            'valjm_hepatitise' => 'nullable',
            'valnama_dipteri' => 'nullable',
            'valjp_dipteri' => 'nullable',
            'valjm_dipteri' => 'nullable',
            'valnama_chikung' => 'nullable',
            'valjp_chikung' => 'nullable',
            'valjm_chikung' => 'nullable',
            'valnama_leptos' => 'nullable',
            'valjp_leptos' => 'nullable',
            'valjm_leptos' => 'nullable',
            'valnama_kolera' => 'nullable',
            'valjp_kolera' => 'nullable',
            'valjm_kolera' => 'nullable',
            'valnama_giziburuk' => 'nullable',
            'valjp_giziburuk' => 'nullable',
            'valjm_giziburuk' => 'nullable',
            'valnama_lainnya' => 'nullable',
            'valjp_lainnya' => 'nullable',
            'valjm_lainnya' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [


            'valnama_muntaber.required' => ':Attribute tidak boleh kosong',
            'valjp_muntaber.required' => ':Attribute tidak boleh kosong',
            'valjm_muntaber.required' => ':Attribute tidak boleh kosong',
            'valnama_dbd.required' => ':Attribute tidak boleh kosong',
            'valjp_dbd.required' => ':Attribute tidak boleh kosong',
            'valjm_dbd.required' => ':Attribute tidak boleh kosong',
            'valnama_campak.required' => ':Attribute tidak boleh kosong',
            'valjp_campak.required' => ':Attribute tidak boleh kosong',
            'valjm_campak.required' => ':Attribute tidak boleh kosong',
            'valnama_malaria.required' => ':Attribute tidak boleh kosong',
            'valjp_malaria.required' => ':Attribute tidak boleh kosong',
            'valjm_malaria.required' => ':Attribute tidak boleh kosong',
            'valnama_fluburung.required' => ':Attribute tidak boleh kosong',
            'valjp_fluburung.required' => ':Attribute tidak boleh kosong',
            'valjm_fluburung.required' => ':Attribute tidak boleh kosong',
            'valnama_covid19.required' => ':Attribute tidak boleh kosong',
            'valjp_covid19.required' => ':Attribute tidak boleh kosong',
            'valjm_covid19.required' => ':Attribute tidak boleh kosong',
            'valnama_hepatitisb.required' => ':Attribute tidak boleh kosong',
            'valjp_hepatitisb.required' => ':Attribute tidak boleh kosong',
            'valjm_hepatitisb.required' => ':Attribute tidak boleh kosong',
            'valnama_hepatitise.required' => ':Attribute tidak boleh kosong',
            'valjp_hepatitise.required' => ':Attribute tidak boleh kosong',
            'valjm_hepatitise.required' => ':Attribute tidak boleh kosong',
            'valnama_dipteri.required' => ':Attribute tidak boleh kosong',
            'valjp_dipteri.required' => ':Attribute tidak boleh kosong',
            'valjm_dipteri.required' => ':Attribute tidak boleh kosong',
            'valnama_chikung.required' => ':Attribute tidak boleh kosong',
            'valjp_chikung.required' => ':Attribute tidak boleh kosong',
            'valjm_chikung.required' => ':Attribute tidak boleh kosong',
            'valnama_leptos.required' => ':Attribute tidak boleh kosong',
            'valjp_leptos.required' => ':Attribute tidak boleh kosong',
            'valjm_leptos.required' => ':Attribute tidak boleh kosong',
            'valnama_kolera.required' => ':Attribute tidak boleh kosong',
            'valjp_kolera.required' => ':Attribute tidak boleh kosong',
            'valjm_kolera.required' => ':Attribute tidak boleh kosong',
            'valnama_giziburuk.required' => ':Attribute tidak boleh kosong',
            'valjp_giziburuk.required' => ':Attribute tidak boleh kosong',
            'valjm_giziburuk.required' => ':Attribute tidak boleh kosong',
            'valnama_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjp_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjm_lainnya.required' => ':Attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [

            'valnama_muntaber' => 'valnama_muntaber',
            'valjp_muntaber' => 'valjp_muntaber',
            'valjm_muntaber' => 'valjm_muntaber',
            'valnama_dbd' => 'valnama_dbd',
            'valjp_dbd' => 'valjp_dbd',
            'valjm_dbd' => 'valjm_dbd',
            'valnama_campak' => 'valnama_campak',
            'valjp_campak' => 'valjp_campak',
            'valjm_campak' => 'valjm_campak',
            'valnama_malaria' => 'valnama_malaria',
            'valjp_malaria' => 'valjp_malaria',
            'valjm_malaria' => 'valjm_malaria',
            'valnama_fluburung' => 'valnama_fluburung',
            'valjp_fluburung' => 'valjp_fluburung',
            'valjm_fluburung' => 'valjm_fluburung',
            'valnama_covid19' => 'valnama_covid19',
            'valjp_covid19' => 'valjp_covid19',
            'valjm_covid19' => 'valjm_covid19',
            'valnama_hepatitisb' => 'valnama_hepatitisb',
            'valjp_hepatitisb' => 'valjp_hepatitisb',
            'valjm_hepatitisb' => 'valjm_hepatitisb',
            'valnama_hepatitise' => 'valnama_hepatitise',
            'valjp_hepatitise' => 'valjp_hepatitise',
            'valjm_hepatitise' => 'valjm_hepatitise',
            'valnama_dipteri' => 'valnama_dipteri',
            'valjp_dipteri' => 'valjp_dipteri',
            'valjm_dipteri' => 'valjm_dipteri',
            'valnama_chikung' => 'valnama_chikung',
            'valjp_chikung' => 'valjp_chikung',
            'valjm_chikung' => 'valjm_chikung',
            'valnama_leptos' => 'valnama_leptos',
            'valjp_leptos' => 'valjp_leptos',
            'valjm_leptos' => 'valjm_leptos',
            'valnama_kolera' => 'valnama_kolera',
            'valjp_kolera' => 'valjp_kolera',
            'valjm_kolera' => 'valjm_kolera',
            'valnama_giziburuk' => 'valnama_giziburuk',
            'valjp_giziburuk' => 'valjp_giziburuk',
            'valjm_giziburuk' => 'valjm_giziburuk',
            'valnama_lainnya' => 'valnama_lainnya',
            'valjp_lainnya' => 'valjp_lainnya',
            'valjm_lainnya' => 'valjm_lainnya',

        ];
    }
}

