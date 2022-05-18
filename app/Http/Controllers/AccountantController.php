<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function create(){
        return view('accountant.form');
    }

    public function show(){
        return view('accountant.show');
    }
}
