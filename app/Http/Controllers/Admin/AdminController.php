<?php

namespace App\Http\Controllers\Admin;

use  App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        $users = User::whereRoleIs('admins')->orderBy('id','desc')->paginate(5);
        $userCount = User::whereRoleIs('admins')->orderBy('id','desc')->get()->count();
        return view('dashboard.admin.index')->with(['users' => $users,'userCount' => $userCount]);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),$this->validateUpdate());
        if ($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $admin = User::create([
           'name' => $request->first_name .' '. $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $admin->attachRole('admins');
        $admin->syncPermissions($request->permission);
        return redirect()->route('admin.index')->with('toast_success' ,'Successfully Added '. $admin->name);
    }


    public function edit($id){
        $admin = User::find($id);
        $name = explode(" ", $admin->name);
        $lastname = array_pop($name);
        $firstname = implode(" ", $name);
        return view('dashboard.admin.edit')->with(['admin' => $admin,'lastname' => $lastname,'firstname' => $firstname]);
    }


    public function update(Request $request,$id){

        $validator = Validator::make($request->all(),$this->validateUpdate($id));
        if ($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $admin = User::find($id);
        $admin->name = $request->first_name .' '.$request->last_name;
        $admin->email = $request->email;
        $admin->syncPermissions($request->permission);
        $admin->update();
        return redirect()->route('admin.index')->with('toast_success' ,'Successfully Updated '. $admin->name);

    }


    public function destroy($id){
       $admin =  User::find($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('toast_success' ,'Successfully deleted '. $admin->name);

    }

    public function validateUpdate($id =0){
        return[
            'first_name' => 'required',
            'email'=> 'required|max:100|unique:users,email,'.$id,
            //'password' => 'required|confirm',
            'permission' => 'required',
            'permission.*' => 'string'
        ];

    }
}
