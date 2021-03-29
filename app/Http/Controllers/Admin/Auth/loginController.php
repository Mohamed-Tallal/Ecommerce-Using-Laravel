<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }
    public function postLogin(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        if(!auth()->guard('web')->attempt(['email' => $request->email,'password' => $request->password]))
        {
            return back();
        }else{
            return redirect()->route('dashboard.index')->with('toast_success', 'Welcome Back '.auth()->guard('web')->user()->name.' !');
        }

    }
    public function postLogout(){
        auth()->guard('web')->logout();
        return redirect()->route('user.login')->with('toast_success', 'Logout Successfully!');

    }



}
