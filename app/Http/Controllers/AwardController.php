<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $award = DB::table('information')->where('type','=','award')->get();
        return view('information.award.index', ['information' => $award]);
    }

    public function create()
    {
        return view('information.award.createform');
    }

    public function store(StoreInformationRequest $request)
    {

    }

    public function edit($id)
    {
        $teacher=Information::find($id);
        return view('information.award.editform',[$teacher=>'teacher']);
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
