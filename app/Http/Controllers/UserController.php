<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

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
        if(auth()->user()->pos=='社長' || auth()->user()->pos=='文書') {
            if($request->pos!=null) {
                $user = User::where('pos', '=', $request->pos)->get();

                if(count($user)==1 && $request->pos=='社長'){
                    $user = User::where('pos', '=', $_POST['pos'])->update(['pos' => '社員']);
                }
                else{
                    return redirect()->back()->with('alert', '社長不可以空缺');
                }

                if(count($user)==1 && $request->pos=='文書'){
                    $user = User::where('pos', '=', $_POST['pos'])->update(['pos' => '社員']);
                }
                else{
                    return redirect()->back()->with('alert', '文書不可以空缺');
                }
            }
            $recipe = User::find($id);
            $recipe->update($request->all());

            return redirect()->back();
        }
        else{
            return redirect()->back()->with('alert', '只有社長、文書可以修改');
        }
    }

    public function show($type='now')
    {
        if($type=='now'){
            $users = User::where('now','=',1)->orderBy('id', 'ASC')->get();
        }
        else{
            $users = User::orderBy('id', 'ASC')->get();
        }

            $data1 = ['users' => $users,'type'=>$type];
            return view('member.show', $data1);
    }

    //重設密碼
    public function reset(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
