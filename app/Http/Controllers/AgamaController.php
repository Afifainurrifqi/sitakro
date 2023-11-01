<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Http\Requests\StoreagamaRequest;
use App\Http\Requests\UpdateagamaRequest;


class AgamaController extends Controller
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
     * @param  \App\Http\Requests\StoreagamaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreagamaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show(agama $agama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit(agama $agama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateagamaRequest  $request
     * @param  \App\Models\agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateagamaRequest $request, agama $agama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function destroy(agama $agama)
    {
        //
    }
}
