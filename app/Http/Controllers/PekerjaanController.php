<?php

namespace App\Http\Controllers;

use App\Models\pekerjaan;
use App\Http\Requests\StorepekerjaanRequest;
use App\Http\Requests\UpdatepekerjaanRequest;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorepekerjaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepekerjaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepekerjaanRequest  $request
     * @param  \App\Models\pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepekerjaanRequest $request, pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pekerjaan $pekerjaan)
    {
        //
    }
}
