<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresdgspendidikanRequest extends FormRequest
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
            'valpendidikan_tertinggi' => 'required',
            'valberapa_tahunp' => 'required',
            'valpendidikan_diikuti' => 'required',
            'valbahasa_Rumah' => 'required',
            'valbahasa_Formal' => 'required',
            'valjumlah_kerja1' => 'required',
            'valskamling' => 'required',
            'valpesta_rakyat1' => 'required',
            'valfrekuensiml' => 'required',
            'valfrekuensib' => 'required',
            'valfrekuensmn' => 'required',
            'valmendapatp1' => 'required',
            'valbagaiamanap' => 'required',
            'valpernahmasukan' => 'required',
            'valketerbukaands' => 'required',
            'valbencana1' => 'required',
            'valbencana1' => 'required',
            'valapakahd' => 'required',
            'valapakahp' => 'required',



        ];
    }

    public function messages(): array
    {
        return [


            'valpendidikan_tertinggi.required' => ':attribute kolom tidak bileh kosong',
            'valberapa_tahunp.required' => ':attribute kolom tidak bileh kosong',
            'valpendidikan_diikuti.required' => ':attribute kolom tidak bileh kosong',
            'valbahasa_Rumah.required' => ':attribute kolom tidak bileh kosong',
            'valbahasa_Formal.required' => ':attribute kolom tidak bileh kosong',
            'valjumlah_kerja1.required' => ':attribute kolom tidak bileh kosong',
            'valskamling.required' => ':attribute kolom tidak bileh kosong',
            'valpesta_rakyat1.required' => ':attribute kolom tidak bileh kosong',
            'valfrekuensiml.required' => ':attribute kolom tidak bileh kosong',
            'valfrekuensib.required' => ':attribute kolom tidak bileh kosong',
            'valfrekuensmn.required' => ':attribute kolom tidak bileh kosong',
            'valmendapatp1.required' => ':attribute kolom tidak bileh kosong',
            'valbagaiamanap.required' => ':attribute kolom tidak bileh kosong',
            'valpernahmasukan.required' => ':attribute kolom tidak bileh kosong',
            'valketerbukaands.required' => ':attribute kolom tidak bileh kosong',
            'valbencana1.required' => ':attribute kolom tidak bileh kosong',
            'valbencana1.required' => ':attribute kolom tidak bileh kosong',
            'valapakahd.required' => ':attribute kolom tidak bileh kosong',
            'valapakahp.required' => ':attribute kolom tidak bileh kosong',



        ];
    }

    public function attributes(): array
    {
        return [

            'valpendidikan_tertinggi' => 'pendidikan_tertinggi',
            'valberapa_tahunp' => 'berapa_tahunp',
            'valpendidikan_diikuti' => 'pendidikan_diikuti',
            'valbahasa_Rumah' => 'bahasa_Rumah',
            'valbahasa_Formal' => 'bahasa_Formal',
            'valjumlah_kerja1' => 'jumlah_kerja1',
            'valskamling' => 'skamling',
            'valpesta_rakyat1' => 'pesta_rakyat1',
            'valfrekuensiml' => 'frekuensiml',
            'valfrekuensib' => 'frekuensib',
            'valfrekuensmn' => 'frekuensmn',
            'valmendapatp1' => 'mendapatp1',
            'valbagaiamanap' => 'bagaiamanap',
            'valpernahmasukan' => 'pernahmasukan',
            'valketerbukaands' => 'keterbukaands',
            'valbencana1' => 'bencana1',
            'valapakahb' => 'apakahb',
            'valapakahd' => 'apakahd',
            'valapakahp' => 'apakahp',

        ];
    }
}
