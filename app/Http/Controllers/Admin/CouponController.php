<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function index(){
        $coupons= DB::table('cobons')->select('id','name','percentage')->orderBy('id','desc')->paginate('5');
        $couponsCount =DB::table('cobons')->select('id')->get();
        return view('dashboard.cobon.index',compact('coupons','couponsCount'));
    }
    public function create(){
        $category = Category::paginate(1);
        return response()->json($category);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),$this->categoryValidate());
        if ($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
            Category::create([
                'name_en' => $request->name_en,
                'name_de' => $request->name_de,
            ]);
            return redirect()->route('category.index')->withToastSuccess(__('dashboardLang.Successfully Added').$request->name_.app()->getLocale(). ' in Categories');
        }
    }

    public function edit($id){
        $category = Category::find($id);
        return view('dashboard.category.edit',compact('category'));
    }
    public function update($id,Request $request){
        $validator = Validator::make($request->all(),$this->categoryValidateUp($id));
        if ($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $category = Category::find($id);
        $category->update();
        return redirect()->route('category.index')->with('toast_success' ,__('dashboardLang.Successfully Updated').$category->name_.app()->getLocal());
    }


    public function destroy($id){
        Category::find($id)->delete();
        return back()->withToastSuccess(
            __('dashboardLang.Successfully deleted'))
            ;
    }

    protected function categoryValidate(){
        return [
            'name_en' => 'required|unique:categories,name_en',
            'name_de' => 'required|unique:categories,name_de'
        ];
    }
    protected function categoryValidateUp($id){
        return [
            'name_en' => 'required|unique:categories,name_en,'.$id,
            'name_de' => 'required|unique:categories,name_de,'.$id
        ];
    }

}
