<?php

namespace App\Http\Controllers;
use App\Models\Attend;
use App\Models\Calendar;
use Illuminate\Http\Request;

class AttendController extends Controller
{
    public function index()
    {
        return view('attend.list');
    }

    public function create()
    {
        return view('attend.createform');
    }
}
