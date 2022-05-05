<?php

namespace App\Http\Controllers;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        return view('calendar');
    }

    public function create(){
        $types=Calendar::orderBy('month', 'DESC')->distinct('month')->get();

        return view('attend.calendar',['types'=>$types]);
    }

    public function store(){
        return view('calendar');
    }

    public function edit(){
        return view('calendar');
    }

    public function destroy(){
        return view('calendar');
    }
}
