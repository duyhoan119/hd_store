<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;

class HomeController extends Controller
{
    public function index(){
        $products = product::query()->paginate(8);
        $categories = category::query()->get();
        return view('Client.home',['categories'=>$categories,'products'=>$products]);
    }
}
