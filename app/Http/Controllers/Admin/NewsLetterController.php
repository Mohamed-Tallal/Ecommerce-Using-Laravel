<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsLetterController extends Controller
{

    public function index(){
        $newsLetters = DB::table('news_letters')->select('id','email')->orderBy('id','desc')->paginate('5');
        $newsLetterCount =DB::table('news_letters')->select('id')->get();
        return view('dashboard.newsletter.index',compact('newsLetters','newsLetterCount'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),$this->newsLettersValidate());
        if ($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
            NewsLetter::create([
                'email' => $request->email,
            ]);
            return redirect()->route('website')->withToastSuccess(__('dashboardLang.Successfully Subscription ').$request->email);
        }
    }

    public function edit($id){
        $category = Category::find($id);
        return view('dashboard.category.edit',compact('category'));
    }
    public function update($id,Request $request){
        $validator = Validator::make($request->all(),$this->newsLettersValidateUp($id));
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

    protected function newsLettersValidate(){
        return [
            'email' => 'required|unique:news_letters,email',
        ];
    }

    protected function newsLettersValidateUp($id){
        return [
            'email'=> 'required|max:100|unique:news_letters,email,'.$id,
        ];
    }


}
