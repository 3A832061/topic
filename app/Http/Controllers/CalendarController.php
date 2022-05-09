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

    public function create($month='全部'){
        if($month=='全部'){
            //所有已輸入資料都顯示出來
            $calendars=Calendar::orderBy('date', 'ASC')->get();
        }
        else{
            //用不同的年月份來顯示已輸入的資料
            $calendars=Calendar::where('month','=',$month)->orderBy('date', 'DESC')->get();
        }
        //顯示各個年月份，供使用者選擇要顯示的資料
        $types=DB::table('calendars')->select('month')->distinct()->get();
        $data=['types'=>$types,'calendars'=>$calendars,'month'=>$month];
        return view('attend.calendar',$data);
    }

    public function store(Request $request){
        if($_POST['remark']=='') {
        DB::table('calendars')->insert([
            'title' => $_POST['title'],
            'date' => $_POST['date'],
            'tag' => $_POST['tag'],
            'month' => $_POST['month'],
            'user_id' => auth()->user()->id]);
        }
        else{
            DB::table('calendar')->insert([
                'title' => $_POST['title'],
                'date' => $_POST['date'],
                'tag' => $_POST['tag'],
                'month' => $_POST['month'],
                'remark' => $_POST['remark'],
                'user_id' => auth()->user()->id]);
        }
        return redirect()->route('calendar.create');
    }

    public function edit($id){
        //顯示需要修改的資料
        $calendar=Calendar::find($id);
        //顯示各個年月份
        $types=DB::table('calendars')->select('month')->distinct()->get();
        $list=Calendar::orderBy('date', 'ASC')->where('id','<>',$id)->get();
        $data=['types'=>$types,'calendar'=>$calendar,'list'=>$list];
        return view('attend.editform',$data);
    }

    public function update($id,Request $request)
    {
        $recipe=Calendar::find($id);

        $recipe->update($request->all());

        return redirect()->route('calendar.create');
    }

    public function destroy($id){
        Calendar::destroy($id);
        return redirect()->route('calendar.create');
    }
}
