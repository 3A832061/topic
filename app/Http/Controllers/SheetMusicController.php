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

        $sheets = DB::table('Sheet__Music')->orderBy('type','desc')->orderBy('name', 'asc')->get();
        return view('sheet.index',['sheets' => $sheets]);
    }


    public function create()
    {
        //

        return view('sheet.create');
    }


    public function store(Request $request)
    {
        //
        Sheet_Music::create($request->all());
        return redirect()->route('sheet.show');
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


}
