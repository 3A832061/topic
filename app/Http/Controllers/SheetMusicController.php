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
        Sheet_Music::create($request->all());
        return redirect()->route('sheet.show');
    }


    public function show(Sheet_Music $sheet_Music)
    {
        //
    }


    public function edit($id)
    {
        //
        $sheets=Sheet_Music::find($id);
        $data= ['sheet__music'=>$sheets];
        return view('sheet.edit',$data);
    }


    public function update(Request $request,$id)
    {
        //
        $sheets=Sheet_Music::find($id);
        $sheets->update($request->all());
        return redirect()->route('sheet.show');
    }

    public function destroy($id){
        Sheet_Music::destroy($id);
        return redirect()->route('sheet.show');
    }

    public function past()
    {
        //
        $sheets = DB::table('sheet__music')->where('check','=','1')->get();
        return view('sheet.tenpast',['sheets' => $sheets]);
    }
    public function search()
    {
        $sheets = DB::table('sheet__music')->orderBy('type','asc')->orderBy('name', 'asc')->where('check','=','0')->get();
        return view('sheet.tenpastedit',['sheets' => $sheets]);
    }
    public function check($id)
    {
        $sheets=Sheet_Music::find($id);
        $sheets->update(['check'=>1]);
        return redirect()->route('sheet.past');
    }

}
