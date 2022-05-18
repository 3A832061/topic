<?php

namespace App\Http\Controllers;

use App\Models\Sheet_Music;
use App\Http\Requests\StoreSheet_MusicRequest;
use App\Http\Requests\UpdateSheet_MusicRequest;

class SheetMusicController extends Controller
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
     * @param  \App\Http\Requests\StoreSheet_MusicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSheet_MusicRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sheet_Music  $sheet_Music
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet_Music $sheet_Music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sheet_Music  $sheet_Music
     * @return \Illuminate\Http\Response
     */
    public function edit(Sheet_Music $sheet_Music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSheet_MusicRequest  $request
     * @param  \App\Models\Sheet_Music  $sheet_Music
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSheet_MusicRequest $request, Sheet_Music $sheet_Music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sheet_Music  $sheet_Music
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheet_Music $sheet_Music)
    {
        //
    }
}
