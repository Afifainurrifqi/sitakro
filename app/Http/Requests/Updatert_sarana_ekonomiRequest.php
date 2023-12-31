<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatert_sarana_ekonomiRequest extends FormRequest
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

            'valjumlah_toko' => 'required',
            'valkondisi_toko' => 'required',
            'valJarak_toko' => 'required',
            'valkemudahan_toko' => 'required',
            'valjumlah_pasar_permanen' => 'required',
            'valkondisi_pasar_permanen' => 'required',
            'valJarak_pasar_permanen' => 'required',
            'valkemudahan_pasar_permanen' => 'required',
            'valjumlah_semip' => 'required',
            'valkondisi_semip' => 'required',
            'valJarak_semip' => 'required',
            'valkemudahan_semip' => 'required',
            'valjumlah_tanpap' => 'required',
            'valkondisi_tanpap' => 'required',
            'valJarak_tanpap' => 'required',
            'valkemudahan_tanpap' => 'required',
            'valjumlah_minimarket' => 'required',
            'valkondisi_minimarket' => 'required',
            'valJarak_minimarket' => 'required',
            'valkemudahan_minimarket' => 'required',
            'valjumlah_warungk' => 'required',
            'valkondisi_warungk' => 'required',
            'valJarak_warungk' => 'required',
            'valkemudahan_warungk' => 'required',
            'valjumlah_warungp' => 'required',
            'valkondisi_warungp' => 'required',
            'valJarak_warungp' => 'required',
            'valkemudahan_warungp' => 'required',
            'valjumlah_restoran' => 'required',
            'valkondisi_restoran' => 'required',
            'valJarak_restoran' => 'required',
            'valkemudahan_restoran' => 'required',
            'valjumlah_kedaim' => 'required',
            'valkondisi_kedaim' => 'required',
            'valJarak_kedaim' => 'required',
            'valkemudahan_kedaim' => 'required',
            'valjumlah_hotel' => 'required',
            'valkondisi_hotel' => 'required',
            'valJarak_hotel' => 'required',
            'valkemudahan_hotel' => 'required',
            'valjumlah_hostel' => 'required',
            'valkondisi_hostel' => 'required',
            'valJarak_hostel' => 'required',
            'valkemudahan_hostel' => 'required',
            'valjumlah_bengkelm' => 'required',
            'valkondisi_bengkelm' => 'required',
            'valJarak_bengkelm' => 'required',
            'valkemudahan_bengkelm' => 'required',
            'valjumlah_salonk' => 'required',
            'valkondisi_salonk' => 'required',
            'valJarak_salonk' => 'required',
            'valkemudahan_salonk' => 'required',
            'valjumlah_agent' => 'required',
            'valkondisi_agent' => 'required',
            'valJarak_agent' => 'required',
            'valkemudahan_agent' => 'required',
            'valjumlah_bankbri' => 'required',
            'valkondisi_bankbri' => 'required',
            'valJarak_bankbri' => 'required',
            'valkemudahan_bankbri' => 'required',
            'valjumlah_briag' => 'required',
            'valkondisi_briag' => 'required',
            'valJarak_briag' => 'required',
            'valkemudahan_briag' => 'required',
            'valjumlah_bankbni' => 'required',
            'valkondisi_bankbni' => 'required',
            'valJarak_bankbni' => 'required',
            'valkemudahan_bankbni' => 'required',
            'valjumlah_bniag' => 'required',
            'valkondisi_bniag' => 'required',
            'valJarak_bniag' => 'required',
            'valkemudahan_bniag' => 'required',
            'valjumlah_bankmandiri' => 'required',
            'valkondisi_bankmandiri' => 'required',
            'valJarak_bankmandiri' => 'required',
            'valkemudahan_bankmandiri' => 'required',
            'valjumlah_mandiriag' => 'required',
            'valkondisi_mandiriag' => 'required',
            'valJarak_mandiriag' => 'required',
            'valkemudahan_mandiriag' => 'required',
            'valjumlah_bankbpd' => 'required',
            'valkondisi_bankbpd' => 'required',
            'valJarak_bankbpd' => 'required',
            'valkemudahan_bankbpd' => 'required',
            'valjumlah_bpdag' => 'required',
            'valkondisi_bpdag' => 'required',
            'valJarak_bpdag' => 'required',
            'valkemudahan_bpdag' => 'required',
            'valjumlah_bankumum' => 'required',
            'valkondisi_bankumum' => 'required',
            'valJarak_bankumum' => 'required',
            'valkemudahan_bankumum' => 'required',

            'valjumlah_bankbca' => 'required',
            'valkondisi_bankbca' => 'required',
            'valJarak_bankbca' => 'required',
            'valkemudahan_bankbca' => 'required',
            'valjumlah_bankcimb' => 'required',
            'valkondisi_bankcimb' => 'required',
            'valJarak_bankcimb' => 'required',
            'valkemudahan_bankcimb' => 'required',
            'valjumlah_banksinarm' => 'required',
            'valkondisi_banksinarm' => 'required',
            'valJarak_banksinarm' => 'required',
            'valkemudahan_banksinarm' => 'required',
            'valjumlah_bankpermata' => 'required',
            'valkondisi_bankpermata' => 'required',
            'valJarak_bankpermata' => 'required',
            'valkemudahan_bankpermata' => 'required',
            'valjumlah_bankswastalain' => 'required',
            'valkondisi_bankswastalain' => 'required',
            'valJarak_bankswastalain' => 'required',
            'valkemudahan_bankswastalain' => 'required',
            'valjumlah_bankbpr' => 'required',
            'valkondisi_bankbpr' => 'required',
            'valJarak_bankbpr' => 'required',
            'valkemudahan_bankbpr' => 'required',
            'valjumlah_bmt' => 'required',
            'valkondisi_bmt' => 'required',
            'valJarak_bmt' => 'required',
            'valkemudahan_bmt' => 'required',
            'valjumlah_pegadaian' => 'required',
            'valkondisi_pegadaian' => 'required',
            'valJarak_pegadaian' => 'required',
            'valkemudahan_pegadaian' => 'required',
            'valjumlah_atm' => 'required',
            'valkondisi_atm' => 'required',
            'valJarak_atm' => 'required',
            'valkemudahan_atm' => 'required',
            'valjumlah_saranalain' => 'required',
            'valkondisi_saranalain' => 'required',
            'valJarak_saranalain' => 'required',
            'valkemudahan_saranalain' => 'required',




        ];
    }

    public function messages(): array
    {
        return [

            'valjumlah_toko.required' => ':Attribute tidak boleh kosong',
            'valkondisi_toko.required' => ':Attribute tidak boleh kosong',
            'valJarak_toko.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_toko.required' => ':Attribute tidak boleh kosong',
            'valjumlah_pasar_permanen.required' => ':Attribute tidak boleh kosong',
            'valkondisi_pasar_permanen.required' => ':Attribute tidak boleh kosong',
            'valJarak_pasar_permanen.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_pasar_permanen.required' => ':Attribute tidak boleh kosong',
            'valjumlah_semip.required' => ':Attribute tidak boleh kosong',
            'valkondisi_semip.required' => ':Attribute tidak boleh kosong',
            'valJarak_semip.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_semip.required' => ':Attribute tidak boleh kosong',
            'valjumlah_tanpap.required' => ':Attribute tidak boleh kosong',
            'valkondisi_tanpap.required' => ':Attribute tidak boleh kosong',
            'valJarak_tanpap.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_tanpap.required' => ':Attribute tidak boleh kosong',
            'valjumlah_minimarket.required' => ':Attribute tidak boleh kosong',
            'valkondisi_minimarket.required' => ':Attribute tidak boleh kosong',
            'valJarak_minimarket.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_minimarket.required' => ':Attribute tidak boleh kosong',
            'valjumlah_warungk.required' => ':Attribute tidak boleh kosong',
            'valkondisi_warungk.required' => ':Attribute tidak boleh kosong',
            'valJarak_warungk.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_warungk.required' => ':Attribute tidak boleh kosong',
            'valjumlah_warungp.required' => ':Attribute tidak boleh kosong',
            'valkondisi_warungp.required' => ':Attribute tidak boleh kosong',
            'valJarak_warungp.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_warungp.required' => ':Attribute tidak boleh kosong',
            'valjumlah_restoran.required' => ':Attribute tidak boleh kosong',
            'valkondisi_restoran.required' => ':Attribute tidak boleh kosong',
            'valJarak_restoran.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_restoran.required' => ':Attribute tidak boleh kosong',
            'valjumlah_kedaim.required' => ':Attribute tidak boleh kosong',
            'valkondisi_kedaim.required' => ':Attribute tidak boleh kosong',
            'valJarak_kedaim.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_kedaim.required' => ':Attribute tidak boleh kosong',
            'valjumlah_hotel.required' => ':Attribute tidak boleh kosong',
            'valkondisi_hotel.required' => ':Attribute tidak boleh kosong',
            'valJarak_hotel.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_hotel.required' => ':Attribute tidak boleh kosong',
            'valjumlah_hostel.required' => ':Attribute tidak boleh kosong',
            'valkondisi_hostel.required' => ':Attribute tidak boleh kosong',
            'valJarak_hostel.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_hostel.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bengkelm.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bengkelm.required' => ':Attribute tidak boleh kosong',
            'valJarak_bengkelm.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bengkelm.required' => ':Attribute tidak boleh kosong',
            'valjumlah_salonk.required' => ':Attribute tidak boleh kosong',
            'valkondisi_salonk.required' => ':Attribute tidak boleh kosong',
            'valJarak_salonk.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_salonk.required' => ':Attribute tidak boleh kosong',
            'valjumlah_agent.required' => ':Attribute tidak boleh kosong',
            'valkondisi_agent.required' => ':Attribute tidak boleh kosong',
            'valJarak_agent.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_agent.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankbri.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankbri.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankbri.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankbri.required' => ':Attribute tidak boleh kosong',
            'valjumlah_briag.required' => ':Attribute tidak boleh kosong',
            'valkondisi_briag.required' => ':Attribute tidak boleh kosong',
            'valJarak_briag.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_briag.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankbni.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankbni.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankbni.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankbni.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bniag.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bniag.required' => ':Attribute tidak boleh kosong',
            'valJarak_bniag.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bniag.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankmandiri.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankmandiri.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankmandiri.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankmandiri.required' => ':Attribute tidak boleh kosong',
            'valjumlah_mandiriag.required' => ':Attribute tidak boleh kosong',
            'valkondisi_mandiriag.required' => ':Attribute tidak boleh kosong',
            'valJarak_mandiriag.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_mandiriag.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankbpd.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankbpd.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankbpd.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankbpd.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bpdag.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bpdag.required' => ':Attribute tidak boleh kosong',
            'valJarak_bpdag.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bpdag.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankumum.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankumum.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankumum.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankumum.required' => ':Attribute tidak boleh kosong',
           
            'valjumlah_bankbca.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankbca.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankbca.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankbca.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankcimb.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankcimb.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankcimb.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankcimb.required' => ':Attribute tidak boleh kosong',
            'valjumlah_banksinarm.required' => ':Attribute tidak boleh kosong',
            'valkondisi_banksinarm.required' => ':Attribute tidak boleh kosong',
            'valJarak_banksinarm.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_banksinarm.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankpermata.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankpermata.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankpermata.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankpermata.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankswastalain.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankswastalain.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankswastalain.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankswastalain.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bankbpr.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bankbpr.required' => ':Attribute tidak boleh kosong',
            'valJarak_bankbpr.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bankbpr.required' => ':Attribute tidak boleh kosong',
            'valjumlah_bmt.required' => ':Attribute tidak boleh kosong',
            'valkondisi_bmt.required' => ':Attribute tidak boleh kosong',
            'valJarak_bmt.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_bmt.required' => ':Attribute tidak boleh kosong',
            'valjumlah_pegadaian.required' => ':Attribute tidak boleh kosong',
            'valkondisi_pegadaian.required' => ':Attribute tidak boleh kosong',
            'valJarak_pegadaian.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_pegadaian.required' => ':Attribute tidak boleh kosong',
            'valjumlah_atm.required' => ':Attribute tidak boleh kosong',
            'valkondisi_atm.required' => ':Attribute tidak boleh kosong',
            'valJarak_atm.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_atm.required' => ':Attribute tidak boleh kosong',
            'valjumlah_saranalain.required' => ':Attribute tidak boleh kosong',
            'valkondisi_saranalain.required' => ':Attribute tidak boleh kosong',
            'valJarak_saranalain.required' => ':Attribute tidak boleh kosong',
            'valkemudahan_saranalain.required' => ':Attribute tidak boleh kosong',




        ];
    }

    public function attributes(): array
    {
        return [

            'valjumlah_toko' => 'jumlah_toko',
            'valkondisi_toko' => 'kondisi_toko',
            'valJarak_toko' => 'Jarak_toko',
            'valkemudahan_toko' => 'kemudahan_toko',
            'valjumlah_pasar_permanen' => 'jumlah_pasar_permanen',
            'valkondisi_pasar_permanen' => 'kondisi_pasar_permanen',
            'valJarak_pasar_permanen' => 'Jarak_pasar_permanen',
            'valkemudahan_pasar_permanen' => 'kemudahan_pasar_permanen',
            'valjumlah_semip' => 'jumlah_semip',
            'valkondisi_semip' => 'kondisi_semip',
            'valJarak_semip' => 'Jarak_semip',
            'valkemudahan_semip' => 'kemudahan_semip',
            'valjumlah_tanpap' => 'jumlah_tanpap',
            'valkondisi_tanpap' => 'kondisi_tanpap',
            'valJarak_tanpap' => 'Jarak_tanpap',
            'valkemudahan_tanpap' => 'kemudahan_tanpap',
            'valjumlah_minimarket' => 'jumlah_minimarket',
            'valkondisi_minimarket' => 'kondisi_minimarket',
            'valJarak_minimarket' => 'Jarak_minimarket',
            'valkemudahan_minimarket' => 'kemudahan_minimarket',
            'valjumlah_warungk' => 'jumlah_warungk',
            'valkondisi_warungk' => 'kondisi_warungk',
            'valJarak_warungk' => 'Jarak_warungk',
            'valkemudahan_warungk' => 'kemudahan_warungk',
            'valjumlah_warungp' => 'jumlah_warungp',
            'valkondisi_warungp' => 'kondisi_warungp',
            'valJarak_warungp' => 'Jarak_warungp',
            'valkemudahan_warungp' => 'kemudahan_warungp',
            'valjumlah_restoran' => 'jumlah_restoran',
            'valkondisi_restoran' => 'kondisi_restoran',
            'valJarak_restoran' => 'Jarak_restoran',
            'valkemudahan_restoran' => 'kemudahan_restoran',
            'valjumlah_kedaim' => 'jumlah_kedaim',
            'valkondisi_kedaim' => 'kondisi_kedaim',
            'valJarak_kedaim' => 'Jarak_kedaim',
            'valkemudahan_kedaim' => 'kemudahan_kedaim',
            'valjumlah_hotel' => 'jumlah_hotel',
            'valkondisi_hotel' => 'kondisi_hotel',
            'valJarak_hotel' => 'Jarak_hotel',
            'valkemudahan_hotel' => 'kemudahan_hotel',
            'valjumlah_hostel' => 'jumlah_hostel',
            'valkondisi_hostel' => 'kondisi_hostel',
            'valJarak_hostel' => 'Jarak_hostel',
            'valkemudahan_hostel' => 'kemudahan_hostel',
            'valjumlah_bengkelm' => 'jumlah_bengkelm',
            'valkondisi_bengkelm' => 'kondisi_bengkelm',
            'valJarak_bengkelm' => 'Jarak_bengkelm',
            'valkemudahan_bengkelm' => 'kemudahan_bengkelm',
            'valjumlah_salonk' => 'jumlah_salonk',
            'valkondisi_salonk' => 'kondisi_salonk',
            'valJarak_salonk' => 'Jarak_salonk',
            'valkemudahan_salonk' => 'kemudahan_salonk',
            'valjumlah_agent' => 'jumlah_agent',
            'valkondisi_agent' => 'kondisi_agent',
            'valJarak_agent' => 'Jarak_agent',
            'valkemudahan_agent' => 'kemudahan_agent',
            'valjumlah_bankbri' => 'jumlah_bankbri',
            'valkondisi_bankbri' => 'kondisi_bankbri',
            'valJarak_bankbri' => 'Jarak_bankbri',
            'valkemudahan_bankbri' => 'kemudahan_bankbri',
            'valjumlah_briag' => 'jumlah_briag',
            'valkondisi_briag' => 'kondisi_briag',
            'valJarak_briag' => 'Jarak_briag',
            'valkemudahan_briag' => 'kemudahan_briag',
            'valjumlah_bankbni' => 'jumlah_bankbni',
            'valkondisi_bankbni' => 'kondisi_bankbni',
            'valJarak_bankbni' => 'Jarak_bankbni',
            'valkemudahan_bankbni' => 'kemudahan_bankbni',
            'valjumlah_bniag' => 'jumlah_bniag',
            'valkondisi_bniag' => 'kondisi_bniag',
            'valJarak_bniag' => 'Jarak_bniag',
            'valkemudahan_bniag' => 'kemudahan_bniag',
            'valjumlah_bankmandiri' => 'jumlah_bankmandiri',
            'valkondisi_bankmandiri' => 'kondisi_bankmandiri',
            'valJarak_bankmandiri' => 'Jarak_bankmandiri',
            'valkemudahan_bankmandiri' => 'kemudahan_bankmandiri',
            'valjumlah_mandiriag' => 'jumlah_mandiriag',
            'valkondisi_mandiriag' => 'kondisi_mandiriag',
            'valJarak_mandiriag' => 'Jarak_mandiriag',
            'valkemudahan_mandiriag' => 'kemudahan_mandiriag',
            'valjumlah_bankbpd' => 'jumlah_bankbpd',
            'valkondisi_bankbpd' => 'kondisi_bankbpd',
            'valJarak_bankbpd' => 'Jarak_bankbpd',
            'valkemudahan_bankbpd' => 'kemudahan_bankbpd',
            'valjumlah_bpdag' => 'jumlah_bpdag',
            'valkondisi_bpdag' => 'kondisi_bpdag',
            'valJarak_bpdag' => 'Jarak_bpdag',
            'valkemudahan_bpdag' => 'kemudahan_bpdag',
            'valjumlah_bankumum' => 'jumlah_bankumum',
            'valkondisi_bankumum' => 'kondisi_bankumum',
            'valJarak_bankumum' => 'Jarak_bankumum',
            'valkemudahan_bankumum' => 'kemudahan_bankumum',
          
            'valjumlah_bankbca' => 'jumlah_bankbca',
            'valkondisi_bankbca' => 'kondisi_bankbca',
            'valJarak_bankbca' => 'Jarak_bankbca',
            'valkemudahan_bankbca' => 'kemudahan_bankbca',
            'valjumlah_bankcimb' => 'jumlah_bankcimb',
            'valkondisi_bankcimb' => 'kondisi_bankcimb',
            'valJarak_bankcimb' => 'Jarak_bankcimb',
            'valkemudahan_bankcimb' => 'kemudahan_bankcimb',
            'valjumlah_banksinarm' => 'jumlah_banksinarm',
            'valkondisi_banksinarm' => 'kondisi_banksinarm',
            'valJarak_banksinarm' => 'Jarak_banksinarm',
            'valkemudahan_banksinarm' => 'kemudahan_banksinarm',
            'valjumlah_bankpermata' => 'jumlah_bankpermata',
            'valkondisi_bankpermata' => 'kondisi_bankpermata',
            'valJarak_bankpermata' => 'Jarak_bankpermata',
            'valkemudahan_bankpermata' => 'kemudahan_bankpermata',
            'valjumlah_bankswastalain' => 'jumlah_bankswastalain',
            'valkondisi_bankswastalain' => 'kondisi_bankswastalain',
            'valJarak_bankswastalain' => 'Jarak_bankswastalain',
            'valkemudahan_bankswastalain' => 'kemudahan_bankswastalain',
            'valjumlah_bankbpr' => 'jumlah_bankbpr',
            'valkondisi_bankbpr' => 'kondisi_bankbpr',
            'valJarak_bankbpr' => 'Jarak_bankbpr',
            'valkemudahan_bankbpr' => 'kemudahan_bankbpr',
            'valjumlah_bmt' => 'jumlah_bmt',
            'valkondisi_bmt' => 'kondisi_bmt',
            'valJarak_bmt' => 'Jarak_bmt',
            'valkemudahan_bmt' => 'kemudahan_bmt',
            'valjumlah_pegadaian' => 'jumlah_pegadaian',
            'valkondisi_pegadaian' => 'kondisi_pegadaian',
            'valJarak_pegadaian' => 'Jarak_pegadaian',
            'valkemudahan_pegadaian' => 'kemudahan_pegadaian',
            'valjumlah_atm' => 'jumlah_atm',
            'valkondisi_atm' => 'kondisi_atm',
            'valJarak_atm' => 'Jarak_atm',
            'valkemudahan_atm' => 'kemudahan_atm',
            'valjumlah_saranalain' => 'jumlah_saranalain',
            'valkondisi_saranalain' => 'kondisi_saranalain',
            'valJarak_saranalain' => 'Jarak_saranalain',
            'valkemudahan_saranalain' => 'kemudahan_saranalain',



        ];
    }
}

