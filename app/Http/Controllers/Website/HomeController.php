<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function subscription(Request $request)
    {
        $validator = Validator::make($request->all(), $this->newsLettersValidate());
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            NewsLetter::create([
                'email' => $request->email,
            ]);
            dd($request->all());
        }
    }


    protected function newsLettersValidate(){
        return [
            'email' => 'required|unique:news_letters,email',
        ];
    }

}

