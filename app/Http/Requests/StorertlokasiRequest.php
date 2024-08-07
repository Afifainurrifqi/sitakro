<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorertlokasiRequest extends FormRequest
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

            'valnama_ketuart' => 'nullable',
            'valalamat' => 'nullable',
            'valrt' => 'nullable',
            'valrw' => 'nullable',
            'valnohp' => 'nullable',
            'vallokasi_rt_pulau' => 'nullable',
            'valtopo_terluas_rt' => 'nullable',
            'valjumlah_warga_lereng' => 'nullable',
            'valpenanaman_pohon_lahan_kritis' => 'nullable',
            'valpantai_garis_panjang' => 'nullable',
            'valpemanfaatan_laut_perangkap' => 'nullable',
            'valpemanfaatan_laut_budidaya' => 'nullable',
            'valpemanfaatan_laut_tambakg' => 'nullable',
            'valpemanfaatan_laut_bahari' => 'nullable',
            'valpemanfaatan_laut_transport' => 'nullable',
            'valkondisi_mangrove' => 'nullable',
            'valpenanaman_mangrove' => 'nullable',
            'valjumlah_warga_pesisir' => 'nullable',
            'valjumlah_warga_atasair' => 'nullable',
            'valwilayah_desa_dalamhutan' => 'nullable',
            'valwilayah_desa_tepihutan' => 'nullable',
            'valfungsihutan_kons' => 'nullable',
            'valfungsihutan_lindung' => 'nullable',
            'valfungsihutan_produk' => 'nullable',
            'valfungsihutan_hutandes' => 'nullable',
            'valjumlahwarga_tinggal_dalamhutan' => 'nullable',
            'valjumlahwarga_tinggal_sekitarhutan' => 'nullable',
            'valketergantungan_hutan' => 'nullable',
            'valreboisasi' => 'nullable',
            'valjumlah_produk_luardesa_masuk' => 'nullable',
            'valjumlah_produk_luardesa_keluar' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [



            'valnama_ketuart.required' => ':Attribute tidak boleh kosong',
            'valalamat.required' => ':Attribute tidak boleh kosong',
            'valrt.required' => ':Attribute tidak boleh kosong',
            'valrw.required' => ':Attribute tidak boleh kosong',
            'valnohp.required' => ':Attribute tidak boleh kosong',
            'vallokasi_rt_pulau.required' => ':Attribute tidak boleh kosong',
            'valtopo_terluas_rt.required' => ':Attribute tidak boleh kosong',
            'valjumlah_warga_lereng.required' => ':Attribute tidak boleh kosong',
            'valpenanaman_pohon_lahan_kritis.required' => ':Attribute tidak boleh kosong',
            'valpantai_garis_panjang.required' => ':Attribute tidak boleh kosong',
            'valpemanfaatan_laut_perangkap.required' => ':Attribute tidak boleh kosong',
            'valpemanfaatan_laut_budidaya.required' => ':Attribute tidak boleh kosong',
            'valpemanfaatan_laut_tambakg.required' => ':Attribute tidak boleh kosong',
            'valpemanfaatan_laut_bahari.required' => ':Attribute tidak boleh kosong',
            'valpemanfaatan_laut_transport.required' => ':Attribute tidak boleh kosong',
            'valkondisi_mangrove.required' => ':Attribute tidak boleh kosong',
            'valpenanaman_mangrove.required' => ':Attribute tidak boleh kosong',
            'valjumlah_warga_pesisir.required' => ':Attribute tidak boleh kosong',
            'valjumlah_warga_atasair.required' => ':Attribute tidak boleh kosong',
            'valwilayah_desa_dalamhutan.required' => ':Attribute tidak boleh kosong',
            'valwilayah_desa_tepihutan.required' => ':Attribute tidak boleh kosong',
            'valfungsihutan_kons.required' => ':Attribute tidak boleh kosong',
            'valfungsihutan_lindung.required' => ':Attribute tidak boleh kosong',
            'valfungsihutan_produk.required' => ':Attribute tidak boleh kosong',
            'valfungsihutan_hutandes.required' => ':Attribute tidak boleh kosong',
            'valjumlahwarga_tinggal_dalamhutan.required' => ':Attribute tidak boleh kosong',
            'valjumlahwarga_tinggal_sekitarhutan.required' => ': ttribute tidak boleh kosong',
            'valketergantungan_hutan.required' => ':Attribute tidak boleh kosong',
            'valreboisasi.required' => ':Attribute tidak boleh kosong',
            'valjumlah_produk_luardesa_masuk.required' => ':Attribute tidak boleh kosong',
            'valjumlah_produk_luardesa_keluar.required' => ':Attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [


            'valnama_ketuart' => 'nama_ketuart',
            'valalamat' => 'alamat',
            'valrt' => 'rt',
            'valrw' => 'rw',
            'valnohp' => 'nohp',
            'vallokasi_rt_pulau' => 'lokasi_rt_pulau',
            'valtopo_terluas_rt' => 'topo_terluas_rt',
            'valjumlah_warga_lereng' => 'jumlah_warga_lereng',
            'valpenanaman_pohon_lahan_kritis' => 'penanaman_pohon_lahan_kritis',
            'valpantai_garis_panjang' => 'pantai_garis_panjang',
            'valpemanfaatan_laut_perangkap' => 'pemanfaatan_laut_perangkap',
            'valpemanfaatan_laut_budidaya' => 'pemanfaatan_laut_budidaya',
            'valpemanfaatan_laut_tambakg' => 'pemanfaatan_laut_tambakg',
            'valpemanfaatan_laut_bahari' => 'pemanfaatan_laut_bahari',
            'valpemanfaatan_laut_transport' => 'pemanfaatan_laut_transport',
            'valkondisi_mangrove' => 'kondisi_mangrove',
            'valpenanaman_mangrove' => 'penanaman_mangrove',
            'valjumlah_warga_pesisir' => 'jumlah_warga_pesisir',
            'valjumlah_warga_atasair' => 'jumlah_warga_atasair',
            'valwilayah_desa_dalamhutan' => 'wilayah_desa_dalamhutan',
            'valwilayah_desa_tepihutan' => 'wilayah_desa_tepihutan',
            'valfungsihutan_kons' => 'fungsihutan_kons',
            'valfungsihutan_lindung' => 'fungsihutan_lindung',
            'valfungsihutan_produk' => 'fungsihutan_produk',
            'valfungsihutan_hutandes' => 'fungsihutan_hutandes',
            'valjumlahwarga_tinggal_dalamhutan' => 'jumlahwarga_tinggal_dalamhutan',
            'valjumlahwarga_tinggal_sekitarhutan' => 'jumlahwarga_tinggal_sekitarhutan',
            'valketergantungan_hutan' => 'ketergantungan_hutan',
            'valreboisasi' => 'reboisasi',
            'valjumlah_produk_luardesa_masuk' => 'jumlah_produk_luardesa_masuk',
            'valjumlah_produk_luardesa_keluar' => 'jumlah_produk_luardesa_keluar',



        ];
    }
}
