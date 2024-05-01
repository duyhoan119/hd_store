<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::query()->paginate(10);
        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryRequest $request)
    {
        $data = $request->validated();
        if (category::query()->create($data)) {

            return redirect(route('categories', [true, 'mes' => 'created success']));
        }
        return redirect(route('categories', [false, 'created falsed']));
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
    public function show(int $id)
    {
        $category = category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $data,int $id)
    {
        $updateData = $data->validated();
        $category = category::find($id);
        if ($category->update($updateData)) {
            return redirect(route('categories', [true, 'mes' => 'updated success']));
        }
        return redirect(route('categories', [false, 'update falsed']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category= category::find($id);
        if ($category) {
            $category->delete();
            return ['mes' => 'delete success'];
        }
        return ['mes' => 'delete falsed'];
    }
}
