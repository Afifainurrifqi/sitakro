<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_tkejahatanRequest extends FormRequest
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

            'valjk_pencurian' => 'nullable',
            'valjumlahselesai_pencurian' => 'nullable',
            'valjktbd_pencurian' => 'nullable',
            'valkll_pencurian' => 'nullable',
            'valkt_pencurian' => 'nullable',
            'valjk_pencuriankeras' => 'nullable',
            'valjumlahselesai_pencuriankeras' => 'nullable',
            'valjktbd_pencuriankeras' => 'nullable',
            'valkll_pencuriankeras' => 'nullable',
            'valkt_pencuriankeras' => 'nullable',
            'valjk_penipuan' => 'nullable',
            'valjumlahselesai_penipuan' => 'nullable',
            'valjktbd_penipuan' => 'nullable',
            'valkll_penipuan' => 'nullable',
            'valkt_penipuan' => 'nullable',
            'valjk_penganiyayaan' => 'nullable',
            'valjumlahselesai_penganiyayaan' => 'nullable',
            'valjktbd_penganiyayaan' => 'nullable',
            'valkll_penganiyayaan' => 'nullable',
            'valkt_penganiyayaan' => 'nullable',
            'valjk_pembakaran' => 'nullable',
            'valjumlahselesai_pembakaran' => 'nullable',
            'valjktbd_pembakaran' => 'nullable',
            'valkll_pembakaran' => 'nullable',
            'valkt_pembakaran' => 'nullable',
            'valjk_pemerkosaan' => 'nullable',
            'valjumlahselesai_pemerkosaan' => 'nullable',
            'valjktbd_pemerkosaan' => 'nullable',
            'valkll_pemerkosaan' => 'nullable',
            'valkt_pemerkosaan' => 'nullable',
            'valjk_narkoba' => 'nullable',
            'valjumlahselesai_narkoba' => 'nullable',
            'valjktbd_narkoba' => 'nullable',
            'valkll_narkoba' => 'nullable',
            'valkt_narkoba' => 'nullable',
            'valjk_perjudian' => 'nullable',
            'valjumlahselesai_perjudian' => 'nullable',
            'valjktbd_perjudian' => 'nullable',
            'valkll_perjudian' => 'nullable',
            'valkt_perjudian' => 'nullable',
            'valjk_pembunuhan' => 'nullable',
            'valjumlahselesai_pembunuhan' => 'nullable',
            'valjktbd_pembunuhan' => 'nullable',
            'valkll_pembunuhan' => 'nullable',
            'valkt_pembunuhan' => 'nullable',
            'valjk_perdaganganorang' => 'nullable',
            'valjumlahselesai_perdaganganorang' => 'nullable',
            'valjktbd_perdaganganorang' => 'nullable',
            'valkll_perdaganganorang' => 'nullable',
            'valkt_perdaganganorang' => 'nullable',
            'valjk_korupsi' => 'nullable',
            'valjumlahselesai_korupsi' => 'nullable',
            'valjktbd_korupsi' => 'nullable',
            'valkll_korupsi' => 'nullable',
            'valkt_korupsi' => 'nullable',
            'valjk_lainnya' => 'nullable',
            'valjumlahselesai_lainnya' => 'nullable',
            'valjktbd_lainnya' => 'nullable',
            'valkll_lainnya' => 'nullable',
            'valkt_lainnya' => 'nullable',



        ];
    }

    public function messages(): array
    {
        return [

            'valjk_pencurian.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pencurian.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pencurian.required' => ':Attribute tidak boleh kosong',
            'valkll_pencurian.required' => ':Attribute tidak boleh kosong',
            'valkt_pencurian.required' => ':Attribute tidak boleh kosong',

            'valjk_pencuriankeras.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pencuriankeras.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pencuriankeras.required' => ':Attribute tidak boleh kosong',
            'valkll_pencuriankeras.required' => ':Attribute tidak boleh kosong',
            'valkt_pencuriankeras.required' => ':Attribute tidak boleh kosong',

            'valjk_penipuan.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_penipuan.required' => ':Attribute tidak boleh kosong',
            'valjktbd_penipuan.required' => ':Attribute tidak boleh kosong',
            'valkll_penipuan.required' => ':Attribute tidak boleh kosong',
            'valkt_penipuan.required' => ':Attribute tidak boleh kosong',

            'valjk_penganiyayaan.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_penganiyayaan.required' => ':Attribute tidak boleh kosong',
            'valjktbd_penganiyayaan.required' => ':Attribute tidak boleh kosong',
            'valkll_penganiyayaan.required' => ':Attribute tidak boleh kosong',
            'valkt_penganiyayaan.required' => ':Attribute tidak boleh kosong',

            'valjk_pembakaran.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pembakaran.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pembakaran.required' => ':Attribute tidak boleh kosong',
            'valkll_pembakaran.required' => ':Attribute tidak boleh kosong',
            'valkt_pembakaran.required' => ':Attribute tidak boleh kosong',

            'valjk_pemerkosaan.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pemerkosaan.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pemerkosaan.required' => ':Attribute tidak boleh kosong',
            'valkll_pemerkosaan.required' => ':Attribute tidak boleh kosong',
            'valkt_pemerkosaan.required' => ':Attribute tidak boleh kosong',

            'valjk_narkoba.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_narkoba.required' => ':Attribute tidak boleh kosong',
            'valjktbd_narkoba.required' => ':Attribute tidak boleh kosong',
            'valkll_narkoba.required' => ':Attribute tidak boleh kosong',
            'valkt_narkoba.required' => ':Attribute tidak boleh kosong',

            'valjk_perjudian.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_perjudian.required' => ':Attribute tidak boleh kosong',
            'valjktbd_perjudian.required' => ':Attribute tidak boleh kosong',
            'valkll_perjudian.required' => ':Attribute tidak boleh kosong',
            'valkt_perjudian.required' => ':Attribute tidak boleh kosong',

            'valjk_pembunuhan.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_pembunuhan.required' => ':Attribute tidak boleh kosong',
            'valjktbd_pembunuhan.required' => ':Attribute tidak boleh kosong',
            'valkll_pembunuhan.required' => ':Attribute tidak boleh kosong',
            'valkt_pembunuhan.required' => ':Attribute tidak boleh kosong',

            'valjk_perdaganganorang.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_perdaganganorang.required' => ':Attribute tidak boleh kosong',
            'valjktbd_perdaganganorang.required' => ':Attribute tidak boleh kosong',
            'valkll_perdaganganorang.required' => ':Attribute tidak boleh kosong',
            'valkt_perdaganganorang.required' => ':Attribute tidak boleh kosong',

            'valjk_korupsi.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_korupsi.required' => ':Attribute tidak boleh kosong',
            'valjktbd_korupsi.required' => ':Attribute tidak boleh kosong',
            'valkll_korupsi.required' => ':Attribute tidak boleh kosong',
            'valkt_korupsi.required' => ':Attribute tidak boleh kosong',

            'valjk_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjumlahselesai_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjktbd_lainnya.required' => ':Attribute tidak boleh kosong',
            'valkll_lainnya.required' => ':Attribute tidak boleh kosong',
            'valkt_lainnya.required' => ':Attribute tidak boleh kosong',





        ];
    }

    public function attributes(): array
    {
        return [

           'valjk_pencurian' => 'jk_pencurian',
            'valjumlahselesai_pencurian' => 'jumlahselesai_pencurian',
            'valjktbd_pencurian' => 'jktbd_pencurian',
            'valkll_pencurian' => 'kll_pencurian',
            'valkt_pencurian' => 'kt_pencurian',

            'valjk_pencuriankeras' => 'jk_pencuriankeras',
            'valjumlahselesai_pencuriankeras' => 'jumlahselesai_pencuriankeras',
            'valjktbd_pencuriankeras' => 'jktbd_pencuriankeras',
            'valkll_pencuriankeras' => 'kll_pencuriankeras',
            'valkt_pencuriankeras' => 'kt_pencuriankeras',

            'valjk_penipuan' => 'jk_penipuan',
            'valjumlahselesai_penipuan' => 'jumlahselesai_penipuan',
            'valjktbd_penipuan' => 'jktbd_penipuan',
            'valkll_penipuan' => 'kll_penipuan',
            'valkt_penipuan' => 'kt_penipuan',

            'valjk_penganiyayaan' => 'jk_penganiyayaan',
            'valjumlahselesai_penganiyayaan' => 'jumlahselesai_penganiyayaan',
            'valjktbd_penganiyayaan' => 'jktbd_penganiyayaan',
            'valkll_penganiyayaan' => 'kll_penganiyayaan',
            'valkt_penganiyayaan' => 'kt_penganiyayaan',

            'valjk_pembakaran' => 'jk_pembakaran',
            'valjumlahselesai_pembakaran' => 'jumlahselesai_pembakaran',
            'valjktbd_pembakaran' => 'jktbd_pembakaran',
            'valkll_pembakaran' => 'kll_pembakaran',
            'valkt_pembakaran' => 'kt_pembakaran',

            'valjk_pemerkosaan' => 'jk_pemerkosaan',
            'valjumlahselesai_pemerkosaan' => 'jumlahselesai_pemerkosaan',
            'valjktbd_pemerkosaan' => 'jktbd_pemerkosaan',
            'valkll_pemerkosaan' => 'kll_pemerkosaan',
            'valkt_pemerkosaan' => 'kt_pemerkosaan',

            'valjk_narkoba' => 'jk_narkoba',
            'valjumlahselesai_narkoba' => 'jumlahselesai_narkoba',
            'valjktbd_narkoba' => 'jktbd_narkoba',
            'valkll_narkoba' => 'kll_narkoba',
            'valkt_narkoba' => 'kt_narkoba',

            'valjk_perjudian' => 'jk_perjudian',
            'valjumlahselesai_perjudian' => 'jumlahselesai_perjudian',
            'valjktbd_perjudian' => 'jktbd_perjudian',
            'valkll_perjudian' => 'kll_perjudian',
            'valkt_perjudian' => 'kt_perjudian',

            'valjk_pembunuhan' => 'jk_pembunuhan',
            'valjumlahselesai_pembunuhan' => 'jumlahselesai_pembunuhan',
            'valjktbd_pembunuhan' => 'jktbd_pembunuhan',
            'valkll_pembunuhan' => 'kll_pembunuhan',
            'valkt_pembunuhan' => 'kt_pembunuhan',

            'valjk_perdaganganorang' => 'jk_perdaganganorang',
            'valjumlahselesai_perdaganganorang' => 'jumlahselesai_perdaganganorang',
            'valjktbd_perdaganganorang' => 'jktbd_perdaganganorang',
            'valkll_perdaganganorang' => 'kll_perdaganganorang',
            'valkt_perdaganganorang' => 'kt_perdaganganorang',

            'valjk_korupsi' => 'jk_korupsi',
            'valjumlahselesai_korupsi' => 'jumlahselesai_korupsi',
            'valjktbd_korupsi' => 'jktbd_korupsi',
            'valkll_korupsi' => 'kll_korupsi',
            'valkt_korupsi' => 'kt_korupsi',

            'valjk_lainnya' => 'jk_lainnya',
            'valjumlahselesai_lainnya' => 'jumlahselesai_lainnya',
            'valjktbd_lainnya' => 'jktbd_lainnya',
            'valkll_lainnya' => 'kll_lainnya',

            'valkt_lainnya' => 'kt_lainnya',



        ];
    }
}

