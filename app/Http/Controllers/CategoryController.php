<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all())->save();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        return view('category.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all())->save();
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        DB::table('article_category')->where('category_id', $category->id)->delete();
        return redirect()->route('category.index');
    }
}
