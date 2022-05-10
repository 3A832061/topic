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
        DB::table('information')->insert([
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'type' => 'introduction',
            'picture' => $_POST['picture']]);

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

        $recipe->update($request->all());
        return redirect()->route('introduction.show');
    }

    public function destroy(Information $information)
    {
        //
    }
}
