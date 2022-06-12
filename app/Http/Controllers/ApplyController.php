<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Http\Requests\StoreApplyRequest;
use App\Http\Requests\UpdateApplyRequest;
use App\Models\Sheet_Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{

    public function index()
    {
        //

    }

    public function create()
    {
        //
        return view('sheet.apply.req');
    }

    public function store(Request $request)
    {
        //
        Apply::create($request->all());
        return redirect()->route('apply.index');
    }

    public function show(Apply $apply)
    {
        //
    }

    public function edit(Apply $apply)
    {
        //
    }


    public function update(UpdateApplyRequest $request, Apply $apply)
    {
        //
    }


    public function destroy(Apply $apply)
    {
        //
    }
}
