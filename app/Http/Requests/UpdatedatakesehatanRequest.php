<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedatakesehatanRequest extends FormRequest
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
            'valpenyakitsetahun'  => 'required',
            'valrumah_sakit'  => 'required',
            'valrumah_sakitb'  => 'required',
            'valpuskesmas_denganri'  => 'required',
            'valpuskesmas_tanpari'  => 'required',
            'valpuskemas_pembantu'  => 'required',
            'valpoliklinik'  => 'required',
            'valtempat_praktekdr'  => 'required',
            'valrumah_bersalin'  => 'required',
            'valtempat_praktek'  => 'required',
            'valposkesdes'  => 'required',
            'valpolindes'  => 'required',
            'valapotik'  => 'required',
            'valtoko_obat'  => 'required',
            'valposyandu'  => 'required',
            'valposbindu'  => 'required',
            'valtempat_praktikdb'  => 'required',
            'valjamkes'  => 'required',
            'valbayiu16'  => 'required',
        ];
    }

    public function messages(): array
    {
        return [

            'valpenyakitsetahunrequired'  => ':attribute tidak boleh kosong',
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
