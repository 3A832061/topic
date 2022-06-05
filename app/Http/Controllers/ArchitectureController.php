<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Validation\Rules\In;
use Illuminate\Support\Facades\DB;

class ArchitectureController extends Controller
{
    public function index(){
        $architectures=Information::where('type','=','architecture')->get();
        $data=['architectures'=>$architectures];
        return view('information.architecture.index',$data);
    }

    public function create()
    {
        return view('information.architecture.createform');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        DB::table('information')->insert([
            'title' => $request->title,
            'type' => 'architecture',
            'content' => $request->content]);

        return redirect()->route('architectures.index');
    }

    public function edit($id){
        $architecture = Information::find($id);
        $data1=['architecture'=>$architecture];
        return view('information.architecture.editform',$data1);
    }

    public function update($id,Request $request){

        $recipe=Information::find($id);
        $recipe->update($request->all());

        return redirect()->route('architectures.index');
    }

    public function destroy($id)
    {
        Information::destroy($id);
        return redirect()->route('architectures.index');
    }
}
