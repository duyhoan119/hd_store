<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(?int $a = 0)
    {
        $products = product::query()->with('category')->paginate(10);
        if ($a !== 1) { 
            return view('admin.product.index', ['products' => $products]);
        }
        $categories = $this->getCate();
        return view('Client.product.index',['categories'=>$categories,'products' => $products]);
    }

    public function create()
    {
        $categories = $this->getCate();
        return view('admin.product.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $this->storeImage($request);

        if (product::query()->create($data)) {
            return redirect(route('products', [true, 'mes' => 'created success']));
        }
        return redirect(route('products', [false, 'created falsed']));
    }

    public function show(int $id, ?int $a = 0)
    {
        $product = product::query()->with('variant')->find($id);
        if ($a !== 0) {
            $products = product::query()->where('category_id',$product->category_id)->paginate(4);
            return view('client.product.detail', ['product' => $product,'products'=>$products]);
        }
        return view('admin.product.edit', ['product' => $product]);
    }

    public function edit(product $product)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        $updateData = $request->all();
        $product = product::find($id);
        if ($product->update($updateData)) {
            return redirect(route('products', [true, 'mes' => 'updated success']));
        }
        return redirect(route('products', [false, 'update falsed']));
    }

    public function destroy(int $id)
    {
        $product = product::find($id);
        if ($product) {
            $product->delete();
            return ['mes' => 'delete success'];
        }
        return ['mes' => 'delete falsed'];
    }

    public function findByCate(int $category_id){
        $products = product::query()->where('category_id',$category_id)->paginate(10);
        $categories = $this->getCate();
        return view('Client.product.index',['categories'=>$categories,'products' => $products]);
    }

    protected function getCate()
    {
        return category::query()->where('status','0')->get();
    }

    protected function storeImage(Request $request)
    {
        $path = $request->file('image')->store('images');
        $path = 'images/'. $path;
        return substr($path, strlen('images/'));
    }
}
