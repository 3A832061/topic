<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\DB;
class OrganizeController extends Controller
{
    public function index(){
        $organizes=Information::where('type','=','organize')->get();
        $data=['organizes'=>$organizes];
        return view('information.organize.index',$data);
    }

    public function create()
    {
        return view('information.organize.createform');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        DB::table('information')->insert([
            'title' => $request->title,
            'type' => 'organize',
            'content' => $request->content]);

        return redirect()->route('organizes.index');
    }

    public function edit($id){
        $organize = Information::find($id);
        $data1=['organize'=>$organize];
        return view('information.organize.editform',$data1);
    }

    public function update($id,Request $request){

        $recipe=Information::find($id);
        $recipe->update($request->all());

        return redirect()->route('organizes.index');
    }

    public function destroy($id)
    {
        Information::destroy($id);
        return redirect()->route('organizes.index');
    }
}
