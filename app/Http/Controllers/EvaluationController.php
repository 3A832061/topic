<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use DB;

class EvaluationController extends Controller
{
    public function index(){
        $evaluations=Information::where('type','=','evaluation')->orderBy('title','desc')->orderBy('content','desc')->get();
        $data=['evaluations'=>$evaluations];
        return view('information.evaluation.index',$data);
    }

    public function create()
    {
        return view('information.evaluation.createform');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'remark' => 'required|url'
        ]);

        if($request->content){
            DB::table('information')->insert([
                'title' => $request->title,
                'type' => 'evaluation',
                'content' => $request->content,
                'remark' => $request->remark]);
        }
        else{
            DB::table('information')->insert([
                'title' => $request->title,
                'type' => 'evaluation',
                'remark' => $request->remark]);
        }
        return redirect()->route('evaluations.index');
    }

    public function edit($id){
        $evaluation = Information::find($id);
        $data1=['evaluation'=>$evaluation];
        return view('information.evaluation.editform',$data1);
    }

    public function update($id,Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'remark' => 'required|url'
        ]);

        $recipe=Information::find($id);
        $recipe->update($request->all());

        return redirect()->route('evaluations.index');
    }
}
