<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = DB::table('information')->where('type','=','teacher')->get();
        return view('information.teacher', ['information' => $teacher]);
    }
}
