<?php

namespace App\Http\Controllers;

use App\Models\suratketerangantidakmampu;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;                // <-- type return
use Illuminate\Support\Facades\Validator as VFacade; // <-- facade alias
use App\Services\NomorSuratService;

class SuratketerangantidakmampuController extends Controller
{
    public function __construct(private NomorSuratService $svc) {}

    /**
     * Daftar data (Admin).
     */
    public function index()
    {
        $data = suratketerangantidakmampu::orderBy('_id', 'desc')->get();
        return view('surat.surat_keterangan_tidakmampu', compact('data'));
    }

    public function usertidakmampu()
    {
        return view('surat.user_surat_keterangan_tidakmampu');
    }

    public function create()
    {
        return view('surat.surat_keterangan_tidakmampu');
    }

    /**
     * Base validator (dynamic rules for admin/user).
     */
    protected function baseValidator(Request $request, bool $isAdmin): Validator
    {
        $rules = [
            'nowa'                    => ['required', 'string', 'max:20'],
            'nama_lengkap'            => ['required', 'string', 'max:255'],
            'nik'                     => ['required', 'string', 'max:32'],
            'tempat_lahir'            => ['required', 'string', 'max:100'],
            'tanggal_lahir'           => ['required', 'date'],
            'kewarganegaraan'         => ['required', 'string', 'max:100'],
            'agama'                   => ['required', 'string', 'max:50'],
            'status_perkawinan'       => ['required', 'string', 'max:50'],
            'pekerjaan'               => ['required', 'string', 'max:100'],
            'alamat_rumah'            => ['required', 'string'],
            'peruntukan_sktm'         => ['required', 'string', 'in:Biaya Pendidikan,Bantuan Sosial,Biaya Kesehatan'],
            'keterangan_fungsi_surat' => ['required', 'string', 'max:500'],

            // bantuan
            'bantuan'       => ['nullable', 'array'],
            'bantuan.*'     => ['in:pkh,kip,kis,bpnt,dtks,blt_dd,bansos'],
            'bantuan_id'    => ['nullable', 'array'],
            'bantuan_id.*'  => ['nullable', 'string', 'max:100'],
        ];

        if ($isAdmin) {
            $rules['status_surat'] = ['required', 'string', 'in:Pending,Di cek,Di terima,Ditolak'];
            $rules['status_verif'] = ['required', 'string', 'in:Belum Verifikasi,Terverifikasi'];
        }

        return VFacade::make($request->all(), $rules); // facade yang bikin instance
    }

    /**
     * Validasi relasi bantuan => bantuan_id wajib isi jika terpilih.
     */
    protected function validateBantuanOrFail(Request $request): array
    {
        $allowed  = ['pkh', 'kip', 'kis', 'bpnt', 'dtks', 'blt_dd', 'bansos'];
        $selected = array_values(array_intersect($allowed, (array) $request->input('bantuan', [])));
        $idsInput = (array) $request->input('bantuan_id', []);

        $errors   = [];
        $filtered = [];

        foreach ($selected as $key) {
            $val = trim((string)($idsInput[$key] ?? ''));
            if ($val === '') {
                $label = strtoupper(str_replace('_', ' ', $key));
                $errors["bantuan_id.$key"] = "ID $label wajib diisi.";
            } else {
                $filtered[$key] = $val;
            }
        }

        if ($errors) {
            back()->withErrors($errors)->withInput()->throwResponse();
        }

        return [$selected, $filtered];
    }

    /**
     * Cek & assign nomor_surat bila eligible.
     */
    protected function maybeAssignNomorSurat($sktmOrNull, array &$payload): void
    {
        $status = $payload['status_surat'] ?? ($sktmOrNull->status_surat ?? null);
        $verif  = $payload['status_verif'] ?? ($sktmOrNull->status_verif ?? null);

        if (
            $status === 'Di terima' && $verif === 'Terverifikasi'
            && empty($payload['nomor_surat'])
            && empty($sktmOrNull?->nomor_surat)
        ) {

            $tahun = now('Asia/Jakarta')->year;
            $urut  = $this->svc->next($tahun);
            $payload['nomor_urut']  = $urut;
            $payload['tahun_nomor'] = $tahun;
            $payload['nomor_surat'] = $this->svc->format($urut, $tahun);
        }
    }

    /**
     * Store (Admin).
     */
    public function store(Request $request)
    {
        $validator = $this->baseValidator($request, isAdmin: true);
        [$selected, $filtered] = $this->validateBantuanOrFail($request);

        $validated = $validator->validate();
        $payload = array_merge($validated, [
            'bantuan'    => $selected,
            'bantuan_id' => $filtered,
        ]);

        $this->maybeAssignNomorSurat(null, $payload);

        suratketerangantidakmampu::create($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat berhasil disimpan.');
    }

    /**
     * Store (User).
     */
    public function userstore(Request $request)
    {
        $validator = $this->baseValidator($request, isAdmin: false);
        [$selected, $filtered] = $this->validateBantuanOrFail($request);

        $validated = $validator->validate();
        $payload = array_merge($validated, [
            'status_surat' => 'Pending',
            'status_verif' => 'Belum Verifikasi',
            'bantuan'      => $selected,
            'bantuan_id'   => $filtered,
        ]);

        suratketerangantidakmampu::create($payload);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat berhasil disimpan.');
    }

    /**
     * Edit.
     */
    public function edit(suratketerangantidakmampu $suratketerangantidakmampu)
    {
        return view('surat.edit_surat_keterangan_tidakmampu', [
            'sktm' => $suratketerangantidakmampu
        ]);
    }

    /**
     * Update (Admin).
     */
    public function update(Request $request, suratketerangantidakmampu $suratketerangantidakmampu)
    {
        $validator = $this->baseValidator($request, isAdmin: true);
        [$selected, $filtered] = $this->validateBantuanOrFail($request);

        $validated = $validator->validate();
        $payload = array_merge($validated, [
            'bantuan'    => $selected,
            'bantuan_id' => $filtered,
        ]);

        $this->maybeAssignNomorSurat($suratketerangantidakmampu, $payload);

        $suratketerangantidakmampu->update($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Destroy.
     */
    public function destroy(suratketerangantidakmampu $suratketerangantidakmampu)
    {
        $suratketerangantidakmampu->delete();
        return back()->with('success', 'Surat berhasil dihapus.');
    }
}
