<?php

namespace App\Http\Controllers;

use App\Models\Active;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ActiveController extends Controller
{
    public function show($type)
    {
            $actives = DB::table('actives')->where('type', '=', $type)->get();
            return view('active.index',['actives' => $actives]);
    }

    public function store(Request $request){
        Active::create($request->all());
        return redirect()->route('active.show','音樂會');
    }

    public function update(Request $request,$id){
        $actives=Active::find($id);
        $actives->update($request->all());
        return redirect()->route('active.show','音樂會');
    }

    public function create()
    {
        return view('active.createact');
    }

    public function edit($id)
    {
        $actives = Active::find($id);
        $data= ['actives'=>$actives];
        return view('active.editact',$data);
    }

    public function destroy($id){
        Active::destroy($id);
        return redirect()->route('active.show','音樂會');
    }

}
