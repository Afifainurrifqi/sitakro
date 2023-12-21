<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_kejadianluarbiasaRequest extends FormRequest
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
            

            'valnama_muntaber' => 'required',
            'valjp_muntaber' => 'required',
            'valjm_muntaber' => 'required',
            'valnama_dbd' => 'required',
            'valjp_dbd' => 'required',
            'valjm_dbd' => 'required',
            'valnama_campak' => 'required',
            'valjp_campak' => 'required',
            'valjm_campak' => 'required',
            'valnama_malaria' => 'required',
            'valjp_malaria' => 'required',
            'valjm_malaria' => 'required',
            'valnama_fluburung' => 'required',
            'valjp_fluburung' => 'required',
            'valjm_fluburung' => 'required',
            'valnama_covid19' => 'required',
            'valjp_covid19' => 'required',
            'valjm_covid19' => 'required',
            'valnama_hepatitisb' => 'required',
            'valjp_hepatitisb' => 'required',
            'valjm_hepatitisb' => 'required',
            'valnama_hepatitise' => 'required',
            'valjp_hepatitise' => 'required',
            'valjm_hepatitise' => 'required',
            'valnama_dipteri' => 'required',
            'valjp_dipteri' => 'required',
            'valjm_dipteri' => 'required',
            'valnama_chikung' => 'required',
            'valjp_chikung' => 'required',
            'valjm_chikung' => 'required',
            'valnama_leptos' => 'required',
            'valjp_leptos' => 'required',
            'valjm_leptos' => 'required',
            'valnama_kolera' => 'required',
            'valjp_kolera' => 'required',
            'valjm_kolera' => 'required',
            'valnama_giziburuk' => 'required',
            'valjp_giziburuk' => 'required',
            'valjm_giziburuk' => 'required',
            'valnama_lainnya' => 'required',
            'valjp_lainnya' => 'required',
            'valjm_lainnya' => 'required',
           
           
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

