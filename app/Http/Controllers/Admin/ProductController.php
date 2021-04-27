<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products =   DB::table('products')->orderBy('id')->paginate('5');
        $productCount =  DB::table('products')->get()->count();
        return view('dashboard.product.index',compact('products','productCount'));
    }


    public function create(){
        $category =  Category::with('subCategory')->get();
        $brand    =  DB::table('brad_categories')->select('name')->get();
        $colors    =  DB::table('colors')->get();
        $tags      =  DB::table('tags')->get();

        return view('dashboard.product.create',compact('category','brand','colors','tags'));
    }

    public function store(Request $request){
        return $request->all();
    }















}
