<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(?int $a = 0)
    {
        $news = news::query()->select(['id','title','image'])->get();
        $categories = $this->getCate();
        return view('Client.news.index',['categories'=>$categories,'news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, ?int $a = 0)
    {
        $new = news::query()->find($id);
        $news = news::query()->select('id','title','image')->where('category_id',$new->category_id)->get();
        return view('Client.news.detail', ['new' => $new,'news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, news $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(news $news)
    {
        //
    }

    public function findByCate(int $category_id){
        $news = news::query()->select('id','title','image')->where('category_id',$category_id)->get();
        $categories = $this->getCate();
        return view('Client.news.index',['categories'=>$categories,'news'=>$news]);
    }

    protected function generateSlug(string $value){
        return Str::slug($value);
    }

    protected function getCate()
    {
        return category::query()->where('status','1')->get();
    }
}
