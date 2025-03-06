<?php

namespace App\Http\Controllers;

use App\Models\farming;
use App\Http\Requests\StorefarmingRequest;
use App\Http\Requests\UpdatefarmingRequest;

class FarmingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('farming.home');
    }

    public function start()
    {
        return view('farming.start');
    }

    public function lahan()
    {
        return view('farming.lahan');
    }

    public function tambahlahan()
    {
        return view('farming.tambahlahan');
    }

    public function updatelahan()
    {
        return view('farming.updatelahan');
    }

    public function perawatan()
    {
        return view('farming.perawatan');
    }

    public function profile()
    {
        return view('farming.profile');
    }

    public function semualahan()
    {
        return view('farming.semualahan');
    }

    public function formupdatelahan()
    {
        return view('farming.formupdatelahan');
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
     * @param  \App\Http\Requests\StorefarmingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefarmingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function show(farming $farming)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function edit(farming $farming)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefarmingRequest  $request
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefarmingRequest $request, farming $farming)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\farming  $farming
     * @return \Illuminate\Http\Response
     */
    public function destroy(farming $farming)
    {
        //
    }
}
