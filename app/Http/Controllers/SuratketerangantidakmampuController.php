<?php

namespace App\Http\Controllers;

use App\Models\suratketerangantidakmampu;
use App\Http\Requests\StoresuratketerangantidakmampuRequest;
use App\Http\Requests\UpdatesuratketerangantidakmampuRequest;
use Illuminate\Http\Request;

class SuratketerangantidakmampuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = suratketerangantidakmampu::all();
        return view('surat.surat_keterangan_tidakmampu', compact('data'));
    }

    public function usertidakmampu()
    {
        return view('surat.user_surat_keterangan_tidakmampu'); // Buat view khusus form tambah baru jika perlu
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat.surat_keterangan_tidakmampu'); // Buat view khusus form tambah baru jika perlu
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresuratketerangantidakmampuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nowa'                    => 'required|string|max:20',
            'status_surat'            => 'nullable|string',
            'status_verif'            => 'nullable|string',
            'nama_lengkap'            => 'required|string|max:255',
            'nik'                     => 'required|string|max:32',
            'tempat_lahir'            => 'required|string|max:100',
            'tanggal_lahir'           => 'required|date',
            'kewarganegaraan'         => 'required|string|max:100',
            'agama'                   => 'required|string|max:50',
            'status_perkawinan'       => 'required|string|max:50',
            'pekerjaan'               => 'required|string|max:100',
            'alamat_rumah'            => 'required|string',
            'peruntukan_sktm'         => 'required|string|in:Biaya Pendidikan,Bantuan Sosial,Biaya Kesehatan',
            'keterangan_fungsi_surat' => 'required|string',

            // Bantuan sosial (array dari checkbox)
            'bantuan'       => 'nullable|array',
            'bantuan.*'     => 'in:pkh,kip,kis,bpnt,dtks,blt_dd,bansos',
            'bantuan_id'    => 'nullable|array',
            'bantuan_id.*'  => 'nullable|string|max:100',
        ]);

        // Normalisasi & validasi relasi bantuan -> bantuan_id
        $allowed = ['pkh', 'kip', 'kis', 'bpnt', 'dtks', 'blt_dd', 'bansos'];
        $selected = array_values(array_intersect($allowed, (array) $request->input('bantuan', [])));
        $idsInput = (array) $request->input('bantuan_id', []);

        $errors = [];
        $filteredIds = [];
        foreach ($selected as $key) {
            $val = trim((string)($idsInput[$key] ?? ''));
            if ($val === '') {
                $errors["bantuan_id.$key"] = "ID " . strtoupper(str_replace('_', ' ', $key)) . " wajib diisi.";
            } else {
                $filteredIds[$key] = $val;
            }
        }
        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }

        // Default status bila kosong
        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        // Payload final sesuai Model (casts array)
        $payload = array_merge($validated, [
            'bantuan'    => $selected,
            'bantuan_id' => $filteredIds,
        ]);

        suratketerangantidakmampu::create($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Keterangan Tidak Mampu berhasil disimpan.');
    }

    public function userstore(Request $request)
    {
        $validated = $request->validate([
            'nowa'                    => 'required|string|max:20',
            'status_surat'            => 'nullable|string',
            'status_verif'            => 'nullable|string',
            'nama_lengkap'            => 'required|string|max:255',
            'nik'                     => 'required|string|max:32',
            'tempat_lahir'            => 'required|string|max:100',
            'tanggal_lahir'           => 'required|date',
            'kewarganegaraan'         => 'required|string|max:100',
            'agama'                   => 'required|string|max:50',
            'status_perkawinan'       => 'required|string|max:50',
            'pekerjaan'               => 'required|string|max:100',
            'alamat_rumah'            => 'required|string',
            'peruntukan_sktm'         => 'required|string|in:Biaya Pendidikan,Bantuan Sosial,Biaya Kesehatan',
            'keterangan_fungsi_surat' => 'required|string',

            'bantuan'       => 'nullable|array',
            'bantuan.*'     => 'in:pkh,kip,kis,bpnt,dtks,blt_dd,bansos',
            'bantuan_id'    => 'nullable|array',
            'bantuan_id.*'  => 'nullable|string|max:100',
        ]);

        $allowed = ['pkh', 'kip', 'kis', 'bpnt', 'dtks', 'blt_dd', 'bansos'];
        $selected = array_values(array_intersect($allowed, (array) $request->input('bantuan', [])));
        $idsInput = (array) $request->input('bantuan_id', []);

        $errors = [];
        $filteredIds = [];
        foreach ($selected as $key) {
            $val = trim((string)($idsInput[$key] ?? ''));
            if ($val === '') {
                $errors["bantuan_id.$key"] = "ID " . strtoupper(str_replace('_', ' ', $key)) . " wajib diisi.";
            } else {
                $filteredIds[$key] = $val;
            }
        }
        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        $payload = array_merge($validated, [
            'bantuan'    => $selected,
            'bantuan_id' => $filteredIds,
        ]);

        suratketerangantidakmampu::create($payload);

        return redirect()->route('surat.suratberhasil')
            ->with('success', 'Surat Keterangan Tidak Mampu berhasil disimpan.');
    }

    public function edit(suratketerangantidakmampu $suratketerangantidakmampu)
    {
        return view('surat.edit_surat_keterangan_tidakmampu', [
            'sktm' => $suratketerangantidakmampu
        ]);
    }

    public function update(Request $request, suratketerangantidakmampu $suratketerangantidakmampu)
    {
        $validated = $request->validate([
            'nowa'                    => 'required|string|max:20',
            'status_surat'            => 'nullable|string',
            'status_verif'            => 'nullable|string',
            'nama_lengkap'            => 'required|string|max:255',
            'nik'                     => 'required|string|max:32',
            'tempat_lahir'            => 'required|string|max:100',
            'tanggal_lahir'           => 'required|date',
            'kewarganegaraan'         => 'required|string|max:100',
            'agama'                   => 'required|string|max:50',
            'status_perkawinan'       => 'required|string|max:50',
            'pekerjaan'               => 'required|string|max:100',
            'alamat_rumah'            => 'required|string',
            'peruntukan_sktm'         => 'required|string|in:Biaya Pendidikan,Bantuan Sosial,Biaya Kesehatan',
            'keterangan_fungsi_surat' => 'required|string',

            'bantuan'       => 'nullable|array',
            'bantuan.*'     => 'in:pkh,kip,kis,bpnt,dtks,blt_dd,bansos',
            'bantuan_id'    => 'nullable|array',
            'bantuan_id.*'  => 'nullable|string|max:100',
        ]);

        $allowed = ['pkh', 'kip', 'kis', 'bpnt', 'dtks', 'blt_dd', 'bansos'];
        $selected = array_values(array_intersect($allowed, (array) $request->input('bantuan', [])));
        $idsInput = (array) $request->input('bantuan_id', []);

        $errors = [];
        $filteredIds = [];
        foreach ($selected as $key) {
            $val = trim((string)($idsInput[$key] ?? ''));
            if ($val === '') {
                $errors["bantuan_id.$key"] = "ID " . strtoupper(str_replace('_', ' ', $key)) . " wajib diisi.";
            } else {
                $filteredIds[$key] = $val;
            }
        }
        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }

        $validated['status_surat'] = $validated['status_surat'] ?? 'Pending';
        $validated['status_verif'] = $validated['status_verif'] ?? 'Belum Verifikasi';

        $payload = array_merge($validated, [
            'bantuan'    => $selected,
            'bantuan_id' => $filteredIds,
        ]);

        $suratketerangantidakmampu->update($payload);

        return redirect()->route('surat.keluar')
            ->with('success', 'Surat Keterangan Tidak Mampu berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\suratketerangantidakmampu  $suratketerangantidakmampu
     * @return \Illuminate\Http\Response
     */
    public function destroy(suratketerangantidakmampu $suratketerangantidakmampu)
    {
        //
    }
}
