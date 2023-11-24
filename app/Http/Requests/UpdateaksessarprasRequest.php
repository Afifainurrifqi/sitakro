<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateaksessarprasRequest extends FormRequest
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
            'valjenistrasport_lokasipu' => 'required',
            'valpengtransportumum_lokasipu' => 'required',
            'valwaktutempuh_lokasipu' => 'required',
            'valbiaya_lokasipu' => 'required',
            'valkemudahan_lokasipu' => 'required',
            'valjenistrasport_lahanpertanian' => 'required',
            'valpengtransportumum_lahanpertanian' => 'required',
            'valwaktutempuh_lahanpertanian' => 'required',
            'valbiaya_lahanpertanian' => 'required',
            'valkemudahan_lahanpertanian' => 'required',
            'valjenistrasport_sekolah' => 'required',
            'valpengtransportumum_sekolah' => 'required',
            'valwaktutempuh_sekolah' => 'required',
            'valbiaya_sekolah' => 'required',
            'valkemudahan_sekolah' => 'required',
            'valjenistrasport_berobat' => 'required',
            'valpengtransportumum_berobat' => 'required',
            'valwaktutempuh_berobat' => 'required',
            'valbiaya_berobat' => 'required',
            'valkemudahan_berobat' => 'required',
            'valjenistrasport_beribadah' => 'required',
            'valpengtransportumum_beribadah' => 'required',
            'valwaktutempuh_beribadah' => 'required',
            'valbiaya_beribadah' => 'required',
            'valkemudahan_beribadah' => 'required',
            'valjenistrasport_rekreasi' => 'required',
            'valpengtransportumum_rekreasi' => 'required',
            'valwaktutempuh_rekreasi' => 'required',
            'valbiaya_rekreasi' => 'required',
            'valkemudahan_rekreasi' => 'required',
           
           
        ];
    }

    public function messages(): array
    {
        return [

            'valjenistrasport_lokasipu.required' => ':attribute tidak boleh kosong',
            'valpengtransportumum_lokasipu.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_lokasipu.required' => ':attribute tidak boleh kosong',
            'valbiaya_lokasipu.required' => ':attribute tidak boleh kosong',
            'valkemudahan_lokasipu.required' => ':attribute tidak boleh kosong',
            'valjenistrasport_lahanpertanian.required' => ':attribute tidak boleh kosong',
            'valpengtransportumum_lahanpertanian.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_lahanpertanian.required' => ':attribute tidak boleh kosong',
            'valbiaya_lahanpertanian.required' => ':attribute tidak boleh kosong',
            'valkemudahan_lahanpertanian.required' => ':attribute tidak boleh kosong',
            'valjenistrasport_sekolah.required' => ':attribute tidak boleh kosong',
            'valpengtransportumum_sekolah.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_sekolah.required' => ':attribute tidak boleh kosong',
            'valbiaya_sekolah.required' => ':attribute tidak boleh kosong',
            'valkemudahan_sekolah.required' => ':attribute tidak boleh kosong',
            'valjenistrasport_berobat.required' => ':attribute tidak boleh kosong',
            'valpengtransportumum_berobat.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_berobat.required' => ':attribute tidak boleh kosong',
            'valbiaya_berobat.required' => ':attribute tidak boleh kosong',
            'valkemudahan_berobat.required' => ':attribute tidak boleh kosong',
            'valjenistrasport_beribadah.required' => ':attribute tidak boleh kosong',
            'valpengtransportumum_beribadah.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_beribadah.required' => ':attribute tidak boleh kosong',
            'valbiaya_beribadah.required' => ':attribute tidak boleh kosong',
            'valkemudahan_beribadah.required' => ':attribute tidak boleh kosong',
            'valjenistrasport_rekreasi.required' => ':attribute tidak boleh kosong',
            'valpengtransportumum_rekreasi.required' => ':attribute tidak boleh kosong',
            'valwaktutempuh_rekreasi.required' => ':attribute tidak boleh kosong',
            'valbiaya_rekreasi.required' => ':attribute tidak boleh kosong',
            'valkemudahan_rekreasi.required' => ':attribute tidak boleh kosong',
           



        ];
    }

    public function attributes(): array
    {
        return [

            'valjenistrasport_lokasipu' =>  'jenistrasport_lokasipu',
            'valpengtransportumum_lokasipu' =>  'pengtransportumum_lokasipu',
            'valwaktutempuh_lokasipu' =>  'waktutempuh_lokasipu',
            'valbiaya_lokasipu' =>  'biaya_lokasipu',
            'valkemudahan_lokasipu' =>  'kemudahan_lokasipu',
            'valjenistrasport_lahanpertanian' =>  'jenistrasport_lahanpertanian',
            'valpengtransportumum_lahanpertanian' =>  'pengtransportumum_lahanpertanian',
            'valwaktutempuh_lahanpertanian' =>  'waktutempuh_lahanpertanian',
            'valbiaya_lahanpertanian' =>  'biaya_lahanpertanian',
            'valkemudahan_lahanpertanian' =>  'kemudahan_lahanpertanian',
            'valjenistrasport_sekolah' =>  'jenistrasport_sekolah',
            'valpengtransportumum_sekolah' =>  'pengtransportumum_sekolah',
            'valwaktutempuh_sekolah' =>  'waktutempuh_sekolah',
            'valbiaya_sekolah' =>  'biaya_sekolah',
            'valkemudahan_sekolah' =>  'kemudahan_sekolah',
            'valjenistrasport_berobat' =>  'jenistrasport_berobat',
            'valpengtransportumum_berobat' =>  'pengtransportumum_berobat',
            'valwaktutempuh_berobat' =>  'waktutempuh_berobat',
            'valbiaya_berobat' =>  'biaya_berobat',
            'valkemudahan_berobat' =>  'kemudahan_berobat',
            'valjenistrasport_beribadah' =>  'jenistrasport_beribadah',
            'valpengtransportumum_beribadah' =>  'pengtransportumum_beribadah',
            'valwaktutempuh_beribadah' =>  'waktutempuh_beribadah',
            'valbiaya_beribadah' =>  'biaya_beribadah',
            'valkemudahan_beribadah' =>  'kemudahan_beribadah',
            'valjenistrasport_rekreasi' =>  'jenistrasport_rekreasi',
            'valpengtransportumum_rekreasi' =>  'pengtransportumum_rekreasi',
            'valwaktutempuh_rekreasi' =>  'waktutempuh_rekreasi',
            'valbiaya_rekreasi' =>  'biaya_rekreasi',
            'valkemudahan_rekreasi' =>  'kemudahan_rekreasi',
             
        ];
    }
}
