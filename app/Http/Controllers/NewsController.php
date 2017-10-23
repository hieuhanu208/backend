<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\News;

class newsController extends Controller
{
    public function getInfo() {
        $news= News::all();

        $new_prod = Product::where('new','1')->get();
        $top_prod = Product::where('top_product','1')->get();
         return view('main.news',compact('slide','new_prod','top_prod','news'));
        
    }
    public function getDetail() {
        return view('main.detail');
    }
}
