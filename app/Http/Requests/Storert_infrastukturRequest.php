<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_infrastukturRequest extends FormRequest
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

            'valpenerangan_jalan' => 'nullable',
            'valpra_transportrt' => 'nullable',
            'valjalan_aspal' => 'nullable',
            'valjalan_makadam' => 'nullable',
            'valjalan_tanah' => 'nullable',
            'valjalan_papan_atasaair' => 'nullable',
            'valjalan_setapak' => 'nullable',
            'valjalan_lainnya' => 'nullable',
            'valjalan_darat_roda4' => 'nullable',
            'valangkutanumum_trayek' => 'nullable',
            'valangkutanumum_opra' => 'nullable',
            'valangkutanumum_jamopra' => 'nullable',
            'valdermaga_laut' => 'nullable',
            'valsinyalhp_bts' => 'nullable',
            'valsinyalhp_telkom' => 'nullable',
            'valsinyalhp_indo' => 'nullable',
            'valsinyalhp_xl' => 'nullable',
            'valsinyalhp_hut' => 'nullable',
            'valsinyalhp_psn' => 'nullable',
            'valsinyalhp_smart' => 'nullable',
            'valsinyalhp_bakrie' => 'nullable',
            'valpos_pembantu' => 'nullable',
            'valpos_keliling' => 'nullable',
            'valagen_jasa' => 'nullable',
            'valchanel_tvri' => 'nullable',
            'valparabola_tvri' => 'nullable',
            'valchanel_tvrid' => 'nullable',
            'valparabola_tvrid' => 'nullable',
            'valchanel_s' => 'nullable',
            'valparabola_s' => 'nullable',
            'valchanel_ln' => 'nullable',
            'valparabola_ln' => 'nullable',
            'valchanel_rri' => 'nullable',
            'valparabola_rri' => 'nullable',
            'valchanel_rrid' => 'nullable',
            'valparabola_rrid' => 'nullable',
            'valchanel_radios' => 'nullable',
            'valparabola_radios' => 'nullable',
            'valchanel_radiok' => 'nullable',
            'valparabola_radiok' => 'nullable',
            'valjumlah_lokasi_air' => 'nullable',
            'valfasilitas_umump_pasar' => 'nullable',
            'valfasilitas_umump_stasiun' => 'nullable',
            'valfasilitas_umump_terminal' => 'nullable',
            'valfasilitas_umump_kolong' => 'nullable',
            'valfasilitas_umump_pelabuhan' => 'nullable',
            'valpemukiman_khusus_mewah' => 'nullable',
            'valpemukiman_khusus_apart' => 'nullable',
            'valpemukiman_khusus_susun' => 'nullable',
            'valpemukiman_khusus_school' => 'nullable',
            'valpemukiman_khusus_kos' => 'nullable',
            'valpemukiman_khusus_asrama' => 'nullable',
            'valpemukiman_khusus_lp' => 'nullable',





        ];
    }

    public function messages(): array
    {
        return [

            'valpenerangan_jalan.required' => ':Attribute tidak boleh kosong',
            'valpra_transportrt.required' => ':Attribute tidak boleh kosong',
            'valjalan_aspal.required' => ':Attribute tidak boleh kosong',
            'valjalan_makadam.required' => ':Attribute tidak boleh kosong',
            'valjalan_tanah.required' => ':Attribute tidak boleh kosong',
            'valjalan_papan_atasaair.required' => ':Attribute tidak boleh kosong',
            'valjalan_setapak.required' => ':Attribute tidak boleh kosong',
            'valjalan_lainnya.required' => ':Attribute tidak boleh kosong',
            'valjalan_darat_roda4.required' => ':Attribute tidak boleh kosong',
            'valangkutanumum_trayek.required' => ':Attribute tidak boleh kosong',
            'valangkutanumum_opra.required' => ':Attribute tidak boleh kosong',
            'valangkutanumum_jamopra.required' => ':Attribute tidak boleh kosong',
            'valdermaga_laut.required' => ':Attribute tidak boleh kosong',
            'valsinyalhp_bts.required' => ':Attribute tidak boleh kosong',
            'valsinyalhp_telkom.required' => ':Attribute tidak boleh kosong',
            'valsinyalhp_indo.required' => ':Attribute tidak boleh kosong',
            'valsinyalhp_xl.required' => ':Attribute tidak boleh kosong',
            'valsinyalhp_hut.required' => ':Attribute tidak boleh kosong',
            'valsinyalhp_psn.required' => ':Attribute tidak boleh kosong',
            'valsinyalhp_smart.required' => ':Attribute tidak boleh kosong',
            'valsinyalhp_bakrie.required' => ':Attribute tidak boleh kosong',
            'valpos_pembantu.required' => ':Attribute tidak boleh kosong',
            'valpos_keliling.required' => ':Attribute tidak boleh kosong',
            'valagen_jasa.required' => ':Attribute tidak boleh kosong',
            'valchanel_tvri.required' => ':Attribute tidak boleh kosong',
            'valparabola_tvri.required' => ':Attribute tidak boleh kosong',
            'valchanel_tvrid.required' => ':Attribute tidak boleh kosong',
            'valparabola_tvrid.required' => ':Attribute tidak boleh kosong',
            'valchanel_s.required' => ':Attribute tidak boleh kosong',
            'valparabola_s.required' => ':Attribute tidak boleh kosong',
            'valchanel_ln.required' => ':Attribute tidak boleh kosong',
            'valparabola_ln.required' => ':Attribute tidak boleh kosong',
            'valchanel_rri.required' => ':Attribute tidak boleh kosong',
            'valparabola_rri.required' => ':Attribute tidak boleh kosong',
            'valchanel_rrid.required' => ':Attribute tidak boleh kosong',
            'valparabola_rrid.required' => ':Attribute tidak boleh kosong',
            'valchanel_radios.required' => ':Attribute tidak boleh kosong',
            'valparabola_radios.required' => ':Attribute tidak boleh kosong',
            'valchanel_radiok.required' => ':Attribute tidak boleh kosong',
            'valparabola_radiok.required' => ':Attribute tidak boleh kosong',
            'valjumlah_lokasi_air.required' => ':Attribute tidak boleh kosong',
            'valfasilitas_umump_pasar.required' => ':Attribute tidak boleh kosong',
            'valfasilitas_umump_stasiun.required' => ':Attribute tidak boleh kosong',
            'valfasilitas_umump_terminal.required' => ':Attribute tidak boleh kosong',
            'valfasilitas_umump_kolong.required' => ':Attribute tidak boleh kosong',
            'valfasilitas_umump_pelabuhan.required' => ':Attribute tidak boleh kosong',
            'valpemukiman_khusus_mewah.required' => ':Attribute tidak boleh kosong',
            'valpemukiman_khusus_apart.required' => ':Attribute tidak boleh kosong',
            'valpemukiman_khusus_susun.required' => ':Attribute tidak boleh kosong',
            'valpemukiman_khusus_school.required' => ':Attribute tidak boleh kosong',
            'valpemukiman_khusus_kos.required' => ':Attribute tidak boleh kosong',
            'valpemukiman_khusus_asrama.required' => ':Attribute tidak boleh kosong',
            'valpemukiman_khusus_lp.required' => ':Attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [

           'valpenerangan_jalan' => 'penerangan_jalan',
            'valpra_transportrt' => 'pra_transportrt',
            'valjalan_aspal' => 'jalan_aspal',
            'valjalan_makadam' => 'jalan_makadam',
            'valjalan_tanah' => 'jalan_tanah',
            'valjalan_papan_atasaair' => 'jalan_papan_atasaair',
            'valjalan_setapak' => 'jalan_setapak',
            'valjalan_lainnya' => 'jalan_lainnya',
            'valjalan_darat_roda4' => 'jalan_darat_roda4',
            'valangkutanumum_trayek' => 'angkutanumum_trayek',
            'valangkutanumum_opra' => 'angkutanumum_opra',
            'valangkutanumum_jamopra' => 'angkutanumum_jamopra',
            'valdermaga_laut' => 'dermaga_laut',
            'valsinyalhp_telkom' => 'sinyalhp_telkom',
            'valsinyalhp_bts' => 'sinyalhp_bts',
            'valsinyalhp_indo' => 'sinyalhp_indo',
            'valsinyalhp_xl' => 'sinyalhp_xl',
            'valsinyalhp_hut' => 'sinyalhp_hut',
            'valsinyalhp_psn' => 'sinyalhp_psn',
            'valsinyalhp_smart' => 'sinyalhp_smart',
            'valsinyalhp_bakrie' => 'sinyalhp_bakrie',
            'valpos_pembantu' => 'pos_pembantu',
            'valpos_keliling' => 'pos_keliling',
            'valagen_jasa' => 'agen_jasa',
            'valchanel_tvri' => 'chanel_tvri',
            'valparabola_tvri' => 'parabola_tvri',
            'valchanel_tvrid' => 'chanel_tvrid',
            'valparabola_tvrid' => 'parabola_tvrid',
            'valchanel_s' => 'chanel_s',
            'valparabola_s' => 'parabola_s',
            'valchanel_ln' => 'chanel_ln',
            'valparabola_ln' => 'parabola_ln',
            'valchanel_rri' => 'chanel_rri',
            'valparabola_rri' => 'parabola_rri',
            'valchanel_rrid' => 'chanel_rrid',
            'valparabola_rrid' => 'parabola_rrid',
            'valchanel_radios' => 'chanel_radios',
            'valparabola_radios' => 'parabola_radios',
            'valchanel_radiok' => 'chanel_radiok',
            'valparabola_radiok' => 'parabola_radiok',
            'valjumlah_lokasi_air' => 'jumlah_lokasi_air',
            'valfasilitas_umump_pasar' => 'fasilitas_umump_pasar',
            'valfasilitas_umump_stasiun' => 'fasilitas_umump_stasiun',
            'valfasilitas_umump_terminal' => 'fasilitas_umump_terminal',
            'valfasilitas_umump_kolong' => 'fasilitas_umump_kolong',
            'valfasilitas_umump_pelabuhan' => 'fasilitas_umump_pelabuhan',
            'valpemukiman_khusus_mewah' => 'pemukiman_khusus_mewah',
            'valpemukiman_khusus_apart' => 'pemukiman_khusus_apart',
            'valpemukiman_khusus_susun' => 'pemukiman_khusus_susun',
            'valpemukiman_khusus_school' => 'pemukiman_khusus_school',
            'valpemukiman_khusus_kos' => 'pemukiman_khusus_kos',
            'valpemukiman_khusus_asrama' => 'pemukiman_khusus_asrama',
            'valpemukiman_khusus_lp' => 'pemukiman_khusus_lp',



        ];
    }
}

