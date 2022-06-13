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
            $imageName = time().'.'.$request->link->extension();
            //把檔案存到公開的資料夾
            $request->link->move(public_path('images/teachers'), $imageName);
            DB::table('information')->insert(
                [
                    'title'=> $_POST['title'],
                    'type' => "teacher",
                    'content' => $_POST['content'],
                    'picture' => $imageName
                ]);
        }
        else{
            DB::table('information')->insert(
                [
                    'title'=> $_POST['title'],
                    'type' => "teacher",
                    'content' => $_POST['content']
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
        $teachers=Information::find($id);
        $teachers->update($request->all());
        return redirect()->route('teacher.show');
    }

    public function destroy($id)
    {
        Information::destroy($id);
        return redirect()->route('teacher.show');
    }
}
