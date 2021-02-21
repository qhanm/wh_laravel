<?php

namespace App\Http\Controllers;

use App\Components\Controller;
use App\Models\Accounts\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function login()
    {
        //dd(Session::all());
        return view('authentication.login')->with(['roles' => Role::ROLES]);
    }

    public function checkLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if(!array_key_exists($request->input('role'), Role::ROLES)) {
            $validator->errors()->add('role', 'Role invalid');
        }

        $input = $request->only(['username', 'password', 'remember_token']);

        $role = $request->input('role');

        if(\Auth::guard($role)->attempt($input)){
            $user = \Auth::guard($role)->user();
            Session::put('user_role', $user->role()->first());
            Session::put('user_information', $user->information()->first());

            return redirect()->route('test');
        }

        $validator->errors()->add('username', 'Username or password invalid');

        return redirect()->route('authentication.login')->withInput()->withErrors($validator);
    }
}
