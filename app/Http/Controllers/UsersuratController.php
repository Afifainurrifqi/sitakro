<?php

namespace App\Http\Controllers;

use App\Models\usersurat;
use App\Http\Requests\StoreusersuratRequest;
use App\Http\Requests\UpdateusersuratRequest;

class UsersuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat.user_surat');
    }

    public function pengajuan()
    {
        return view('surat.user_pengajuansurat');
    }

    public function adminduk()
    {
        return view('surat.user_surat_adminduk');
    }

    public function pernyataan()
    {
        return view('surat.user_surat_pernyataan');
    }

    public function keterangan()
    {
        return view('surat.user_surat_keterangan');
    }

    public function adminduk_Kematianktp()
    {
        return view('surat.user_pernyataantidakbisamelampirkanktpkematian');
    }

    public function adminduk_numpangkk()
    {
        return view('surat.user_surat_pernyataan_numpang_kk');
    }

    public function suratberhasil()
    {
        return view('surat.suratberhasil');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreusersuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreusersuratRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usersurat  $usersurat
     * @return \Illuminate\Http\Response
     */
    public function show(usersurat $usersurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usersurat  $usersurat
     * @return \Illuminate\Http\Response
     */
    public function edit(usersurat $usersurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateusersuratRequest  $request
     * @param  \App\Models\usersurat  $usersurat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateusersuratRequest $request, usersurat $usersurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usersurat  $usersurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(usersurat $usersurat)
    {
        //
    }
}
