<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storert_saranapendidikanRequest extends FormRequest
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
            'valnama_paud' => 'required',
            'valpemilik_paud' => 'required',
            'valkondisi_paud' => 'required',
            'valjumlahguru_paud' => 'required',
            'valjumlahmurid_paud' => 'required',
            'valjumlahpegawai_paud' => 'required',
            'valnama_tk' => 'required',
            'valpemilik_tk' => 'required',
            'valkondisi_tk' => 'required',
            'valjumlahguru_tk' => 'required',
            'valjumlahmurid_tk' => 'required',
            'valjumlahpegawai_tk' => 'required',
            'valnama_sd' => 'required',
            'valpemilik_sd' => 'required',
            'valkondisi_sd' => 'required',
            'valjumlahguru_sd' => 'required',
            'valjumlahmurid_sd' => 'required',
            'valjumlahpegawai_sd' => 'required',
            'valnama_smp' => 'required',
            'valpemilik_smp' => 'required',
            'valkondisi_smp' => 'required',
            'valjumlahguru_smp' => 'required',
            'valjumlahmurid_smp' => 'required',
            'valjumlahpegawai_smp' => 'required',
            'valnama_smplb' => 'required',
            'valpemilik_smplb' => 'required',
            'valkondisi_smplb' => 'required',
            'valjumlahguru_smplb' => 'required',
            'valjumlahmurid_smplb' => 'required',
            'valjumlahpegawai_smplb' => 'required',
            'valnama_sma' => 'required',
            'valpemilik_sma' => 'required',
            'valkondisi_sma' => 'required',
            'valjumlahguru_sma' => 'required',
            'valjumlahmurid_sma' => 'required',
            'valjumlahpegawai_sma' => 'required',
            'valnama_smk' => 'required',
            'valpemilik_smk' => 'required',
            'valkondisi_smk' => 'required',
            'valjumlahguru_smk' => 'required',
            'valjumlahmurid_smk' => 'required',
            'valjumlahpegawai_smk' => 'required',
            'valnama_smalb' => 'required',
            'valpemilik_smalb' => 'required',
            'valkondisi_smalb' => 'required',
            'valjumlahguru_smalb' => 'required',
            'valjumlahmurid_smalb' => 'required',
            'valjumlahpegawai_smalb' => 'required',
            'valnama_akademi' => 'required',
            'valpemilik_akademi' => 'required',
            'valkondisi_akademi' => 'required',
            'valjumlahguru_akademi' => 'required',
            'valjumlahmurid_akademi' => 'required',
            'valjumlahpegawai_akademi' => 'required',
            'valnama_pesantren' => 'required',
            'valpemilik_pesantren' => 'required',
            'valkondisi_pesantren' => 'required',
            'valjumlahguru_pesantren' => 'required',
            'valjumlahmurid_pesantren' => 'required',
            'valjumlahpegawai_pesantren' => 'required',
            'valnama_madrasahdn' => 'required',
            'valpemilik_madrasahdn' => 'required',
            'valkondisi_madrasahdn' => 'required',
            'valjumlahguru_madrasahdn' => 'required',
            'valjumlahmurid_madrasahdn' => 'required',
            'valjumlahpegawai_madrasahdn' => 'required',
            'valnama_seminari' => 'required',
            'valpemilik_seminari' => 'required',
            'valkondisi_seminari' => 'required',
            'valjumlahguru_seminari' => 'required',
            'valjumlahmurid_seminari' => 'required',
            'valjumlahpegawai_seminari' => 'required',
            'valnama_sekolahag' => 'required',
            'valpemilik_sekolahag' => 'required',
            'valkondisi_sekolahag' => 'required',
            'valjumlahguru_sekolahag' => 'required',
            'valjumlahmurid_sekolahag' => 'required',
            'valjumlahpegawai_sekolahag' => 'required',
            'valnama_butaaksara' => 'required',
            'valpemilik_butaaksara' => 'required',
            'valkondisi_butaaksara' => 'required',
            'valjumlahguru_butaaksara' => 'required',
            'valjumlahmurid_butaaksara' => 'required',
            'valjumlahpegawai_butaaksara' => 'required',
            'valnama_paketa' => 'required',
            'valpemilik_paketa' => 'required',
            'valkondisi_paketa' => 'required',
            'valjumlahguru_paketa' => 'required',
            'valjumlahmurid_paketa' => 'required',
            'valjumlahpegawai_paketa' => 'required',
            'valnama_paketb' => 'required',
            'valpemilik_paketb' => 'required',
            'valkondisi_paketb' => 'required',
            'valjumlahguru_paketb' => 'required',
            'valjumlahmurid_paketb' => 'required',
            'valjumlahpegawai_paketb' => 'required',
            'valnama_paketc' => 'required',
            'valpemilik_paketc' => 'required',
            'valkondisi_paketc' => 'required',
            'valjumlahguru_paketc' => 'required',
            'valjumlahmurid_paketc' => 'required',
            'valjumlahpegawai_paketc' => 'required',
            'valnama_playgrup' => 'required',
            'valpemilik_playgrup' => 'required',
            'valkondisi_playgrup' => 'required',
            'valjumlahguru_playgrup' => 'required',
            'valjumlahmurid_playgrup' => 'required',
            'valjumlahpegawai_playgrup' => 'required',
            'valnama_penitipananak' => 'required',
            'valpemilik_penitipananak' => 'required',
            'valkondisi_penitipananak' => 'required',
            'valjumlahguru_penitipananak' => 'required',
            'valjumlahmurid_penitipananak' => 'required',
            'valjumlahpegawai_penitipananak' => 'required',
            'valnama_pendidikanq' => 'required',
            'valpemilik_pendidikanq' => 'required',
            'valkondisi_pendidikanq' => 'required',
            'valjumlahguru_pendidikanq' => 'required',
            'valjumlahmurid_pendidikanq' => 'required',
            'valjumlahpegawai_pendidikanq' => 'required',
            'valnama_bahasaas' => 'required',
            'valpemilik_bahasaas' => 'required',
            'valkondisi_bahasaas' => 'required',
            'valjumlahguru_bahasaas' => 'required',
            'valjumlahmurid_bahasaas' => 'required',
            'valjumlahpegawai_bahasaas' => 'required',
            'valnama_kursuskomp' => 'required',
            'valpemilik_kursuskomp' => 'required',
            'valkondisi_kursuskomp' => 'required',
            'valjumlahguru_kursuskomp' => 'required',
            'valjumlahmurid_kursuskomp' => 'required',
            'valjumlahpegawai_kursuskomp' => 'required',
            'valnama_kursusmenjahit' => 'required',
            'valpemilik_kursusmenjahit' => 'required',
            'valkondisi_kursusmenjahit' => 'required',
            'valjumlahguru_kursusmenjahit' => 'required',
            'valjumlahmurid_kursusmenjahit' => 'required',
            'valjumlahpegawai_kursusmenjahit' => 'required',
            'valnama_kursuskecantikan' => 'required',
            'valpemilik_kursuskecantikan' => 'required',
            'valkondisi_kursuskecantikan' => 'required',
            'valjumlahguru_kursuskecantikan' => 'required',
            'valjumlahmurid_kursuskecantikan' => 'required',
            'valjumlahpegawai_kursuskecantikan' => 'required',
            'valnama_kursusmontir' => 'required',
            'valpemilik_kursusmontir' => 'required',
            'valkondisi_kursusmontir' => 'required',
            'valjumlahguru_kursusmontir' => 'required',
            'valjumlahmurid_kursusmontir' => 'required',
            'valjumlahpegawai_kursusmontir' => 'required',
            'valnama_kursussetir' => 'required',
            'valpemilik_kursussetir' => 'required',
            'valkondisi_kursussetir' => 'required',
            'valjumlahguru_kursussetir' => 'required',
            'valjumlahmurid_kursussetir' => 'required',
            'valjumlahpegawai_kursussetir' => 'required',
            'valnama_kursuselektronik' => 'required',
            'valpemilik_kursuselektronik' => 'required',
            'valkondisi_kursuselektronik' => 'required',
            'valjumlahguru_kursuselektronik' => 'required',
            'valjumlahmurid_kursuselektronik' => 'required',
            'valjumlahpegawai_kursuselektronik' => 'required',
            'valnama_tataboga' => 'required',
            'valpemilik_tataboga' => 'required',
            'valkondisi_tataboga' => 'required',
            'valjumlahguru_tataboga' => 'required',
            'valjumlahmurid_tataboga' => 'required',
            'valjumlahpegawai_tataboga' => 'required',
            'valnama_kursusketik' => 'required',
            'valpemilik_kursusketik' => 'required',
            'valkondisi_kursusketik' => 'required',
            'valjumlahguru_kursusketik' => 'required',
            'valjumlahmurid_kursusketik' => 'required',
            'valjumlahpegawai_kursusketik' => 'required',
            'valnama_kursusakuntan' => 'required',
            'valpemilik_kursusakuntan' => 'required',
            'valkondisi_kursusakuntan' => 'required',
            'valjumlahguru_kursusakuntan' => 'required',
            'valjumlahmurid_kursusakuntan' => 'required',
            'valjumlahpegawai_kursusakuntan' => 'required',
            'valnama_kursuslain' => 'required',
            'valpemilik_kursuslain' => 'required',
            'valkondisi_kursuslain' => 'required',
            'valjumlahguru_kursuslain' => 'required',
            'valjumlahmurid_kursuslain' => 'required',
            'valjumlahpegawai_kursuslain' => 'required',


             
           
           
        ];
    }

    public function messages(): array
    {
        return [

           
            'valnama_paud.required' => ':Attribute tidak boleh kosong',
            'valpemilik_paud.required' => ':Attribute tidak boleh kosong',
            'valkondisi_paud.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_paud.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_paud.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_paud.required' => ':Attribute tidak boleh kosong',
            'valnama_tk.required' => ':Attribute tidak boleh kosong',
            'valpemilik_tk.required' => ':Attribute tidak boleh kosong',
            'valkondisi_tk.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_tk.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_tk.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_tk.required' => ':Attribute tidak boleh kosong',
            'valnama_sd.required' => ':Attribute tidak boleh kosong',
            'valpemilik_sd.required' => ':Attribute tidak boleh kosong',
            'valkondisi_sd.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_sd.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_sd.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_sd.required' => ':Attribute tidak boleh kosong',
            'valnama_smp.required' => ':Attribute tidak boleh kosong',
            'valpemilik_smp.required' => ':Attribute tidak boleh kosong',
            'valkondisi_smp.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_smp.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_smp.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_smp.required' => ':Attribute tidak boleh kosong',
            'valnama_smplb.required' => ':Attribute tidak boleh kosong',
            'valpemilik_smplb.required' => ':Attribute tidak boleh kosong',
            'valkondisi_smplb.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_smplb.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_smplb.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_smplb.required' => ':Attribute tidak boleh kosong',
            'valnama_sma.required' => ':Attribute tidak boleh kosong',
            'valpemilik_sma.required' => ':Attribute tidak boleh kosong',
            'valkondisi_sma.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_sma.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_sma.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_sma.required' => ':Attribute tidak boleh kosong',
            'valnama_smk.required' => ':Attribute tidak boleh kosong',
            'valpemilik_smk.required' => ':Attribute tidak boleh kosong',
            'valkondisi_smk.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_smk.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_smk.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_smk.required' => ':Attribute tidak boleh kosong',
            'valnama_smalb.required' => ':Attribute tidak boleh kosong',
            'valpemilik_smalb.required' => ':Attribute tidak boleh kosong',
            'valkondisi_smalb.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_smalb.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_smalb.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_smalb.required' => ':Attribute tidak boleh kosong',
            'valnama_akademi.required' => ':Attribute tidak boleh kosong',
            'valpemilik_akademi.required' => ':Attribute tidak boleh kosong',
            'valkondisi_akademi.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_akademi.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_akademi.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_akademi.required' => ':Attribute tidak boleh kosong',
            'valnama_pesantren.required' => ':Attribute tidak boleh kosong',
            'valpemilik_pesantren.required' => ':Attribute tidak boleh kosong',
            'valkondisi_pesantren.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_pesantren.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_pesantren.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_pesantren.required' => ':Attribute tidak boleh kosong',
            'valnama_madrasahdn.required' => ':Attribute tidak boleh kosong',
            'valpemilik_madrasahdn.required' => ':Attribute tidak boleh kosong',
            'valkondisi_madrasahdn.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_madrasahdn.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_madrasahdn.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_madrasahdn.required' => ':Attribute tidak boleh kosong',
            'valnama_seminari.required' => ':Attribute tidak boleh kosong',
            'valpemilik_seminari.required' => ':Attribute tidak boleh kosong',
            'valkondisi_seminari.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_seminari.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_seminari.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_seminari.required' => ':Attribute tidak boleh kosong',
            'valnama_sekolahag.required' => ':Attribute tidak boleh kosong',
            'valpemilik_sekolahag.required' => ':Attribute tidak boleh kosong',
            'valkondisi_sekolahag.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_sekolahag.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_sekolahag.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_sekolahag.required' => ':Attribute tidak boleh kosong',
            'valnama_butaaksara.required' => ':Attribute tidak boleh kosong',
            'valpemilik_butaaksara.required' => ':Attribute tidak boleh kosong',
            'valkondisi_butaaksara.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_butaaksara.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_butaaksara.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_butaaksara.required' => ':Attribute tidak boleh kosong',
            'valnama_paketa.required' => ':Attribute tidak boleh kosong',
            'valpemilik_paketa.required' => ':Attribute tidak boleh kosong',
            'valkondisi_paketa.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_paketa.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_paketa.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_paketa.required' => ':Attribute tidak boleh kosong',
            'valnama_paketb.required' => ':Attribute tidak boleh kosong',
            'valpemilik_paketb.required' => ':Attribute tidak boleh kosong',
            'valkondisi_paketb.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_paketb.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_paketb.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_paketb.required' => ':Attribute tidak boleh kosong',
            'valnama_paketc.required' => ':Attribute tidak boleh kosong',
            'valpemilik_paketc.required' => ':Attribute tidak boleh kosong',
            'valkondisi_paketc.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_paketc.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_paketc.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_paketc.required' => ':Attribute tidak boleh kosong',
            'valnama_playgrup.required' => ':Attribute tidak boleh kosong',
            'valpemilik_playgrup.required' => ':Attribute tidak boleh kosong',
            'valkondisi_playgrup.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_playgrup.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_playgrup.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_playgrup.required' => ':Attribute tidak boleh kosong',
            'valnama_penitipananak.required' => ':Attribute tidak boleh kosong',
            'valpemilik_penitipananak.required' => ':Attribute tidak boleh kosong',
            'valkondisi_penitipananak.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_penitipananak.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_penitipananak.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_penitipananak.required' => ':Attribute tidak boleh kosong',
            'valnama_pendidikanq.required' => ':Attribute tidak boleh kosong',
            'valpemilik_pendidikanq.required' => ':Attribute tidak boleh kosong',
            'valkondisi_pendidikanq.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_pendidikanq.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_pendidikanq.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_pendidikanq.required' => ':Attribute tidak boleh kosong',
            'valnama_bahasaas.required' => ':Attribute tidak boleh kosong',
            'valpemilik_bahasaas.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bahasaas.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_bahasaas.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_bahasaas.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_bahasaas.required' => ':Attribute tidak boleh kosong',
            'valnama_kursuskomp.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursuskomp.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursuskomp.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursuskomp.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursuskomp.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursuskomp.required' => ':Attribute tidak boleh kosong',
            'valnama_kursusmenjahit.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursusmenjahit.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursusmenjahit.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursusmenjahit.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursusmenjahit.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursusmenjahit.required' => ':Attribute tidak boleh kosong',
            'valnama_kursuskecantikan.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursuskecantikan.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursuskecantikan.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursuskecantikan.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursuskecantikan.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursuskecantikan.required' => ':Attribute tidak boleh kosong',
            'valnama_kursusmontir.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursusmontir.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursusmontir.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursusmontir.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursusmontir.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursusmontir.required' => ':Attribute tidak boleh kosong',
            'valnama_kursussetir.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursussetir.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursussetir.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursussetir.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursussetir.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursussetir.required' => ':Attribute tidak boleh kosong',
            'valnama_kursuselektronik.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursuselektronik.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursuselektronik.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursuselektronik.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursuselektronik.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursuselektronik.required' => ':Attribute tidak boleh kosong',
            'valnama_tataboga.required' => ':Attribute tidak boleh kosong',
            'valpemilik_tataboga.required' => ':Attribute tidak boleh kosong',
            'valkondisi_tataboga.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_tataboga.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_tataboga.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_tataboga.required' => ':Attribute tidak boleh kosong',
            'valnama_kursusketik.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursusketik.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursusketik.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursusketik.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursusketik.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursusketik.required' => ':Attribute tidak boleh kosong',
            'valnama_kursusakuntan.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursusakuntan.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursusakuntan.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursusakuntan.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursusakuntan.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursusakuntan.required' => ':Attribute tidak boleh kosong',
            'valnama_kursuslain.required' => ':Attribute tidak boleh kosong',
            'valpemilik_kursuslain.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kursuslain.required' => ':Attribute tidak boleh kosong',
            'valjumlahguru_kursuslain.required' => ':Attribute tidak boleh kosong',
            'valjumlahmurid_kursuslain.required' => ':Attribute tidak boleh kosong',
            'valjumlahpegawai_kursuslain.required' => ':Attribute tidak boleh kosong',



        ];
    }

    public function attributes(): array
    {
        return [
            'valnama_paud' => 'nama_paud',
            'valpemilik_paud' => 'pemilik_paud',
            'valkondisi_paud' => 'kondisi_paud',
            'valjumlahguru_paud' => 'jumlahguru_paud',
            'valjumlahmurid_paud' => 'jumlahmurid_paud',
            'valjumlahpegawai_paud' => 'jumlahpegawai_paud',
            'valnama_tk' => 'nama_tk',
            'valpemilik_tk' => 'pemilik_tk',
            'valkondisi_tk' => 'kondisi_tk',
            'valjumlahguru_tk' => 'jumlahguru_tk',
            'valjumlahmurid_tk' => 'jumlahmurid_tk',
            'valjumlahpegawai_tk' => 'jumlahpegawai_tk',
            'valnama_sd' => 'nama_sd',
            'valpemilik_sd' => 'pemilik_sd',
            'valkondisi_sd' => 'kondisi_sd',
            'valjumlahguru_sd' => 'jumlahguru_sd',
            'valjumlahmurid_sd' => 'jumlahmurid_sd',
            'valjumlahpegawai_sd' => 'jumlahpegawai_sd',
            'valnama_smp' => 'nama_smp',
            'valpemilik_smp' => 'pemilik_smp',
            'valkondisi_smp' => 'kondisi_smp',
            'valjumlahguru_smp' => 'jumlahguru_smp',
            'valjumlahmurid_smp' => 'jumlahmurid_smp',
            'valjumlahpegawai_smp' => 'jumlahpegawai_smp',
            'valnama_smplb' => 'nama_smplb',
            'valpemilik_smplb' => 'pemilik_smplb',
            'valkondisi_smplb' => 'kondisi_smplb',
            'valjumlahguru_smplb' => 'jumlahguru_smplb',
            'valjumlahmurid_smplb' => 'jumlahmurid_smplb',
            'valjumlahpegawai_smplb' => 'jumlahpegawai_smplb',
            'valnama_sma' => 'nama_sma',
            'valpemilik_sma' => 'pemilik_sma',
            'valkondisi_sma' => 'kondisi_sma',
            'valjumlahguru_sma' => 'jumlahguru_sma',
            'valjumlahmurid_sma' => 'jumlahmurid_sma',
            'valjumlahpegawai_sma' => 'jumlahpegawai_sma',
            'valnama_smk' => 'nama_smk',
            'valpemilik_smk' => 'pemilik_smk',
            'valkondisi_smk' => 'kondisi_smk',
            'valjumlahguru_smk' => 'jumlahguru_smk',
            'valjumlahmurid_smk' => 'jumlahmurid_smk',
            'valjumlahpegawai_smk' => 'jumlahpegawai_smk',
            'valnama_smalb' => 'nama_smalb',
            'valpemilik_smalb' => 'pemilik_smalb',
            'valkondisi_smalb' => 'kondisi_smalb',
            'valjumlahguru_smalb' => 'jumlahguru_smalb',
            'valjumlahmurid_smalb' => 'jumlahmurid_smalb',
            'valjumlahpegawai_smalb' => 'jumlahpegawai_smalb',
            'valnama_akademi' => 'nama_akademi',
            'valpemilik_akademi' => 'pemilik_akademi',
            'valkondisi_akademi' => 'kondisi_akademi',
            'valjumlahguru_akademi' => 'jumlahguru_akademi',
            'valjumlahmurid_akademi' => 'jumlahmurid_akademi',
            'valjumlahpegawai_akademi' => 'jumlahpegawai_akademi',
            'valnama_pesantren' => 'nama_pesantren',
            'valpemilik_pesantren' => 'pemilik_pesantren',
            'valkondisi_pesantren' => 'kondisi_pesantren',
            'valjumlahguru_pesantren' => 'jumlahguru_pesantren',
            'valjumlahmurid_pesantren' => 'jumlahmurid_pesantren',
            'valjumlahpegawai_pesantren' => 'jumlahpegawai_pesantren',
            'valnama_madrasahdn' => 'nama_madrasahdn',
            'valpemilik_madrasahdn' => 'pemilik_madrasahdn',
            'valkondisi_madrasahdn' => 'kondisi_madrasahdn',
            'valjumlahguru_madrasahdn' => 'jumlahguru_madrasahdn',
            'valjumlahmurid_madrasahdn' => 'jumlahmurid_madrasahdn',
            'valjumlahpegawai_madrasahdn' => 'jumlahpegawai_madrasahdn',
            'valnama_seminari' => 'nama_seminari',
            'valpemilik_seminari' => 'pemilik_seminari',
            'valkondisi_seminari' => 'kondisi_seminari',
            'valjumlahguru_seminari' => 'jumlahguru_seminari',
            'valjumlahmurid_seminari' => 'jumlahmurid_seminari',
            'valjumlahpegawai_seminari' => 'jumlahpegawai_seminari',
            'valnama_sekolahag' => 'nama_sekolahag',
            'valpemilik_sekolahag' => 'pemilik_sekolahag',
            'valkondisi_sekolahag' => 'kondisi_sekolahag',
            'valjumlahguru_sekolahag' => 'jumlahguru_sekolahag',
            'valjumlahmurid_sekolahag' => 'jumlahmurid_sekolahag',
            'valjumlahpegawai_sekolahag' => 'jumlahpegawai_sekolahag',
            'valnama_butaaksara' => 'nama_butaaksara',
            'valpemilik_butaaksara' => 'pemilik_butaaksara',
            'valkondisi_butaaksara' => 'kondisi_butaaksara',
            'valjumlahguru_butaaksara' => 'jumlahguru_butaaksara',
            'valjumlahmurid_butaaksara' => 'jumlahmurid_butaaksara',
            'valjumlahpegawai_butaaksara' => 'jumlahpegawai_butaaksara',
            'valnama_paketa' => 'nama_paketa',
            'valpemilik_paketa' => 'pemilik_paketa',
            'valkondisi_paketa' => 'kondisi_paketa',
            'valjumlahguru_paketa' => 'jumlahguru_paketa',
            'valjumlahmurid_paketa' => 'jumlahmurid_paketa',
            'valjumlahpegawai_paketa' => 'jumlahpegawai_paketa',
            'valnama_paketb' => 'nama_paketb',
            'valpemilik_paketb' => 'pemilik_paketb',
            'valkondisi_paketb' => 'kondisi_paketb',
            'valjumlahguru_paketb' => 'jumlahguru_paketb',
            'valjumlahmurid_paketb' => 'jumlahmurid_paketb',
            'valjumlahpegawai_paketb' => 'jumlahpegawai_paketb',
            'valnama_paketc' => 'nama_paketc',
            'valpemilik_paketc' => 'pemilik_paketc',
            'valkondisi_paketc' => 'kondisi_paketc',
            'valjumlahguru_paketc' => 'jumlahguru_paketc',
            'valjumlahmurid_paketc' => 'jumlahmurid_paketc',
            'valjumlahpegawai_paketc' => 'jumlahpegawai_paketc',
            'valnama_playgrup' => 'nama_playgrup',
            'valpemilik_playgrup' => 'pemilik_playgrup',
            'valkondisi_playgrup' => 'kondisi_playgrup',
            'valjumlahguru_playgrup' => 'jumlahguru_playgrup',
            'valjumlahmurid_playgrup' => 'jumlahmurid_playgrup',
            'valjumlahpegawai_playgrup' => 'jumlahpegawai_playgrup',
            'valnama_penitipananak' => 'nama_penitipananak',
            'valpemilik_penitipananak' => 'pemilik_penitipananak',
            'valkondisi_penitipananak' => 'kondisi_penitipananak',
            'valjumlahguru_penitipananak' => 'jumlahguru_penitipananak',
            'valjumlahmurid_penitipananak' => 'jumlahmurid_penitipananak',
            'valjumlahpegawai_penitipananak' => 'jumlahpegawai_penitipananak',
            'valnama_pendidikanq' => 'nama_pendidikanq',
            'valpemilik_pendidikanq' => 'pemilik_pendidikanq',
            'valkondisi_pendidikanq' => 'kondisi_pendidikanq',
            'valjumlahguru_pendidikanq' => 'jumlahguru_pendidikanq',
            'valjumlahmurid_pendidikanq' => 'jumlahmurid_pendidikanq',
            'valjumlahpegawai_pendidikanq' => 'jumlahpegawai_pendidikanq',
            'valnama_bahasaas' => 'nama_bahasaas',
            'valpemilik_bahasaas' => 'pemilik_bahasaas',
            'valkondisi_bahasaas' => 'kondisi_bahasaas',
            'valjumlahguru_bahasaas' => 'jumlahguru_bahasaas',
            'valjumlahmurid_bahasaas' => 'jumlahmurid_bahasaas',
            'valjumlahpegawai_bahasaas' => 'jumlahpegawai_bahasaas',
            'valnama_kursuskomp' => 'nama_kursuskomp',
            'valpemilik_kursuskomp' => 'pemilik_kursuskomp',
            'valkondisi_kursuskomp' => 'kondisi_kursuskomp',
            'valjumlahguru_kursuskomp' => 'jumlahguru_kursuskomp',
            'valjumlahmurid_kursuskomp' => 'jumlahmurid_kursuskomp',
            'valjumlahpegawai_kursuskomp' => 'jumlahpegawai_kursuskomp',
            'valnama_kursusmenjahit' => 'nama_kursusmenjahit',
            'valpemilik_kursusmenjahit' => 'pemilik_kursusmenjahit',
            'valkondisi_kursusmenjahit' => 'kondisi_kursusmenjahit',
            'valjumlahguru_kursusmenjahit' => 'jumlahguru_kursusmenjahit',
            'valjumlahmurid_kursusmenjahit' => 'jumlahmurid_kursusmenjahit',
            'valjumlahpegawai_kursusmenjahit' => 'jumlahpegawai_kursusmenjahit',
            'valnama_kursuskecantikan' => 'nama_kursuskecantikan',
            'valpemilik_kursuskecantikan' => 'pemilik_kursuskecantikan',
            'valkondisi_kursuskecantikan' => 'kondisi_kursuskecantikan',
            'valjumlahguru_kursuskecantikan' => 'jumlahguru_kursuskecantikan',
            'valjumlahmurid_kursuskecantikan' => 'jumlahmurid_kursuskecantikan',
            'valjumlahpegawai_kursuskecantikan' => 'jumlahpegawai_kursuskecantikan',
            'valnama_kursusmontir' => 'nama_kursusmontir',
            'valpemilik_kursusmontir' => 'pemilik_kursusmontir',
            'valkondisi_kursusmontir' => 'kondisi_kursusmontir',
            'valjumlahguru_kursusmontir' => 'jumlahguru_kursusmontir',
            'valjumlahmurid_kursusmontir' => 'jumlahmurid_kursusmontir',
            'valjumlahpegawai_kursusmontir' => 'jumlahpegawai_kursusmontir',
            'valnama_kursussetir' => 'nama_kursussetir',
            'valpemilik_kursussetir' => 'pemilik_kursussetir',
            'valkondisi_kursussetir' => 'kondisi_kursussetir',
            'valjumlahguru_kursussetir' => 'jumlahguru_kursussetir',
            'valjumlahmurid_kursussetir' => 'jumlahmurid_kursussetir',
            'valjumlahpegawai_kursussetir' => 'jumlahpegawai_kursussetir',
            'valnama_kursuselektronik' => 'nama_kursuselektronik',
            'valpemilik_kursuselektronik' => 'pemilik_kursuselektronik',
            'valkondisi_kursuselektronik' => 'kondisi_kursuselektronik',
            'valjumlahguru_kursuselektronik' => 'jumlahguru_kursuselektronik',
            'valjumlahmurid_kursuselektronik' => 'jumlahmurid_kursuselektronik',
            'valjumlahpegawai_kursuselektronik' => 'jumlahpegawai_kursuselektronik',
            'valnama_tataboga' => 'nama_tataboga',
            'valpemilik_tataboga' => 'pemilik_tataboga',
            'valkondisi_tataboga' => 'kondisi_tataboga',
            'valjumlahguru_tataboga' => 'jumlahguru_tataboga',
            'valjumlahmurid_tataboga' => 'jumlahmurid_tataboga',
            'valjumlahpegawai_tataboga' => 'jumlahpegawai_tataboga',
            'valnama_kursusketik' => 'nama_kursusketik',
            'valpemilik_kursusketik' => 'pemilik_kursusketik',
            'valkondisi_kursusketik' => 'kondisi_kursusketik',
            'valjumlahguru_kursusketik' => 'jumlahguru_kursusketik',
            'valjumlahmurid_kursusketik' => 'jumlahmurid_kursusketik',
            'valjumlahpegawai_kursusketik' => 'jumlahpegawai_kursusketik',
            'valnama_kursusakuntan' => 'nama_kursusakuntan',
            'valpemilik_kursusakuntan' => 'pemilik_kursusakuntan',
            'valkondisi_kursusakuntan' => 'kondisi_kursusakuntan',
            'valjumlahguru_kursusakuntan' => 'jumlahguru_kursusakuntan',
            'valjumlahmurid_kursusakuntan' => 'jumlahmurid_kursusakuntan',
            'valjumlahpegawai_kursusakuntan' => 'jumlahpegawai_kursusakuntan',
            'valnama_kursuslain' => 'nama_kursuslain',
            'valpemilik_kursuslain' => 'pemilik_kursuslain',
            'valkondisi_kursuslain' => 'kondisi_kursuslain',
            'valjumlahguru_kursuslain' => 'jumlahguru_kursuslain',
            'valjumlahmurid_kursuslain' => 'jumlahmurid_kursuslain',
            'valjumlahpegawai_kursuslain' => 'jumlahpegawai_kursuslain',
             
           

        ];
    }
}

