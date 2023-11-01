<?php

namespace App\Http\Controllers;

use App\Models\pendidikan;
use App\Http\Requests\StorependidikanRequest;
use App\Http\Requests\UpdatependidikanRequest;

class PendidikanController extends Controller
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
     * @param  \App\Http\Requests\StorependidikanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorependidikanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatependidikanRequest  $request
     * @param  \App\Models\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatependidikanRequest $request, pendidikan $pendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendidikan $pendidikan)
    {
        //
    }
}
