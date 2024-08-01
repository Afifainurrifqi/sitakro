<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreaksessarprasRequest extends FormRequest
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
            'valjenistrasport_lokasipu' => 'nullable',
            'valpengtransportumum_lokasipu' => 'nullable',
            'valwaktutempuh_lokasipu' => 'nullable',
            'valbiaya_lokasipu' => 'nullable',
            'valkemudahan_lokasipu' => 'nullable',
            'valjenistrasport_lahanpertanian' => 'nullable',
            'valpengtransportumum_lahanpertanian' => 'nullable',
            'valwaktutempuh_lahanpertanian' => 'nullable',
            'valbiaya_lahanpertanian' => 'nullable',
            'valkemudahan_lahanpertanian' => 'nullable',
            'valjenistrasport_sekolah' => 'nullable',
            'valpengtransportumum_sekolah' => 'nullable',
            'valwaktutempuh_sekolah' => 'nullable',
            'valbiaya_sekolah' => 'nullable',
            'valkemudahan_sekolah' => 'nullable',
            'valjenistrasport_berobat' => 'nullable',
            'valpengtransportumum_berobat' => 'nullable',
            'valwaktutempuh_berobat' => 'nullable',
            'valbiaya_berobat' => 'nullable',
            'valkemudahan_berobat' => 'nullable',
            'valjenistrasport_beribadah' => 'nullable',
            'valpengtransportumum_beribadah' => 'nullable',
            'valwaktutempuh_beribadah' => 'nullable',
            'valbiaya_beribadah' => 'nullable',
            'valkemudahan_beribadah' => 'nullable',
            'valjenistrasport_rekreasi' => 'nullable',
            'valpengtransportumum_rekreasi' => 'nullable',
            'valwaktutempuh_rekreasi' => 'nullable',
            'valbiaya_rekreasi' => 'nullable',
            'valkemudahan_rekreasi' => 'nullable',


        ];
    }

    public function messages(): array
    {
        return [

            'valjenistrasport_lokasipu.nullable' => ':attribute tidak boleh kosong',
            'valpengtransportumum_lokasipu.nullable' => ':attribute tidak boleh kosong',
            'valwaktutempuh_lokasipu.nullable' => ':attribute tidak boleh kosong',
            'valbiaya_lokasipu.nullable' => ':attribute tidak boleh kosong',
            'valkemudahan_lokasipu.nullable' => ':attribute tidak boleh kosong',
            'valjenistrasport_lahanpertanian.nullable' => ':attribute tidak boleh kosong',
            'valpengtransportumum_lahanpertanian.nullable' => ':attribute tidak boleh kosong',
            'valwaktutempuh_lahanpertanian.nullable' => ':attribute tidak boleh kosong',
            'valbiaya_lahanpertanian.nullable' => ':attribute tidak boleh kosong',
            'valkemudahan_lahanpertanian.nullable' => ':attribute tidak boleh kosong',
            'valjenistrasport_sekolah.nullable' => ':attribute tidak boleh kosong',
            'valpengtransportumum_sekolah.nullable' => ':attribute tidak boleh kosong',
            'valwaktutempuh_sekolah.nullable' => ':attribute tidak boleh kosong',
            'valbiaya_sekolah.nullable' => ':attribute tidak boleh kosong',
            'valkemudahan_sekolah.nullable' => ':attribute tidak boleh kosong',
            'valjenistrasport_berobat.nullable' => ':attribute tidak boleh kosong',
            'valpengtransportumum_berobat.nullable' => ':attribute tidak boleh kosong',
            'valwaktutempuh_berobat.nullable' => ':attribute tidak boleh kosong',
            'valbiaya_berobat.nullable' => ':attribute tidak boleh kosong',
            'valkemudahan_berobat.nullable' => ':attribute tidak boleh kosong',
            'valjenistrasport_beribadah.nullable' => ':attribute tidak boleh kosong',
            'valpengtransportumum_beribadah.nullable' => ':attribute tidak boleh kosong',
            'valwaktutempuh_beribadah.nullable' => ':attribute tidak boleh kosong',
            'valbiaya_beribadah.nullable' => ':attribute tidak boleh kosong',
            'valkemudahan_beribadah.nullable' => ':attribute tidak boleh kosong',
            'valjenistrasport_rekreasi.nullable' => ':attribute tidak boleh kosong',
            'valpengtransportumum_rekreasi.nullable' => ':attribute tidak boleh kosong',
            'valwaktutempuh_rekreasi.nullable' => ':attribute tidak boleh kosong',
            'valbiaya_rekreasi.nullable' => ':attribute tidak boleh kosong',
            'valkemudahan_rekreasi.nullable' => ':attribute tidak boleh kosong',




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
