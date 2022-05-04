<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{
    public function index()
    {
        $introduction = DB::table('information')->where('type','=','introduction')->get();
        return view('information.introduction.index', ['information' => $introduction]);
    }

    public function create()
    {
        return view('information.form');
    }

    public function store(StoreInformationRequest $request)
    {

    }

    public function edit($id)
    {
        $teacher=Information::find($id);
        return view('information.form',[$teacher=>'teacher']);
    }


    public function update(UpdateInformationRequest $request, Information $information)
    {
        //
    }

    public function destroy(Information $information)
    {
        //
    }
}
