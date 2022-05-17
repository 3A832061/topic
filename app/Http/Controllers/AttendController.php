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
    public function show()
    {
        $calendar=Calendar::orderBy('month','DESC')->first(); //查詢日程設定資料
        if(!$calendar){
            return '請先設定日程';
        }
        else{
            $attend=Attend::where('user_id','=',auth()->user()->id)->first(); //查詢是否有填寫過出席資料
            if(!$attend){
                $attend=Calendar::where('user_id','=',auth()->user()->id)->first();
                return view('attend.createform');
            }
            else{
                return redirect()->route('attends.edit');
            }
        }
    }
    public function create()
    {
        return view('attend.createform');
    }
}
