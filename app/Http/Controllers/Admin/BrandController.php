<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BradCategory;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    use ImageTrait;
    public function index(){
        $brands= DB::table('brad_categories')->select('id','name','logo')->orderBy('id','desc')->paginate('5');
        $brandsCount =DB::table('brad_categories')->select('id','name')->get();
        return view('dashboard.brand.index',compact('brands','brandsCount'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),$this->categoryValidate());
        if ($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
            if ($request->logo){
                $image = $this->SaveImage('uploads/brands',$request->logo);
            }
            BradCategory::create([
                'name' => $request->name,
                'logo' => $image,
            ]);
            return redirect()->route('brand.index')->withToastSuccess(__('dashboardLang.Successfully Added').$request->name. ' in Brands');
        }
    }

    public function edit($id){
        $brand = BradCategory::find($id);
        return view('dashboard.brand.edit',compact('brand'));
    }

    public function update($id,Request $request){
        $validator = Validator::make($request->all(),$this->categoryValidateUp($id));
        if ($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $brand = BradCategory::find($id);
        $brand->name = $request->name;
        if ($request->logo){
            $image = $this->SaveImage('uploads/brands',$request->logo);
            $brand->logo = $image;
        }
        $brand->update();
        return redirect()->route('brand.index')->with('toast_success' ,__('dashboardLang.Successfully Updated').$brand->name);
    }


    public function destroy($id){
        BradCategory::find($id)->delete();
        return back()->withToastSuccess(
            __('dashboardLang.Successfully deleted'))
            ;
    }

    protected function categoryValidate(){
        return [
            'name' => 'required|unique:brad_categories,name',
            'logo' => 'required|mimes:jpeg,jpg,png|max:10000'
        ];
    }
    protected function categoryValidateUp($id){
        return [
            'name' => 'required|unique:brad_categories,name,'.$id,
            'logo' => 'mimes:jpeg,jpg,png|max:10000'
        ];
    }

}
