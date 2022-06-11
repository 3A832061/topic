<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountantController extends Controller
{
    public function create()
    {
        if( auth()->user()->pos=='總務' ) {
            $users = User::where('pay','!=',1)->get();
            return view('accountant.form',['users'=>$users]);
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
