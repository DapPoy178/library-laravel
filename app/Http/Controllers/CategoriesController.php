<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index ()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'category' => 'required|unique:categories|max:100',
        ]);

        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category added successfully');
    }

    public function edit($slug)
    {
        $category   = Category::where('slug', $slug)->first();
        return view('categories-edit', ['category' => $category]);
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'category' => 'required|unique:categories|max:100',
        ]);

        $category   = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category upadated succsessfully');
    }

    public function delete($slug)
    {
        Category::where('slug', $slug)->delete();
        return redirect('categories')->with('status', 'Category deleted succsessfully');
    }

    public function deletedCategory()
    {
        $deleted = Category::onlyTrashed()->get();
        return view('categories-deleted', ['deleted' => $deleted]);
    }
    
    
    
}
