<?php

namespace App\Http\Controllers;
use App\Models\Calendar;
use Illuminate\Http\Request;
use DB;

class CalendarController extends Controller
{
    public function index(){
        return view('calendar');
    }

    public function create(){
        return view('attend.calendar');
    }
}
