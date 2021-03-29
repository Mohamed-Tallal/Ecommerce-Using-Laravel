<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->select('id','name_'.app()->getLocale().' as name')->orderBy('id','desc')->paginate('5');
        $categoryCount =DB::table('categories')->select('id','name_'.app()->getLocale().' as name')->get();
        return view('dashboard.category.index',compact('categories','categoryCount'));
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
           return redirect()->route('category.index')->withToastSuccess('Successfully added '.$request->name_.app()->getLocale(). ' in Categories');
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
        return redirect()->route('category.index')->with('toast_success' ,'Category Updated Successfully');

    }


    public function destroy($id){
        Category::find($id)->delete();
        return back()->withToastSuccess('Category deleted Successfully!');
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
