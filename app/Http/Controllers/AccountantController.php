<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function create()
    {
        if( auth()->user()->pos=='總務' ) {
            return view('accountant.form');
        }
        else{
            return redirect()->route('index')->with('alert', '只有總務可以填寫');
        }
    }

    public function show()
    {
        return view('accountant.show');
    }
}
