<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {


        return view('information.teacher.index');
    }

    public function create()
    {
        return view('information.teacher.createform');
    }

    public function store(StoreInformationRequest $request)
    {

        return view('information.teacher.index');
    }

    public function edit()
    {

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
