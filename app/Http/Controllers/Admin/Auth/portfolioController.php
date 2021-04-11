<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    use ImageTrait;
    public function index(){
        $user =  User::find(auth()->guard('web')->user()->id);
        $name = explode(" ", $user->name);
        $lastname = array_pop($name);
        $firstname = implode(" ", $name);

        return view('dashboard.auth.portfolio')->with(['user' => $user,'last' => $lastname,'first' => $firstname]);
    }

    public function portfolioUpdate(Request $request){
        $user = User::find(auth()->guard('web')->user()->id);
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        //$user->image = $request->image;
        if ($request->password !=null){
            $user->password = $request->password;
        }
        if ($request->image){
            $image = $this->SaveImage('uploads/admins',$request->image);
            $user->image = $image;
        }
        $user->update();
        return redirect()->route('user.portfolio')->with('toast_success' , __('dashboardLang.You Update Profile Success'));
    }

}
