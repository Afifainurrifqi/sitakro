<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Datapenduduk;
use App\Models\User;
use App\Models\datadasawisma;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DatadasawismaController extends Controller
{
    public function index(Request $request)
    {
        return view('datadasawisma.datadw');
    }

    public function index_admin(Request $request)
    {
        return view('datadasawisma.admindatadw');
    }

    public function add(Request $request)
    {
        return view('datadasawisma.tambahdw');
    }

    public function json(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        if ($request->has('nik')) {
            $nik = $request->input('nik');
            $query = Datapenduduk::with(['kk', 'agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk'])
                ->where('nik', $nik)
                ->whereIn('datak', $allowedDatakValues);
        } else {
            $query = Datapenduduk::whereNull('nik');
        }

        return DataTables::of($query)
            ->addColumn('nokk', fn($row) => optional(optional($row->detailkk)->kk)->nokk)
            ->addColumn('action', function ($row) {
                $editUrl = route('dasawisma.show', ['nik' => $row->nik]);
                $deleteForm = '<form onsubmit="return deleteData(\'' . e($row->nama) . '\')" action="' . url('dasawisma') . '/' . e($row->nik) . '" method="POST" style="display:inline">'
                    . csrf_field() . method_field('DELETE') . '</form>';
                return '<a href="' . $editUrl . '" class="btn mb-1 btn-info btn-sm" title="Edit data"><i class="fas fa-edit"></i></a>' . $deleteForm;
            })
            ->addColumn('statusdw', fn(Datapenduduk $item) => $item && $item->user_id == null ? 'dasawisma' : 'penduduk')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function jsonadmin(Request $request)
    {
        $allowedDatakValues = ['tetap', 'tidaktetap'];

        $query = Datapenduduk::with(['agama', 'pendidikan', 'pekerjaan', 'goldar', 'status', 'detailkk.kk', 'user'])
            ->whereIn('datak', $allowedDatakValues)
            ->whereHas('user', fn($q) => $q->where('role', 'dasawisma'));

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('nokk', fn($row) => optional(optional($row->detailkk)->kk)->nokk)
            ->addColumn('action', function ($row) {
                $editUrl   = route('dasawisma.show', ['nik' => $row->nik]);
                $deleteUrl = route('dasawisma.destroy', ['nik' => $row->nik]);
                $csrf      = csrf_field();
                $method    = method_field('DELETE');
                return <<<HTML
                  <a href="{$editUrl}" class="btn mb-1 btn-info btn-sm" title="Edit data"><i class="fas fa-edit"></i></a>
                  <form onsubmit="return deleteData('{$row->nama}')" action="{$deleteUrl}" method="POST" style="display:inline">
                    {$csrf}{$method}
                    <button type="submit" class="btn mb-1 btn-danger btn-sm" title="Hapus data"><i class="fas fa-trash"></i></button>
                  </form>
                HTML;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /** Simpan akun dasawisma baru & tautkan ke datapenduduk */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ValNIK'   => ['required', 'digits_between:8,20', 'exists:datapenduduks,nik'],
            'nama'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'ValNIK.required'       => 'NIK wajib diisi.',
            'ValNIK.digits_between' => 'Format NIK tidak valid.',
            'ValNIK.exists'         => 'NIK tidak ditemukan pada data penduduk.',
            'nama.required'         => 'Nama wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'email.unique'          => 'Email sudah digunakan.',
            'password.required'     => 'Password wajib diisi.',
            'password.min'          => 'Password minimal 6 karakter.',
        ]);

        DB::transaction(function () use ($validated) {
            $penduduk = Datapenduduk::where('nik', $validated['ValNIK'])->lockForUpdate()->first();

            if (!$penduduk) {
                throw ValidationException::withMessages(['ValNIK' => 'Data penduduk tidak ditemukan.']);
            }
            if (!is_null($penduduk->user_id)) {
                throw ValidationException::withMessages(['ValNIK' => 'NIK ini sudah terdaftar sebagai pengguna.']);
            }
            if (User::where('nik', $penduduk->nik)->exists()) {
                throw ValidationException::withMessages(['ValNIK' => 'Sudah ada akun dengan NIK ini.']);
            }

            $user = User::create([
                'nik'      => $penduduk->nik,
                'name'     => $validated['nama'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role'     => 'dasawisma',
            ]);

            $penduduk->user_id = $user->id;
            $penduduk->save();
        });

        return redirect()->route('dasawisma.index_admin')
            ->with('msg', 'Berhasil menambahkan akun Dasawisma dan menautkannya ke data penduduk.');
    }

    /** API tombol "Cari" NIK → balikan JSON untuk autofill */
    public function findPendudukByNik(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'regex:/^\d{8,20}$/'],
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.regex'    => 'NIK harus 8–20 digit angka.',
        ]);

        $nik = trim($request->input('nik'));
        Log::debug('[findPendudukByNik] searching nik=' . $nik . ' by user=' . auth()->id());

        $penduduk = Datapenduduk::where('nik', $nik)->first();

        if (!$penduduk) {
            Log::debug('[findPendudukByNik] not found nik=' . $nik);
            return response()->json(['ok' => false, 'message' => 'NIK tidak ditemukan.'], 404);
        }

        return response()->json([
            'ok'   => true,
            'data' => [
                'id'     => $penduduk->id,
                'nik'    => $penduduk->nik,
                'nama'   => $penduduk->nama,
                'alamat' => $penduduk->alamat,
                'rt'     => $penduduk->rt,
                'rw'     => $penduduk->rw,
            ],
        ], 200);
    }

    public function show(datadasawisma $datadasawisma, $nik)
    {
        $penduduk = Datapenduduk::where('nik', $nik)->first();
        $user     = User::where('nik', $nik)->first();

        return view('datadasawisma.tambahdw', compact('penduduk', 'user', 'nik'))->with([
            'valNIK'        => $nik,
            'valNama'       => $penduduk->nama   ?? '',
            'valAlamat'     => $penduduk->alamat ?? '',
            'valRT'         => $penduduk->rt     ?? '',
            'valRW'         => $penduduk->rw     ?? '',
            'valEmails'     => $user->email      ?? '',
            'valPassword'   => '',
            'valRole'       => $user->role       ?? 'dasawisma',
            'valNamakelompok' => $datadasawisma->nama_kelompok ?? '',
        ]);
    }

    public function update(Request $request, $nik)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
            'role'     => 'required'
        ]);

        $penduduk = Datapenduduk::where('nik', $nik)->firstOrFail();
        $user     = User::where('nik', $nik)->first();

        if (!$user) {
            $user = new User();
            $user->nik = $penduduk->nik;
        }

        $user->name     = $penduduk->nama;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role     = $request->role;
        $user->save();

        $penduduk->user_id = $user->id;
        $penduduk->save();

        return redirect()->route('dasawisma.index_admin')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($nik)
    {
        $penduduk = Datapenduduk::where('nik', $nik)->firstOrFail();
        $user     = User::where('nik', $nik)->first();

        if ($user) $user->delete();

        $penduduk->user_id = null;
        // Hanya set role kalau kolomnya memang ada di tabel Datapenduduk
        if (isset($penduduk->role)) {
            $penduduk->role = 'penduduk';
        }
        $penduduk->save();

        return redirect()->route('dasawisma.index')->with('success', 'Data berhasil dihapus');
    }
}
