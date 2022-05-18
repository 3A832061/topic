<?php

namespace App\Http\Controllers;

use App\Models\Sheet_Music;
use App\Http\Requests\StoreSheet_MusicRequest;
use App\Http\Requests\UpdateSheet_MusicRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SheetMusicController extends Controller
{

    public function index()
    {
        return view('sheet.index');
    }


    public function create()
    {
        //
    }


    public function store(StoreSheet_MusicRequest $request)
    {
        //
    }


    public function show(Sheet_Music $sheet_Music)
    {
        //
    }


    public function edit(Sheet_Music $sheet_Music)
    {
        //
    }


    public function update(UpdateSheet_MusicRequest $request, Sheet_Music $sheet_Music)
    {
        //
    }

    public function destroy(Sheet_Music $sheet_Music)
    {
        //
    }
}
