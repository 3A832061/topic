<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    public function edit()
    {
        return view('member.index');
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'class' => 'required',
            'phone' => 'required|numeric',
        ]);

        $recipe=User::find($id);
        $recipe->update($request->all());
        return redirect()->route('user.edit');
    }

    public function adminUpdate($id,Request $request)
    {
        $recipe=User::find($id);
        $recipe->update($request->all());
        return redirect()->route('user.show');
    }

    public function show()
    {
        $users=User::orderBy('id', 'ASC')->get();
        $data1=['users'=>$users];
        return view('member.show',$data1);
    }
}
