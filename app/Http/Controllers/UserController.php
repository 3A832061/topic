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
        $user=User::where('pos','=',$_POST['pos'])->update(['pos' => '社員']);;

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
