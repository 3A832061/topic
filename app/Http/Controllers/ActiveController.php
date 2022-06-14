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
        return view('active.index',['actives' => $actives],['type'=>$type]);
    }

    public function store(Request $request){
        if($request->hasFile('picture')) {
            $imageName = time().'.'.$request->picture->extension();
            //把檔案存到公開的資料夾
            $request->picture->move(public_path('images/actives'), $imageName);
            DB::table('actives')->insert(
                [
                    'type' => $request->type,
                    'content' => $_POST['content'],
                    'url' => $imageName,
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);
        }
        return redirect()->route('active.show','音樂會');
    }

    public function update(Request $request,$id){
        $recipe=Active::find($id);

        if($request->hasFile('picture')) {
            $imageName = time().'.'.$request->picture->extension();
            //把檔案存到公開的資料夾
            $request->picture->move(public_path('images/actives'), $imageName);
            $recipe->type=$request->type;
            $recipe->content=$request->content;
            $recipe->url=$imageName;
            $request->updated_at=now();
            $recipe->save();
        }
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
