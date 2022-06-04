<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Information;

class IntroductionController extends Controller
{
    public function index()
    {
        $introduction = Information::where('type','=','introduction')->first();
        return view('information.introduction.index', ['introduction' => $introduction]);
    }

    public function create()
    {
        return view('information.introduction.createform');
    }

    public function store(Request $request)
    {
        if($request->hasFile('picture')) {
            $imageName = time().'.'.$request->picture->extension();
            //把檔案存到公開的資料夾
            $request->picture->move(public_path('images/introduction'), $imageName);

            DB::table('information')->insert([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'type' => 'introduction',
                'picture' => $imageName]);

        }
        return redirect()->route('introduction.show');
    }

    public function edit($id)
    {
        $introduction=Information::find($id);
        return view('information.introduction.editform', ['introduction' => $introduction]);
    }


    public function update($id,Request $request)
    {
        $recipe=Information::find($id);

        if($request->hasFile('picture')) {
            $imageName = time().'.'.$request->picture->extension();
            //把檔案存到公開的資料夾
            $request->picture->move(public_path('images/introduction'), $imageName);
            $recipe->title=$request->title;
            $recipe->content=$request->content;
            $recipe->picture=$imageName;
            $recipe->user_id = auth()->user()->id;
            $recipe->save();
        }
        else{
                $recipe->update($request->all());
        }

        $recipe->update($request->all());
        return redirect()->route('introduction.show');
    }

    public function destroy(Information $information)
    {
        //
    }
}
