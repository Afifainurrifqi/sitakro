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
            'valpendidikan_tertinggi' => 'nullable',
            'valberapa_tahunp' => 'nullable',

            'valbahasa_Rumah' => 'nullable',
            'valbahasa_Formal' => 'nullable',
            'valjumlah_kerja1' => 'nullable',
            'valskamling' => 'nullable',
            'valpesta_rakyat1' => 'nullable',
            'valfrekuensiml' => 'nullable',
            'valfrekuensib' => 'nullable',
            'valfrekuensmn' => 'nullable',
            'valmendapatp1' => 'nullable',
            'valbagaiamanap' => 'nullable',
            'valpernahmasukan' => 'nullable',
            'valketerbukaands' => 'nullable',
            'valbencana1' => 'nullable',
            'valbencana1' => 'nullable',
            'valapakahd' => 'nullable',
            'valapakahp' => 'nullable',



        ];
    }

    public function messages(): array
    {
        return [


            'valpendidikan_tertinggi.required' => ':attribute kolom tidak bileh kosong',
            'valberapa_tahunp.required' => ':attribute kolom tidak bileh kosong',

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
