<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = DB::table('information')->where('type','=','teacher')->get();
        return view('information.teacher.index')->with('teachers',$teachers);
    }

    public function create()
    {
        return view('information.teacher.createform');
    }

    public function store(Request $request)
    {
        if($request->hasFile('picture')) {
            $imageName = time().'.'.$request->picture->extension();
            //把檔案存到公開的資料夾
            $request->picture->move(public_path('images/teachers'), $imageName);
            DB::table('information')->insert(
                [
                    'title'=> $_POST['title'],
                    'type' => "teacher",
                    'content' => $_POST['content'],
                    'picture' => $imageName,
                ]);
        }
        else{
            DB::table('information')->insert(
                [
                    'title'=> $_POST['title'],
                    'type' => "teacher",
                    'content' => $_POST['content'],
                ]);
        }

        return redirect()->route('teacher.show');
    }

    public function edit($id)
    {
        $teachers=Information::find($id);
        $data= ['Information'=>$teachers];
        return view('information.teacher.editform',$data);
    }


    public function update(Request $request,$id)
    {
        //
        $recipe=Information::find($id);

        if($request->hasFile('picture')) {
            $imageName = time().'.'.$request->picture->extension();
            //把檔案存到公開的資料夾
            $request->picture->move(public_path('images/teachers'), $imageName);

            $recipe->title=$request->title;
            $recipe->content=$request->content;
            $recipe->picture=$imageName;
            $recipe->save();
        }
        else{
            if($request->link_del!=null) {
                $recipe->update($request->all());
                $recipe->picture=null;
                $recipe->save();
            }
            else{
                $recipe->update($request->all());
            }
        }
        $tag='全部公告';
        return redirect()->route('teacher.show');
    }

    public function destroy($id)
    {
        Information::destroy($id);
        return redirect()->route('teacher.show');
    }
}
