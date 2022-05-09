<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendController extends Controller
{
    public function index()
    {
        return view('attend.list');
    }
    public function show()
    {
        return view('attend.calendar');
    }
    public function create()
    {
        return view('attend.createform');
    }
}
