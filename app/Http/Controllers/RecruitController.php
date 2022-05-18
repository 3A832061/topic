<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Information;
use Illuminate\Http\Request;

class RecruitController extends Controller
{
    public function index(){
        $recruit=Information::where('type','=','recruit')->first();
        return view('information.recruit.index')->with('recruit',$recruit);
    }
    public function create()
    {
        return view('information.recruit.createform');
    }

    public function store(Request $request)
    {
        DB::table('information')->insert([
            'title' => '諾曼本管樂社',
            'content' => $_POST['content'],
            'type' => 'recruit']);
        return redirect()->route('recruit.index');
    }

    public function edit($id)
    {
        $recruit=Information::find($id);
        return view('information.recruit.editform', ['recruit' => $recruit]);
    }


    public function update($id,Request $request)
    {
        $recipe=Information::find($id);

        $recipe->update($request->all());
        return redirect()->route('recruit.index');
    }

    public function show()
    {
        return view('information.recruit.show');
    }

    public function list()
    {
        return view('information.recruit.list');
    }
}
