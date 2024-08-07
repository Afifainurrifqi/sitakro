<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatertkegiatan_wargaRequest extends FormRequest
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

            'valjumlah_kpp' => 'nullable',
            'valjumlah_ppr' => 'nullable',
            'valjumlah_hansip' => 'nullable',
            'valpelaporan_tamu_lebih24' => 'nullable',
            'valsistem_keamanan' => 'nullable',
            'valsistem_linmas' => 'nullable',
            'valjumlahpos_digunakan' => 'nullable',
            'valjumlahpos_tidakdigunakan' => 'nullable',
            'valjarak_ppt' => 'nullable',
            'valkemudahan_ppt' => 'nullable',
            'valjarak_korban' => 'nullable',
            'valjarak_lokasikumpul' => 'nullable',
            'valjarak_mangkal' => 'nullable',
            'valjarak_lokalisasi' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [
            'valjumlah_kpp.required' => ':Attribute tidak boleh kosong',
            'valjumlah_ppr.required' => ':Attribute tidak boleh kosong',
            'valjumlah_hansip.required' => ':Attribute tidak boleh kosong',
            'valpelaporan_tamu_lebih24.required' => ':Attribute tidak boleh kosong',
            'valsistem_keamanan.required' => ':Attribute tidak boleh kosong',
            'valsistem_linmas.required' => ':Attribute tidak boleh kosong',
            'valjumlahpos_digunakan.required' => ':Attribute tidak boleh kosong',
            'valjumlahpos_tidakdigunakan.required' => ':Attribute tidak boleh kosong',
            'valjarak_ppt.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_ppt.required' => ':Attribute tidak boleh kosong',
            'valjarak_korban.required' => ':Attribute tidak boleh kosong',
            'valjarak_lokasikumpul.required' => ':Attribute tidak boleh kosong',
            'valjarak_mangkal.required' => ':Attribute tidak boleh kosong',
            'valjarak_lokalisasi.required' => ':Attribute tidak boleh kosong',
        ];
    }

    public function attributes(): array
    {
        return [
            'valjumlah_kpp' => 'jumlah_kpp',
            'valjumlah_ppr' => 'jumlah_ppr',
            'valjumlah_hansip' => 'jumlah_hansip',
            'valpelaporan_tamu_lebih24' => 'pelaporan_tamu_lebih24',
            'valsistem_keamanan' => 'sistem_keamanan',
            'valsistem_linmas' => 'sistem_linmas',
            'valjumlahpos_digunakan' => 'jumlahpos_digunakan',
            'valjumlahpos_tidakdigunakan' => 'jumlahpos_tidakdigunakan',
            'valjarak_ppt' => 'jarak_ppt',
            'valkemudahan_ppt' => 'kemudahan_ppt',
            'valjarak_korban' => 'jarak_korban',
            'valjarak_lokasikumpul' => 'jarak_lokasikumpul',
            'valjarak_mangkal' => 'jarak_mangkal',
            'valjarak_lokalisasi' => 'jarak_lokalisasi',


        ];
    }
}
