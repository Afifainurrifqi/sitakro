<?php

namespace App\Http\Controllers;

use App\Models\surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator as VFacade;
use App\Services\NomorSuratService;

class SuratPernyataanTidakBisaMelampirkanKtpKematianController extends Controller
{
    // jenis counter untuk surat ini
    private string $jenisCounter = 'spktp';

    public function __construct(private NomorSuratService $svc) {}

    /** List admin */
    public function index()
    {
        $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::orderBy('_id', 'desc')->get();
        return view('surat.suratpernyataantidakbisamelampirkanktpkematian', compact('data'));
    }

    /** Form user */
    public function userkematianktp()
    {
        return view('surat.user_suratpernyataantidakbisamelampirkanktpkematian');
    }

    /** Export PDF */
    public function exportPdf($id)
    {
        $data = surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::findOrFail($id);
        $pdf = Pdf::loadView('surat.pdfsuratpernyataantidakbisamelampirkanktpkematian', compact('data'))
            ->setPaper('a4', 'portrait');
        $filename = 'surat_pernyataan_ktp_' . preg_replace('/[^A-Za-z0-9\-]/', '_', (string)$data->_id) . '.pdf';
        return $pdf->download($filename);
    }

    /*** ========= Validasi ========= ***/
    protected function baseValidator(Request $request, bool $isAdmin): Validator
    {
        $rules = [
            'nowa'                   => ['required','string','max:20'],
            'nama_pelapor'           => ['required','string','max:255'],
            'nik_pelapor'            => ['required','string','max:32'],
            'tempat_lahir_pelapor'   => ['required','string','max:100'],
            'tanggal_lahir_pelapor'  => ['required','date'],
            'jenis_kelamin_pelapor'  => ['required','string','max:20'],
            'pekerjaan_pelapor'      => ['required','string','max:100'],
            'alamat_pelapor'         => ['required','string'],
            'alasan'                 => ['required','string'],

            'nik_jenazah'            => ['required','string','max:32'],
            'nama_jenazah'           => ['required','string','max:255'],
            'tanggal_lahir_jenazah'  => ['required','date'],
            'jenis_kelamin_jenazah'  => ['required','string','max:20'],
            'alamat_jenazah'         => ['required','string'],

            // opsional, hanya admin formmu yang tadi pakai ini
            'agama_pelapor'          => ['nullable','string','max:50'],
        ];

        if ($isAdmin) {
            $rules['status_surat'] = ['required','string','in:Pending,Di cek,Di terima,Ditolak'];
            $rules['status_verif'] = ['required','string','in:Belum Verifikasi,Terverifikasi'];
        } else {
            $rules['status_surat'] = ['nullable','string'];
            $rules['status_verif'] = ['nullable','string'];
        }

        return VFacade::make($request->all(), $rules);
    }

    /** Assign nomor kalau eligible (Di terima + Terverifikasi) dan belum punya nomor */
    protected function maybeAssignNomorSurat($modelOrNull, array &$payload): void
    {
        $status = $payload['status_surat'] ?? ($modelOrNull->status_surat ?? null);
        $verif  = $payload['status_verif'] ?? ($modelOrNull->status_verif ?? null);

        if ($status === 'Di terima' && $verif === 'Terverifikasi'
            && empty($payload['nomor_surat'])
            && empty($modelOrNull?->nomor_surat)) {

            $tahun = now('Asia/Jakarta')->year;
            $urut  = $this->svc->nextFor($this->jenisCounter, $tahun);
            $payload['nomor_urut']  = $urut;
            $payload['tahun_nomor'] = $tahun;
            $payload['nomor_surat'] = $this->svc->formatFor($urut, $tahun);
        }
    }

    /** USER store (status default Pending/Belum Verifikasi) */
    public function userstore(Request $request)
    {
        $validator = $this->baseValidator($request, isAdmin:false);
        $validated = $validator->validate();

        $payload = array_merge($validated, [
            'status_surat' => 'Pending',
            'status_verif' => 'Belum Verifikasi',
        ]);

        // user tidak eligible -> tidak ada nomor di sini
        surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::create($payload);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }

    /** ADMIN store (bisa langsung assign nomor jika eligible) */
    public function store(Request $request)
    {
        $validator = $this->baseValidator($request, isAdmin:true);
        $validated = $validator->validate();
        $payload   = $validated;

        $this->maybeAssignNomorSurat(null, $payload);

        surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian::create($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Data berhasil disimpan dan diarahkan ke arsip surat keluar.');
    }

    /** Edit */
    public function edit(surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat)
    {
        return view('surat.edit_suratpernyataantidakbisamelampirkanktpkematian', compact('surat'));
    }

    /** ADMIN update (bisa memicu nomor jika eligible) */
    public function update(Request $request, surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat)
    {
        $validator = $this->baseValidator($request, isAdmin:true);
        $validated = $validator->validate();
        $payload   = $validated;

        $this->maybeAssignNomorSurat($surat, $payload);

        $surat->update($payload);

        return redirect()->route('surat.keluar')->with('success', 'Surat berhasil diperbarui.');
    }

    /** Destroy (opsional) */
    public function destroy(surat_pernyataan_tidak_bisa_melampirkan_ktp_kematian $surat)
    {
        $surat->delete();
        return back()->with('success', 'Surat berhasil dihapus.');
    }
}
