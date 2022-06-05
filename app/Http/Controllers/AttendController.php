<?php

namespace App\Http\Controllers;
use App\Models\Attend;
use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Models\User;

class AttendController extends Controller
{
    public function index()
    {
        return view('attend.list');
    }

    public function create()
    {
        $user=User::where('id','=',auth()->user()->id)->first();
       if($user->part!=null){
           return view('attend.createform');
       }
       else {
           return redirect()->route('user.edit')->with('alert', '請先填寫社員資料');
       }
    }
}
