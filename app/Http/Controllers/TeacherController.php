<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = DB::table('information')->where('type','=','teacher')->get();
        return view('information.teacher', ['information' => $teacher]);
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
