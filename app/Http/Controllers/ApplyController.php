<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Http\Requests\StoreApplyRequest;
use App\Http\Requests\UpdateApplyRequest;

class ApplyController extends Controller
{

    public function index()
    {
        //
        return view('sheet.apply.list');
    }


    public function create()
    {
        //
        return view('sheet.apply.req');
    }


    public function store(StoreApplyRequest $request)
    {
        //
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
