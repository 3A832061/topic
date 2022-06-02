<?php

namespace App\Http\Controllers;
use App\Models\Award;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $awards = DB::table('awards')->orderBy('year','DESC')->get();
        return view('information.award.index', ['awards' => $awards]);
    }

    public function create()
    {
        $awards = DB::table('awards')->get();
        return view('information.award.createform', ['awards' => $awards]);
    }

    public function store(Request $request)
    {

        Award::create($request->all());
        return redirect()->route('award.show');
    }

    public function edit($id)
    {
        $awards = Award::find($id);
        $data= ['awards'=>$awards];
        return view('information.award.editform',$data);
    }


    public function update(Request $request, $id)
    {
        $awards=Award::find($id);
        $awards->update($request->all());
        return redirect()->route('award.show');
    }

    public function destroy($id)
    {
        Award::destroy($id);
        return redirect()->route('award.show');
    }
}
