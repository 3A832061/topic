<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Sheet_Requ;
use App\Http\Requests\StoreSheet_RequRequest;
use App\Http\Requests\UpdateSheet_RequRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SheetRequController extends Controller
{

    public function index()
    {
        $sheets = DB::table('sheet__requs')->orderBy('day','desc')->orderBy('state','desc')->get();
        return view('sheet.apply.list',['sheets' => $sheets]);
    }


    public function create()
    {
        //
        return view('sheet.apply.req');
    }


    public function store(Request $request)
    {
        //

            DB::table('sheet__requs')->insert([
            'mem_name' => auth()->user()->name,
            'name' => $_POST['name'],
            'part' => $_POST['part'],
            'page' => $_POST['page'],
            'num_page' => $_POST['num_page'],
            'quan' => $_POST['quan'],
            'remark' => $_POST['remark'],
            'state' => $_POST['state'],
            'day' => date('Y/m/d')
            ]);

        return redirect()->route('sheetrequest.show');
    }



    public function edit($id)
    {
        //
        $sheets=Sheet_Requ::find($id);
        $sheets->update(['state'=>0]);
        return redirect()->route('sheetrequest.show');
    }

    public function update()
    {
        //

    }

    public function destroy($id)
    {
        //
        Sheet_Requ::destroy($id);
        return redirect()->route('sheetrequest.show');
    }

}
