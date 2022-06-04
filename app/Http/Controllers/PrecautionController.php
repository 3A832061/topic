<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Information;

class PrecautionController extends Controller
{
    public function index(){
        $precautions = Information::where('type','=','precaution')->get();
        $data=['precautions'=>$precautions];
        return view('information.precautions.index',$data);
    }

    public function create()
    {
        return view('information.precautions.createform');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);
        if($request->content){
            DB::table('information')->insert([
                'title' => $request->title,
                'type' => 'precaution',
                'content' => $request->content]);
        }
        else{
            DB::table('information')->insert([
                'title' => $request->title,
                'type' => 'precaution']);
        }
        return redirect()->route('precautions.index');
    }

    public function edit($id){
        $precaution = Information::find($id);
        $data1=['precaution'=>$precaution];
        return view('information.precautions.editform',$data1);
    }

    public function update($id,Request $request){

        $recipe=Information::find($id);
        $recipe->update($request->all());

        return redirect()->route('precautions.index');
    }
}
