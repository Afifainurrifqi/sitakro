<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredatakesehatanRequest extends FormRequest
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
            'valpenyakitsetahun'  => 'nullable',
            'valrumah_sakit'  => 'nullable',
            'valrumah_sakitb'  => 'nullable',
            'valpuskesmas_denganri'  => 'nullable',
            'valpuskesmas_tanpari'  => 'nullable',
            'valpuskemas_pembantu'  => 'nullable',
            'valpoliklinik'  => 'nullable',
            'valtempat_praktekdr'  => 'nullable',
            'valrumah_bersalin'  => 'nullable',
            'valtempat_praktek'  => 'nullable',
            'valposkesdes'  => 'nullable',
            'valpolindes'  => 'nullable',
            'valapotik'  => 'nullable',
            'valtoko_obat'  => 'nullable',
            'valposyandu'  => 'nullable',
            'valposbindu'  => 'nullable',
            'valtempat_praktikdb'  => 'nullable',
            'valjamkes'  => 'nullable',
            'valbayiu16'  => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [

            'valpenyakitsetahun.required'  => ':attribute tidak boleh kosong',
            'valrumah_sakit.required'  => ':attribute tidak boleh kosong',
            'valrumah_sakitb.required'  => ':attribute   tidak boleh kosong',
            'valpuskesmas_denganri.required'  => ':attribute   tidak boleh kosong',
            'valpuskesmas_tanpari.required'  => ':attribute   tidak boleh kosong',
            'valpuskemas_pembantu.required'  => ':attribute   tidak boleh kosong',
            'valpoliklinik.required'  => ':attribute   tidak boleh kosong',
            'valtempat_praktekdr.required'  => ':attribute   tidak boleh kosong',
            'valrumah_bersalin.required'  => ':attribute   tidak boleh kosong',
            'valtempat_praktek.required'  => ':attribute   tidak boleh kosong',
            'valposkesdes.required'  => ':attribute   tidak boleh kosong',
            'valpolindes.required'  => ':attribute   tidak boleh kosong',
            'valapotik.required'  => ':attribute   tidak boleh kosong',
            'valtoko_obat.required'  => ':attribute   tidak boleh kosong',
            'valposyandu.required'  => ':attribute   tidak boleh kosong',
            'valposbindu.required'  => ':attribute   tidak boleh kosong',
            'valtempat_praktikdb.required'  => ':attribute   tidak boleh kosong',
            'valjamkes.required'  => ':attribute   tidak boleh kosong',
            'valbayiu16.required'  => ':attribute   tidak boleh kosong',



        ];
    }

    public function attributes(): array
    {
        return [
            'valpenyakitsetahun' => 'penyakitsetahun',
            'valrumah_sakit'  => 'rumah_sakit',
            'valrumah_sakitb'  => 'rumah_sakitb',
            'valpuskesmas_denganri'  => 'puskesmas_denganri',
            'valpuskesmas_tanpari'  => 'puskesmas_tanpari',
            'valpuskemas_pembantu'  => 'puskemas_pembantu',
            'valpoliklinik'  => 'poliklinik',
            'valtempat_praktekdr'  => 'tempat_praktekdr',
            'valrumah_bersalin'  => 'rumah_bersalin',
            'valtempat_praktek'  => 'tempat_praktek',
            'valposkesdes'  => 'poskesdes',
            'valpolindes'  => 'polindes',
            'valapotik'  => 'apotik',
            'valtoko_obat'  => 'toko_obat',
            'valposyandu'  => 'posyandu',
            'valposbindu'  => 'posbindu',
            'valtempat_praktikdb'  => 'tempat_praktikdb',
            'valjamkes'  => 'jamkes',
            'valbayiu16'  => 'bayiu16',

        ];
    }
}
