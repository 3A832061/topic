<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit()
    {
        $user=User::find(auth()->user()->id);
        return view('member.index')->with('user',$user);
    }

    public function update($id,Request $request)
    {
        $recipe=Post::find($id);
        $recipe->update($request->all());
        return redirect()->route('user.edit');
    }
}
