<?php

namespace App\Http\Controllers;

use App\Models\Sheet_Music;
use App\Http\Requests\StoreSheet_MusicRequest;
use App\Http\Requests\UpdateSheet_MusicRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SheetMusicController extends Controller
{

    public function index()
    {
        $sheets = DB::table('sheet__music')->orderBy('type','asc')->orderBy('name', 'asc')->orderBy('created_at', 'desc')->get();
        return view('sheet.index',['sheets' => $sheets]);
    }


    public function create()
    {
        //

        return view('sheet.create');
    }


    public function store(Request $request)
    {
        //
        $sheet = new Sheet_Music();

        $sheet->name = $request->name;
        $sheet->type = $request->type;
        if($request->zhname) {
            $sheet->zhname = $request->zhname;
        }
        $sheet->composer = $request->composer;
        if($request->arranger){
            $sheet->arranger = $request->arranger;
        }
        if($request->lost){
            $sheet->lost = $request->lost;
        }
        $sheet->saveform = $request->saveform;
        $sheet->authorize = $request->authorize;
        if($request->year) {
            $sheet->year = $request->year;
        }
        if($request->price){
            $sheet->price = $request->price;
        }
        $sheet->change1 = $request->change1;
        $sheet->check1 = $request->check1;
        if($request->remark){
            $sheet->remark = $request->remark;
        }
        $sheet->pin = $request->pin;

        $sheet->save();


        return redirect()->route('sheet.show');
    }


    public function show(Sheet_Music $sheet_Music)
    {
        //
    }


    public function edit($id)
    {
        //
        $sheet=Sheet_Music::find($id);
        $data= ['sheet'=>$sheet];
        return view('sheet.edit',$data);
    }


    public function update(Request $request,$id)
    {
        //
        $sheet = Sheet_Music::find($id);

        $sheet->name = $request->name;
        $sheet->type = $request->type;
        if($request->zhname) {
            $sheet->zhname = $request->zhname;
        }
        $sheet->composer = $request->composer;
        if($request->arranger){
            $sheet->arranger = $request->arranger;
        }
        if($request->lost){
            $sheet->lost = $request->lost;
        }
        $sheet->saveform = $request->saveform;
        $sheet->authorize = $request->authorize;
        if($request->year) {
            $sheet->year = $request->year;
        }
        if($request->price){
            $sheet->price = $request->price;
        }
        $sheet->change1 = $request->change1;
        $sheet->check1 = $request->check1;
        if($request->remark){
            $sheet->remark = $request->remark;
        }
        $sheet->pin = $request->pin;

        $sheet->save();
        return redirect()->route('sheet.show');
    }

    public function destroy($id){
        Sheet_Music::destroy($id);
        return redirect()->route('sheet.show');
    }

    public function past()
    {
        //
        $sheets = DB::table('sheet__music')->where('check1','=','1')->get();
        return view('sheet.tenpast',['sheets' => $sheets]);
    }
    public function search()
    {
        $sheets = DB::table('sheet__music')->orderBy('type','asc')->orderBy('name', 'asc')->where('check1','=','0')->get();
        return view('sheet.tenpastedit',['sheets' => $sheets]);
    }
    public function check($id)
    {
        $sheets=Sheet_Music::find($id);
        $sheets->update(['check1'=>1]);
        return redirect()->route('sheet.past');
    }

}
