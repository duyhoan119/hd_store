<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\news;
use App\Models\product;

class HomeController extends Controller
{
    public function index(){
        $products = product::query()->paginate(8);
        $news = news::query()->select(['id','title','image'])->get();
        $categories = category::query()->where('status','0')->get();
        $news_categories = category::query()->where('status','1')->get();
        return view('Client.home',['categories'=>$categories,'news_categories'=>$news_categories,'products'=>$products,'news'=>$news]);
    }
}
