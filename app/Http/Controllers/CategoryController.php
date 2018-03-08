<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

      $request->validate([
        'name' => 'required|unique:categories',
      ]);
      $category = new Category;
      $category->name = $request->name;
      $category->save();
      return redirect()->route('admin.post.create')->with('info',' Category added succesfully');
    }

    public function show($id)
    {
      $allCategories = Category::all();
      $categories = Category::with('posts')->find($id);
      return view('categories.show', compact('categories', 'allCategories'));
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
